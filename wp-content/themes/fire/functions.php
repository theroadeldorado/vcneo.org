<?php

/**
 * Fire functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Fire
 */


if (!defined('FIRE_VERSION')) {
  // Replace the version number of the theme on each release.
  define('FIRE_VERSION', '1.0.0');
}

if (!function_exists('fire_setup')) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function fire_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on Fire, use a find and replace
     * to change 'fire' to the name of your theme in all the template files.
     */
    load_theme_textdomain('fire', get_template_directory() . '/languages');

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
        'fire_custom_background_args',
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
  }
endif;
add_action('after_setup_theme', 'fire_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fire_content_width() {
  // This variable is intended to be overruled from themes.
  // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
  // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
  $GLOBALS['content_width'] = apply_filters('fire_content_width', 640);
}
add_action('after_setup_theme', 'fire_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fire_widgets_init() {
  register_sidebar(
    array(
      'name'          => esc_html__('Sidebar', 'fire'),
      'id'            => 'sidebar-1',
      'description'   => esc_html__('Add widgets here.', 'fire'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );
}
add_action('widgets_init', 'fire_widgets_init');

/**
 * Pagination Fix for custom post types
 */
add_action('init', function () {
  add_rewrite_rule('(.?.+?)/page/?([0-9]{1,})/?$', 'index.php?pagename=$matches[1]&paged=$matches[2]', 'top');
});

/**
 * Enqueue scripts and styles.
 */
function fire_scripts() {
  $css = get_template_directory() . '/dist/styles.css';
  $css_updated_on = date("YmdGis", filemtime($css));

  $js = get_template_directory() . '/dist/scripts.js';
  $js_updated_on = date("YmdGis", filemtime($js));

  wp_enqueue_style('default', get_template_directory_uri() . '/dist/styles.css', array(), $css_updated_on);
  wp_enqueue_script('fire-js', get_template_directory_uri() . '/dist/scripts.js', array(), $js_updated_on, true);

  // Localize the script with ajax_object
  wp_localize_script(
    'fire-js',
    'ajax_object',
    array(
      'ajax_url' => admin_url('admin-ajax.php')
    )
  );
}
add_action('wp_enqueue_scripts', 'fire_scripts');

function admin_style() {
  wp_enqueue_style('admin-styles', get_template_directory_uri() . '/dist/admin.css', array(), FIRE_VERSION);
}

add_action('admin_enqueue_scripts', 'admin_style');

//include all php files in inc folder
array_map(function ($filename) {
  include $filename;
}, array_merge(glob(get_template_directory() . "/inc/*.php"), glob(get_template_directory() . "/inc/**/*.php")));


// Removes Theme File Editor
add_action('init', 'disable_theme_file_editor');
function disable_theme_file_editor() {
  define('DISALLOW_FILE_EDIT', true);
}

// disable gravity forms styles by default
add_filter('gform_disable_css', '__return_true');

// Force the Yoast SEO metabox to be low priority
add_filter('wpseo_metabox_prio', function () {
  return 'low';
});

// hide customize link
function remove_customize_menu() {
  global $submenu;

  // WordPress 4.5 or later
  remove_submenu_page('themes.php', 'customize.php');
  unset($submenu['themes.php'][6]); // This removes 'Customize' under 'Appearance'
}
add_action('admin_menu', 'remove_customize_menu', 999);
function remove_customize_link_from_admin_bar($wp_admin_bar) {
  $wp_admin_bar->remove_node('customize');
}
add_action('admin_bar_menu', 'remove_customize_link_from_admin_bar', 999);
