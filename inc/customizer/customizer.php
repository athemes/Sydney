<?php
/**
 * Sydney Theme Customizer
 *
 * @package Sydney
 */

function sydney_customize_register( $wp_customize ) {
	$wp_customize->remove_control( 'header_textcolor' );
    $wp_customize->remove_control( 'display_header_text' );
    $wp_customize->get_section( 'header_image' )->panel = 'sydney_panel_hero';
    $wp_customize->get_section( 'header_image' )->priority = 99;
    $wp_customize->get_section( 'title_tagline' )->priority = 9;

    if ( get_option( 'sydney-update-header' ) ) {
        $wp_customize->get_section( 'title_tagline' )->panel = 'sydney_panel_header';
    }

    //Partials
    for ($i = 1; $i < 5; $i++) { 
        $wp_customize->selective_refresh->add_partial( 'slider_title_' . $i, array(
            'selector'          => '.slide-item-' . $i . ' .maintitle',
            'render_callback'   => 'sydney_partial_slider_title_' . $i,
        ) );
        $wp_customize->selective_refresh->add_partial( 'slider_subtitle_' . $i, array(
            'selector'          => '.slide-item-' . $i . ' .subtitle',
            'render_callback'   => 'sydney_partial_slider_subtitle_' . $i,
        ) );        
    }    
    $wp_customize->selective_refresh->add_partial( 'slider_button_text', array(
        'selector'          => '.button-slider',
        'render_callback'   => 'sydney_partial_slider_button_text',
    ) );   

    //Divider
    class Sydney_Divider extends WP_Customize_Control {
         public function render_content() {
            echo '<hr style="margin: 15px 0;border-top: 1px dashed #919191;" />';
         }
    }
    //Titles
    class Sydney_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
            <h3 style="padding:12px;color:#000;background:#cbcbcb;text-align:center;text-transform:uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }    
    //Titles
    class Sydney_Theme_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
            <h3><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }

    /**
     * Callbacks and sanitize
     */
    require get_template_directory() . '/inc/customizer/callbacks.php';
    require get_template_directory() . '/inc/customizer/sanitize.php';

    /**
     * Controls
     */
    require get_template_directory() . '/inc/customizer/controls/typography/class_sydney_typography.php';
    require get_template_directory() . '/inc/customizer/controls/repeater/class_sydney_repeater.php';
    require get_template_directory() . '/inc/customizer/controls/alpha-color/class_sydney_alpha_color.php';
    require get_template_directory() . '/inc/customizer/controls/radio-images/class_sydney_radio_images.php';
    require get_template_directory() . '/inc/customizer/controls/radio-buttons/class_sydney_radio_buttons.php';
    require get_template_directory() . '/inc/customizer/controls/responsive-slider/class_sydney_responsive_slider.php';
    require get_template_directory() . '/inc/customizer/controls/class_sydney_tab_control.php';
    require get_template_directory() . '/inc/customizer/controls/class_sydney_text_control.php';
    //require get_template_directory() . '/inc/customizer/controls/class_sydney_tinymce_control.php';
    require get_template_directory() . '/inc/customizer/controls/class_sydney_divider_control.php';
    require get_template_directory() . '/inc/customizer/controls/toggle/class_sydney_toggle_control.php';
    require get_template_directory() . '/inc/customizer/controls/accordion/class_sydney_accordion_control.php';    
    require get_template_directory() . '/inc/customizer/controls/class_sydney_upsell_message.php';    

    require get_template_directory() . '/inc/customizer/controls/control-checkbox-multiple.php';
    require get_template_directory() . '/inc/customizer/controls/multiple-select/class-control-multiple-select.php';
    $wp_customize->register_control_type( 'Sydney_Select2_Custom_Control' 	);
    $wp_customize->register_control_type( '\Kirki\Control\sortable' );
    
    /**
     * Options
     */
    require get_template_directory() . '/inc/customizer/options/general.php';
    if ( get_option( 'sydney-update-header' ) ) {
        require get_template_directory() . '/inc/customizer/options/header.php';
        require get_template_directory() . '/inc/customizer/options/header-mobile.php';
    }
    require get_template_directory() . '/inc/customizer/options/typography.php';
    require get_template_directory() . '/inc/customizer/options/footer.php';
    require get_template_directory() . '/inc/customizer/options/blog.php';
    require get_template_directory() . '/inc/customizer/options/blog-single.php';
    require get_template_directory() . '/inc/customizer/options/colors.php';
    require get_template_directory() . '/inc/customizer/options/upsell.php';
    require get_template_directory() . '/inc/customizer/options/performance.php';

    if ( class_exists( 'Woocommerce' ) ) {
        require get_template_directory() . '/inc/customizer/options/woocommerce.php';
        require get_template_directory() . '/inc/customizer/options/woocommerce-single.php';
    }

    //___Header area___//
    $wp_customize->add_panel( 'sydney_panel_hero', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Hero area', 'sydney'),
    ) );
    //___Header type___//
    $wp_customize->add_section(
        'sydney_header_type',
        array(
            'title'         => __('Hero type', 'sydney'),
            'priority'      => 10,
            'panel'         => 'sydney_panel_hero', 
            'description'   => __('You can select your header type from here. After that, continue below to the next two tabs (Hero Slider and Header Image) and configure them.', 'sydney'),
        )
    );

    if ( !get_option( 'sydney-update-header' ) ) {
        $front_default = 'nothing';
        $site_default = 'image';
    } else {
        $front_default = 'nothing';
        $site_default = 'nothing';
    }    
    //Front page
    $wp_customize->add_setting(
        'front_header_type',
        array(
            'default'           =>  $front_default,
            'sanitize_callback' => 'sydney_sanitize_layout',
        )
    );
    $wp_customize->add_control(
        'front_header_type',
        array(
            'type'        => 'radio',
            'label'       => __('Front page header type', 'sydney'),
            'section'     => 'sydney_header_type',
            'description' => __('Select the header type for your front page', 'sydney'),
            'choices' => array(
                'slider'    => __('Full screen slider', 'sydney'),
                'image'     => __('Image', 'sydney'),
                'core-video'=> __('Video', 'sydney'),
                'nothing'   => __('No header (only menu)', 'sydney')
            ),
        )
    );
    //Site
    $wp_customize->add_setting(
        'site_header_type',
        array(
            'default'           => $site_default,
            'sanitize_callback' => 'sydney_sanitize_layout',
        )
    );
    $wp_customize->add_control(
        'site_header_type',
        array(
            'type'        => 'radio',
            'label'       => __('Site header type', 'sydney'),
            'section'     => 'sydney_header_type',
            'description' => __('Select the hero type for all pages except the front page', 'sydney'),
            'choices' => array(
                'slider'    => __('Full screen slider', 'sydney'),
                'image'     => __('Image', 'sydney'),
                'core-video'=> __('Video', 'sydney'),
                'nothing'   => __('No header (only menu)', 'sydney')
            ),
        )
    );    
    //___Slider___//
    $wp_customize->add_section(
        'sydney_slider',
        array(
            'title'         => __('Hero Slider', 'sydney'),
            'description'   => __('You can add up to 5 images in the slider. Make sure you select where to display your slider from the Hero  Type section found above. You can also add a Call to action button (scroll down to find the options)', 'sydney'),
            'priority'      => 11,
            'panel'         => 'sydney_panel_hero',
        )
    );
    //Mobile slider
    $wp_customize->add_setting(
        'mobile_slider',
        array(
            'default'           => 'responsive',
            'sanitize_callback' => 'sydney_sanitize_mslider',
        )
    );
    $wp_customize->add_control(
        'mobile_slider',
        array(
            'type'        => 'radio',
            'label'       => __('Slider mobile behavior', 'sydney'),
            'section'     => 'sydney_slider',
            'priority'    => 99,
            'choices' => array(
                'fullscreen'    => __('Full screen', 'sydney'),
                'responsive'    => __('Responsive', 'sydney'),
            ),
        )
    );    
    //Speed
    $wp_customize->add_setting(
        'slider_speed',
        array(
            'default' => __('4000','sydney'),
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'slider_speed',
        array(
            'label' => __( 'Slider speed', 'sydney' ),
            'section' => 'sydney_slider',
            'type' => 'number',
            'description'   => __('Slider speed in miliseconds. Use 0 to disable [default: 4000]', 'sydney'),       
            'priority' => 7
        )
    );
    $wp_customize->add_setting(
        'textslider_slide',
        array(
            'sanitize_callback' => 'sydney_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'textslider_slide',
        array(
            'type'      => 'checkbox',
            'label'     => __('Stop the text slider?', 'sydney'),
            'section'   => 'sydney_slider',
            'priority'  => 9,
        )
    );
    //Image 1
    $wp_customize->add_setting('sydney_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new Sydney_Info( $wp_customize, 's1', array(
        'label' => __('First slide', 'sydney'),
        'section' => 'sydney_slider',
        'settings' => 'sydney_options[info]',
        'priority' => 10
        ) )
    );    
    $wp_customize->add_setting(
        'slider_image_1',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            //'transport'         => 'postMessage'            
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'slider_image_1',
            array(
               'label'          => __( 'Upload your first image for the slider', 'sydney' ),
               'type'           => 'image',
               'section'        => 'sydney_slider',
               'settings'       => 'slider_image_1',
               'priority'       => 11,
            )
        )
    );
    //Title
    $wp_customize->add_setting(
        'slider_title_1',
        array(
            'default'           => __('Click the pencil icon to change this text','sydney'),
            'sanitize_callback' => 'sydney_sanitize_text',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        'slider_title_1',
        array(
            'label' => __( 'Title for the first slide', 'sydney' ),
            'section' => 'sydney_slider',
            'type' => 'text',
            'priority' => 12
        )
    );
    //Subtitle
    $wp_customize->add_setting(
        'slider_subtitle_1',
        array(
            'default' => __('or go to the Customizer','sydney'),
            'sanitize_callback' => 'sydney_sanitize_text',
            'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        'slider_subtitle_1',
        array(
            'label' => __( 'Subtitle for the first slide', 'sydney' ),
            'section' => 'sydney_slider',
            'type' => 'text',
            'priority' => 13
        )
    );           
    //Image 2
    $wp_customize->add_setting('sydney_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new Sydney_Info( $wp_customize, 's2', array(
        'label' => __('Second slide', 'sydney'),
        'section' => 'sydney_slider',
        'settings' => 'sydney_options[info]',
        'priority' => 14
        ) )
    );    
    $wp_customize->add_setting(
        'slider_image_2',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
            //'transport'         => 'postMessage'            
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'slider_image_2',
            array(
               'label'          => __( 'Upload your second image for the slider', 'sydney' ),
               'type'           => 'image',
               'section'        => 'sydney_slider',
               'settings'       => 'slider_image_2',
               'priority'       => 15,
            )
        )
    );
    //Title
    $wp_customize->add_setting(
        'slider_title_2',
        array(
            'default' => '',
            'sanitize_callback' => 'sydney_sanitize_text',
            'transport'         => 'postMessage'            
        )
    );
    $wp_customize->add_control(
        'slider_title_2',
        array(
            'label' => __( 'Title for the second slide', 'sydney' ),
            'section' => 'sydney_slider',
            'type' => 'text',
            'priority' => 16
        )
    );
    //Subtitle
    $wp_customize->add_setting(
        'slider_subtitle_2',
        array(
            'default' => '',
            'sanitize_callback' => 'sydney_sanitize_text',
            'transport'         => 'postMessage'            
        )
    );
    $wp_customize->add_control(
        'slider_subtitle_2',
        array(
            'label' => __( 'Subtitle for the second slide', 'sydney' ),
            'section' => 'sydney_slider',
            'type' => 'text',
            'priority' => 17
        )
    );    
    //Image 3
    $wp_customize->add_setting('sydney_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new Sydney_Info( $wp_customize, 's3', array(
        'label' => __('Third slide', 'sydney'),
        'section' => 'sydney_slider',
        'settings' => 'sydney_options[info]',
        'priority' => 18
        ) )
    );    
    $wp_customize->add_setting(
        'slider_image_3',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'postMessage'            
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'slider_image_3',
            array(
               'label'          => __( 'Upload your third image for the slider', 'sydney' ),
               'type'           => 'image',
               'section'        => 'sydney_slider',
               'settings'       => 'slider_image_3',
               'priority'       => 19,
            )
        )
    );
    //Title
    $wp_customize->add_setting(
        'slider_title_3',
        array(
            'default' => '',
            'sanitize_callback' => 'sydney_sanitize_text',
            'transport'         => 'postMessage'            
        )
    );
    $wp_customize->add_control(
        'slider_title_3',
        array(
            'label' => __( 'Title for the third slide', 'sydney' ),
            'section' => 'sydney_slider',
            'type' => 'text',
            'priority' => 20
        )
    );
    //Subtitle
    $wp_customize->add_setting(
        'slider_subtitle_3',
        array(
            'default' => '',
            'sanitize_callback' => 'sydney_sanitize_text',
            'transport'         => 'postMessage'            
        )
    );
    $wp_customize->add_control(
        'slider_subtitle_3',
        array(
            'label' => __( 'Subtitle for the third slide', 'sydney' ),
            'section' => 'sydney_slider',
            'type' => 'text',
            'priority' => 21
        )
    );            
    //Image 4
    $wp_customize->add_setting('sydney_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new Sydney_Info( $wp_customize, 's4', array(
        'label' => __('Fourth slide', 'sydney'),
        'section' => 'sydney_slider',
        'settings' => 'sydney_options[info]',
        'priority' => 22
        ) )
    );    
    $wp_customize->add_setting(
        'slider_image_4',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'postMessage'            
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'slider_image_4',
            array(
               'label'          => __( 'Upload your fourth image for the slider', 'sydney' ),
               'type'           => 'image',
               'section'        => 'sydney_slider',
               'settings'       => 'slider_image_4',
               'priority'       => 23,
            )
        )
    );
    //Title
    $wp_customize->add_setting(
        'slider_title_4',
        array(
            'default' => '',
            'sanitize_callback' => 'sydney_sanitize_text',
            'transport'         => 'postMessage'            
        )
    );
    $wp_customize->add_control(
        'slider_title_4',
        array(
            'label' => __( 'Title for the fourth slide', 'sydney' ),
            'section' => 'sydney_slider',
            'type' => 'text',
            'priority' => 24
        )
    );
    //Subtitle
    $wp_customize->add_setting(
        'slider_subtitle_4',
        array(
            'default' => '',
            'sanitize_callback' => 'sydney_sanitize_text',
            'transport'         => 'postMessage'            
        )
    );
    $wp_customize->add_control(
        'slider_subtitle_4',
        array(
            'label' => __( 'Subtitle for the fourth slide', 'sydney' ),
            'section' => 'sydney_slider',
            'type' => 'text',
            'priority' => 25
        )
    );    
    //Image 5
    $wp_customize->add_setting('sydney_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new Sydney_Info( $wp_customize, 's5', array(
        'label' => __('Fifth slide', 'sydney'),
        'section' => 'sydney_slider',
        'settings' => 'sydney_options[info]',
        'priority' => 26
        ) )
    );    
    $wp_customize->add_setting(
        'slider_image_5',
        array(
            'default-image'     => '',
            'sanitize_callback'  => 'esc_url_raw',
             'transport'         => 'postMessage'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'slider_image_5',
            array(
               'label'          => __( 'Upload your fifth image for the slider', 'sydney' ),
               'type'           => 'image',
               'section'        => 'sydney_slider',
               'settings'       => 'slider_image_5',
               'priority'       => 27,
            )
        )
    );
    //Title
    $wp_customize->add_setting(
        'slider_title_5',
        array(
            'default'           => '',
            'sanitize_callback' => 'sydney_sanitize_text',
            'transport'         => 'postMessage'            
        )
    );
    $wp_customize->add_control(
        'slider_title_5',
        array(
            'label' => __( 'Title for the fifth slide', 'sydney' ),
            'section' => 'sydney_slider',
            'type' => 'text',
            'priority' => 28
        )
    );
    //Subtitle
    $wp_customize->add_setting(
        'slider_subtitle_5',
        array(
            'default' => '',
            'sanitize_callback' => 'sydney_sanitize_text',
            'transport'         => 'postMessage'            
        )
    );
    $wp_customize->add_control(
        'slider_subtitle_5',
        array(
            'label' => __( 'Subtitle for the fifth slide', 'sydney' ),
            'section' => 'sydney_slider',
            'type' => 'text',
            'priority' => 29
        )
    );
    //Header button
    $wp_customize->add_setting('sydney_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new Sydney_Info( $wp_customize, 'hbutton', array(
        'label' => __('Call to action button', 'sydney'),
        'section' => 'sydney_slider',
        'settings' => 'sydney_options[info]',
        'priority' => 30
        ) )
    );     
    $wp_customize->add_setting(
        'slider_button_url',
        array(
            'default' => '#primary',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'postMessage'                        
        )
    );
    $wp_customize->add_control(
        'slider_button_url',
        array(
            'label' => __( 'URL for your call to action button', 'sydney' ),
            'section' => 'sydney_slider',
            'type' => 'text',
            'priority' => 31
        )
    );
    $wp_customize->add_setting(
        'slider_button_text',
        array(
            'default' => __('Click to begin','sydney'),
            'sanitize_callback' => 'sydney_sanitize_text',
            'transport'         => 'postMessage'            
        )
    );
    $wp_customize->add_control(
        'slider_button_text',
        array(
            'label' => __( 'Text for your call to action button', 'sydney' ),
            'section' => 'sydney_slider',
            'type' => 'text',
            'priority' => 32
        )
    );         

    if ( false == get_option( 'sydney-update-header' ) ) {
    //___Menu style___//
    $wp_customize->add_section(
        'sydney_menu_style',
        array(
            'title'         => __('Menu layout', 'sydney'),
            'priority'      => 15,
            'panel'         => 'sydney_panel_hero', 
        )
    );
    //Sticky menu
    $wp_customize->add_setting(
        'sticky_menu',
        array(
            'default'           => 'sticky',
            'sanitize_callback' => 'sydney_sanitize_sticky',
        )
    );
    $wp_customize->add_control(
        'sticky_menu',
        array(
            'type' => 'radio',
            'priority'    => 10,
            'label' => __('Sticky menu', 'sydney'),
            'section' => 'sydney_menu_style',
            'choices' => array(
                'sticky'   => __('Sticky', 'sydney'),
                'static'   => __('Static', 'sydney'),
            ),
        )
    );
    //Menu style
    $wp_customize->add_setting(
        'menu_style',
        array(
            'default'           => 'inline',
            'sanitize_callback' => 'sydney_sanitize_menu_style',
        )
    );
    $wp_customize->add_control(
        'menu_style',
        array(
            'type'      => 'radio',
            'priority'  => 11,
            'label'     => __('Menu style', 'sydney'),
            'section'   => 'sydney_menu_style',
            'choices'   => array(
                'inline'     => __('Inline', 'sydney'),
                'centered'   => __('Centered (menu and site logo)', 'sydney'),
            ),
        )
    );
    //Menu style
    $wp_customize->add_setting(
        'menu_container',
        array(
            'default'           => 'container',
            'sanitize_callback' => 'sydney_sanitize_menu_container',
        )
    );
    $wp_customize->add_control(
        'menu_container',
        array(
            'type'      => 'select',
            'priority'  => 11,
            'label'     => __('Menu container', 'sydney'),
            'section'   => 'sydney_menu_style',
            'choices'   => array(
                'container'         => __('Contained', 'sydney'),
                'fw-menu-container' => __('Full width', 'sydney'),
            ),
        )
    );    
    //Custom menu item
    $wp_customize->add_setting(
        'header_button_html',
        array(
            'default'           => 'nothing',
            'sanitize_callback' => 'sydney_sanitize_header_custom_item',
        )
    );
    $wp_customize->add_control(
        'header_button_html',
        array(
            'type'      => 'select',
            'priority'  => 11,
            'label'     => __('Header custom item', 'sydney'),
            'section'   => 'sydney_menu_style',
            'choices'   => array(
                'nothing'   => __( 'Nothing', 'sydney'  ),
                'button'    => __( 'Button', 'sydney'  ),
                'html'      => __( 'HTML', 'sydney'   ),
            ),
        )
    );    

    $wp_customize->add_setting('sydney_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new Sydney_Divider( $wp_customize, 'hcs_sep', array(
            'section' => 'sydney_menu_style',
            'settings' => 'sydney_options[info]',
            'priority' => 11,
            'active_callback' => 'sydney_header_custom_btn_active_callback'
        ) )
    ); 

    $wp_customize->add_setting(
        'header_custom_item_btn_link',
        array(
            'default' => 'https://example.org/',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        'header_custom_item_btn_link',
        array(
            'label'     => __( 'Button link', 'sydney' ),
            'section'   => 'sydney_menu_style',
            'type'      => 'text',
            'priority'  => 11,
            'active_callback' => 'sydney_header_custom_btn_active_callback'
        )
    );
    $wp_customize->add_setting(
        'header_custom_item_btn_text',
        array(
            'default'           => __( 'Get in touch', 'sydney' ),
            'sanitize_callback' => 'sydney_sanitize_text',
        )
    );
    $wp_customize->add_control(
        'header_custom_item_btn_text',
        array(
            'label'     => __( 'Button text', 'sydney' ),
            'section'   => 'sydney_menu_style',
            'type'      => 'text',
            'priority'  => 11,
            'active_callback' => 'sydney_header_custom_btn_active_callback'
        )
    );
    $wp_customize->add_setting(
        'header_custom_item_btn_target',
        array(
            'default'           => 1,
            'sanitize_callback' => 'sydney_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'header_custom_item_btn_target',
        array(
            'type'              => 'checkbox',
            'label'             => __('Open link in a new tab?', 'sydney'),
            'section'           => 'sydney_menu_style',
            'priority'          => 11,
            'active_callback'   => 'sydney_header_custom_btn_active_callback'
        )
    );  
    $wp_customize->add_setting(
        'header_custom_item_btn_tb_padding',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '12',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'header_custom_item_btn_tb_padding', array(
        'type'        => 'number',
        'priority'    => 11,
        'section'     => 'sydney_menu_style',
        'label'       => __('Top/bottom button padding', 'sydney'),
        'input_attrs' => array(
            'min'   => 0,
            'max'   => 40,
            'step'  => 1,
        ),
        'active_callback'   => 'sydney_header_custom_btn_active_callback'
    ) );
    $wp_customize->add_setting(
        'header_custom_item_btn_lr_padding',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '35',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'header_custom_item_btn_lr_padding', array(
        'type'        => 'number',
        'priority'    => 11,
        'section'     => 'sydney_menu_style',
        'label'       => __('Left/right button padding', 'sydney'),
        'input_attrs' => array(
            'min'   => 0,
            'max'   => 50,
            'step'  => 1,
        ),
        'active_callback'   => 'sydney_header_custom_btn_active_callback'
    ) );
    //Font size
    $wp_customize->add_setting(
        'header_custom_item_btn_font_size',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '13',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'header_custom_item_btn_font_size', array(
        'type'        => 'number',
        'priority'    => 11,
        'section'     => 'sydney_menu_style',
        'label'       => __('Button font size', 'sydney'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 40,
            'step'  => 1,
        ),
        'active_callback'   => 'sydney_header_custom_btn_active_callback'
    ) ); 
    //Border radius
    $wp_customize->add_setting(
        'header_custom_item_btn_radius',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '3',
            'transport'         => 'postMessage'
        )       
    );
    $wp_customize->add_control( 'header_custom_item_btn_radius', array(
        'type'        => 'number',
        'priority'    => 11,
        'section'     => 'sydney_menu_style',
        'label'       => __('Button border radius', 'sydney'),
        'input_attrs' => array(
            'min'   => 0,
            'max'   => 50,
            'step'  => 1,
        ),
        'active_callback'   => 'sydney_header_custom_btn_active_callback'
    ) );

    //Custom header html
    $wp_customize->add_setting('sydney_options[info]', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new Sydney_Divider( $wp_customize, 'hcs_html_sep', array(
            'section' => 'sydney_menu_style',
            'settings' => 'sydney_options[info]',
            'priority' => 11,
            'active_callback' => 'sydney_header_custom_html_active_callback'
        ) )
    );     
    $wp_customize->add_setting(
        'header_custom_item_html',
        array(
            'sanitize_callback' => 'sydney_sanitize_text',
            'default'           => '<a href="#">Your content</a>',
        )       
    );
    $wp_customize->add_control( 'header_custom_item_html', array(
        'type'        => 'textarea',
        'priority'    => 11,
        'section'     => 'sydney_menu_style',
        'label'       => __('Custom HTML', 'sydney'),
        'active_callback'   => 'sydney_header_custom_html_active_callback'
    ) );

    }


    //Header image size
    $wp_customize->add_setting(
        'header_bg_size',
        array(
            'default'           => 'cover',
            'sanitize_callback' => 'sydney_sanitize_bg_size',
        )
    );
    $wp_customize->add_control(
        'header_bg_size',
        array(
            'type' => 'radio',
            'priority'    => 10,
            'label' => __('Header background size', 'sydney'),
            'section' => 'header_image',
            'choices' => array(
                'cover'     => __('Cover', 'sydney'),
                'contain'   => __('Contain', 'sydney'),
            ),
        )
    );
    //Header height
    $wp_customize->add_setting(
        'header_height',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '300',
        )       
    );
    $wp_customize->add_control( 'header_height', array(
        'type'        => 'number',
        'priority'    => 11,
        'section'     => 'header_image',
        'label'       => __('Header height [default: 300px]', 'sydney'),
        'input_attrs' => array(
            'min'   => 250,
            'max'   => 600,
            'step'  => 5,
        ),
    ) );
    //Disable overlay
    $wp_customize->add_setting(
        'hide_overlay',
        array(
            'sanitize_callback' => 'sydney_sanitize_checkbox',
        )       
    );
    $wp_customize->add_control(
        'hide_overlay',
        array(
            'type'      => 'checkbox',
            'label'     => __('Disable the overlay?', 'sydney'),
            'section'   => 'header_image',
            'priority'  => 12,
        )
    );    
    //Logo Upload
    $wp_customize->add_setting(
        'site_logo',
        array(
            'default-image' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'site_logo',
            array(
               'label'          => __( 'Upload your logo', 'sydney' ),
               'type'           => 'image',
               'section'        => 'title_tagline',
               'priority'       => 12,
            )
        )
    );

    //___Theme info___//
    $wp_customize->add_section(
        'sydney_themeinfo',
        array(
            'title' => __('Theme info', 'sydney'),
            'priority' => 139,
            'description' => '<p style="padding-bottom: 10px;border-bottom: 1px solid #d3d2d2">' . __('1. Documentation for Sydney can be found ', 'sydney') . '<a target="_blank" href="https://docs.athemes.com/category/8-sydney">here</a></p><p style="padding-bottom: 10px;border-bottom: 1px solid #d3d2d2">' . __('2. A full theme demo can be found ', 'sydney') . '<a target="_blank" href="https://demo.athemes.com/sydney-main/">here</a></p>',         
        )
    );
    $wp_customize->add_setting('sydney_theme_docs', array(
            'type'              => 'info_control',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new Sydney_Theme_Info( $wp_customize, 'documentation', array(
        'section' => 'sydney_themeinfo',
        'settings' => 'sydney_theme_docs',
        'priority' => 10
        ) )
    ); 

}
add_action( 'customize_register', 'sydney_customize_register' );

