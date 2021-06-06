<?php
/**
 * Blog Section
 * 
 * @package Surplus_Concert
*/

/** Load default theme options */
$default_options = surplus_concert_default_theme_options();
$show_blog       = get_theme_mod( 'ed_blog_section', $default_options['ed_blog_section'] );
$blog_title      = get_theme_mod( 'blog_title', $default_options['blog_title'] );
$blog_readmore   = get_theme_mod( 'read_more_text', $default_options['read_more_text'] );

$args = array(
    'post_type'           => 'post',
    'post_status'         => 'publish',
    'posts_per_page'      => 3,
    'ignore_sticky_posts' => true
);

$qry = new WP_Query( $args );

if( ( $qry->have_posts() ) && $show_blog ){ ?>

    <div id="latest-posts" class="page-section">
        <div class="container bg-black col-3">

            <?php if( ! empty( $blog_title ) ){ ?>
                <header class="entry-header section-header">
                    <h2 class="entry-title"><?php echo esc_html( $blog_title ); ?></h2>
                </header><!-- .entry-header -->
            <?php } ?>

            <div class="section-content">
                <?php while( $qry->have_posts() ){ $qry->the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" class="hentry">
                        <figure class="featured-image">
                            <a class="post-thumbnail" href="<?php the_permalink(); ?>">
                                <?php 
                                    if( has_post_thumbnail() ){
                                        the_post_thumbnail( 'surplus-concert-blog' );                        
                                    }else{
                                       echo '<img src="'. esc_url( get_template_directory_uri().'/assets/images/fallback/surplus-concert-blog.png' ) .'" alt="'. esc_attr( get_the_title() ) .'">';
                                    } 
                                ?>
                            </a><!-- .post-thumbnail -->
                        </figure>

                        <div class="entry-container">
                           <?php 
                                /**
                                 * 
                                 * @hooked surplus_concert_get_post_entry_meta - 10
                                 */
                                do_action( 'surplus_concert_entry_meta' );

                                /**
                                 * 
                                 * @hooked surplus_concert_get_post_title - 10
                                 */
                                do_action( 'surplus_concert_post_title' );
                                
                                $page_content    = get_the_excerpt( get_the_id() );
                                $page_content    = strip_shortcodes( $page_content );
                                $trimmed_content = wp_trim_words( $page_content, 20, '&hellip;' );

                                if( ! empty( $trimmed_content ) ){ ?>
                                    <div class="entry-content">
                                       <?php echo wpautop( wp_kses_post( $trimmed_content ) ); ?>
                                    </div><!-- .entry-content -->
                                <?php
                                } 
                            
                                if( ! empty( $blog_readmore ) ){ ?>
                                    <div class="read-more">
                                        <a href="<?php the_permalink(); ?>" class="btn btn-red"><?php echo esc_html( $blog_readmore ); ?></a>
                                    </div><!-- .read-more -->
                                <?php } 
                            ?>

                        </div><!-- .entry-container -->
                    </article>
                    
                <?php } wp_reset_postdata(); ?>
            </div><!-- .entry-content -->

        </div><!-- .container -->
    </div><!-- #latest-posts -->
<?php }