<?php
/**
 * newspro Theme Customizer
 *
 * @package newspro
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
require get_template_directory() . '/inc/select/category-dropdown-custom-control.php';
function newspro_customize_preview_js() {
	wp_enqueue_script( 'newspro_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'newspro_customize_preview_js' );



/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
function newspro_customizer( $wp_customize ) {
    $wp_customize->add_section(
        'newspro_theme',
        array(
            'title' => __( 'Theme Options', 'newspro' ),
            'description' => __( 'This is a settings section.', 'newspro' ),
            'priority' => 15,
            'capability' => 'edit_theme_options',
        )
    );
    
	$wp_customize->add_setting(
    'theme_color_setting',
    array(
        	'default' => '#A9C131',
        	'sanitize_callback' => 'sanitize_hex_color',
			'capability' => 'edit_theme_options',
		 )
	);
	
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'theme_color_setting',
	        array(
	            'label' => __( 'Menu Border Color', 'newspro' ),
	            'section' => 'colors',
	            'settings' =>'theme_color_setting',
	        )
	    )
	);
	
$wp_customize->add_setting(
    'theme_body_color',
    array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options',
    )
	);
	
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'theme_body_color',
	        array(
	            'label' => __('Body text', 'newspro' ),
	            'section' => 'colors',
	            'settings' => 'theme_body_color',
	        )
	    )
	);


	$wp_customize->add_setting(
    'theme_cat_color',
    array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options',
    )
	);
	
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'theme_cat_color',
	        array(
	            'label' => __('Category text', 'newspro' ),
	            'section' => 'colors',
	            'settings' => 'theme_cat_color',
	        )
	    )
	);

	$wp_customize->add_setting(
    'theme_topheader_color',
    array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options',
    )
	);

	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'theme_topheader_color',
	        array(
	            'label' => __('Top Header', 'newspro' ),
	            'section' => 'colors',
	            'settings' => 'theme_topheader_color',
	        )
	    )
	);
	

	$wp_customize->add_setting(
    'theme_topheadertext_color',
    array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options',
    )
	);

	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'theme_topheadertext_color',
	        array(
	            'label' => __('Top Header Text', 'newspro' ),
	            'section' => 'colors',
	            'settings' => 'theme_topheadertext_color',
	        )
	    )
	);

	$wp_customize->add_setting(
    'theme_headersite_color',
    array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options',
    )
	);

	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'theme_headersite_color',
	        array(
	            'label' => __('Second Header', 'newspro' ),
	            'section' => 'colors',
	            'settings' => 'theme_headersite_color',
	        )
	    )
	);

	$wp_customize->add_setting(
    'theme_menu_color',
    array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options',
    )
	);

	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'theme_menu_color',
	        array(
	            'label' => __('Menu', 'newspro' ),
	            'section' => 'colors',
	            'settings' => 'theme_menu_color',
	        )
	    )
	);

	$wp_customize->add_setting(
    'theme_menutext_color',
    array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options',
    )
	);

	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'theme_menutext_color',
	        array(
	            'label' => __('Menu Text', 'newspro' ),
	            'section' => 'colors',
	            'settings' => 'theme_menutext_color',
	        )
	    )
	);
	
	$wp_customize->add_setting(
    'theme_breaking_color',
    array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options',
    )
	);

	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'theme_breaking_color',
	        array(
	            'label' => __('Breaking News', 'newspro' ),
	            'section' => 'colors',
	            'settings' => 'theme_breaking_color',
	        )
	    )
	);

	$wp_customize->add_setting(
    'theme_footer_color',
    array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options',
    )
	);

	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'theme_footer_color',
	        array(
	            'label' => __('Footer', 'newspro' ),
	            'section' => 'colors',
	            'settings' => 'theme_footer_color',
	        )
	    )
	);
$wp_customize->add_setting(
    'theme_footertext_color',
    array(
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability' => 'edit_theme_options',
    )
	);

	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'theme_footertext_color',
	        array(
	            'label' => __('Footer Text', 'newspro' ),
	            'section' => 'colors',
	            'settings' => 'theme_footertext_color',
	        )
	    )
	);

	


$wp_customize->add_setting( 'logo-upload' ,
	array(
		'sanitize_callback' == 'esc_url_raw',
		 'capability' => 'edit_theme_options',
	),
	array(
        'default' => '',
        
       
    ) );
 
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'logo-upload',
	        array(
	            'label' => __('Footer Logo Upload', 'newspro' ),
	            'section' => 'newspro_theme',
	            'settings' => 'logo-upload'
	        )
	    )
	);



/**
* header advertising image
**/


