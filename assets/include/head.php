<?php
$pageTitle = $pageTitle ?? 'Gulini.Dev';
$pageDescription = $pageDescription ?? 'Desenvolvimento de sites, landing pages e sistemas web sob medida para empresas no sudoeste do Paraná.';
$canonicalUrl = $canonicalUrl ?? 'https://gulini.com.br/';
$ogImage = $ogImage ?? 'https://gulini.com.br/assets/images/wilian_gulini.webp';
$pageType = $pageType ?? 'website';
$structuredData = $structuredData ?? [];

if (!function_exists('esc')) {
  function esc($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
  }
}

if (!function_exists('is_list_array')) {
  function is_list_array($array) {
    if (!is_array($array)) {
      return false;
    }

    if ($array === []) {
      return true;
    }

    return array_keys($array) === range(0, count($array) - 1);
  }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="google-site-verification" content="OxHg_nt7RrPYAWI2sanVcAQFt7gUmpwshnUAys7p9sc" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo esc($pageTitle); ?></title>
    <meta name="description" content="<?php echo esc($pageDescription); ?>" />
    <meta name="robots" content="index, follow" />
    <meta name="author" content="Wilian Gulini" />
    <meta name="language" content="pt-BR">
    <link rel="canonical" href="<?php echo esc($canonicalUrl); ?>" />

    <meta property="og:locale" content="pt_BR" />
    <meta property="og:type" content="<?php echo esc($pageType); ?>" />
    <meta property="og:title" content="<?php echo esc($pageTitle); ?>" />
    <meta property="og:description" content="<?php echo esc($pageDescription); ?>" />
    <meta property="og:url" content="<?php echo esc($canonicalUrl); ?>" />
    <meta property="og:site_name" content="Gulini.Dev" />
    <meta property="og:image" content="<?php echo esc($ogImage); ?>" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?php echo esc($pageTitle); ?>" />
    <meta name="twitter:description" content="<?php echo esc($pageDescription); ?>" />
    <meta name="twitter:image" content="<?php echo esc($ogImage); ?>" />

    <link rel="shortcut icon" href="assets/images/gulini.dev.webp" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css" />

    <?php
      if (!empty($structuredData)) {
        $items = is_list_array($structuredData) ? $structuredData : [$structuredData];
        foreach ($items as $item) {
          $json = json_encode($item, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
          if ($json !== false) {
            echo '<script type="application/ld+json">' . $json . '</script>' . PHP_EOL;
          }
        }
      }
    ?>
  </head>
