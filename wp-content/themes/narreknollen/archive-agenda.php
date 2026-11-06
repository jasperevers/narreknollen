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
    <div class="grid mt-md">
        <?php
        $today = date('Ymd');
        $homepageEvents = new WP_Query([
                'posts_per_page' => 3,
                'post_type'      => 'agenda',
                'meta_key'       => 'event_date',
                'orderby'        => 'meta_value_num',
                'order'          => 'ASC',
                'meta_query'     => [[
                        'key'     => 'event_date',
                        'compare' => '>=',
                        'value'   => $today,
                        'type'    => 'numeric',
                ]],
        ]);

        while ($homepageEvents->have_posts()) {
            $homepageEvents->the_post();
            $event_date = get_post_meta(get_the_ID(), 'event_date', true);
            $location   = get_post_meta(get_the_ID(), 'event_location', true);
            $date_fmt   = $event_date ? date_i18n('j M', strtotime($event_date)) : '';
            ?>
            <a href="<?= esc_url(get_the_permalink()) ?>" class="custom-card custom-card--link">
                <h3><?= get_the_title() ?></h3>
                <?php if ($location): ?>
                    <p class="custom-card__location"><?= esc_html($location) ?></p>
                <?php endif; ?>
                <?php if ($date_fmt): ?>
                    <p class="custom-card__date"><?= esc_html($date_fmt) ?></p>
                <?php endif; ?>
                <p class="custom-card__summary"><?= wp_trim_words(get_the_excerpt(), 15) ?></p>
                <span class="custom-card__link">Meer info →</span>
            </a>
            <?php
        }
        wp_reset_postdata();
        ?>
    </div>
</div>

<?php get_footer(); ?>
