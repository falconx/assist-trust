<?php

/**
 * Modification of "Build a tree from a flat array in PHP"
 *
 * Authors: @DSkinner, @ImmortalFirefly and @SteveEdson
 *
 * @link https://stackoverflow.com/a/28429487/2078474
 */
function buildTree(array &$elements, $parentId = 0) {
  $branch = array();

  foreach ($elements as &$element) {
    if ($element->menu_item_parent == $parentId) {
      $children = buildTree($elements, $element->ID);

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
 * @uses  buildTree()
 *
 * @param  String     $menu
 * @return Array|null $tree 
 */
function wp_get_menu_array($menu) {
  $items = wp_get_nav_menu_items($menu);

  return $items ? buildTree($items, 0) : null;
}