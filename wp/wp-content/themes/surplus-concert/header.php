<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until banner section.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Surplus_Concert
 */

 	/**
     * Doctype Hook
     * 
     * @hooked surplus_concert_doctype
     */
    do_action( 'surplus_concert_doctype' );

?>
<head>
	<?php 
    /**
     * Before wp_head
     * 
     * @hooked surplus_concert_head
     */
    do_action( 'surplus_concert_before_wp_head' );

    wp_head(); 
    ?>
</head>

<body <?php body_class(); ?>>

<?php
    /**
     * Fire the wp_body_open action.
     */
    if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
    } 

    /**
     * Before Header
     * 
     * @hooked surplus_concert_page_start - 10 
     * @hooked surplus_concert_top_header - 20
     */
    do_action( 'surplus_concert_before_header' );
    
    /**
     * Header
     * 
     * @hooked surplus_concert_header - 10     
     */
    do_action( 'surplus_concert_header' );
    
    /**
     * Content
     * 
     * @hooked surplus_concert_content_start
     */
    do_action( 'surplus_concert_content' );

     /**
     * After Content
     * 
     * @hooked surplus_concert_banner_slider
     */
    do_action( 'surplus_concert_after_content' );