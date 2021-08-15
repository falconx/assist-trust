<?php

add_theme_support('title-tag');

/**
 * Modification of "Build a tree from a flat array in PHP"
 *
 * Authors: @DSkinner, @ImmortalFirefly and @SteveEdson
 *
 * @link https://stackoverflow.com/a/28429487/2078474
 */
function build_tree(array &$elements, $parentId = 0) {
  $branch = array();

  foreach ($elements as &$element) {
    if ($element->menu_item_parent == $parentId) {
      $children = build_tree($elements, $element->ID);

      if ($children) {
        $branch[$element->ID]['children'] = $children;
      }

      $branch[$element->ID]['ID'] = $element->ID;
      $branch[$element->ID]['title'] = $element->title;
      $branch[$element->ID]['url'] = $element->url;

      unset($element);
    }
  }

  return $branch;
}

/**
 * Transform a navigational menu to it's tree structure
 *
 * @uses build_tree()
 *
 * @param String $menu
 * @return Array|null $tree 
 */
function wp_get_menu_array($menu) {
  $items = wp_get_nav_menu_items($menu);

  return $items ? build_tree($items, 0) : null;
}

add_image_size('banner', 600, 400, true);
add_image_size('slider', 1260, 360, true);
add_image_size('case-study', 520, 416, true);
add_image_size('history-thumbnail', 163, 136, true);
add_image_size('quote-thumbnail', 360, 288, true);

add_filter('max_srcset_image_width', 'max_srcset_image_width', 10 , 2);
function max_srcset_image_width() {
  return 1920; // max width in pixels
}

add_cap('editor', 'edit_theme_options');
function add_cap($role, $cap) {
  $role = get_role($role);
  $role->add_cap($cap);
}

function wpdocs_excerpt_more($more) {
  return '…';
}

add_filter('excerpt_more', 'wpdocs_excerpt_more');
