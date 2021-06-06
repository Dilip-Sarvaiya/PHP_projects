<?php
/**
 * Surplus Concert Widgets.
 *
 * @package Surplus_Concert
 */
 
if( ! function_exists( 'surplus_concert_register_sidebars' ) ): 
    /**
     * Register widget area.
     *
     * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
     */
    function surplus_concert_register_sidebars() {

        register_sidebar( array(
            'name'          => __( 'Primary Sidebar', 'surplus-concert' ),
            'id'            => 'primary-sidebar',
            'description'   => __( 'Add widgets here.', 'surplus-concert' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) );

        $footer_sidebar_args = array(
            /* translators: %d: Slidebar number */
            'name'          => __( 'Footer Sidebar %d', 'surplus-concert' ),
            'id'            => 'footer-sidebar',          
            'description'   => '',
            'class'         => '',
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>' 
        );

        register_sidebars( 4, $footer_sidebar_args );        
    }
endif;
add_action( 'widgets_init', 'surplus_concert_register_sidebars' );
