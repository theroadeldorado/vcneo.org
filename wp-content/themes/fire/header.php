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

  <header class="site-header fire-container my-4 hidden">

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

  <!-- splash page -->
  <div>
    <section class="bg-purple-900 py-6">
      <div class="container px-4 mx-auto">
        <div class="max-w-6xl mb-12 mx-auto text-center">
          <h1 class="lg:px-18 text-white text-5xl lg:text-7xl text-pretty font-bold font-heading mb-8 mt-14">Village Collective Northeast Ohio</h1>
          <p class="text-orange-50 text-lg">Village Collective is an intentional community that provides programming and supportive services focused on gaining the life skills needed for successful independent living, career success, financial stability and ultimately, home ownership. Through these services, each participant is surrounded by a “village” that supports them in attaining career and life success.</p>
        </div>

        <div class="lg:px-18 mb-12">
          <img class="rounded-3xl lg:rounded-3xl w-full object-cover" src="https://villagecollect.wpenginepowered.com/wp-content/uploads/2024/06/Village-2880x1620-1-scaled.jpg" alt="">
        </div>

        <div class="max-w-4xl mx-auto mb-12">
          <h2 class="text-orange-50 text-2xl mb-8">Village Collective is a non-profit initiative that empowers 18-24 year-old adults to gain the professional skills they need to secure a meaningful and sustaining career with a family-supporting salary through the provision of stable housing in an intentional community while building equity and skills focused on home ownership.
          </h2>

          <p class="text-orange-50 text-lg mb-6">2019-2020 marked the beginning of an exciting new initiative focused on our Scholars’ career planning and successful career launch. With recognition that some of our Scholars will be most successful pursuing an alternative post-secondary pathway that does not involve a four-year degree, we applied the hallmark ‘holistic approach’ of our mission to supporting Scholars pursuing professional certifications, apprenticeships and other career training alternatives to college. Participants in this program, our Fellows, receive individualized monthly coaching and case management as well as guidance and connection to pre-professional programs and employment opportunities.</p>

          <p class="text-orange-50 text-lg mb-6">In February 2020, we piloted our first Residential Fellowship Home for a sub-set of Post-Secondary Scholars who demonstrated a need for supportive housing and reliable transportation while they pursued career training. This inaugural group of Residential Fellows lived at our Benacci Home at 9625 Garfield Blvd. on our Campus of Hope. In November 2021, we purchased a home at 9434 Dorothy Ave., contiguous to the BHGH campus, and after more than a year of renovations completed by volunteers and professional craftsmen, we opened the Lozick Home in July, 2023 for post-secondary Scholars. Two fellows moved from the BHGH Residential Campus into the new home in July 2023.</p>

          <p class="text-orange-50 text-lg mb-6">Through these pilot efforts and findings, it has become evident that there is a significant population of young adults who are experiencing the opportunity gap that results from a lack of access to quality stable housing, reliable transportation as well as financial and employment soft-skill coaching. These supports are essential not only to persistence in pre-professional programs, but in realizing the modern American Dream of a quality job and building equity through home ownership.</p>

          <p class="text-orange-50 text-lg mb-6">While complementary to the established mission of Boys Hope Girls Hope, we have determined that the Village of Hope can and should serve as a holistic supportive housing pathway beyond the scope of Boys Hope Girls Hope Scholars, and at it’s full capacity, for up to 36 Fellows referred from partner schools, agencies and institutions.</p>
        </div>

        <div class="flex flex-wrap mb-12 -mx-4">
          <div class="w-full lg:w-1/2 p-4">
            <div class="w-full h-full rounded-3xl overflow-hidden">
              <img class="h-full w-full object-cover" src="https://villagecollect.wpenginepowered.com/wp-content/uploads/2024/06/IMG_8172-scaled-e1718222616626.jpeg" alt="">
            </div>
          </div>
          <div class="w-full lg:w-1/2 p-4 py-8">
            <h2 class="text-orange-50 text-3xl font-bold mb-8">Phase I</h2>
            <p class="text-orange-50 text-lg mb-6">With the conceptual design and pilot phase complete, we are now preparing for the next phase of growth with a goal of shaping the Village of Hope into a self-sustaining entity. Phase I will include hiring key staff [an additional 1-2 FTEs]; developing key partnerships and curriculum for life skills training; and serve the first cohort of 8-10 Fellows. Fellows will be recruited by BHGH through existing partnerships with local high schools as well as through workforce development partners (e.g. Tri-C, MAGNET) and will reside in the Village of Hope housing community with semi-independent living for 24 months.</p>

            <p class="text-orange-50 text-lg">In addition to enrollment in their career training program, Fellows will be part of an intentional community that provides programming focused on gaining the life skills needed for successful independent living, career success, financial stability and ultimately, home ownership. Phase II will involve independent living in Village of Hope housing that enables residents to build equity while focusing on their career and continuing to gain the financial literacy and life skills needed for success. Within 30 months of admission, successful graduates will have attained a debt-free degree/professional certification and be working in a professional, skilled job with accrued equity sufficient to pursue home and car ownership before the age of 25.</p>
          </div>
        </div>

        <div class="max-w-4xl mx-auto mb-12">
          <p class="text-orange-50 text-lg mb-6">More than $1M in capital and operating funds have been contributed in support of this endeavor, including $450K in capital dollars that have been leveraged to purchase and renovate Lozick Home, purchase a new vehicle for use by fellows and to move forward with the design and development of a new housing village (Phase II) on a 2.5-acre church property adjacent to the BHGH Campus.</p>

          <p class="text-orange-50 text-lg mb-6">A fundraising campaign for the Village of Hope and a scaled-up program is being planned for the second quarter of 2024. Annual operating costs are projected to be approximately $500K-$700K with $200K in funds currently pledged for 2024/2025. Preliminary funding estimates call for $3M-$5M for Phase II development of the multi-purpose community center and the first two town-home style houses for up to 8 residential Fellows. The anchor facility, which will continue to serve as the home of The Rock Church congregation, will house program partners (workforce, counseling, home-ownership) and incubator retail space to promote community growth. In Phase III, an earned income stream will be introduced as a complement to funds contributed by residential Fellows (rent etc.), partner institutions and private investment.</p>
        </div>

        <div class="lg:px-18 mb-12">
          <img class="rounded-3xl lg:rounded-3xl w-full object-cover" src="https://villagecollect.wpenginepowered.com/wp-content/uploads/2024/06/Village-screenshot-Mar-22-scaled.webp" alt="">
        </div>

        <div class="max-w-4xl mx-auto text-center">
          <h2 class="text-orange-50 text-lg lg:text-2xl mb-8">Village Collective is an initiative of Boys Hope Girls Hope of Northeastern Ohio<br>
          Tim Grady, Director | <a class="text-purple-300" href="mailto:tgrady@bhgh.org">tgrady@bhgh.org</a> | 216-244-1530</h2>
        </div>
      </div>

    </section>
  </div>
  <!-- end splash page -->
