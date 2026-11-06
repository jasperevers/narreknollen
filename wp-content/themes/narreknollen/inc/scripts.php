<?php
/**
 * Scripts
 *
 * @package        Narreknollen
 * @subpackage     Narreknollen
 * @author         Jasper_Evers
 * @copyright      https://narreknollen.nl
 */
function narreknollen_files() {
    wp_enqueue_script('main-narreknollen_old-js', get_theme_file_uri('/build/main.js'), array('jquery'), '1.0', true);
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('narreknollen_main_styles', get_theme_file_uri('/build/style-index.css'));

//    bootstrap
//    wp_enqueue_style(
//        'bootstrap-css',
//        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
//        [],
//        '5.3.3'
//    );
//    wp_enqueue_script(
//        'bootstrap-js',
//        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
//        [],
//        '5.3.3',
//        true
//    );
}

add_action('wp_enqueue_scripts', 'narreknollen_files');
