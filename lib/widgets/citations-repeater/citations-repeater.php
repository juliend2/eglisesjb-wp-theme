<?php
/*
Widget Name: Eglise SJB Répéteur de citations
*/

class SJB_Citation_Repeater extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'sjb-repeteur-citations',
			__( "Citations", 'sjb-citations-widget' ),
			[],
			[],
			[
				'citation' => [
					'type' => 'repeater',
					'label' => __( 'Citations', 'sjb-citations-widget' ),
					'item_name'  => __( 'Item', 'sjb-citations-widget' ),
					'fields' => [
						'citation_nom' => [
							'type' => 'text',
							'label' => __( "Nom", 'sjb-citations-widget' ),
						],
						'citation_photo' => [
							'type' => 'media',
							'label' => __( 'Photo', 'sjb-citations-widget' ),
							'choose' => __( "Choisir la photo", 'sjb-citations-widget' ),
							'update' => __( "Sélectionner la photo", 'sjb-citations-widget' ),
							'library' => 'image',
						],
						'citation_titre' => [
							'type' => 'text',
							'label' => __( "Titre", 'sjb-citations-widget' ),
						],
						'citation_body' => [
							'type' => 'tinymce',
							'label' => __( "Contenu de l'item", 'sjb-citations-widget' ),
							'rows' => 10,
						],
					],
				],
			],
			plugin_dir_path( __FILE__ )
		);
	}

}

siteorigin_widget_register( 'sjb-repeteur-citations', __FILE__, 'SJB_Citation_Repeater' );
