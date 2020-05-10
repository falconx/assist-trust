<?php
/*
Plugin Name: Assist Trust FAQs
Description: Enables custom post type "FAQs"
*/

add_action('init', 'at_faqs_cpt');
function at_faqs_cpt() {
  register_post_type('faqs', array(
    'labels' => array(
      'name' => __('FAQs'),
      'singular_name' => __('FAQ'),
      'add_new_item' => __('Add FAQ'),
      'not_found' => __('No FAQs found.'),
    ),
    'description' => __('Frequently Asked Questions'),
    'public' => true,
    'publicly_queryable' => false,
    'menu_position' => 20,
    'supports' => array('title', 'custom-fields')
  ));
}