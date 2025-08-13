<?php
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
if (!empty($input['hp'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Spam detected']);
    exit;
}

// Настройки Telegram бота
$bot_token = 'YOUR_BOT_TOKEN_HERE'; // Замените на ваш токен
$chat_id = 'YOUR_CHAT_ID_HERE'; // Замените на ваш chat_id

// Формируем сообщение
$message = "🎯 *Новая заявка с сайта*\n\n";
$message .= "👤 *Имя:* $name\n";
$message .= "📧 *Email:* $email\n";
$message .= "📱 *Способ связи:* $preferred\n";
$message .= "⏰ *Время для связи:* $time\n";
$message .= "🔗 *Сайт/телефон:* $link\n";
$message .= "💬 *Комментарий:* $comment\n\n";
$message .= "📅 " . date('d.m.Y H:i:s') . "\n";
$message .= "🌐 " . $_SERVER['HTTP_REFERER'] ?? 'Прямой переход';

// Отправляем в Telegram
$url = "https://api.telegram.org/bot$bot_token/sendMessage";
$data = [
    'chat_id' => $chat_id,
    'text' => $message,
    'parse_mode' => 'Markdown',
    'disable_web_page_preview' => true
];

$options = [
    'http' => [
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($data)
    ]
];

$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);

if ($result === false) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to send message']);
    exit;
}

// Логируем заявку (опционально)
$log_entry = date('Y-m-d H:i:s') . " | $name | $email | $preferred | " . ($_SERVER['HTTP_REFERER'] ?? 'direct') . "\n";
file_put_contents('leads.log', $log_entry, FILE_APPEND | LOCK_EX);

// Возвращаем успешный ответ
echo json_encode(['success' => true, 'message' => 'Заявка отправлена']);
?>
