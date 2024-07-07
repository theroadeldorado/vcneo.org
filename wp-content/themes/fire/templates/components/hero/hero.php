<?php
  $image = get_sub_field('image');
  $video = get_sub_field('video');
  $kicker = get_sub_field('kicker');
  $tag = get_sub_field('tag');
  $title = get_sub_field('title');
  $style = get_sub_field('style');
  $subheading = get_sub_field('subheading');
  $buttons = get_sub_field('buttons');

  $section->add_classes([
    'py-12 md:py-20 lg:py-24 bg-blue-500 relative'
  ]);
?>

<?php $section->start(); ?>
  <div class="container mx-auto px-4 relative z-[2]">
    <div class="text-center">
      <?php if($kicker):?>
        <span class="kicker block text-white">Lorem Ipsum</span>
      <?php endif; ?>

      <?php if($title):?>
        <?php new Fire_Heading($tag, $title, $style . ' mb-8 text-white'); ;?>
      <?php endif; ?>

      <?php if($subheading):?>
        <div class="max-w-xl mx-auto mb-10 text-lg text-white">
          <?php echo $subheading;?>
        </div>
      <?php endif; ?>

      <div class="flex items-center justify-center gap-8">
        <a class="button-tan group" href="#">
          <span class="mr-2.5">Learn More</span>
          <span class="group-hover:rotate-45 transform transition duration-75">
            <svg width="10" height="11" viewbox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M9 1.5L1 9.5" stroke="currentColor" stroke-width="1.3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
              <path d="M9 8.83571V1.5H1.66429" stroke="currentColor" stroke-width="1.3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </span>
        </a>
        <a class="button-tan group" href="#">
          <span class="mr-2.5">Donate</span>
          <span class="group-hover:rotate-45 transform transition duration-75">
            <svg width="10" height="11" viewbox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M9 1.5L1 9.5" stroke="currentColor" stroke-width="1.3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
              <path d="M9 8.83571V1.5H1.66429" stroke="currentColor" stroke-width="1.3" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </span>
        </a>
      </div>
    </div>
  </div>
  <?php if($video):?>
    <video
      class="absolute inset-0 object-cover w-full h-full opacity-30 z-[1]"
      allowfullscreen="true"
      muted="muted"
      autoplay="autoplay"
      playsinline="playsinline"
      loop="loop"
    >
      <source src="<?php echo $video['url'];?>" type="video/mp4">
    </video>
  <?php endif; ?>

  <?php if($image):?>
    <div class="absolute inset-0 overflow-hidden w-full h-full opacity-30 z-[1]">
      <?php echo ResponsivePics::get_picture($image['id'], 'sm:600 400|f, md:900 450|f, lg:1200 400|f, xl:1920 800|f', 'lazyload-effect object-cover w-full h-full', true, true); ?>
    </div>
  <?php endif; ?>

<?php $section->end(); ?>
