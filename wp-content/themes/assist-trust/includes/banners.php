<?php if (have_rows('banners')): ?>
  <div>
    <?php while (have_rows('banners')): the_row(); ?>
      <div class="banner full-width py-3 py-sm-4 py-md-5">
        <div class="container-xl">
          <?php
          
          $banner = get_sub_field('banner');
          
          ?>
          <div class="row mx-sm-n6 mx-lg-n4">
            <div class="col-sm-6 px-lg-4">
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

            <div class="col-sm-6 px-lg-4 order-first<?php if ($banner['image_position'] == 'right'): ?> order-sm-last<?php endif; ?>">
              <?php echo wp_get_attachment_image($banner['image']['ID'], 'banner'); ?>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
<?php endif; ?>
