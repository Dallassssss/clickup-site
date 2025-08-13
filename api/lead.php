<?php
// Загружаем переменные окружения
$env_file = __DIR__ . '/../.env';
if (file_exists($env_file)) {
    $env_content = file_get_contents($env_file);
    $env_lines = explode("\n", $env_content);
    foreach ($env_lines as $line) {
        $line = trim($line);
        if (!empty($line) && strpos($line, '=') !== false && !str_starts_with($line, '#')) {
            list($key, $value) = explode('=', $line, 2);
            $_ENV[trim($key)] = trim($value);
        }
    }
}

// Конфигурация из переменных окружения
$TELEGRAM_BOT_TOKEN = $_ENV['TELEGRAM_BOT_TOKEN'] ?? '8200269768:AAFdb6170gTy50TSpXTWZEG_CanwU7ZgLOc';
$TELEGRAM_CHAT_ID = $_ENV['TELEGRAM_CHAT_ID'] ?? '735765614';
$SITE_NAME = $_ENV['SITE_NAME'] ?? 'ClickUp.by';
$SITE_URL = $_ENV['SITE_URL'] ?? 'https://clickup.by';
$HONEYPOT_FIELD = $_ENV['HONEYPOT_FIELD'] ?? 'hp';
$MAX_MESSAGE_LENGTH = (int)($_ENV['MAX_MESSAGE_LENGTH'] ?? 4096);
$API_SECRET_KEY = $_ENV['API_SECRET_KEY'] ?? 'your-secret-key-change-this';
$LOG_ENABLED = $_ENV['LOG_ENABLED'] ?? true;
$LOG_FILE = __DIR__ . '/../' . ($_ENV['LOG_FILE'] ?? 'logs/leads.log');

// Создаем директорию для логов если её нет
$log_dir = dirname($LOG_FILE);
if (!is_dir($log_dir)) {
    mkdir($log_dir, 0755, true);
}

// Функция безопасного логирования
function secure_log($message, $type = 'INFO') {
    global $LOG_ENABLED, $LOG_FILE;
    if (!$LOG_ENABLED) return;
    
    $log_entry = date('Y-m-d H:i:s') . " [$type] " . $message . "\n";
    file_put_contents($LOG_FILE, $log_entry, FILE_APPEND | LOCK_EX);
}

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: ' . $SITE_URL);
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type, X-API-Key');

// Проверяем метод запроса
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    secure_log("Invalid request method: " . $_SERVER['REQUEST_METHOD'], 'WARNING');
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

// Проверяем API ключ (опционально, для дополнительной защиты)
$api_key = $_SERVER['HTTP_X_API_KEY'] ?? '';
if (!empty($api_key) && $api_key !== $API_SECRET_KEY) {
    secure_log("Invalid API key attempt from: " . ($_SERVER['REMOTE_ADDR'] ?? 'unknown'), 'WARNING');
    http_response_code(401);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

// Проверяем User-Agent
$user_agent = $_SERVER['HTTP_USER_AGENT'] ?? '';
if (empty($user_agent) || strpos($user_agent, 'bot') !== false) {
    secure_log("Suspicious User-Agent: $user_agent", 'WARNING');
    http_response_code(403);
    echo json_encode(['error' => 'Access denied']);
    exit;
}

// Получаем данные из POST запроса
$input = json_decode(file_get_contents('php://input'), true);

// Если данные не получены, пробуем $_POST
if (!$input) {
    $input = $_POST;
}

// Проверяем обязательные поля
$required_fields = ['name', 'preferred'];
foreach ($required_fields as $field) {
    if (empty($input[$field])) {
        secure_log("Missing required field: $field", 'ERROR');
        http_response_code(400);
        echo json_encode(['error' => "Missing required field: $field"]);
        exit;
    }
}

// Очищаем и валидируем данные
$name = htmlspecialchars(trim($input['name']));
$email = !empty($input['email']) ? htmlspecialchars(trim($input['email'])) : 'Не указан';
$preferred = htmlspecialchars(trim($input['preferred']));
$time = !empty($input['time']) ? htmlspecialchars(trim($input['time'])) : 'Не указано';
$link = !empty($input['link']) ? htmlspecialchars(trim($input['link'])) : 'Не указана';
$comment = !empty($input['comment']) ? htmlspecialchars(trim($input['comment'])) : 'Не указан';

// Проверяем honeypot поле
if (!empty($input[$HONEYPOT_FIELD])) {
    secure_log("Honeypot triggered from: " . ($_SERVER['REMOTE_ADDR'] ?? 'unknown'), 'SPAM');
    http_response_code(400);
    echo json_encode(['error' => 'Spam detected']);
    exit;
}

// Дополнительная валидация email
if (!empty($input['email']) && !filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
    secure_log("Invalid email format: " . $input['email'], 'WARNING');
    http_response_code(400);
    echo json_encode(['error' => 'Invalid email format']);
    exit;
}

// Формируем сообщение
$message = "🎯 *Новая заявка с сайта*\n\n";
$message .= "👤 *Имя:* $name\n";
$message .= "📧 *Email:* $email\n";
$message .= "📱 *Способ связи:* $preferred\n";
$message .= "⏰ *Время для связи:* $time\n";
$message .= "🔗 *Ссылка для связи:* $link\n";
$message .= "🌐 *Ссылка на проект:* " . (!empty($input['project']) ? htmlspecialchars(trim($input['project'])) : 'Не указана') . "\n";
$message .= "💬 *Комментарий:* $comment\n\n";
$message .= "📅 " . date('d.m.Y H:i:s') . "\n";
$message .= "🌐 " . ($_SERVER['HTTP_REFERER'] ?? 'Прямой переход') . "\n";
$message .= "📍 IP: " . ($_SERVER['REMOTE_ADDR'] ?? 'unknown');

// Проверяем длину сообщения
if (strlen($message) > $MAX_MESSAGE_LENGTH) {
    $message = substr($message, 0, $MAX_MESSAGE_LENGTH - 100) . "\n\n... (сообщение обрезано)";
}

// Отправляем в Telegram с улучшенной обработкой ошибок
$url = "https://api.telegram.org/bot$TELEGRAM_BOT_TOKEN/sendMessage";
$data = [
    'chat_id' => $TELEGRAM_CHAT_ID,
    'text' => $message,
    'parse_mode' => 'Markdown',
    'disable_web_page_preview' => true
];

// Используем cURL для лучшей обработки ошибок
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
curl_setopt($ch, CURLOPT_USERAGENT, $SITE_NAME . ' Lead Form');

$result = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curl_error = curl_error($ch);
curl_close($ch);

if ($result === false || $http_code !== 200) {
    secure_log("Telegram API Error: HTTP $http_code, cURL: $curl_error, Response: $result", 'ERROR');
    http_response_code(500);
    echo json_encode(['error' => 'Failed to send message to Telegram']);
    exit;
}

// Логируем успешную отправку
secure_log("Lead sent successfully: $name ($email)", 'INFO');

// Возвращаем успешный ответ
echo json_encode(['success' => true, 'message' => 'Заявка отправлена успешно!']);
?>
