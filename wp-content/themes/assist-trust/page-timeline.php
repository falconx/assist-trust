<?php
/* Template Name: Timeline */

$rows = (array)get_field('content');

$timeline = get_posts(array(
  'post_type' => 'timeline'
));

function orderByYear($a, $b) {
  $yearA = (int)get_fields($a->ID)['year'];
  $yearB = (int)get_fields($b->ID)['year'];

  if ($yearA == $yearB) {
    return 0;
  }

  return ($yearA < $yearB) ? -1 : 1;
}

usort($timeline, 'orderByYear');

?>

<?php get_header(); ?>

<main>
  <?php include get_theme_file_path('/includes/slider.php'); ?>

  <div class="container-xl">
    <div class="row py-5">
      <div class="content col-md-12">
        <h1><?php the_title(); ?></h1>

        <ul class="row timeline">
          <?php foreach($timeline as $entry): ?>
            <li class="col col-12 col-sm-6">
              <div class="timeline--entry">
                <?php

                $fields = get_fields($entry->ID);

                ?>
                <h2><?php echo $fields['year']; ?></h2>
                <div class="timeline--image">
                  <?php echo wp_get_attachment_image($fields['image']['ID'], 'history-thumbnail'); ?>
                </div>
                <p><?php echo $fields['description']; ?></p>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>

        <?php include get_theme_file_path('/includes/content-grid.php'); ?>
      </div>
    </div>

    <?php include get_theme_file_path('/includes/banners.php'); ?>
  </div>
</main>

<?php get_footer(); ?>