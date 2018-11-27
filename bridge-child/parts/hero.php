<?php
/*
 * Features Hero
 */

// Custom Fields
$img = wp_get_attachment_image_src(get_field('features_hero_background'), 'features_hero');
$headline = get_field('features_hero_headline');
$btn = get_field('features_hero_button'); ?>

<section class="g-container features-hero" style="background: url('<?php echo $img[0]; ?>') center/cover no-repeat">
  <div class="g-row">
    <div class="g-col-12 text-center">
      <h1><?php echo $headline; ?></h1>

      <a href="<?php echo esc_url($btn['url']); ?>" class="qbutton big_large" role="link" title="<?php echo $btn['title']; ?>">
        <?php echo $btn['title']; ?>
      </a>
    </div>
  </div>
</section>
