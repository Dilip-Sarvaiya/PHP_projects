<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Surplus_Concert
 */

get_header(); ?>

	<div class="container page-section">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">

				<section class="error-404 not-found">
					<header class="page-header">
						<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'surplus-concert' ); ?></h1>
					</header><!-- .page-header -->

					<figure class="404-error-img">
						<img src="<?php echo esc_url( get_template_directory_uri() .'/assets/images/404-img.jpg' ); ?>" alt="<?php esc_attr_e( '404 page', 'surplus-concert' ); ?>">;
					</figure>
					<div class="page-content">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'surplus-concert' ); ?></p>

						<?php
							get_search_form();
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-red"><?php esc_html_e( 'back to homepage', 'surplus-concert' ); ?></a>
					</div><!-- .page-content -->
				</section><!-- .error-404 -->

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- .container/.page-section -->

<?php
get_footer();
