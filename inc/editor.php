<?php

/**
 * Gutenberg support
 */

function sydney_editor_styles() {
	wp_enqueue_style( 'sydney-block-editor-styles', get_theme_file_uri( '/sydney-gutenberg-editor-styles.css' ), '', '1.0', 'all' );

	wp_enqueue_style( 'sydney-fonts', esc_url( sydney_google_fonts_url() ), array(), null );


	//Dynamic styles
	$custom = '';

	//Fonts
	$typography_defaults = json_encode(
		array(
			'font' 			=> 'System default',
			'regularweight' => 'regular',
			'category' 		=> 'sans-serif'
		)
	);

	$body_font		= get_theme_mod( 'sydney_body_font', $typography_defaults );
	$headings_font 	= get_theme_mod( 'sydney_headings_font', $typography_defaults );

	$body_font 		= json_decode( $body_font, true );
	$headings_font 	= json_decode( $headings_font, true );

	$custom .= ".editor-block-list__layout, .editor-block-list__layout .editor-block-list__block { font-family:" . esc_attr( $body_font['font'] ) . ',' . esc_attr( $body_font['category'] ) . '; font-weight: ' . esc_attr( $body_font['regularweight'] ) . ';}' . "\n";
	$custom .= ".editor-post-title__block .editor-post-title__input, .editor-block-list__layout .editor-post-title__input, .editor-block-list__layout h1, .editor-block-list__layout h2, .editor-block-list__layout h3, .editor-block-list__layout h4, .editor-block-list__layout h5, .editor-block-list__layout h6 { font-family:" . esc_attr( $headings_font['font'] ) . ',' . esc_attr( $headings_font['category'] ) . '; font-weight: ' . esc_attr( $headings_font['regularweight'] ) . ';}' . "\n";
	
	$custom .= Sydney_Custom_CSS::get_font_sizes_css( 'h1_font_size', $defaults = array( 'desktop' => 52, 'tablet' => 42, 'mobile' => 32 ), '.editor-block-list__layout h1' );
	$custom .= Sydney_Custom_CSS::get_font_sizes_css( 'h2_font_size', $defaults = array( 'desktop' => 42, 'tablet' => 32, 'mobile' => 24 ), '.editor-block-list__layout h2' );
	$custom .= Sydney_Custom_CSS::get_font_sizes_css( 'h3_font_size', $defaults = array( 'desktop' => 32, 'tablet' => 24, 'mobile' => 20 ), '.editor-block-list__layout h3' );
	$custom .= Sydney_Custom_CSS::get_font_sizes_css( 'h4_font_size', $defaults = array( 'desktop' => 24, 'tablet' => 18, 'mobile' => 16 ), '.editor-block-list__layout h4' );
	$custom .= Sydney_Custom_CSS::get_font_sizes_css( 'h5_font_size', $defaults = array( 'desktop' => 20, 'tablet' => 16, 'mobile' => 16 ), '.editor-block-list__layout h5' );
	$custom .= Sydney_Custom_CSS::get_font_sizes_css( 'h6_font_size', $defaults = array( 'desktop' => 16, 'tablet' => 16, 'mobile' => 16 ), '.editor-block-list__layout h6' );

	$custom .= Sydney_Custom_CSS::get_font_sizes_css( 'body_font_size', $defaults = array( 'desktop' => 16, 'tablet' => 16, 'mobile' => 16 ), '.editor-block-list__block, .editor-block-list__block p' );            
	
	$body_font_style 		= get_theme_mod( 'body_font_style' );
	$body_line_height 		= get_theme_mod( 'body_line_height', 1.68 );
	$body_letter_spacing 	= get_theme_mod( 'body_letter_spacing' );
	$body_text_transform 	= get_theme_mod( 'body_text_transform' );
	$body_text_decoration 	= get_theme_mod( 'body_text_decoration' );

	$custom .= ".editor-block-list__block p { text-transform:" . esc_attr( $body_text_transform ) . ";font-style:" . esc_attr( $body_font_style ) . ";line-height:" . esc_attr( $body_line_height ) . ";letter-spacing:" . esc_attr( $body_letter_spacing ) . "px;}" . "\n";	

	//Single post title
	$custom .= Sydney_Custom_CSS::get_font_sizes_css( 'single_post_title_size', $defaults = array( 'desktop' => 48, 'tablet' => 32, 'mobile' => 32 ), '.editor-post-title__block .editor-post-title__input, .editor-block-list__layout .editor-post-title__input' );

	//__COLORS
	//Primary color
	$primary_color = get_theme_mod( 'primary_color', '#d65050' );
	$custom .= ".editor-block-list__layout blockquote.wp-block-quote, .editor-block-list__layout .wp-block-quote:not(.is-large):not(.is-style-large) { border-color:" . esc_attr($primary_color) . "}"."\n";

	//Body
	$body_text = get_theme_mod( 'body_text_color', '#47425d' );
	$custom .= ".editor-block-list__layout, .editor-block-list__layout .editor-block-list__block { color:" . esc_attr($body_text) . "}"."\n";

	//Small screens font sizes
	$custom .= "@media only screen and (max-width: 780px) { 
		h1 { font-size: 32px;}
		h2 { font-size: 28px;}
		h3 { font-size: 22px;}
		h4 { font-size: 18px;}
		h5 { font-size: 16px;}
		h6 { font-size: 14px;}
	}" . "\n";

	//Buttons
	$custom .= Sydney_Custom_CSS::get_top_bottom_padding_css( 'button_top_bottom_padding', $defaults = array( 'desktop' => 12, 'tablet' => 12, 'mobile' => 12 ), 'button,a.button,.wp-block-button__link,input[type="button"],input[type="reset"],input[type="submit"]' );
	$custom .= Sydney_Custom_CSS::get_left_right_padding_css( 'button_left_right_padding', $defaults = array( 'desktop' => 35, 'tablet' => 35, 'mobile' => 35 ), 'button,a.button,.wp-block-button__link,input[type="button"],input[type="reset"],input[type="submit"]' );

	$buttons_radius = get_theme_mod( 'buttons_radius' );
	$custom .= "div.editor-styles-wrapper .wp-block-button__link { border-radius:" . intval( $buttons_radius ) . "px;}" . "\n";

	$custom .= Sydney_Custom_CSS::get_font_sizes_css( 'button_font_size', $defaults = array( 'desktop' => 13, 'tablet' => 13, 'mobile' => 13 ), 'button,a.button,.wp-block-button__link,input[type="button"],input[type="reset"],input[type="submit"]' );
	$button_text_transform = get_theme_mod( 'button_text_transform', 'none' );
	$custom .= "div.editor-styles-wrapper .wp-block-button__link { text-transform:" . esc_attr( $button_text_transform ) . ";}" . "\n";

	$custom .= Sydney_Custom_CSS::get_background_color_css( 'button_background_color', '', 'div.editor-styles-wrapper .wp-block-button__link' );			
	$custom .= Sydney_Custom_CSS::get_background_color_css( 'button_background_color_hover', '', 'div.editor-styles-wrapper .wp-block-button__link:hover' );			

	$custom .= Sydney_Custom_CSS::get_color_css( 'button_color', '#ffffff', 'div.editor-styles-wrapper .wp-block-button__link' );			
	$custom .= Sydney_Custom_CSS::get_color_css( 'button_color_hover', '#ffffff', 'div.editor-styles-wrapper .wp-block-button__link:hover' );			

	$button_border_color = get_theme_mod( 'button_border_color', '' );
	$button_border_color_hover = get_theme_mod( 'button_border_color_hover', '' );
	$custom .= "div.editor-styles-wrapper .is-style-outline .wp-block-button__link,div.editor-styles-wrapper .wp-block-button__link.is-style-outline,div.editor-styles-wrapper .wp-block-button__link { border-color:" . esc_attr( $button_border_color ) . ";}" . "\n";
	$custom .= "div.editor-styles-wrapper .wp-block-button__link:hover { border-color:" . esc_attr( $button_border_color_hover ) . ";}" . "\n";

	
	//Output all the styles
	wp_add_inline_style( 'sydney-block-editor-styles', $custom );	

}
add_action( 'enqueue_block_editor_assets', 'sydney_editor_styles' );