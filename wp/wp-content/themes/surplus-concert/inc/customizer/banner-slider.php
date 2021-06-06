<?php
/**
 * Banner Slider Section
 *
 * @package Surplus_Concert
 */

/** Load default theme options */
$default_options =  surplus_concert_default_theme_options();

/** Header contact info control */
$wp_customize->add_setting( 
    'banner_slider_type', 
    array(
        'default'           => $default_options['banner_slider_type'],
        'sanitize_callback' => 'surplus_concert_sanitize_select',
    ) 
);

$wp_customize->add_control(
    'banner_slider_type',
    array(
        'label'       => __( 'Select Banner / Slider Type', 'surplus-concert' ),
        'description' => __( 'Select option for banner slider controls.', 'surplus-concert' ),
        'section'     => 'banner_slider_section',
        'type'        => 'select',
        'choices'     => array(
            'disable'       => __( 'Disable', 'surplus-concert' ),
            'post_page'     => __( 'Post / Page Slider', 'surplus-concert' ),
            'category'      => __( 'Category Slider', 'surplus-concert' ),
            'static_video'  => __( 'Static / Video Banner', 'surplus-concert' ),
        ),
        'priority' => 5
    )
);

// slider control notes
$wp_customize->add_setting( 
    'slider_control_note1',
     array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post'
    ) 
);

$wp_customize->add_control( 
    new Surplus_Concert_Note_Control(
        $wp_customize,
        'slider_control_note1',
         array(
            /* translators: 1: html string 2: html string */
            'label'           => sprintf( __( '%1$sStatic/Video Message%2$s', 'surplus-concert' ), '<hr><b>', '</b>'),
            'description'     => sprintf( __( 'You have to set Video/Image on %1$sHeader Media%2$s Section to make full implement of this feature.','surplus-concert'),'<b>', '</b>'),
            'section'         => 'banner_slider_section',
            'type'              => 'note',
            'active_callback' => 'surplus_concert_banner_slider_active_cb',
        )
    )
);

 /** Banner Subtitle */
$wp_customize->add_setting(
    'banner_subtitle',
    array(
        'default'           =>  $default_options['banner_subtitle'],
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    )
);

$wp_customize->add_control(
    'banner_subtitle',
    array(
        'label'           => esc_html__( 'Subtitle', 'surplus-concert' ),
        'section'         => 'banner_slider_section',
        'active_callback' => 'surplus_concert_banner_slider_active_cb',
    )
);

$wp_customize->selective_refresh->add_partial( 'banner_subtitle', array(
    'selector'            => '#slider-banner-wrapper .main-slider-contents .entry-content.static-banner p',
    'render_callback'     => 'surplus_concert_banner_subtitle_selective_refresh',
    'container_inclusive' => false,
    'fallback_refresh'    => true,
) );

// Banner Title
$wp_customize->add_setting(
    'banner_title',
    array(
        'default'           =>  $default_options['banner_title'],
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    )
);

$wp_customize->add_control(
    'banner_title',
    array(
        'label'           => esc_html__( 'Title', 'surplus-concert' ),
        'section'         => 'banner_slider_section',
        'active_callback' => 'surplus_concert_banner_slider_active_cb',
    )
);

$wp_customize->selective_refresh->add_partial( 'banner_title', array(
    'selector'            => '#slider-banner-wrapper .main-slider-contents .entry-header.static-banner  h2.entry-title',
    'render_callback'     => 'surplus_concert_banner_title_selective_refresh',
    'container_inclusive' => false,
    'fallback_refresh'    => true,
) );

// Banner Button Label
$wp_customize->add_setting(
    'banner_button_label',
    array(
        'default'           =>  $default_options['banner_button_label'],
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    )
);

$wp_customize->add_control(
    'banner_button_label',
    array(
        'label'           => esc_html__( 'Button Label', 'surplus-concert' ),
        'section'         => 'banner_slider_section',
        'active_callback' => 'surplus_concert_banner_slider_active_cb',
    )
);

$wp_customize->selective_refresh->add_partial( 'banner_button_label', array(
    'selector'            => '#slider-banner-wrapper .main-slider-contents a.btn-banner',
    'render_callback'     => 'surplus_concert_banner_btntext_selective_refresh',
    'container_inclusive' => false,
    'fallback_refresh'    => true,
) );

