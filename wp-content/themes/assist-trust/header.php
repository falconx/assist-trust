<?php

$trackingID = get_field('google_analytics_tracking_id', 'option');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="google-site-verification" content="D-nr-v0jgEeZJkQn5v_sLfQZi8x7C5dX7uMlqijgk1s" />

  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_bloginfo('template_directory'); ?>/images/apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_bloginfo('template_directory'); ?>/images/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_bloginfo('template_directory'); ?>/images/favicon-16x16.png" />

  <link href="<?php echo get_bloginfo('template_directory'); ?>/css/reset.css" rel="stylesheet" />
  <link href="<?php echo get_bloginfo('template_directory'); ?>/css/bootstrap-grid.css" rel="stylesheet" />
  <link href="<?php echo get_bloginfo('template_directory'); ?>/css/bootstrap-utilities.css" rel="stylesheet" />
  <link href="<?php echo get_bloginfo('template_directory'); ?>/style.css" rel="stylesheet" />
  <link href="<?php echo get_bloginfo('template_directory'); ?>/css/simple-lightbox.css" rel="stylesheet" />

  <script defer src="<?php echo get_bloginfo('template_directory'); ?>/js/dist/bundle.js"></script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $trackingID; ?>"></script>
  <script>
    const tracking = JSON.parse(localStorage.getItem('tracking') || '{}');
    const gaCookiesAccepted = tracking.trackingStateChosen && tracking.gaCookiesAccepted;

    if (gaCookiesAccepted) {
      window.dataLayer = window.dataLayer || [];
      function gtag() { dataLayer.push(arguments); }
      gtag('js', new Date());
      gtag('config', '<?php echo $trackingID; ?>');
    }
  </script>

  <?php wp_head(); ?>
</head>

<body>

<aside id="cookie-banner" aria-labelledby="heading-cookies" class="py-4 py-sm-5">
  <div class="container-xl">
    <div class="row">
      <div class="col-sm-7">
        <h2 id="heading-cookies" class="mb-2">Tell us whether you accept cookies</h2>
        <p>We use cookies to collect information about how you use this site. We use this information to make the website work as well as possible and improve it.</p>
      </div>

      <div class="col-sm-4 offset-sm-1 text-right mt-4 mt-sm-0 d-flex align-items-center d-sm-block">
        <button id="cookies-accept" class="button button__primary">Accept all cookies</button>
        <div class="mt-sm-2 ml-3 ml-sm-0">
          <a href="/cookies">Update preferences</a>
        </div>
      </div>
    </div>
  </div>
</aside>

<header>
  <div class="header pt-sm-4">
    <div class="container-xl">
      <div class="row">
        <div class="col-3 col-sm-5 col-md-3 align-self-center align-self-sm-start">
          <a href="/" class="d-block">
            <img src="<?php echo get_bloginfo('template_directory'); ?>/images/logo.svg" alt="Assist Trust" class="logo" />
          </a>
        </div>

        <div class="col align-self-center align-self-sm-start">
          <div class="slogan-social-container">
            <div class="slogan">
              <?php echo get_field('slogan', 'option'); ?>
            </div>

            <div class="social-icons d-none d-md-block">
              <?php include get_theme_file_path('/includes/social-icons.php'); ?>
            </div>
          </div>
        </div>

        <div class="col-auto d-none d-sm-block">
          <div class="header--contact-info">
            <div>
              Call <?php echo get_field('phone_number', 'option'); ?><br />
              <a class="link--email" href="mailto:<?php echo get_field('email_address', 'option'); ?>">
                <?php echo get_field('email_address', 'option'); ?>
              </a>
            </div>
          </div>
        </div>

        <div class="col-auto col-sm-12 px-0">
          <button class="d-sm-none button button__primary button--menu-toggle" aria-expanded="false">
            <span class="visually-hidden">Menu</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" xmlns:xlink="http://www.w3.org/1999/xlink">
              <path fill="currentColor" d="M2 8h60v8H2zm0 20h60v8H2z"></path>
              <path fill="currentColor" d="M2 48h60v8H2z"></path>
            </svg>
          </button>

          <?php include get_theme_file_path('/includes/menu-main.php'); ?>
        </div>
      </div>
    </div>
  </div>
</header>