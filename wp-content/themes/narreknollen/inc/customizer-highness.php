<?php
/** Customizer settings for the current highness. */
function narreknollen_highness_customizer($wp_customize) {
    $wp_customize->add_section('highness_settings', array('title' => 'Huidige hoogheid', 'priority' => 35));
    $fields = array(
        'title' => array('Titel', 'Huidige hoogheid'),
        'subtitle' => array('Ondertitel', 'Onze regerende hoogheid van dit seizoen'),
        'role_1' => array('Rol persoon 1 (bijvoorbeeld Prins of Prinses)', 'Prins'),
        'name_1' => array('Naam persoon 1', 'Martijn I'),
        'role_2' => array('Rol persoon 2 (bijvoorbeeld Prinses of Adjudant)', 'Adjudant'),
        'name_2' => array('Naam persoon 2 (leeg laten om te verbergen)', 'Martin'),
        'image_alt' => array('Beschrijving van de foto', 'Huidige hoogheid'),
    );
    foreach ($fields as $key => $field) {
        $id = 'highness_' . $key;
        $wp_customize->add_setting($id, array('default' => $field[1], 'sanitize_callback' => 'sanitize_text_field'));
        $wp_customize->add_control($id, array('label' => $field[0], 'section' => 'highness_settings', 'type' => 'text'));
    }
    $wp_customize->add_setting('highness_image', array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'highness_image', array('label' => 'Foto', 'section' => 'highness_settings')));
    $wp_customize->add_setting('highness_position', array('default' => 'below', 'sanitize_callback' => 'narreknollen_highness_position'));
    $wp_customize->add_control('highness_position', array('label' => 'Positie van de namen', 'section' => 'highness_settings', 'type' => 'select', 'choices' => array('above' => 'Boven de foto', 'below' => 'Onder de foto')));
}
function narreknollen_highness_position($value) {
    return in_array($value, array('above', 'below'), true) ? $value : 'below';
}
add_action('customize_register', 'narreknollen_highness_customizer');
