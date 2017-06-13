<?php
/**
 * newspro functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package newspro
 */




if ( ! function_exists( 'newspro_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function newspro_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on newspro, use a find and replace
     * to change 'newspro' to the name of your theme in all the template files.
     */
    
    /**
    * Add default posts and comments RSS feed links to head.
    */
    add_theme_support( 'automatic-feed-links' );
    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for custom logo.
     *
     *  @since newspro 1.2
     */
    add_theme_support( 'custom-logo', array(
        'height'      => 240,
        'width'       => 240,
        'flex-height' => true,
    ) );


    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );
    add_image_size('newspro-large-thumb', 730);
    add_image_size('newspro-carousel-thumb', 410, 260, true);
    add_image_size('newspro-medium-thumb', 435);
    add_image_size('newspro-small-thumb', 80, 60, true);

   add_image_size( 'newspro-related', 220, 170, true);

/*
     * This theme styles the visual editor to resemble the theme style,
     * specifically font, colors, icons, and column width.
     */
    add_editor_style( array( 'assets/css/custom-editor-style.css', newspro_fonts_url() ) );


    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );
    /*
     * Set up the WordPress core custom background feature.
     */
    add_theme_support( 'custom-background', apply_filters( 'newspro_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) ) );

/**
  * This theme uses wp_nav_menu() in one location.
  */
    register_nav_menus(array(

    'primary' => __('Primary Menu', 'newspro'),
    'top' => __('Top Menu', 'newspro'),
    'footer' => __('Footer Menu', 'newspro')
        ));


    
}
endif;
add_action( 'after_setup_theme', 'newspro_setup' );





/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function newspro_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'newspro_content_width', 640 );
}
add_action( 'after_setup_theme', 'newspro_content_width', 0 );




/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function newspro_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
    }
}
add_action( 'wp_head', 'newspro_pingback_header' );

 

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function newspro_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'newspro'),
        'id' => 'newspro-sidebar-1',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => esc_html__('Homepage Main', 'newspro'),
        'id' => 'newspro-homepage-main',
        'description' => '',
        'before_widget' => '<div class="homepage_main home_main_widget" id="">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));
      register_sidebar(array(
        'name' => sprintf(esc_html_x('Home %d - 1/3 Width', 'widget area name', 'newspro'), 3), 
        'id' => 'home-3', 'description' => esc_html__('Widget area on homepage.', 'newspro'), 
        'before_widget' => '<div id="%1$s" class="popo-widget popo-home-3 %2$s">', 
        'after_widget' => '</div>', 
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => sprintf(esc_html_x('Home %d - 1/3 Width', 'widget area name', 'newspro'), 4), 
        'id' => 'home-4', 'description' => esc_html__('Widget area on homepage.', 'newspro'), 
        'before_widget' => '<div id="%1$s" class="popo-widget popo-home-4 %2$s">', 
        'after_widget' => '</div>', 
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));
  register_sidebar(array(
        'name' => esc_html__('Homepage Main 2', 'newspro'),
        'id' => 'newspro-homepage-main-2',
        'description' => '',
        'before_widget' => '<div class="homepage_main home_main_widget" id="">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => esc_html__('Newspro Sidebar', 'newspro'),
        'id' => 'newspro-homepage-sidebar',
        'description' => '',
        'before_widget' => '<div class="widget pop_widget pop_home_sidebar" id="">',
        'after_widget' => '</div>',
        'before_title' => '<div class="pop_post_news_header"> <div class="news_heading"><h3 class="widget-title">',
        'after_title' => '</h3></div></div>'
    ));

    /** 
    ** Footer Widgets 
    *****/
    register_sidebar(array(
        'name' => esc_html__('Footer 1', 'newspro'),
        'id' => 'newspro-footer-1',
        'description' => '',
        'before_widget' => '<div class="widget pop_footer_widget" id="">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="footer-widget-title">',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer 2', 'newspro'),
        'id' => 'newspro-footer-2',
        'description' => '',
        'before_widget' => '<div class="widget pop_footer_widget" id="">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="footer-widget-title">',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => esc_html__('Footer 3', 'newspro'),
        'id' => 'newspro-footer-3',
        'description' => '',
        'before_widget' => '<div class="widget pop_footer_widget" id="">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="footer-widget-title">',
        'after_title' => '</h3>'
    ));
  
 
    register_widget( 'newspro_random_post_widgets' );

}
add_action('widgets_init', 'newspro_widgets_init');


require get_template_directory() . "/inc/widgets/newspro-random-posts.php";
/**
 * Load widget featured post.
 */
require get_template_directory() . '/inc/widgets/newspro-featured-post.php';
/**
 * Enqueue scripts and styles.
 */


