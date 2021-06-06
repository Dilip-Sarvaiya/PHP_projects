<?php
/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Surplus_Concert
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-wrapper">
       <?php 
        	/**
		     * 
		     * @hooked surplus_concert_get_post_thumbnail - 10
		     */
		    do_action( 'surplus_concert_post_thumbnail' );
		?>

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

             	/**
                 * 
                 * @hooked surplus_concert_get_entry_content - 10
                 */
                do_action( 'surplus_concert_entry_content' );

                /**
                 * 
                 * @hooked surplus_concert_get_entry_footer - 10
                 */
                do_action( 'surplus_concert_entry_footer' );
            ?>
        </div><!-- .entry-container -->
    </div><!-- .post-wrapper -->
</article><!-- #post-<?php the_ID(); ?> -->
