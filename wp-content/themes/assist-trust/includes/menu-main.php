<nav aria-labelledby="main-navigation-heading" hidden>
  <h2 id="main-navigation-heading" class="visually-hidden">Main Navigation</h2>
  <?php

  $menuItems = wp_get_main_menu();

  ?>
  <div id="menu-main-container">
    <div id="menu-main" class="container-xl">
      <ul class="">
        <?php foreach ($menuItems as $item): ?>
          <li class="menu-item">
            <?php if (!empty($item['children'])): ?>
              <button type="button" aria-expanded="false" class="link__animated-inner">
                <span><?php echo $item['title']; ?></span>

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" role="img" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <path d="M53 29H35V11a3 3 0 0 0-6 0v18H11a3 3 0 0 0 0 6h18v18a3 3 0 0 0 6 0V35h18a3 3 0 0 0 0-6z" fill="currentColor"></path>
                </svg>
              </button>

              <div class="sub-menu sub-menu__1">
                <div class="container-xl">
                  <ul class="sub-menu--list">
                    <?php foreach($item['grouped'] as $group): ?>
                      <?php

                      // inline grid styles necessary to support particular grid layout in IE -
                      // with the effect of moving grouped items into their own column
                      $gridColumnIndex = 2;

                      // for ungrouped items
                      $gridRowIndex = 1;

                      ?>
                      <?php if (!empty($group['children'])): ?>
                        <li class="grouped" style="grid-column: <?php echo $gridColumnIndex; ?>; -ms-grid-column: <?php echo $gridColumnIndex++; ?>">
                          <h3 class="d-none d-sm-block">
                            <span><?php echo $group['title']; ?></span>
                          </h3>

                          <button type="button" aria-expanded="false" class="d-sm-none link__animated-inner">
                            <span><?php echo $group['title']; ?></span>

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" role="img" xmlns:xlink="http://www.w3.org/1999/xlink">
                              <path d="M53 29H35V11a3 3 0 0 0-6 0v18H11a3 3 0 0 0 0 6h18v18a3 3 0 0 0 6 0V35h18a3 3 0 0 0 0-6z" fill="currentColor"></path>
                            </svg>
                          </button>

                          <ul class="sub-menu sub-menu__2">
                            <?php foreach($group['children'] as $child): ?>
                              <li>
                                <a href="<?php echo $child['url']; ?>" title="<?php echo $child['title']; ?>" class="link__animated-inner">
                                  <span><?php echo $child['title']; ?></span>
                                </a>
                              </li>
                            <?php endforeach; ?>
                          </ul>
                        </li>
                      <?php else: ?>
                        <?php foreach($group as $child): ?>
                          <li class="ungrouped" style="grid-row: <?php echo $gridRowIndex; ?>; -ms-grid-row: <?php echo $gridRowIndex++; ?>">
                            <a href="<?php echo $child['url']; ?>" title="<?php echo $child['title']; ?>" class="link__animated-inner">
                              <span><?php echo $child['title']; ?></span>
                            </a>
                          </li>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>
            <?php else: ?>
              <a href="<?php echo $item['url']; ?>" title="<?php echo $item['title']; ?>" class="link__animated-inner">
                <span><?php echo $item['title']; ?></span>
              </a>
            <?php endif; ?>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</nav>