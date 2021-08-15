<?php get_header(); ?>

<main>
  <div class="container-xl with-sidebar">
    <div class="row py-5">
      <div class="col-md-9">
        <h1 class="page-title">
          Blog &mdash; <?php echo get_the_archive_title(); ?>
        </h1>

        <div class="content mt-5">
          <?php if (have_posts()): ?>
            <ul class="results-list stack-xl">
              <?php while (have_posts()): the_post(); ?>
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

            <?php if (get_next_posts_link()) { next_posts_link(); } ?>
            <?php if (get_previous_posts_link()) { previous_posts_link(); } ?>
          <?php else: ?>
            <p>No posts found.</p>
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
          <?php
          
          $tag_list = get_the_tag_list('<ul class="archive-list"><li>', '</li><li>', '</li></ul>');

          if ($tag_list && !is_wp_error($tag_list)) {
            echo $tag_list;
          } else {
            echo '<p>No tags found</p>';
          }
          
          ?>
        </div>
      </section>
    </div>

    <?php include get_theme_file_path('/includes/banners.php'); ?>
  </div>
</main>

<?php get_footer(); ?>
