<?php
/* Template Name: Preferences */

$rows = (array)get_field('content');

?>

<?php get_header(); ?>

<main id="page--preferences">
  <?php include get_theme_file_path('/includes/slider.php'); ?>

  <div class="container-xl">
    <div class="row py-5">
      <div class="content">
        <h1><?php the_title(); ?></h1>

        <div class="stack-md">
          <p>Cookies are files saved on your phone, tablet or computer when you visit a website.</p>
          <p>We use cookies to store information about how you use this site, such as the pages you visit.</p>

          <h2>Cookie Settings</h2>
          <p>You can choose which cookies you’re happy for us to use.</p>

          <h2>Cookies that measure website use</h2>
          <p>We use Google Analytics to measure how you use the website so we can improve it based on user needs.</p>
          <p>Google Analytics sets cookies that store anonymised information about:</p>

          <ul>
            <li>how you got to the site</li>
            <li>the pages you visit on and how long you spend on each page</li>
            <li>what you click on while you’re visiting the site</li>
          </ul>

          <fieldset>
            <label>
              <input name="ga-accept-cookies" type="radio" value="true">
              <span>Use Google Analytics cookies</span>
            </label>
            <label>
              <input name="ga-accept-cookies" type="radio" value="false">
              <span>Do not use Google Analytics cookies</span>
            </label>
          </fieldset>

          <h2>Strictly necessary cookies</h2>
          <p>We use essential cookies to remember your cookie preferences.</p>
          <p>They always need to be on.</p>

          <div class="mt-5">
            <button id="update-preferences" class="button button__primary">Update Preferences</button>
          </div>
        </div>
      </div>
    </div>

    <?php include get_theme_file_path('/includes/banners.php'); ?>
  </div>
</main>

<?php get_footer(); ?>