// Banner Button Link
$wp_customize->add_setting(
    'banner_button_link',
    array(
        'default'           =>  $default_options['banner_button_link'],
        'sanitize_callback' => 'esc_url_raw',
    )
);

$wp_customize->add_control(
    'banner_button_link',
    array(
        'label'           => esc_html__( 'Button Link', 'surplus-concert' ),
        'section'         => 'banner_slider_section',
        'type'            => 'url',
        'active_callback' => 'surplus_concert_banner_slider_active_cb',
    )
);

// Number of slides
$wp_customize->add_setting( 
    'number_of_slides',
     array(
        'default'           => $default_options['number_of_slides'],
        'sanitize_callback' => 'surplus_concert_sanitize_number_range'
    ) 
);

$wp_customize->add_control( 
    'number_of_slides',
     array(
        'label'           => __( 'No of Slides', 'surplus-concert' ),
        'description'     => __( 'Save and refresh page to view effect', 'surplus-concert' ),
        'section'         => 'banner_slider_section',
        'type'              => 'number',
        'input_attrs'       => array(
            'min'           => 1,
            'max'           => 12,
            'style'         => 'width: 80px;'
        ),
        'active_callback' => 'surplus_concert_banner_slider_active_cb',
    )
);

// Add single category
$wp_customize->add_setting(  
    'slider_category',
    array(
        'default'           => $default_options['slider_category'], 
        'sanitize_callback' => 'surplus_concert_sanitize_select',
    )
) ;

$wp_customize->add_control( 
    'slider_category', 
    array(
        'label'             => esc_html__( 'Select Category', 'surplus-concert' ),
        'section'           => 'banner_slider_section',
        'type'              => 'select',
        'choices'           => surplus_concert_get_default_category(),
        'active_callback'   => 'surplus_concert_banner_slider_active_cb'
    )
);

$number_of_slides = get_theme_mod( 'number_of_slides', $default_options['number_of_slides'] );

for ( $i=1; $i<=$number_of_slides; $i++ ) {
    $wp_customize->add_setting( 
        'slider_slide_id_' . $i ,
         array(
            'default'           => $default_options['slider_slide_id' ],
            'sanitize_callback' => 'surplus_concert_sanitize_select'
        ) 
    );

    $wp_customize->add_control( 
        'slider_slide_id_' . $i ,
         array(
            /* translators: %s: Slide number */
            'label'       => sprintf( __( 'Select Slide %s', 'surplus-concert' ), $i ),
            /* translators: %s: Slide number */
            'description' => sprintf( __( 'select post / page for slide %s', 'surplus-concert' ), $i ),
            'section'     => 'banner_slider_section',
            'type'        => 'select',
            'choices'     => surplus_concert_get_posts( array( 'post', 'page' ) ),
            'active_callback' => 'surplus_concert_banner_slider_active_cb',
        )
    );
}

