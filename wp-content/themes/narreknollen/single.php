<?php

get_header();
?>

    <div class="page-banner">
        <?php
        $header_background_image_id = get_theme_mod('header_background_image');
        if ($header_background_image_id) {
            $header_background_image_url = wp_get_attachment_url($header_background_image_id);
            echo '<div class="page-banner__bg-image" style="background-image: url(' . esc_url($header_background_image_url) . ');">';
            echo '</div>';
        } else {
            echo '<div class="page-banner__bg-image" style="background-image: url(' . content_url("/uploads/2023/02/Groepsfoto-scaled.jpg") .')"></div>';
        }

        ?>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php the_title() ?></h1>
            <div class="page-banner__intro">
            </div>
        </div>
    </div>
<?php
while (have_posts()) {
    the_post(); ?>
    <div class="container container--narrow">
        <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>
    </div>
<?php }

get_footer();

?>