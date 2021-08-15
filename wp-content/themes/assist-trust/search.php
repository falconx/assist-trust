<?php get_header(); ?>

<main>
  <?php include get_theme_file_path('/includes/slider.php'); ?>

  <div class="container-xl with-sidebar">
    <div class="row py-5">
      <div class="col-md-9">
        <h1 class="page-title">
          <?php printf(__('Search Results for: %s', 'shape'), '<span>' . get_search_query() . '</span>'); ?>
        </h1>

        <div class="content mt-5">
          <?php if (have_posts()): ?>
           <ul class="results-list stack-xl">
              <?php while (have_posts()): ?>
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

          <?php else: ?>
            <?php get_template_part('no-results', 'search'); ?>
          <?php endif; ?>
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
          <?php echo get_the_tag_list('<ul class="archive-list"><li>', '</li><li>', '</li></ul>'); ?>
        </div>
      </section>
    </div>

    <?php include get_theme_file_path('/includes/banners.php'); ?>
  </div>
</main>

<?php get_footer(); ?>
