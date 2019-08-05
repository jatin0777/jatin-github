
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?php bloginfo('name'); ?> |
        <?php is_front_page() ? bloginfo('description') : wp_title(); ?>
        <?php wp_title; ?></title>
 <meta charset="<?php bloginfo(charset); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="<?php bloginfo('description') ?>">
<!--style-->
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php bloginfo('template_url'); ?>/css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="<?php bloginfo('template_url'); ?>/css/bootstrap-responsive.css" rel="stylesheet" type="text/css"/>
<!--/style-->

<!--jquery-->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/bootstrap.js"></script>

<?php global $template; print_r($template); ?>
<!--jquery-->

<script>
$(document).ready(function() {
$('.navbar .btn-navbar').on('click', function(){
    $(this).addClass('active').siblings().removeClass('active');
});
});

          </script>
<script>

$(document).ready(function() {
  $('.navbar a').hover(function() {
    $(this).children('.logo_cont').fadeIn();
  }, function() {
    $(this).children('.logo_cont').hide(2000);
  });
});


//$(window).load(function() {
	// $('.navbar').hover(function(){
  // When the page has loaded
  //$(".navbar .brand span").show(8000);
//});

</script>
</head>
<body>
  <!--top -->

<?php

$logo = get_field('webiste_logo_small','option');
$logo_contain = get_field('website_logo_contain' , 'option');
$navbar_text_right_1 = get_field('menu-right-content', 'option');
$navbar_text_right_2 = get_field('menu-right-content-2', 'option');
$small_logo = get_field('small_logo','option');
?>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container-fluid">
      <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
       <div class="small_logo"> <a href="#"><img src="<?php echo $small_logo; ?>" alt="logo"></a> </div>

      <a class="brand" href="/jatin/wp-final/">
      <div class="logo_device"><img style="max-height:60px ; max-width:103px; " src="<?php echo $logo; ?>"></div>
      <span class="logo_cont"><img style="max-height:60px ; max-width:200px; " src="<?php echo $logo_contain;?>" alt="logo_cont"></span></a> 
      <!--navigation-->
      
      <div class="nav-collapse collapse">
        <ul class="nav"><li>
          
<?php
            wp_nav_menu( array(
                    'menu'              => 'primary',
                    'theme_location'    => 'primary',
                    'depth'             => 2,
                    'menu_class'        => 'nav navbar-nav',
                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                    'walker'            => new wp_bootstrap_navwalker())
            );
            ?>
          </li>
        </ul>
      </div>

      
      <!--/navigation--> 
      <!--logo_right -->
      <div class="logo_right">
        <ul class="bxslider">
          <li><a href="tel:+919900822910"><?php echo $navbar_text_right_1; ?></span></a></li>
          <li style="color: crimson;"><?php echo $navbar_text_right_2; ?></li>
        </ul>
      </div>
      
      <!--/logo_right --> 
      
    </div>
  </div>
</div>

<!--/top --> 
