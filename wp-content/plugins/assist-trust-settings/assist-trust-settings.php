<?php
/*
	Plugin Name: Assist Trust Settings
	Description: ACF Settings page for Assist Trust
*/

class AssistTrustSettings {
  public function __construct() {
    // Hook into the admin menu
    add_action('admin_menu', array($this, 'create_plugin_settings_page'));
    add_action('admin_init', array($this, 'add_acf_variables'));

    include_once(realpath(plugin_dir_path(__FILE__) . '../advanced-custom-fields-pro/acf.php'));

    $this->setup_options();
  }

  public function update_acf_settings_path($path) {
    $path = realpath(plugin_dir_path(__FILE__) . '../advanced-custom-fields-pro/');
    return $path;
  }

  public function update_acf_settings_dir($dir) {
    $dir = realpath(plugin_dir_url(__FILE__) . '../advanced-custom-fields-pro/');
    return $dir;
  }

  public function create_plugin_settings_page() {
    // Add the menu item and page
    $page_title = 'Assist Trust Settings';
    $menu_title = 'Assist Trust Settings';
    $capability = 'edit_pages';
    $slug = 'assist_settings';
    $callback = array($this, 'plugin_settings_page_content');
    $icon = 'dashicons-admin-plugins';
    $position = 100;

    add_menu_page($page_title, $menu_title, $capability, $slug, $callback, $icon, $position);
  }

  public function plugin_settings_page_content() {
    do_action('acf/input/admin_head');
    do_action('acf/input/admin_enqueue_scripts');

    $options = array(
      'id' => 'acf-form',
      'post_id' => 'options',
      'new_post' => false,
      'field_groups' => array('group_5eb6ab6334f68'),
      'return' => admin_url('admin.php?page=assist_settings'),
      'submit_value' => 'Update',
    );

    acf_form($options);
  }

  public function add_acf_variables() {
    acf_form_head();
  }

  public function setup_options() {
    if(function_exists('acf_add_local_field_group')):
      acf_add_local_field_group(array(
        'key' => 'group_5eb6ab6334f68',
        'title' => 'Assist Trust Settings',
        'fields' => array(
          array(
            'key' => 'field_5eb6abeffc3aa',
            'label' => 'Slogan',
            'name' => 'slogan',
            'type' => 'textarea',
            'instructions' => '',
            'required' => 1,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'maxlength' => '',
            'rows' => 3,
            'new_lines' => 'br',
          ),
          array(
            'key' => 'field_5eb6ac09fc3ab',
            'label' => 'YouTube URL',
            'name' => 'youtube_url',
            'type' => 'url',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
          ),
          array(
            'key' => 'field_5eb6ac4afc3ac',
            'label' => 'Twitter URL',
            'name' => 'twitter_url',
            'type' => 'url',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
          ),
          array(
            'key' => 'field_5eb6ac58fc3ad',
            'label' => 'Facebook URL',
            'name' => 'facebook_url',
            'type' => 'url',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
          ),
          array(
            'key' => 'field_5eb6ac61fc3ae',
            'label' => 'Instagram URL',
            'name' => 'instagram_url',
            'type' => 'url',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
          ),
          array(
            'key' => 'field_5eb6ac6bfc3af',
            'label' => 'Phone Number',
            'name' => 'phone_number',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
          array(
            'key' => 'field_5eb6ac82fc3b0',
            'label' => 'Email Address',
            'name' => 'email_address',
            'type' => 'email',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
          ),
          array(
            'key' => 'field_5eb6ac90fc3b1',
            'label' => 'Donate URL',
            'name' => 'donate_url',
            'type' => 'url',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
          ),
          array(
            'key' => 'field_601ec061212ce',
            'label' => 'Mailing List URL',
            'name' => 'mailing_list_url',
            'type' => 'url',
            'instructions' => '',
            'required' => 1,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
          ),
          array(
            'key' => 'field_5eb6aca3fc3b2',
            'label' => 'Charity Number',
            'name' => 'charity_number',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
          array(
            'key' => 'field_5eb6acabfc3b3',
            'label' => 'Company Number',
            'name' => 'company_number',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
          array(
            'key' => 'field_5ec97a1ff5bd6',
            'label' => 'Training Days (annual closures)',
            'name' => 'training_days_dates',
            'type' => 'repeater',
            'instructions' => 'Displayed on the Diary Dates page',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'collapsed' => '',
            'min' => 0,
            'max' => 0,
            'layout' => 'table',
            'button_label' => 'Add Date',
            'sub_fields' => array(
              array(
                'key' => 'field_5ec97a2bf5bd7',
                'label' => 'Date',
                'name' => 'date',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                  'width' => '',
                  'class' => '',
                  'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
              ),
            ),
          ),
          array(
            'key' => 'field_5ec97aa5f5bd8',
            'label' => 'Christmas (annual closures)',
            'name' => 'christmas_dates',
            'type' => 'repeater',
            'instructions' => 'Displayed on the Diary Dates page',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'collapsed' => '',
            'min' => 0,
            'max' => 0,
            'layout' => 'table',
            'button_label' => 'Add Date',
            'sub_fields' => array(
              array(
                'key' => 'field_5ec97ad9f5bd9',
                'label' => 'Date',
                'name' => 'date',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                  'width' => '',
                  'class' => '',
                  'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
              ),
            ),
          ),
        ),
        'location' => array(
          array(
            array(
              'param' => 'post_type',
              'operator' => '==',
              'value' => 'post',
            ),
          ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => false,
        'description' => 'Only used for the purpose of exporting to the Assist Trust Settings plugin',
      ));
    endif;
  }
}

new AssistTrustSettings();