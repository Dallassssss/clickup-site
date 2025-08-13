<?php
require_once 'includes/header.php';
require_once 'includes/footer.php';

// Настройки страницы
$pageTitle = 'ClickUp.by — Контекстная и таргетированная реклама под ключ';
$pageDescription = 'Агентство ClickUp.by: контекстная и таргетированная реклама под ключ. Стратегия, запуск, оптимизация и прозрачная отчётность. Работаем по KPI и бизнес-целям.';
$pageUrl = 'https://clickup.by/';

// Включаем хедер
includeHeader($pageTitle, $pageDescription, $pageUrl);
?>

<!-- Main content -->
<main id="main">
    <!-- Hero section -->
    <section class="hero">
        <div class="container">
            <div class="hero__content">
                <h1>Контекстная и таргетированная реклама под ключ</h1>
                <p class="lead">Стратегия, запуск, оптимизация и прозрачная отчётность. Работаем по KPI и бизнес-целям.</p>
                <div class="hero__cta">
                    <a class="btn btn--brand" href="#contact">Получить коммерческое</a>
                    <a class="btn btn--outline" href="/cases">Смотреть кейсы</a>
                </div>
            </div>
            
            <div class="hero__stats">
                <div class="stat">
                    <div class="stat__num counter" data-target="47">0</div>
                    <div class="stat__label">Довольных клиентов</div>
                </div>
                <div class="stat">
                    <div class="stat__num counter" data-target="156">0</div>
                    <div class="stat__label">Запущенных кампаний</div>
                </div>
                <div class="stat">
                    <div class="stat__num counter" data-target="89">0</div>
                    <div class="stat__label">% средний ROMI</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services section -->
    <section id="services" class="services">
        <div class="container">
            <h2>Наши услуги</h2>
            <div class="grid grid--3">
                <div class="card">
                    <h3>Контекстная реклама</h3>
                    <p>Настройка и ведение рекламных кампаний в Яндекс.Директ и Google Ads</p>
                    <ul>
                        <li>Анализ конкурентов</li>
                        <li>Подбор ключевых слов</li>
                        <li>Создание объявлений</li>
                        <li>Оптимизация по конверсиям</li>
                    </ul>
                </div>
                <div class="card">
                    <h3>Таргетированная реклама</h3>
                    <p>Реклама в социальных сетях: VK, Instagram, Facebook</p>
                    <ul>
                        <li>Настройка пикселей</li>
                        <li>Создание креативов</li>
                        <li>Таргетинг аудитории</li>
                        <li>A/B тестирование</li>
                    </ul>
                </div>
                <div class="card">
                    <h3>Сквозная аналитика</h3>
                    <p>Настройка и ведение аналитики для отслеживания эффективности</p>
                    <ul>
                        <li>Настройка целей</li>
                        <li>Отслеживание конверсий</li>
                        <li>Еженедельные отчёты</li>
                        <li>Рекомендации по оптимизации</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits section -->
    <section id="benefits" class="benefits">
        <div class="container">
            <h2>Почему выбирают нас</h2>
            <div class="grid grid--2">
                <div class="benefit">
                    <h3>Работаем по KPI</h3>
                    <p>Ставим конкретные цели и достигаем их. Прозрачная отчётность по каждому показателю.</p>
                </div>
                <div class="benefit">
                    <h3>Опыт в разных нишах</h3>
                    <p>Работали с e-commerce, услугами, b2b и другими направлениями. Знаем специфику каждой ниши.</p>
                </div>
                <div class="benefit">
                    <h3>Современные инструменты</h3>
                    <p>Используем актуальные технологии и подходы для максимальной эффективности рекламы.</p>
                </div>
                <div class="benefit">
                    <h3>Персональный подход</h3>
                    <p>Каждый проект уникален. Разрабатываем индивидуальную стратегию под ваши цели.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Process section -->
    <section id="process" class="process">
        <div class="container">
            <h2>Как мы работаем</h2>
            <div class="grid grid--4">
                <div class="step">
                    <div class="step__num">01</div>
                    <h3>Бриф и анализ</h3>
                    <p>Изучаем ваш бизнес, конкурентов и целевую аудиторию</p>
                </div>
                <div class="step">
                    <div class="step__num">02</div>
                    <h3>Стратегия</h3>
                    <p>Разрабатываем план рекламных кампаний и KPI</p>
                </div>
                <div class="step">
                    <div class="step__num">03</div>
                    <h3>Запуск</h3>
                    <p>Настраиваем и запускаем рекламные кампании</p>
                </div>
                <div class="step">
                    <div class="step__num">04</div>
                    <h3>Оптимизация</h3>
                    <p>Постоянно улучшаем результаты на основе данных</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ section -->
    <section id="faq" class="faq">
        <div class="container">
            <h2>Часто задаваемые вопросы</h2>
            <div class="faq__list">
                <details>
                    <summary>Как быстро вы запускаете рекламу?</summary>
                    <div>
                        <p>Подготовка к запуску обычно занимает от 3 рабочих дней при наличии брифа и доступов.</p>
                    </div>
                </details>
                <details>
                    <summary>Как формируется стоимость?</summary>
                    <div>
                        <p>Фиксированная оплата за ведение от 20 000 ₽ в месяц, медиабюджет оплачивается отдельно.</p>
                    </div>
                </details>
                <details>
                    <summary>Какие отчёты я получу?</summary>
                    <div>
                        <p>Еженедельные отчёты с ключевыми метриками (клики, лиды, CPL/CPA) и планом оптимизаций.</p>
                    </div>
                </details>
                <details>
                    <summary>С какими нишами вы работаете?</summary>
                    <div>
                        <p>Работаем с локальными услугами, e‑commerce, онлайн‑курсами, b2b‑сегментом и др. Исключения обсуждаем на брифе.</p>
                    </div>
                </details>
                <details>
                    <summary>Какие рекламные площадки используете?</summary>
                    <div>
                        <p>Яндекс.Директ, Google Ads, VK Ads, Facebook/Instagram Ads, TikTok Ads, MyTarget.</p>
                    </div>
                </details>
                <details>
                    <summary>Работаете ли вы с малым бизнесом?</summary>
                    <div>
                        <p>Да, у нас есть решения для разных бюджетов. Минимальный бюджет на рекламу от 50 000 ₽ в месяц.</p>
                    </div>
                </details>
            </div>
        </div>
    </section>

    <!-- Contact section -->
    <section id="contact" class="contact">
        <div class="container">
            <h2>Получить коммерческое предложение</h2>
            <div class="contact__content">
                <div class="contact__info">
                    <h3>Свяжитесь с нами</h3>
                    <p>Оставьте заявку, и мы свяжемся с вами в течение 2 часов</p>
                    <div class="contact__details">
                        <div class="contact__item">
                            <strong>Телефон:</strong>
                            <a href="tel:+375259325405">+375 (25) 932‑54‑05</a>
                        </div>
                        <div class="contact__item">
                            <strong>Telegram:</strong>
                            <a href="https://t.me/mmopixcom">@mmopixcom</a>
                        </div>
                        <div class="contact__item">
                            <strong>Email:</strong>
                            <a href="mailto:hello@clickup.by">hello@clickup.by</a>
                        </div>
                    </div>
                </div>
                
                <form class="contact__form" id="contactForm">
                    <div class="form__group">
                        <label for="name">Имя *</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form__group">
                        <label for="phone">Телефон *</label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>
                    <div class="form__group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email">
                    </div>
                    <div class="form__group">
                        <label for="message">Сообщение</label>
                        <textarea id="message" name="message" rows="4"></textarea>
                    </div>
                    <div class="form__group" style="display:none">
                        <label for="website">Веб-сайт</label>
                        <input type="text" id="website" name="website">
                    </div>
                    <button type="submit" class="btn btn--brand">Отправить заявку</button>
                </form>
            </div>
        </div>
    </section>
