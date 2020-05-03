<svg hidden>
  <symbol id="arrow-left" viewBox="0 0 10 10">
    <path fill="currentColor" d="m9 4h-4v-2l-4 3 4 3v-2h4z"/>
  </symbol>
  <symbol id="arrow-right" viewBox="0 0 10 10">
    <path fill="currentColor" d="m1 4h4v-2l4 3-4 3v-2h-4z"/>
  </symbol>
</svg>

<div class="slider--wrapper">
  <div role="region" class="slider" aria-labelledby="slider-heading" tabindex="0" aria-describedby="instructions">
    <h2 id="slider-heading" class="visually-hidden">Slider</h2>

    <ul>
      <li>
        <figure>
          <img src="https://dummyimage.com/1200x400/000/fff" alt="" />
          <figcaption>[caption here]</figcaption>
        </figure>
      </li>
      <li>
        <figure>
          <img src="https://dummyimage.com/1200x400/888/fff" alt="" />
          <figcaption>[caption here]</figcaption>
        </figure>
      </li>
      <li>
        <figure>
          <img src="https://dummyimage.com/1200x400/555/fff" alt="" />
          <figcaption>[caption here]</figcaption>
        </figure>
      </li>
    </ul>
  </div>

  <ul class="slider--controls" aria-label="slider controls">
    <li>
      <button type="button" id="previous" aria-label="previous">
        <svg aria-hidden="true" focusable="false">
          <use xlink:href="#arrow-left"></use>
        </svg>
      </button>
    </li>
    <li>
      <button type="button" id="next" aria-label="next">
        <svg aria-hidden="true" focusable="false">
          <use xlink:href="#arrow-right"></use>
        </svg>
      </button>
    </li>
  </ul>

  <ul class="slider--nav" aria-label="slider navigation">
    <li>
      <button type="button">
        <span class="visually-hidden">move to slide 1</span>
      </button>
    </li>
    <li>
      <button type="button">
        <span class="visually-hidden">move to slide 2</span>
      </button>
    </li>
    <li>
      <button type="button">
        <span class="visually-hidden">move to slide 3</span>
      </button>
    </li>
  </ul>
</div>