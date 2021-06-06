<?php
/**
 * Active Callback functions
 *
 * @package Surplus Concert
 */

if ( ! function_exists( 'surplus_concert_social_links_ac' ) ) :

    /**
     * Active Callback for social links section
     */
    function surplus_concert_social_links_ac( $control ){

        $show_contact_info = $control->manager->get_setting( 'show_header_social_links' )->value();
        $control_id        = $control->id;

        if ( $control_id == 'social_link_1' && $show_contact_info ) return true;
        if ( $control_id == 'social_link_2' && $show_contact_info ) return true;
        if ( $control_id == 'social_link_3' && $show_contact_info ) return true;
        if ( $control_id == 'social_link_4' && $show_contact_info ) return true;
        if ( $control_id == 'social_link_5' && $show_contact_info ) return true;
             
        return false;
    }
endif;

if ( ! function_exists( 'surplus_concert_contact_info_ac' ) ) :

    /**
     * Active Callback for contact info section
     */
    function surplus_concert_contact_info_ac( $control ){

        $show_contact_info = $control->manager->get_setting( 'show_header_contact_info' )->value();
        $control_id        = $control->id;
             
        if ( $control_id == 'header_email' && $show_contact_info ) return true;
        if ( $control_id == 'header_phone' && $show_contact_info ) return true;

        return false;
    }
endif;

if ( ! function_exists( 'surplus_concert_about_ac' ) ) :

    /**
     * Active Callback
     */
    function surplus_concert_about_ac( $control ){

        $show_about_section = $control->manager->get_setting( 'ed_about_section' )->value();
        $control_id         = $control->id;

        if ( $control_id == 'about_page_id' && $show_about_section ) return true;

        return false;
    }
endif;

if ( ! function_exists( 'surplus_concert_blog_ac' ) ) :

    /**
     * Active Callback
     */
    function surplus_concert_blog_ac( $control ){

        $show_blog  = $control->manager->get_setting( 'ed_blog_section' )->value();
        $control_id = $control->id;

        // Blog title
        if ( $control_id == 'blog_title' && $show_blog ) return true;

        return false;
    }
endif;

if ( ! function_exists( 'surplus_concert_banner_slider_active_cb' ) ) :
    /**
     * Active Callback Banner / Slider Controls
     */
    function surplus_concert_banner_slider_active_cb( $control ){
        $banner      = $control->manager->get_setting( 'banner_slider_type' )->value();
        $slide_count = $control->manager->get_setting( 'number_of_slides' )->value();
        $control_id  = $control->id;
        
        // static banner controls
        if ( $control_id == 'slider_control_note1' && $banner == 'static_video' ) return true;
        if ( $control_id == 'banner_title' && $banner == 'static_video' ) return true;
        if ( $control_id == 'banner_subtitle' && $banner == 'static_video' ) return true;
        if ( $control_id == 'banner_button_label' && $banner == 'static_video' ) return true;
        if ( $control_id == 'banner_button_link' && $banner == 'static_video' ) return true;

        // Slider controls
        if ( $control_id == 'number_of_slides' && ( $banner == 'post_page' || $banner == 'category' ) ) return true;
        if ( $control_id == 'slider_category' && $banner == 'category' ) return true;

        for ( $i=1; $i <= $slide_count ; $i++ ) { 
            if ( $control_id == 'slider_slide_id_'.$i && $banner == 'post_page' ) return true;
        }

        if ( $control_id == 'slider_button_label' && ( $banner == 'post_page' || $banner == 'category' ) ) return true;
        if ( $control_id == 'slider_control_note' && ( $banner == 'post_page' || $banner == 'category' ) ) return true;
        if ( $control_id == 'slider_effect' && ( $banner == 'post_page' || $banner == 'category' ) ) return true;
        if ( $control_id == 'slider_trans_duration' && ( $banner == 'post_page' || $banner == 'category' ) ) return true;
        if ( $control_id == 'ed_slider_nav' && ( $banner == 'post_page' || $banner == 'category' ) ) return true;
        if ( $control_id == 'ed_slider_pager' && ( $banner == 'post_page' || $banner == 'category' ) ) return true;
        if ( $control_id == 'ed_slider_dragable' && ( $banner == 'post_page' || $banner == 'category' ) ) return true;
        if ( $control_id == 'ed_pause_on_hover' && ( $banner == 'post_page' || $banner == 'category' ) ) return true;
        if ( $control_id == 'ed_slider_autoplay' && ( $banner == 'post_page' || $banner == 'category' ) ) return true;

        return false;
    }
endif;