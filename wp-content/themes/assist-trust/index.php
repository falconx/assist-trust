<?php

// dynamically display the sidebar if we have content to show
$quote = get_field('quote');

// ensure the required fields are populated
$has_sidebar = $quote['text'] && $quote['author'];

$rows = (array)get_field('content');

?>

<?php get_header(); ?>

<?php include get_theme_file_path('/includes/slider.php'); ?>

<div class="container-xl<?php echo ($has_sidebar) ? ' with-sidebar' : '' ?>">
  <div class="row py-5">
    <main class="content col-md-<?php echo ($has_sidebar) ? '8' : '12'; ?>">
      <?php if(!is_front_page()): ?>
        <h1><?php the_title(); ?></h1>
      <?php endif; ?>

      <?php foreach($rows as $row): ?>
        <div class="stack-md">
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

    <?php if ($has_sidebar): ?>
      <aside class="sidebar col-md-4 mt-3 mt-md-0">
        <?php get_sidebar(); ?>
      </aside>
    <?php endif; ?>
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