<?php
require_once '../../includes/header.php';
require_once '../../includes/footer.php';

// Настройки страницы
$pageTitle = 'Кейс: Медицинская клиника - ClickUp.by';
$pageDescription = 'Результаты продвижения медицинской клиники: рост пациентов на 380%, снижение стоимости привлечения на 40%. Полный кейс с цифрами и стратегией.';
$pageUrl = 'https://clickup.by/cases/meditsinskaya-klinika/';

includeHeader($pageTitle, $pageDescription, $pageUrl);
?>

<!-- Structured Data -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": "Кейс: Медицинская клиника - рост пациентов на 380%",
  "description": "Результаты продвижения медицинской клиники: рост пациентов на 380%, снижение стоимости привлечения на 40%. Полный кейс с цифрами и стратегией.",
  "image": "https://clickup.by/cases/meditsinskaya-klinika/carousel-1.jpg",
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
    "@id": "https://clickup.by/cases/meditsinskaya-klinika/"
  },
  "datePublished": "2024-04-05",
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
      "name": "Медицинская клиника",
      "item": "https://clickup.by/cases/meditsinskaya-klinika/"
    }
  ]
}
</script>

<!-- Hero Section -->
<section class="hero hero--case">
    <div class="container">
        <div class="hero__content">
            <h1>Кейс: Медицинская клиника</h1>
            <p class="hero__subtitle">Рост пациентов на 380% и снижение стоимости привлечения на 40%</p>
            <div class="hero__stats">
                <div class="stat">
                    <div class="stat__num counter" data-target="380">0</div>
                    <div class="stat__label">% роста пациентов</div>
                </div>
                <div class="stat">
                    <div class="stat__num counter" data-target="40">0</div>
                    <div class="stat__label">% снижения CPL</div>
                </div>
                <div class="stat">
                    <div class="stat__num counter" data-target="6">0</div>
                    <div class="stat__label">месяцев работы</div>
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
                <p>Медицинская клиника хотела увеличить количество пациентов и оптимизировать рекламный бюджет. Основные цели:</p>
                <ul>
                    <li>Увеличить количество записей на прием</li>
                    <li>Снизить стоимость привлечения пациента</li>
                    <li>Повысить качество лидов</li>
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
                    <div class="result-card__num">380%</div>
                    <div class="result-card__label">Рост пациентов</div>
                </div>
                <div class="result-card">
                    <div class="result-card__num">40%</div>
                    <div class="result-card__label">Снижение CPL</div>
                </div>
                <div class="result-card">
                    <div class="result-card__num">350%</div>
                    <div class="result-card__label">ROI</div>
                </div>
            </div>
        </div>

        <!-- Carousel -->
        <div class="carousel" id="caseCarousel">
            <div class="carousel__slides">
                <div class="carousel__slide">
                    <img src="carousel-1.jpg" alt="График роста пациентов" loading="lazy">
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
                <p itemprop="reviewBody">"ClickUp.by помогли нам увеличить количество пациентов в 3.8 раза за 6 месяцев. Профессиональный подход и прозрачная отчетность."</p>
                <footer>
                    <cite itemprop="author" itemscope itemtype="https://schema.org/Person">
                        <span itemprop="name">Доктор Сергей Козлов</span>
                    </cite>
                    <span itemprop="reviewRating" itemscope itemtype="https://schema.org/Rating">
                        <meta itemprop="ratingValue" content="5">
                        <meta itemprop="bestRating" content="5">
                    </span>
                    <span>Главный врач клиники</span>
                </footer>
            </blockquote>
        </div>
    </div>
</section>

<?php includeFooter(); ?>
