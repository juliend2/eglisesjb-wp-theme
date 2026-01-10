<?php
$blog_page_id = get_option('page_for_posts');
$blog_page = get_post($blog_page_id);

?>
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
	    style="background-color: #192531; background-image: url(<?php echo get_template_directory_uri() . '/images/header-blog.jpg'; ?>);">
	  <div class="breadcrumbs-custom-inner">
		<div class="container breadcrumbs-custom-container">
		<div class="breadcrumbs-custom-main">
			<?php if ($blog_page->post_parent): ?>
			  <h6 class="breadcrumbs-custom-subtitle title-decorated"><?= get_the_title($blog_page->post_parent) ?></h6>
			<?php endif ?>
		  <h1 class="breadcrumbs-custom-title"><?= get_the_title($blog_page_id) ?></h1>
		</div>
		<ul class="breadcrumbs-custom-path">
		  <?= sjb_breadcrumb_nav($blog_page_id) ?>
		</ul>
		</div>
	  </div>
	</section>

