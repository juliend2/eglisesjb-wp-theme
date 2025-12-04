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
		  <!--Brand--><a class="brand" href="<?=  home_url() ?>"><img class="brand-logo-dark" src="<?= get_template_directory_uri(). '/images/web-logo.png' ?>" alt="" /><img class="brand-logo-light" src="<?= get_template_directory_uri() .'/images/web-logo-inverted.png' ?>" alt="" /></a>
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