$header_info = array(
    'width'         => 980,
    'height'        => 60,
    'default-image' => get_template_directory_uri() . '/images/sunset.jpg',
);
add_theme_support( 'custom-header', $header_info );
 
$header_images = array(
    'newspro' => array(
            'url'           => get_template_directory_uri() . '/images/sunset.jpg',
            'thumbnail_url' => get_template_directory_uri() . '/images/sunset_thumbnail.jpg',
            'description'   => 'newspro',
    ),
    'flower' => array(
            'url'           => get_template_directory_uri() . '/images/flower.jpg',
            'thumbnail_url' => get_template_directory_uri() . '/images/flower_thumbnail.jpg',
            'description'   => 'Flower',
    ),  
);
register_default_headers( $header_images );

/**
* Categories dropdown control.
**/

    class newspro_Categories_Dropdown extends WP_Customize_Control {
        public function render_content() {
            $dropdown = wp_dropdown_categories(
                array(
                    'name'              => '_customize-dropdown-categories-' . $this->id,
                    'echo'              => 0,
                    'show_option_none'  => __( '&mdash; Select &mdash;', 'newspro' ),
                    'option_none_value' => '0',
                    'selected'          => $this->value(),
                )
            );
 
            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
 
            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $dropdown
            );
        }
    }

