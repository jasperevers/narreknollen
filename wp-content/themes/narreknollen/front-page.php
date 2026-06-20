<?php get_header(); ?>

<?php
$header_background_image_id = get_theme_mod('header_background_image');
$bg_url = $header_background_image_id
    ? esc_url(wp_get_attachment_url($header_background_image_id))
    : esc_url(content_url('/uploads/2025/11/Groep-2025-2026-scaled.jpg'));
?>

<!-- HERO -->
<section class="hero" style="background-image: url('<?= $bg_url ?>');">
    <div class="hero__overlay">
        <div class="hero__content">
            <h1 class="hero__title">De Narre Knollen</h1>
            <p class="hero__subtitle">Het mooiste carnaval van Soest begint hier</p>
            <div class="hero__actions">
                <a href="<?= esc_url(site_url('/agenda')) ?>" class="btn">Bekijk events</a>
            </div>
        </div>
    </div>
</section>

<!-- HUIDIGE HOOGHEID -->
<section class="section container">
    <div class="highness">
        <h2 class="highness__title">Huidige hoogheid</h2>
        <p class="highness__subtitle">Onze regerende hoogheid van dit seizoen</p>

        <div class="highness__imageWrapper">
            <img
                src="<?= esc_url(content_url('/uploads/2025/11/MG_8104b-scaled.jpg')) ?>"
                alt="Huidige hoogheid"
                class="highness__image"
            >
        </div>

        <div class="highness__info">
            <div class="highness__person">
                <p class="highness__roleLabel">Prins</p>
                <p class="highness__name">Martijn I</p>
            </div>
            <div class="highness__person">
                <p class="highness__roleLabel">Adjudant</p>
                <p class="highness__name">Martin</p>
            </div>
        </div>
    </div>
</section>

<!-- OVER ONS -->
<section class="section container">
    <h2>Over ons</h2>
    <p class="section__subtitle">
        De Narre Knollen zijn dé carnavalsvereniging van Soest.
        Samen vieren wij elk jaar een onvergetelijk feest!
    </p>

    <div class="grid mt-md">
        <div class="custom-card">
            <h3>Feesten</h3>
            <p>De gezelligste avonden van het jaar</p>
        </div>
        <div class="custom-card">
            <h3>Traditie</h3>
            <p>Al jaren een begrip in Knollendam</p>
        </div>
        <div class="custom-card">
            <h3>Samen</h3>
            <p>Carnaval vier je samen!</p>
        </div>
    </div>
</section>

<!-- EVENEMENTEN -->
<section class="section container">
    <h2>Evenementen</h2>

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

    <p class="t-center mt-md">
        <a href="<?= esc_url(site_url('/agenda')) ?>" class="btn">Jaar agenda</a>
    </p>
</section>

<?php get_footer(); ?>
