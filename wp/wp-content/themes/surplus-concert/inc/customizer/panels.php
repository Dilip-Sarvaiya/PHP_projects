<?php
/**
 * Panels Setting
 *
 * @package Surplus_Concert
 */

/**
 * Appearance Panel
 *
*/
$wp_customize->add_panel( 'appearance_panel', array(
    'title'          => __( 'Appearance', 'surplus-concert' ),
    'priority'       => 50,
    'capability'     => 'edit_theme_options',
) );

// Move default color section to appearance panel
$wp_customize->get_section( 'colors' )->panel = 'appearance_panel';
$wp_customize->get_section( 'colors' )->priority = 10;
// Move default background image section to appearance panel
$wp_customize->get_section( 'background_image' )->panel = 'appearance_panel';
$wp_customize->get_section( 'background_image' )->priority = 20;

/**
 * Add frontpage panel
 */
$wp_customize->add_panel( 'frontpage_panel', array(
    'title'          => __( 'Frontpage Sections', 'surplus-concert' ),
    'priority'       => 65,
    'capability'     => 'edit_theme_options',
) );

/**
 * Add banner/slider panel
 */
$wp_customize->add_section( 'banner_slider_section', array(
    'title'          => __( 'Banner/Slider Sections', 'surplus-concert' ),
    'priority'       => 62,
    'capability'     => 'edit_theme_options',
) );