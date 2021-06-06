<?php
/**
 * Surplus Concert Theme Custom functions 
 * 
 * @package Surplus_Concert
 */

if ( ! function_exists( 'surplus_concert_fonts_url' ) ) :

	/**
	 * Return fonts URL.
	 *
	 * @since 1.0.0
	 * @return string Font URL.
	 */ 
	function surplus_concert_fonts_url() {
  
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Oxygen, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Oxygen font: on or off', 'surplus-concert' ) ) {
			$fonts[] = 'Oxygen:300,400,700';
		}

		/* translators: If there are characters in your language that are not supported by Poppins, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'surplus-concert' ) ) {
			$fonts[] = 'Poppins:300,400,500,600,700';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), 'https://fonts.googleapis.com/css' );
		}

		return $fonts_url;

	}

endif;

if( ! function_exists( 'surplus_concert_get_home_sections' ) ) :

	/**
	 * Returns Home Sections 
	*/
	function surplus_concert_get_home_sections(){
		$default_options          = surplus_concert_default_theme_options();
		$sections                 = array();

		$enable_about_section     = get_theme_mod( 'ed_about_section', $default_options['ed_about_section'] );
		if( $enable_about_section ) array_push( $sections, 'about' );
		
		$enable_blog_section      = get_theme_mod( 'ed_blog_section', $default_options['ed_blog_section'] );
		if( $enable_blog_section ) array_push( $sections, 'blog' );
		
	    return $sections;
	}
endif;

if ( ! function_exists( 'surplus_concert_the_excerpt' ) ) :
 
	/**
	 * Generate excerpt.
	 *
	 * @since 1.0.0
	 *
	 * @param int     $length   Excerpt length in words.
	 * @param WP_Post $post_obj WP_Post instance.
	 * @return string Excerpt.
	 */
	function surplus_concert_the_excerpt( $length, $post_obj = null ) {

		global $post;

		if ( is_null( $post_obj ) ) {
 			$post_obj = $post;
		}

		$length = absint( $length );

		if ( 0 === $length ) {			 return;
		}

		$source_content = $post_obj->post_content;

		if ( ! empty( $post_obj->post_excerpt ) ) {
			$source_content = $post_obj->post_excerpt;
		}

		$source_content = strip_shortcodes( $source_content );
		$trimmed_content = wp_trim_words( $source_content, $length, '&hellip;' );

		return $trimmed_content;
	}

endif;

if ( ! function_exists( 'surplus_concert_primary_navigation_fallback' ) ) :

	/**
	 * Fallback for primary navigation.
	 *
	 * @since 1.0.0
	 */
	function surplus_concert_primary_navigation_fallback() {

		echo '<ul class="menu nav-menu">';
		echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'surplus-concert' ) . '</a></li>';

		$args = array(
			'posts_per_page' => 5,
			'post_type'      => 'page',
			'orderby'        => 'name',
			'order'          => 'ASC',
			);

		$the_query = new WP_Query( $args );

		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				the_title( '<li><a href="' . esc_url( get_permalink() ) . '">', '</a></li>' );
			}
			wp_reset_postdata();
		}

		echo '</ul>';
	}

endif;

if ( ! function_exists( 'surplus_concert_render_social_links' ) ) :

	/**
	 * Render social links.
	 *
	 * @since 1.0.0
	 */
	function surplus_concert_render_social_links( $social_links = array() ) {
		if ( empty( $social_links ) ) {
			return;
		}

		echo '<div class="social-icons">';
		echo '<ul>';
		foreach ( $social_links as $link ) {
			echo '<li><a href="' . esc_url( $link ) . '" target="_blank"></a></li>';
		}
		echo '</ul>';
		echo '</div>';
	}

endif;

if ( ! function_exists( 'surplus_concert_site_branding' ) ) :

	/**
	 * Render site branding.
	 *
	 * @since 1.0.0
	 */
	function surplus_concert_site_branding(){ ?>

		<div class="site-branding">
        	<?php if ( function_exists( 'has_custom_logo' ) && has_custom_logo() ) : ?>
	            <div class="site-logo">
	                <?php the_custom_logo() ?>
	            </div>
	        <?php endif; ?>

			<div id="site-identity">
                <h1 class="site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">  <?php bloginfo( 'name' ); ?></a>
                </h1>

                <?php 
                    $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) : ?>
                    <p class="site-description"><?php echo esc_html($description);?></p>
                <?php endif; ?>
            </div><!-- #site-identity -->
		    
        </div><!-- .site-branding -->

    <?php 
	}

endif;

if ( ! function_exists( 'surplus_concert_navigation_menu' ) ) :

	/**
	 * Render Navigation Menu.
	 *
	 * @since 1.0.0
	 */
	function surplus_concert_navigation_menu(){ ?>

		<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="Primary Menu">
			<button type="button" class="menu-toggle" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".close-main-nav-toggle">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="primary-menu-list main-menu-modal cover-modal" data-modal-target-string=".main-menu-modal">
	            <button class="close close-main-nav-toggle" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".main-menu-modal"></button>
	            <div class="mobile-menu" aria-label="Mobile">
				<?php 
	                wp_nav_menu( array(
	                    'theme_location' => 'primary-menu',
	                    'menu_id'        => 'primary-menu',
	                    'menu_class'     => 'nav-menu main-menu-modal', 
	                    'container'      => false,
	                    'fallback_cb'    => 'surplus_concert_primary_navigation_fallback',
	                ) );
	            ?>
	        </div>
	    </div>
        </nav><!-- .main-navigation-->
        
    <?php 
	}

