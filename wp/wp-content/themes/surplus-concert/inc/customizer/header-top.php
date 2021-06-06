<?php
/**
 * Header Top Section
 *
 * @package Surplus_Concert
 */

/** Load default theme options */
$default_options =  surplus_concert_default_theme_options();

/** Header top section */
$wp_customize->add_section(
    'header_top_section',
    array(
        'title'    => __( 'Header Top', 'surplus-concert' ),
        'priority' => 20,
    )
);

/** Header contact info control */
$wp_customize->add_setting( 
    'show_header_contact_info', 
    array(
        'default'           => $default_options['show_header_contact_info'],
        'sanitize_callback' => 'surplus_concert_sanitize_checkbox',
    ) 
);

$wp_customize->add_control(
    'show_header_contact_info',
    array(
        'label'       => __( 'Show Contact Info', 'surplus-concert' ),
        'section'     => 'header_top_section',
        'type'        => 'checkbox',
    )
);

/** Email */
$wp_customize->add_setting( 
    'header_email', 
    array(
        'default'           => $default_options['header_email'],
        'sanitize_callback' => 'sanitize_email',
        'transport'         => 'postMessage',
    ) 
);

$wp_customize->add_control(
    'header_email',
    array(
        'label'           => __( 'Email', 'surplus-concert' ),
        'description'     => __( 'Enter valid email address.', 'surplus-concert' ),
        'section'         => 'header_top_section',
        'active_callback' => 'surplus_concert_contact_info_ac',
    )
);

$wp_customize->selective_refresh->add_partial( 'header_email', array(
    'selector'            => '.top-bar-widgets .widget_address_block a.email',
    'render_callback'     => 'surplus_concert_headertop_email_selective_refresh',
    'container_inclusive' => false,
    'fallback_refresh'    => true,
) );

/** Phone */
$wp_customize->add_setting( 'header_phone', array(
    'default'           => $default_options['header_phone'],
    'sanitize_callback' => 'sanitize_text_field',
    'transport'         => 'postMessage',
) );

$wp_customize->add_control(
    'header_phone',
    array(
        'label'           => __( 'Phone', 'surplus-concert' ),
        'description'     => __( 'Enter phone number.', 'surplus-concert' ),
        'section'         => 'header_top_section',
        'active_callback' => 'surplus_concert_contact_info_ac',
    )
);

$wp_customize->selective_refresh->add_partial( 'header_phone', array(
    'selector'            => '.top-bar-widgets .widget_address_block a.phone',
    'render_callback'     => 'surplus_concert_headertop_phone_selective_refresh',
    'container_inclusive' => false,
    'fallback_refresh'    => true,
) );


/** Header social links control */
$wp_customize->add_setting( 
    'show_header_social_links', 
    array(
        'default'           => $default_options['show_header_social_links'],
        'sanitize_callback' => 'surplus_concert_sanitize_checkbox',
    ) 
);

$wp_customize->add_control(
    'show_header_social_links',
    array(
        'label'       => __( 'Show Social Links', 'surplus-concert' ),
        'section'     => 'header_top_section',
        'type'        => 'checkbox',
    )
);

/** Social Link info */
$wp_customize->add_setting( 'social_link_info',
    array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
    )
);

$wp_customize->add_control( new Surplus_Concert_Note_Control( $wp_customize,
    'social_link_info', 
        array(
            'section'     => 'header_top_section',
            'description' => sprintf( __( '%1$sEnter full URL%2$s. Example: https://www.facebook.com/', 'surplus-concert' ), '<b>', '</b>' )
        )
    )
);

$wp_customize->add_setting( 
    'social_link_1', 
    array(
        'default'           => $default_options['social_link_1'],
        'sanitize_callback' => 'esc_url_raw',
    ) 
);

$wp_customize->add_control(
    'social_link_1',
    array(
        'label'       => __( 'Social Link 1', 'surplus-concert' ),
        'section'     => 'header_top_section',
        'type'        => 'url',
        'active_callback' => 'surplus_concert_social_links_ac',
    )
);

$wp_customize->add_setting( 
    'social_link_2', 
    array(
        'default'           => $default_options['social_link_2'],
        'sanitize_callback' => 'esc_url_raw',
    ) 
);

$wp_customize->add_control(
    'social_link_2',
    array(
        'label'       => __( 'Social Link 2', 'surplus-concert' ),
        'section'     => 'header_top_section',
        'type'        => 'url',
        'active_callback' => 'surplus_concert_social_links_ac',
    )
);

$wp_customize->add_setting( 
    'social_link_3', 
    array(
        'default'           => $default_options['social_link_3'],
        'sanitize_callback' => 'esc_url_raw',
    ) 
);

$wp_customize->add_control(
    'social_link_3',
    array(
        'label'       => __( 'Social Link 3', 'surplus-concert' ),
        'section'     => 'header_top_section',
        'type'        => 'url',
        'active_callback' => 'surplus_concert_social_links_ac',
    )
);

$wp_customize->add_setting( 
    'social_link_4', 
    array(
        'default'           => $default_options['social_link_4'],
        'sanitize_callback' => 'esc_url_raw',
    ) 
);

$wp_customize->add_control(
    'social_link_4',
    array(
        'label'       => __( 'Social Link 4', 'surplus-concert' ),
        'section'     => 'header_top_section',
        'type'        => 'url',
        'active_callback' => 'surplus_concert_social_links_ac',
    )
);

$wp_customize->add_setting( 
    'social_link_5', 
    array(
        'default'           => $default_options['social_link_5'],
        'sanitize_callback' => 'esc_url_raw',
    ) 
);

$wp_customize->add_control(
    'social_link_5',
    array(
        'label'       => __( 'Social Link 5', 'surplus-concert' ),
        'section'     => 'header_top_section',
        'type'        => 'url',
        'active_callback' => 'surplus_concert_social_links_ac',
    )
);