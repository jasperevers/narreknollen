<?php
/**
 * Wordpress Underscore functions and definitions
 *
 * @package        Narreknollen
 * @subpackage     Narreknollen
 * @author         Jasper_evers
 * @copyright      https://narreknollen.nl
 * @link           https://developer.wordpress.org/themes/basics/theme-functions/
 */


/**
 * scripts.
 */
require __DIR__ .'/inc/scripts.php';

/**
 * posttypes.
 */
require __DIR__ .'/inc/posttypes.php';

/**
 * posttypes.
 */
require __DIR__ .'/inc/posts_admin_listing.php';

/**
 * navigations.
 */
require __DIR__ .'/inc/navigations.php';


function narreknollen_features(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme','narreknollen_features');

/**
 * excerpt.
 */

function excerpt_more( $more ) {
    return '...';
}

// prins/prinsessen card excerpt length
function custom_excerpt_length( $length ) {
    return 20;
}

add_filter( 'excerpt_more', 'excerpt_more' );
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// event excerpt
function custom_agenda_excerpt_length( $length ) {
    if ( get_post_type() == 'agenda' ) {
        return 30;
    }
    else {
        return $length;
    }
}
add_filter( 'excerpt_length', 'custom_agenda_excerpt_length', 999 );

//remove p tag from content

remove_filter('the_content','wpautop');

/**
 * header img settings.
 */

// Add a custom section in the WordPress Customizer
function custom_theme_customize_register($wp_customize) {
    $wp_customize->add_section('header_settings', array(
        'title' => __('Header instellingen', 'your-theme-slug'),
        'priority' => 30,
    ));

    // Add a setting for the background image
    $wp_customize->add_setting('header_background_image', array(
        'default' => '',
        'transport' => 'refresh',
    ));

    // Add a control to select or upload the background image from the media library
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'header_background_image', array(
        'label' => __('Header achtergrond afbeelding', 'your-theme-slug'),
        'section' => 'header_settings',
        'settings' => 'header_background_image',
    )));
}

add_action('customize_register', 'custom_theme_customize_register');

/**
 * slider imges settings.
 */

function custom_theme_customizer_settings($wp_customize) {
    // Add a new section for slider settings
    $wp_customize->add_section('slider_settings_section', array(
        'title' => __('Slider Settings', 'textdomain'),
        'priority' => 30,
    ));

    // Add slider count setting
    $wp_customize->add_setting('slider_count_setting', array(
        'default' => 3,
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('slider_count_setting', array(
        'label' => __('Number of Slides', 'textdomain'),
        'section' => 'slider_settings_section',
        'type' => 'number',
    ));

    // Add individual image settings
    for ($i = 1; $i <= get_theme_mod('slider_count_setting', 3); $i++) {
        $wp_customize->add_setting('slider_image_' . $i, array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'slider_image_' . $i, array(
            'label' => __('Slide Image ' . $i, 'textdomain'),
            'section' => 'slider_settings_section',
        )));
    }
}

add_action('customize_register', 'custom_theme_customizer_settings');



