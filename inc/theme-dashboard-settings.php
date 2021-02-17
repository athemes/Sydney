<?php
/**
 * Theme activation.
 *
 * @package Sydney
 */

/**
 * Theme Dashboard [Free VS Pro]
 */
function sydney_free_vs_pro_html() {
	ob_start();
	?>
	<div class="thd-heading"><?php esc_html_e( 'Differences between Sydney and Sydney Pro', 'sydney' ); ?></div>
	<div class="thd-description"><?php esc_html_e( 'Here is the list of differences between Sydney and Sydney Pro:', 'sydney' ); ?></div>

	<table class="thd-table-compare">
		<thead>
			<tr>
				<th><?php esc_html_e( 'Feature', 'sydney' ); ?></th>
				<th><?php esc_html_e( 'Sydney', 'sydney' ); ?></th>
				<th><?php esc_html_e( 'Sydney Pro', 'sydney' ); ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php esc_html_e( 'Access to all Google Fonts', 'sydney' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Responsive', 'sydney' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Parallax backgrounds', 'sydney' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Social Icons', 'sydney' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Slider, image or video header', 'sydney' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Front Page Blocks', 'sydney' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Translation ready', 'sydney' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Polylang integration', 'sydney' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Color options', 'sydney' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Blog options', 'sydney' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Widgetized footer', 'sydney' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Background image support', 'sydney' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Footer Credits option', 'sydney' ); ?></td>
				<td><span class="thd-badge thd-badge-warning"><i class="dashicons dashicons-no-alt"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Extra widgets (timeline, latest news in carousel, pricing table, a new employees widget and a new contact widget)', 'sydney' ); ?></td>
				<td><span class="thd-badge thd-badge-warning"><i class="dashicons dashicons-no-alt"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Extra Customizer Options (Front Page Section Titles, Single Employees, Single Projects, Header Contact Info, Buttons)', 'sydney' ); ?></td>
				<td><span class="thd-badge thd-badge-warning"><i class="dashicons dashicons-no-alt"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Header support for Smart Slider 3', 'sydney' ); ?></td>
				<td><span class="thd-badge thd-badge-warning"><i class="dashicons dashicons-no-alt"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Header support for shortcodes ', 'sydney' ); ?></td>
				<td><span class="thd-badge thd-badge-warning"><i class="dashicons dashicons-no-alt"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Single Post/Page Options ', 'sydney' ); ?></td>
				<td><span class="thd-badge thd-badge-warning"><i class="dashicons dashicons-no-alt"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'WooCommerce compatible', 'sydney' ); ?></td>
				<td><span class="thd-badge thd-badge-warning"><i class="dashicons dashicons-no-alt"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( '5 Extra Page Templates (Contact, Featured Header - Default, Featured Header - Wide, No Header - Default, No Header - Wide) ', 'sydney' ); ?></td>
				<td><span class="thd-badge thd-badge-warning"><i class="dashicons dashicons-no-alt"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Priority support ', 'sydney' ); ?></td>
				<td><span class="thd-badge thd-badge-warning"><i class="dashicons dashicons-no-alt"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
		</tbody>
	</table>

	<div class="thd-separator"></div>

	<p>
		<a href="https://athemes.com/theme/sydney-pro/?utm_source=theme_table&utm_medium=button&utm_campaign=Sydney" class="thd-button button">
			<?php esc_html_e( 'Get Sydney Pro Today', 'sydney' ); ?>
		</a>
	</p>
	<?php
	return ob_get_clean();
}

/**
 * Theme Dashboard Settings
 *
 * @param array $settings The settings.
 */
