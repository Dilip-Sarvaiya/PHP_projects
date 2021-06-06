<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Surplus_Concert
 */
	
	/**
     * After Content
     * 
     * @hooked surplus_concert_content_end - 20
    */
    do_action( 'surplus_concert_before_footer' );

    /**
     * Footer
     * 
     * @hooked surplus_concert_footer_start - 10
     * @hooked surplus_concert_footer_sidebars - 20
     * @hooked surplus_concert_footer_site_info - 30
     * @hooked surplus_concert_footer_end - 40
     * @hooked surplus_concert_footer_back_to_top - 50
     */
    do_action( 'surplus_concert_footer' );

	/**
     * After Footer Ends
     * 
     * @hooked surplus_concert_page_end - 10
     */
    do_action( 'surplus_concert_after_footer' );

    wp_footer(); 
?>

</body>
</html>
