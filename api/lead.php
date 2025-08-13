<?php
// Подключаем конфигурацию
require_once '../config.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Проверяем метод запроса
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
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
if (!empty($input[HONEYPOT_FIELD])) {
    http_response_code(400);
    echo json_encode(['error' => 'Spam detected']);
    exit;
}

// Используем настройки из конфигурации
$bot_token = TELEGRAM_BOT_TOKEN;
$chat_id = TELEGRAM_CHAT_ID;

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
$message .= "🌐 " . ($_SERVER['HTTP_REFERER'] ?? 'Прямой переход');

// Проверяем длину сообщения
if (strlen($message) > MAX_MESSAGE_LENGTH) {
    $message = substr($message, 0, MAX_MESSAGE_LENGTH - 100) . "\n\n... (сообщение обрезано)";
}

// Отправляем в Telegram с улучшенной обработкой ошибок
$url = "https://api.telegram.org/bot$bot_token/sendMessage";
$data = [
    'chat_id' => $chat_id,
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
curl_setopt($ch, CURLOPT_USERAGENT, SITE_NAME . ' Lead Form');

$result = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curl_error = curl_error($ch);
curl_close($ch);

if ($result === false || $http_code !== 200) {
    error_log("Telegram API Error: HTTP $http_code, cURL: $curl_error, Response: $result");
    http_response_code(500);
    echo json_encode(['error' => 'Failed to send message to Telegram']);
    exit;
}

$response = json_decode($result, true);
if (!$response || !isset($response['ok']) || !$response['ok']) {
    error_log("Telegram API Error: " . json_encode($response));
    http_response_code(500);
    echo json_encode(['error' => 'Telegram API error: ' . ($response['description'] ?? 'Unknown error')]);
    exit;
}

// Логируем заявку
if (LOG_ENABLED) {
    $log_entry = date('Y-m-d H:i:s') . " | $name | $email | $preferred | " . ($_SERVER['HTTP_REFERER'] ?? 'direct') . "\n";
    $log_path = dirname(__FILE__) . '/' . LOG_FILE;
    file_put_contents($log_path, $log_entry, FILE_APPEND | LOCK_EX);
}

// Возвращаем успешный ответ
echo json_encode([
    'success' => true, 
    'message' => 'Заявка отправлена успешно! Мы свяжемся с вами в ближайшее время.'
]);
?>
