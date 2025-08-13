<?php
/**
 * Генератор безопасных ключей для ClickUp.by
 * Запускать только локально, не загружать на сервер!
 */

// Проверяем, что скрипт запущен локально
if (!in_array($_SERVER['REMOTE_ADDR'] ?? '', ['127.0.0.1', '::1', 'localhost'])) {
    die('Этот скрипт можно запускать только локально!');
}

echo "🔐 Генератор безопасных ключей для ClickUp.by\n";
echo "==============================================\n\n";

// Генерируем API ключ
$api_key = bin2hex(random_bytes(32));
echo "🔑 API Secret Key:\n";
echo $api_key . "\n\n";

// Генерируем пример .env файла
$env_content = "# Конфигурация Telegram бота\n";
$env_content .= "# ВАЖНО: Замените на ваши реальные данные\n";
$env_content .= "TELEGRAM_BOT_TOKEN=your_bot_token_here\n";
$env_content .= "TELEGRAM_CHAT_ID=your_chat_id_here\n\n";
$env_content .= "# Настройки сайта\n";
$env_content .= "SITE_NAME=ClickUp.by\n";
$env_content .= "SITE_URL=https://clickup.by\n\n";
$env_content .= "# Безопасность\n";
$env_content .= "API_SECRET_KEY=" . $api_key . "\n\n";
$env_content .= "# Логирование\n";
$env_content .= "LOG_ENABLED=true\n\n";
$env_content .= "# Окружение\n";
$env_content .= "ENVIRONMENT=production\n";
$env_content .= "DEBUG_MODE=false\n";

echo "📝 Содержимое .env файла:\n";
echo "========================\n";
echo $env_content . "\n";

echo "⚠️  ИНСТРУКЦИИ ПО БЕЗОПАСНОСТИ:\n";
echo "===============================\n";
echo "1. Создайте файл .env в корне проекта\n";
echo "2. Скопируйте содержимое выше в .env файл\n";
echo "3. Замените TELEGRAM_BOT_TOKEN и TELEGRAM_CHAT_ID на реальные\n";
echo "4. Установите права доступа: chmod 600 .env\n";
echo "5. Убедитесь, что .env файл находится вне веб-директории\n";
echo "6. Проверьте, что .env недоступен через браузер\n\n";

echo "🔍 Проверка безопасности:\n";
echo "=========================\n";
echo "curl https://yourdomain.com/.env\n";
echo "Должен вернуть 403 Forbidden\n\n";

echo "✅ Готово! Проект защищен.\n";
?>
