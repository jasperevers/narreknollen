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
        <h1 class="page-banner__title">agenda</h1>
        <div class="page-banner__intro">
        </div>
    </div>
</div>

<div class="container container--narrow page-section">
    <?php
    $today = date('Ymd');
    $homepageEvents = new WP_Query(
        [
            'nopaging' => true,
            'post_type' => 'agenda',
            'meta_key' => 'event_date',
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
            'meta_query' => [
                [
                    'key' => 'event_date',
                    'compare' => '>=',
                    'value' => $today,
                    'type' => 'numeric'
                ]

            ]
        ]);

    while ($homepageEvents->have_posts()) {
        $homepageEvents->the_post();
        get_template_part('template-parts/content', 'event');
    }
    echo paginate_links();
    ?>
</div>

<?php get_footer(); ?>
