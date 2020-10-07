<?php
/* Template Name: Life Skills */

$rows = (array)get_field('content');

$skills = get_posts(array(
  'post_type' => 'life_skills'
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
          <?php foreach($skills as $skill): ?>
            <li class="col col-12 col-sm-6 px-sm-5">
              <div class="stack-md">
                <?php

                $fields = get_fields($skill->ID);

                ?>
                <?php echo wp_get_attachment_image($fields['image']['ID'], 'medium'); ?>
                <h2><?php echo $skill->post_title; ?></h2>
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