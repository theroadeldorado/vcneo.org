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

?>
  <footer class="py-12 md:py-20 bg-black text-white">
    <div class="container mx-auto px-4">
      <div class="flex flex-wrap -mx-4 mb-16">
        <div class="w-full lg:w-4/12 xl:w-5/12 px-4 mb-8 lg:mb-0">
          <a class="block w-28 lg:w-44" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
            <?php new Fire_SVG('logo'); ?>
            <span class="sr-only"><?php bloginfo( 'name' ); ?></span>
          </a>
        </div>
        <div class="w-full lg:w-8/12 xl:w-7/12 px-4">
          <?php
          wp_nav_menu(
            array(
              'container'       => false,
              'depth'           => 1,
              'theme_location'  => 'flex flex-wrap -mb-2 items-center lg:justify-end gap-14',
              'menu_class'      => 'menu_class',
              'link_class'      => 'inline-block text-white hover:text-coolGray-400',
              'item_class'      => 'mb-2 mr-14',
            )
          );
        ?>

        </div>
      </div>
      <div class="flex flex-wrap -mx-4 items-center">
        <div class="w-full sm:w-1/2 px-4 mb-6 sm:mb-0">
          <span class="text-sm text-coolGray-600"> <?php echo sprintf('© %s %s', date('Y'), get_bloginfo('name')); ?></span>
        </div>
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
