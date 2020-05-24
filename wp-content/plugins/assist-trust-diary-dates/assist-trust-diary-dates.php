<?php
/*
Plugin Name: Assist Trust Diary Dates
Description: Enables custom post type "Diary Dates"
*/

add_action('init', 'at_diary_dates_cpt');
function at_diary_dates_cpt() {
  register_post_type('diary_dates', array(
    'labels' => array(
      'name' => __('Diary Dates'),
      'singular_name' => __('Diary Dates'),
      'add_new_item' => __('Add Diary Dates'),
      'not_found' => __('No diary dates found.'),
    ),
    'description' => __('Assist Trust diary dates'),
    'public' => true,
    'publicly_queryable' => false,
    'menu_position' => 20,
    'supports' => array('title', 'custom-fields')
  ));
}