<?php
/**
 * ifource functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ifource
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'ifource_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ifource_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ifource, use a find and replace
		 * to change 'ifource' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ifource', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'ifource' ),
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
				'ifource_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'ifource_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ifource_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ifource_content_width', 640 );
}
add_action( 'after_setup_theme', 'ifource_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ifource_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'ifource' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ifource' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'ifource_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ifource_scripts() {
	wp_enqueue_style( 'ifource-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'ifource-style', 'rtl', 'replace' );

	wp_enqueue_script( 'ifource-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ifource_scripts' );

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




function custom_post_projects() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'Projecten', 'Post Type General Name', 'la-strada' ),
		'singular_name'       => _x( 'Project', 'Post Type Singular Name', 'la-strada' ),
		'menu_name'           => __( 'Projecten', 'la-strada' ),
		'parent_item_colon'   => __( 'Hoofd Project', 'la-strada' ),
		'all_items'           => __( 'Alle Projecten', 'la-strada' ),
		'view_item'           => __( 'Bekijk Project', 'la-strada' ),
		'add_new_item'        => __( 'Nieuwe Project', 'la-strada' ),
		'add_new'             => __( 'Voeg toe', 'la-strada' ),
		'edit_item'           => __( 'Bewerk Project', 'la-strada' ),
		'update_item'         => __( 'Update Project', 'la-strada' ),
		'search_items'        => __( 'Zoek Projecten', 'la-strada' ),
		'not_found'           => __( 'Niets gevonden', 'la-strada' ),
		'not_found_in_trash'  => __( 'Niets gevonden in prullenbak', 'la-strada' ),
	);

// Set other options for Custom Post Type

	$args = array(
		'label'               => __( 'projecten', 'la-strada' ),
		'description'         => __( 'projecten', 'la-strada' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', 'sticky', 'page-attributes' ),

		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => false,
    'menu_icon'           => 'dashicons-tag',
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
        'rewrite' => array('slug' => 'projecten'),
	);

	// Registering your Custom Post Type
	register_post_type( 'projects', $args );

}

add_action( 'init', 'custom_post_projects', 0 );





// http://www.jordancrown.com/multi-column-gravity-forms/
function gform_column_splits( $content, $field, $value, $lead_id, $form_id ) {
	if( !IS_ADMIN ) { // only perform on the front end

		// target section breaks
		if( $field['type'] == 'section' ) {
			$form = RGFormsModel::get_form_meta( $form_id, true );

			// check for the presence of multi-column form classes
			$form_class = explode( ' ', $form['cssClass'] );
			$form_class_matches = array_intersect( $form_class, array( 'two-column', 'three-column' ) );

			// check for the presence of section break column classes
			$field_class = explode( ' ', $field['cssClass'] );
			$field_class_matches = array_intersect( $field_class, array('gform_column') );

			// if field is a column break in a multi-column form, perform the list split
			if( !empty( $form_class_matches ) && !empty( $field_class_matches ) ) { // make sure to target only multi-column forms

				// retrieve the form's field list classes for consistency
				$form = RGFormsModel::add_default_properties( $form );
				$description_class = rgar( $form, 'descriptionPlacement' ) == 'above' ? 'description_above' : 'description_below';

				// close current field's li and ul and begin a new list with the same form field list classes
				return '</li></ul><ul class="gform_fields '.$form['labelPlacement'].' '.$description_class.' '.$field['cssClass'].'"><li class="gfield gsection empty">';

			}
		}
	}

	return $content;
}
add_filter( 'gform_field_content', 'gform_column_splits', 10, 5 );




function add_grav_forms(){
    $role = get_role('editor');
    $role->add_cap('gform_full_access');
}
add_action('admin_init','add_grav_forms');



if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Algemene instellingen',
		'menu_title'	=> 'Algemene instellingen',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));


}


/**
 * Filter the excerpt length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
add_filter( 'excerpt_length', function( $length ) { return 20; } );

/**
 * Change to read more.
 */
function tuzuki_excerpt_more($post) {
	return '<a href="'. get_permalink($post->ID) . '">' . ' ...' . '</a>';
}
add_filter('excerpt_more', 'tuzuki_excerpt_more');