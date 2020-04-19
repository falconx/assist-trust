<?php

function wp_get_menu_array($currentMenu) {
  $arrayMenu = wp_get_nav_menu_items($currentMenu);
  $menu = array();

  foreach ($arrayMenu as $m) {
    if (empty($m->menu_item_parent)) {
      $menu[$m->ID] = array();
      $menu[$m->ID]['ID'] = $m->ID;
      $menu[$m->ID]['title'] = $m->title;
      $menu[$m->ID]['url'] = $m->url;
      $menu[$m->ID]['children'] = array();
    }
  }

  $submenu = array();

  foreach ($arrayMenu as $m) {
    if ($m->menu_item_parent) {
      $submenu[$m->ID] = array();
      $submenu[$m->ID]['ID'] = $m->ID;
      $submenu[$m->ID]['title'] = $m->title;
      $submenu[$m->ID]['url'] = $m->url;
      $menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
    }
  }

  return $menu;
}