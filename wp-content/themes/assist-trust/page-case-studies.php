<?php
/* Template Name: Case Studies */

$rows = (array)get_field('content');

$caseStudies = get_posts(array(
  'post_type' => 'case_studies'
));

?>

<?php get_header(); ?>

<?php include get_theme_file_path('/includes/slider.php'); ?>

<div class="container-xl">
  <div class="row py-5">
    <main class="content col-md-12">
      <h1><?php the_title(); ?></h1>

      <ul class="row mx-sm-n5 case-studies">
        <?php foreach($caseStudies as $entry): ?>
          <li class="col col-12 col-sm-6 px-sm-5">
            <div class="case-studies--entry">
              <?php

              $fields = get_fields($entry->ID);

              ?>
              <img src="<?php echo $fields['image']['url']; ?>" alt="<?php echo $fields['image']['alt']; ?>" />
              <h2><?php echo $fields['name']; ?></h2>
              <h3><?php echo $entry->post_title; ?></h3>
              <p><?php echo $fields['content']; ?></p>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>

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
    </main>
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

<?php get_footer(); ?>