<?php
  $section->add_classes([
    'py-10 bg-blue-500'
  ]);
?>

<?php $section->start(); ?>
  <?php if( have_rows('stats') ):?>
    <div class="container flex flex-wrap">
      <?php while ( have_rows('stats') ) : the_row();
        $icon = get_sub_field('icon');
        $stat = get_sub_field('stat');
        $description = get_sub_field('description');?>
        <div class="w-full px-4 mb-4 text-center lg:w-1/3 lg:mb-0">
          <?php if($icon):?>
            <span class="flex items-center justify-center w-20 h-20 mb-3 p-5 mx-auto bg-white rounded-full">
              <img src="<?php echo $icon['url'];?>" alt="<?php echo $icon['alt'];?>" class="w-full h-full object-contain">
            </span>
          <?php endif;?>
          <?php if($stat):?>
            <h3 class="mb-3 text-xl font-bold text-white md:text-4xl"><?php echo $stat;?></h3>
          <?php endif;?>
          <?php if($description):?>
            <p class="max-w-md mx-auto text-lg text-white lg:px-12 balance-text"><?php echo $description;?></p>
          <?php endif;?>
        </div>
      <?php endwhile;?>
    </div>
  <?php endif; ?>
<?php $section->end(); ?>
