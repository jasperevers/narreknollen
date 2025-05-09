<div class="event-summary">

    <?php if (has_post_thumbnail()) {
        ?>
        <a class="event-summary__img" href="<?php the_permalink(); ?>">


        <?php
        echo get_the_post_thumbnail();
        ?>
        </a>
        <?php
    } else {
        ?>
        <a class="event-summary__date event-summary__date--beige t-center" href="<?php the_permalink(); ?>">
            <span class="event-summary__month">
                <?php
                $date = new DateTime(get_field('news_date'));
                $id = get_the_ID();
                $months = [
                    'Jan',
                    'Feb',
                    'Mrt',
                    'Apr',
                    'Mei',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Okt',
                    'Nov',
                    'Dec'
                ];

                $monthNumber = $date->format('n') - 1;
                echo $months[$monthNumber];
                ?>
            </span>
            <span class="event-summary__day"><?= $date->format('d') ?></span>
        </a>
        <?php
    }

    ?>


    <div class="event-summary__content">
        <h5 class="event-summary__title headline headline--tiny"><a
                    href="<?php the_permalink(); ?>"><?php the_title() ?></a></h5>
        <p><?php if (has_excerpt()) {
                echo get_the_excerpt();
            } else {
                echo wp_trim_words(get_the_content(), 40);
            } ?> <a href="<?php the_permalink(); ?>" class="nu gray">Meer lezen</a>
        </p>
    </div>
</div>
