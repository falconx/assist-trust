<?php
/**
 * Plugin Name: Assist Trust
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