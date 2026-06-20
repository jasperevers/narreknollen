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
        <h1 class="page-banner__title"><?php the_title(); ?></h1>
        <div class="page-banner__intro">
            <?php if (get_field('years')): ?>
                <p>Regeerperiode: <?php echo esc_html(get_field('years')); ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="container container--narrow page-section">
    <div class="generic-content">
        <div class="row">
            <div class="col-md-4">
                <?php 
                if (has_post_thumbnail()) {
                    the_post_thumbnail('large', ['class' => 'img-fluid']);
                }
                ?>
                <?php if (get_field('function')): ?>
                    <p><strong>Functie:</strong> <?php echo esc_html(get_field('function')); ?></p>
                <?php endif; ?>
            </div>
            <div class="col-md-8">
                <?php
                while(have_posts()) {
                    the_post();
                    the_content();
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>