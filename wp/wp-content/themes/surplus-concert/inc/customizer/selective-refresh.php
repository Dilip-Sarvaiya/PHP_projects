<?php
/**
 * surplus concert pro Theme Customizer Selective Refresh
 *
 * @package Surplus_Concert
 */

 /**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function surplus_concert_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function surplus_concert_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Render readmore btn label for the selective refresh partial.
 *
 */
function surplus_concert_readmore_btn_label_selective_refresh() {
	/** Load default theme options */
	$default_options    = surplus_concert_default_theme_options();                          
	$readmore_btn_label = get_theme_mod( 'read_more_text', $default_options['read_more_text'] );

	if ( $readmore_btn_label ){
		return esc_html( $readmore_btn_label );
	} else {
		return false;
	}
}

/**
 * Render header email for the selective refresh partial.
 *
 */
function surplus_concert_headertop_email_selective_refresh(){
	/** Load default theme options */
	$default_options = surplus_concert_default_theme_options();                          
	$headertop_email = get_theme_mod( 'header_email', $default_options['header_email'] );

	if ( $headertop_email ){
		return esc_html( $headertop_email );
	} else {
		return false;
	}
}

/**
 * Render header phone for the selective refresh partial.
 *
 */
function surplus_concert_headertop_phone_selective_refresh(){
	/** Load default theme options */
	$default_options = surplus_concert_default_theme_options();                          
	$headertop_phone = get_theme_mod( 'header_phone', $default_options['header_phone'] );

	if ( $headertop_phone ){
		return esc_html( $headertop_phone );
	} else {
		return false;
	}
}

/**
 * Render banner title for the selective refresh partial.
 *
 */
function surplus_concert_banner_title_selective_refresh(){
	/** Load default theme options */
	$default_options = surplus_concert_default_theme_options();                          
	$banner_title    = get_theme_mod( 'banner_title', $default_options['banner_title'] );

	if ( $banner_title ){
		return esc_html( $banner_title );
	} else {
		return false;
	}
}

/**
 * Render banner subtitle for the selective refresh partial.
 *
 */
function surplus_concert_banner_subtitle_selective_refresh(){
	/** Load default theme options */
	$default_options = surplus_concert_default_theme_options();                          
	$banner_subtitle = get_theme_mod( 'banner_subtitle', $default_options['banner_subtitle'] );

	if ( $banner_subtitle ){
		return esc_html( $banner_subtitle );
	} else {
		return false;
	}
}

/**
 * Render banner readmore btntext for the selective refresh partial.
 *
 */
function surplus_concert_banner_btntext_selective_refresh(){
	/** Load default theme options */
	$default_options     = surplus_concert_default_theme_options();                          
	$banner_button_label = get_theme_mod( 'banner_button_label', $default_options['banner_button_label'] );

	if ( $banner_button_label ){
		return esc_html( $banner_button_label );
	} else {
		return false;
	}
}

/**
 * Render frontpage blog title for the selective refresh partial.
 *
 */
function surplus_concert_blog_title_selective_refresh(){
	/** Load default theme options */
	$default_options = surplus_concert_default_theme_options();                          
	$blog_title    = get_theme_mod( 'blog_title', $default_options['blog_title'] );

	if ( $blog_title ){
		return esc_html( $blog_title );
	} else {
		return false;
	}
}



/**
 * Render the footer copyright text for the selective refresh partial.
 *
 * @return void
 */
function surplus_concert_site_info_selective_refresh() {
	/** Load default theme options */
	$default_options = surplus_concert_default_theme_options();                          
	$site_info_text  = get_theme_mod( 'footer_copyright', $default_options['footer_copyright'] );

	if ( $site_info_text ){
		return wp_kses_post( $site_info_text );
	} else {
		return false;
	}
}