<?php
/**
 * The template for displaying search form
 *
 * @package Surplus_Concert
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'surplus-concert' ) ?></span>
    <input type="search" class="search-field"
        placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'surplus-concert' ) ?>"
        value="<?php echo get_search_query() ?>" name="s"
        title="<?php echo esc_attr_x( 'Search for:', 'label', 'surplus-concert' ) ?>" />
    <button type="submit" class="search-submit"><span class="screen-reader-text"><i class="fa fa-search"></i></span></button>
</form>