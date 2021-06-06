<?php
/**
 * surplus concert pro Theme Customizer
 *
 * @package Surplus_Concert
 */

//load upgrade-to-pro section
require get_template_directory() . '/inc/customizer/upgrade-to-pro/class-customize.php';

/**
 * Customizer Custom controls.
 */
require get_template_directory() . '/inc/customizer/custom-controls/custom-control.php';

/**
 * Add Customizer Default Options
 */
require get_template_directory() .'/inc/customizer/default-options.php';


/**
 * Add Panels, Sections and Controls for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function surplus_concert_customize_register( $wp_customize ) {

	/**
	 * Add Selective Refresh
	 */
	require get_template_directory() .'/inc/customizer/selective-refresh.php';

	/**
	 * Add Sanitize Functions
	 */
	require get_template_directory() .'/inc/customizer/sanitize-functions.php';

	/**
	 * Add active-callback Functions
	 */
	require get_template_directory() .'/inc/customizer/active-callback.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'surplus_concert_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'surplus_concert_customize_partial_blogdescription',
		) );
	}

	/**
	 * Add panels settings
	 */
	require get_template_directory() .'/inc/customizer/panels.php';

	/**
	 * Add site info
	 */
	require get_template_directory() .'/inc/customizer/site-info.php';

	/**
	 * Add Header top
	 */
	require get_template_directory() .'/inc/customizer/header-top.php';

	/**
	 * Add banner section
	 */
	require get_template_directory() .'/inc/customizer/banner-slider.php';

	/**
	 * Add global sidebar layout
	 */
	require get_template_directory() .'/inc/customizer/global-sidebar-layout.php';

	/**
	 * Add frontpage about section
	 */
	require get_template_directory() .'/inc/customizer/about.php';

	/**
	 * Add frontpage blog section
	 */
	require get_template_directory() .'/inc/customizer/blog.php';

	/**
	 * Add general settings section
	 */
	require get_template_directory() .'/inc/customizer/general-settings.php';

	/**
	 * Add layout section
	 */
	require get_template_directory() .'/inc/customizer/layout.php';

	/**
	 * Add footer section
	 */
	require get_template_directory() .'/inc/customizer/footer.php';
}
add_action( 'customize_register', 'surplus_concert_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function surplus_concert_customize_preview_js() {
	wp_enqueue_script( 'surplus-concert-customizer', get_template_directory_uri() . '/js'. UNMINIFIED .'/customizer'. SUFFIX .'.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'surplus_concert_customize_preview_js' );

/**
 * Customizer control scripts and styles.
 *
 * @since 1.0.0
 */
function surplus_concert_customizer_control_scripts() {

	wp_enqueue_style( 'surplus-concert-customize-controls', get_template_directory_uri() . '/css'. UNMINIFIED .'/customize-controls'. SUFFIX .'.css', SURPLUS_CONCERT_THEME_VERSION ,'screen' );
	wp_enqueue_script( 'surplus-concert-customize-controls', get_template_directory_uri() . '/js'. UNMINIFIED .'/customize-controls'. SUFFIX .'.js', array( 'jquery', 'customize-controls' ), SURPLUS_CONCERT_THEME_VERSION, true );
}

add_action( 'customize_controls_enqueue_scripts', 'surplus_concert_customizer_control_scripts' );