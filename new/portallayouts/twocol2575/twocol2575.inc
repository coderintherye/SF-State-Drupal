<?php
// $Id

/**
 * Implementation of hook_panels_layouts().
 */
function new_twocol2575_panels_layouts() {
  $items['twocol2575'] = array(
    'title' => t('Two columns with 75% left and 25% right'),
    'icon' => 'twocol2575.png',
    'theme' => 'twocol2575',
    'css' => 'twocol2575.css',
    'panels' => array(
      'left' => t('Left side'),
      'right' => t('Right side')
    ),
  );

  return $items;
}
