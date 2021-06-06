<?php

/**
 * Surplus Concert Theme Custom functions 
 * 
 * @package Surplus_Concert
 */

if ( ! function_exists( 'surplus_concert_body_classes' ) ) :

    /**
     * Adds custom classes to the array of body classes.
     *
     * @param array $classes Classes for the body element.
     * @return array
     */
    function surplus_concert_body_classes( $classes ) {
        $default_options =  surplus_concert_default_theme_options();
        $layout          = get_theme_mod( 'site_layout', $default_options['site_layout'] );

        // Adds a class of hfeed to non-singular pages.
        if ( ! is_singular() ) {
            $classes[] = 'hfeed';
        }

        $classes[] =  $layout;

        // Add sibebar layout classes.
        $classes[] = surplus_concert_sidebar_layout();

        return $classes;
    }
endif;
add_filter( 'body_class', 'surplus_concert_body_classes' );

if ( ! function_exists( 'surplus_concert_excerpt_length' ) ) :
    /**
     * Changes the default 55 character in excerpt 
     */
    function surplus_concert_excerpt_length( $length ) {
        /** Load default theme options */
        $default_options = surplus_concert_default_theme_options();
        $excerpt_length  = get_theme_mod( 'excerpt_length', $default_options['excerpt_length'] );

        return is_admin() ? $length : absint( $excerpt_length );    
    }
endif;
add_filter( 'excerpt_length', 'surplus_concert_excerpt_length', 999 );

if ( ! function_exists( 'surplus_concert_excerpt_more' ) ) :

    /**
     * Replaces "[...]" (appended to automatically generated excerpts) with ... * 
     */
    function surplus_concert_excerpt_more( $more ) {
        return is_admin() ? $more : ' &hellip; ';
    }

endif;
add_filter( 'excerpt_more', 'surplus_concert_excerpt_more' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function surplus_concert_pingback_header() {
    if ( is_singular() && pings_open() ) {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}
add_action( 'wp_head', 'surplus_concert_pingback_header' );

if( ! function_exists( 'surplus_concert_slider_image_instruction' ) ) :

    /**
     * Write message for featured image upload
     *
     */
     function surplus_concert_slider_image_instruction( $content, $post_id ) {

        $allowed = array( 'page', 'page' );

        if ( in_array( get_post_type( $post_id ), $allowed ) ) {
          return $content .= '<p><b>' . esc_html__( 'Note', 'surplus-concert' ) . ':</b>' . esc_html__( ' The recommended image size is 1920px by 1080px while using it for slider', 'surplus-concert' ) . '</p>';
        }
        return $content;
    }
endif;
add_filter( 'admin_post_thumbnail_html', 'surplus_concert_slider_image_instruction', 10, 2);

if ( ! function_exists( 'surplus_concert_video_controls' ) ) :

    /**
     * Customize video play/pause button in the custom header.
     *
     * @param array $settings Video settings.
     */
    function surplus_concert_video_controls( $settings ) {

        $settings['l10n']['play'] = '<span class="screen-reader-text">' . __( 'Play background video', 'surplus-concert' ) . '</span>' . surplus_concert_get_svg( array( 'icon' => 'play' ) );
        $settings['l10n']['pause'] = '<span class="screen-reader-text">' . __( 'Pause background video', 'surplus-concert' ) . '</span>' . surplus_concert_get_svg( array( 'icon' => 'pause' ) );
        return $settings;

    }

endif;
add_filter( 'header_video_settings', 'surplus_concert_video_controls' );

if( ! function_exists( 'surplus_concert_include_svg_icons' ) ) :

    /**
     * Add SVG definitions to the footer.
     */
    function surplus_concert_include_svg_icons() {

        // Define SVG sprite file.
        $svg_icons = get_parent_theme_file_path( '/assets/images/svg-icons.svg' );

        // If it exists, include it.
        if ( file_exists( $svg_icons ) ) {
            require_once( $svg_icons );
        }

    }

endif;
add_action( 'wp_footer', 'surplus_concert_include_svg_icons', 9999 );