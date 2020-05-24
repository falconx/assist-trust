<?php
/*
Plugin Name: Assist Trust Job Vacancies
Description: Enables custom post type "Job Vacancies"
*/

add_action('init', 'at_jobs_cpt');
function at_jobs_cpt() {
  register_post_type('jobs', array(
    'labels' => array(
      'name' => __('Job Vacancies'),
      'singular_name' => __('Job Vacancies'),
      'add_new_item' => __('Add Job Vacancies'),
      'not_found' => __('No job vacancies found.'),
    ),
    'description' => __('Assist Trust job vacancies'),
    'public' => true,
    'publicly_queryable' => false,
    'menu_position' => 20,
    'supports' => array('title', 'custom-fields')
  ));
}