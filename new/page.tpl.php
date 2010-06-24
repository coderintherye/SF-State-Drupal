<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <title><?php print strip_tags($title) . ' - Portal - San Francisco State University' ?></title>
    <meta http-equiv="Content-Type" content="text/css" />
  <?php print $head ?>
  <?php print $styles ?>
  <?php print $scripts ?>
  <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyle Content in IE */ ?> </script>
 </head>
<body>
<!-- o utility --> 
<div id="utilitystripe"> 
  <ul class="skiplinks"> 
    <li><a class="skip" href="#main">Skip to main content</a></li> 
  </ul> 
  <div id="utilitybox"> 
  </div> 
</div> 
<!-- x utility --> 
<!-- o image -->
<div id="imagestripe">
  <div id="promobox">
    <span class="readernote">Image: Artistic inkblot with the words My SF State splashed over it</span>
    <img width="280" height="73" src="<?php print $logo; ?>" alt="The official San Francisco State University logo" />
      <p class="welcomename"><?php if (isset($_SERVER[surname]) && isset($_SERVER[givenName])) {print 'Welcome, '. check_plain($_SERVER[givenName]) .' '. check_plain($_SERVER[surname]);} ?></p>
      <p class="headerdate"><?php print date('l, F d, Y'); ?></p>
      <?php if($user->uid) { 
          print '<p><a href="'. $base_path .'logout">Log out</a></p>'; 
        } 
        else {
          print '<p><a href="'. $base_path .'user">Login</a></p>';
        }
      ?>
      
      <p><a href="<?php print $base_path .'emailinfo' ?>">E-mail</a></p>
    <?php if($header) { print $header; } ?>
  </div>
</div>
<div class="clearfloat"></div>
<!-- x image -->
<!-- o content -->
<div id="contentstripe">
<div id="contentbox">
<!-- o content -->
<!-- o main -->
<div id="main">
	<div id="navigation">
		<!-- <div class="wrap-center"> -->
			<?php print theme('links', $primary_links) ?>			
		<!-- </div> -->
	</div>
	<div id="content" class="clearfix">
		  <?php 
		  if ($tabs) {
		  	print $tabs.'<div class="clearfloat"></div>';
		  }
		  if ($messages){
		  	print $messages;	
		  }
		  if ($user->uid) {
		   $bc = drupal_get_breadcrumb();
			if($bc[2]) {
				$bc2 = ' &gt; '.$bc[2];
				  if($bc[3]) {
					$bc2 .= ' &gt; '.$bc[3];
					if($bc[4]) {
					  $bc2 .= ' &gt; '.$bc[4];
					  if($bc[5]) {
						$bc2 .= ' &gt; '.$bc[5];
					  }
					}
				  }
			  }
	   	    if($bc) {
				$breadcrumb_display = '<p id="top">'.$bc[1].$bc2.'</p>';
				print $breadcrumb_display;
		    }
		  print $content; ?>
	    <?php } ?>
	</div>
</div>
<!-- x main -->
<div class="clearfloat"></div>
</div>
</div>
<!-- x content -->
<!-- o footer -->
<div id="footerstripe">
<div id="footerbox">
<ul>
<li class="first"><a href="http://www.sfsu.edu/">SF State Home</a></li>
<li>1600 Holloway Avenue . San Francisco . CA 94132 . Tel (415) 338-1111</li>
</ul>
</div>
</div>
<!-- x footer -->
<div class="clearfloat"></div>
<?php print $closure ?>
</body>
</html>
