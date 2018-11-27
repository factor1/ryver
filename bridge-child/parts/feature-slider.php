<?php
/*
 * Features Slider
 */

if( have_rows('slider_sections') ) :
  $x = 1;

  while( have_rows('slider_sections') ) : the_row();

  // Custom Fields
  $sectionColor = get_sub_field('section_color'); // white or gray
  $layoutOption = get_sub_field('section_layout_option'); // images on left or right
  $headline = get_sub_field('section_headline');
  $subHeadline = get_sub_field('section_subheadline');

  // Conditional classes/styles
  $rowClass = $layoutOption == 'right' ? ' g-row--reverse' : '';
  $color = $sectionColor == 'white' ? '' : ' style="background-color: #f1f4f6;"'; ?>

  <section class="g-container feature-slider"<?php echo $color; ?>>
    <div class="g-row">
      <div class="g-col-12 text-center">
        <?php if( $headline ) : ?>
          <h1><?php echo $headline; ?></h1>
        <?php endif; ?>

        <h2><strong><em><?php echo $subHeadline; ?></em></strong></h2>
      </div>
    </div>

    <?php if( have_rows('slides') ) :
      $i = 1;
      $t = 1; ?>

      <div class="g-row g-row--align-items-center<?php echo $rowClass; ?>">
        <div class="g-col-5 g-sm-col-8 sm-col-centered">

          <?php while( have_rows('slides') ) : the_row();
            $img = wp_get_attachment_image_src(get_sub_field('image'), 'features_slider');
            $activeClass = $i == 1 ? ' class="active"' : ''; ?>

            <img src="<?php echo $img[0]; ?>"<?php echo $activeClass; ?> id="slide--<?php echo $x . '-' . $i; ?>" alt="<?php echo $headline; ?> image">

          <?php $i++; endwhile; ?>

        </div>

        <div class="g-col-6">

          <?php while( have_rows('slides') ) : the_row();
            $icon = wp_get_attachment_image_src(get_sub_field('headline_icon'), 'features_icon');
            $headline = get_sub_field('headline');
            $content = get_sub_field('content');
            $activeClass = $t == 1 ? ' class="active"' : ''; ?>

            <div<?php echo $activeClass; ?> id="slide--<?php echo $x . '-' . $t; ?>">
              <h2 class="feature-slider__headline"><img src="<?php echo $icon[0]; ?>" alt="Icon"> <?php echo $headline; ?></h2>

              <?php echo $content; ?>
            </div>

          <?php $t++; endwhile; ?>

        </div>
      </div>

    <?php endif; ?>

  </section>

<?php $x++; endwhile; endif; ?>
