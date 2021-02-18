<?php

// dynamically display the sidebar if we have content to show
$quote = get_field('quote');

// ensure the required fields are populated
$has_sidebar = $quote['text'] && $quote['author'];

$rows = (array)get_field('content');

$has_title = !is_front_page();
$has_content = count(array_filter($rows)) || $has_title;

?>

<?php get_header(); ?>

<main>
  <?php include get_theme_file_path('/includes/slider.php'); ?>

  <?php if (is_front_page()): ?>
    <h1 class="visually-hidden">Assist Trust</h1>
  <?php endif; ?>

  <div class="container-xl<?php echo ($has_sidebar) ? ' with-sidebar' : '' ?>">
    <?php if ($has_content || $has_sidebar): ?>
      <div class="row py-5">
        <div class="col-md-<?php echo ($has_sidebar) ? '9' : '12'; ?>">
          <div class="content">
            <?php if (!is_front_page()): ?>
              <h1><?php the_title(); ?></h1>
            <?php endif; ?>

            <?php if (count(array_filter($rows))): ?>
              <?php foreach($rows as $row): ?>
                <div class="stack-md">
                  <?php if (isset($row['content'])): ?>
                    <?php echo $row['content']; ?>
                  <?php elseif ($row['grid']): ?>
                    <div class="row mx-sm-n5 grid">
                      <?php foreach($row['grid'] as $gridItem): ?>
                        <div class="col col-12 col-sm-6 px-sm-5">
                          <?php echo $gridItem['content']; ?>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  <?php endif; ?>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </div>

        <?php if ($has_sidebar): ?>
          <section class="sidebar col-md-3 mt-3 mt-md-0" aria-labelledby="quote">
            <h2 id="quote" class="visually-hidden">Quote</h2>

            <?php get_sidebar(); ?>
          </section>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php include get_theme_file_path('/includes/banners.php'); ?>
  </div>
</main>

<?php get_footer(); ?>
