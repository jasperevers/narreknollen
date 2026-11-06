<?php
/** People saved by older versions remain available until the new list is published. */
function narreknollen_highness_people() {
    $people = get_theme_mod('highness_people', null);
    if (null !== $people) {
        return narreknollen_sanitize_highness_people($people);
    }
    $people = array();
    for ($i = 1; $i <= 6; $i++) {
        $name = get_theme_mod('highness_name_' . $i, 1 === $i ? 'Martijn I' : (2 === $i ? 'Martin' : ''));
        if ('' !== trim($name)) {
            $people[] = array('role' => get_theme_mod('highness_role_' . $i, 1 === $i ? 'Prins' : 'Adjudant'), 'name' => $name);
        }
    }
    return $people;
}
function narreknollen_sanitize_highness_people($value) {
    if (is_string($value)) {
        $value = json_decode($value, true);
    }
    $people = array();
    if (!is_array($value)) {
        return $people;
    }
    foreach ($value as $person) {
        if (!is_array($person)) { continue; }
        $people[] = array(
            'role' => isset($person['role']) && is_scalar($person['role']) ? sanitize_text_field($person['role']) : '',
            'name' => isset($person['name']) && is_scalar($person['name']) ? sanitize_text_field($person['name']) : '',
        );
    }
    return $people;
}
function narreknollen_highness_customizer($wp_customize) {
    if (!class_exists('Narreknollen_People_Control')) {
        class Narreknollen_People_Control extends WP_Customize_Control {
            public function render_content() {
                echo '<input type="hidden" class="highness-people-value" ';
                $this->link();
                echo ' value="' . esc_attr(wp_json_encode(narreknollen_highness_people())) . '" />';
                echo '<span class="customize-control-title">Personen</span><p>Voeg personen toe en vul hun rol en naam in. Een lege naam wordt niet getoond.</p><div class="highness-people-list"></div><button type="button" class="button highness-add-person">+ Persoon toevoegen</button>';
            }
            public function enqueue() {
                wp_enqueue_script('narreknollen-highness-customizer', get_theme_file_uri('/assets/js/customizer-highness.js'), array('customize-controls', 'jquery'), filemtime(get_theme_file_path('/assets/js/customizer-highness.js')), true);
            }
        }
    }
    $wp_customize->add_section('highness_settings', array('title' => 'Huidige hoogheid', 'priority' => 35));
    $fields = array(
        'title' => array('Titel', 'Huidige hoogheid'),
        'subtitle' => array('Ondertitel', 'Onze regerende hoogheid van dit seizoen'),
        'image_alt' => array('Beschrijving van de foto', 'Huidige hoogheid'),
    );
    foreach ($fields as $key => $field) {
        $id = 'highness_' . $key;
        $wp_customize->add_setting($id, array('default' => $field[1], 'sanitize_callback' => 'sanitize_text_field'));
        $wp_customize->add_control($id, array('label' => $field[0], 'section' => 'highness_settings', 'type' => 'text'));
    }
    $wp_customize->add_setting('highness_people', array('default' => wp_json_encode(narreknollen_highness_people()), 'transport' => 'refresh', 'sanitize_callback' => 'narreknollen_sanitize_highness_people_json'));
    $wp_customize->add_control(new Narreknollen_People_Control($wp_customize, 'highness_people', array('section' => 'highness_settings')));
    $wp_customize->add_setting('highness_image', array('default' => '', 'sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'highness_image', array('label' => 'Foto', 'section' => 'highness_settings')));
    $wp_customize->add_setting('highness_image_size', array('default' => 'medium', 'transport' => 'refresh', 'sanitize_callback' => 'narreknollen_highness_image_size'));
    $wp_customize->add_control('highness_image_size', array('label' => 'Fotogrootte', 'section' => 'highness_settings', 'type' => 'radio', 'choices' => array('super-small' => 'Super small', 'small' => 'Small', 'medium' => 'Medium', 'large' => 'Large', 'extra-large' => 'Extra large')));
    $wp_customize->add_setting('highness_position', array('default' => 'below', 'sanitize_callback' => 'narreknollen_highness_position'));
    $wp_customize->add_control('highness_position', array('label' => 'Positie van de namen', 'section' => 'highness_settings', 'type' => 'select', 'choices' => array('above' => 'Boven de foto', 'below' => 'Onder de foto')));
}
function narreknollen_highness_position($value) {
    return in_array($value, array('above', 'below'), true) ? $value : 'below';
}
add_action('customize_register', 'narreknollen_highness_customizer');

function narreknollen_sanitize_highness_people_json($value) {
    return wp_json_encode(narreknollen_sanitize_highness_people($value));
}

function narreknollen_highness_image_size($value) {
    return in_array($value, array('super-small', 'small', 'medium', 'large', 'extra-large'), true) ? $value : 'medium';
}
function narreknollen_highness_image_width() {
    $widths = array('super-small' => 240, 'small' => 360, 'medium' => 520, 'large' => 760, 'extra-large' => 1040);
    return $widths[narreknollen_highness_image_size(get_theme_mod('highness_image_size', 'medium'))];
}