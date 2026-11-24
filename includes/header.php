<?php /** @var array $cfg */
  $shareTitle = $cfg['name'] . ' | ' . $cfg['city'];
  $shareDesc  = 'Furniture manufacturer in Ikeja, Lagos. Beautiful designs, built by careful carpenters. Call ' . $cfg['phone'] . '.';
  $shareUrl   = $cfg['site_url'];
  $shareImg   = $cfg['site_url'] . $cfg['share_image'];
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e($cfg['name']) ?> | <?= e($cfg['city']) ?></title>
  <meta name="description" content="<?= e($shareDesc) ?>">
  <meta name="theme-color" content="#0e1d16">
  <link rel="canonical" href="<?= e($shareUrl) ?>">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="<?= e($cfg['name']) ?>">
  <meta property="og:title" content="<?= e($shareTitle) ?>">
  <meta property="og:description" content="<?= e($shareDesc) ?>">
  <meta property="og:url" content="<?= e($shareUrl) ?>">
  <meta property="og:image" content="<?= e($shareImg) ?>">
  <meta property="og:image:type" content="image/jpeg">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:image:alt" content="<?= e($cfg['name']) ?>: furniture built in Ikeja, Lagos.">
  <meta property="og:locale" content="en_NG">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= e($shareTitle) ?>">
  <meta name="twitter:description" content="<?= e($shareDesc) ?>">
  <meta name="twitter:image" content="<?= e($shareImg) ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Archivo:wdth,wght@62..125,500..900&family=Public+Sans:wght@400;500;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <script type="application/ld+json">
  <?= json_encode([
      '@context' => 'https://schema.org',
      '@type' => 'FurnitureStore',
      'name' => $cfg['name'],
      'telephone' => '+' . $cfg['phone_intl'],
      'address' => [
          '@type' => 'PostalAddress',
          'streetAddress' => '8 Adekoya St, Ifako-Ijaiye',
          'addressLocality' => 'Ikeja',
          'postalCode' => '100001',
          'addressCountry' => 'NG',
      ],
      'geo' => ['@type' => 'GeoCoordinates', 'latitude' => $cfg['maps_lat'], 'longitude' => $cfg['maps_lng']],
  ], JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) ?>
  </script>
</head>
<body>
<a class="visually-hidden-focusable position-absolute p-3 bg-white" href="#main">Skip to content</a>

<nav class="navbar navbar-expand-lg fixed-top site-nav" id="siteNav">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center gap-2" href="#top">
      <span class="brand-mark" aria-hidden="true">
        <svg width="30" height="30" viewBox="0 0 32 32"><rect x="3" y="3" width="26" height="26" rx="3" fill="none" stroke="currentColor" stroke-width="3"/><path d="M16 3v26M3 16h26" stroke="currentColor" stroke-width="3"/></svg>
      </span>
      <span class="brand-text">WOODWORLD<small>Industrial Services</small></span>
    </a>
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" aria-controls="navMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-4">
        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
        <li class="nav-item"><a class="nav-link" href="#services">What we build</a></li>
        <li class="nav-item"><a class="nav-link" href="#approach">How it works</a></li>
        <li class="nav-item"><a class="nav-link" href="#reviews">Reviews</a></li>
        <li class="nav-item"><a class="btn btn-ember" href="tel:+<?= e($cfg['phone_intl']) ?>">Call <?= e($cfg['phone']) ?></a></li>
      </ul>
    </div>
  </div>
</nav>
