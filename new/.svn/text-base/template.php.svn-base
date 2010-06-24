<?php
 /**
 * @see theme_menu_local_tasks(), sky_theme()
 * http://api.drupal.org/api/function/theme_menu_local_tasks/6
 *
 * Added: A wrapper <div>'s with class attributes: clearfix class, a helper class
 * indicating what's inside, and id attributes.
 */
function new_menu_local_tasks() {
  $primary = menu_primary_local_tasks();
  $secondary = menu_secondary_local_tasks();

  // What's inside
  if ($primary && $secondary) {
    $helper_class = ' primary-and-secondary';
  }
  else {
    $helper_class = ' primary-only';
  }

  if ($primary || $secondary) {
    $output = '<div class="tab-wrapper clearfix'. $helper_class .'">';

    if ($primary) {
      $output .= "\n".'<div id="tabs-primary" class="tabs primary">'."\n".
      '  <ul>'."\n". $primary .'</ul>'."\n".
      '</div>';
    }
    if ($secondary) {
      $output .= "\n".'<div id="tabs-secondary" class="tabs secondary">'."\n" .
      '  <ul>'."\n". $secondary .'</ul>'."\n" .
      '</div>';
    }
    $output .= '</div>';
  }

  return $output;
}

function new_preprocess_search_block_form(&$vars, $hook) {
  $vars['form']['submit']['#value'] = t('Search SF State Portal');
  $vars['form']['submit']['#type'] = 'image_button';
  $vars['form']['submit']['#src'] = path_to_theme() . '/images/searchbutton.png';

  unset($vars['form']['search_block_form']['#printed']);
  $vars['search']['search_block_form'] = drupal_render($vars['form']['search_block_form']);

  // Rebuild the rendered version (submit button, rest remains unchanged)
  unset($vars['form']['submit']['#printed']);
  $vars['search']['submit'] = drupal_render($vars['form']['submit']);

  // Collect all form elements to make it easier to print the whole form.
  $vars['search_form'] = implode($vars['search']);
}
/*
function new_form_alter(&$form, $form_state, $form_id) {
  if($form_id == 'search_block_form') {  
    $form['#action'] = 'http://google.sfsu.edu/search';
  }
}
*/

function new_breadcrumb($breadcrumb) {
  if (!empty($breadcrumb)) {
    return '<div class="breadcrumb">'. implode(' - ', $breadcrumb) .'</div>';
  }
}