</main>

<!-- Structured Data -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "ProfessionalService",
    "name": "ClickUp.by",
    "alternateName": "ClickUp",
    "description": "Агентство контекстной и таргетированной рекламы под ключ. Стратегия, запуск, оптимизация и прозрачная отчётность. Работаем по KPI и бизнес-целям.",
    "url": "https://clickup.by",
    "logo": "https://clickup.by/icon.svg",
    "image": "https://clickup.by/og-image.jpg",
    "telephone": "+375259325405",
    "email": "hello@clickup.by",
    "address": {
        "@type": "PostalAddress",
        "addressLocality": "Минск",
        "addressCountry": "BY",
        "addressRegion": "Минская область"
    },
    "geo": {
        "@type": "GeoCoordinates",
        "latitude": "53.9023",
        "longitude": "27.5618"
    },
    "openingHours": "Mo-Fr 09:00-18:00",
    "priceRange": "$$",
    "currenciesAccepted": "BYN, USD, EUR",
    "paymentAccepted": "Cash, Credit Card, Bank Transfer",
    "areaServed": {
        "@type": "Country",
        "name": "Belarus"
    },
    "serviceArea": {
        "@type": "Country",
        "name": "Belarus"
    },
    "hasOfferCatalog": {
        "@type": "OfferCatalog",
        "name": "Услуги рекламного агентства",
        "itemListElement": [
            {
                "@type": "Offer",
                "itemOffered": {
                    "@type": "Service",
                    "name": "Контекстная реклама",
                    "description": "Настройка и ведение рекламных кампаний в Яндекс.Директ и Google Ads"
                }
            },
            {
                "@type": "Offer",
                "itemOffered": {
                    "@type": "Service",
                    "name": "Таргетированная реклама",
                    "description": "Реклама в социальных сетях: VK, Instagram, Facebook"
                }
            },
            {
                "@type": "Offer",
                "itemOffered": {
                    "@type": "Service",
                    "name": "Сквозная аналитика",
                    "description": "Настройка и ведение аналитики для отслеживания эффективности рекламы"
                }
            }
        ]
    },
    "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.9",
        "reviewCount": "47",
        "bestRating": "5",
        "worstRating": "1"
    },
    "sameAs": [
        "https://t.me/mmopixcom"
    ]
}
</script>

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "WebSite",
    "name": "ClickUp.by",
    "url": "https://clickup.by/",
    "potentialAction": {
        "@type": "SearchAction",
        "target": "https://clickup.by/search?q={search_term_string}",
        "query-input": "required name=search_term_string"
    }
}
</script>

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        {
            "@type": "Question",
            "name": "Как быстро вы запускаете рекламу?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Подготовка к запуску обычно занимает от 3 рабочих дней при наличии брифа и доступов."
            }
        },
        {
            "@type": "Question",
            "name": "Как формируется стоимость?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Фиксированная оплата за ведение от 20 000 ₽ в месяц, медиабюджет оплачивается отдельно."
            }
        },
        {
            "@type": "Question",
            "name": "Какие отчёты я получу?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Еженедельные отчёты с ключевыми метриками (клики, лиды, CPL/CPA) и планом оптимизаций."
            }
        },
        {
            "@type": "Question",
            "name": "С какими нишами вы работаете?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Работаем с локальными услугами, e‑commerce, онлайн‑курсами, b2b‑сегментом и др. Исключения обсуждаем на брифе."
            }
        },
        {
            "@type": "Question",
            "name": "Какие рекламные площадки используете?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Яндекс.Директ, Google Ads, VK Ads, Facebook/Instagram Ads, TikTok Ads, MyTarget."
            }
        },
        {
            "@type": "Question",
            "name": "Работаете ли вы с малым бизнесом?",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "Да, у нас есть решения для разных бюджетов. Минимальный бюджет на рекламу от 50 000 ₽ в месяц."
            }
        }
    ]
}
</script>

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
        {
            "@type": "ListItem",
            "position": 1,
            "name": "Главная",
            "item": "https://clickup.by/"
        }
    ]
}
</script>

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "ContactPage",
    "url": "https://clickup.by/#contact",
    "name": "Контактная форма",
    "description": "Форма для связи с рекламным агентством ClickUp.by",
    "mainEntity": {
        "@type": "ContactPoint",
        "contactType": "customer service",
        "telephone": "+375259325405",
        "email": "hello@clickup.by",
        "availableLanguage": "Russian"
    }
}
</script>

<?php
// Включаем футер
includeFooter();
?>
