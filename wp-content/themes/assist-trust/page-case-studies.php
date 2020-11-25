<?php
/* Template Name: Case Studies */

$rows = (array)get_field('content');

$caseStudies = get_posts(array(
  'post_type' => 'case_studies',
  'numberposts' => -1,
));

?>

<?php get_header(); ?>

<main>
  <?php include get_theme_file_path('/includes/slider.php'); ?>

  <div class="container-xl">
    <div class="row py-5">
      <div class="content col-md-12">
        <h1><?php the_title(); ?></h1>

        <ul class="row mx-sm-n5 case-studies grid">
          <?php foreach($caseStudies as $entry): ?>
            <li class="col col-12 col-sm-6 px-sm-5">
              <div class="stack-md">
                <?php

                $fields = get_fields($entry->ID);

                ?>
                <?php echo wp_get_attachment_image($fields['image']['ID'], 'case-study'); ?>
                <h2><?php echo $fields['name']; ?></h2>
                <h3><?php echo $entry->post_title; ?></h3>
                <p><?php echo $fields['content']; ?></p>
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