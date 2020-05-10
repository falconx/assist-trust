<?php
/*
Plugin Name: Assist Trust Team
Description: Enables custom post type "Team"
*/

add_action('init', 'at_team_cpt');
function at_team_cpt() {
  register_post_type('team', array(
    'labels' => array(
      'name' => __('The Team'),
      'singular_name' => __('The Team'),
      'add_new_item' => __('Add Team Member'),
      'not_found' => __('No team members found.'),
    ),
    'description' => __('The Assist Trust team'),
    'public' => true,
    'publicly_queryable' => false,
    'menu_position' => 20,
    'supports' => array('title', 'custom-fields')
  ));
}