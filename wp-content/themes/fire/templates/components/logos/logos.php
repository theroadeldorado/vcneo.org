<?php
  $tag = get_sub_field('tag');
  $title = get_sub_field('title');
  $style = get_sub_field('style');
  $link = get_sub_field('link');
  $images = get_sub_field('images');


  $section->add_classes([
    'py-12 md:py-24 bg-tan'
  ]);
?>

<?php $section->start(); ?>
  <div class="container mx-auto px-4">
    <div class="max-w-xl lg:max-w-none mx-auto">
      <div class="flex flex-wrap -mx-4 items-center">
        <div class="w-full lg:w-5/12 px-4 mb-20 lg:mb-0">
          <div class="max-w-lg">
            <?php if($title):?>
              <?php new Fire_Heading($tag, $title, $style . ' font-heading text-6xl sm:text-7xl tracking-tighter mb-10'); ;?>
            <?php endif; ?>
            <?php if($link):?>
              <a href="<?php echo $link['url'];?>" class="link"><?php echo $link['title'];?></a>
            <?php endif; ?>
          </div>
        </div>
        <div class="w-full lg:w-7/12 px-4">
          <div class="max-w-xl lg:ml-auto">
            <div class="flex flex-wrap -mx-4 -mb-4">
              <?php foreach($images as $image):?>
                <div class="w-full sm:w-1/2 px-4 mb-4">
                  <div class="flex h-28 p-8 items-center justify-center bg-white rounded-3xl">
                    <img class="block mx-auto object-contain" src="<?php echo $image['url'];?>" alt="">
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php $section->end(); ?>
