<?php
/* Template Name: Galleries */

$galleries = (array)get_field('galleries');
$rows = (array)get_field('content');

?>

<?php get_header(); ?>

<main>
  <?php include get_theme_file_path('/includes/slider.php'); ?>

  <div class="container-xl">
    <div class="row py-5">
      <div class="content col-md-12">
        <h1><?php the_title(); ?></h1>

        <ul class="stack-xl galleries">
          <?php foreach($galleries as $gallery): ?>
            <li>
              <?php

              $images = $gallery['images'];

              ?>
              <h2><?php echo $gallery['title']; ?></h2>

              <?php if ($images): ?>
                <div class="gallery">
                  <ul class="row pt-sm-3 mx-n1 mx-sm-n4">
                    <?php foreach($images as $image): ?>
                      <li class="col col-6 col-md-4 col-lg-3 px-1 px-sm-4">
                        <a href="<?php echo $image['url']; ?>" target="_blank"<?php if($image['caption']): ?> title="<?php echo $image['caption']; ?>"<?php endif; ?>>
                          <span class="visually-hidden">
                            <?php echo $image['title']; ?>
                          </span>
                          <?php echo wp_get_attachment_image($image['ID'], 'thumbnail'); ?>
                        </a>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              <?php endif; ?>
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
