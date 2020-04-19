<?php

// dynamically display the sidebar if we have content to show
$quote = get_field('quote');

// ensure the required fields are populated
$has_sidebar = $quote['text'] && $quote['author'];

?>

<?php get_header(); ?>

<div class="carousel"></div>

<main class="container-xl<?php echo ($has_sidebar) ? ' with-sidebar' : '' ?>">
  <div class="content--main row">
    <div class="content col-md-<?php echo ($has_sidebar) ? '8' : '12'; ?>">
      <?php if (get_field('content')): ?>
        <?php the_field('content'); ?>
      <?php endif; ?>
    </div>

    <?php if ($has_sidebar): ?>
      <aside class="sidebar col-md-4">
        <?php get_sidebar(); ?>
      </aside>
    <?php endif; ?>
  </div>

  <?php if (have_rows('banners')): ?>
    <div>
      <?php while (have_rows('banners')): the_row(); ?>
        <div class="banner full-width">
          <div class="container-xl">
            <?php
            
            $banner = get_sub_field('banner');
            
            ?>
            <div class="row">
              <div class="col-md-6<?php if ($banner['image_position'] == 'left'): ?> order-2<?php endif; ?>">
                <div class="banner--content">
                  <p><?php echo $banner['text']; ?></p>

                  <a class="button button__primary" href="<?php echo $banner['destination']; ?>">
                    <?php echo $banner['link_text']; ?>
                  </a>
                </div>
              </div>

              <div class="col-md-6">
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