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
	<?php get_template_part('partials/menu', 'top') ?>

ACCUEIL
	  <?php /*
    <h1><?php bloginfo('name'); ?></h1>
    <nav>
        <?php wp_nav_menu(); ?>
    </nav>
*/ ?>