endif;

if ( ! function_exists( 'surplus_concert_get_posts' ) ) :

	/**
	 * Fuction to list post form custom post type
	 */
	function surplus_concert_get_posts( $post_type = 'post' ){
	    
	    $args = array(

	        'posts_per_page'   => -1,
	        'post_type'        => $post_type,
	        'post_status'      => 'publish',
	        'suppress_filters' => true 

	    );

	    $posts_array = get_posts( $args );
	    
	    // Initate an empty array
	    $post_options = array();
	    $post_options[''] = __( ' -- Choose -- ', 'surplus-concert' );
	    if ( ! empty( $posts_array ) ) {
	        foreach ( $posts_array as $posts ) {
	            $post_options[ $posts->ID ] = $posts->post_title;
	        }
	    }

	    return $post_options;
	}

endif;

if ( ! function_exists( 'surplus_concert_slider_effect' ) ) :

    /**
     * Slider effects
     * @return array slider effects
     */
    function surplus_concert_slider_effect() {

      $slider_effect = array(
        'fade'                                        => esc_html__( 'Fade', 'surplus-concert' ),
        'cubic-bezier(0.250, 0.250, 0.750, 0.750)'    => esc_html__( 'Linear', 'surplus-concert' ),
        'cubic-bezier(0.250, 0.100, 0.250, 1.000)'    => esc_html__( 'Ease', 'surplus-concert' ),
        'cubic-bezier(0.950, 0.050, 0.795, 0.035)'    => esc_html__( 'cubic', 'surplus-concert' ),
        'cubic-bezier(0.600, -0.280, 0.735, 0.045)'   => esc_html__( 'Ease In Back', 'surplus-concert' ),
        'cubic-bezier(0.785, 0.135, 0.150, 0.860)'    => esc_html__( 'EaseInOutCirc', 'surplus-concert' ),
        'cubic-bezier(0.680, -0.550, 0.265, 1.550)'   => esc_html__( 'EaseInOutBack', 'surplus-concert' ),
      );

      $output =  apply_filters( 'surplus_concert_slider_effect', $slider_effect );

      return $output;

    }

endif;

if ( ! function_exists( 'surplus_concert_slider_transition_duration' ) ) :

    /**
     * Slider transition duration
     * @return array slider transition duration
     */
    function surplus_concert_slider_transition_duration() {

      $transition_duration = array(
        '1000'    => esc_html__( '1 sec', 'surplus-concert' ),
        '2000'    => esc_html__( '2 sec', 'surplus-concert' ),
        '3000'    => esc_html__( '3 sec', 'surplus-concert' ),
        '4000'    => esc_html__( '4 sec', 'surplus-concert' ),
        '5000'    => esc_html__( '5 sec', 'surplus-concert' ),
      );

      $output =  apply_filters( 'surplus_concert_slider_transition_duration', $transition_duration );

      return $output;

    }

endif;

