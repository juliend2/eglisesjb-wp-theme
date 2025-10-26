<!DOCTYPE html>
<html class="wide wow-animation" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">

	<meta name="viewport" content="width=device-width height=device-height initial-scale=1.0 maximum-scale=1.0 user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css2?family=Libre+Baskerville&amp;family=Work+Sans:wght@300;400;600&amp;display=swap">


    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="page">
      <!-- Page Header-->
      <header class="section page-header">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-minimal" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="15px" data-xl-stick-up-offset="15px" data-xxl-stick-up-offset="15px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-main-outer">
              <div class="rd-navbar-main">
                <!-- RD Navbar Panel-->
                <div class="rd-navbar-panel">
                  <!-- RD Navbar Toggle-->
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle="#rd-navbar-nav-wrap-1"><span></span></button>
                  <!-- RD Navbar Brand-->
                  <!--Brand--><a class="brand" href="index.php"><img class="brand-logo-dark" src="images/web-logo.png" alt="" /><img class="brand-logo-light" src="images/web-logo-inverted.png" alt="" /></a>
                </div>
                <div class="rd-navbar-main-element">
                  	<div class="rd-navbar-nav-wrap" id="rd-navbar-nav-wrap-1">
				  	<?php
					wp_nav_menu([
						'walker' => new MenuWalker(),
						'theme_location' => 'primary', // make sure you’ve registered it
						'container'      => false,
						'menu_class'     => 'rd-navbar-nav',
					]);
					?>
					</div>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>

	  <?php /*
    <h1><?php bloginfo('name'); ?></h1>
    <nav>
        <?php wp_nav_menu(); ?>
    </nav>
*/ ?>
