<?php
// $Id: block.tpl.php,v 1.3 2007/08/07 08:39:36 goba Exp $
?>
<div id="block-<?php print $block->module .'-'. $block->delta; ?>" class=" block block-<?php print $block->module ?>">
<?php 
  if (is_numeric($block->subject) && strlen($block->subject) == 9) {
    $block->subject = '<none>';
  }
?>
<?php if (!empty($block->subject)): ?>
  <h2><?php print $block->subject ?></h2>
<?php endif;?>

  <?php print $block->content ?>
</div>
