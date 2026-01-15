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
		'publicly_queryable'  => true,
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


// Customiser les fields du formulaire de commentaire
add_filter('comment_form_default_fields', function ($fields) {
    $fields['author'] = str_replace(
        '<input id="author"',
        '<input id="author" class="form-input"',
        $fields['author']
    );

	$fields['email'] = str_replace(
        '<input id="email"',
        '<input id="email" class="form-input"',
        $fields['email']
    );

	unset($fields['url']);
	unset($fields['cookies']);

    return $fields;
});

// Set les bonnes classes pour le bouton d'envoi de commentaire

add_filter('comment_form_submit_button', function ($submit_button) {
    $submit_button = str_replace(
        'class="submit"',
        'class="button button-primary button-winona"',
        $submit_button
    );

    return $submit_button;
});

add_filter('comment_form_default_fields', function ($fields) {
    $fields['phone'] = '<p class="comment-form-phone">' .
        '<label for="phone">' . __('Téléphone') . ' </label>' .
        '<input id="phone" name="phone" type="tel" class="form-input" value="" size="30" />' .
        '</p>';

    return $fields;
});

add_action('comment_post', function ($comment_id) {
    if (isset($_POST['phone']) && !empty($_POST['phone'])) {
        $phone = sanitize_text_field($_POST['phone']);
        add_comment_meta($comment_id, 'phone', $phone);
    }
});

add_filter('comment_text', function ($comment_text) {
    $comment_id = get_comment_ID();
    $phone = get_comment_meta($comment_id, 'phone', true);

    if ($phone) {
        $comment_text .= '<p class="comment-phone"><strong>Téléphone:</strong> ' . esc_html($phone) . '</p>';
    }

    return $comment_text;
});


// Ajouter la colonne "Type de post"d ans la liste des commentaires
add_filter('manage_edit-comments_columns', function ($columns) {
    // Ajouter la colonne après la colonne "En réponse à"
    $new_columns = array();
    foreach ($columns as $key => $value) {
        $new_columns[$key] = $value;
        if ($key === 'response') {
            $new_columns['post_type'] = __('Type de post');
        }
    }
    return $new_columns;
});

// Afficher le contenu de la colonne
add_action('manage_comments_custom_column', 'display_post_type_column', 10, 2);
function display_post_type_column($column, $comment_id) {
    if ($column === 'post_type') {
        $comment = get_comment($comment_id);
        $post_id = $comment->comment_post_ID;

        if ($post_id) {
            $post_type = get_post_type($post_id);
            $post_type_obj = get_post_type_object($post_type);

            if ($post_type_obj) {
                echo esc_html($post_type_obj->labels->singular_name);
            } else {
                echo esc_html($post_type);
            }
        } else {
            echo '—';
        }
    }
}

// Gestion du spam

add_filter('comment_form_default_fields', function ($fields) {
    // 1. Honeypot
    $fields['honeypot'] = '<p style="position:absolute;left:-9999px;">
        <input type="text" name="website_url" value="" />
    </p>';

    // 2. Timestamp checking
    $fields['timestamp'] = '<input type="hidden" name="comment_time" value="' . time() . '" />';

    return $fields;
});

add_filter('preprocess_comment', function ($commentdata) {
	$seconds_threshold = 6;

    // Vérifier honeypot
    if (!empty($_POST['website_url'])) {
        wp_die('Error SP4M-0001');
    }

    // Vérifier vitesse
    if (isset($_POST['comment_time'])) {
        $elapsed = time() - intval($_POST['comment_time']);
        if ($elapsed < $seconds_threshold) {
            wp_die('Error SP4M-0002. Whoah, pas si vite!');
        }
    }

    // Bloquer si trop de liens
    if (substr_count($commentdata['comment_content'], 'http') > 2) {
        wp_die('Error SP4M-0003. Essayez de mettre moins de liens dans le commentaire.');
    }

    return $commentdata;
});


// NOTES INTERNES -------------------------------------------------

/**
 * 1. AJOUTER LA "META BOX" (BOÎTE D'ÉDITION)
 * Cela ajoute un bloc dans la page d'édition d'un commentaire dans l'admin.
 */