/**
* ___Carousel___.
**/
    
    $wp_customize->add_section(
        'newspro_carousel',
        array(
            'title' => __('Carousel', 'newspro'),
            'priority' => null
        )
    );
	/**
	* Display: Front page.
	**/
    
    $wp_customize->add_setting(
        'carousel_display_front',
        array(
            'sanitize_callback' => 'newspro_sanitize_checkbox',
            'capability'        => 'edit_theme_options',
            'default' => 1,         
        )       
    );
    $wp_customize->add_control(
        'carousel_display_front',
        array(
            'type' => 'checkbox',
            'label' => __('Show carousel on front page?', 'newspro'),
            'section' => 'newspro_carousel',
            'priority' => 8,           
        )
    );
    /**
	* Display: Home and archives.
	**/
   
    $wp_customize->add_setting(
        'carousel_display_archives',
        array(
            'sanitize_callback' => 'newspro_sanitize_checkbox',
            'capability'        => 'edit_theme_options',
            'default' => 1,         
        )       
    );
    $wp_customize->add_control(
        'carousel_display_archives',
        array(
            'type' => 'checkbox',
            'label' => __('Show carousel on blog index/archives/etc?', 'newspro'),
            'section' => 'newspro_carousel',
            'priority' => 9,           
        )
    );
     /**
	* Display: Singular
	**/
    
    $wp_customize->add_setting(
        'carousel_display_singular',
        array(
            'sanitize_callback' => 'newspro_sanitize_checkbox',
            'capability'        => 'edit_theme_options',
            'default' => 0,         
        )       
    );
    $wp_customize->add_control(
        'carousel_display_singular',
        array(
            'type' => 'checkbox',
            'label' => __('Show carousel on single posts and pages?', 'newspro'),
            'section' => 'newspro_carousel',
            'priority' => 10,           
        )
    );  
     /**
	* Category
	**/  
    
    $wp_customize->add_setting( 'carousel_cat', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    ) );
    
    $wp_customize->add_control( new newspro_Categories_Dropdown( $wp_customize, 'carousel_cat', array(
        'label'     => __('Select which category to show in the carousel', 'newspro'),
        'section'   => 'newspro_carousel',
        'settings'  => 'carousel_cat',
        'priority'  => 11
    ) ) );
     /**
	* Autoplay speed
	**/ 
    
    $wp_customize->add_setting(
        'carousel_speed',
        array(
            'default'           => '4000',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'newspro_sanitize_int',
        )
    );
    $wp_customize->add_control(
        'carousel_speed',
        array(
            'label'     => __('Enter the carousel speed in miliseconds [Default: 4000]', 'newspro'),
            'section'   => 'newspro_carousel',
            'type'      => 'text',
            'priority'  => 13
        )
    );  
     /**
	* Number of posts
	**/        
    
    $wp_customize->add_setting(
        'carousel_number',
        array(
            'default'           => '6',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'newspro_sanitize_int',
        )
    );
    $wp_customize->add_control(
        'carousel_number',
        array(
            'label'     => __('Enter the number of posts you want to show', 'newspro'),
            'section'   => 'newspro_carousel',
            'type'      => 'text',
            'priority'  => 12
        )
    );

	/**
	*Social Media links 
	**/

	$wp_customize->add_setting(
    'facebook_link',
    array(
		'sanitize_callback' == 'esc_url_raw',
		 'capability' => 'edit_theme_options',
	),
    array(
    
        'default' => '',
        
    )
	);
	
	$wp_customize->add_control(
	    'facebook_link',
	    array(
	        'label' => __('Facebook Link', 'newspro' ),
	        'section' => 'newspro_theme',
	        'type' => 'text',
	    )
	);
	
	$wp_customize->add_setting(
   		'twitter_link',
	    array(
			'sanitize_callback' == 'esc_url_raw',
			 'capability' => 'edit_theme_options',
		),
	    array(
	        'default' => '',
	    )
	);
	$wp_customize->add_control(
	    'twitter_link',
	    array(
	        'label' => __('Twitter Link', 'newspro' ),
	        'section' => 'newspro_theme',
	        'type' => 'text',
	    )
	);
	$wp_customize->add_setting(
   		'pinterest_link',
	    array(
			'sanitize_callback' == 'esc_url_raw',
			 'capability' => 'edit_theme_options',
		),
	    array(
	        'default' => '',
	    )
	);
	$wp_customize->add_control(
	    'pinterest_link',
	    array(
	        'label' => __('Pinterest Link', 'newspro' ),
	        'section' => 'newspro_theme',
	        'type' => 'text',
	    )
	);
	$wp_customize->add_setting(
    	'googleplus_link',
	 	array(
		'sanitize_callback' == 'esc_url_raw',
		 'capability' => 'edit_theme_options',
		),
	    array(
	        'default' => '',
	    )
	);
	$wp_customize->add_control(
	    'googleplus_link',
	    array(
	        'label' => __('Google Plus Link', 'newspro' ),
	        'section' => 'newspro_theme',
	        'type' => 'text',
	    )
	);
		$wp_customize->add_setting(
    	'vimeo_link',
	 	array(
		'sanitize_callback' == 'esc_url_raw',
		 'capability' => 'edit_theme_options',
		),
	    array(
	        'default' => '',
	    )
	);
	$wp_customize->add_control(
	    'vimeo_link',
	    array(
	        'label' => __('Vimeo Link', 'newspro' ),
	        'section' => 'newspro_theme',
	        'type' => 'text',
	    )
	);
	$wp_customize->add_setting(
	    'youtube_link',
	     array(
			'sanitize_callback' == 'esc_url_raw',
			 'capability' => 'edit_theme_options',
		),
	    array(
	        'default' => '',
	    )
	);
	$wp_customize->add_control(
	    'youtube_link',
	    array(
	        'label' => __('Youtube Link', 'newspro' ),
	        'section' => 'newspro_theme',
	        'type' => 'text',
	    )
	);
	
	$wp_customize->add_setting(
    	'linkedin_link',
	     array(
			'sanitize_callback' == 'esc_url_raw',
			 'capability' => 'edit_theme_options',
		),
	    array(
	        'default' => '',
	    )
	);
	
	$wp_customize->add_control(
	    'linkedin_link',
	    array(
	        'label' => __('Linkedin Link', 'newspro' ),
	        'section' => 'newspro_theme',
	        'type' => 'text',
	    )
	);

		$wp_customize->add_setting(
    	'rss_link',
	     array(
			'sanitize_callback' == 'esc_url_raw',
			 'capability' => 'edit_theme_options',
		),
	    array(
	        'default' => '',
	    )
	);
	
	$wp_customize->add_control(
	    'rss_link',
	    array(
	        'label' => __('Rss Link', 'newspro' ),
	        'section' => 'newspro_theme',
	        'type' => 'text',
	    )
	);

 /**
	* Home Two Coloumn Category Dropdown Section 
	**/
 	
		$wp_customize->add_section('three_cols_section',array(
			'title'	=> __('Homepage Two Coloumn Section','newspro'),
			'description'	=> __('Select Categories from the Dropdowns','newspro'),
			'priority'	=> 14
		));
	 /**
	* Title First Column Section 
	**/
		
		$wp_customize->add_setting(
    'leftsection_textbox',
    array( 'sanitize_callback' == 'sanitize_text_field',
      	'capability' => 'edit_theme_options',
      	),
    array(
        'default' => '',
    )
	);
	
	$wp_customize->add_control(
	    'leftsection_textbox',
	    array(
	        'label' => __('First Section Title', 'newspro' ),
	        'section' => 'three_cols_section',
	        'type' => 'text',
	    )
	);
	 /**
	* Add a category dropdown First Coloumn 
	**/
		      
        $wp_customize->add_setting( 'leftsection', array(
			'sanitize_callback'	=> 'esc_textarea'
        ) );
        $wp_customize->add_control( new newspro_Category_Dropdown_Custom_Control( $wp_customize, 'leftsection', array(
            'label'   => __('Select Category for First Column Section','newspro'),
            'section' => 'three_cols_section',
            'settings'   => 'leftsection',            
        ) ) );
 /**
	* Title Section Coloumn 
	**/
 
             $wp_customize->add_setting(
    'rightsection_textbox',
    array( 'sanitize_callback' == 'sanitize_text_field',
      	'capability' => 'edit_theme_options',
      	),
    array(
        'default' => '',
    )
	);
	
	$wp_customize->add_control(
	    'rightsection_textbox',
	    array(
	        'label' => __('Second Section Title', 'newspro' ),
	        'section' => 'three_cols_section',
	        'type' => 'text',
	    )
	);
	

