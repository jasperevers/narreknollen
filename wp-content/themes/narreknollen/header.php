<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
    <link rel="icon" type="image/png" href="<?= content_url('/uploads/2025/11/logo128x128.png') ?>">
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<nav class="navbar" id="site-navbar">
    <div class="navbar__container">
        <a href="<?php echo esc_url(site_url()) ?>" class="navbar__logo">SKV De Narre Knollen</a>

        <button class="navbar__toggle" id="menu-toggle" aria-label="Menu">&#9776;</button>

        <div class="navbar__links desktop">
            <?php wp_nav_menu([
                'theme_location' => 'headerMenuLocation',
                'container'      => false,
                'menu_class'     => 'nav-links',
            ]); ?>
        </div>
    </div>
</nav>

<div class="mobileMenu" id="mobile-menu">
    <div class="mobileMenu__overlay" id="menu-overlay"></div>
    <div class="mobileMenu__panel">
        <?php wp_nav_menu([
            'theme_location' => 'headerMenuLocation',
            'container'      => false,
            'menu_class'     => 'mobile-nav-links',
        ]); ?>
    </div>
</div>
