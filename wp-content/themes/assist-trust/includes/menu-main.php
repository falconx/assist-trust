<nav aria-labelledby="main-navigation-heading" hidden>
  <h2 id="main-navigation-heading" class="visually-hidden">Main Navigation</h2>
  <?php

  $menuItems = wp_get_menu_array('Main');

  // Note that this template only supports rendering two levels deep

  $slides = (array)get_field('slides');
  $slideCount = count(array_filter($slides));

  // only apply a shadow if there is slider on the page
  $withShadow = !$slideCount;

  ?>

  <div class="menu-main-container<?php if ($withShadow): ?> with-shadow<?php endif; ?>">
    <div id="menu-main" class="menu-main">
      <ul class="menu-list menu-list__1">
        <?php foreach ($menuItems as $item): ?>
          <li class="menu-item menu-item__1">
            <button class="menu-link menu-link__1" type="button" aria-expanded="false">
              <span><?php echo $item['title']; ?></span>

              <svg role="presentation" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" xmlns:xlink="http://www.w3.org/1999/xlink">
                <path fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="6" d="M31.999 50V14" stroke-linejoin="round" stroke-linecap="round"></path>
                <path fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="6" d="M18 36l14 14 14-14" stroke-linejoin="round" stroke-linecap="round"></path>
              </svg>
            </button>

            <?php if (isset($item['children'])): ?>
              <div class="mega-menu sub-menu">
                <div class="mega-menu--content">
                  <ul class="menu-list menu-list__2">
                    <?php foreach ($item['children'] as $subItem): ?>
                      <li class="menu-item menu-item__2">
                        <a class="menu-link menu-link__2" href="<?php echo $subItem['url']; ?>" title="<?php echo $subItem['title']; ?>">
                          <span><?php echo $subItem['title']; ?></span>
                        </a>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>
            <?php endif; ?>
          </li>
        <?php endforeach; ?>
      </ul>

      <div class="d-none d-sm-block">
        <a href="<?php echo get_field('donate_url', 'option'); ?>" target="_blank" rel="noreferrer noopener" class="button button__primary button__donate">Donate</a>
      </div>
    </div>
  </div>
</nav>