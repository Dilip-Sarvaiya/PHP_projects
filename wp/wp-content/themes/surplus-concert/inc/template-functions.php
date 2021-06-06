<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Surplus_Concert
 */

if( ! function_exists( 'surplus_concert_doctype' ) ) :
    /**
     * Doctype Declaration
     */
    function surplus_concert_doctype(){
        ?>
        <!DOCTYPE html>
        <html <?php language_attributes(); ?>>
        <?php
    }
    endif;
add_action( 'surplus_concert_doctype', 'surplus_concert_doctype' );

if( ! function_exists( 'surplus_concert_head' ) ) :
    /**
     * Before wp_head 
     */
    function surplus_concert_head(){
        ?>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php
    }
endif;
add_action( 'surplus_concert_before_wp_head', 'surplus_concert_head' );

if( ! function_exists( 'surplus_concert_page_start' ) ) :
	/**
	 * Page Start
	 */
	function surplus_concert_page_start(){
	    ?>
	    <div id="page" class="site">
            <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to Content', 'surplus-concert' ); ?></a>
 	    <?php
	}
endif;
add_action( 'surplus_concert_before_header', 'surplus_concert_page_start', 10 );

if( ! function_exists( 'surplus_concert_page_end' ) ) :
    /**
     * Page Ends
     */
    function surplus_concert_page_end(){
        ?>
        </div><!-- #page -->
        <?php
    }
endif;
add_action( 'surplus_concert_after_footer', 'surplus_concert_page_end', 10 );

if( ! function_exists( 'surplus_concert_top_header' ) ) :
    /**
     * Header Top Section
     */
    function surplus_concert_top_header(){ 

        $default      = surplus_concert_default_theme_options(); // get default theme options
        $show_contact = get_theme_mod( 'show_header_contact_info', $default['show_header_contact_info'] );
        $email        = get_theme_mod( 'header_email', $default['header_email'] );
        $phone        = get_theme_mod( 'header_phone', $default['header_phone'] ); 
        $show_social  = get_theme_mod( 'show_header_social_links', $default['show_header_social_links'] );
        $social_links = array();

        for( $i=1; $i<=5; $i++ ){
            $social_link = get_theme_mod( 'social_link_'. $i, '' );
            if( ! empty( $social_link ) ){
                $social_links[$i] =  $social_link;
            }
        }


        $class = 'col-1';

        if( ( ( ! empty( $email ) || ! empty( $phone ) ) && $show_contact ) && ( ! empty( $social_links ) && $show_social ) ){
            $class = 'col-2';
        }

        if( $show_contact || $show_social ){ ?>
    
            <div id="top-bar" class="top-bar-widgets">
                <div class="container">
                    <div class="entry-content <?php echo esc_attr( $class ); ?>">

                        <?php if( ( ! empty( $email ) || ! empty( $phone ) ) && $show_contact ) : ?>
                            <div class="hentry">
                                <section class="widget widget_address_block">
                                    <ul>
                                        <?php 
                                            if( ! empty( $email ) ){
                                                echo '<li><a href="mailto:'. sanitize_email( $email ) .'" class="email"><i class="fa fa-envelope"></i>'. esc_html( $email ) .'</a></li>';
                                            }

                                            if( ! empty( $phone ) ){
                                                echo '<li><a href="tel:'. esc_attr( preg_replace( '/\D/', '', $phone ) ) .'" class="phone"><i class="fa fa-phone"></i>'. esc_html( $phone ) .'</a></li>';
                                            }
                                        ?>
                                    </ul>
                                </section>
                            </div><!-- .hentry -->
                        <?php endif; 

                        if ( ! empty( $social_links ) && $show_social ) { ?>
                            <div class="hentry">
                                <section class="widget widget_social_icons">
                                   <?php surplus_concert_render_social_links( $social_links ); ?>
                                </section>
                            </div><!-- .hentry -->
                        <?php } ?>
                    </div><!-- .col-2 -->
                </div><!-- .container -->
            </div><!-- #top-bar -->
        <?php
        }
    }
