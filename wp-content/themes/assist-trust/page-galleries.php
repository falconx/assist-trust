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
                          <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                        </a>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              <?php endif; ?>
            </li>
          <?php endforeach; ?>
        </ul>

        <?php if (count(array_filter($rows))): ?>
          <?php foreach($rows as $row): ?>
            <div>
              <?php if ($row['content']): ?>
                <?php echo $row['content']; ?>
              <?php elseif ($row['grid']): ?>
                <div class="layout-grid">
                  <div class="row mx-sm-n5">
                    <?php foreach($row['grid'] as $gridItem): ?>
                      <div class="col col-12 col-sm-6 px-sm-5">
                        <?php echo $gridItem['content']; ?>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>

    <?php if (have_rows('banners')): ?>
      <div>
        <?php while (have_rows('banners')): the_row(); ?>
          <div class="banner full-width py-3 py-sm-4 py-md-5">
            <div class="container-xl">
              <?php
              
              $banner = get_sub_field('banner');
              
              ?>
              <div class="row mx-sm-n6 mx-lg-n4">
                <div class="col-sm-6 px-lg-4">
                  <div class="row row-cols-1 banner--content">
                    <div class="col mt-3 mt-sm-0">
                      <p><?php echo $banner['text']; ?></p>
                    </div>

                    <div class="col order-first order-sm-last mt-3">
                      <a class="button button__primary" href="<?php echo $banner['destination']; ?>">
                        <?php echo $banner['link_text']; ?>
                      </a>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6 px-lg-4 order-first<?php if ($banner['image_position'] == 'right'): ?> order-sm-last<?php endif; ?>">
                  <img src="<?php echo $banner['image']; ?>" alt="" />
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>