function sydney_dashboard_settings( $settings ) {

	// Starter.
	$settings['starter_plugin_slug'] = 'athemes-starter-sites';

	// Hero.
	$settings['hero_title']       = esc_html__( 'Welcome to Sydney', 'sydney' );
	$settings['hero_themes_desc'] = esc_html__( 'Sydney is now installed and ready to use. Click on Starter Sites to get off to a flying start with one of our pre-made templates, or go to Theme Dashboard to get an overview of everything.', 'sydney' );
	$settings['hero_desc']        = esc_html__( 'Sydney is now installed and ready to go. To help you with the next step, we\'ve gathered together on this page all the resources you might need. We hope you enjoy using Sydney.', 'sydney' );
	$settings['hero_image']       = get_template_directory_uri() . '/theme-dashboard/images/welcome-banner@2x.png';

	// Tabs.
	$settings['tabs'] = array(
		array(
			'name'    => esc_html__( 'Theme Features', 'sydney' ),
			'type'    => 'features',
			'visible' => array( 'free', 'pro' ),
			'data'    => array(
				array(
					'name'          => esc_html__( 'Change Site Title or Logo', 'sydney' ),
					'type'          => 'free',
					'customize_uri' => '/wp-admin/customize.php?autofocus[section]=title_tagline',
				),
				array(
					'name'          => esc_html__( 'Header Options', 'sydney' ),
					'type'          => 'free',
					'customize_uri' => '/wp-admin/customize.php?autofocus[panel]=sydney_header_panel',
				),
				array(
					'name'          => esc_html__( 'Color Options', 'sydney' ),
					'type'          => 'free',
					'customize_uri' => '/wp-admin/customize.php?autofocus[panel]=sydney_colors_panel',
				),
				array(
					'name'          => esc_html__( 'Font Options', 'sydney' ),
					'type'          => 'free',
					'customize_uri' => '/wp-admin/customize.php?autofocus[section]=sydney_fonts',
				),
				array(
					'name'          => esc_html__( 'Blog Options', 'sydney' ),
					'type'          => 'free',
					'customize_uri' => '/wp-admin/customize.php?autofocus[section]=blog_options',
				),
				array(
					'name'          => esc_html__( 'Footer Credits', 'sydney' ),
					'type'          => 'pro',
					'customize_uri' => '/wp-admin/customize.php?autofocus[section]=sydney_footer_credits',
				),
				array(
					'name'          => esc_html__( 'Footer Contact', 'sydney' ),
					'type'          => 'pro',
					'customize_uri' => '/wp-admin/customize.php?autofocus[section]=sydney_footer_contact',
				),
				array(
					'name'          => esc_html__( 'Front Page Section Titles', 'sydney' ),
					'type'          => 'pro',
					'customize_uri' => '/wp-admin/customize.php?autofocus[section]=sydney_fp_titles',
				),
				array(
					'name'          => esc_html__( 'Single Employees', 'sydney' ),
					'type'          => 'pro',
					'customize_uri' => '/wp-admin/customize.php?autofocus[section]=sydney_single_employees',
				),
				array(
					'name'          => esc_html__( 'Single Projects', 'sydney' ),
					'type'          => 'pro',
					'customize_uri' => '/wp-admin/customize.php?autofocus[section]=sydney_single_projects',
				),
				array(
					'name'          => esc_html__( 'Header Contact Info', 'sydney' ),
					'type'          => 'pro',
					'customize_uri' => '/wp-admin/customize.php?autofocus[section]=sydney_contact_info',
				),
				array(
					'name'          => esc_html__( 'Buttons', 'sydney' ),
					'type'          => 'pro',
					'customize_uri' => '/wp-admin/customize.php?autofocus[section]=sydney_buttons',
				),
				array(
					'name'          => esc_html__( 'Extra Widget Area', 'sydney' ),
					'type'          => 'pro',
					'customize_uri' => '/wp-admin/customize.php?autofocus[section]=sydney_extra_widget_area',
				),
				array(
					'name'          => esc_html__( 'Google Maps', 'sydney' ),
					'type'          => 'pro',
					'customize_uri' => '/wp-admin/customize.php?autofocus[section]=sydney_pro_maps',
				),
			),
		),
		array(
			'name'    => esc_html__( 'Free vs PRO', 'sydney' ),
			'type'    => 'html',
			'visible' => array( 'free' ),
			'data'    => sydney_free_vs_pro_html(),
		),
		array(
			'name'    => esc_html__( 'Performance', 'sydney' ),
			'type'    => 'performance',
			'visible' => array( 'free', 'pro' ),
		),
	);

	// Documentation.
	$settings['documentation_link'] = 'https://docs.athemes.com/category/8-sydney';

	// Promo.
	$settings['promo_title']  = esc_html__( 'Upgrade to Pro', 'sydney' );
	$settings['promo_desc']   = esc_html__( 'Take Sydney to a whole other level by upgrading to the Pro version.', 'sydney' );
	$settings['promo_button'] = esc_html__( 'Discover Sydney Pro', 'sydney' );
	$settings['promo_link']   = 'https://athemes.com/theme/sydney-pro/?utm_source=theme_info&utm_medium=link&utm_campaign=Sydney';

	// Review.
	$settings['review_link']       = 'https://wordpress.org/support/theme/sydney/reviews/';
	$settings['suggest_idea_link'] = 'https://sydney-47cb.nolt.io/';

	// Support.
	$settings['support_link']     = 'https://forums.athemes.com/';
	$settings['support_pro_link'] = 'https://athemes.com/theme/sydney-pro/?utm_source=theme_info&utm_medium=link&utm_campaign=Sydney';

	// Community.
	$settings['community_link'] = 'https://www.facebook.com/groups/athemes';

	$theme = wp_get_theme();
	// Changelog.
	$settings['changelog_version'] = $theme->version;
	$settings['changelog_link']    = 'https://athemes.com/changelog/sydney/';

	return $settings;
}
add_filter( 'thd_register_settings', 'sydney_dashboard_settings' );

/**
 * Starter Settings
 *
 * @param array $settings The settings.
 */
function sydney_demos_settings( $settings ) {

	$settings['categories'] = array(
		'business' 	=> 'Business',
		'portfolio' => 'Portfolio',
		'ecommerce' => 'eCommerce',
		'event' 	=> 'Events',
	);	

	$settings['builders'] = array(
		'elementor' => 'Elementor',
	);		

	// Pro.
	$settings['pro_label'] = esc_html__( 'Get Sydney Pro', 'sydney' );
	$settings['pro_link']  = 'https://athemes.com/theme/sydney-pro/?utm_source=theme_table&utm_medium=button&utm_campaign=Sydney';

	return $settings;
}
add_filter( 'atss_register_demos_settings', 'sydney_demos_settings' );
