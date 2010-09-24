<?php
/**
  * Implementation of THEMEHOOK_settings() function.
  *
  * @param $saved_settings
  *   array An array of saved settings for this theme.
  * @return
  *   array A form array.
  */
function sfsu_settings($saved_settings) {
/**
  * The default values for the theme variables. Make sure $defaults exactly
  * matches the $defaults in the template.php file.
  */
  $defaults = array(
    'sfsu_imagebar_url' => 'http://www.sfsu.edu/template/preview/images/imagebox.jpg',
    'sfsu_local_css' => '',
    'sfsu_department' => '',
    'sfsu_department_url' => '',
    'sfsu_show_title' => 1,
    'sfsu_preview_is_popup' => 1,
  );

  $settings = array_merge($defaults, $saved_settings);
  $form['sfsu_imagebar_url'] = array(
    '#type' => 'textfield',
    '#title' => t('The URL to your custom imagebar'),
    '#description' => t('This is the fully qualified URL to a imagebar image for the header of your site. e.g., http://www.sfsu.edu/template/preview/images/imagebar.jpg'),
    '#default_value' => $settings['sfsu_imagebar_url'],
  );

  $form['sfsu_local_css'] = array(
    '#type' => 'textfield',
    '#title' => t('The URL to your custom CSS'),
    '#description' => t('This is the fully qualified URL to a custom stylesheet. e.g., http://www.sfsu.edu/template/preview/includes/local.css'),
    '#default_value' => $settings['sfsu_local_css'],
  );

  $form['sfsu_department'] = array(
    '#type' => 'textfield',
    '#title' => t('College or Department Name'),
    '#description' => t('The College or Department Name is optional. If set, it will appear to the right of the site name in the header in {} brackets'),
    '#default_value' => $settings['sfsu_department'],
  );
  $form['sfsu_department_url'] = array(
    '#type' => 'textfield',
    '#title' => t('Link to College or Department web site'),
    '#description' => t('Link to the College or Department Name which is optional. If set along with the department name then it will make it a link.'),
    '#default_value' => $settings['sfsu_department_url'],
  );
 $form['sfsu_show_title'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show the node title on the page as an H1'),
    '#description' => t('If set then the node title will be displayed above the breadcrumbs but below the tabs on the page'),
    '#default_value' => $settings['sfsu_department_url'],
  );
  $form['sfsu_preview_is_popup'] = array(
    '#type' => 'checkbox',
    '#title' => t('Make preview a popup'),
    '#description' => t('This settings make it easier to preview content by making it the preview tab link a popup'),
    '#default_value' => $settings['sfsu_preview_is_popup'],
  );


  // Return the additional form widgets
  return $form;
}
