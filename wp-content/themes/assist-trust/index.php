<?php

// dynamically display the sidebar if we have content to show
$quote = get_field('quote');

// ensure the required fields are populated
$has_sidebar = $quote['text'] && $quote['author'];

?>

<?php get_header(); ?>

<div class="carousel"></div>

<main class="container-xl<?php echo ($has_sidebar) ? ' with-sidebar' : '' ?>">
  <div class="row py-5">
    <div class="content col-md-<?php echo ($has_sidebar) ? '8' : '12'; ?>">
      <?php if (get_field('content')): ?>
        <?php the_field('content'); ?>
      <?php endif; ?>
    </div>

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
            <div class="row">
              <div class="col-sm-6<?php if ($banner['image_position'] == 'left'): ?> order-lg-2<?php endif; ?> px-lg-4">
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

              <div class="col-sm-6 px-lg-4 order-first">
                <img src="<?php echo $banner['image']; ?>" alt="" />
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>
</main>

<?php get_footer(); ?>