<?php
get_header('blogue');
?>
<style>
	.page-numbers {
		display: inline-block;
		margin: 0 5px;
		padding: 8px 12px;
		border: 1px solid #ddd;
		color: #333;
		text-decoration: none;
	}
	.page-numbers.current {
		background-color: #115fb8;
		color: #fff;
		border-color: #115fb8;
	}
	.page-numbers:hover, .page-numbers:active {
		background-color: #115fb8;
		color: #fff;
	}
</style>

<section class="section section-lg">
        <div class="container">
          <div class="row row-50 row-xxl-70">
<?php


if ( have_posts() ):
while ( have_posts() ) : the_post();
	?>
	 <div class="col-md-6 scaleFadeInWrap">
		<div class="wow scaleFadeIn">
		<article class="post-modern">
			<a class="post-modern-media" href="<?php the_permalink() ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full') ?>" alt="thumbnail"/></a>
			<h4 class="post-modern-title">
				<a class="underlined" href="<?php the_permalink() ?>"><?php the_title() ?></a>
			</h4>
			<ul class="post-modern-meta">
				<li>par <?php the_author() ?></li>
				<li>
				<time datetime="<?= get_the_date('Y-m-d') ?>"><?= get_the_date('j F, Y') ?></time>
				</li>
			</ul>
			<?php the_excerpt() ?>
		</article>
		</div>
	</div>
	<?php
endwhile;
wp_reset_postdata();
endif;

?>
		  </div>

		  <div class="row">
			<div class="col-12 text-center">
				<?= paginate_links([
				]) ?>
			</div>
		  </div>

		</div>
	  </section>
<?php

get_footer();