endif;
add_action( 'surplus_concert_before_header', 'surplus_concert_top_header', 10 );

if( ! function_exists( 'surplus_concert_header' ) ) :
    /**
     * Header Start
     */
    function surplus_concert_header(){ ?>
        <header id="masthead" class="site-header">
            <div class="container">
               <?php 
                    surplus_concert_site_branding();
                    surplus_concert_navigation_menu();
                ?>
            </div><!-- .container -->
        </header><!-- #masthead -->
    <?php 
    }
endif;
add_action( 'surplus_concert_header', 'surplus_concert_header', 20 );

if( ! function_exists( 'surplus_concert_content_start' ) ) :
    /**
     * Content Start
     */
    function surplus_concert_content_start(){ ?>
        <div id="content" class="site-content">
    <?php
    }
    endif;
add_action( 'surplus_concert_content', 'surplus_concert_content_start' );

if( ! function_exists( 'surplus_concert_content_end' ) ) :
    /**
     * Content End
     */
    function surplus_concert_content_end(){ ?>
        </div><!-- #content -->
    <?php
    }
    endif;
add_action( 'surplus_concert_before_footer', 'surplus_concert_content_end' );

if ( ! function_exists( 'surplus_concert_banner_slider' ) ) :

    /**
     * Add slider banner.
     */
    function surplus_concert_banner_slider() { 

        /** Load default theme options */
        $default_options =  surplus_concert_default_theme_options(); 
        $slider_banner_type = get_theme_mod( 'banner_slider_type', $default_options['banner_slider_type'] );

        if ( is_front_page() ) {

            if ( 'post_page' == $slider_banner_type || 'category' == $slider_banner_type ) {
                surplus_concert_slider();
            } elseif ( 'static_video' == $slider_banner_type ) {
                surplus_concert_banner();
            }

        } else {
            surplus_concert_featured_image_banner();
        }
    }
endif;
add_action( 'surplus_concert_after_content', 'surplus_concert_banner_slider' );


if ( ! function_exists( 'surplus_concert_get_navigation' ) ) :
    /**
     *  Post navigation and archive pagination
     */
    function surplus_concert_get_navigation(){
        if ( is_single() ) {
            the_post_navigation( 
                array(
                    'prev_text'          => '<span class="post-title"> %title</span>',
                    'next_text'          => '<span class="post-title"> %title</span>',
                    'screen_reader_text' => __( 'Post navigation', 'surplus-concert' )
                )
            );
        } else {
            the_posts_pagination( array(
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'surplus-concert' ) . ' </span>',
            ) );
        }
    }
endif;
add_action( 'surplus_concert_navigation', 'surplus_concert_get_navigation', 10 );

if ( ! function_exists( 'surplus_concert_get_author_bio' ) ) :
    /**
     * Author Bio 
     */
    function surplus_concert_get_author_bio() {
        /** Load default theme options */
        $default_options    = surplus_concert_default_theme_options(); 
        $author_description = get_the_author_meta( 'description' );

        if( ! empty( $author_description ) ){ ?>
            <article id="about-author" class="bg-black page-section">
                <header class="entry-header">
                    <h2 class="entry-title"><?php esc_html_e( 'About the author', 'surplus-concert' ) ?></h2>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <div class="author-image">
                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 80 ); ?>
                    </div><!-- .author-image -->

                    <div class="author-content">
                        <div class="author-name clear">
                        <h6><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?></a></h6>
                        </div>

                        <?php 
                            if( $author_description ){
                                echo wpautop( wp_kses_post( get_the_author_meta( 'description' ) ) ); 
                            } 
                        ?>
                    </div><!-- .author-content -->
                </div><!-- .entry-content -->
            </article>

        <?php
        }
    }
