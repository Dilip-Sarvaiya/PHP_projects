<?php
/**
 * Customizer Custom Controls
 *
 * @package Surplus_Concert
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}

/**
 * Customize Control for Note.
 *
 * @since 1.0.0
 *
 * @see WP_Customize_Control
 */
class Surplus_Concert_Note_Control extends WP_Customize_Control {

	/**
	 * Control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'note';

	/**
	 * Render content.
	 *
	 * @since 1.0.0
	 */
	public function render_content() {
		?>
		<?php if ( ! empty( $this->label ) ) : ?>
			<span class="customize-control-title"><?php echo wp_kses_post( $this->label ); ?></span>
		<?php endif; ?>
		<?php if ( ! empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo wp_kses_post( $this->description ); ?></span>
		<?php endif; ?>
		<?php
	}
}

/**
 * Customize Control for Radio Image.
 *
 * @since 1.0.0
 *
 * @see WP_Customize_Control
 */
class Surplus_Concert_Radio_Image_Control extends WP_Customize_Control {

	/**
	 * Control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'radio-image';

	/**
	 * Render content.
	 *
	 * @since 1.0.0
	 */
	public function render_content() {
		$name = '_customize-radio-' . $this->id;
		?>
		<?php if ( ! empty( $this->label ) ) : ?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<?php endif; ?>
		<?php if ( ! empty( $this->description ) ) : ?>
			<span class="description customize-control-description"><?php echo wp_kses_post( $this->description ); ?></span>
		<?php endif; ?>
		<?php foreach ( $this->choices as $value => $url ) : ?>
			<label>
				<input type="radio" value="<?php echo esc_attr( $value ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> class="stylish-radio-image" name="<?php echo esc_attr( $name ); ?>"/>
				<span><img src="<?php echo esc_url( $url ); ?>" alt="<?php echo esc_attr( $value ); ?>" /></span>
			</label>
		<?php endforeach;
	}
}