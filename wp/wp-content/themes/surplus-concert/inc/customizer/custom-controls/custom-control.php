<?php

if ( ! class_exists( 'WP_Customize_Control' ) ) {
    return null;
}

if( ! function_exists( 'surplus_concert_register_custom_controls' ) ) :
/**
 * Register Custom Controls
 */
    function surplus_concert_register_custom_controls( $wp_customize ){

        // Load custom controls
        require_once get_template_directory() . '/inc/customizer/custom-controls/custom-controls-class.php';

    }
endif;
add_action( 'customize_register', 'surplus_concert_register_custom_controls' );