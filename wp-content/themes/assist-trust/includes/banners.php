<?php if (have_rows('banners')): ?>
  <?php while (have_rows('banners')): the_row(); ?>
    <div class="banner full-width py-3 py-sm-4 py-md-5">
      <div class="container-xl">
        <?php
        
        $banner = get_sub_field('banner');

        $text = $banner['link']['link_text'];
        $type = $banner['link']['link_type'];

        $destination = ($type === 'internal')
          ? $banner->link->destination->url
          : $banner->link->external_destination;
        
        ?>
        <div class="row mx-sm-n6 mx-lg-n4">
          <div class="col-sm-6 px-lg-4">
            <div class="row row-cols-1 banner--content">
              <div class="col mt-3 mt-sm-0">
                <p><?php echo $banner['text']; ?></p>
              </div>

              <div class="col order-first order-sm-last mt-3">
                <?php if (!empty($text) && !empty($destination)): ?>
                  <a class="button button__primary" href="<?php echo $destination; ?>"<?php if ($type === 'external'): ?> target="_blank" rel="noreferrer noopener"<?php endif; ?>>
                    <?php echo $text; ?>
                  </a>
                <?php endif; ?>
              </div>
            </div>
          </div>

          <div class="col-sm-6 px-lg-4 order-first<?php if ($banner['image_position'] == 'right'): ?> order-sm-last<?php endif; ?>">
            <?php echo wp_get_attachment_image($banner['image'], 'banner'); ?>
          </div>
        </div>
      </div>
    </div>
  <?php endwhile; ?>
<?php endif; ?>
