<?php

$tags = get_the_tags(get_the_ID());

?>
<?php get_header(); ?>

<main>
  <?php include get_theme_file_path('/includes/slider.php'); ?>

  <div class="container-xl with-sidebar">
    <div class="row py-5">
      <div class="col-md-9">
        <div class="content">
          <h1><?php the_title(); ?></h1>
          <time class="archive-item__date" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>

          <?php the_post(); ?>
          <?php the_content(); ?>
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

        <?php if ($tags): ?>
          <div>
            <h2 class="mb-1">Tags:</h2>
            
            <ul class="archive-list">
              <?php foreach ($tags as $tag): ?>
                <li>
                  <?php $tag_link = get_tag_link($tag->term_id); ?>
                  <a href="<?php echo $tag_link; ?>"><?php echo $tag->name; ?></a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>
      </section>
    </div>

    <?php include get_theme_file_path('/includes/banners.php'); ?>
  </div>
</main>

<?php get_footer(); ?>
