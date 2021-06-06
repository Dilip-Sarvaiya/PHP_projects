<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Surplus_Concert
 */

$sidebar_class = surplus_concert_sidebar_layout();

if ( ! is_active_sidebar( 'primary-sidebar' ) || ( 'no-sidebar' == $sidebar_class ) || ( 'full-width' == $sidebar_class ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'primary-sidebar' ); ?>
</aside><!-- #secondary -->
