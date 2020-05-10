<?php
/*
Plugin Name: Assist Trust Case Studies
Description: Enables custom post type "Case Studies"
*/

add_action('init', 'at_case_studies_cpt');
function at_case_studies_cpt() {
  register_post_type('case_studies', array(
    'labels' => array(
      'name' => __('Case Studies'),
      'singular_name' => __('Case Study'),
      'add_new_item' => __('Add Case Study'),
      'not_found' => __('No case studies found.'),
    ),
    'description' => __('Assist Trust case studies'),
    'public' => true,
    'publicly_queryable' => false,
    'menu_position' => 20,
    'supports' => array('title', 'custom-fields')
  ));
}