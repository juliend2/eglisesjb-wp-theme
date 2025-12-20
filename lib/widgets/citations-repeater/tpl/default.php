<div class="owl-carousel" data-items="1" data-dots="true" data-nav="false" data-margin="30" data-stage-padding="0" data-autoplay="false" data-loop="false" data-mouse-drag="false">
<?php
$unique_id = uniqid();

foreach ($instance['citation'] as $i => $citation) {
    ?>
	<blockquote class="quote-modern">
		<svg class="quote-modern-mark" width="39" height="40" viewBox="0 0 39 40" xmlns="http://www.w3.org/2000/svg">
			<path d="M0 25.2632C0 17.6608 0.924444 11.8713 2.77333 7.89474C4.62222 3.91813 7.91556 1.28655 12.6533 0L15.6 4.38597C12.48 5.78947 10.3422 7.83626 9.18667 10.5263C8.14667 13.0994 7.62667 17.1345 7.62667 22.6316H14.7333V40H0V25.2632ZM23.4 25.2632C23.4 17.6608 24.3244 11.8713 26.1733 7.89474C28.0222 3.91813 31.3156 1.28655 36.0533 0L39 4.38597C35.88 5.78947 33.7422 7.83626 32.5867 10.5263C31.5467 13.0994 31.0267 17.1345 31.0267 22.6316H38.1333V40H23.4V25.2632Z"></path>
		</svg>
		<div class="quote-modern-text">
			<?= $citation['citation_body'] ?>
		</div>
		<div class="quote-modern-meta">
			<div class="quote-modern-avatar"><img src="<?= wp_get_attachment_image_url($citation['citation_photo'], 'full') ?>" alt="" />
			</div>
			<div class="quote-modern-info">
			<cite class="quote-modern-cite"><?= $citation['citation_nom'] ?></cite>
			<p class="quote-modern-caption"><?= $citation['citation_titre'] ?></p>
			</div>
		</div>
	</blockquote>
    <?php
    $to_show = false; // the remaining items must not be shown
}
?>
</div>
