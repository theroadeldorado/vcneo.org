<?php
  $tag = get_sub_field('tag');
  $title = get_sub_field('title');
  $style = get_sub_field('style');
  $team_members = get_sub_field('team_members');
  $section->add_classes([
    'py-12 md:py-20 bg-coolGray-50 overflow-hidden'
  ]);
?>

<?php $section->start(); ?>
  <div x-data="{ activeSlide: 1, slideCount: 3 }">
    <div class="container mx-auto px-4">
      <div class="flex flex-wrap -mx-4 items-center mb-20">
        <div class="w-full lg:w-8/12 xl:w-1/2 px-4 mb-8 lg:mb-0">
          <?php if($title):?>
            <?php new Fire_Heading($tag, $title, $style); ;?>
          <?php endif; ?>
        </div>
        <div class="w-full lg:w-4/12 xl:w-1/2 px-4">
          <div class="flex items-center justify-end">
            <button class="inline-flex h-16 sm:h-18 w-16 sm:w-18 mr-8 items-center justify-center text-blue-500 hover:text-white hover:bg-blue-500 border border-blue-500 rounded-full transition duration-200" x-on:click="activeSlide = activeSlide > 1 ? activeSlide - 1 : slideCount">
              <span class="w-8 h-8 flex items-center justify-center">
                <svg viewbox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.7051 7.12817L4.15732 13.6759L10.7051 20.2237" stroke="currentColor" stroke-width="1.61806" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M22.4941 13.6759H4.33949" stroke="currentColor" stroke-width="1.61806" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </span>
            </button>
            <button class="inline-flex h-16 sm:h-18 w-16 sm:w-18 items-center justify-center text-blue-500 hover:text-white hover:bg-blue-500 border border-blue-500 rounded-full transition duration-200" x-on:click="activeSlide = activeSlide < slideCount ? activeSlide + 1 : 1">
              <span class="w-8 h-8 flex items-center justify-center">
                <svg viewbox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M16.2949 7.12817L22.8427 13.6759L16.2949 20.2237" stroke="currentColor" stroke-width="1.61806" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M4.50586 13.6759H22.6605" stroke="currentColor" stroke-width="1.61806" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </span>
            </button>
          </div>
        </div>
      </div>
      <div :style="'transform: translateX(-' + (activeSlide - 1) * 100.5 + '%)'" class="transition-transform duration-500 ease-in-out" style="transform: translateX(-0%)">
        <div class="flex items-center">
          <?php foreach ($team_members as $team_member):
            $name = get_field('full_name', $team_member);
            $title = get_field('title', $team_member);
            $email = get_field('email', $team_member);
            $image = get_field('image', $team_member);
            $short_bio = get_field('short_bio', $team_member);
          ?>
            <div class="flex-shrink-0 mr-6 xl:mr-12 w-full max-w-md">
              <?php if($image):?>
                <?php echo ResponsivePics::get_picture($image['id'], 'sm:400 300|f, md:400 300|f, lg:800 600|f', 'block mb-8', true, true); ?>
              <?php endif; ?>
              <div class="max-w-sm">
                <?php if($title):?>
                  <span class="text-sm text-coolGray-600"><?php echo $title;?></span>
                <?php endif; ?>
                <?php if($name):?>
                  <h4 class="text-3xl mt-1 mb-6"><?php echo $name;?></h4>
                <?php endif; ?>
                <?php if($short_bio):?>
                  <div class="text-sm text-coolGray-500 wizzy"><?php echo $short_bio;?></div>
                <?php endif; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
<?php $section->end(); ?>
