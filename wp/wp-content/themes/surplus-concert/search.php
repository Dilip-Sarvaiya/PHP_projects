<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Surplus_Concert
 */

get_header(); 

$sidebar_class = surplus_concert_sidebar_layout();
$wrapper_class = ( 'no-sidebar' == $sidebar_class ) ? 'col-3' : 'col-2';
?>

	<div class="container page-section">

		<div id="primary" class="content-area">
	    	<main id="main" class="site-main" role="main">
	    		<div class="archive-blog-wrapper <?php echo esc_attr( $wrapper_class ); ?> clear">
					<?php
					if ( have_posts() ) :

						/* Start the Loop */
						while ( have_posts() ) : the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_format() );

						endwhile;

						/**
					     * @hooked surplus_concert_get_navigation	- 10
					     */
					    do_action( 'surplus_concert_navigation' );

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>
				</div><!-- .archive-blog-wrapper -->

			</main>
		</div><!-- #primary -->

		<?php get_sidebar(); ?>

	</div><!-- .container/.page-section -->
	
	<?php
get_footer();