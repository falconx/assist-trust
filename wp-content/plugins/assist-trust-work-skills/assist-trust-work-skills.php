<?php
/*
Plugin Name: Assist Trust Work Skills
Description: Enables custom post type "Work Skills"
*/

add_action('init', 'at_work_skills_cpt');
function at_work_skills_cpt() {
  register_post_type('work_skills', array(
    'labels' => array(
      'name' => __('Work Skills'),
      'singular_name' => __('Work Skill'),
      'add_new_item' => __('Add Work Skill'),
      'not_found' => __('No Work skills found.'),
    ),
    'description' => __('Assist Trust Work skills'),
    'public' => true,
    'publicly_queryable' => false,
    'menu_position' => 20,
    'supports' => array('title', 'custom-fields')
  ));
}