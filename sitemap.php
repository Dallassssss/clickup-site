<?php
header('Content-Type: application/xml; charset=UTF-8');

// Base URL detection
$isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443);
$scheme = $isHttps ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? 'clickup.by';
$origin = $scheme . '://' . $host;

// Directory to scan (public root)
$root = __DIR__;

// Walk directory and collect .html files
function walk($dir) {
    $result = [];
    $skip = ['.', '..', '.git', 'node_modules', '.next', '.cache', 'tools'];
    $items = scandir($dir);
    foreach ($items as $item) {
        if (in_array($item, $skip, true)) continue;
        $path = $dir . DIRECTORY_SEPARATOR . $item;
        if (is_dir($path)) {
            $result = array_merge($result, walk($path));
        } elseif (is_file($path)) {
            $result[] = $path;
        }
    }
    return $result;
}

function toPosix($p) { return str_replace(DIRECTORY_SEPARATOR, '/', $p); }

$files = walk($root);
$urls = [];
foreach ($files as $abs) {
    if (strtolower(pathinfo($abs, PATHINFO_EXTENSION)) !== 'html') continue;
    $rel = ltrim(str_replace($root, '', $abs), DIRECTORY_SEPARATOR);
    $relPosix = toPosix($rel);
    // Normalize index.html to directory URL
    if (preg_match('~(^|/)index\.html$~i', $relPosix)) {
        $urlPath = '/' . trim(dirname($relPosix), '/');
        if ($urlPath !== '/') $urlPath .= '/';
    } else {
        $urlPath = '/' . $relPosix;
    }
    $urls[$urlPath] = filemtime($abs) ?: time();
}

// Ensure root exists
if (!isset($urls['/'])) {
    $urls['/'] = time();
}

// Output XML
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";
ksort($urls, SORT_NATURAL);
foreach ($urls as $path => $mtime) {
    $loc = rtrim($origin, '/') . $path;
    $lastmod = date('c', $mtime);
    $depth = substr_count(trim($path, '/'), '/');
    $priority = ($path === '/') ? '1.0' : ($depth <= 0 ? '0.9' : '0.8');
    echo "  <url>\n";
    echo "    <loc>" . htmlspecialchars($loc, ENT_XML1) . "</loc>\n";
    echo "    <lastmod>" . htmlspecialchars($lastmod, ENT_XML1) . "</lastmod>\n";
    echo "    <changefreq>weekly</changefreq>\n";
    echo "    <priority>$priority</priority>\n";
    echo "  </url>\n";
}
echo "</urlset>\n";
exit;

