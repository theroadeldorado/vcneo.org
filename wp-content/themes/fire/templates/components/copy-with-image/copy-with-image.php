<?php
  $image = get_sub_field('image');
  $image_position = get_sub_field('image_position');
  $copy = get_sub_field('copy');

  $section->add_classes([
    'py-12 md:py-20 bg-tan'
  ]);
?>

<?php $section->start(); ?>
  <div class="container mx-auto px-4">
    <div class="max-w-lg lg:max-w-6xl mx-auto">
      <div class="flex flex-wrap -mx-4 items-center <?php echo $image_position === 'left' ? ' flex-row-reverse' : '';?>">
        <div class="w-full lg:w-1/2 px-4 mb-16 lg:mb-0">
          <div class="<?php echo $image_position === 'left' ? 'ml-12' : 'mr-12';?>  wizzy">
            <?php echo $copy; ?>
          </div>
        </div>
        <div class="w-full lg:w-1/2 h-full px-4">
          <?php if($image):?>
            <?php echo ResponsivePics::get_picture($image['id'], 'sm:400 600|f, md:400 600|f, lg:600 800|f, xl:1000 1200|f', 'lazyload-effect w-full h-full block lg:ml-auto rounded-[3rem] overflow-hidden relative', true, true); ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
<?php $section->end(); ?>
