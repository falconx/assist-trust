<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Assist Trust</title>

  <link href="<?php echo get_bloginfo('template_directory'); ?>/reset.css" rel="stylesheet" />
  <link href="<?php echo get_bloginfo('template_directory'); ?>/bootstrap-grid.css" rel="stylesheet" />
  <link href="<?php echo get_bloginfo('template_directory'); ?>/bootstrap-utilities.css" rel="stylesheet" />
  <link href="<?php echo get_bloginfo('template_directory'); ?>/style.css" rel="stylesheet" />
  <link href="<?php echo get_bloginfo('template_directory'); ?>/simple-lightbox.css" rel="stylesheet" />

  <script src="<?php echo get_bloginfo('template_directory'); ?>/js/dist/bundle.js"></script>

  <?php wp_head(); ?>
</head>

<body>

<header>
  <div class="header pt-sm-4">
    <div class="container-xl">
      <div class="row">
        <div class="col-3 align-self-center">
          <a href="/" class="d-block">
            <img src="<?php echo get_bloginfo('template_directory'); ?>/images/logo.svg" alt="Assist Trust" class="logo" />
          </a>
        </div>

        <div class="col align-self-center">
          <div class="slogan-social-container">
            <div class="slogan">
              <?php echo get_field('slogan', 'option'); ?>
            </div>

            <div class="social-icons d-none d-sm-block">
              <?php include get_theme_file_path('/includes/social-icons.php'); ?>
            </div>
          </div>
        </div>

        <div class="col-auto align-self-center d-none d-sm-block">
          <div class="header--contact-info">
            <div>
              <div class="mb-2">
                Call <?php echo get_field('phone_number', 'option'); ?><br />
                <a class="link--email link__animated" href="mailto:<?php echo get_field('email_address', 'option'); ?>"><?php echo get_field('email_address', 'option'); ?></a>
              </div>
              <a href="<?php echo get_field('donate_url'); ?>" target="_blank" class="button button__primary button_small">Donate</a>
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