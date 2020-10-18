<?php
/* Template Name: Job Vacancies */

// dynamically display the sidebar if we have content to show
$quote = get_field('quote');

// ensure the required fields are populated
$has_sidebar = $quote['text'] && $quote['author'];

$rows = (array)get_field('content');

$jobs = get_posts(array(
  'post_type' => 'jobs'
));

?>

<?php get_header(); ?>

<?php include get_theme_file_path('/includes/slider.php'); ?>

<main>
  <?php include get_theme_file_path('/includes/slider.php'); ?>

  <div class="container-xl<?php echo ($has_sidebar) ? ' with-sidebar' : '' ?>">
    <div class="row py-5">
      <div class="content col-md-<?php echo ($has_sidebar) ? '9' : '12'; ?>">
        <h1><?php the_title(); ?></h1>

        <ul class="stack-lg jobs">
          <?php foreach($jobs as $entry): ?>
            <li class="stack-md">
              <?php

              $fields = get_fields($entry->ID);

              ?>
              <h2 class="heading--with-divide">
                <?php echo $entry->post_title; ?>
              </h2>
              <?php echo $fields['description']; ?>
              <div>
                <a href="">Apply for this job</a>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>

        <?php foreach($rows as $row): ?>
          <div class="stack-md">
            <?php if ($row['content']): ?>
              <?php echo $row['content']; ?>
            <?php elseif ($row['grid']): ?>
              <div class="row mx-sm-n5 grid">
                <?php foreach($row['grid'] as $gridItem): ?>
                  <div class="col col-12 col-sm-6 px-sm-5">
                    <?php echo $gridItem['content']; ?>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>

      <?php if ($has_sidebar): ?>
        <section class="sidebar col-md-3 mt-3 mt-md-0" aria-labelledby="quote">
          <h2 id="quote" class="visually-hidden">Quote</h2>

          <?php get_sidebar(); ?>
        </section>
      <?php endif; ?>
    </div>

    <?php include get_theme_file_path('/includes/banners.php'); ?>
  </div>
</main>

<?php get_footer(); ?>