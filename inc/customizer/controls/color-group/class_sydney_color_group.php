<?php
/**
 * Color group control
 *
 * @package Sydney
 */

class Sydney_Color_Group extends WP_Customize_Control {

	public $type = 'sydney-color-group-control';

	public $remove_bordertop = false;

	public function enqueue() {
		wp_enqueue_script( 'sydney-pickr', get_template_directory_uri() . '/js/pickr.min.js', array( 'jquery' ), '1.8.2', true );
	}

	public function render_content() {
		?>
			<div class="sydney-color-group<?php echo ( $this->remove_bordertop ) ? ' border-top-none' : ''; ?>">
				<?php if ( $this->label ) { ?>
					<div class="sydney-color-title"><?php echo esc_html( $this->label ); ?></div>
				<?php } ?>
				<div class="sydney-color-controls">
					<?php foreach ( array_keys( $this->settings ) as $key => $value ) : ?>
						<div class="sydney-color-control" data-control-id="<?php echo esc_attr( $this->settings[ $value ]->id ); ?>">
							<div class="sydney-color-tooltip">
								<?php
									if ( $key === 0 ) {
										esc_html_e( 'Normal', 'sydney' );
									} else {
										esc_html_e( 'Hover', 'sydney' );
									}
								?>
							</div>
							<div class="sydney-color-picker" data-default-color="<?php echo esc_attr( $this->settings[ $value ]->default ); ?>" style="background-color: <?php echo esc_attr( $this->value( $value ) ); ?>;"></div>
							<input type="text" name="<?php echo esc_attr( $this->settings[ $value ]->id ); ?>" value="<?php echo esc_attr( $this->value( $value ) ); ?>" class="sydney-color-input" <?php $this->link( $value ); ?> />
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		<?php 
	}
}