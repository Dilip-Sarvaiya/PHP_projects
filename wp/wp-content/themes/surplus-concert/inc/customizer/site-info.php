<?php
/**
 * Surplus Concert Theme Info
 *
 * @package Surplus_Concert
 */

	$wp_customize->add_section( 'theme_info_section', array(
		'title'       => __( 'Demo and Documentation' , 'surplus-concert' ),
		'priority'    => 6,
	) );

	/** Important Links */
	$wp_customize->add_setting( 'theme_info_setting',
	    array(
	        'default' => '',
	        'sanitize_callback' => 'wp_kses_post',
	    )
	);

	$theme_info = '<p>';

	/* translators: 1: string, 2: preview url, 3: string */
	$theme_info .= sprintf( '%1$s<a href="%2$s" target="_blank">%3$s</a>', esc_html__( 'Demo Link : ', 'surplus-concert' ), esc_url( __( 'https://demo.surplusthemes.com/surplus-concert/', 'surplus-concert' ) ), esc_html__( 'Click here.', 'surplus-concert' ) );

	$theme_info .= '</p><p>';

	/* translators: 1: string, 2: documentation url, 3: string */
	$theme_info .= sprintf( '%1$s<a href="%2$s" target="_blank">%3$s</a>', esc_html__( 'Documentation Link : ', 'surplus-concert' ), esc_url( 'https://surplusthemes.com/surplus-concert-theme-setup-instructions/' ), esc_html__( 'Click here.', 'surplus-concert' ) );


	$theme_info .= '</p><p>';

	/* translators: 1: string, 2: support url, 3: string */
	$theme_info .= sprintf( '%1$s<a href="%2$s" target="_blank">%3$s</a>', esc_html__( 'Support Link : ', 'surplus-concert' ), esc_url( 'https://surplusthemes.com/support-forum/' ), esc_html__( 'Click here.', 'surplus-concert' ) );

	$wp_customize->add_control( new Surplus_Concert_Note_Control( $wp_customize,
	    'theme_info_setting', 
	        array(
	            'section'     => 'theme_info_section',
	            'description' => $theme_info
	        )
	    )
	);

	$theme_info .= '</p>';