<?php
/*
Plugin Name: Assist Trust Timeline
Description: Enables custom post type "Timeline"
*/

add_action('init', 'at_timeline_cpt');
function at_timeline_cpt() {
  register_post_type('timeline', array(
    'labels' => array(
      'name' => _x('Timeline'),
      'singular_name' => _x('Timeline'),
      'add_new_item' => _x('Add Timeline Entry'),
      'not_found' => _x('No timeline entries found.'),
    ),
    'description' => _x('Assist Trust timeline'),
    'public' => true,
    'publicly_queryable' => false,
    'menu_position' => 20,
    'supports' => array('title', 'custom-fields')
  ));
}