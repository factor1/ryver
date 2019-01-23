<?php

/**
* KissMyButton Wordpress Optimization
* Fix render blocking JS
* Fix render blocking CSS
*/

global $non_critical_styles, $critical_styles;
$non_critical_styles = array();
$critical_styles = array();

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri(). '/style.css', array(), '1.1', 'all' );
	wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri(). '/custom.css', array(), '1.4', 'all' );
  wp_enqueue_style( 'ginger-grid', get_stylesheet_directory_uri() . '/f1-assets/ginger.min.css', array(), '2.2.0' );
  wp_enqueue_style( 'f1-styles', get_stylesheet_directory_uri() . '/f1-styles.min.css', array(), '1.2' );
	wp_enqueue_script( 'js-cookie-js', get_stylesheet_directory_uri(). '/js.cookie.js', array( 'jquery' ), '1.1', true ); //https://github.com/js-cookie/js-cookie
	wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri(). '/custom.js', array( 'jquery' ), '1.1', true );
  wp_enqueue_script( 'f1-js', get_stylesheet_directory_uri() . '/f1-assets/f1-scripts.js', array('jquery'), '1.1', true );
}

// eliminate render blocking

// add_action( 'wp_print_scripts', 'kmb_js_nonrender_blocking', 9999 );
// add_action( 'wp_enqueue_scripts', 'kmb_css', 9999999 );
// add_action( 'wp_enqueue_scripts', 'kmb_jquery_footer', 99999 );

add_action( 'wp_enqueue_scripts', 'enqueue_google_font' );

function enqueue_google_font() {
    wp_enqueue_style( 'lato', 'https://fonts.googleapis.com/css?family=Lato:300,400,700' );
}



function kmb_jquery_footer() {

    wp_scripts()->add_data( 'jquery', 'group', 1 );
    wp_scripts()->add_data( 'jquery-core', 'group', 1 );
    wp_scripts()->add_data( 'jquery-migrate', 'group', 1 );

}

function kmb_css() {
    global $wp_styles;

    wp_dequeue_style( 'timetable_font_lato' );
    wp_deregister_style( 'timetable_font_lato' );
    wp_dequeue_style( 'pt_sans-googleFonts' );
    wp_deregister_style( 'pt_sans-googleFonts' );

}

function kmb_add_noncritical_css() {
    global $non_critical_styles;
    if( ! empty( $non_critical_styles ) ) {
        foreach( $non_critical_styles as $s ) {
            wp_enqueue_style( $s );
        }
    }
}

function kmb_add_critical_css() {

    $critical = kmb_get_critical_css();
    echo '<style>' . $critical . '</style>';

}

function kmb_get_critical_css() {

    if( $critical = file_get_contents( get_template_directory() . '/css/stylesheet.min.css' ) ) {
        return $critical;
    }

    return false;

}

function kmb_js_nonrender_blocking() {

    global $wp_scripts;

    // a non render blocking script
    // loader by kissmybutton

    $bad_scripts = array(
        'jquery.prettyphoto',
        'video-lightbox',
        'ScrollToPlugin',
        'layerslider-greensock',
        'layerslider',
        'layerslider-transitions',
        'addtoany',
        'lbg-universal_video_player',
        'lbg-mousewheel',
        'lbg-touchSwipe',
        'lbg-screenfull',
        'lbg-vimeo',
        'lbg-google_a'
     );

    foreach( $wp_scripts->queue as $handle ) :

        if( in_array( $handle, $bad_scripts ) ) {
            // dequeue the script
            wp_dequeue_script( $handle );
            $script = $wp_scripts->registered[ $handle ];
            // move the script to the footer
            // before the closing </body> tag
            if( $handle === 'layerslider-greensock' ) {
                $script->deps = array( 'ScrollToPlugin' );
            }
            wp_enqueue_script( $handle, $script->src, $script->deps, $script->ver, true );
        }

    endforeach;

}

function qode_google_fonts_styles() {
    // override parent theme function
    // creating mess with fonts with
    // an empty function.
}

/*
function defer_parsing_of_js ( $url ) {
	if ( FALSE === strpos( $url, '.js' ) ) return $url;
	if ( strpos( $url, 'jquery.js' ) ) return $url;
	return "$url' defer='defer";
}
add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );
*/

add_image_size('features_hero', 1400, 1600, array('center', 'center') );
add_image_size('features_slider', 1300, 1080, false );
add_image_size('features_icon', 80, 50, false );
add_image_size('features_checklist', 1400, 540, array('center', 'center') );
add_image_size('column_icon', 80, 80, false );
