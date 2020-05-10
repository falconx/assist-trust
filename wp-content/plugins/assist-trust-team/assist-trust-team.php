<?php
/*
Plugin Name: Assist Trust Team
Description: Enables custom post type "Team"
*/

add_action('init', 'at_team_cpt');
function at_team_cpt() {
  register_post_type('team', array(
    'labels' => array(
      'name' => _x('The Team'),
      'singular_name' => _x('The Team'),
      'add_new_item' => _x('Add Team Member'),
      'not_found' => _x('No team members found.'),
    ),
    'description' => _x('The Assist Trust team'),
    'public' => true,
    'publicly_queryable' => false,
    'menu_position' => 20,
    'supports' => array('title', 'custom-fields')
  ));
}