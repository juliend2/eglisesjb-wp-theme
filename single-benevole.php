<?php
/**
 * Single Post Template for Benevolat Custom Post Type
 * Template Name: Single Benevole
 */

get_header();

if ( have_posts() ):
while ( have_posts() ) : the_post();
	?>
	<section class="section section-lg">
        <div class="container">
          <div class="row row-50">
            <div class="col-lg-10 col-xl-6">
              <article class="post-creative">
                <h3 class="post-creative-title"><?php the_title() ?></h3>
                <ul class="post-creative-meta">

				  <?php foreach (get_the_category() as $category) : ?>
						<li>
							<span class="icon mdi mdi-tag-multiple"></span>
							<a href="<?= esc_url(get_category_link($category->term_id)) ?>">
								<?= esc_html($category->name) ?>
							</a>
						</li>
				  <?php endforeach; ?>
                </ul>
                <?php the_content() ?>
				</article>
			</div>
			<div class="col-lg-2 col-xl-6">
				<?php
				comment_form([
					'title_reply' => 'Postuler pour ce bénévolat',
					'label_submit' => 'Envoyer ma disponibilité',
					'logged_in_as' => '',
					'comment_field'        => sprintf(
						'<p class="comment-form-comment">%s %s</p>',
						'<label for="comment">Notes</label>',
						'<textarea class="form-input" id="comment" name="comment" cols="45" rows="8" maxlength="65525"></textarea>'
					),
				]);
				?>
			</div>
			</div>
		</div>
	</section>
	<?php
endwhile;
endif;

get_footer();