if ( ! function_exists( 'surplus_concert_slider' ) ) :

    /**
     * Get slider from post / page or category option
     */
    function surplus_concert_slider() {

     	/** Load default theme options */
		$default_options    =  surplus_concert_default_theme_options(); 
		$slider_banner_type = get_theme_mod( 'banner_slider_type', $default_options['banner_slider_type'] );

		// Slider controls
		$slider_effect    = get_theme_mod( 'slider_effect', $default_options['slider_effect'] );
		$slider_effect    = ( $slider_effect == 'fade' ) ? 'linear' : get_theme_mod( 'slider_effect' );
        $slider_fade      = ( get_theme_mod( 'slider_effect' ) == 'fade' ) ? 'true' : 'false';
        $slider_speed     = get_theme_mod( 'slider_trans_duration', $default_options['slider_trans_duration'] );
        $slider_control   = get_theme_mod( 'ed_slider_nav', $default_options['ed_slider_nav'] );
        $slider_control   = ( $slider_control == '1' ) ? 'true' : 'false';
        $slider_pager     = get_theme_mod( 'ed_slider_pager', $default_options['ed_slider_pager'] );
        $slider_pager     = ( $slider_pager == '1' ) ? 'true' : 'false';
        $slider_dragable  = get_theme_mod( 'ed_slider_dragable' , $default_options['ed_slider_dragable'] );
        $slider_dragable  = ( $slider_dragable == '1' ) ? 'true' : 'false';
        $slider_pause     = get_theme_mod( 'ed_pause_on_hover', $default_options['ed_pause_on_hover'] );
        $slider_pause     = ( $slider_pause == '1' ) ? 'true' : 'false';
        $slider_autoplay  = get_theme_mod( 'ed_slider_autoplay', $default_options['ed_slider_autoplay'] );
        $slider_autoplay  = ( $slider_autoplay == '1' ) ? 'true' : 'false';

        $number_of_slides   = get_theme_mod( 'number_of_slides', $default_options['number_of_slides'] );
        $cat_id = get_theme_mod( 'slider_category', $default_options['slider_category'] );

        $post_page_ids 	= array();
        for ( $i=1; $i<=$number_of_slides; $i++ ) {
        	$post_page_id   = absint( get_theme_mod( 'slider_slide_id_'.$i, '' ) ); 
        	if ( ! empty( $post_page_id ) && $post_page_id > 0 ) {
        		$post_page_ids[] =  $post_page_id;
        	}
        }

        $args = array( 
				'posts_per_page'       => $number_of_slides,
				'post_status'          => 'publish',
				'post__not_in' 		   => get_option( 'sticky_posts' ),
				// 'ignore_sticky_posts ' => 1,
	    );

        if ( 'post_page' == $slider_banner_type ) {
	        if ( ! empty( $post_page_ids ) ) {
	            $args['post_type'] = array( 'post', 'page' );
	            $args['post__in'] = $post_page_ids;
	            $args['orderby']  = 'post__in'; 
	        }
        } else {
	        if ( ! empty( $cat_id ) ) {
	            $args['cat'] = $cat_id;
	        }
        }

        $slider_query = new WP_Query( $args );

        if ( $slider_query -> have_posts() ) { ?>
        	<div id="slider-banner-wrapper">
	        	<div id="main-slider" class="page-section" data-effect="<?php echo esc_attr( $slider_effect ); ?>" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": <?php echo esc_attr( $slider_speed ); ?>, "dots": <?php echo esc_attr( $slider_pager ); ?>, "arrows":<?php echo esc_attr( $slider_control ); ?>, "autoplay": <?php echo esc_attr( $slider_autoplay ); ?>, "fade": <?php echo esc_attr( $slider_fade ); ?>, "draggable": <?php echo esc_attr( $slider_dragable ); ?>, "pauseOnHover": <?php echo esc_attr( $slider_pause ); ?> }'>

	        	<?php while ( $slider_query -> have_posts() ) {
	        		$slider_query -> the_post(); 
	        		$post_id = get_the_ID();

	        		if ( has_post_thumbnail( ) ) {
	        			$image_array = wp_get_attachment_image_src(  get_post_thumbnail_id( $post_id ), 'surplus-concert-slider' );
	        			$image_src = $image_array[0];
					} else {
						$image_src = get_template_directory_uri() .'/assets/images/fallback/surplus-concert-slider.png';
					}

					$title = get_the_title( $post_id ); 

					if ( has_excerpt( ) ) {
						$source_content = get_the_excerpt();
					} else {
						$source_content = get_the_content();
					}

					if ( ! empty( $source_content ) ) {
						$source_content = strip_shortcodes( $source_content );
						$trimmed_content = wp_trim_words( $source_content, 8, '' );
					}

					$button_label = get_theme_mod( 'slider_button_label', $default_options['slider_button_label'] );
	        		?>
	        			 <div class="slider-item" style="background-image:url('<?php echo esc_url( $image_src ); ?>');">
				            <div class="black-overlay"></div><!-- .black-overlay -->
				            <div class="main-slider-contents container">

					            <?php if( ! empty( $trimmed_content ) ){ ?>
						            <div class="entry-content">
						            	<p><?php echo esc_html( $trimmed_content ); ?></p>
						            </div><!-- .entry-content -->
					            <?php } ?>

					            <?php if( ! empty( $title ) ) { ?>
						            <header class="entry-header">
						            	<h2 class="entry-title"><?php the_title(); ?></h2>
						            </header><!-- .entry-header -->
					            <?php }

					            if ( ! empty( $button_label ) ) { ?>
					            	<a href="<?php the_permalink(); ?>" class="btn btn-red btn-slider"><?php echo esc_html( $button_label ); ?></a>
					            <?php } ?>
				            
				            </div><!-- .main-slider-contents -->
				        </div><!-- .slider-item -->
	        		<?php
	        	} ?>
	        	</div><!-- #main-slider -->
	        </div><!-- #slider-banner-wrapper -->
        	<?php
        	wp_reset_query();        	
        }
        
    }

endif;

if ( ! function_exists( 'surplus_concert_banner' ) ) :

    /**
     * Get static or video banner 
     */
    function surplus_concert_banner() {

     	/** Load default theme options */
		$default_options    =  surplus_concert_default_theme_options(); 
		
		$title               = get_theme_mod( 'banner_title', $default_options['banner_title'] );
		$description         = get_theme_mod( 'banner_subtitle', $default_options['banner_subtitle'] );
		$button_label        = get_theme_mod( 'banner_button_label', $default_options['banner_button_label'] );
		$button_link         = get_theme_mod( 'banner_button_link', $default_options['banner_button_link'] );
		$custom_header_image = get_header_image_tag(); // get custom header image tag
    	$class               = has_header_video() ? 'video-banner' : '';
        ?>
        <div id="slider-banner-wrapper">
	        <section id="header-featured-image" class="page-section <?php echo esc_attr( $class ); ?>">
	            <div class="black-overlay"></div>
	           <?php 
	           		if( has_header_video() || $custom_header_image ) {
	           			the_custom_header_markup(); 
	           		} else {
						$site_title = get_bloginfo( 'name' );
						$alt        = ! empty( $site_title ) ? $site_title : __( 'Banner Image', 'surplus-concert' );

	           			echo '<div id="wp-custom-header" class="wp-custom-header"><img src="' . esc_url( get_template_directory_uri() . '/assets/images/fallback/surplus-concert-slider.png' ) . '" alt="'. esc_attr( $alt ) .'"></div>';
	           		}
	           	?>
	            <div class="main-slider-contents container">

	            	<?php if ( ! empty( $description ) ) { ?>
	            		<div class="entry-content static-banner">
			            	<p><?php echo esc_html( $description ); ?></p>
			            </div><!-- .entry-content -->
		            <?php } ?>

	            	<?php if ( ! empty( $title ) ) { ?>
	            		<header class="entry-header static-banner">
			            	<h2 class="entry-title"><?php echo esc_html( $title ); ?></h2>
			            </header><!-- .entry-header -->
		            <?php } ?>

		            <?php if ( ! empty( $button_label ) && ! empty( $button_link ) ) { ?>
		            	<a href="<?php echo esc_url( $button_link ); ?>" class="btn btn-red btn-banner"><?php echo esc_html( $button_label ); ?></a>
		            <?php } ?>

	            </div><!-- .main-slider-contents -->
	        </section><!-- #header-featured-image -->
	    </div><!-- #slider-banner-wrapper -->
    <?php
    }

