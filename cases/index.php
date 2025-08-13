<?php
require_once 'includes/header.php';
require_once 'includes/footer.php';

// Настройки страницы
$pageTitle = 'Кейсы — ClickUp.by';
$pageDescription = 'Реальные кейсы по контекстной и таргетированной рекламе. Результаты наших клиентов с конкретными цифрами и ROI.';
$pageUrl = 'https://clickup.by/cases/';

// Включаем хедер
includeHeader($pageTitle, $pageDescription, $pageUrl);
?>

<!-- Main content -->
<main id="main">
    <!-- Hero section -->
    <section class="hero-case">
        <div class="container">
            <h1>Наши кейсы</h1>
            <p class="lead">Реальные результаты наших клиентов с конкретными цифрами и ROI</p>
        </div>
    </section>

    <!-- Cases list -->
    <section class="cases">
        <div class="container">
            <div class="grid cases-list">
                <!-- Школа плавания -->
                <article class="card case">
                    <div class="case__meta">
                        <span class="chip">Образование</span>
                        <span class="chip">Локальные услуги</span>
                    </div>
                    <h3>Школа плавания</h3>
                    <p>Запустили рекламу для школы плавания в Минске. Результат: 47 новых учеников за 3 месяца.</p>
                    
                    <div class="case__grid">
                        <div class="case__content">
                            <h4>Задача</h4>
                            <p>Привлечь новых учеников в школу плавания. Бюджет ограничен, нужны качественные лиды.</p>
                            
                            <h4>Решение</h4>
                            <p>Настроили контекстную рекламу в Яндекс.Директ с фокусом на локальные запросы. Создали лендинг с формой записи.</p>
                        </div>
                        
                        <div class="case__kpis">
                            <div class="kpi">
                                <div class="kpi__num">47</div>
                                <div class="kpi__label">Новых учеников</div>
                            </div>
                            <div class="kpi">
                                <div class="kpi__num">156%</div>
                                <div class="kpi__label">ROMI</div>
                            </div>
                            <div class="kpi">
                                <div class="kpi__num">890₽</div>
                                <div class="kpi__label">CPL</div>
                            </div>
                        </div>
                    </div>
                    
                    <a href="/cases/shkola-plavaniya/" class="btn btn--outline">Подробнее</a>
                </article>

                <!-- Кухни на заказ -->
                <article class="card case">
                    <div class="case__meta">
                        <span class="chip">Мебель</span>
                        <span class="chip">Локальные услуги</span>
                    </div>
                    <h3>Кухни на заказ</h3>
                    <p>Продвижение мебельной компании. Результат: 23 заказа за 2 месяца с высоким средним чеком.</p>
                    
                    <div class="case__grid">
                        <div class="case__content">
                            <h4>Задача</h4>
                            <p>Привлечь клиентов на кухни премиум-класса. Высокий средний чек требует качественного трафика.</p>
                            
                            <h4>Решение</h4>
                            <p>Комбинация контекстной и таргетированной рекламы. Фокус на аудиторию с высоким доходом.</p>
                        </div>
                        
                        <div class="case__kpis">
                            <div class="kpi">
                                <div class="kpi__num">23</div>
                                <div class="kpi__label">Заказа</div>
                            </div>
                            <div class="kpi">
                                <div class="kpi__num">234%</div>
                                <div class="kpi__label">ROMI</div>
                            </div>
                            <div class="kpi">
                                <div class="kpi__num">2,450₽</div>
                                <div class="kpi__label">CPL</div>
                            </div>
                        </div>
                    </div>
                    
                    <a href="/cases/kukhni-na-zakaz/" class="btn btn--outline">Подробнее</a>
                </article>

                <!-- Онлайн-курсы -->
                <article class="card case">
                    <div class="case__meta">
                        <span class="chip">Образование</span>
                        <span class="chip">Онлайн</span>
                    </div>
                    <h3>Онлайн-курсы</h3>
                    <p>Продвижение образовательной платформы. Результат: 156 продаж курсов за месяц.</p>
                    
                    <div class="case__grid">
                        <div class="case__content">
                            <h4>Задача</h4>
                            <p>Масштабировать продажи онлайн-курсов. Нужно привлечь больше студентов из разных городов.</p>
                            
                            <h4>Решение</h4>
                            <p>Таргетированная реклама в социальных сетях с ретаргетингом. A/B тестирование креативов.</p>
                        </div>
                        
                        <div class="case__kpis">
                            <div class="kpi">
                                <div class="kpi__num">156</div>
                                <div class="kpi__label">Продаж</div>
                            </div>
                            <div class="kpi">
                                <div class="kpi__num">189%</div>
                                <div class="kpi__label">ROMI</div>
                            </div>
                            <div class="kpi">
                                <div class="kpi__num">1,200₽</div>
                                <div class="kpi__label">CPL</div>
                            </div>
                        </div>
                    </div>
                    
                    <a href="/cases/onlayn-kursy/" class="btn btn--outline">Подробнее</a>
                </article>

                <!-- Медицинская клиника -->
                <article class="card case">
                    <div class="case__meta">
                        <span class="chip">Медицина</span>
                        <span class="chip">Локальные услуги</span>
                    </div>
                    <h3>Медицинская клиника</h3>
                    <p>Продвижение частной клиники. Результат: 89 новых пациентов за квартал.</p>
                    
                    <div class="case__grid">
                        <div class="case__content">
                            <h4>Задача</h4>
                            <p>Привлечь пациентов в частную клинику. Важна репутация и доверие к бренду.</p>
                            
                            <h4>Решение</h4>
                            <p>Контекстная реклама с акцентом на отзывы и сертификаты. Таргетинг на медицинские запросы.</p>
                        </div>
                        
                        <div class="case__kpis">
                            <div class="kpi">
                                <div class="kpi__num">89</div>
                                <div class="kpi__label">Пациентов</div>
                            </div>
                            <div class="kpi">
                                <div class="kpi__num">167%</div>
                                <div class="kpi__label">ROMI</div>
                            </div>
                            <div class="kpi">
                                <div class="kpi__num">1,890₽</div>
                                <div class="kpi__label">CPL</div>
                            </div>
                        </div>
                    </div>
                    
                    <a href="/cases/meditsinskaya-klinika/" class="btn btn--outline">Подробнее</a>
                </article>

                <!-- E-commerce -->
                <article class="card case">
                    <div class="case__meta">
                        <span class="chip">E-commerce</span>
                        <span class="chip">Онлайн-магазин</span>
                    </div>
                    <h3>E-commerce</h3>
                    <p>Продвижение интернет-магазина. Результат: 234 заказа за месяц с ростом выручки на 45%.</p>
                    
                    <div class="case__grid">
                        <div class="case__content">
                            <h4>Задача</h4>
                            <p>Увеличить продажи в интернет-магазине. Нужно привлечь больше покупателей и повысить конверсию.</p>
                            
                            <h4>Решение</h4>
                            <p>Комплексная рекламная кампания: контекст + таргет + ремаркетинг. Оптимизация по конверсиям.</p>
                        </div>
                        
                        <div class="case__kpis">
                            <div class="kpi">
                                <div class="kpi__num">234</div>
                                <div class="kpi__label">Заказа</div>
                            </div>
                            <div class="kpi">
                                <div class="kpi__num">145%</div>
                                <div class="kpi__label">ROMI</div>
                            </div>
                            <div class="kpi">
                                <div class="kpi__num">890₽</div>
                                <div class="kpi__label">CPL</div>
                            </div>
                        </div>
                    </div>
                    
                    <a href="/cases/e-commerce/" class="btn btn--outline">Подробнее</a>
                </article>

                <!-- Автосервис -->
                <article class="card case">
                    <div class="case__meta">
                        <span class="chip">Автосервис</span>
                        <span class="chip">Локальные услуги</span>
                    </div>
                    <h3>Автосервис</h3>
                    <p>Продвижение автосервиса. Результат: 67 новых клиентов за 2 месяца.</p>
                    
                    <div class="case__grid">
                        <div class="case__content">
                            <h4>Задача</h4>
                            <p>Привлечь клиентов в автосервис. Конкуренция высокая, нужны качественные лиды.</p>
                            
                            <h4>Решение</h4>
                            <p>Локальная реклама с фокусом на район. Акцент на качестве услуг и гарантиях.</p>
                        </div>
                        
                        <div class="case__kpis">
                            <div class="kpi">
                                <div class="kpi__num">67</div>
                                <div class="kpi__label">Клиентов</div>
                            </div>
                            <div class="kpi">
                                <div class="kpi__num">178%</div>
                                <div class="kpi__label">ROMI</div>
                            </div>
                            <div class="kpi">
                                <div class="kpi__num">1,450₽</div>
                                <div class="kpi__label">CPL</div>
                            </div>
                        </div>
                    </div>
                    
                    <a href="/cases/avtoservis/" class="btn btn--outline">Подробнее</a>
                </article>

                <!-- Недвижимость -->
                <article class="card case">
                    <div class="case__meta">
                        <span class="chip">Недвижимость</span>
                        <span class="chip">Локальные услуги</span>
                    </div>
                    <h3>Недвижимость</h3>
                    <p>Продвижение агентства недвижимости. Результат: 34 сделки за квартал.</p>
                    
                    <div class="case__grid">
                        <div class="case__content">
                            <h4>Задача</h4>
                            <p>Привлечь клиентов на покупку/продажу недвижимости. Высокий чек требует качественного трафика.</p>
                            
                            <h4>Решение</h4>
                            <p>Таргетированная реклама на аудиторию с высоким доходом. Акцент на экспертизе и опыте.</p>
                        </div>
                        
                        <div class="case__kpis">
                            <div class="kpi">
                                <div class="kpi__num">34</div>
                                <div class="kpi__label">Сделки</div>
                            </div>
                            <div class="kpi">
                                <div class="kpi__num">256%</div>
                                <div class="kpi__label">ROMI</div>
                            </div>
                            <div class="kpi">
                                <div class="kpi__num">3,200₽</div>
                                <div class="kpi__label">CPL</div>
                            </div>
                        </div>
                    </div>
                    
                    <a href="/cases/nedvizhimost/" class="btn btn--outline">Подробнее</a>
                </article>
            </div>
        </div>
    </section>
