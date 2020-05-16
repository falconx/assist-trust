<?php
/*
Plugin Name: Assist Trust Life Skills
Description: Enables custom post type "Life Skills"
*/

add_action('init', 'at_life_skills_cpt');
function at_life_skills_cpt() {
  register_post_type('life_skills', array(
    'labels' => array(
      'name' => __('Life Skills'),
      'singular_name' => __('Life Skill'),
      'add_new_item' => __('Add Life Skill'),
      'not_found' => __('No life skills found.'),
    ),
    'description' => __('Assist Trust life skills'),
    'public' => true,
    'publicly_queryable' => false,
    'menu_position' => 20,
    'supports' => array('title', 'custom-fields')
  ));
}