<?php
  $tag = get_sub_field('tag');
  $title = get_sub_field('title');
  $style = get_sub_field('style');

  $section->add_classes([
    'py-12 md:py-24 bg-tan',
  ]);
?>

<?php $section->start(); ?>
  <div class="container mx-auto px-4">
    <div class="max-w-md mx-auto lg:max-w-none">
      <?php if($title):?>
        <?php new Fire_Heading($tag, $title, $style . ' mb-20'); ;?>
      <?php endif; ?>
      <?php if( have_rows('stats') ):?>
        <div class="flex flex-wrap -mx-3">
          <?php while ( have_rows('stats') ) : the_row();
            $heading = get_sub_field('heading');
            $subheading = get_sub_field('subheading');
            $link = get_sub_field('link'); ?>
            <?php if($heading || $subheading):?>
              <div class="w-full lg:w-1/3 px-3 mb-6 lg:mb-0">
                <?php if($link):?>
                  <a class="relative group hover:border-blue-500 hover:bg-white/50 block h-full w-full px-9 py-14 border-black border rounded-[3rem] transition duration-300" href="<?php echo $link['url'];?>" target="<?php echo $link['target'];?>">
                <?php else:?>
                  <div class="relative block h-full w-full px-9 py-14 border-black border rounded-[3rem]">
                <?php endif;?>
                  <span class="absolute opacity-0 text-blue-500 group-hover:opacity-100 transition duration-300 top-0 right-0 mt-16 mr-8">
                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M22 2L2 22" stroke="currentColor" stroke-width="3.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                      <path d="M22 20.3393V2H3.66071" stroke="currentColor" stroke-width="3.25" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                  </span>
                  <div>
                    <div class="max-w-xs pr-10">
                      <?php if($heading):?>
                        <h5 class="text-3xl xs:text-4xl mb-6"><?php echo $heading;?></h5>
                      <?php endif; ?>
                    </div>
                    <?php if($subheading):?>
                      <?php echo $subheading;?>
                    <?php endif; ?>
                  </div>
                <?php if($link):?>
                  </a>
                <?php else:?>
                 </div>
                <?php endif;?>
              </div>
            <?php endif;?>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>

<?php $section->end(); ?>
