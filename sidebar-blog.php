<?php
global $post;

$author_id = $post->post_author;
$user = get_userdata($author_id);

?>
<?php if (!empty($user)): ?>
	<?php
	$user_id = $user->ID;
	$image_id = get_user_meta($user_id, 'profile_image_id', true);
	$title = get_user_meta($user_id, 'profile_title', true) ?: $user->display_name;
	$subtitle = get_user_meta($user_id, 'profession', true);
	// $profession = get_user_meta($user_id, 'profession', true) ?: get_the_author_meta('profession', $user_id);
	$bio = get_user_meta($user_id, 'profile_description', true) ?: get_the_author_meta('description', $user_id);
	$image_url = $image_id ? wp_get_attachment_image_url($image_id, 'medium') : get_avatar_url($user_id);
	?>
	<article class="profile-thin">
		<div class="profile-thin-aside">
			<img class="profile-thin-image" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title); ?>" />
		</div>
		<div class="profile-thin-main">
			<p class="profile-thin-title"><?php echo esc_html($title); ?></p>
			<?php if ($subtitle): ?>
				<p class="profile-thin-subtitle"><?php echo esc_html($subtitle); ?></p>
			<?php endif; ?>
			<?php if ($bio): ?>
				<p><?php echo esc_html($bio); ?></p>
			<?php endif; ?>
		</div>
	</article>
<?php endif; ?>
