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

                <div class="sub-menu">
                  <div class="container-xl">
                    <div class="sub-menu--list">
                      <?php foreach($item['grouped'] as $group): ?>
                        <?php if (!empty($group['children'])): ?>
                          <div>
                            <h3>
                              <span><?php echo $group['title']; ?></span>
                            </h3>

                            <ul class="">
                              <?php foreach($group['children'] as $child): ?>
                                <li>
                                  <a href="<?php echo $child['url']; ?>" title="<?php echo $child['title']; ?>" class="link__animated-inner">
                                    <span><?php echo $child['title']; ?></span>
                                  </a>
                                </li>
                              <?php endforeach; ?>
                            </ul>
                          </div>
                        <?php else: ?>
                          <ul class="">
                            <?php foreach($group as $child): ?>
                              <li>
                                <a href="<?php echo $child['url']; ?>" title="<?php echo $child['title']; ?>" class="link__animated-inner">
                                  <span><?php echo $child['title']; ?></span>
                                </a>
                              </li>
                            <?php endforeach; ?>
                          </ul>
                        <?php endif; ?>
                      <?php endforeach; ?>
                    </div>
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
  </div>
</nav>