/**
	* Add a category dropdown Second Coloumn 
	**/
	
		$wp_customize->add_setting( 'rightsection', array(
			'sanitize_callback'	=> 'esc_textarea'
        ) );
        $wp_customize->add_control( new newspro_Category_Dropdown_Custom_Control( $wp_customize, 'rightsection', array(
            'label'   => __('Select Category for Second Column Section','newspro'),
            'section' => 'three_cols_section',
            'settings'   => 'rightsection',            
        ) ) );		
		
/**
	* Hide Two Column Section
	**/
	 
				
		$wp_customize->add_setting('hide_categorysec',array(
				'default' => true,
				'sanitize_callback' => 'sanitize_text_field',
				'capability' => 'edit_theme_options',
		));	 
	
		$wp_customize->add_control( 'hide_categorysec', array(
			   'settings' => 'hide_categorysec',
			   'section'   => 'three_cols_section',
			   'label'     => __('Uncheck This Option To Display This Section','newspro'),
			   'type'      => 'checkbox'
		 ));	
 
		
	/**
	*Footer Copyright
	**/
	$wp_customize->add_setting(
    'copyright_textbox',
    array( 'sanitize_callback' == 'sanitize_text_field',
      	'capability' => 'edit_theme_options',
      	),
    array(
        'default' => '&copy; 2015',
    )
	);
	
	$wp_customize->add_control(
	    'copyright_textbox',
	    array(
	        'label' => __('Copyright text', 'newspro' ),
	        'section' => 'newspro_theme',
	        'type' => 'text',
	    )
	);
	
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	

	$wp_customize->add_panel( 'newspro_home_featured', array(
			'priority'       => 10,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __( 'Home Page Slider', 'newspro' ),
			'description'    => __( 'Home Page Slider Panel', 'newspro' ),
		) );
		
		/**
		*slider
		**/
		$wp_customize->add_section( 'newspro_slider_section' , array(
			'title'       => __( 'Slider', 'newspro' ),
			'priority'    => 20,
			'description' => __( 'Slider Option', 'newspro' ),
			'panel'  => 'newspro_home_featured',
		) );
	
		$wp_customize->add_setting('newspro_display_slider_setting', array(
			'default'        => 0,
			'sanitize_callback' => 'newspro_sanitize_checkbox',
		));
	
		$wp_customize->add_control('newspro_display_slider_control', array(
			'settings' => 'newspro_display_slider_setting',
			'label'    => __('Display Slider', 'newspro'),
			'section'  => 'newspro_slider_section',
			'type'     => 'checkbox',
			'priority'	=> 24
		));
	
				
		$categories = get_categories();
				$cats = array();
				$i = 0;
				foreach($categories as $category){
					if($i==0){
						$default = $category->slug;
						$i++;
					}
					$cats[$category->slug] = $category->name;
				}
		
		/**
		* Select Box               
		**/ 
		$wp_customize->add_setting('newspro_slide_category_setting', array(
			'default' => '',
			'sanitize_callback' => 'newspro_sanitize_category',
		));
	
		$wp_customize->add_control('newspro_slide_category_control', array(
			'settings' => 'newspro_slide_category_setting',
			'type' => 'select',
			'label' => __('Select Category:', 'newspro'),
			'section' => 'newspro_slider_section',
			'choices' => $cats,
			'priority'	=> 24
		));
		/**
		* Set Speed              
		**/ 
		 
		$wp_customize->add_setting( 'newspro_slider_speed_setting', array (
			'default' => '6000',
			'sanitize_callback' => 'newspro_sanitize_integer',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'newspro_slider_speed', array(
			'label'    => __( 'Slider Speed (milliseconds)', 'newspro' ),
			'section'  => 'newspro_slider_section',
			'settings' => 'newspro_slider_speed_setting',
			'priority'	=> 24
		) ) );

}


