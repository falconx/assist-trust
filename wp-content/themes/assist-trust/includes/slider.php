<?php

$slides = (array)get_field('slides');

// filter out slide entries which have no images attached
$slides = array_filter($slides, function($slide) {
  return $slide['image']['ID'];
});

$slideCount = count($slides);

?>

<?php if ($slideCount): ?>
  <section aria-labelledby="slider-heading">
    <svg hidden>
      <symbol id="arrow-left" viewBox="0 0 10 10">
        <path fill="currentColor" d="m9 4h-4v-2l-4 3 4 3v-2h4z"></path>
      </symbol>
      <symbol id="arrow-right" viewBox="0 0 10 10">
        <path fill="currentColor" d="m1 4h4v-2l4 3-4 3v-2h-4z"></path>
      </symbol>
    </svg>

    <div class="slider--wrapper">
      <div class="slider">
        <h2 id="slider-heading" class="visually-hidden">Slider</h2>

        <ul>
          <?php foreach($slides as $slide): ?>
            <li>
              <figure>
                <?php echo wp_get_attachment_image($slide['image']['ID'], 'slider'); ?>

                <?php if ($slide['image']['alt']): ?>
                  <figcaption><?php echo $slide['image']['alt']; ?></figcaption>
                <?php endif; ?>
              </figure>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <?php if ($slideCount > 1): ?>
        <ul class="slider--controls" aria-label="slider controls">
          <li>
            <button type="button" id="previous" aria-label="previous">
              <img src="<?php echo get_bloginfo('template_directory'); ?>/images/arrow.svg" alt="arrow pointing left" />
            </button>
          </li>
          <li>
            <button type="button" id="next" aria-label="next">
              <img src="<?php echo get_bloginfo('template_directory'); ?>/images/arrow.svg" alt="arrow pointing right" />
            </button>
          </li>
      	</ul>

        <ul class="slider--nav" aria-label="slider navigation">
          <?php for($i = 0; $i < count($slides); $i++): ?>
            <li class="<?php if ($i === 0): ?>active<?php endif; ?>">
              <button type="button">
                <span class="visually-hidden">move to slide <?php echo $i + 1; ?></span>
              </button>
            </li>
          <?php endfor; ?>
        </ul>
      <?php endif; ?>
    </div>
  </section>
<?php endif; ?>
