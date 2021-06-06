<?php
/**
 * General settings
 *
 * @package Surplus_Concert
 */

/** Load default theme options */
$default_options =  surplus_concert_default_theme_options();

$wp_customize->add_section(
    'general_settings',
    array(
        'title'      => __( 'General Settings', 'surplus-concert' ),
        'priority'   => 70,
        'capability' => 'edit_theme_options',
    )
);

// Enable / Disable BreadCrumb
$wp_customize->add_setting(
    'ed_breadcrumb',
    array(
        'default'           => $default_options['ed_breadcrumb'],
        'sanitize_callback' => 'surplus_concert_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'ed_breadcrumb',
    array(
        'section'     => 'general_settings',
        'label'       => __( 'Enable Breadcrumb', 'surplus-concert' ),
        'type'        => 'checkbox'
    )
);

/** Excerpt length */
$wp_customize->add_setting( 'excerpt_length', array(
    'default'           => $default_options['excerpt_length'],
    'sanitize_callback' => 'surplus_concert_sanitize_number_range'
) );

$wp_customize->add_control(
    'excerpt_length',
    array(
        'label'           => __( 'Excerpt Length', 'surplus-concert' ),
        'description'     => __( 'Automatically generated excerpt length ( in words ).', 'surplus-concert' ),
        'section'         => 'general_settings',
        'type'            => 'number',
        'choices'         => array(
            'min'         => 5,
            'max'         => 200,
            'step'        => 1,
        ),
    )
);

/** Read More Text */
$wp_customize->add_setting(
    'read_more_text',
    array(
        'default'           => $default_options['read_more_text'],
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage'
    )
);

$wp_customize->selective_refresh->add_partial( 'read_more_text', array(
    'selector'            => '.read-more a.btn-red',
    'render_callback'     => 'surplus_concert_readmore_btn_label_selective_refresh',
    'container_inclusive' => false,
    'fallback_refresh'    => true,
) );

$wp_customize->add_control(
    'read_more_text',
    array(
        'type'    => 'text',
        'section' => 'general_settings',
        'label'   => __( 'Read More Text', 'surplus-concert' ),
    )
);