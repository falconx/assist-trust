<?php
/*
	Plugin Name: Assist Trust
	Description: Core setup to support Assist Trust
*/

add_filter('allowed_block_types', 'at_allowed_block_types');
function at_allowed_block_types($allowed_blocks) {
  return array(
    'core/image',
    'core/paragraph',
    'core/heading',
    'core/list',
    'core/quote',
    'core/table',
    'core/freeform',
    'core/spacer',
    'acf/banner',
  );
}

add_action('acf/init', 'at_acf_init');
function at_acf_init() {
  if (function_exists('acf_register_block')) {
    acf_register_block(array(
      'name' => 'banner',
      'title' => __('Banner'),
      'description' => __('Banner block.'),
      'render_callback' => 'at_acf_block_render_callback',
      'category' => 'common',
      'icon' => 'format-image',
      'post_types' => array('post', 'page'),
      'enqueue_style' => get_template_directory_uri() . '/blocks/block-banner.css',
    ));
  }
}

function at_acf_block_render_callback($block) {
  $slug = str_replace('acf/', '', $block['name']);

  if (file_exists(get_theme_file_path("/blocks/block-${slug}.php"))) {
    include(get_theme_file_path("/blocks/block-${slug}.php"));
  }
}

add_action('admin_init', 'at_admin_init');
function at_admin_init() {
  // hide default content field
  remove_post_type_support('page', 'editor');
}

add_action('wp_dashboard_setup', 'remove_draft_widget', 999);
function remove_draft_widget() {
  remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
}

add_filter('pre_get_posts', 'prefix_limit_post_types_in_search');
function prefix_limit_post_types_in_search($query) {
  if ($query->is_search) {
    $query->set('post_type', array('post'));
  }

  return $query;
}