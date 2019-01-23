<?php
/*
 * Feature Columns
 */

// Custom Fields
$headline = get_field('three_column_headline');

if( have_rows('columns') ) : ?>

  <section class="g-container features-columns">
    <div class="g-row">
      <div class="g-col-12 text-center">
        <h1><?php echo $headline; ?></h1>
      </div>

      <?php while( have_rows('columns') ) : the_row();
        $icon = wp_get_attachment_image_src(get_sub_field('icon'), 'column_icon');
        $headline = get_sub_field('headline');
        $content = get_sub_field('content'); ?>

        <div class="g-col-4 text-center">
          <div>
            <img src="<?php echo $icon[0]; ?>" alt="column icon">
          </div>

          <div>
            <h2><strong><em><?php echo $headline; ?></em></strong></h2>

            <?php echo $content; ?>
          </div>
        </div>

      <?php endwhile; ?>

    </div>
  </section>

<?php endif; ?>
