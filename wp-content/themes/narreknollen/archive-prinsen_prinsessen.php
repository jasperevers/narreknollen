<?php
// Temporary debug line - remove after testing
echo '<!-- Custom archive template is loading -->';

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
        <h1 class="page-banner__title">Prinsen en Prinsessen galarij</h1>
        <div class="page-banner__intro">
        </div>
    </div>
</div>

<div class="container page-section">
    <div class="generic-content">
        <?php if (have_posts()) : ?>
            <div class="row row-cols-1 row-cols-lg-2 g-4">
                <?php while (have_posts()) : the_post();
                    $id = get_the_ID();
                    $img = has_post_thumbnail($id) ? get_the_post_thumbnail_url() : 'https://via.placeholder.com/200x300';
                    ?>
                    <div class="col">
                        <div class="card">
                            <div class="row no-gutters">
                                <div class="col-sm-5">
                                    <img class="card-img" src="<?= $img; ?>" alt="<?php the_title(); ?>" loading="lazy">
                                </div>
                                <div class="col-sm-6">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <bold><?php the_title(); ?></bold>
                                        </h5>
                                        <p class="card-text"><?= get_the_excerpt(); ?></p>
                                        <p class="card-text"><?= get_field("years", $id) ?></p>
                                        <a href="<?php the_permalink(); ?>"
                                           class="btn btn-primary"><?php the_title(); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <?php
            the_posts_pagination(array(
                'prev_text' => __('&laquo; Vorige'),
                'next_text' => __('Volgende &raquo;'),
            ));
            ?>

        <?php else : ?>
            <p><?php _e('Er zijn geen prinsen of prinsessen om te laten zien'); ?></p>
        <?php endif; ?>
    </div>
</div>

<?php
get_footer();
?>