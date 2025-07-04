<?php

get_header();

while(have_posts()) {
    the_post(); ?>

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
            </div>
        </div>
    </div>

    <div class="container container--narrow page-section">

        <?php
        $theParent = wp_get_post_parent_id(get_the_ID());
        if($theParent){ ?>
            <div class="metabox metabox--position-up metabox--with-home-link">
                <p>
                    <a class="metabox__blog-home-link" href="<?php echo get_permalink($theParent); ?>">
                        <i class="fa fa-home" aria-hidden="true"></i> terug naar <?php echo get_the_title($theParent);  ?></a>
                    <span class="metabox__main"><?php the_title(); ?></span>
                </p>
            </div>
        <?php } ?>

        <?php
        $testArray= get_pages([
            'child_of' => get_the_ID()
        ]);

        if ($theParent || $testArray ){
            ?>
            <div class="page-links">
                <h2 class="page-links__title"><a href="<?= get_permalink($theParent) ?>"><?= get_the_title($theParent); ?></a></h2>
                <ul class="min-list">
                    <?php
                    if ($theParent){
                        $findChildrenOf = $theParent;
                    }else{
                        $findChildrenOf = get_the_ID();
                    }
                    wp_list_pages([
                        'title_li' => NULL,
                        'child_of' => $findChildrenOf
                    ]);
                    ?>
                </ul>
            </div>
        <?php } ?>


        <div class="generic-content">
            <?php the_content(); ?>
        </div>

    </div>

<?php }

get_footer();

?>