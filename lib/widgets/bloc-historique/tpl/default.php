<section class="section section-lg bg-gray-800">
	<div class="container">
		<h3 class="text-center">Historique</h3>
		<article class="row timeline-classic">
		<?php foreach ($instance['blocs_historiques'] as $i => $bloc): ?>
			<div class="timeline-classic-item">
				<div class="timeline-classic-item-aside">
					<img class="timeline-classic-item-image" src="<?= wp_get_attachment_image_url($bloc['repeat_image'], 'full') ?>" alt="">
				</div>
				<div class="timeline-classic-item-divider"></div>
				<div class="timeline-classic-item-main">
					<p class="timeline-classic-item-title"><?= $bloc['repeat_annee'] ?></p>
					<p class="thumbnail-classic-item-subtitle"><?= $bloc['repeat_sous_titre'] ?></p>
					<div class="thumbnail-classic-item-description">
						<?= $bloc['repeat_description'] ?>
					</div>
				</div>
			</div>
		<?php endforeach ?>
		</article>
	</div>
</section>
