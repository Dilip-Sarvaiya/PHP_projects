<?php
/**
 * Customizer default value.
 *
 * @package Surplus_Concert
 */
if ( ! function_exists( 'surplus_concert_default_theme_options' ) ) :

    /**
     * Add customizer default options
     */
    function surplus_concert_default_theme_options() {

    	$default_options = array(
            // Header top 
            'show_header_contact_info' => false,
            'header_email'             => '',
            'header_phone'             => '',
            'show_header_social_links' => false,
            'social_link_1'            => '',
            'social_link_2'            => '',
            'social_link_3'            => '',
            'social_link_4'            => '',
            'social_link_5'            => '',
            
            // Banner slider
            'banner_slider_type'       => 'post_page',
            'number_of_slides'         => 3,
            'slider_category'          => '',
            'slider_button_label'      => __( 'Read More', 'surplus-concert' ),
            'slider_slide_id'          => '',
            'slider_effect'            => 'fade',
            'slider_trans_duration'    => '2000',
            'ed_slider_nav'            => true,
            'ed_slider_pager'          => true,
            'ed_slider_dragable'       => true,
            'ed_pause_on_hover'        => true,
            'ed_slider_autoplay'       => true,
            'banner_subtitle'          => __( 'Perform the greatest hits in music history.', 'surplus-concert' ),
            'banner_title'             => __( 'Make your own show.', 'surplus-concert' ),
            'banner_button_label'      => __( 'Read More', 'surplus-concert' ),
            'banner_button_link'       => '#',
            
            // About section 
            'ed_about_section'         => true,
            'about_page_id'            => '0',
            
            // Blog section
            'ed_blog_section'          => true,
            'blog_title'               => __( 'Latest posts', 'surplus-concert' ),
            
            // Site layout
            'site_layout'              => 'wide',

            // Global sidebar section
            'blog_sidebar_layout'      => 'right-sidebar',
            'default_sidebar_layout'   => 'right-sidebar',
            
            // Breadcrumb
            'ed_breadcrumb'            => true,
            
            // Excerpt section
            'ed_blog_excerpt'          => true,
            'excerpt_length'           => 55,
            'read_more_text'           => __( 'Read More', 'surplus-concert' ),
            
            // Footer section 
            'footer_copyright'         => __( '&copy; All Rights Reserved.', 'surplus-concert' ),
            'ed_scroll_to_top'         => false,
    	);

    	$output = apply_filters( 'surplus_concert_default_theme_options', $default_options );

    	return $output;
    }
endif;