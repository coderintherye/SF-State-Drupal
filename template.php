<?php

/**
 * Initialize theme settings
 */
if (is_null(theme_get_setting('sfsu_imagebar_url'))) { 
  global $theme_key;

  // The default values for the theme variables. Make sure $defaults exactly matches the $defaults in the theme-settings.php file.

  $defaults = array(  
    'sfsu_imagebar_url' => 'http://www.sfsu.edu/template/preview/images/imagebox.jpg',
    'sfsu_local_css' => '',
    'sfsu_department' => '',
    'sfsu_department_url' => '',
    'sfsu_show_title' => 1,
    'sfsu_preview_is_popup' => 1,
  );

  // Get default theme settings.
  $settings = theme_get_settings($theme_key);
  // Don't save the toggle_node_info_ variables.
  if (module_exists('node')) {
    foreach (node_get_types() as $type => $name) {
      unset($settings['toggle_node_info_' . $type]);
    }
  }
  // Save default theme settings.
  variable_set(
    str_replace('/', '_', 'theme_'. $theme_key .'_settings'),
    array_merge($defaults, $settings)
  );
  // Force refresh of Drupal internals.
  theme_get_setting('', TRUE);
}

/**
 * Create a breadcrumb with dash delimiters instead of default.  
 */

 function sfsu_breadcrumb($breadcrumb) {
  if (!empty($breadcrumb)) {
    return '<div class="breadcrumb">'. implode(' - ', $breadcrumb) .'</div>';
  }
}

/** 
 * Implementation of THEMEHOOK_menu_item_link().
 * Makes preview a popup if the checkbox is checked to do so in theme settings
 */
  
function sfsu_menu_item_link($link) {
  if(theme_get_setting('sfsu_preview_is_popup')) {
    $link['localized_options'] = array();
    if($link['title'] == 'Preview') {
      //Now just doing things the Drupal 6 way. Drupal 5 code available at http://www.nowarninglabel.com 
      return l($link['title'], $link['href'], $link['localized_options']['attributes']['target'] = '_blank');
    }
    else {
      return l($link['title'], $link['href'], $link['localized_options']);
    }
  }
}

/* 
 * Implementation of theme_filter_tips_more_info().
 * Used here to hide the "More information about formatting options" link.
 */
function phptemplate_filter_tips_more_info() { return ''; }

function phptemplate_form_element($element, $value) {
  $output  = '<div class="form-item"';
  if (!empty($element['#id'])) {
    $output .= ' id="'. $element['#id'] .'-wrapper"';
  }
  $output .= ">\n";
  $required = !empty($element['#required']) ? '<span class="form-required" title="'. t('This field is required.') .'">*</span>' : '';

  if (!empty($element['#title'])) {
    $title = $element['#title'];
    if (!empty($element['#id'])) {
      $output .= ' <label for="'. $element['#id'] .'">'. t('!title: !required', array('!title' => filter_xss_admin($title), '!required' => $required)) ."</label>\n";
    }
    else {
      $output .= ' <label>'. t('!title: !required', array('!title' => filter_xss_admin($title), '!required' => $required)) ."</label>\n";
    }
  }
  if (!empty($element['#description'])) {
    $output .= ' <div class="description">'. $element['#description'] ."</div>\n";
  }
  $output .= " $value\n";

  $output .= "</div>\n";

  return $output;
}

