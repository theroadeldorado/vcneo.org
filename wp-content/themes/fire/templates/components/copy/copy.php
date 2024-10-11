<?php
  $style = get_sub_field('style');
  $copy = get_sub_field('copy');

  $section->add_classes([
    'py-12 md:py-20 bg-tan'
  ]);
?>

<?php $section->start(); ?>

  <div class="container wizzy">
    <div class="<?php echo $style === 'small' ? 'mx-auto max-w-3xl' : '';?>">
      <?php echo $copy; ?>
    </div>
  </div>
<?php $section->end(); ?>