if ( ! function_exists( 'newspro_fonts_url' ) ) :
/**
 * Register Google fonts for newspro.
 *
 * Create your own newspro_fonts_url() function to override in a child theme.
 *
 * @since newspro 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function newspro_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'latin,latin-ext';

    /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
    if ( 'off' !== _x( 'on', 'LibreFranklin font: on or off', 'newspro' ) ) {
        $fonts[] = 'Libre+Franklin:300,400,500,700,900';
    }

   

    if ( $fonts ) {
        $fonts_url = add_query_arg( array(
            'family' => urlencode( implode( '|', $fonts ) ),
            'subset' => urlencode( $subsets ),
        ), 'https://fonts.googleapis.com/css' );
    }

    return $fonts_url;
}
endif;



function newspro_scripts() {
    //jQuery
    wp_enqueue_style( 'newspro-style', get_stylesheet_uri() );
    
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css');
  
    
    wp_enqueue_style( 'newspro-main-style', get_template_directory_uri().'/assets/css/responsive.css');
    wp_enqueue_style( 'jquery-flexslider', get_template_directory_uri() .'/assets/css/flexslider.css' );
    wp_enqueue_script( 'jquery-flexslider', get_template_directory_uri() . '/assets/js/jquery.flexslider.js', array('jquery') );
    wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/assets/js/imagesloaded.min.js', array('jquery'), '', true );         
    wp_enqueue_script( 'nivo-script', get_template_directory_uri() . '/assets/js/jquery.nivo.slider.js', array('jquery') );
    wp_enqueue_script( 'newspro-custom_js', get_template_directory_uri() . '/assets/js/custom.js' ); 
    

    wp_enqueue_script('dropdown', get_template_directory_uri() . '/assets/js/hover-dropdown.min.js', array('jquery'), null, true);
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array());
    wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/assets/js/bootstrap.js', array(), true );
    wp_enqueue_style( 'jquery-owl-carousel', get_template_directory_uri().'/assets/js/owl.carousel.css' );
    wp_enqueue_script( 'jquery-owl-carousel', get_template_directory_uri().'/assets/js/owl.carousel.js', array('jquery') );

    $newspro_slider_speed = 6000;
    if ( get_theme_mod( 'newspro_slider_speed_setting' ) ) {
        $newspro_slider_speed = get_theme_mod( 'newspro_slider_speed_setting' ) ;
    }
    wp_localize_script( "newspro_custom-js", "newspro_slider_speed", array('vars' => $newspro_slider_speed) );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

}
add_action( 'wp_enqueue_scripts', 'newspro_scripts' );






/*-----------------------------------------------------------------------------------*/
# @ Get popo Custom Thumbnail Resizer
/*-----------------------------------------------------------------------------------*/

function newspro_thumbnail($pagename, $imgtype = '', $the_thumb=''){
    if($pagename == 'related'){
        $the_thumb = 'newspro-related';
        $size = array(220,170);
    }
    if ( has_post_thumbnail() ) {
        if($imgtype){ ?>
            <a class="newspro-thumb <?php echo $imgtype; ?>" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php
            if ( get_theme_mod('resizer_enable')) { 
                newspro_thumb();
            } else {
                the_post_thumbnail($the_thumb, array('alt' => get_the_title()));
            } ?>
            <span class="fa overlay-icon"></span>
            </a>
        <?php }else{ ?> 
            <a class="newspro-thumb" href="<?php the_permalink(); ?>" ><?php
            if ( get_theme_mod('resizer_enable')) { 
                newspro_thumb();
            } else {
                the_post_thumbnail($the_thumb, array('alt' => get_the_title(), 'title' => get_the_title()));
            } ?>
            </a>
    <?php }
    }   
}
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
/**
 * Load the carousel
 */
require get_template_directory() . '/inc/carousel.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
/**
 * Load custom widgets.
 */
require get_template_directory() . '/inc/newspro_widgets.php';
/*-----------------------------------------------------------------------------------*/
# Get Principal Theme Functions and files
/*-----------------------------------------------------------------------------------*/
require get_template_directory() . '/inc/options/related.php' ;
require get_template_directory() . '/inc/options/popo-includes.php' ;
require get_template_directory() . '/inc/options/post-nav.php' ;
/**
 * Load TGMPA Configs.
 */
require get_template_directory() . '/inc/tgm-plugin-activation/class-tgm-plugin-activation.php' ;
require get_template_directory() . '/inc/tgm-plugin-activation/tgmpa-newspro.php' ;

/**
 * Load Bootstrap Menu.
 */


if ( ! class_exists( 'wp_bootstrap_navwalker' )) {
    require get_template_directory() . '/inc/wp-bootstrap-navwalker/wp-bootstrap-navwalker.php';
}