add_action( 'customize_register', 'newspro_customizer' );


add_action( 'wp_head', 'newspro_styles' );
function newspro_styles() {
	$theme_color = esc_attr(get_theme_mod("theme_color_setting"));
	$theme_body_color = esc_attr(get_theme_mod("theme_body_color"));
	$theme_cat_color = esc_attr(get_theme_mod("theme_cat_color"));
	$theme_topheader_color = esc_attr(get_theme_mod("theme_topheader_color"));
	$theme_topheadertext_color = esc_attr(get_theme_mod("theme_topheadertext_color"));
	$theme_headersite_color = esc_attr(get_theme_mod("theme_headersite_color"));
	$theme_menu_color = esc_attr(get_theme_mod("theme_menu_color"));
	$theme_menutext_color = esc_attr(get_theme_mod("theme_menutext_color"));
	$theme_breaking_color = esc_attr(get_theme_mod("theme_breaking_color"));
	$theme_footer_color = esc_attr(get_theme_mod("theme_footer_color"));
        $theme_footertext_color = esc_attr(get_theme_mod("theme_footertext_color"));
	?>
  <style type="text/css">
.navbar-inverse {
    background-color: <?php echo $theme_menu_color;?> !important;
border-color: <?php echo $theme_menu_color;?> !important;

    
}
.dropdown-menu{
background-color: <?php echo $theme_menu_color;?> !important;
color: <?php echo $theme_menutext_color;?>!important;
}
    .navbar-inverse .navbar-nav>li>a{
color: <?php echo $theme_menutext_color;?> !important;
}
.navbar-inverse .navbar-nav>.active>a, .navbar-inverse .navbar-nav>.active>a:hover, .navbar-inverse .navbar-nav>.active>a:focus{
background-color: <?php echo $theme_menu_color;?> !important;
color: <?php echo $theme_menutext_color;?>!important;
}
.navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:hover{

background-color: <?php echo $theme_menu_color;?> !important;
}
.dropdown-menu>li>a{
color: <?php echo $theme_menutext_color;?>!important;
}

 .dropdown-menu {
	  border-top: 5px solid <?php echo $theme_color;?> !important;
	  
}
	  .main_nav, .main_nav .sf-menu .sub-menu{    border-top: 3px solid <?php echo $theme_color;?>; margin-top: -3px;}
	  .main_nav .sf-menu .sub-menu:before{
		      border-bottom-color: <?php echo $theme_color;?>;
	  }
	  .byline .cat-links a, .gum_post_data ul li.cat, .gum_post_block_meta ul li.cat, .gum_post_block_meta ul li.cat{
		  background: <?php echo $theme_color;?>;
		   color: <?php echo $theme_cat_color;?>;

	  }

	  nav.main_nav {
	  	background: <?php echo $theme_menu_color; ?>;

    
	  }
	  .gum_post_data ul li.cat a, .gum_post_block_meta ul li.cat a, .gum_post_block_meta ul li.cat a{
		 		   color: <?php echo $theme_cat_color;?>;
	  }

	  .main_nav .sf-menu li{
	  	background: <?php echo $theme_menu_color; ?>;

	  }
	  .top_header{
	  	background: <?php echo $theme_topheader_color; ?>;
	  }
	  .top_nav ul li a{
		color: <?php echo $theme_topheadertext_color; ?>;


}
	  .header-site{
	  	background: <?php echo $theme_headersite_color; ?>;

	  }
			  .breaking-news {
		    background: <?php echo $theme_breaking_color; ?>;
		}

.footer-site{
background: <?php echo $theme_footer_color; ?>;

}
.main_nav .sf-menu a{
	color: <?php echo $theme_menutext_color; ?>;
}
.main_nav  .sf-menu > li > a:hover{
color: <?php echo $theme_menutext_color; ?>;
}
.main_nav  .sf-menu > li.menu-item-has-children > a:after{
color: <?php echo $theme_menutext_color; ?>;
}
.top_bar .sf-arrows .sf-with-ul:hover{
color: <?php echo $theme_menutext_color; ?>;
}
.site-footer{
	
	color:<?php echo $theme_footertext_color; ?> !important;
}
.site-footer a{
	color:<?php echo $theme_footertext_color; ?> !important;
}
.footer-bottom{
	color:<?php echo $theme_footertext_color; ?> !important;
}
.entry-content{
color:<?php echo $theme_body_color; ?>;
}
.b-detail{
color:<?php echo $theme_body_color; ?>;
}

.entry-header a{
color:<?php echo $theme_body_color; ?> !important;
}
 </style>
  
<?php
}




/**
 * Sanitize checkbox
 */

if (!function_exists( 'newspro_sanitize_checkbox' ) ) :
	function newspro_sanitize_checkbox( $input ) {
		if ( $input != 1 ) {
			return 0;
		} else {
			return 1;
		}
	}
endif;

if ( ! function_exists( 'newspro_sanitize_category' ) ){
	function newspro_sanitize_category( $input ) {
		$categories = get_categories();
		$cats = array();
		$i = 0;
		foreach($categories as $category){
			if($i==0){
				$default = $category->slug;
				$i++;
			}
			$cats[$category->slug] = $category->name;
		}
		$valid = $cats;

		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';

		}
	}
}

function newspro_sanitize_text_field( $str ) {

	return sanitize_text_field( $str );

}



