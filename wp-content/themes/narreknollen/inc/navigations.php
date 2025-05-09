<?php
function narreknollen_navigations() {
    register_nav_menu('headerMenuLocation','Header Nav');
    register_nav_menu('footerLocationOne','Footer Nav locatie 1');
    register_nav_menu('footerLocationTwo','Footer Nav locatie 2');

}

add_action('after_setup_theme', 'narreknollen_navigations');
