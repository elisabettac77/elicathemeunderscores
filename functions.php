<?php

/**
 * elicathemeunderscores functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package elicathemeunderscores
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function elicathemeunderscores_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on elicathemeunderscores, use a find and replace
		* to change 'elicathemeunderscores' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('elicathemeunderscores', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'elicathemeunderscores'),
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'elicathemeunderscores_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

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

	/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
	add_theme_support(
		'post-formats',
		array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'status',
			'audio',
		)
	);
}
add_action('after_setup_theme', 'elicathemeunderscores_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function elicathemeunderscores_content_width()
{
	$GLOBALS['content_width'] = apply_filters('elicathemeunderscores_content_width', 640);
}
add_action('after_setup_theme', 'elicathemeunderscores_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function elicathemeunderscores_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'elicathemeunderscores'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'elicathemeunderscores'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'elicathemeunderscores_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function elicathemeunderscores_scripts()
{
	wp_enqueue_style('elicathemeunderscores-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('elicathemeunderscores-style', 'rtl', 'replace');

	wp_enqueue_script('elicathemeunderscores-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'elicathemeunderscores_scripts');

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
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Register Portfolio CPT, custom filelds, taxonomies &shortcode for carousel display
 */
add_action('init', 'register_portfolio_cpt');

function register_portfolio_cpt()
{

	$labels = array(
		'name'                => __('Portfolio Items'),
		'singular_name'       => __('Portfolio Item'),
		'menu_name'           => __('Portfolio'),
		'parent_item_colon'   => __('Parent Portfolio Item:'),
		'all_items'           => __('All Portfolio Items'),
		'view_item'           => __('View Portfolio Item'),
		'add_new_item'        => __('Add New Portfolio Item'),
		'add_new'             => __('Add New'),
		'edit_item'           => __('Edit Portfolio Item'),
		'update_item'         => __('Update Portfolio Item'),
		'search_items'        => __('Search Portfolio Items'),
		'not_found'           => __('No portfolio items found'),
		'not_found_in_trash'  => __('No portfolio items found in Trash'),
	);

	$args = array(
		'labels'              => $labels,
		'public'              => true,
		'has_archive'          => true,
		'rewrite'             => array('slug' => 'portfolio'),
		'menu_icon'           => 'dashicons-portfolio',
		'supports'            => array('title', 'editor', 'thumbnail'),
	);

	register_post_type('portfolio', $args);
}

// Register custom fields (optional, but provides some benefits)
add_action('init', 'register_portfolio_custom_fields');

function register_portfolio_custom_fields()
{
	$args = array(
		'type' => 'string',
		'single' => true,
		'show_in_rest' => true, // Optional: Allow editing through REST API
	);
	register_meta('post', 'portfolio_website_link', $args);
	register_meta('post', 'portfolio_customer', $args);
}

// Register the metabox
add_action('add_meta_boxes', 'register_portfolio_meta_box');

function register_portfolio_meta_box()
{
	add_meta_box(
		'portfolio_link_meta_box',
		__('Project Information'),
		'display_portfolio_link_meta_box',
		'portfolio',
		'normal',
		'high'
	);
}

function display_portfolio_link_meta_box($post)
{
?>
	<label for="portfolio_website_link">Client Website Link:</label>
	<input type="url" id="portfolio_website_link" name="portfolio_website_link" value="<?php echo esc_url(get_post_meta($post->ID, 'portfolio_website_link', true)); ?>">

	<h2><?php esc_html_e('Project Customer'); ?></h2>
	<label for="portfolio_customer">Customer Name:</label>
	<input type="text" id="portfolio_customer" name="portfolio_customer" value="<?php echo esc_attr(get_post_meta($post->ID, 'portfolio_customer', true)); ?>">

<?php
}

// Save the custom field data with sanitisation and validation
add_action('save_post', 'save_portfolio_meta_data', 10, 2); // Priority 10, second parameter is post object

