// Telegram Form Handler (JavaScript альтернатива)
class TelegramFormHandler {
    constructor(botToken, chatId) {
        this.botToken = botToken;
        this.chatId = chatId;
        this.apiUrl = `https://api.telegram.org/bot${botToken}/sendMessage`;
    }

    async sendMessage(data) {
        const message = this.formatMessage(data);
        
        try {
            const response = await fetch(this.apiUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    chat_id: this.chatId,
                    text: message,
                    parse_mode: 'Markdown',
                    disable_web_page_preview: true
                })
            });

            const result = await response.json();
            
            if (result.ok) {
                return { success: true, message: 'Заявка отправлена' };
            } else {
                throw new Error(result.description || 'Ошибка отправки');
            }
        } catch (error) {
            console.error('Telegram API Error:', error);
            throw error;
        }
    }

    formatMessage(data) {
        const timestamp = new Date().toLocaleString('ru-RU');
        const referrer = document.referrer || 'Прямой переход';
        
        return `🎯 *Новая заявка с сайта*

👤 *Имя:* ${this.escapeMarkdown(data.name)}
📧 *Email:* ${data.email || 'Не указан'}
📱 *Способ связи:* ${this.escapeMarkdown(data.preferred)}
⏰ *Время для связи:* ${data.time || 'Не указано'}
🔗 *Ссылка для связи:* ${this.escapeMarkdown(data.link || 'Не указана')}
🌐 *Ссылка на проект:* ${this.escapeMarkdown(data.project || 'Не указана')}
💬 *Комментарий:* ${this.escapeMarkdown(data.comment || 'Не указан')}

📅 ${timestamp}
🌐 ${referrer}`;
    }

    escapeMarkdown(text) {
        if (!text) return '';
        return text.replace(/[_*[\]()~`>#+=|{}.!-]/g, '\\$&');
    }
}

// Инициализация формы
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('leadForm');
    const statusEl = document.getElementById('formStatus');
    
    if (!form || !statusEl) return;

                    // Настройки бота
                const BOT_TOKEN = '8200269768:AAFdb6170gTy50TSpXTWZEG_CanwU7ZgLOc';
                const CHAT_ID = '735765614';
    
    const telegramHandler = new TelegramFormHandler(BOT_TOKEN, CHAT_ID);

    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        // Проверяем honeypot
        const honeypot = form.querySelector('input[name="hp"]');
        if (honeypot && honeypot.value) {
            statusEl.textContent = 'Ошибка отправки';
            return;
        }

        statusEl.textContent = 'Отправляем…';
        
        try {
            const formData = new FormData(form);
            const data = Object.fromEntries(formData.entries());
            
            // Удаляем honeypot поле
            delete data.hp;
            
            const result = await telegramHandler.sendMessage(data);
            
            statusEl.textContent = 'Спасибо! Мы свяжемся с вами в ближайшее время.';
            form.reset();
            
        } catch (error) {
            console.error('Form submission error:', error);
            statusEl.textContent = 'Не удалось отправить. Напишите в Telegram: @mmopixcom';
        }
    });
});

// Экспорт для использования в других файлах
if (typeof module !== 'undefined' && module.exports) {
    module.exports = TelegramFormHandler;
}
