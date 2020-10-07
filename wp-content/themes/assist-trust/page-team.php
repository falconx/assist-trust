<?php
/* Template Name: The Team */

$rows = (array)get_field('content');

$members = get_posts(array(
  'post_type' => 'team'
));

?>

<?php get_header(); ?>

<main>
  <?php include get_theme_file_path('/includes/slider.php'); ?>

  <div class="container-xl">
    <div class="row py-5">
      <div class="content col-md-12">
        <h1><?php the_title(); ?></h1>

        <ul class="row team">
          <?php foreach($members as $member): ?>
            <li class="col col-12 col-sm-6 col-md-4 col-lg-3">
              <div class="team--member">
                <?php

                $fields = get_fields($member->ID);

                ?>
                <?php echo wp_get_attachment_image($fields['image']['ID'], 'medium'); ?>
                <h2><?php echo $member->post_title; ?></h2>
                <p><?php echo $fields['about']; ?></p>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>

        <?php if (count(array_filter($rows))): ?>
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
          <?php endif; ?>
      </div>
    </div>

    <?php include get_theme_file_path('/includes/banners.php'); ?>
  </div>
</main>

<?php get_footer(); ?>