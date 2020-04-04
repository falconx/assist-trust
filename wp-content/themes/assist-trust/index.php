<?php

// dynamically display the sidebar if we have content to show
$quote = get_field('quote');

// ensure the required fields are populated
$has_sidebar = $quote['text'] && $quote['author'];

?>

<?php get_header(); ?>

<div class="carousel"></div>

<div class="container<?php echo ($has_sidebar) ? ' with-sidebar' : '' ?>">
  <div class="row">

    <main class="col-md-<?php echo ($has_sidebar) ? '8' : '12'; ?>">
      <?php if (have_posts()): while (have_posts()): the_post(); ?>
        <?php get_template_part('content', get_post_format()); ?>
      <?php endwhile; endif; ?>
    </main>

    <?php if ($has_sidebar): ?>
      <aside class="sidebar col-md-4">
        <?php get_sidebar(); ?>
      </aside>
    <?php endif; ?>

  </div>
</div>

<?php get_footer(); ?>