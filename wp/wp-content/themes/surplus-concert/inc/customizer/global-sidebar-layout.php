<?php
/**
 * Global Sidebar Layout Section
 *
 * @package Surplus_Concert
 */

/** Load default theme options */
$default_options =  surplus_concert_default_theme_options();

/** Global Sidebar Layout Section */
$wp_customize->add_section(
    'global_sidebar_layout_section',
    array(
        'title'    => __( 'Global Sidebar Layout', 'surplus-concert' ),
        'priority' => 40,
        'panel'    => 'appearance_panel',
    )
);

/** Blog Sidebar layout */
$wp_customize->add_setting( 
    'blog_sidebar_layout', 
    array(
        'default'           => $default_options['blog_sidebar_layout'],
        'sanitize_callback' => 'surplus_concert_sanitize_select'
    ) 
);

$wp_customize->add_control(
    new Surplus_Concert_Radio_Image_Control(
        $wp_customize,
        'blog_sidebar_layout',
        array(
            'section'     => 'global_sidebar_layout_section',
            'label'       => __( 'Blog ( Homepage ) Sidebar Layout', 'surplus-concert' ),
            'description' => __( 'This is the default sidebar layout for Blog(  Home ) page.', 'surplus-concert' ),
            'choices'     => array(
                'no-sidebar'    => get_template_directory_uri() . '/assets/images/no-sidebar.png',
                'left-sidebar'  => get_template_directory_uri() . '/assets/images/left-sidebar.png',
                'right-sidebar' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
            )
        )
    )
);

/** Default Sidebar layout */
$wp_customize->add_setting( 
    'default_sidebar_layout', 
    array(
        'default'           => $default_options['default_sidebar_layout'],
        'sanitize_callback' => 'surplus_concert_sanitize_select'
    ) 
);

$wp_customize->add_control(
	new Surplus_Concert_Radio_Image_Control(
		$wp_customize,
		'default_sidebar_layout',
		array(
			'section'	  => 'global_sidebar_layout_section',
			'label'		  => __( 'Default Sidebar Layout', 'surplus-concert' ),
			'description' => __( 'This is the default sidebar layout for post/pages, archive and search pages.', 'surplus-concert' ),
			'choices'	  => array(
				'no-sidebar'    => get_template_directory_uri() . '/assets/images/no-sidebar.png',
				'left-sidebar'  => get_template_directory_uri() . '/assets/images/left-sidebar.png',
                'right-sidebar' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
			)
		)
	)
);