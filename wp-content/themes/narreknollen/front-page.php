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
<?php
$highness_image = get_theme_mod('highness_image', '') ?: content_url('/uploads/2025/11/MG_8104b-scaled.jpg');
$highness_position = narreknollen_highness_position(get_theme_mod('highness_position', 'below'));
?>
<section class="section container">
    <div class="highness">
        <h2 class="highness__title"><?= esc_html(get_theme_mod('highness_title', 'Huidige hoogheid')) ?></h2>
        <p class="highness__subtitle"><?= esc_html(get_theme_mod('highness_subtitle', 'Onze regerende hoogheid van dit seizoen')) ?></p>
        <?php foreach (array('above', 'below') as $position) : ?>
            <?php if ('below' === $position) : ?>
                <div class="highness__imageWrapper">
                    <img src="<?= esc_url($highness_image) ?>" alt="<?= esc_attr(get_theme_mod('highness_image_alt', 'Huidige hoogheid')) ?>" class="highness__image">
                </div>
            <?php endif; ?>
            <?php if ($highness_position === $position) : ?>
                <div class="highness__info"<?= 'above' === $position ? ' style="margin-bottom: 18px;"' : '' ?>>
                    <?php foreach (array(1 => array('Prins', 'Martijn I'), 2 => array('Adjudant', 'Martin')) as $number => $defaults) : ?>
                        <?php $name = get_theme_mod('highness_name_' . $number, $defaults[1]); ?>
                        <?php if ('' !== trim($name)) : ?>
                            <div class="highness__person">
                                <p class="highness__roleLabel"><?= esc_html(get_theme_mod('highness_role_' . $number, $defaults[0])) ?></p>
                                <p class="highness__name"><?= esc_html($name) ?></p>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
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
