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

	<section class="breadcrumbs-custom bg-image context-dark"
	    style="background-color: #192531; background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full') ?: get_template_directory_uri() . '/images/sjb-header-fallback.jpg'; ?>);">
	  <div class="breadcrumbs-custom-inner">
		<div class="container breadcrumbs-custom-container">
		<div class="breadcrumbs-custom-main">
			<?php if ($post->post_parent): ?>
			  <h6 class="breadcrumbs-custom-subtitle title-decorated"><?= get_the_title($post->post_parent) ?></h6>
			<?php endif ?>
		  <h1 class="breadcrumbs-custom-title"><?php the_title() ?></h1>
		</div>
		<ul class="breadcrumbs-custom-path">
		  <?= sjb_breadcrumb_nav(get_the_ID()) ?>
		</ul>
		</div>
	  </div>
	</section>

