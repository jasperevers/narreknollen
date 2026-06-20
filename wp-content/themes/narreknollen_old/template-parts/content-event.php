<?php
$date = new DateTime(get_field('event_date'));
$id = get_the_ID();
$location = get_field("event_location", $id);
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
?>

<div class="event-summary">
    <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">
        <span class="event-summary__day"><?php echo $date->format('d') ?></span>
        <span class="event-summary__month"><?= $months[$monthNumber]; ?></span>
    </a>
    <div class="event-summary__content">
        <h5 class="event-summary__title headline headline--tiny"><a
                    href="<?php the_permalink(); ?>"><?php the_title() ?> </a></h5>
        <p class="event-summary__location"><?= $location ?></p>
        <p><?php if (has_excerpt()) {
                echo get_the_excerpt();
            } else {
                echo wp_trim_words(get_the_content(), 40);
            } ?>
            <a href="<?php the_permalink(); ?>" class="nu gray"> Meer lezen</a></p>
    </div>
</div>