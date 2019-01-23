<?php
/*
 * Features Checklist
 */

// Custom Fields
$img = wp_get_attachment_image_src(get_field('checklist_background'), 'features_checklist');
$headline = get_field('checklist_headline');
$subHeadline = get_field('checklist_subheadline'); ?>

<section class="g-container features-checklist" style="background: url('<?php echo $img[0]; ?>') center/cover no-repeat">
  <div class="g-row">
    <div class="g-col-12 text-center">
      <h1><?php echo $headline; ?></h1>

      <h2><strong><em><?php echo $subHeadline; ?></em></strong></h2>

      <?php if( have_rows('checklist') ) : ?>

        <div class="list">

          <?php while( have_rows('checklist') ) : the_row(); ?>

            <div>
              <i class="fa fa-check" aria-hidden="true"></i>

              <p><?php the_sub_field('item'); ?></p>
            </div>

          <?php endwhile; ?>

        </div>

      <?php endif; ?>

    </div>
  </div>
</section>
