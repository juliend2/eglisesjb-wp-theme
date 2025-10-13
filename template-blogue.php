<?php
/**
 * Template Name: Blogue
 */

get_header();

if ( have_posts() ):
while ( have_posts() ) : the_post();
	the_title();
	echo '<br/>';
	the_content();
endwhile;
endif;

get_footer();
