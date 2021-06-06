<?php
/**
 * Layout Section
 *
 * @package Surplus_Concert
 */

/** Load default theme options */
$default_options =  surplus_concert_default_theme_options();

$wp_customize->add_section(
    'layout_section',
    array(
        'title'      => __( 'Layout Options', 'surplus-concert' ),
        'priority'   => 30,
        'capability' => 'edit_theme_options',
        'panel'      => 'appearance_panel',
    )
);

/** Site Layout */
$wp_customize->add_setting( 'site_layout', array(
    'default'           => $default_options['site_layout'],
    'sanitize_callback' => 'surplus_concert_sanitize_select'
) );

$wp_customize->add_control( 
    'site_layout', 
    array(
        'label'   => __( 'Site Layout', 'surplus-concert' ),
        'section' => 'layout_section',
        'type'    => 'select',
        'choices' => array(
            'wide'  => __( 'Wide', 'surplus-concert' ), 
            'boxed' => __( 'Boxed', 'surplus-concert' ), 
        ),    
    ) 
);