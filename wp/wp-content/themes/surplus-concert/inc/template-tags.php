<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Surplus_Concert
 */

if ( ! function_exists( 'surplus_concert_get_post_entry_meta' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date category and comment.
	 */
	function surplus_concert_get_post_entry_meta() {
        if ( 'post' === get_post_type() ) {
		    echo '<p class="entry-meta">';
		    
		    surplus_concert_author_meta();
	        surplus_concert_posted_on();
	        surplus_concert_category_list();
	        surplus_concert_comment_count();
		    
		    echo '</p><!-- .entry-meta -->'; // WPCS: XSS OK.
		}
	}
endif;
add_action( 'surplus_concert_entry_meta', 'surplus_concert_get_post_entry_meta', 10 );

if ( ! function_exists( 'surplus_concert_author_meta' ) ) :
	/**
	 * Prints HTML with author meta information.
	 */
	function surplus_concert_author_meta() {
		$author_id       = get_the_author_meta( 'ID' );
		$author_name     = get_the_author_meta( 'display_name' );
		$author_post_url = get_author_posts_url( $author_id );

		if( $author_name ){
        	echo ' <span class="author-link"><span class="screen-reader-text">'. __( 'Author', 'surplus-concert' ).'</span><a href="'. esc_url( $author_post_url ) .'">'. esc_html( $author_name ) .'</a></span><!-- .author-link -->';
		}
	}
endif;

if ( ! function_exists( 'surplus_concert_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function surplus_concert_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
 		$screen_reader_string = __( 'Posted on', 'surplus-concert' );

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
			$screen_reader_string = __( 'Updated on', 'surplus-concert' );
		}
    
		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
		 
 		echo '<span class="posted-on"><span class="screen-reader-text">'. esc_html( $screen_reader_string ).'</span><a href="'. esc_url( get_permalink() ).'" rel="bookmark">' . $time_string . '</a></span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'surplus_concert_category_list' ) ) :
	/**
	 * Prints HTML with meta information of categories assiged to current post.
	 */
	function surplus_concert_category_list() {
		$post_categories = get_the_category();
		$category_list   = '';

        foreach ( $post_categories as $post_category ) {
            $category_list .= '<a href="'. esc_url( get_category_link( $post_category->cat_ID ) ) .'" rel="category tag">'. esc_html( $post_category->cat_name ) .'</a>';
        }

        echo ' <span class="cat-links"><span class="screen-reader-text">'. __( 'Categories', 'surplus-concert' ).'</span>'. $category_list .'</span><!-- .cat-links -->';
	}
endif;

if ( ! function_exists( 'surplus_concert_comment_count' ) ) :
	/**
	 * Prints HTML with meta information of number of comments assiged to current post.
	 */
	function surplus_concert_comment_count() {
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( esc_html__( '0 Comment', 'surplus-concert' ) );
			echo '</span>';
		}
	}
endif;

if ( ! function_exists( 'surplus_concert_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function surplus_concert_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'surplus-concert' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'surplus_concert_get_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function surplus_concert_get_post_thumbnail() {
		global $post;
		$banner_option = get_post_meta( $post->ID, 'banner_option', true );
		$banner_option = ! empty( $banner_option ) ? $banner_option : 'header_image';

  		if ( is_singular() ) {
  			if ( has_post_thumbnail() &&  'featured_image' != $banner_option ) { ?>
				<figure class="featured-image">
					<?php the_post_thumbnail( 'full' ); ?>
				</figure>
			<?php } 
		} else { ?>
		<figure class="featured-image">
			 <a class="post-thumbnail" href="<?php the_permalink(); ?>">
				<?php 
					if( has_post_thumbnail() ){ 
						the_post_thumbnail( 'surplus-concert-blog', array(
							'alt' => the_title_attribute( array(
								'echo' => false,
							) ),
						) );
					} else {
						echo '<img src="'. esc_url( get_template_directory_uri().'/assets/images/fallback/surplus-concert-blog.png' ) .'" alt="'. esc_attr( get_the_title() ) .'">';
					}
				?>
			</a>
		</figure>

		<?php }
	}
endif;
add_action( 'surplus_concert_post_thumbnail', 'surplus_concert_get_post_thumbnail', 10 );

if ( ! function_exists( 'surplus_concert_get_post_title' ) ) :
	/**
	 * Displays an post title.
	 *
	 */
	function surplus_concert_get_post_title() {

		if ( is_singular() ) : ?>

			<header class="entry-header">
	            <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) .'">', '</a></h2>' ); ?>    
	        </header>

		<?php else : ?>

			<header class="entry-header">
	            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>    
	        </header>

		<?php endif; // End is_singular().
	}
endif;
add_action( 'surplus_concert_post_title', 'surplus_concert_get_post_title' );

if( ! function_exists( 'surplus_concert_get_entry_content' ) ) :
	/**
	 * Entry content
	 */  
	function surplus_concert_get_entry_content(){

		echo '<div class="entry-content">';
			if( is_archive() || is_search() || is_home() ) {
	            the_excerpt();
	        } else {
	        	the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'surplus-concert' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
	        }
	        
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'surplus-concert' ),
				'after'  => '</div>',
			) );
		echo '</div><!-- .entry-content -->';
	}
endif;
add_action( 'surplus_concert_entry_content', 'surplus_concert_get_entry_content', 10 );

if( ! function_exists( 'surplus_concert_get_entry_footer' ) ) :
	/**
	 * Tags and readmore buttons
	 */  
	function surplus_concert_get_entry_footer(){

		$default_options = surplus_concert_default_theme_options();
		$readmore_text   = get_theme_mod( 'read_more_text', $default_options['read_more_text'] );
		
		if( is_singular() ){
			
			// Hide  tag text for pages.
			if ( 'post' === get_post_type() ) {
				$tags_list = get_the_tag_list( '', esc_html_x( ' ', 'list item separator', 'surplus-concert' ) );
				if ( $tags_list ) {
					echo '<div class="tag">' . $tags_list . '</span>';
				}
			}

			if( get_edit_post_link() ){
	            edit_post_link(
	        		sprintf(
	        			wp_kses(
	        				/* translators: %s: Name of current post. Only visible to screen readers */
	        				__( 'Edit <span class="screen-reader-text">%s</span>', 'surplus-concert' ),
	        				array(
	        					'span' => array(
	        						'class' => array(),
	        					),
	        				)
	        			),
	        			get_the_title()
	        		),
	        		'<span class="edit-link">',
	        		'</span>'
	        	); 
	        }
		} else {
			if( ! empty( $readmore_text ) ){ ?>
				<div class="read-more">
	                <a href="<?php the_permalink(); ?>" class="btn btn-red"><?php echo esc_html( $readmore_text ); ?></a>
	            </div><!-- .read-more -->
	        <?php } 		
		}
	}
endif;
add_action( 'surplus_concert_entry_footer', 'surplus_concert_get_entry_footer', 10 );

if ( ! function_exists( 'surplus_concert_get_comments' ) ) :
	/**
	 * Displays comments for single page and post.
	 */
	function surplus_concert_get_comments() {
		// If comments are open or we have at least one comment, load up the comment template.
		if ( ( comments_open() || get_comments_number() ) ) :
			comments_template();
		endif;
	}
endif;
add_action( 'surplus_concert_after_post_template', 'surplus_concert_get_comments', 30 );
add_action( 'surplus_concert_after_page_template', 'surplus_concert_get_comments', 10 );
