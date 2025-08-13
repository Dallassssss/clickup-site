<?php
require_once '../../includes/header.php';
require_once '../../includes/footer.php';

// Настройки страницы
$pageTitle = 'Кейс: Автосервис - ClickUp.by';
$pageDescription = 'Результаты продвижения автосервиса: рост клиентов на 320%, снижение стоимости привлечения на 50%. Полный кейс с цифрами и стратегией.';
$pageUrl = 'https://clickup.by/cases/avtoservis/';

includeHeader($pageTitle, $pageDescription, $pageUrl);
?>

<!-- Structured Data -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": "Кейс: Автосервис - рост клиентов на 320%",
  "description": "Результаты продвижения автосервиса: рост клиентов на 320%, снижение стоимости привлечения на 50%. Полный кейс с цифрами и стратегией.",
  "image": "https://clickup.by/cases/avtoservis/carousel-1.jpg",
  "author": {
    "@type": "Organization",
    "name": "ClickUp.by"
  },
  "publisher": {
    "@type": "Organization",
    "name": "ClickUp.by",
    "logo": {
      "@type": "ImageObject",
      "url": "https://clickup.by/logo.png"
    }
  },
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "https://clickup.by/cases/avtoservis/"
  },
  "datePublished": "2024-06-10",
  "dateModified": "2024-08-13"
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
      "name": "Автосервис",
      "item": "https://clickup.by/cases/avtoservis/"
    }
  ]
}
</script>

<!-- Hero Section -->
<section class="hero hero--case">
    <div class="container">
        <div class="hero__content">
            <h1>Кейс: Автосервис</h1>
            <p class="hero__subtitle">Рост клиентов на 320% и снижение стоимости привлечения на 50%</p>
            <div class="hero__stats">
                <div class="stat">
                    <div class="stat__num counter" data-target="320">0</div>
                    <div class="stat__label">% роста клиентов</div>
                </div>
                <div class="stat">
                    <div class="stat__num counter" data-target="50">0</div>
                    <div class="stat__label">% снижения CPL</div>
                </div>
                <div class="stat">
                    <div class="stat__num counter" data-target="3">0</div>
                    <div class="stat__label">месяца работы</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Case Content -->
<section class="case-content">
    <div class="container">
        <div class="grid grid--2">
            <div>
                <h2>Задача</h2>
                <p>Автосервис хотел увеличить количество клиентов и оптимизировать рекламный бюджет. Основные цели:</p>
                <ul>
                    <li>Увеличить количество заявок на ремонт</li>
                    <li>Снизить стоимость привлечения клиента</li>
                    <li>Повысить средний чек</li>
                    <li>Расширить спектр услуг</li>
                </ul>
            </div>
            <div>
                <h2>Решение</h2>
                <p>Разработали комплексную стратегию продвижения:</p>
                <ul>
                    <li><strong>Контекстная реклама:</strong> Яндекс.Директ с ретаргетингом</li>
                    <li><strong>Таргетированная реклама:</strong> VK Ads и Instagram</li>
                    <li><strong>Аналитика:</strong> Сквозная аналитика и A/B-тесты</li>
                    <li><strong>Оптимизация:</strong> Постоянная работа с аудиториями</li>
                </ul>
            </div>
        </div>

        <div class="results">
            <h2>Результаты</h2>
            <div class="grid grid--3">
                <div class="result-card">
                    <div class="result-card__num">320%</div>
                    <div class="result-card__label">Рост клиентов</div>
                </div>
                <div class="result-card">
                    <div class="result-card__num">50%</div>
                    <div class="result-card__label">Снижение CPL</div>
                </div>
                <div class="result-card">
                    <div class="result-card__num">280%</div>
                    <div class="result-card__label">ROI</div>
                </div>
            </div>
        </div>

        <!-- Carousel -->
        <div class="carousel" id="caseCarousel">
            <div class="carousel__slides">
                <div class="carousel__slide">
                    <img src="carousel-1.jpg" alt="График роста клиентов" loading="lazy">
                </div>
                <div class="carousel__slide">
                    <img src="carousel-2.jpg" alt="Статистика по каналам" loading="lazy">
                </div>
                <div class="carousel__slide">
                    <img src="carousel-3.jpg" alt="Результаты A/B-тестов" loading="lazy">
                </div>
            </div>
            <button class="carousel__btn carousel__btn--prev" aria-label="Предыдущий слайд">‹</button>
            <button class="carousel__btn carousel__btn--next" aria-label="Следующий слайд">›</button>
        </div>

        <!-- Testimonial -->
        <div class="testimonial" itemscope itemtype="https://schema.org/Review">
            <blockquote>
                <p itemprop="reviewBody">"ClickUp.by помогли нам увеличить количество клиентов в 3.2 раза за 3 месяца. Профессиональный подход и прозрачная отчетность."</p>
                <footer>
                    <cite itemprop="author" itemscope itemtype="https://schema.org/Person">
                        <span itemprop="name">Виктор Морозов</span>
                    </cite>
                    <span itemprop="reviewRating" itemscope itemtype="https://schema.org/Rating">
                        <meta itemprop="ratingValue" content="5">
                        <meta itemprop="bestRating" content="5">
                    </span>
                    <span>Владелец автосервиса</span>
                </footer>
            </blockquote>
        </div>
    </div>
</section>

<?php includeFooter(); ?>
