<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fire
 */

  $address = get_field('address', 'site_settings');
  $phone_number = get_field('phone_number', 'site_settings');
  $social_links = get_field('social_links', 'site_settings');

?>
  <footer class="py-12 md:py-20 bg-black text-white">
    <div class="container mx-auto px-4">
      <div class="flex flex-wrap -mx-4 mb-16">
        <div class="w-full lg:w-4/12 xl:w-5/12 px-4 mb-8 lg:mb-0">
          <a class="block w-28 lg:w-44" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <?php new Fire_SVG('logo'); ?>
            <span class="sr-only"><?php bloginfo( 'name' ); ?></span>
          </a>
          <?php if($address):?>
            <p class="text-white text-2xl mt-6 block"><?php echo $address;?></p>
          <?php endif; ?>
          <?php if($phone_number):?>
            <a class="link !text-white mt-4 block" href="tel:<?php echo $phone_number;?>"><?php echo $phone_number;?></a>
          <?php endif; ?>

        </div>
        <div class="w-full lg:w-8/12 xl:w-7/12 px-4">
          <div>
            <?php
              wp_nav_menu(
                array(
                  'container'       => false,
                  'depth'           => 1,
                  'theme_location'  => 'footer',
                  'menu_class'      => 'menu_class flex flex-wrap gap-x-6 lg:gap-x-14 mb-8 items-center lg:justify-end gap-14 w-full',
                  'link_class'      => 'inline-block text-white hover:text-coolGray-400',
                  'item_class'      => '',
                )
              );
            ?>
          </div>
        </div>
      </div>
      <div class="flex flex-wrap -mx-4 items-center justify-between">
        <div class="w-full sm:w-1/2 px-4 mb-6">
          <span class="text-sm text-white"> <?php echo sprintf('© %s %s', date('Y'), get_bloginfo('name')); ?></span>
        </div>
         <?php if($social_links) :?>
            <div class="flex flex-wrap items-center justify-end mb-10 gap-6 px-4">
              <?php  foreach ($social_links as $platform => $link):?>
                <a class="block text-white no-underline hover:scale-110 duration-200 ease-in-out" target="_blank" href="<?php echo $link;?>">
                  <span class="inline-flex p-2 w-10 h-10 items-center justify-center bg-white rounded-md text-black">
                    <?php new Fire_SVG('icon--social-' . $platform); ?>
                    <span class="sr-only"><?php echo $platform; ?></span>
                  </span>
                </a>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
      </div>
    </div>
  </footer>


<?php
  // Check if environment is local
  if (!function_exists('is_wpe')) {
    require get_template_directory() . '/templates/components/grid-debug/grid-debug.php';
  }
  wp_footer(); ?>

</body>
</html>
