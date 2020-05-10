<?php
/*
Plugin Name: Assist Trust FAQs
Description: Enables custom post type "FAQs"
*/

add_action('init', 'at_faqs_cpt');
function at_faqs_cpt() {
  register_post_type('faqs', array(
    'labels' => array(
      'name' => _x('FAQs'),
      'singular_name' => _x('FAQ'),
      'add_new_item' => _x('Add FAQ'),
      'not_found' => _x('No FAQs found.'),
    ),
    'description' => _x('Frequently Asked Questions'),
    'public' => true,
    'publicly_queryable' => false,
    'menu_position' => 20,
    'supports' => array('title', 'custom-fields')
  ));
}