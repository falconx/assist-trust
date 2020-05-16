<?php
/*
Plugin Name: Assist Trust Timeline
Description: Enables custom post type "Timeline"
*/

add_action('init', 'at_timeline_cpt');
function at_timeline_cpt() {
  register_post_type('timeline', array(
    'labels' => array(
      'name' => __('Timeline'),
      'singular_name' => __('Timeline'),
      'add_new_item' => __('Add Timeline Entry'),
      'not_found' => __('No timeline entries found.'),
    ),
    'description' => __('Assist Trust timeline'),
    'public' => true,
    'publicly_queryable' => false,
    'menu_position' => 20,
    'supports' => array('title', 'custom-fields')
  ));
}