/**
 * Sanitize
 */
//Header type
function sydney_sanitize_layout( $input ) {
    $valid = array(
        'slider'    => __('Full screen slider', 'sydney'),
        'image'     => __('Image', 'sydney'),
        'core-video'=> __('Video', 'sydney'),
        'nothing'   => __('Nothing (only menu)', 'sydney')
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

//Background size
function sydney_sanitize_bg_size( $input ) {
    $valid = array(
        'cover'     => __('Cover', 'sydney'),
        'contain'   => __('Contain', 'sydney'),
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
//Footer widget areas
function sydney_sanitize_fw( $input ) {
    $valid = array(
        '1'     => __('One', 'sydney'),
        '2'     => __('Two', 'sydney'),
        '3'     => __('Three', 'sydney'),
        '4'     => __('Four', 'sydney')
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
//Sticky menu
function sydney_sanitize_sticky( $input ) {
    $valid = array(
        'sticky'     => __('Sticky', 'sydney'),
        'static'   => __('Static', 'sydney'),
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
//Blog Layout
function sydney_sanitize_blog( $input ) {
    $valid = array(
        'classic'    => __( 'Classic', 'sydney' ),
        'classic-alt'    => __( 'Classic (alternative)', 'sydney' ),
        'modern'    => __( 'Modern', 'sydney' ),
        'fullwidth'  => __( 'Full width (no sidebar)', 'sydney' ),
        'masonry-layout'    => __( 'Masonry (grid style)', 'sydney' )

    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
//Mobile slider
function sydney_sanitize_mslider( $input ) {
    $valid = array(
        'fullscreen'    => __('Full screen', 'sydney'),
        'responsive'    => __('Responsive', 'sydney'),
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
//Menu style
function sydney_sanitize_menu_style( $input ) {
    $valid = array(
        'inline'     => __('Inline', 'sydney'),
        'centered'   => __('Centered (menu and site logo)', 'sydney'),
    );
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
//Checkboxes
function sydney_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

function sydney_sanitize_font_weights( $input ) {
    if ( is_array( $input ) ) {
        return $input;
    }
}
function sydney_sanitize_header_custom_item( $input ) {
    if ( in_array( $input, array( 'nothing', 'button', 'html' ), true ) ) {
        return $input;
    }
}
function sydney_sanitize_menu_container( $input ) {
    if ( in_array( $input, array( 'container', 'fw-menu-container' ), true ) ) {
        return $input;
    }
}
/**
 * Selects
 */
function sydney_sanitize_selects( $input, $setting ){
          
    $input = sanitize_key($input);

    $choices = $setting->manager->get_control( $setting->id )->choices;
                      
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
      
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function sydney_customize_preview_js() {
	wp_enqueue_script( 'sydney_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20211026', true );
}
add_action( 'customize_preview_init', 'sydney_customize_preview_js' );

/**
 * Customizer assets
 */
function sydney_customize_footer_scripts() {
    
    wp_enqueue_style( 'sydney-customizer-styles', get_template_directory_uri() . '/css/customizer.css', '', '20211026' );
    wp_enqueue_script( 'sydney-customizer-scripts', get_template_directory_uri() . '/js/customize-controls.js', array( 'jquery', 'jquery-ui-core' ), '20211026', true );

}
add_action( 'customize_controls_print_footer_scripts', 'sydney_customize_footer_scripts' );




/**
 * Partials callbacks
 */
//Slider titles
function sydney_partial_slider_title_1() {
    return get_theme_mod('slider_title_1', __('Click the pencil icon to change this text','sydney'));
}
function sydney_partial_slider_title_2() {
    return get_theme_mod('slider_title_2');
}
function sydney_partial_slider_title_3() {
    return get_theme_mod('slider_title_3');
}
function sydney_partial_slider_title_4() {
    return get_theme_mod('slider_title_4');
}
function sydney_partial_slider_title_5() {
    return get_theme_mod('slider_title_5');
}
//Slider subtitles
function sydney_partial_slider_subtitle_1() {
    return get_theme_mod('slider_subtitle_1', __('or go to the Customizer','sydney'));
}
function sydney_partial_slider_subtitle_2() {
    return get_theme_mod('slider_subtitle_2');
}
function sydney_partial_slider_subtitle_3() {
    return get_theme_mod('slider_subtitle_3');
}
function sydney_partial_slider_subtitle_4() {
    return get_theme_mod('slider_subtitle_4');
}
function sydney_partial_slider_subtitle_5() {
    return get_theme_mod('slider_subtitle_5');
}
function sydney_partial_slider_button_text() {
    return get_theme_mod('slider_button_text');
}
//Header custom items active callbacks
function sydney_header_custom_btn_active_callback() {
    $type = get_theme_mod( 'header_button_html' );

    if ( 'button' == $type ) {
        return true;
    } else {
        return false;
    }
}

function sydney_header_custom_html_active_callback() {
    $type = get_theme_mod( 'header_button_html' );

    if ( 'html' == $type ) {
        return true;
    } else {
        return false;
    }
}