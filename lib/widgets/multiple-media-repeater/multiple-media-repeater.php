<?php
/*
Widget Name: Eglise SJB accordéons
*/

class SJB_Accordeon extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            'sjb-accordeon-repeater',
            __( "Répéteur d'accordéons", 'sjb-accordeon-widget' ),
            [],
            [],
            [
                'unfoldable' => [
                    'type' => 'repeater',
                    'label' => __( 'Déroulables', 'sjb-accordeon-widget' ),
                    'item_name'  => __( 'Item', 'sjb-accordeon-widget' ),
                    'fields' => [
                        'repeat_title' => [
                            'type' => 'text',
                            'label' => __( "Titre de l'item", 'sjb-accordeon-widget' ),
                        ],
                        'repeat_body' => [
                            'type' => 'tinymce',
                            'label' => __( "Contenu de l'item", 'sjb-accordeon-widget' ),
                            'rows' => 10,
                        ],
                    ],
                ],
            ],
            plugin_dir_path( __FILE__ )
        );
    }

}

siteorigin_widget_register( 'sjb-accordeon-repeater', __FILE__, 'SJB_Accordeon' );
