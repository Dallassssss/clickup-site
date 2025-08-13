<?php
// Общий хедер для всех страниц
function includeHeader($pageTitle = '', $pageDescription = '', $pageUrl = '') {
    // Если не переданы параметры, используем значения по умолчанию
    if (empty($pageTitle)) {
        $pageTitle = 'ClickUp.by — Контекстная и таргетированная реклама под ключ';
    }
    if (empty($pageDescription)) {
        $pageDescription = 'Агентство ClickUp.by: контекстная и таргетированная реклама под ключ. Стратегия, запуск, оптимизация и прозрачная отчётность. Работаем по KPI и бизнес-целям.';
    }
    if (empty($pageUrl)) {
        $pageUrl = 'https://clickup.by/';
    }
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover"/>
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($pageDescription); ?>"/>
    <meta name="keywords" content="контекстная реклама, таргетированная реклама, агентство интернет‑рекламы, Яндекс Директ, VK Ads, продвижение бизнеса, лиды, CPL, ROMI, Минск"/>
    
    <!-- Canonical and alternate links -->
    <link rel="canonical" href="<?php echo htmlspecialchars($pageUrl); ?>"/>
    <link rel="alternate" hreflang="ru" href="<?php echo htmlspecialchars($pageUrl); ?>"/>
    <link rel="alternate" hreflang="x-default" href="<?php echo htmlspecialchars($pageUrl); ?>"/>
    
    <!-- SEO meta tags -->
    <meta name="robots" content="index,follow"/>
    <meta name="theme-color" content="#0b0b0c"/>
    
    <!-- Open Graph -->
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="<?php echo htmlspecialchars($pageUrl); ?>"/>
    <meta property="og:title" content="<?php echo htmlspecialchars($pageTitle); ?>"/>
    <meta property="og:description" content="<?php echo htmlspecialchars($pageDescription); ?>"/>
    <meta property="og:image" content="https://clickup.by/og-image.jpg"/>
    <meta property="og:image:width" content="1200"/>
    <meta property="og:image:height" content="630"/>
    <meta property="og:site_name" content="ClickUp.by"/>
    <meta property="og:locale" content="ru_RU"/>
    
    <!-- Twitter Card -->
    <meta name="twitter:title" content="<?php echo htmlspecialchars($pageTitle); ?>"/>
    <meta name="twitter:description" content="<?php echo htmlspecialchars($pageDescription); ?>"/>
    <meta name="twitter:card" content="summary_large_image"/>
    
    <!-- Favicons -->
    <link rel="icon" href="/favicon.ico" sizes="any"/>
    <link rel="icon" href="/icon.svg" type="image/svg+xml"/>
    <link rel="apple-touch-icon" href="/apple-touch-icon.png"/>
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
<?php include_once __DIR__ . '/../components/header.html'; ?>
