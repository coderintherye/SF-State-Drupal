<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">

<!-- *****************************************************
Template Version 1.05 - 05/06/09

SF State Web Template Read Me

Use of this template constitutes an agreement to follow the SF State Web Template Guidelines at
http://www.sfsu.edu/template and to meet California Government Code 11135, implementing Section 508 legislation at http://www.sfsu.edu/~dprc/access/  before publishing pages to the Web.

1. Template overview: http://www.sfsu.edu/template/
2. Accessibility Review: http://www.sfsu.edu/access/webaccess/
***************************************************** -->

<?php $sfsu_department = theme_get_setting('sfsu_department'); if($sfsu_department) { $sfsu_department_with_dash = $sfsu_department .' - ' ;} ?>
<head>
<meta name="viewport" content="width=900" />
<?php print $head ?>
<title><?php print check_plain($title) .' - '. check_plain($sfsu_department_with_dash) .'San Francisco State University' ?></title>
<?php print $styles ?>

<?php $sfsu_imagebar_url = theme_get_setting('sfsu_imagebar_url'); ?>
  <?php if($sfsu_imagebar_url) { ?>
    <style type="text/css">
      #imagestripe  {width:100%; background:#333333 url(<?php print $sfsu_imagebar_url ?>) repeat-x 50% 0;}
      #imagebox  {width:100%; max-width:900px; height:60px; margin:auto; padding:0; background:#333333 url(<?php print $sfsu_imagebar_url ?>) repeat-x 50% 0;}
    </style>
<?php } ?>
</head>

<body>
	<!-- o utility -->
		<div id="utilitystripe"><ul class="skiplinks"><li><a class="skip" href="#main">Skip to main content</a></li><li><a class="skip" href="#nav">Skip to local site navigation</a></li><li><a class="skip" href="#sidebar">Skip to sidebar</a></li></ul><div id="utilitybox"><ul><li id="sfsutype"><a href="http://www.sfsu.edu/">San Francisco State University</a></li><li><a href="http://www.sfsu.edu/">Home</a></li><li><a href="http://www.sfsu.edu/login.htm">Login</a></li><li><a href="http://www.sfsu.edu/calendar/">Calendar</a></li><li><a href="http://www.sfsu.edu/atoz/">A&ndash;Z Index</a></li><li><a
		href="http://www.sfsu.edu/search.htm">Search Tools</a></li>	<li><form action="http://google.sfsu.edu/search" method="get" title="Search SF State">
			      						<div>
			      							<span class="readernote"><label for="search">Search SF State</label></span>
			      							<input class="searchbox" type="text" id="search" name="q" size="12" maxlength="50" value="" />
			      							<input class="searchbutton" type="image" src="<?php print base_path() . path_to_theme() ?>/images/searchbutton.png" alt="Search SF State" />
			      						</div> 
			      					</form>

			      				</li>
		</ul></div></div><!-- x utility -->
		
<!-- o site --><div id="sitestripe">
  <div id="sitebox">
    <h2>
      <a class="site" href="<?php print $base_path ?>"><?php if($site_name) {print $site_name;} else {print 'Home';} ?></a>
      <?php if($sfsu_department) { ?>
        <a class="parent" href="<?php print $sfsu_department_url ?>"> {<?php print $sfsu_department ?>}</a>
      <?php } ?>
    </h2>
  </div>
</div><!-- x site -->

<!-- o image --><div id="imagestripe">
  <div id="imagebox"> <span class="readernote">Image: Photos of SF State students and scenes from around campus</span>
    <div id="promobox">
      <h2><?php if($promobox) print $promobox; ?></h2>
    </div>
  </div>
</div><!-- x image -->

<!-- o content -->
<div id="contentstripe"><div id="contentbox">
<!-- o nav -->
    <div id="nav">
    <?php #$menu_name = variable_get('menu_primary_links_source', 'primary-links'); ?>
    <?php #if ($menu_name): ?>
      <!--<div id="primary">
        <?php #print menu_tree($menu_name); ?>
      </div>-->
    <?php #endif; ?>
    <!--This prints the what you have placed in the left block. Place navigation here via the block administration page to comply with template --> 
      <!-- left is used for 6.x themes -->
      <?php if($left): ?>
      <div id="sidebar-left" class="column sidebar">
        <?php print $left; ?>
      </div> <!-- /sidebar-left -->       
      <?php endif; ?>
      <?php if($sidebar_left): ?>
        <div id="sidebar-left">
          <div id="sidebar-left-inner">
            <!-- sidebar left is used for 5.x themes --> 
            <?php print $sidebar_left; ?>
          </div>
        </div> 
        <!-- /#sidebar-left-inner, /#sidebar-left -->
      <?php endif; ?>
    </div>
<!-- x nav -->

<!-- o sidebar -->
    <div id="sidebar">
    <!-- shows the blocks you place in right sidebar -->
    <!-- Sidebar right is used for 5.x themes -->
    <?php if ($sidebar_right): ?>
        <div id="sidebar-right" class="sidebar">
          <?php print $sidebar_right ?>
        </div>
      <?php endif; ?>
<!-- Right is used for 6.x themes --> 
<?php if ($right): ?>
        <div id="sidebar-right" class="sidebar">
          <?php print $right ?>
        </div>
      <?php endif; ?>
<!--<p>&nbsp;</p>-->
</div>
<!-- x sidebar -->
<!-- o main --><div id="main">
  <?php if ($tabs): print '<div id="tabs-wrapper" class="">'; endif; ?>
  <?php if ($tabs): print '<ul class="tabs primary">'. $tabs . $newnode . '</ul></div>'; endif; ?>
    <?php if (isset($tabs2)): print $tabs2; endif; ?>
  <?php if ($messages): print $messages; endif; ?>
  <?php if ($title && theme_get_setting('sfsu_show_title')): print '<h1>'. check_plain($title) .'</h1>'; endif; ?>
  <?php $bc = drupal_get_breadcrumb(); ?>
  <?php if ($bc && user_access('access content')) {
     foreach($bc as $bc_loop) {
       $bc2 .= ' &gt; '. $bc_loop;
     }
     if($bc2[1] == '&') {
       $bc2 = substr($bc2, 5);
     }
     $breadcrumb_display = '<p id="top">'. $bc2 .'</p>';
       #print $breadcrumb_display;
     }
     if($content && user_access('access content')) {
       print $content;
     }
  ?>
</div><!-- x main -->
<div class="clearfloat"></div>
</div>
</div>
<!-- x content -->

<!-- javascript -->
<script type="text/javascript" src="<?php print base_path() . path_to_theme() ?>/includes/global.js"></script>
<?php print $scripts; ?>
<!-- o footer -->
<div id="footerstripe">
<div id="footerbox"><a href="http://www.sfsu.edu/" title="" ><img src="<?php print base_path() . path_to_theme() ?>/images/logo.png" alt="SF State Home" width="165" height="50" /></a>
<ul>
<li class="first"><a href="http://www.sfsu.edu/">SF State Home</a></li>
<li><a href="http://www.sfsu.edu/emailref.htm">Contact</a></li>
<li>1600 Holloway Avenue . San Francisco . CA 94132 . Tel (415) 338-1111</li>
</ul>
</div>
</div>
<!-- x footer -->
<div class="clearfloat"></div>
<?php print $closure ?>
</body>
</html>