endif;
add_action( 'surplus_concert_after_post_template', 'surplus_concert_get_author_bio', 10 );
if( ! function_exists( 'surplus_concert_footer_start' ) ) :
    /**
     * Footer start.
     */
    function surplus_concert_footer_start(){ ?>
        <footer id="colophon" class="site-footer">
<?php
    }
endif;
add_action( 'surplus_concert_footer', 'surplus_concert_footer_start', 10 );

if( ! function_exists( 'surplus_concert_footer_end' ) ) :
    /**
     * Footer end.
     */
    function surplus_concert_footer_end(){ ?>
        </footer><!-- #colophon -->
<?php
    }
endif;
add_action( 'surplus_concert_footer', 'surplus_concert_footer_end', 40 );

if( ! function_exists( 'surplus_concert_footer_sidebars' ) ) :
    /**
     * Add footer sidebars.
     */
    function surplus_concert_footer_sidebars(){ 
        $footer_sidebar_data = surplus_concert_footer_sidebar_class();
        $footer_sidebar      = $footer_sidebar_data['active_sidebar'];
        $footer_class        = $footer_sidebar_data['class'];
        if ( empty( $footer_sidebar ) ) {
            return;
        }
        ?>
        <div class="footer-widget-area <?php echo esc_attr( $footer_class ); ?>">
            <div class="container">
               <?php foreach( $footer_sidebar as $active_widget ) : ?>
                    <div class="hentry">
                        <?php 
                            if ( is_active_sidebar( $active_widget ) ){
                                dynamic_sidebar( $active_widget );
                            }
                        ?>
                    </div>
                <?php endforeach; ?>
            </div><!-- .container -->  
        </div><!-- .footer-widget-area -->
<?php
    }
endif;
add_action( 'surplus_concert_footer', 'surplus_concert_footer_sidebars', 20 );

if( ! function_exists( 'surplus_concert_footer_site_info' ) ) :
    /**
     * Footer site info.
     */
    function surplus_concert_footer_site_info(){ 
        /** Load default theme options */
        $default_options  = surplus_concert_default_theme_options();
        $footer_copyright = get_theme_mod( 'footer_copyright', $default_options['footer_copyright'] );
        ?>
        <div class="site-info">
            <div class="container">
                <?php 
                    if( ! empty( $footer_copyright ) ) echo '<span class="copyright">'. wp_kses_post( $footer_copyright ) .'</span>'; 

                    /* translators: 1: Theme name, 2: Theme author. */
                    printf( esc_html__( '%1$s by %2$s.', 'surplus-concert' ), ' Surplus Concert', '<a href="' . esc_url( 'https://surplusthemes.com/' ) .'">Surplus Themes</a>' );

                    echo '<span class="sep"> | </span>';

                    /* translators: %s: CMS name, i.e. WordPress. */
                    printf( esc_html__( 'Powered by %s. ', 'surplus-concert' ), '<a href="'. esc_url( 'https://wordpress.org' ) .'">'. esc_html__( 'WordPress', 'surplus-concert' ) .'</a>' );

                    if ( function_exists( 'the_privacy_policy_link' ) ) {
                        the_privacy_policy_link();
                    }
                ?>
         
            </div><!-- .container -->    
        </div><!-- .site-info -->
<?php
    }
endif;
add_action( 'surplus_concert_footer', 'surplus_concert_footer_site_info', 30 );

if( ! function_exists( 'surplus_concert_footer_back_to_top' ) ) :
    /**
     * Footer Back to top.
     */
    function surplus_concert_footer_back_to_top(){ 
        /** Load default theme options */
        $default_options = surplus_concert_default_theme_options(); 
        $hide_backtotop  = get_theme_mod( 'ed_scroll_to_top', $default_options['ed_scroll_to_top'] );

        if( ! $hide_backtotop ){
            ?>
            <button class="backtotop"><i class="fa fa-angle-up"></i></button><!-- .backtotop -->
            <?php
        }
    }
endif;
add_action( 'surplus_concert_footer', 'surplus_concert_footer_back_to_top', 50 );