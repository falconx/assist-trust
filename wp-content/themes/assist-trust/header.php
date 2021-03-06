<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Assist Trust</title>

  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_bloginfo('template_directory'); ?>/images/apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_bloginfo('template_directory'); ?>/images/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_bloginfo('template_directory'); ?>/images/favicon-16x16.png" />

  <link href="<?php echo get_bloginfo('template_directory'); ?>/css/reset.css" rel="stylesheet" />
  <link href="<?php echo get_bloginfo('template_directory'); ?>/css/bootstrap-grid.css" rel="stylesheet" />
  <link href="<?php echo get_bloginfo('template_directory'); ?>/css/bootstrap-utilities.css" rel="stylesheet" />
  <link href="<?php echo get_bloginfo('template_directory'); ?>/style.css" rel="stylesheet" />
  <link href="<?php echo get_bloginfo('template_directory'); ?>/css/simple-lightbox.css" rel="stylesheet" />

  <script defer src="<?php echo get_bloginfo('template_directory'); ?>/js/dist/bundle.js"></script>

  <?php wp_head(); ?>
</head>

<body>

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