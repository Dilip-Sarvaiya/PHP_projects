<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

						    		get_template_part( 'template-parts/content', 'single' );

						    	endwhile; // End of the loop.
						    ?>
                        </div><!-- .archive-blog-wrapper -->

                        <?php 
	                        /**
						     * @hooked surplus_concert_get_navigation	- 10
						     */
						    do_action( 'surplus_concert_navigation' );

						    /**
						     * @hooked surplus_concert_get_author_bio		- 10
						     * @hooked surplus_concert_get_comments 		- 30
						     */
						    do_action( 'surplus_concert_after_post_template' );
					    ?>

                    </main>
                </div><!-- #primary -->

                <?php get_sidebar(); ?>

            </div><!-- .page-section -->
    </div><!-- .container/.page-section -->
    <?php 
get_footer();
