<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Surplus_Concert
 */

get_header(); ?>

  	<div class="container inner-template">
            <div class="page-section clear">

                <div id="primary" class="content-area">
                    <main id="main" class="site-main">

                        <div class="archive-blog-wrapper clear">
                        	<?php
						    	while ( have_posts() ) : the_post();

						    		get_template_part( 'template-parts/content', 'page' );

						    	endwhile; // End of the loop.
						    ?>
                        </div><!-- .archive-blog-wrapper -->

                        <?php 
	                        /**
						     * @hooked surplus_concert_get_navigation	- 10
						     */
						    do_action( 'surplus_concert_navigation' );

						    /**
						     * @hooked surplus_concert_get_comments - 10
						     */
						    do_action( 'surplus_concert_after_page_template' );
					    ?>

                    </main>
                </div><!-- #primary -->

                <?php get_sidebar(); ?>

            </div><!-- .page-section -->
    </div><!-- .container/.page-section -->
    <?php 
get_footer();
