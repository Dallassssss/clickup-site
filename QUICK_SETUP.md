# Быстрая настройка формы заявок в Telegram

## 1. Создайте Telegram бота
1. Напишите @BotFather в Telegram
2. Отправьте `/newbot`
3. Введите имя: "ClickUp.by Заявки"
4. Введите username: "clickup_leads_bot"
5. Сохраните токен: `1234567890:ABCdefGHIjklMNOpqrsTUVwxyz`

## 2. Получите Chat ID
1. Напишите боту любое сообщение
2. Откройте: `https://api.telegram.org/bot1234567890:ABCdefGHIjklMNOpqrsTUVwxyz/getUpdates`
3. Найдите `"chat":{"id":123456789}` - это ваш chat_id

## 3. Настройте код

### Для PHP хостинга:
Откройте `api/lead.php` и замените:
```php
$bot_token = '1234567890:ABCdefGHIjklMNOpqrsTUVwxyz';
$chat_id = '123456789';
```

### Для GitHub Pages:
Откройте `js/telegram-form.js` и замените:
```javascript
const BOT_TOKEN = '1234567890:ABCdefGHIjklMNOpqrsTUVwxyz';
const CHAT_ID = '123456789';
```

## 4. Проверьте работу
1. Заполните форму на сайте
2. Отправьте заявку
3. Проверьте Telegram - должно прийти сообщение

## Готово! 🎉

Теперь все заявки с сайта будут приходить в ваш Telegram.

### Если не работает:
- Проверьте токен и chat_id
- Убедитесь, что бот активен
- Проверьте консоль браузера на ошибки
- Напишите в Telegram: @mmopixcom
