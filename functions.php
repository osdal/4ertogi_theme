<?php
/**
 * DreamFreelanser functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package DreamFreelanser
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dreamfreelanser_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on DreamFreelanser, use a find and replace
		* to change 'dreamfreelanser' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'dreamfreelanser', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'dreamfreelanser' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'dreamfreelanser_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'dreamfreelanser_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dreamfreelanser_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dreamfreelanser_content_width', 640 );
}
add_action( 'after_setup_theme', 'dreamfreelanser_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dreamfreelanser_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'dreamfreelanser' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'dreamfreelanser' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'dreamfreelanser_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dreamfreelanser_scripts() {
	wp_enqueue_style( 'dreamfreelanser-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'my-style', get_template_directory_uri() . '/assets/css/style.min.css', array(), _S_VERSION );
	wp_style_add_data( 'dreamfreelanser-style', 'rtl', 'replace' );

	wp_enqueue_script( 'dreamfreelanser-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dreamfreelanser_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

## Добавляет ссылку на страницу всех настроек в пункт меню админки "Настройки"
// add_action('admin_menu', 'all_settings_link');
// function all_settings_link(){
// 	add_options_page( __('All Settings'), __('All Settings'), 'manage_options', 'options.php?foo' );
// }

// add_action( 'admin_head', function () {
// 	if ( ! current_user_can( 'manage_options' ) ) {
// 		remove_action( 'admin_notices', 'update_nag', 3 );
// 		remove_action( 'admin_notices', 'maintenance_nag', 10 );
// 	}
// } );

# Отключаем пинги на свои же посты
// add_action( 'pre_ping', 'kama_disable_inner_ping' );
// function kama_disable_inner_ping( & $links ){

// 	foreach( $links as $k => $val ){
// 		if( false !== strpos( $val, str_replace('www.', '', $_SERVER['HTTP_HOST']) ) )
// 			unset( $links[$k] );
// 	}
// }

## Удаление файлов license.txt и readme.html для защиты
## ver 2
// if( is_admin() && ! defined('DOING_AJAX') ){
// 	add_action( 'init', 'remove_license_txt_readme_html' );
// 	function remove_license_txt_readme_html(){

// 		$license_file = ABSPATH .'/license.txt';
// 		$readme_file  = ABSPATH .'/readme.html';

// 		if( file_exists($license_file) && current_user_can('manage_options') ){

// 			$deleted = unlink($license_file) && unlink($readme_file);

// 			if( ! $deleted  )
// 				$GLOBALS['readmedel'] = 'Не удалось удалить файлы: license.txt и readme.html из папки `'. ABSPATH .'`. Удалите их вручную!';
// 			else
// 				$GLOBALS['readmedel'] = 'Файлы: license.txt и readme.html удалены из из папки `'. ABSPATH .'`.';

// 			add_action( 'admin_notices', function(){
// 				echo '<div class="error is-dismissible"><p>'. $GLOBALS['readmedel'] .'</p></div>';
// 			} );
// 		}
// 	}
// }

// add_action( 'admin_menu', 'add_user_menu_bubble' );
// function add_user_menu_bubble(){
// 	global $menu;

// 	// записи
// 	$count = wp_count_posts()->pending; // на утверждении
// 	if( $count ){
// 		foreach( $menu as $key => $value ){
// 			if( $menu[$key][2] == 'edit.php' ){
// 				$menu[$key][0] .= ' <span class="awaiting-mod"><span class="pending-count">' . $count . '</span></span>';
// 				break;
// 			}
// 		}
// 	}
// }

/*
Подключение файла страницы настроек темы
*/
require get_template_directory() . '/inc/admin-functions.php';