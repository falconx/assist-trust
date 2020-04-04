<div class="banner">
  <div class="container">
    <div class="row">

      <div class="col-md-6<?php if (get_field('image_position') == 'left'): ?> order-2<?php endif; ?>">
        <div>
      	  <?php the_field('text'); ?>
        </div>
    
        <a class="button button__primary" href="<?php the_field('destination'); ?>">
          <?php the_field('link_text'); ?>
        </a>
      </div>
    
      <div class="col-md-6">
        <img src="<?php the_field('image'); ?>" alt="" />
      </div>

    </div>
  </div>
</div>