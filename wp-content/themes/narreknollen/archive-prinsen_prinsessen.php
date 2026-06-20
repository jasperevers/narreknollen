<?php
get_header();
?>

<section class="page-banner">
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
        <h1 class="page-banner__title">Prinsen en Prinsessen galarij</h1>
        <div class="page-banner__intro">
        </div>
    </div>
</section>

<section class="container page-section">
    <div class="generic-content">
        <?php
        $args = array(
            'post_type' => 'prinsen_prinsessen',
            'posts_per_page' => -1, // Show all posts
            'meta_key' => 'sorting_year',
            'orderby' => 'meta_value_num',
            'order' => 'DESC'
        );
        $query = new WP_Query($args);

        if ($query->have_posts()) : ?>
            <div class="row row-cols-1 row-cols-lg-2 g-4">
                <?php while ($query->have_posts()) : $query->the_post();
                    $id = get_the_ID();
                    $img = has_post_thumbnail($id) ? get_the_post_thumbnail_url() : 'https://via.placeholder.com/200x300';
                    ?>
                    <div class="col">
                        <article class="highness-card">
                            <div class="row g-0 h-100">
                                <div class="col-sm-5">
                                    <img
                                            class="highness-card__image"
                                            src="<?= esc_url($img); ?>"
                                            alt="<?php the_title_attribute(); ?>"
                                            loading="lazy"
                                    >
                                </div>

                                <div class="col-sm-7">
                                    <div class="highness-card__body">
                                        <h3 class="highness-card__title">
                                            <?php the_title(); ?>
                                        </h3>

                                        <p class="highness-card__excerpt">
                                            <?= esc_html(get_the_excerpt()); ?>
                                        </p>

                                        <?php if (get_field("years", $id)) : ?>
                                            <p class="highness-card__years">
                                                <?= esc_html(get_field("years", $id)); ?>
                                            </p>
                                        <?php endif; ?>

                                        <a href="<?php the_permalink(); ?>" class="highness-card__button">
                                            Lees meer
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p><?php _e('Er zijn geen prinsen of prinsessen om te laten zien'); ?></p>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();
?>