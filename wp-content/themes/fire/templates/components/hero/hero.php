<?php
  $image = get_sub_field('image');
  $video = get_sub_field('video');
  $kicker = get_sub_field('kicker');
  $tag = get_sub_field('tag');
  $title = get_sub_field('title');
  $style = get_sub_field('style');
  $subheading = get_sub_field('subheading');
  $bg_style = get_sub_field('bg_style');

  $section->add_classes([
    'py-12 md:py-20 lg:py-24 min-h-[600px] relative flex items-center justify-center',
    $bg_style === 'blue' ? 'bg-blue-500' : 'bg-green-500'
  ]);
?>

<?php $section->start(); ?>
  <div class="container w-full  mx-auto px-4 relative z-[2]">
    <div class="text-center w-full">
      <?php if($kicker):?>
        <span class="kicker block text-white mb-2"><?php echo $kicker;?></span>
      <?php endif; ?>

      <?php if($title):?>
        <?php new Fire_Heading($tag, $title, $style . ' mb-8 text-white'); ;?>
      <?php endif; ?>

      <?php if($subheading):?>
        <div class="max-w-xl mx-auto mb-10 text-lg text-white">
          <?php echo $subheading;?>
        </div>
      <?php endif; ?>

      <?php if( have_rows('buttons') ):?>
        <div class="flex items-center justify-center gap-8">
          <?php while ( have_rows('buttons') ) : the_row();
            $button = get_sub_field('button'); ?>
            <a class="group <?php echo $bg_style === 'blue' ? 'button-tan' : 'button-tan-green';?>" href="<?php echo $button['url'];?>">
             <?php echo $button['title'];?>
            </a>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>

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
      <?php echo ResponsivePics::get_picture($image['id'], 'sm:600 800|f, md:900 450|f, lg:1200 400|f, xl:1920 800|f', 'lazyload-effect object-cover w-full h-full [&_img]:object-cover [&_img]:w-full [&_img]:h-full', false, false); ?>
    </div>
  <?php endif; ?>

<?php $section->end(); ?>
