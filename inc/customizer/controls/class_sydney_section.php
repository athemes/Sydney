<?php
/**
 * Sydney Customizer Section
 *
 * @package Sydney
 *
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Sydney_Section_Hidden extends WP_Customize_Section {
		
	/**
	 * The type of control being rendered
	 */
	public $type = 'sydney-section-hidden';
}
