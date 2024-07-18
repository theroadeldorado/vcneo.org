<?php
  $bg_style = get_sub_field('bg_style');
  $tag = get_sub_field('tag');
  $title = get_sub_field('title');
  $style = get_sub_field('style');
  $copy = get_sub_field('copy');
  $social_links = get_field('social_links', 'site_settings');

  $section->add_classes([
    'py-12 md:py-24 text-white',
    $bg_style === 'blue' ? 'bg-blue-500' : 'bg-green-500',
  ]);
?>

<?php $section->start(); ?>
  <div class="container mx-auto px-4">
    <div class="max-w-[1200px] mx-auto text-center">
      <?php if($social_links) :?>
        <div class="flex flex-wrap items-center justify-center mb-10 gap-6">
          <?php  foreach ($social_links as $platform => $link):?>
            <?php if($link):?>
              <a class="block text-white no-underline hover:scale-110 duration-200 ease-in-out" target="_blank" href="<?php echo $link;?>">
                <span class="inline-flex p-2 w-16 h-16 md:w-18 md:h-18 items-center justify-center bg-white rounded-2xl <?php echo $bg_style === 'blue' ? 'text-blue-500' : 'text-green-500';?>">
                  <?php new Fire_SVG('icon--social-' . $platform); ?>
                  <span class="sr-only"><?php echo $platform; ?></span>
                </span>
              </a>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
      <?php if($title):?>
        <?php new Fire_Heading($tag, $title, $style . '  mb-6'); ;?>
      <?php endif; ?>
      <?php if($copy):?>
        <div class="max-w-md mx-auto">
          <?php echo $copy; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
<?php $section->end(); ?>