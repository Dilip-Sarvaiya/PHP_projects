<?php
/**
 * About Section
 *
 * @package Surplus_Concert
 */

/** Load default theme options */
$default_options =  surplus_concert_default_theme_options();

/** About Secton */
$wp_customize->add_section(
    'about_section',
    array(
        'title'    => __( 'About Section', 'surplus-concert' ),
        'priority' => 10,
        'panel'    => 'frontpage_panel',
    )
);

/** About Options */
$wp_customize->add_setting(
    'ed_about_section',
    array(
        'default'           => $default_options['ed_about_section'],
        'sanitize_callback' => 'surplus_concert_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'ed_about_section',
    array(
        'label'       => __( 'Enable About Section.', 'surplus-concert' ),
        'section'     => 'about_section',
        'type'        => 'checkbox',
    )            
);

$wp_customize->add_setting( 
    'about_page_id', 
    array(
        'default'           => $default_options['about_page_id'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'surplus_concert_sanitize_dropdown_pages',
    ) 
);

$wp_customize->add_control( 
    'about_page_id', 
    array(
        'label'           => __( 'Select Page for About Section.', 'surplus-concert' ),
        'description'     => __( 'Page title, content and featured image of selected page.  Static Homepage will be displayed if page field is empty.', 'surplus-concert' ),
        'section'         => 'about_section', // Add a default or your own section
        'type'            => 'dropdown-pages',
        'active_callback' => 'surplus_concert_about_ac'
    ) 
);