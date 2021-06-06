<?php
/**
 * About Section
 * 
 * @package Surplus_Concert
*/

$default_options = surplus_concert_default_theme_options();
$enable_about    = get_theme_mod( 'ed_about_section', $default_options['ed_about_section'] );
$about_page_id   = get_theme_mod( 'about_page_id', $default_options['about_page_id'] );
$readmore_label  = get_theme_mod( 'read_more_text', $default_options['read_more_text'] );

if( $enable_about ) : 
    global $post;

    $page_on_front = get_option( 'page_on_front ' );
    $about_page_id = ! empty( $about_page_id ) && $about_page_id > 0 ? $about_page_id : $post->ID;
    $content_post  = get_post( $about_page_id );
    $page_title    = $content_post->post_title;
    $page_content  = $content_post->post_excerpt;

    if( empty( $page_content ) ){
        $page_content = surplus_concert_the_excerpt( 150, $content_post );
    }

    $page_link    = get_the_permalink( $about_page_id );

    if ( has_post_thumbnail( $about_page_id ) ) {
        $img_array = wp_get_attachment_image_src( get_post_thumbnail_id( $about_page_id ), 'surplus-concert-about' );
        $img_src   = $img_array[0];
        $col_class = 'col-2';
    }else{
        $img_src   = '';
        $col_class = 'col-1';
    }
    
    ?>
    <div id="about-section" class="page-section">
        <div class="container bg-black">
            <?php if( ! empty( $page_title ) ){ ?>
                <header class="entry-header">
                    <h2 class="entry-title"><?php echo esc_html( $page_title ); ?></h2>
                </header><!-- .entry-header -->
            <?php } ?>

            <div class="entry-content <?php echo esc_attr( $col_class ); ?>">
                <div class="hentry">
                    <?php  
                    echo wpautop( wp_kses_post( $page_content ) );

                    if( ! empty( $readmore_label ) && ( $about_page_id != $page_on_front ) ){ ?>
                        <div class="read-more">
                            <a href="<?php echo esc_url( $page_link ); ?>" class="btn btn-red"><?php echo esc_html( $readmore_label ); ?></a>
                        </div>
                    <?php } ?>

                </div><!-- .hentry -->

                <?php if( ! empty( $img_src ) ){ ?>
                    <div class="hentry">
                        <img src="<?php echo esc_url( $img_src ); ?>" alt="<?php echo esc_attr( $page_title ); ?>">
                    </div><!-- .hentry -->
                <?php } ?>
            </div><!-- .entry-content -->
        </div><!-- .container -->
    </div><!-- #about-section -->
<?php endif; ?>