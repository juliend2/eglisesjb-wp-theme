<?php


function sjb_benevolat_register_post_type() {
	$args = [
		'label'  => esc_html__( 'Postes de bénévolat', 'text-domain' ),
		'labels' => [
			'menu_name'          => esc_html__( 'Postes de bénévolat', 'eglisesjb' ),
			'name_admin_bar'     => esc_html__( 'Poste de bénévolat', 'eglisesjb' ),
			'add_new'            => esc_html__( 'Ajouter un Poste de bénévolat', 'eglisesjb' ),
			'add_new_item'       => esc_html__( 'Ajouter un nouveau Poste de bénévolat', 'eglisesjb' ),
			'new_item'           => esc_html__( 'Nouveau Poste de bénévolat', 'eglisesjb' ),
			'edit_item'          => esc_html__( 'Modifier le Poste de bénévolat', 'eglisesjb' ),
			'view_item'          => esc_html__( 'Voir le Poste de bénévolat', 'eglisesjb' ),
			'update_item'        => esc_html__( 'Voir le Poste de bénévolat', 'eglisesjb' ),
			'all_items'          => esc_html__( 'Tous les Postes de bénévolat', 'eglisesjb' ),
			'search_items'       => esc_html__( 'Rechercher les Postes de bénévolat', 'eglisesjb' ),
			'parent_item_colon'  => esc_html__( 'Poste de bénévolat parent', 'eglisesjb' ),
			'not_found'          => esc_html__( 'Aucun Postes de bénévolat trouvé', 'eglisesjb' ),
			'not_found_in_trash' => esc_html__( 'Aucun Postes de bénévolat trouvé dans Trash', 'eglisesjb' ),
			'name'               => esc_html__( 'Postes de bénévolat', 'eglisesjb' ),
			'singular_name'      => esc_html__( 'Poste de bénévolat', 'eglisesjb' ),
		],
		'public'              => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => false,
		'show_ui'             => true,
		'show_in_nav_menus'   => false,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => false,
		'capability_type'     => 'post',
		'hierarchical'        => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite_no_front'    => false,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-heart',
		'supports' => [
			'title',
			'editor',
			'comments',
		],

		'rewrite' => true
	];

	register_post_type( 'benevole', $args );
}
add_action( 'init', 'sjb_benevolat_register_post_type' );

// Add to functions.php
function benevolat_list_shortcode($atts) {
    // Parse attributes
    $atts = shortcode_atts(array(
        'posts_per_page' => -1,  // -1 shows all
        'order' => 'ASC',
        'orderby' => 'title'
    ), $atts);

    // Query the custom post type
    $args = array(
        'post_type' => 'benevole',
        'posts_per_page' => $atts['posts_per_page'],
        'order' => $atts['order'],
        'orderby' => $atts['orderby'],
        'post_status' => 'publish'
    );

    $query = new WP_Query($args);

    // Start output buffering
    ob_start();

    if ($query->have_posts()) {
        echo '<div class="benevolat-list">';

        while ($query->have_posts()) {
            $query->the_post();
            ?>
            <article class="benevolat-item">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <div class="benevolat-excerpt">
                    <?php the_excerpt(); ?>
                </div>
                <a href="<?php the_permalink(); ?>" class="read-more">En savoir plus</a>
            </article>
            <?php
        }

        echo '</div>';
    } else {
        echo '<p>Aucun poste de bénévolat trouvé.</p>';
    }

    // Reset post data
    wp_reset_postdata();

    // Return buffered content
    return ob_get_clean();
}
add_shortcode('benevolat_list', 'benevolat_list_shortcode');