function save_portfolio_meta_data($post_id, $post)
{

	// Check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	// Check permissions
	if (!current_user_can('edit_post', $post_id)) {
		return;
	}

	// Sanitize and validate client website link (check if key exists first)
	$website_link = '';
	if (isset($_POST['portfolio_website_link'])) {
		$website_link = sanitize_url($_POST['portfolio_website_link']);
		if (!filter_var($website_link, FILTER_VALIDATE_URL)) {
			$website_link = ''; // Set to empty string if not a valid URL
			add_action('admin_notices', function () {
				echo '<div class="error"><p>Invalid website link provided.</p></div>';
			});
		}
	}
	update_post_meta($post_id, 'portfolio_website_link', $website_link);

	// Sanitize customer name (check if key exists first)
	$customer_name = '';
	if (isset($_POST['portfolio_customer'])) {
		$customer_name = sanitize_text_field($_POST['portfolio_customer']);
	}
	update_post_meta($post_id, 'portfolio_customer', $customer_name);
}


add_action('init', 'register_portfolio_taxonomies');

function register_portfolio_taxonomies()
{

	$labels = array(
		'name'                       => __('Portfolio Categories'),
		'singular_name'              => __('Portfolio Category'),
		'menu_name'                   => __('Categories'),
		'all_items'                   => __('All Categories'),
		'edit_item'                   => __('Edit Category'),
		'update_item'                 => __('Update Category'),
		'add_new_item'                => __('Add New Category'),
		'new_item_name'               => __('New Category Name'),
		'parent_item'                 => __('Parent Category'),
		'parent_item_colon'           => __('Parent Category:'),
		'search_items'                => __('Search Categories'),
		'popular_items'               => __('Popular Categories'),
		'separate_items_with_commas'  => __('Separate categories with commas'),
		'add_or_remove_items'         => __('Add or remove categories'),
		'choose_from_most_used'       => __('Choose from most used categories'),
		'not_found'                   => __('No categories found'),
		'back_to_items'               => __('&laquo; Back to Categories'),
	);

	$args = array(
		'hierarchical'          => true, // Set to true for hierarchical categories like parent-child relationships
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'query_var'             => true,
		'rewrite'               => array('slug' => 'portfolio-category'),
	);

	register_taxonomy('portfolio-category', array('portfolio'), $args);
}

// Register Custom Post Type - Services
add_action('init', 'register_services_cpt');

function register_services_cpt()
{
	$labels = array(
		'name'                => __('Services'),
		'singular_name'       => __('Service'),
		'menu_name'           => __('Services'),
		'parent_item_colon'   => __('Parent Service:'),
		'all_items'           => __('All Services'),
		'view_item'           => __('View Service'),
		'add_new_item'        => __('Add New Service'),
		'add_new'             => __('Add New'),
		'edit_item'           => __('Edit Service'),
		'update_item'         => __('Update Service'),
		'search_items'        => __('Search Services'),
		'not_found'           => __('No Services Found'),
		'not_found_in_trash'  => __('No Services Found in Trash'),
	);

	$args = array(
		'label'               => __('services'),
		'description'         => __('Custom post type for services'),
		'labels'              => $labels,
		'supports'            => array('title', 'editor', 'thumbnail'),
		'public'              => true,
		'has_archive'         => true,
		'rewrite'             => array('slug' => 'services'),
		'menu_icon'           => 'dashicons-portfolio',
		'show_in_rest'        => true, // Enable REST API for Services
	);

	register_post_type('services', $args);
}

// Register Non-Hierarchical Taxonomy for Services - Service Categories
add_action('init', 'register_service_categories_taxonomy');

function register_service_categories_taxonomy()
{
	$labels = array(
		'name'                       => __('Service Categories'),
		'singular_name'              => __('Service Category'),
		'search_items'               => __('Search Service Categories'),
		'all_items'                  => __('All Service Categories'),
		'edit_item'                  => __('Edit Service Category'),
		'update_item'                => __('Update Service Category'),
		'add_new_item'               => __('Add New Service Category'),
		'new_item_name'              => __('New Service Category Name'),
		'menu_name'                  => __('Service Categories'),
	);

	$args = array(
		'hierarchical'               => false, // Set to false for non-hierarchical taxonomy
		'labels'                     => $labels,
		'show_ui'                    => true,
		'show_in_menu'               => true, // Show in the "Services" menu
		'singular_slug'              => 'service-category', // Slug for individual terms
		'rewrite'                    => array('slug' => 'service-category'), // URL structure for terms
	);

	register_taxonomy('service_category', array('services'), $args); // Associate taxonomy with "services" CPT
}

