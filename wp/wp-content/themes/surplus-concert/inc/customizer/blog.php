<?php
/**
 * Blog Section
 *
 * @package Surplus_Concert
 */

/** Load default theme options */
$default_options =  surplus_concert_default_theme_options();

/** Blog Sectopm */
$wp_customize->add_section(
    'blog_section',
    array(
        'title'    => __( 'Blog Section', 'surplus-concert' ),
        'priority' => 40,
        'panel'    => 'frontpage_panel',
    )
);

/** Blog Options */
$wp_customize->add_setting(
    'ed_blog_section',
    array(
        'default'           => $default_options['ed_blog_section'],
        'sanitize_callback' => 'surplus_concert_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'ed_blog_section',
    array(
        'label'       => __( 'Enable Blog Section.', 'surplus-concert' ),
        'section'     => 'blog_section',
        'type'        => 'checkbox'
    )            
);

/** Blog title */
$wp_customize->add_setting(
    'blog_title',
    array(
        'default'           => $default_options['blog_title'],
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage'
    )
);

$wp_customize->add_control(
    'blog_title',
    array(
        'section'         => 'blog_section',
        'label'           => __( 'Blog Title', 'surplus-concert' ),
        'active_callback' => 'surplus_concert_blog_ac'
    )
);

$wp_customize->selective_refresh->add_partial( 'blog_title', array(
    'selector'            => '#latest-posts .section-header h2.entry-title',
    'render_callback'     => 'surplus_concert_blog_title_selective_refresh',
    'container_inclusive' => false,
    'fallback_refresh'    => true,
) );