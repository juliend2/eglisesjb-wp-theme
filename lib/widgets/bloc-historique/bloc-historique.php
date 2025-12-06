<?php
/*
Widget Name: Bloc Historique
*/

class SJB_BlocHistorique extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            'sjb-bloc-historique',
            __( "Répéteur de bloc historique", 'sjb-bloc-historique' ),
            [],
            [],
            [
                'blocs_historiques' => [
                    'type' => 'repeater',
                    'label' => __( "Blocs d'histoire", 'sjb-bloc-historique' ),
                    'item_name'  => __( 'Item', 'sjb-bloc-historique' ),
                    'fields' => [
						'repeat_image' => [
							'type' => 'media',
							'label' => __( 'Photo', 'sjb-bloc-historique' ),
							'choose' => __( "Choisir l'image", 'sjb-bloc-historique' ),
							'update' => __( "Sélectionner l'image", 'sjb-bloc-historique' ),
							'library' => 'image',
						],
                        'repeat_annee' => [
                            'type' => 'text',
                            'label' => __( "Années", 'sjb-bloc-historique' ),
                        ],
						'repeat_sous_titre' => [
                            'type' => 'text',
                            'label' => __( "Sous-titre", 'sjb-bloc-historique' ),
                        ],
                        'repeat_description' => [
                            'type' => 'tinymce',
                            'label' => __( "Histoire", 'sjb-bloc-historique' ),
                            'rows' => 10,
                        ],
                    ],
                ],
            ],
            plugin_dir_path( __FILE__ )
        );
    }

}

siteorigin_widget_register( 'sjb-bloc-historique', __FILE__, 'SJB_BlocHistorique' );
