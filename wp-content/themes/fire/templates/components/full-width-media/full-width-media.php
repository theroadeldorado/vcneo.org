<?php
  $image = get_sub_field('image');
  $video = get_sub_field('video');

  $section->add_classes([
    'relative bg-black aspect-video w-full overflow-hidden',
  ]);
?>

<?php $section->start(); ?>

  <!-- <?php if($video):?>
    <video
      class="absolute inset-0 object-cover w-full h-full z-[1]"
      allowfullscreen="true"
      muted="muted"
      autoplay="autoplay"
      playsinline="playsinline"
      loop="loop"
    >
      <source src="<?php echo $video['url'];?>" type="video/mp4">
    </video>
  <?php endif; ?> -->

  <?php if($image && !$video):?>
    <?php echo ResponsivePics::get_picture($image['id'], 'sm:600 400|f, md:900 450|f, lg:1200 400|f, xl:1920 800|f', 'lazyload-effect absolute inset-0 w-full h-full [&>img]:w-full [&>img]:h-full [&>img]:object-cover', true, true); ?>
  <?php endif; ?>

<?php $section->end(); ?>
