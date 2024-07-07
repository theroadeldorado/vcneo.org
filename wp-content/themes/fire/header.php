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
          <a class="block w-8" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <?php new Fire_SVG('logo'); ?>
            <span class="sr-only"><?php bloginfo( 'name' ); ?></span>
          </a>
          <button x-on:click="mobileNavOpen = !mobileNavOpen" class="lg:hidden py-1 ml-auto">
            <svg width="44" height="16" viewbox="0 0 44 16" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="44" height="2" rx="1" fill="black"></rect><rect y="14" width="44" height="2" rx="1" fill="black"></rect></svg>
          </button>
          <?php
            wp_nav_menu([
              'container' => false,
              'depth' => 2,
              'theme_location' => 'primary',
              'menu_class' => 'hidden lg:flex ml-12 mr-auto items-center',
              'item_0' => 'item_class',
              'link_0' => 'inline-block hover:underline mr-10',
              'submenu_0' => 'submenu',
            ]);
          ?>
          <a class="mr-8 hidden lg:inline-block hover:underline leading-none" href="#">Sign in</a>
          <a class="button-outline-white group" href="#">
            <span class="mr-2">Sign up</span>
            <span class="group-hover:rotate-45 transform transition duration-100">
              <svg width="10" height="10" viewbox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 1L1 9" stroke="currentColor" stroke-width="1.3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M9 8.33571V1H1.66429" stroke="currentColor" stroke-width="1.3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </span>
          </a>
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
        <div>
          <a class="block mb-3 px-4 py-4 text-center font-medium text-black hover:text-white border border-black hover:bg-black rounded-full transition duration-200" href="#">Login</a>
          <a class="block px-4 py-4 text-center font-medium text-white bg-blue-500 hover:bg-blue-600 rounded-full transition duration-200" href="#">Sign in</a>
        </div>
      </nav>
    </div>
  </header>



  <section class="py-12 md:py-20 bg-tan">
    <div class="container mx-auto px-4">
      <div class="max-w-lg lg:max-w-6xl mx-auto">
        <div class="flex flex-wrap -mx-4 items-center">
          <div class="w-full lg:w-1/2 px-4 mb-16 lg:mb-0">
            <div class="max-w-md">
              <h2 class="lg:max-w-md text-6xl sm:text-7xl mb-8">Get started quickly</h2>
              <p class="text-xl mb-10">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable.</p>
              <a class="group inline-flex items-center leading-none font-medium pb-2 border-b-2 border-black" href="#">
                <span class="mr-4">See more</span>
                <span class="group-hover:rotate-45 transform transition duration-100">
                  <svg width="11" height="11" viewbox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.5 1.5L1.5 9.5" stroke="black" stroke-width="1.3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M9.5 8.83571V1.5H2.16429" stroke="black" stroke-width="1.3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                </span>
              </a>
            </div>
          </div>
          <div class="w-full lg:w-1/2 px-4">
            <img class="block lg:ml-auto rounded-[3rem]" src="https://images.unsplash.com/photo-1719216324845-53224baf1ea3?q=80&w=2828&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="relative bg-black aspect-video w-full">
    <img class="absolute inset-0 w-full h-full object-cover" src="https://images.unsplash.com/photo-1719216324845-53224baf1ea3?q=80&w=2828&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
  </section>

  <section class="py-12 md:py-24 bg-coolGray-50">
    <div class="container mx-auto px-4">
      <div class="max-w-md mx-auto lg:max-w-none">
        <h1 class="font-heading text-6xl md:text-10xl tracking-tighter mb-20">Stats</h1>
        <div class="flex flex-wrap -mx-3">
          <div class="w-full lg:w-1/3 px-3 mb-6 lg:mb-0">
            <a class="relative  block h-full w-full px-9 py-14 border-black border rounded-[3rem] transition duration-300" href="#">
              <span class="hidden absolute top-0 right-0 mt-16 mr-8">
                <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M22 2L2 22" stroke="white" stroke-width="3.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M22 20.3393V2H3.66071" stroke="white" stroke-width="3.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </span>
              <div>
                <div class="max-w-xs pr-10">
                  <h5 class="text-3xl xs:text-4xl  mb-6">De-risking your project</h5>
                </div>
                <p class="">We follow the RIBA Plan of Work 2020 to ensure an orderly framework and project clarity from the outset. First, we conduct feasibility studies and a project review.</p>
              </div>
            </a>
          </div>
          <div class="w-full lg:w-1/3 px-3 mb-6 lg:mb-0">
            <a class="relative block h-full w-full px-9 py-14 border-black border rounded-[3rem] transition duration-300" href="#">
              <span class="hidden absolute top-0 right-0 mt-16 mr-8">
                <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M22 2L2 22" stroke="white" stroke-width="3.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M22 20.3393V2H3.66071" stroke="white" stroke-width="3.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </span>
              <div>
                <div class="max-w-xs pr-10">
                  <h5 class="text-3xl xs:text-4xl  mb-6">Planning strategies</h5>
                </div>
                <p class="">This process is led either by a chartered planning consultant or chartered architect and entails the preparation of concept designs and planning strategies.</p>
              </div>
            </a>
          </div>
          <div class="w-full lg:w-1/3 px-3">
            <a class="relative block h-full w-full px-9 py-14 border-black border rounded-[3rem] transition duration-300" href="#">
              <span class="hidden absolute top-0 right-0 mt-16 mr-8">
                <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M22 2L2 22" stroke="white" stroke-width="3.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M22 20.3393V2H3.66071" stroke="white" stroke-width="3.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </span>
              <div>
                <div class="max-w-xs pr-10">
                  <h5 class="text-3xl xs:text-4xl  mb-6">Return on investment</h5>
                </div>
                <p class="">During this phase the design is developed to meet the required technical standards to meet building regulations and incorporate sustainability strategies.</p>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="py-12 md:py-24 bg-blue-500 text-white">
    <div class="container mx-auto px-4">
      <div class="max-w-[1200px] mx-auto text-center">
        <div class="flex items-center justify-center mb-10">
          <div class="mr-6">
            <div class="animate-bounceSlow inline-flex p-2 w-16 h-16 xs:w-18 xs:h-18 items-center justify-center bg-white rounded-2xl" style="animation-direction: reverse;">
              <img src="asitrastudio-assets/logo-clouds/win-sm.png" alt="">
            </div>
          </div>
          <div class="mr-6">
            <div class="animate-bounceSlow inline-flex p-2 w-16 h-16 xs:w-18 xs:h-18 items-center justify-center bg-white rounded-2xl" style="animation-direction: reverse; animation-delay: 0.3s;">
              <img src="asitrastudio-assets/logo-clouds/pp-sm.png" alt="">
            </div>
          </div>
          <div class="mr-6">
            <div class="animate-bounceSlow inline-flex p-2 w-16 h-16 xs:w-18 xs:h-18 items-center justify-center bg-white rounded-2xl" style="animation-direction: reverse; animation-delay: 0.5s;">
              <img src="asitrastudio-assets/logo-clouds/spotify-sm.png" alt="">
            </div>
          </div>
          <div>
            <div class="animate-bounceSlow inline-flex p-2 w-16 h-16 xs:w-18 xs:h-18 items-center justify-center bg-white rounded-2xl" style="animation-direction: reverse; animation-delay: 0.8s;">
              <img src="asitrastudio-assets/logo-clouds/visa-sm.png" alt="">
            </div>
          </div>
        </div>
        <h2 class="heading-2 mb-6">Follow us on Social</h2>
        <p class="max-w-md mx-auto text-coolGray-600">Stay up-to-date with everything at Village Collective.</p>
      </div>
    </div>
  </section>