// Slider Button Link
$wp_customize->add_setting(
    'slider_button_label',
    array(
        'default'           =>  $default_options['slider_button_label'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    'slider_button_label',
    array(
        'label'           => esc_html__( 'Button Label', 'surplus-concert' ),
        'section'         => 'banner_slider_section',
        'active_callback' => 'surplus_concert_banner_slider_active_cb',
    )
);

$wp_customize->selective_refresh->add_partial( 'slider_button_label', array(
    'selector'            => '#slider-banner-wrapper .main-slider-contents a.btn-slider',
    'render_callback'     => 'surplus_concert_banner_title_selective_refresh',
    'container_inclusive' => false,
    'fallback_refresh'    => true,
) );

// slider control notes
$wp_customize->add_setting( 
    'slider_control_note',
     array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post'
    ) 
);

$wp_customize->add_control( 
    new Surplus_Concert_Note_Control(
        $wp_customize,
        'slider_control_note',
         array(
            /* translators: 1: html string 2: html string */
            'label'           => sprintf( __( '%1$sSlider Controls%2$s', 'surplus-concert' ), '<hr><b>', '</b>'),
            'description'     => '<hr>',
            'section'         => 'banner_slider_section',
            'type'              => 'note',
            'active_callback' => 'surplus_concert_banner_slider_active_cb',
        )
    )
);

  // Add slide effects
$wp_customize->add_setting( 
    'slider_effect', 
    array(
        'default'           => $default_options['slider_effect'],
        'sanitize_callback' => 'surplus_concert_sanitize_select'
    ) 
);

$wp_customize->add_control( 
    'slider_effect', 
    array(
        'label'             => __( 'Transition Effects', 'surplus-concert' ),
        'section'           => 'banner_slider_section',
        'type'              => 'select',
        'choices'           => surplus_concert_slider_effect(),
        'active_callback'   => 'surplus_concert_banner_slider_active_cb',
    ) 
);

// Add slider transition duration
$wp_customize->add_setting( 
    'slider_trans_duration', 
    array(
        'default'           => $default_options['slider_trans_duration'],
        'sanitize_callback' => 'surplus_concert_sanitize_select'
    ) 
);

$wp_customize->add_control( 
    'slider_trans_duration', 
    array(
        'label'             => __( 'Transition Duration', 'surplus-concert' ),
        'section'           => 'banner_slider_section',
        'type'              => 'select',
        'choices'           => surplus_concert_slider_transition_duration(),
        'active_callback'   => 'surplus_concert_banner_slider_active_cb',
    ) 
);

// Add  arrow controls
$wp_customize->add_setting( 
    'ed_slider_nav', 
    array(
        'default'           => $default_options['ed_slider_nav'],
        'sanitize_callback' => 'surplus_concert_sanitize_checkbox'
    ) 
);

$wp_customize->add_control( 
    'ed_slider_nav', 
    array(
        'label'             => __( 'Enable Navigation Arrow', 'surplus-concert' ),
        'section'           => 'banner_slider_section',
        'type'              => 'checkbox',
        'active_callback'   => 'surplus_concert_banner_slider_active_cb',
    ) 
);

// Add slider pager
$wp_customize->add_setting( 
    'ed_slider_pager', 
    array(
        'default'           => $default_options['ed_slider_pager'],
        'sanitize_callback' => 'surplus_concert_sanitize_checkbox'
    ) 
);

$wp_customize->add_control( 
    'ed_slider_pager', 
    array(
        'label'             => __( 'Enable Pager Controls', 'surplus-concert' ),
        'section'           => 'banner_slider_section',
        'type'              => 'checkbox',
        'active_callback'   => 'surplus_concert_banner_slider_active_cb',
    ) 
);

// Add slider dragable
$wp_customize->add_setting( 'ed_slider_dragable', 
    array(
        'default'           => $default_options['ed_slider_dragable'],
        'sanitize_callback' => 'surplus_concert_sanitize_checkbox'
    ) 
);

$wp_customize->add_control( 
    'ed_slider_dragable', 
    array(
        'label'             => __( 'Slider Draggable', 'surplus-concert' ),
        'section'           => 'banner_slider_section',
        'type'              => 'checkbox',
        'active_callback'   => 'surplus_concert_banner_slider_active_cb',
    ) 
);

// Add slider pause on hover
$wp_customize->add_setting( 
    'ed_pause_on_hover', 
    array(
        'default'           => $default_options['ed_pause_on_hover'],
        'sanitize_callback' => 'surplus_concert_sanitize_checkbox'
    ) 
);

$wp_customize->add_control( 
    'ed_pause_on_hover', 
    array(
        'label'             => __( 'Pause On Hover', 'surplus-concert' ),
        'section'           => 'banner_slider_section',
        'type'              => 'checkbox',
        'active_callback'   => 'surplus_concert_banner_slider_active_cb',
    ) 
);

// Add slider auto play
$wp_customize->add_setting( 
    'ed_slider_autoplay', 
    array(
        'default'           => $default_options['ed_slider_autoplay'],
        'sanitize_callback' => 'surplus_concert_sanitize_checkbox'
    ) 
);

$wp_customize->add_control( 
    'ed_slider_autoplay', 
    array(
        'label'             => __( 'Auto Play', 'surplus-concert' ),
        'section'           => 'banner_slider_section',
        'type'              => 'checkbox',
        'active_callback'   => 'surplus_concert_banner_slider_active_cb',
    ) 
);
