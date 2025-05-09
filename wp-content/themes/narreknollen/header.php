<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
    <link rel="icon" type="image/png" href="<?= get_theme_file_uri('/assets/images/logo128x128.png') ?>">
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="site-header">
    <div class="container">
        <h1 class="school-logo-text float-left">
            <a href="<?php echo site_url() ?>"><strong>SKV De Narre Knollen</strong></a>
        </h1>
        <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search"
                                                                       aria-hidden="true"></i></span>
        <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
        <div class="site-header__menu group">
            <nav class="main-navigation">
                <?php
                wp_nav_menu([
                    'theme_location' => "headerMenuLocation"
                ]);
                ?>
            </nav>
            <div class="site-header__util">
                <span class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
            </div>
        </div>
    </div>
</header>