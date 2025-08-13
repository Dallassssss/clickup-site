# Настройка формы заявок для разных хостингов

## GitHub Pages (Статический хостинг)

GitHub Pages не поддерживает PHP, поэтому используйте JavaScript вариант:

1. **Подключите JavaScript файл** в `index.html`:
```html
<script src="/js/telegram-form.js"></script>
```

2. **Замените настройки** в `js/telegram-form.js`:
```javascript
const BOT_TOKEN = 'ваш_токен_бота';
const CHAT_ID = 'ваш_chat_id';
```

3. **Удалите PHP файлы** - они не нужны для GitHub Pages

## Обычный хостинг с PHP

1. **Загрузите файлы**:
   - `api/lead.php`
   - `api/.htaccess`

2. **Настройте токены** в `api/lead.php`:
```php
$bot_token = 'ваш_токен_бота';
$chat_id = 'ваш_chat_id';
```

3. **Проверьте права доступа**:
   - Папка `api/` должна быть доступна для записи (для логов)
   - PHP должен иметь права на запись файлов

## VPS/Выделенный сервер

1. **Установите PHP** (если не установлен):
```bash
sudo apt update
sudo apt install php php-curl
```

2. **Настройте веб-сервер** (Apache/Nginx):

### Apache
```apache
# /etc/apache2/sites-available/clickup.by.conf
<VirtualHost *:80>
    ServerName clickup.by
    DocumentRoot /var/www/clickup.by
    
    <Directory /var/www/clickup.by>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

### Nginx
```nginx
# /etc/nginx/sites-available/clickup.by
server {
    listen 80;
    server_name clickup.by;
    root /var/www/clickup.by;
    
    location / {
        try_files $uri $uri/ =404;
    }
    
    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
    }
}
```

## Проверка работы

### Тест PHP API
```bash
curl -X POST http://your-domain.com/api/lead \
  -H "Content-Type: application/json" \
  -d '{"name":"Тест","email":"test@example.com","preferred":"Telegram @test"}'
```

### Тест JavaScript
Откройте консоль браузера и выполните:
```javascript
fetch('/api/lead', {
    method: 'POST',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify({
        name: 'Тест',
        email: 'test@example.com',
        preferred: 'Telegram @test'
    })
}).then(r => r.json()).then(console.log);
```

## Безопасность

### Для PHP версии:
1. **Ограничение запросов** - добавьте в `api/lead.php`:
```php
// Проверка частоты запросов
session_start();
$ip = $_SERVER['REMOTE_ADDR'];
$time = time();
$requests = isset($_SESSION['requests'][$ip]) ? $_SESSION['requests'][$ip] : [];

// Удаляем старые запросы (старше 1 минуты)
$requests = array_filter($requests, function($t) use ($time) {
    return $time - $t < 60;
});

if (count($requests) >= 3) {
    http_response_code(429);
    echo json_encode(['error' => 'Too many requests']);
    exit;
}

$requests[] = $time;
$_SESSION['requests'][$ip] = $requests;
```

2. **reCAPTCHA** - добавьте в форму:
```html
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<div class="g-recaptcha" data-sitekey="ваш_ключ"></div>
```

### Для JavaScript версии:
1. **Скрытие токена** - используйте переменные окружения или прокси-сервер
2. **Валидация на клиенте** - добавьте проверки полей

## Мониторинг

### Логи PHP версии:
- Файл `api/leads.log` содержит все заявки
- Логи ошибок в `/var/log/apache2/error.log` или `/var/log/nginx/error.log`

### Мониторинг JavaScript:
- Используйте Google Analytics Events
- Добавьте логирование в консоль браузера

## Резервное копирование

Настройте автоматическое резервное копирование:
```bash
# Скрипт для бэкапа
#!/bin/bash
DATE=$(date +%Y%m%d_%H%M%S)
tar -czf backup_$DATE.tar.gz /var/www/clickup.by
```

## SSL/HTTPS

Обязательно настройте SSL сертификат:
```bash
# Let's Encrypt
sudo certbot --apache -d clickup.by
# или
sudo certbot --nginx -d clickup.by
```
