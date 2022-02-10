<?php
/**
 * Premium modules
 *
 * @package Sydney
 */

if ( ! class_exists( 'Sydney_Modules' ) ) {
	/**
	 * Get a svg icon
	 */
	class Sydney_Modules {

		/**
		 * Constructor
		 */
		public function __construct() {
			add_action( 'admin_init', array( $this, 'activate_modules' ) );
		}		

		/**
		 * All modules registered in Sydney
		 */
		public static function get_modules() {
			$modules = array(
				array(
					'slug'			=> 'templates',
					'name'          => esc_html__( 'Templates', 'sydney' ),
					'type'          => 'pro',
					'link' 			=> 'http://',
					'link_label'	=> esc_html__( 'Build templates', 'sydney' ),
					'activate_uri' 	=> '&amp;activate_module_templates', //param is added in dashboard class
					'text'			=> __( 'Create header, footer or content templates.', 'sydney' ) . '<div><a target="_blank" href="https://docs.athemes.com/article/435-templates-system-overview">' . __( 'Documentation article', 'sydney' ) . '</a></div>',
				),									
			);
		
			return $modules;
		}

		/**
		 * Check if a specific module is activated
		 */
		public static function is_module_active( $module ) {

			$all_modules = get_option( 'sydney-modules' );
			$all_modules = ( is_array( $all_modules ) ) ? $all_modules : (array) $all_modules;

			if ( array_key_exists( $module, $all_modules ) && true === $all_modules[$module] ) {
				return true;
			}
		
			return false;
		}

		/**
		 * Activate modules on click
		 */
		public function activate_modules() {
			$modules = $this->get_modules();

			$all_modules = get_option( 'sydney-modules' );
			$all_modules = ( is_array( $all_modules ) ) ? $all_modules : (array) $all_modules;

			foreach ( $modules as $module ) {
				if ( isset( $_GET['activate_module_' . $module['slug'] ] ) ) {
					if ( '1' == $_GET['activate_module_' . $module['slug'] ] ) {
						update_option( 'sydney-modules', array_merge( $all_modules, array( $module['slug'] => true ) ) );
					} elseif ( '0' == $_GET['activate_module_' . $module['slug'] ] ) {
						update_option( 'sydney-modules', array_merge( $all_modules, array( $module['slug'] => false ) ) );
					}
				}
			}
		}
	}	
}

new Sydney_Modules();