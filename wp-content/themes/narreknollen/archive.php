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
        <h1 class="page-banner__title"><?php the_archive_title() ?></h1>
        <div class="page-banner__intro">
        </div>
    </div>
</div>

<div class="container container--narrow page-section">
    <p>dit is de standaard pagina voor archive</p>
    <?php
    while (have_posts()){
        the_post();?>
        <div class="post-item">
            <h2 class="headline headline--medium headline--post-title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>

            <div class="metabox">
                <p>Posted by <?php the_author_posts_link(); ?> on <?php the_time('n-j-y'); ?> in <?php echo get_the_category_list(', ') ?></p>
            </div>

            <div class="generic-content">
                <?php the_excerpt(); ?>
                <p><a class="btn btn--blue" href="<?php the_permalink(); ?>">Continue reading &raquo;</a></p>
            </div>
        </div>
    <?php }
    echo paginate_links();
    ?>
</div>

<?php  get_footer();  ?>
