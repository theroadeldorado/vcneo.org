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

  <header class="site-header bg-blue-500 text-white" x-data="{ mobileNavOpen: false }">
    <nav>
      <div class="container mx-auto px-4">
        <div class="flex h-24 items-center">
          <a class="block w-28 lg:w-44" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <?php new Fire_SVG('logo'); ?>
            <span class="sr-only"><?php bloginfo( 'name' ); ?></span>
          </a>
          <button x-on:click="mobileNavOpen = !mobileNavOpen" class="lg:hidden py-1 ml-auto">
            <svg width="44" height="16" viewbox="0 0 44 16" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="44" height="2" rx="1" fill="white"></rect><rect y="14" width="44" height="2" rx="1" fill="white"></rect></svg>
          </button>
          <?php
            wp_nav_menu([
              'container' => false,
              'depth' => 2,
              'theme_location' => 'primary',
              'menu_class' => 'hidden lg:flex ml-12 mr-auto gap-5 items-center grow justify-end',
              'item_0' => 'item_class relative group',
              'link_0' => 'inline-block hover:underline',
              'link_1' => 'inline-block hover:underline',
              'submenu_0' => 'submenu absolute pointer-events-none opacity-0 group-hover:opacity-100 group-hover:pointer-events-auto duration-200 ease-in-out flex flex-col z-[1001] gap-2 top-full -left-4 w-[200px] bg-blue-500 text-white shadow-lg pt-10 pb-2 px-4',
            ]);
          ?>
        </div>
      </div>
    </nav>
    <div :class="{'block': mobileNavOpen,'hidden': !mobileNavOpen}" class="hidden fixed top-0 left-0 bottom-0 w-5/6 max-w-md z-50">
      <div x-on:click="mobileNavOpen = !mobileNavOpen" class="fixed inset-0 bg-gray-800 opacity-50"></div>
      <nav class="relative flex flex-col py-6 px-10 w-full h-full bg-white overflow-y-auto">
        <div class="flex mb-auto items-center">
          <a class="inline-block mr-auto" href="#">
            <img class="h-4" src="asitrastudio-assets/logos/logo-asi.svg" alt="">
          </a>
          <button x-on:click="mobileNavOpen = !mobileNavOpen">
            <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M6 18L18 6M6 6L18 18" stroke="#111827" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </button>
        </div>
        <?php
          wp_nav_menu([
            'container' => false,
            'depth' => 2,
            'theme_location' => 'primary',
            'menu_class' => 'py-12 mb-auto',
            'item_0' => 'mb-6',
            'link_0' => 'inline-block text-black',
            'submenu_0' => 'flex-col',
          ]);
        ?>
      </nav>
    </div>
  </header>


