<?php

class MenuWalker extends Walker_Nav_Menu {

    // Start level (the <ul>)
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $classes = $depth === 0 ? 'rd-menu rd-navbar-dropdown' : 'rd-submenu';
        $output .= "\n$indent<ul class=\"$classes\">\n";
    }

    // Start element (the <li> + <a>)
    function start_el(  &$output, $item, $depth = 0, $args = array(), $id = 0  ) {
		$target = str_contains($item->url, 'https://') ? '_blank' : '_self';

        $indent = ( $depth ) ? str_repeat("\t", $depth) : '';

        // Determine classes
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = join( ' ', array_filter( $classes ) );

        if ( $depth === 0 ) {
            $output .= $indent . '<li class="rd-nav-item ' . esc_attr( $class_names ) . '">';
            $link_class = 'rd-nav-link';
        } else {
            $output .= $indent . '<li class="rd-dropdown-item ' . esc_attr( $class_names ) . '">';
            $link_class = 'rd-dropdown-link';
        }

        // Link attributes
        $atts = array();
        $atts['href'] = ! empty( $item->url ) ? $item->url : '';
        $atts['class'] = $link_class;
		$atts['target'] = $target;

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = esc_attr( $value );
                $attributes .= " $attr=\"$value\"";
            }
        }

        $title = apply_filters( 'the_title', $item->title, $item->ID );
        $item_output = "<a$attributes>$title</a>";

        $output .= $args->before . $item_output . $args->after;
    }

    // End element
    function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $output .= "</li>\n";
    }

    // End level
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
}