endif;

if ( ! function_exists( 'surplus_concert_featured_image_banner' ) ) :

    /**
     * Get featured image banner 
     */
    function surplus_concert_featured_image_banner() {
    	global $post;

     	/** Load default theme options */
		$default_options     =  surplus_concert_default_theme_options(); 
		$slider_banner_type  = get_theme_mod( 'banner_slider_type', $default_options['banner_slider_type'] );
		
		$external_video_link = get_theme_mod( 'external_header_video', '' );
		$uploaded_video      = get_theme_mod( 'header_video', '' );
		$fallback_image      = '<img src="'. esc_url( get_template_directory_uri() ) .'/assets/images/fallback/surplus-concert-banner.png" alt="'. esc_attr( get_the_title( $post->ID ) ) .'" />';

		$class = '';
	    if( ( $external_video_link || $uploaded_video ) && 'static_video' == $slider_banner_type  ){
	        $class = "video-banner";
	    }
        ?>
        <section id="header-featured-image" class="page-section <?php echo esc_attr( $class ); ?>">
            <div class="black-overlay"></div>

            <?php 
           		if ( ( is_single() && 'post' == get_post_type () ) || is_page() ){
					$banner_option  = get_post_meta( $post->ID, 'banner_option', true );
					$banner_option  = ! empty( $banner_option ) ? $banner_option : 'header_image';
           			
           			if ( 'header_image' == $banner_option ) {
           				if( get_custom_header_markup() ){
	           				the_custom_header_markup();
	           			}else{
	           				echo $fallback_image;
	           			} 
           			} elseif ( 'featured_image' == $banner_option ) {
           				if ( has_post_thumbnail( $post->ID ) ) {
           					$image = get_the_post_thumbnail( $post->ID, 'surplus-concert-banner', array( 'alt' => get_the_title( $post->ID ) ) );
           					echo $image;
           				} else {
           					echo $fallback_image;
           				}
           			}
           		} else {
           			if( get_custom_header_markup() ){
           				the_custom_header_markup();
           			}else{
           				echo $fallback_image;
           			}
           		}
           	?>
            
             <div class="container">
                <div class="page-detail">

                <?php 
                	surplus_concert_get_page_title();
                   	surplus_concert_get_breadcrumb(); 
                ?>

                </div><!-- .page-detail -->
            </div><!-- .wrapper -->
        </section><!-- #header-featured-image -->
    <?php
    }

endif;

if ( ! function_exists( 'surplus_concert_footer_sidebar_class' ) ) :

	/**
	 * Count the number of footer sidebars to enable dynamic classes for the footer
	 *
	 */
	function surplus_concert_footer_sidebar_class() {

		$data = array();
		$active_sidebar = array();
	   	$count = 0;

	   	if ( is_active_sidebar( 'footer-sidebar' ) ) {
	   		$active_sidebar[] 	= 'footer-sidebar';
	      	$count++;
	   	}

	   	if ( is_active_sidebar( 'footer-sidebar-2' ) ){
	   		$active_sidebar[] 	= 'footer-sidebar-2';
	      	$count++;
		}

	   	if ( is_active_sidebar( 'footer-sidebar-3' ) ){
	   		$active_sidebar[] 	= 'footer-sidebar-3';
	      	$count++;
	   	}

	   	if ( is_active_sidebar( 'footer-sidebar-4' ) ){
	   		$active_sidebar[] 	= 'footer-sidebar-4';
	      	$count++;
	   	}

	   	$class = '';

	   	switch ( $count ) {
        	case '1':
            $class = 'col-1';
            break;
        	case '2':
            $class = 'col-2';
            break;
        	case '3':
            $class = 'col-3';
            break;
            case '4':
            $class = 'col-4';
            break;
	   	}

		$data['active_sidebar'] = $active_sidebar;
		$data['class']     		= $class;

	   	return $data;
	}

endif;

if( ! function_exists( 'surplus_concert_is_woocommerce_activated' ) ) :

    /**
     * Check if woocommerce plugin is active in theme
     * @link https://wordpress.stackexchange.com/questions/159177/how-to-check-if-woocommerce-is-activated-in-theme
     */
    function surplus_concert_is_woocommerce_activated() {
        return class_exists( 'woocommerce' ) ? true : false;
    }