function sjb_ajouter_metabox_comment_admin() {
    add_meta_box(
        'sjb_comment_note_interne',      // ID de la boîte
        'Note Interne (Admin seulement)', // Titre de la boîte
        'sjb_afficher_metabox_comment',   // Fonction qui affiche le HTML (voir ci-dessous)
        'comment',                        // Écran où l'afficher (commentaires)
        'normal',                         // Contexte
        'high'                            // Priorité
    );
}
add_action( 'add_meta_boxes', 'sjb_ajouter_metabox_comment_admin' );

/**
 * 2. AFFICHER LE CHAMP HTML DANS LA BOÎTE
 */
function sjb_afficher_metabox_comment( $comment ) {
    // Récupérer la valeur actuelle si elle existe
    $note_actuelle = get_comment_meta( $comment->comment_ID, 'sjb_note_interne', true );

    // Ajout d'un champ de sécurité (nonce)
    wp_nonce_field( 'sjb_sauvegarde_note_interne', 'sjb_note_nonce' );

    ?>
    <p>
        <label for="sjb_note_interne">Ajouter une note visible uniquement par les administrateurs :</label>
        <br>
        <textarea id="sjb_note_interne" name="sjb_note_interne" rows="5" style="width:100%;"><?php echo esc_textarea( $note_actuelle ); ?></textarea>
    </p>
    <?php
}

/**
 * 3. SAUVEGARDER LA DONNÉE
 * Quand l'admin clique sur "Mettre à jour" le commentaire.
 */
function sjb_sauvegarder_note_interne( $comment_id ) {
    // 1. Vérifier si notre champ nonce est là (sécurité)
    if ( ! isset( $_POST['sjb_note_nonce'] ) ) {
        return;
    }
    // 2. Vérifier la validité du nonce
    if ( ! wp_verify_nonce( $_POST['sjb_note_nonce'], 'sjb_sauvegarde_note_interne' ) ) {
        return;
    }
    // 3. Vérifier les permissions de l'utilisateur
    if ( ! current_user_can( 'edit_comment', $comment_id ) ) {
        return;
    }

    // 4. Sauvegarder ou supprimer la donnée
    if ( isset( $_POST['sjb_note_interne'] ) ) {
        $note = sanitize_textarea_field( $_POST['sjb_note_interne'] );
        update_comment_meta( $comment_id, 'sjb_note_interne', $note );
    }
}
add_action( 'edit_comment', 'sjb_sauvegarder_note_interne' );


/**
 * 1. CRÉER L'EN-TÊTE DE LA COLONNE
 */
function sjb_admin_ajouter_colonne_note( $columns ) {
    // On ajoute la colonne 'sjb_note' au tableau des colonnes existantes
    $columns['sjb_note'] = 'Note Interne';
    return $columns;
}
add_filter( 'manage_edit-comments_columns', 'sjb_admin_ajouter_colonne_note' );

/**
 * 2. REMPLIR LA COLONNE AVEC LE CONTENU
 */
function sjb_admin_remplir_colonne_note( $column, $comment_id ) {
    // On vérifie qu'on est bien dans notre colonne 'sjb_note'
    if ( 'sjb_note' === $column ) {

        // On récupère la note
        $note = get_comment_meta( $comment_id, 'sjb_note_interne', true );

        if ( ! empty( $note ) ) {
            // S'il y a une note, on l'affiche avec un petit style "post-it"
            echo '<div style="background-color: #fff9c4; color: #333; padding: 8px; border-radius: 4px; font-size: 12px; border: 1px solid #e0e0e0;">';
            // esc_html pour la sécurité, nl2br pour conserver les sauts de ligne
            echo nl2br( esc_html( $note ) );
            echo '</div>';
        } else {
            // S'il n'y a rien, on affiche un petit tiret gris
            echo '<span style="color:#ccc;">—</span>';
        }
    }
}
add_action( 'manage_comments_custom_column', 'sjb_admin_remplir_colonne_note', 10, 2 );

/**
 * 3. (OPTIONNEL) AJUSTER LA LARGEUR DE LA COLONNE
 * Par défaut, WordPress peut écraser la colonne. Ceci force une largeur minimale.
 */
function sjb_admin_css_colonne_note() {
    echo '<style>
        .column-sjb_note { width: 20%; min-width: 150px; }
    </style>';
}
add_action( 'admin_head', 'sjb_admin_css_colonne_note' );
