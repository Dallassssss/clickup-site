<?php
require_once 'includes/header.php';
require_once 'includes/footer.php';

// Настройки страницы (эти параметры можно передавать динамически)
$pageTitle = 'Школа плавания — Кейс ClickUp.by';
$pageDescription = 'Кейс по продвижению школы плавания в Минске. Результат: 47 новых учеников за 3 месяца с ROMI 156%.';
$pageUrl = 'https://clickup.by/cases/shkola-plavaniya/';

// Включаем хедер
includeHeader($pageTitle, $pageDescription, $pageUrl);
?>

<!-- Main content -->
<main id="main">
    <!-- Hero section -->
    <section class="hero-case">
        <div class="container">
            <div class="breadcrumbs">
                <a href="/">Главная</a> / 
                <a href="/cases/">Кейсы</a> / 
                <span>Школа плавания</span>
            </div>
            
            <div class="case__meta">
                <span class="chip">Образование</span>
                <span class="chip">Локальные услуги</span>
            </div>
            
            <h1>Школа плавания</h1>
            <p class="lead">Запустили рекламу для школы плавания в Минске. Результат: 47 новых учеников за 3 месяца.</p>
            
            <div class="case__stats">
                <div class="stat">
                    <div class="stat__num">47</div>
                    <div class="stat__label">Новых учеников</div>
                </div>
                <div class="stat">
                    <div class="stat__num">156%</div>
                    <div class="stat__label">ROMI</div>
                </div>
                <div class="stat">
                    <div class="stat__num">890₽</div>
                    <div class="stat__label">CPL</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Case content -->
    <section class="case-content">
        <div class="container">
            <div class="grid grid--2">
                <div class="case__section">
                    <h2>Задача</h2>
                    <p>Привлечь новых учеников в школу плавания в Минске. Бюджет на рекламу был ограничен, поэтому нужны были качественные лиды с высокой конверсией в продажи.</p>
                    
                    <h3>Ключевые требования:</h3>
                    <ul>
                        <li>Привлечь минимум 30 новых учеников за 3 месяца</li>
                        <li>Средний чек: 15,000 ₽ за курс</li>
                        <li>Бюджет на рекламу: 200,000 ₽</li>
                        <li>Фокус на локальную аудиторию Минска</li>
                    </ul>
                </div>
                
                <div class="case__section">
                    <h2>Решение</h2>
                    <p>Разработали комплексную стратегию продвижения с фокусом на контекстную рекламу и локальное SEO.</p>
                    
                    <h3>Что было сделано:</h3>
                    <ul>
                        <li>Настроили контекстную рекламу в Яндекс.Директ</li>
                        <li>Создали лендинг с формой записи на пробное занятие</li>
                        <li>Настроили сквозную аналитику</li>
                        <li>Оптимизировали кампании по конверсиям</li>
                    </ul>
                </div>
            </div>
            
            <div class="case__section">
                <h2>Результаты</h2>
                <div class="grid grid--3">
                    <div class="result-card">
                        <div class="result__num">47</div>
                        <div class="result__label">Новых учеников</div>
                        <div class="result__desc">План: 30 учеников</div>
                    </div>
                    <div class="result-card">
                        <div class="result__num">156%</div>
                        <div class="result__label">ROMI</div>
                        <div class="result__desc">Прибыль: 505,000 ₽</div>
                    </div>
                    <div class="result-card">
                        <div class="result__num">890₽</div>
                        <div class="result__label">CPL</div>
                        <div class="result__desc">Низкая стоимость лида</div>
                    </div>
                </div>
            </div>
            
            <div class="case__section">
                <h2>Отзыв клиента</h2>
                <blockquote class="testimonial">
                    <p>"ClickUp.by помогли нам привлечь качественных учеников. Результаты превзошли ожидания — мы получили 47 новых учеников вместо запланированных 30. Рекомендую!"</p>
                    <cite>— Директор школы плавания</cite>
                </blockquote>
            </div>
        </div>
    </section>
</main>

<!-- Structured Data -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Article",
    "headline": "Школа плавания — Кейс ClickUp.by",
    "description": "Кейс по продвижению школы плавания в Минске. Результат: 47 новых учеников за 3 месяца с ROMI 156%.",
    "image": "https://clickup.by/og-image.jpg",
    "author": {
        "@type": "Organization",
        "name": "ClickUp.by"
    },
    "publisher": {
        "@type": "Organization",
        "name": "ClickUp.by",
        "logo": {
            "@type": "ImageObject",
            "url": "https://clickup.by/icon.svg"
        }
    },
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "https://clickup.by/cases/shkola-plavaniya/"
    },
    "datePublished": "2024-01-15",
    "dateModified": "2024-01-15",
    "url": "https://clickup.by/cases/shkola-plavaniya/"
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
        },
        {
            "@type": "ListItem",
            "position": 2,
            "name": "Кейсы",
            "item": "https://clickup.by/cases/"
        },
        {
            "@type": "ListItem",
            "position": 3,
            "name": "Школа плавания",
            "item": "https://clickup.by/cases/shkola-plavaniya/"
        }
    ]
}
</script>

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Review",
    "itemReviewed": {
        "@type": "Service",
        "name": "Контекстная реклама для школы плавания"
    },
    "reviewRating": {
        "@type": "Rating",
        "ratingValue": "5",
        "bestRating": "5",
        "worstRating": "1"
    },
    "author": {
        "@type": "Person",
        "name": "Директор школы плавания"
    },
    "reviewBody": "ClickUp.by помогли нам привлечь качественных учеников. Результаты превзошли ожидания — мы получили 47 новых учеников вместо запланированных 30. Рекомендую!"
}
</script>

<?php
// Включаем футер
includeFooter();
?>