</main>

<!-- Structured Data -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "CollectionPage",
    "name": "Кейсы ClickUp.by",
    "description": "Реальные кейсы по контекстной и таргетированной рекламе. Результаты наших клиентов с конкретными цифрами и ROI.",
    "url": "https://clickup.by/cases/",
    "mainEntity": {
        "@type": "ItemList",
        "itemListElement": [
            {
                "@type": "ListItem",
                "position": 1,
                "name": "Школа плавания",
                "url": "https://clickup.by/cases/shkola-plavaniya/"
            },
            {
                "@type": "ListItem",
                "position": 2,
                "name": "Кухни на заказ",
                "url": "https://clickup.by/cases/kukhni-na-zakaz/"
            },
            {
                "@type": "ListItem",
                "position": 3,
                "name": "Онлайн-курсы",
                "url": "https://clickup.by/cases/onlayn-kursy/"
            },
            {
                "@type": "ListItem",
                "position": 4,
                "name": "Медицинская клиника",
                "url": "https://clickup.by/cases/meditsinskaya-klinika/"
            },
            {
                "@type": "ListItem",
                "position": 5,
                "name": "E-commerce",
                "url": "https://clickup.by/cases/e-commerce/"
            },
            {
                "@type": "ListItem",
                "position": 6,
                "name": "Автосервис",
                "url": "https://clickup.by/cases/avtoservis/"
            },
            {
                "@type": "ListItem",
                "position": 7,
                "name": "Недвижимость",
                "url": "https://clickup.by/cases/nedvizhimost/"
            }
        ]
    }
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
        }
    ]
}
</script>

<?php
// Включаем футер
includeFooter();
?>
