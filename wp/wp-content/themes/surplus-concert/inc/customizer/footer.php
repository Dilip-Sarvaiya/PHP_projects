<?php
/**
 * Footer Setting
 *
 * @package Surplus_Concert
 */

/** Load default theme options */
$default_options =  surplus_concert_default_theme_options();

$wp_customize->add_section(
    'footer_section',
    array(
        'title'      => __( 'Footer Settings', 'surplus-concert' ),
        'priority'   => 199,
        'capability' => 'edit_theme_options',
    )
);

/** Footer Copyright */
$wp_customize->add_setting(
    'footer_copyright',
    array(
        'default'           => $default_options['footer_copyright'],
        'sanitize_callback' => 'wp_kses_post',
        'transport'         => 'postMessage'
    )
);

$wp_customize->add_control(
    'footer_copyright',
    array(
        'label'       => __( 'Footer Copyright Text', 'surplus-concert' ),
        'section'     => 'footer_section',
        'type'        => 'textarea',
    )
);

// Abort if selective refresh is not available.
$wp_customize->selective_refresh->add_partial( 'footer_copyright', array(
    'selector'            => '.site-footer .site-info span.copyright',
    'render_callback'     => 'surplus_concert_site_info_selective_refresh',
    'container_inclusive' => false,
    'fallback_refresh'    => true,
) );

/** Scroll to top */
$wp_customize->add_setting(
    'ed_scroll_to_top',
    array(
        'default'           => $default_options['ed_scroll_to_top'],
        'sanitize_callback' => 'surplus_concert_sanitize_checkbox',
    )
);

$wp_customize->add_control(
    'ed_scroll_to_top',
    array(
        'section' => 'footer_section',
        'label'   => __( 'Hide Scroll to Top Button', 'surplus-concert' ),
        'type'    => 'checkbox'
    )
);