// Register Non-Hierarchical Taxonomy for Services - Service Tags
add_action('init', 'register_service_tags_taxonomy');

function register_service_tags_taxonomy()
{
	$labels = array(
		'name'                       => __('Service Tags'),
		'singular_name'              => __('Service Tag'),
		'search_items'               => __('Search Service Tags'),
		'all_items'                  => __('All Service Tags'),
		'edit_item'                  => __('Edit Service Tag'),
		'update_item'                => __('Update Service Tag'),
		'add_new_item'               => __('Add New Service Tag'),
		'new_item_name'              => __('New Service Tag Name'),
		'menu_name'                  => __('Service Tags'),
	);

	$args = array(
		'hierarchical'               => false, // Set to false for non-hierarchical taxonomy
		'labels'                     => $labels,
		'show_ui'                    => true,
		'show_in_menu'               => true, // Show in the "Services" menu
		'singular_slug'              => 'service-tag', // Slug for individual terms
		'rewrite'                    => array('slug' => 'service-tag'), // URL structure for terms
	);

	register_taxonomy('service_tag', array('services'), $args); // Associate taxonomy with "services" CPT
}

// Register Custom Metaboxes for Services
add_action('add_meta_boxes', 'register_services_metaboxes');

function register_services_metaboxes()
{
	add_meta_box(
		'service_details', // Unique ID for the metabox
		__('Service Details'), // Title displayed above the metabox
		'render_service_details_metabox', // Callback function to display metabox content
		'services', // Post type where the metabox should appear (services)
		'normal', // Context where the metabox should appear (normal)
		'high' // Priority (high, default, low)
	);
}

// Render Service Details Metabox Content
function render_service_details_metabox($post)
{
	// Retrieve existing values for fields
	$service_icon = get_post_meta($post->ID, 'service_icon', true);
	$service_price = get_post_meta($post->ID, 'service_price', true);
	$service_button_text = get_post_meta($post->ID, 'service_button_text', true);
	$service_button_link = get_post_meta($post->ID, 'service_button_link', true);
?>
	<p>
		<label for="service_icon"><?php esc_html_e('Icon (Dashicon Code):'); ?></label>
		<input type="text" name="service_icon" id="service_icon" value="<?php echo esc_attr($service_icon); ?>" />
	</p>
	<p>
		<label for="service_price"><?php esc_html_e('Price:'); ?></label>
		<input type="number" name="service_price" id="service_price" value="<?php echo esc_attr($service_price); ?>" />
		<select name="currency">
			<option value="USD">USD</option>
			<option value="EUR">EUR</option>
			<!-- Add more currency options as needed -->
		</select>
	</p>
	<p>
		<label for="service_button_text"><?php esc_html_e('Button Text:'); ?></label>
		<input type="text" name="service_button_text" id="service_button_text" value="<?php echo esc_attr($service_button_text); ?>" />
	</p>
	<p>
		<label for="service_button_link"><?php esc_html_e('Button Link:'); ?></label>
		<input type="url" name="service_button_link" id="service_button_link" value="<?php echo esc_url($service_button_link); ?>" />
	</p>
<?php
}

// Save Service Details
add_action('save_post', 'save_service_details');

function save_service_details($post_id)
{
	// Check if nonce is set
	if (!isset($_POST['service_details_nonce'])) {
		return;
	}

	// Verify nonce
	if (!wp_verify_nonce($_POST['service_details_nonce'], basename(__FILE__))) {
		return;
	}

	// Check if autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	// Check permissions
	if (!current_user_can('edit_post', $post_id)) {
		return;
	}

	// Save custom fields
	if (isset($_POST['service_icon'])) {
		update_post_meta($post_id, 'service_icon', sanitize_text_field($_POST['service_icon']));
	}
	if (isset($_POST['service_price'])) {
		update_post_meta($post_id, 'service_price', sanitize_text_field($_POST['service_price']));
	}
	if (isset($_POST['service_button_text'])) {
		update_post_meta($post_id, 'service_button_text', sanitize_text_field($_POST['service_button_text']));
	}
	if (isset($_POST['service_button_link'])) {
		update_post_meta($post_id, 'service_button_link', esc_url_raw($_POST['service_button_link']));
	}
}
