<?php

get_header('article');

if ( have_posts() ):
while ( have_posts() ) : the_post();
	?>
	<section class="section section-lg">
        <div class="container">
          <div class="row row-50">
            <div class="col-lg-8">
              <article class="post-creative">
                <h3 class="post-creative-title"><?php the_title() ?></h3>
                <ul class="post-creative-meta">
                  <li><span class="icon mdi mdi-calendar-clock"></span>
                    <time datetime="<?= get_the_date('Y-m-d') ?>"><?= get_the_date('j F, Y') ?></time>
                  </li>
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
			</div>
		</div>
	</section>
	<?php
endwhile;
endif;

get_footer();
