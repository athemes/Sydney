<?php
/**
 * Select2 dropdown control
 *
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Multi select control
 */
class Sydney_Select2_Custom_Control extends WP_Customize_Control {

	public $type = 'dropdown_select2';

	private $multiselect = false;
 
	private $placeholder = 'Please select...';
	/**
	 * Constructor
	 */
	public function __construct( $manager, $id, $args = array(), $options = array() ) {
		parent::__construct( $manager, $id, $args );
		// Check if this is a multi-select field
		if ( isset( $this->input_attrs['multiselect'] ) && $this->input_attrs['multiselect'] ) {
			$this->multiselect = true;
		}
		// Check if a placeholder string has been specified
		if ( isset( $this->input_attrs['placeholder'] ) && $this->input_attrs['placeholder'] ) {
			$this->placeholder = $this->input_attrs['placeholder'];
		}
	}
	/**
	 * Enqueue our scripts and styles
	 */
	public function enqueue() {

		wp_enqueue_script( 'select2', get_template_directory_uri() . '/js/select2.min.js', array( 'jquery' ), false, true );
		wp_enqueue_style( 'select2', get_template_directory_uri() . '/css/select2.min.css', null );
		wp_enqueue_script( 'sydney-multiple-select', get_template_directory_uri() . '/inc/controls/multiple-select/multiple-select.js', array( 'jquery', 'customize-base', 'select2' ), false, true );
		wp_enqueue_style( 'sydney-multiple-select', get_template_directory_uri() . '/inc/controls/multiple-select/multiple-select.css', null );

	}
	/**
	 * Render the control in the customizer 
	 */
	public function render_content() {
		$defaultValue = $this->value();
		if ( $this->multiselect ) {
			$defaultValue = explode( ',', $this->value() );
		}
	?>
		<div class="dropdown_select2_control">
			<?php if( !empty( $this->label ) ) { ?>
				<label for="<?php echo esc_attr( $this->id ); ?>" class="customize-control-title">
					<?php echo esc_html( $this->label ); ?>
				</label>
			<?php } ?>
			<?php if( !empty( $this->description ) ) { ?>
				<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php } ?>
			<input type="hidden" id="<?php echo esc_attr( $this->id ); ?>" class="customize-control-dropdown-select2" value="<?php echo esc_attr( $this->value() ); ?>" name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); ?> />
			<select name="select2-list-<?php echo ( $this->multiselect ? 'multi[]' : 'single' ); ?>" class="customize-control-select2" data-placeholder="<?php echo $this->placeholder; ?>" <?php echo ( $this->multiselect ? 'multiple="multiple" ' : '' ); ?>>
				<?php
					if ( !$this->multiselect ) {

						echo '<option></option>';
					}
					foreach ( $this->choices as $key => $value ) {
						if ( is_array( $value ) ) {
							echo '<optgroup label="' . esc_attr( $key ) . '">';
							foreach ( $value as $optgroupkey => $optgroupvalue ) {
								echo '<option value="' . esc_attr( $optgroupkey ) . '" ' . ( in_array( esc_attr( $optgroupkey ), $defaultValue ) ? 'selected="selected"' : '' ) . '>' . esc_attr( $optgroupvalue ) . '</option>';
							}
							echo '</optgroup>';
						}
						else {
							echo '<option value="' . esc_attr( $key ) . '" ' . selected( esc_attr( $key ), $defaultValue, false )  . '>' . esc_attr( $value ) . '</option>';
						}
					}
				?>
			</select>
		</div>
	<?php
	}
}