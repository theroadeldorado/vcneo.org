<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fire
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php
    $bugherd_api_key = get_field('bugherd_api_key', 'site_settings');
    $bugherd_enabled = get_field('bugherd_enabled', 'site_settings');

    if ($bugherd_api_key && $bugherd_enabled) :
  ?>
    <script type="text/javascript" src="https://www.bugherd.com/sidebarv2.js?apikey=<?php print $bugherd_api_key; ?>" async="true"></script>
  <?php endif; ?>

  <?php
    $gtm = get_field('gtm', 'site_settings');
    $google_tag_manager_enabled = function_exists('get_field') ? get_field('gtm_enabled', 'site_settings') : false;
    $google_tag_manager_id = function_exists('get_field') ? get_field('gtm_id', 'site_settings') : false;

    if ($google_tag_manager_enabled && $google_tag_manager_id) :
  ?>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','<?php print $google_tag_manager_id; ?>');</script>
    <!-- End Google Tag Manager -->
  <?php endif; ?>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php print $google_tag_manager_id; ?>"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php wp_body_open(); ?>
<div id="page" class="site">
  <a class="sr-only skip-link focus:not-sr-only" href="#primary"><?php esc_html_e( 'Skip to content', 'fire' ); ?></a>

  <header class="site-header fire-container my-4">

    <a class="block w-8" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
      <?php new Fire_SVG('logo'); ?>
      <span class="sr-only"><?php bloginfo( 'name' ); ?></span>
    </a>

    <nav id="site-navigation" class="main-navigation">
      <?php
        wp_nav_menu([
          'container' => false,
          'depth' => 2,
          'theme_location' => 'primary',
          'menu_class' => 'menu_class',
          'item_0' => 'item_class',
          'link_0' => 'list_item_class',
          'submenu_0' => 'submenu',
          // 'alpine_link_0' => '$store.navOpen ?? `opacity-0 -translate-y-1/2`',
        ]);
      ?>
    </nav>

    <?php
    $fire_description = get_bloginfo( 'description', 'display' );
    if ( $fire_description || is_customize_preview() ) :
      ?>
      <p class="site-description"><?php echo $fire_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
    <?php endif; ?>
  </header>

