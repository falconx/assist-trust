<?php
/* Template Name: Diary Dates */

// dynamically display the sidebar if we have content to show
$quote = get_field('quote');

// ensure the required fields are populated
$has_sidebar = $quote['text'] && $quote['author'];

$rows = (array)get_field('content');

$dates = get_posts(array(
  'post_type' => 'diary_dates',
  'numberposts' => -1,
));

$trainingDays = get_field('training_days_dates', 'option');
$christmasDays = get_field('christmas_dates', 'option');

?>

<?php get_header(); ?>

<main>
  <?php include get_theme_file_path('/includes/slider.php'); ?>

  <div class="container-xl<?php echo ($has_sidebar) ? ' with-sidebar' : '' ?>">
    <div class="row py-5">
      <div class="content col-md-<?php echo ($has_sidebar) ? '9' : '12'; ?>">
        <h1><?php the_title(); ?></h1>

        <ul class="stack-lg diary-dates">
          <?php foreach($dates as $entry): ?>
            <li class="stack-md">
              <?php

              $fields = get_fields($entry->ID);

              ?>
              <h2 class="heading--with-divide">
                <?php echo $entry->post_title; ?>
              </h2>
              <strong><?php echo $fields['datetime']; ?></strong>
              <?php echo $fields['description']; ?>
            </li>
          <?php endforeach; ?>
        </ul>

        <div class="stack-sm">
          <h2>Annual closures</h2>

          <div class="stack-xl diary-dates--dates">
            <div class="stack-sm">
              <h3 class="heading--with-divide">Training Days</h3>
              <ul>
                <?php foreach($trainingDays as $day): ?>
                  <li>
                    <?php echo $day['date']; ?>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>

            <div class="stack-sm diary-dates--dates">
              <h3 class="heading--with-divide">Christmas</h3>
              <ul>
                <?php foreach($christmasDays as $day): ?>
                  <li>
                    <?php echo $day['date']; ?>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>

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