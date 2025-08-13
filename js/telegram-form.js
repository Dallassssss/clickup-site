// Form Handler для отправки через API
class FormHandler {
    constructor(apiUrl) {
        this.apiUrl = apiUrl || '/api/lead.php';
    }

    async sendForm(data) {
        try {
            const response = await fetch(this.apiUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data)
            });

            const result = await response.json();
            
            if (response.ok && result.success) {
                return { success: true, message: result.message || 'Заявка отправлена' };
            } else {
                throw new Error(result.error || result.message || 'Ошибка отправки');
            }
        } catch (error) {
            console.error('Form submission error:', error);
            throw error;
        }
    }

    validateForm(data) {
        const errors = [];
        
        if (!data.name || data.name.trim().length < 2) {
            errors.push('Имя должно содержать минимум 2 символа');
        }
        
        if (!data.preferred) {
            errors.push('Выберите способ связи');
        }
        
        if (data.email && !this.isValidEmail(data.email)) {
            errors.push('Некорректный email');
        }
        
        return errors;
    }

    isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
}

// Инициализация формы
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('leadForm');
    const statusEl = document.getElementById('formStatus');
    
    if (!form || !statusEl) return;

    const formHandler = new FormHandler();

    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        // Проверяем honeypot
        const honeypot = form.querySelector('input[name="hp"]');
        if (honeypot && honeypot.value) {
            statusEl.textContent = 'Ошибка отправки';
            return;
        }

        // Получаем данные формы
        const formData = new FormData(form);
        const data = Object.fromEntries(formData.entries());
        
        // Удаляем honeypot поле
        delete data.hp;
        
        // Валидируем данные
        const errors = formHandler.validateForm(data);
        if (errors.length > 0) {
            statusEl.textContent = errors.join(', ');
            return;
        }

        // Показываем статус отправки
        statusEl.textContent = 'Отправляем…';
        statusEl.style.color = '#c9c9c9';
        
        try {
            const result = await formHandler.sendForm(data);
            
            statusEl.textContent = result.message;
            statusEl.style.color = '#4ade80';
            form.reset();
            
            // Скрываем сообщение через 5 секунд
            setTimeout(() => {
                statusEl.textContent = '';
                statusEl.style.color = '#c9c9c9';
            }, 5000);
            
        } catch (error) {
            console.error('Form submission error:', error);
            statusEl.textContent = 'Не удалось отправить. Напишите в Telegram: @mmopixcom';
            statusEl.style.color = '#f87171';
        }
    });
});

// Экспорт для использования в других файлах
if (typeof module !== 'undefined' && module.exports) {
    module.exports = FormHandler;
}
