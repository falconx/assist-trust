<?php
/* Template Name: Blog */

$tags = get_tags(array('hide_empty' => false));

?>

<?php get_header(); ?>

<main>
  <?php include get_theme_file_path('/includes/slider.php'); ?>

  <div class="container-xl with-sidebar">
    <div class="row py-5">
      <div class="col-md-9">
        <div class="content">
          <h1><?php the_title(); ?></h1>

          <?php

          $paged = (get_query_var('paged')) ? get_query_var('paged') : '1';

          $args = array (
            'nopaging' => false,
            'paged' => $paged,
            'posts_per_page' => '10',
            'post_type' => 'post',
          );

          $query = new WP_Query($args);

          ?>

          <?php if ($query->have_posts()): ?>
            <ul class="results-list stack-xl">
              <?php while ($query->have_posts()): $query->the_post(); ?>
                <li>
                  <h3 class="archive-item__heading"><?php the_title(); ?></h3>
                  <time class="archive-item__date" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>

                  <div class="archive-item__content">
                    <?php the_excerpt(); ?>
                  </div>

                  <a class="text-decoration-underline" href="<?php the_permalink(); ?>">See full post</a>
                </li>
              <?php endwhile; ?>
            </ul>

            <div class="d-flex justify-content-between">
              <?php previous_posts_link('« Newer entries'); ?>
              <div class="ml-auto">
                <?php next_posts_link('Older entries »', $query->max_num_pages); ?>
              </div>
            </div>
          <?php else: ?>
            <p>No Posts Found</p>
          <?php endif; ?>

          <?php

          // restore original Post Data
          wp_reset_postdata();

          ?>
        </div>
      </div>

      <section class="sidebar stack-lg col-md-3 mt-3 mt-md-0">
        <?php get_sidebar(); ?>

        <?php get_search_form(); ?>

        <div>
          <h2 class="mb-1">Filter by month:</h2>
          <ul class="archive-list">
            <?php wp_get_archives('type=monthly'); ?>
          </ul>
        </div>

        <div>
          <h2 class="mb-1">Filter by category:</h2>
          <ul class="archive-list">
            <?php wp_list_categories(array(
              'title_li' => ''
            )); ?>
          </ul>
        </div>

        <div>
          <h2 class="mb-1">Filter by tag:</h2>

          <ul class="archive-list">
            <?php foreach ($tags as $tag): ?>
              <li>
                <?php $tag_link = get_tag_link($tag->term_id); ?>
                <a href="<?php echo $tag_link; ?>"><?php echo $tag->name; ?></a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </section>
    </div>

    <?php include get_theme_file_path('/includes/banners.php'); ?>
  </div>
</main>

<?php get_footer(); ?>