endif;

if ( ! function_exists( 'surplus_concert_get_breadcrumb' ) ) :

    /**
     * Custom Bread Crumb
     *
     */
    function surplus_concert_get_breadcrumb() {

        global $post;
    
        $default_options   = surplus_concert_default_theme_options(); // Get default theme options
        $post_page         = get_option( 'page_for_posts' ); //The ID of the page that displays posts.
        $show_front        = get_option( 'show_on_front' ); //What to show on the front page
        $enable_breadcrumb = get_theme_mod( 'ed_breadcrumb', $default_options['ed_breadcrumb'] );
        $delimiter         = esc_html__( '>', 'surplus-concert' ); // delimiter between crumbs
        $before            = '<span class="current">'; // tag before the current crumb
        $after             = '</span>'; // tag after the current crumb
        
        if( $enable_breadcrumb ){

            echo '<div class="breadcrumb-list">';
            echo '<div id="crumbs"><a href="' . esc_url( home_url() ) . '" class="home_crumb">' . '<i class="fa fa-home"></i>' . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
            
            if( is_home() ){
            
                echo $before . esc_html( single_post_title( '', false ) ) . $after;
                
            }elseif( is_category() ){
                
                $thisCat = get_category( get_query_var( 'cat' ), false );
                
                if( $show_front === 'page' && $post_page ){ //If static blog post page is set
                    $p = get_post( $post_page );
                    echo ' <a href="' . esc_url( get_permalink( $post_page ) ) . '">' . esc_html( $p->post_title ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';  
                }
                
                if ( $thisCat->parent != 0 ) echo get_category_parents( $thisCat->parent, TRUE, ' <span class="separator">' . $delimiter . '</span> ' );
                echo $before .  esc_html( single_cat_title( '', false ) ) . $after;
            
            }elseif( surplus_concert_is_woocommerce_activated() && ( is_product_category() || is_product_tag() ) ){ //For Woocommerce archive page
            
                $current_term = $GLOBALS['wp_query']->get_queried_object();
                if( is_product_category() ){
                    $ancestors = get_ancestors( $current_term->term_id, 'product_cat' );
                    $ancestors = array_reverse( $ancestors );
                    foreach ( $ancestors as $ancestor ) {
                        $ancestor = get_term( $ancestor, 'product_cat' );    
                        if ( ! is_wp_error( $ancestor ) && $ancestor ) {
                            echo ' <a href="' . esc_url( get_term_link( $ancestor ) ) . '">' . esc_html( $ancestor->name ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                        }
                    }
                }           
                echo $before . esc_html( $current_term->name ) . $after;
                
            } elseif(surplus_concert_is_woocommerce_activated() && is_shop() ){ //Shop Archive page
                if ( get_option( 'page_on_front' ) == wc_get_page_id( 'shop' ) ) {
                    return;
                }
                $_name = wc_get_page_id( 'shop' ) ? get_the_title( wc_get_page_id( 'shop' ) ) : '';
        
                if ( ! $_name ) {
                    $product_post_type = get_post_type_object( 'product' );
                    $_name = $product_post_type->labels->singular_name;
                }
                echo $before . esc_html( $_name ) . $after;
                
            }elseif( is_tag() ){
                
                echo $before . esc_html( single_tag_title( '', false ) ) . $after;
         
            }elseif( is_author() ){
                
                global $author;
                $userdata = get_userdata( $author );
                echo $before . esc_html( $userdata->display_name ) . $after;
         
            }elseif( is_search() ){
                
                echo $before . esc_html__( 'Search Results for "', 'surplus-concert' ) . esc_html( get_search_query() ) . esc_html__( '"', 'surplus-concert' ) . $after;
            
            }elseif( is_day() ){
                
                echo '<a href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'surplus-concert' ) ) ) ) . '">' . esc_html( get_the_time( __( 'Y', 'surplus-concert' ) ) ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                echo '<a href="' . esc_url( get_month_link( get_the_time( __( 'Y', 'surplus-concert' ) ), get_the_time( __( 'm', 'surplus-concert' ) ) ) ) . '">' . esc_html( get_the_time( __( 'F', 'surplus-concert' ) ) ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                echo $before . esc_html( get_the_time( __( 'd', 'surplus-concert' ) ) ) . $after;
            
            }elseif( is_month() ){
                
                echo '<a href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'surplus-concert' ) ) ) ) . '">' . esc_html( get_the_time( __( 'Y', 'surplus-concert' ) ) ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                echo $before . esc_html( get_the_time( __( 'F', 'surplus-concert' ) ) ) . $after;
            
            }elseif( is_year() ){
                
                echo $before . esc_html( get_the_time( __( 'Y', 'surplus-concert' ) ) ) . $after;
        
            }elseif( is_single() && !is_attachment() ){
                
                if( surplus_concert_is_woocommerce_activated() && 'product' === get_post_type() ){ //For Woocommerce single product
                    /** NEED TO CHECK THIS PORTION WHILE INTEGRATION WITH WOOCOMMERCE */
                    if ( $terms = wc_get_product_terms( $post->ID, 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) ) ) {
                        $main_term = apply_filters( 'woocommerce_breadcrumb_main_term', $terms[0], $terms );
                        $ancestors = get_ancestors( $main_term->term_id, 'product_cat' );
                        $ancestors = array_reverse( $ancestors );
                        foreach ( $ancestors as $ancestor ) {
                            $ancestor = get_term( $ancestor, 'product_cat' );    
                            if ( ! is_wp_error( $ancestor ) && $ancestor ) {
                                echo ' <a href="' . esc_url( get_term_link( $ancestor ) ) . '">' . esc_html( $ancestor->name ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                            }
                        }
                        echo ' <a href="' . esc_url( get_term_link( $main_term ) ) . '">' . esc_html( $main_term->name ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                    }
                    
                    echo $before . esc_html( get_the_title() ) . $after;
                    
                }elseif ( get_post_type() != 'post' ){
                    
                    $post_type = get_post_type_object( get_post_type() );
                    
                    if( $post_type->has_archive == true ){// For CPT Archive Link
                       
                       // Add support for a non-standard label of 'archive_title' (special use case).
                       $label = !empty( $post_type->labels->archive_title ) ? $post_type->labels->archive_title : $post_type->labels->name;
                       printf( '<a href="%1$s">%2$s</a>', esc_url( get_post_type_archive_link( get_post_type() ) ), $label );
                       echo '<span class="separator">' . esc_html( $delimiter ) . '</span> ';
        
                    }
                    echo $before . esc_html( get_the_title() ) . $after;
                    
                }else{ //For Post
                    
                    $cat_object       = get_the_category();
                    $potential_parent = 0;
                    
                    if( $show_front === 'page' && $post_page ){ //If static blog post page is set
                        $p = get_post( $post_page );
                        echo ' <a href="' . esc_url( get_permalink( $post_page ) ) . '">' . esc_html( $p->post_title ) . '</a> <span class="separator">' . esc_html( $delimiter ) . '</span> ';  
                    }
                    
                    if( is_array( $cat_object ) ){ //Getting category hierarchy if any
            
                        //Now try to find the deepest term of those that we know of
                        $use_term = key( $cat_object );
                        foreach( $cat_object as $key => $object )
                        {
                            //Can't use the next($cat_object) trick since order is unknown
                            if( $object->parent > 0  && ( $potential_parent === 0 || $object->parent === $potential_parent ) ){
                                $use_term = $key;
                                $potential_parent = $object->term_id;
                            }
                        }
                        
                        $cat = $cat_object[$use_term];
                  
                        $cats = get_category_parents( $cat, TRUE, ' <span class="separator">' . esc_html( $delimiter ) . '</span> ' );
                        $cats = preg_replace( "#^(.+)\s$delimiter\s$#", "$1", $cats ); //NEED TO CHECK THIS
                        echo $cats;
                    }
        
                    echo $before . esc_html( get_the_title() ) . $after;
                    
                }
            
            }elseif( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ){
                
                $post_type = get_post_type_object(get_post_type());
                if( get_query_var('paged') ){
                    echo '<a href="' . esc_url( get_post_type_archive_link( $post_type->name ) ) . '">' . esc_html( $post_type->label ) . '</a>';
                    /* translators: %s: Paged number */
                    echo ' <span class="separator">' . esc_html( $delimiter ) . '</span> ' . $before . sprintf( __('Page %s', 'surplus-concert'), get_query_var('paged') ) . $after;
                }elseif( is_archive() ){
                    echo $before . esc_html( post_type_archive_title() ) . $after;
                }else{
                    echo $before . esc_html( $post_type->label ) . $after;
                }
        
            }elseif( is_attachment() ){
                
				$parent = get_post( $post->post_parent );
				$cat    = get_the_category( $parent->ID ); 
                if( $cat ){
                    $cat = $cat[0];
                    echo get_category_parents( $cat, TRUE, ' <span class="separator">' . esc_html( $delimiter ) . '</span> ');
                    echo '<a href="' . esc_url( get_permalink( $parent ) ) . '">' . esc_html( $parent->post_title ) . '</a>' . ' <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                }
                echo  $before . esc_html( get_the_title() ) . $after;
            
            }elseif( is_page() && !$post->post_parent ){
                
                echo $before . esc_html( get_the_title() ) . $after;
        
            }elseif( is_page() && $post->post_parent ){
                
                $parent_id  = $post->post_parent;
                $breadcrumbs = array();
                
                while( $parent_id ){
                    $page = get_post( $parent_id );
                    $breadcrumbs[] = '<a href="' . esc_url( get_permalink( $page->ID ) ) . '">' . esc_html( get_the_title( $page->ID ) ) . '</a>';
                    $parent_id  = $page->post_parent;
                }
                $breadcrumbs = array_reverse( $breadcrumbs );
                for ( $i = 0; $i < count( $breadcrumbs) ; $i++ ){
                    echo $breadcrumbs[$i];
                    if ( $i != count( $breadcrumbs ) - 1 ) echo ' <span class="separator">' . esc_html( $delimiter ) . '</span> ';
                }
                echo ' <span class="separator">' . esc_html( $delimiter ) . '</span> ' . $before . esc_html( get_the_title() ) . $after;
            
            }elseif( is_404() ){
                echo $before . esc_html__( '404 Error - Page Not Found', 'surplus-concert' ) . $after;
            }
            
            if( get_query_var('paged') ) echo __( ' (Page', 'surplus-concert' ) . ' ' . get_query_var('paged') . __( ')', 'surplus-concert' );
            
            echo '</div></div><!-- .breadcrumb -->';
            
        }
    } 
endif;

if ( ! function_exists( 'surplus_concert_get_page_title' ) ) :

	/**
     * Custom Header Title
     *
     */
	function surplus_concert_get_page_title(){ 

		global $wp_query, $post;
	    
	    echo '<header class="page-header">';
	    
	    if( is_search() ){ ?>        
	        <h2 class="page-title">
	        <?php
	            /* translators: %s: search query. */
	            printf( esc_html__( 'Search Results for: %s', 'surplus-concert' ), get_search_query() );
	        ?>
	        </h2>

	        <?php /* translators: %s: Number of results found */ ?>
	        <span><?php printf( esc_html__( 'We found %s results.', 'surplus-concert' ), $wp_query->found_posts ); ?></span>
	        <?php
	    }
	    
	    if( is_archive() ){ 
	        the_archive_title( '<h2 class="page-title">', '</h2>' );
	    }
	    
	    if( is_singular() ){ 
	        the_title( '<h2 class="page-title">', '</h2>' );
	    }

	    if( is_404() ){
	    	echo '<h2 class="page-title">'. esc_html__( '404', 'surplus-concert' ) .'</h2>';
	    }
	    
	    echo '</header><!-- .page-header -->';
	}

endif;

if ( ! function_exists( 'surplus_concert_sidebar_layout' ) ) :
	
    /**
     * Return sidebar layouts for blog, post/page, archive and search pages
     */
    function surplus_concert_sidebar_layout(){
        global $post;
        $return = false;

        // Default blogpage sidebar layout
        $blog_layout = get_theme_mod( 'blog_sidebar_layout', 'right-sidebar' ); 
        // Default sidebar layout from customizer
        $default_layout = get_theme_mod( 'default_sidebar_layout', 'right-sidebar' ); 
        
        if ( is_home() ) {
        	$show_on_front   = get_option( 'show_on_front' );
	        $blogpage_id     = get_option( 'page_for_posts' );
	        // $frontpage_id    = get_option( 'page_on_front' );

	        if ( 'page' == $show_on_front && $blogpage_id > 0 ) {
                $sidebar_layout = get_post_meta( $blogpage_id, 'sidebar_layout', true );
                $sidebar_layout = ! empty( $sidebar_layout ) ? $sidebar_layout : 'default-sidebar';

                if( is_active_sidebar( 'primary-sidebar' ) ){
                    if( $sidebar_layout == 'no-sidebar' ){
                        $return = 'no-sidebar';
                    }elseif( ( $sidebar_layout == 'default-sidebar' && $blog_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ){
                        $return = 'right-sidebar';
                    }elseif( ( $sidebar_layout == 'default-sidebar' && $blog_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ){
                        $return = 'left-sidebar';
                    }elseif( $sidebar_layout == 'default-sidebar' && $blog_layout == 'no-sidebar' ){
                        $return = 'no-sidebar';
                    }
                }else{
                    $return = 'no-sidebar';
                }

            } elseif ( is_active_sidebar( 'primary-sidebar' ) ){            
                if( $blog_layout == 'right-sidebar' ){
                    $return = 'right-sidebar';
                }elseif( $blog_layout == 'left-sidebar' ){
                    $return = 'left-sidebar';
                }else{
                    $return ='no-sidebar';
                }
            } else {
                $return = 'no-sidebar';
            }        

        } elseif( is_singular( array( 'page', 'post' ) ) ){         
            if( get_post_meta( $post->ID, 'sidebar_layout', true ) ){
                $sidebar_layout = get_post_meta( $post->ID, 'sidebar_layout', true );
            }else{
                $sidebar_layout = 'default-sidebar';
            }
            
            if( is_page() || is_single() ){
                if( is_active_sidebar( 'primary-sidebar' ) ){
                    if( $sidebar_layout == 'no-sidebar' ){
                        $return = 'no-sidebar';
                    }elseif( $sidebar_layout == 'full-width' ){
                        $return = 'full-width';
                    }elseif( ( $sidebar_layout == 'default-sidebar' && $default_layout == 'right-sidebar' ) || ( $sidebar_layout == 'right-sidebar' ) ){
                        $return = 'right-sidebar';
                    }elseif( ( $sidebar_layout == 'default-sidebar' && $default_layout == 'left-sidebar' ) || ( $sidebar_layout == 'left-sidebar' ) ){
                        $return = 'left-sidebar';
                    }elseif( $sidebar_layout == 'default-sidebar' && $default_layout == 'no-sidebar' ){
                        $return = 'no-sidebar';
                    }else{
                    	$return = 'no-sidebar';
                    }
                }else{
                    $return = 'no-sidebar';
                }
            }
        } elseif ( surplus_concert_is_woocommerce_activated() && is_singular( 'product' ) ) {
        	if( is_active_sidebar( 'shop-sidebar' ) ){            
                $return = 'right-sidebar';             
            }else{
                $return = 'no-sidebar';
            } 
        } elseif ( surplus_concert_is_woocommerce_activated() && ( is_post_type_archive( 'product' ) || is_product_category() || is_product_tag() ) ){
            if( is_active_sidebar( 'shop-sidebar' ) ){            
                $return = 'right-sidebar';             
            }else{
                $return = 'no-sidebar';
            } 
        } elseif ( is_archive() || is_search() ) {
        	if ( is_active_sidebar( 'primary-sidebar' ) ){            
                if( $default_layout == 'right-sidebar' ){
                    $return = 'right-sidebar';
                }elseif( $default_layout == 'left-sidebar' ){
                    $return = 'left-sidebar';
                }else{
                    $return ='no-sidebar';
                }
            } else {
                $return = 'no-sidebar';
            }        
        } elseif( is_404() ){
        	$return = 'no-sidebar';
        }else{
            if( is_active_sidebar( 'primary-sidebar' ) ){            
                $return = 'right-sidebar';             
            }else{
                $return = 'no-sidebar';
            } 
        }
        
        return $return; 
    }

endif;

if( ! function_exists( 'surplus_concert_get_svg' ) ) :

    /**
     * Return SVG markup.
     *
     * @param array $args {
     *     Parameters needed to display an SVG.
     *
     *     @type string $icon  Required SVG icon filename.
     *     @type string $title Optional SVG title.
     *     @type string $desc  Optional SVG description.
     * }
     * @return string SVG markup.
     */
    function surplus_concert_get_svg( $args = array() ) {
    	
        // Make sure $args are an array.
        if ( empty( $args ) ) {
            return __( 'Please define default parameters in the form of an array.', 'surplus-concert' );
        }

        // Define an icon.
        if ( false === array_key_exists( 'icon', $args ) ) {
            return __( 'Please define an SVG icon filename.', 'surplus-concert' );
        }

        // Set defaults.
        $defaults = array(
            'icon'        => '',
            'title'       => '',
            'desc'        => '',
            'fallback'    => false,
        );

        // Parse args.
        $args = wp_parse_args( $args, $defaults );

        // Set aria hidden.
        $aria_hidden = ' aria-hidden="true"';

        // Set ARIA.
        $aria_labelledby = '';

        /*
         * Surplus Concert doesn't use the SVG title or description attributes; non-decorative icons are described with .screen-reader-text.
         *
         * However, child themes can use the title and description to add information to non-decorative SVG icons to improve accessibility.
         *
         * Example 1 with title: <?php echo surplus_concert_get_svg( array( 'icon' => 'arrow-right', 'title' => __( 'This is the title', 'textdomain' ) ) ); ?>
         *
         * Example 2 with title and description: <?php echo surplus_concert_get_svg( array( 'icon' => 'arrow-right', 'title' => __( 'This is the title', 'textdomain' ), 'desc' => __( 'This is the description', 'textdomain' ) ) ); ?>
         *
         * See https://www.paciellogroup.com/blog/2013/12/using-aria-enhance-svg-accessibility/.
         */
        if ( $args['title'] ) {
            $aria_hidden     = '';
            $unique_id       = uniqid();
            $aria_labelledby = ' aria-labelledby="title-' . $unique_id . '"';

            if ( $args['desc'] ) {
                $aria_labelledby = ' aria-labelledby="title-' . $unique_id . ' desc-' . $unique_id . '"';
            }
        }

        // Begin SVG markup.
        $svg = '<svg class="icon icon-' . esc_attr( $args['icon'] ) . '"' . $aria_hidden . $aria_labelledby . ' role="img">';

        // Display the title.
        if ( $args['title'] ) {
            $svg .= '<title id="title-' . $unique_id . '">' . esc_html( $args['title'] ) . '</title>';

            // Display the desc only if the title is already set.
            if ( $args['desc'] ) {
                $svg .= '<desc id="desc-' . $unique_id . '">' . esc_html( $args['desc'] ) . '</desc>';
            }
        }

        /*
         * Display the icon.
         *
         * The whitespace around `<use>` is intentional - it is a work around to a keyboard navigation bug in Safari 10.
         *
         * See https://core.trac.wordpress.org/ticket/38387.
         */
        $svg .= ' <use href="#icon-' . esc_html( $args['icon'] ) . '" xlink:href="#icon-' . esc_html( $args['icon'] ) . '"></use> ';

        // Add some markup to use as a fallback for browsers that do not support SVGs.
        if ( $args['fallback'] ) {
            $svg .= '<span class="svg-fallback icon-' . esc_attr( $args['icon'] ) . '"></span>';
        }

        $svg .= '</svg>';

        return $svg;
    }
endif;

if( ! function_exists( 'surplus_concert_get_default_category' ) ){
	/**
	* Get default categories
	*/
	function surplus_concert_get_default_category(){
		$output = array();

		$category_args = array(
			'hierarchical' => 0,
			'taxonomy'     => 'category',
		);

		$categories = get_categories( $category_args );

		if ( ! empty( $categories ) ) {
			$output[''] = esc_html__( '--Select--', 'surplus-concert' );
			
        	foreach ( $categories as $key => $cat ) {
        		$output[$cat->term_id] =  $cat->name;
				// printf( '<option value="%s">%s</option>', esc_attr( $cat->term_id ), esc_html( $cat->name ) );
        	}
        }
        return $output;
	}

}