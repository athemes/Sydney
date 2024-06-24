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
		public static function get_modules( $category = false ) {

			$modules = array();

			$modules['general'] = array(
				array(
					'slug'			=> 'templates',
					'name'          => esc_html__( 'Template Builder', 'sydney' ),
					'type'          => 'pro',
					//'link' 			=> admin_url( '/edit.php?post_type=athemes_hf' ),
					//'link_label'	=> esc_html__( 'Build templates', 'sydney' ),
					'activate_uri' 	=> '&amp;activate_module_templates', //param is added in dashboard class
					'text'			=> __( 'Build headers, footers etc. with Elementor.', 'sydney' ) . '<div><a target="_blank" href="https://docs.athemes.com/article/435-templates-system-overview">' . __( 'Documentation article', 'sydney' ) . '</a></div>',
					'keywords'		=> array( 'header', 'footer', 'template', 'templates', 'builder', 'elementor' ),
				),
				array(
					'slug'			=> 'quick-links',
					'name'          => esc_html__( 'Quick Links Module', 'sydney' ),
					'type'          => 'pro',
					'link' 			=> admin_url( '/customize.php?autofocus[section]=sydney_quicklinks' ),
					'link_label'	=> esc_html__( 'Customize', 'sydney' ),
					'activate_uri' 	=> '&amp;activate_module_quick-links', //param is added in dashboard class
					'text'			=> __( 'Floating quick links bar (contact, social etc.)', 'sydney' ) . '<div><a target="_blank" href="https://docs.athemes.com/article/443-pro-quick-links-module">' . __( 'Documentation article', 'sydney' ) . '</a></div>',
					'keywords'		=> array( 'quick', 'links', 'contact', 'social', 'floating' ),
				),
				array(
					'slug'			=> 'modal',
					'name'          => esc_html__( 'Modal', 'sydney' ),
					'type'          => 'pro',
					'link' 			=> admin_url( '/customize.php?autofocus[section]=sydney_section_modal_popup' ),
					'link_label'	=> esc_html__( 'Customize', 'sydney' ),
					'activate_uri' 	=> '&amp;activate_module_modal', //param is added in dashboard class
					'text'			=> __( 'Modal with custom content', 'sydney' ) . '<div><a target="_blank" href="https://docs.athemes.com/article/modal-in-sydney-pro/">' . __( 'Documentation article', 'sydney' ) . '</a></div>',
					'keywords'		=> array( 'modal', 'popup', 'contact' ),
				),	
				array(
					'slug'			=> 'block-templates',
					'name'          => esc_html__( 'Block Templates', 'sydney' ),
					'type'          => 'pro',
					'link' 			=> admin_url( 'site-editor.php?path=%2Fwp_template_part%2Fall' ),
					'link_label'	=> esc_html__( 'Build templates', 'sydney' ),
					'activate_uri' 	=> '&amp;activate_module_block-templates', //param is added in dashboard class
					'text'			=> __( 'Build headers, footers etc. with the site editor.', 'sydney' ) . '<div><a target="_blank" href="#">' . __( 'Documentation article', 'sydney' ) . '</a></div>',
					'keywords'		=> array( 'header', 'footer', 'template', 'templates', 'builder' ),
				),
				array(
					'slug'			=> 'custom-fonts',
					'name'          => esc_html__( 'Custom Fonts', 'sydney' ),
					'type'          => 'pro',
					'link' 			=> admin_url( '/customize.php?autofocus[section]=sydney_panel_typography' ),
					'link_label'	=> esc_html__( 'Customize', 'sydney' ),
					'activate_uri' 	=> '&amp;activate_module_custom-fonts', //param is added in dashboard class
					'text'			=> __( 'Add custom fonts to your site.', 'sydney' ) . '<div><a target="_blank" href="#">' . __( 'Documentation article', 'sydney' ) . '</a></div>',
					'keywords'		=> array( 'custom', 'fonts', 'font', 'typography'),
				),	
				array(
					'slug'			=> 'offcanvas-content',
					'name'          => esc_html__( 'Offcanvas Content', 'sydney' ),
					'type'          => 'pro',
					'link' 			=> admin_url( '/customize.php?autofocus[section]=sydney_section_offcanvas_content' ),
					'link_label'	=> esc_html__( 'Customize', 'sydney' ),
					'activate_uri' 	=> '&amp;activate_module_offcanvas-content', //param is added in dashboard class
					'text'			=> __( 'Offcanvas sidebars, Elementor templates or custom content', 'sydney' ) . '<div><a target="_blank" href="https://docs.athemes.com/article/offcanvas-content-module/">' . __( 'Documentation article', 'sydney' ) . '</a></div>',
					'keywords'		=> array( 'offcanvas', 'content', 'menu', 'custom', 'elementor' ),
				),
			);

			$modules['header'] = array(
				array(
					'slug'			=> 'ext-header',
					'name'          => esc_html__( 'Extended Header Module', 'sydney' ),
					'type'          => 'pro',
					'link' 			=> admin_url( '/customize.php?autofocus[panel]=sydney_panel_header' ),
					'link_label'	=> esc_html__( 'Customize', 'sydney' ),
					'activate_uri' 	=> '&amp;activate_module_ext-header', //param is added in dashboard class
					'text'			=> __( 'New features for your header area.', 'sydney' ) . '<div><a target="_blank" href="https://docs.athemes.com/article/436-pro-extended-header-module">' . __( 'Documentation article', 'sydney' ) . '</a></div>',
					'keywords'		=> array( 'header', 'extended', 'features', 'social', 'contact', 'search', 'menu', 'navigation' ),
				),	
				array(
					'slug'			=> 'mega-menu',
					'name'          => esc_html__( 'Mega Menu', 'sydney' ),
					'type'          => 'pro',
					//'link' 			=> admin_url( '/customize.php?autofocus[section]=sydney_mega_menu' ),
					//'link_label'	=> esc_html__( 'Customize', 'sydney' ),
					'activate_uri' 	=> '&amp;activate_module_mega-menu', //param is added in dashboard class
					'text'			=> __( 'Mega menu with Elementor support', 'sydney' ) . '<div><a target="_blank" href="#">' . __( 'Documentation article', 'sydney' ) . '</a></div>',
					'keywords'		=> array( 'mega', 'menu', 'elementor', 'navigation', 'navigation menu' ),
				),
			);

			$modules['footer'] = array(
				array(
					'slug'			=> 'ext-footer',
					'name'          => esc_html__( 'Extended Footer Module', 'sydney' ),
					'type'          => 'pro',
					'link' 			=> admin_url( '/customize.php?autofocus[panel]=sydney_panel_footer' ),
					'link_label'	=> esc_html__( 'Customize', 'sydney' ),
					'activate_uri' 	=> '&amp;activate_module_ext-footer', //param is added in dashboard class
					'text'			=> __( 'Extra features for your footer', 'sydney' ) . '<div><a target="_blank" href="https://docs.athemes.com/article/442-pro-extended-footer-module">' . __( 'Documentation article', 'sydney' ) . '</a></div>',
					'keywords'		=> array( 'footer', 'extended' ),
				),
			);
			$modules['blog'] = array(
				array(
					'slug'			=> 'ext-blog',
					'name'          => esc_html__( 'Extended Blog Module', 'sydney' ),
					'type'          => 'pro',
					'link' 			=> admin_url( '/customize.php?autofocus[panel]=sydney_panel_blog' ),
					'link_label'	=> esc_html__( 'Customize', 'sydney' ),
					'activate_uri' 	=> '&amp;activate_module_ext-blog', //param is added in dashboard class
					'text'			=> __( 'Extra features for your blog.', 'sydney' ) . '<div><a target="_blank" href="https://docs.athemes.com/article/438-pro-extended-blog-module">' . __( 'Documentation article', 'sydney' ) . '</a></div>',
					'keywords'		=> array( 'blog', 'extended', 'posts', 'post', 'archive', 'search', 'author' ),
				),					
				array(
					'slug'			=> 'page-headers',
					'name'          => esc_html__( 'Page Headers', 'sydney' ),
					'type'          => 'pro',
					//'link' 		=> admin_url( '/customize.php?autofocus[section]=sydney_breadcrumbs' ),
					//'link_label'	=> esc_html__( 'Customize', 'sydney' ),
					'activate_uri' 	=> '&amp;activate_module_page-headers', //param is added in dashboard class
					'text'			=> __( 'Page Header options for posts, pages, archives etc.', 'sydney' ) . '<div><a target="_blank" href="https://docs.athemes.com/article/how-to-customize-page-headers-in-sydney-pro">' . __( 'Documentation article', 'sydney' ) . '</a></div>',
					'keywords'		=> array( 'page', 'header', 'post' ),
				),				
				array(
					'slug'			=> 'breadcrumbs',
					'name'          => esc_html__( 'Breadcrumbs Module', 'sydney' ),
					'type'          => 'pro',
					'link' 			=> admin_url( '/customize.php?autofocus[section]=sydney_breadcrumbs' ),
					'link_label'	=> esc_html__( 'Customize', 'sydney' ),
					'activate_uri' 	=> '&amp;activate_module_breadcrumbs', //param is added in dashboard class
					'text'			=> __( 'Breadcrumbs functionality.', 'sydney' ) . '<div><a target="_blank" href="https://docs.athemes.com/article/440-pro-breadcrumbs">' . __( 'Documentation article', 'sydney' ) . '</a></div>',
					'keywords'		=> array( 'breadcrumbs', 'navigation', 'navigation menu' ),
				),
			);

			$modules['integrations'] = array(
				array(
					'slug'			=> 'ext-woocommerce',
					'name'          => esc_html__( 'Extended WooCommerce', 'sydney' ),
					'type'          => 'pro',
					'link' 			=> admin_url( '/customize.php?autofocus[panel]=woocommerce' ),
					'link_label'	=> esc_html__( 'Customize', 'sydney' ),
					'activate_uri' 	=> '&amp;activate_module_ext-woocommerce', //param is added in dashboard class
					'text'			=> __( 'Extra features for WooCommerce', 'sydney' ) . '<div><a target="_blank" href="https://docs.athemes.com/article/444-pro-extended-woocommerce-module">' . __( 'Documentation article', 'sydney' ) . '</a></div>',
					'keywords'		=> array( 'woo','woocommerce', 'shop', 'store', 'cart', 'checkout', 'product', 'extended' ),
				),
				array(
					'slug'			=> 'elementor-tools',
					'name'          => esc_html__( 'Elementor Tools', 'sydney' ),
					'type'          => 'pro',
					//'link' 			=> admin_url( '/customize.php?autofocus[section]=sydney_section_modal_popup' ),
					//'link_label'	=> esc_html__( 'Customize', 'sydney' ),
					'activate_uri' 	=> '&amp;activate_module_elementor-tools', //param is added in dashboard class
					'text'			=> __( 'Custom CSS and other tools for Elementor', 'sydney' ) . '<div><a target="_blank" href="https://docs.athemes.com/article/elementor-toolbox-module/">' . __( 'Documentation article', 'sydney' ) . '</a></div>',
					'keywords'		=> array( 'elementor', 'particles', 'tooltips', 'animations', 'css', 'tools' ),
				),
				array(
					'slug'			=> 'live-chat',
					'name'          => esc_html__( 'Live Chat (WhatsApp)', 'sydney' ),
					'type'          => 'pro',
					'link' 			=> admin_url( '/customize.php?autofocus[section]=sydney_section_live_chat' ),
					'link_label'	=> esc_html__( 'Customize', 'sydney' ),
					'activate_uri' 	=> '&amp;activate_module_live-chat', //param is added in dashboard class
					'text'			=> __( 'Live chat floating icon', 'sydney' ) . '<div><a target="_blank" href="https://docs.athemes.com/article/live-chat-in-sydney/">' . __( 'Documentation article', 'sydney' ) . '</a></div>',
					'keywords'		=> array( 'live', 'chat', 'whatsapp', 'icon', 'floating' ),
				),				
			);

			if ( $category ) {
				return $modules[$category];
			}
		
			//build array with all modules if no category is specified
			$all_modules = array();
			foreach ( $modules as $module ) {
				$all_modules = array_merge( $all_modules, $module );
			}

			return $all_modules;
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