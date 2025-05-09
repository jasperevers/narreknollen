<?php
// Add post thumbnail column to admin listing for prinsenprinsessen
function add_post_custom_columns_prinsenprinsessen($columns)
{
    $new_columns = array();
    foreach ($columns as $column_key => $column_value) {
        $new_columns[$column_key] = $column_value;
        if ($column_key == 'title') {
            $new_columns['post_thumbnail'] = __('Thumbnail');
            $new_columns['years'] = __('Jaartallen');
        }
    }
    return $new_columns;
}

add_filter('manage_prinsenprinsessen_posts_columns', 'add_post_custom_columns_prinsenprinsessen');


// Make post custom field columns sortable
function make_post_custom_columns_sortable_prinsenprinsessen($columns)
{
    $columns['years'] = 'years';
    return $columns;
}

add_filter('manage_edit-prinsenprinsessen_sortable_columns', 'make_post_custom_columns_sortable_prinsenprinsessen');


// Display post thumbnail and sorting_year in the column for prinsenprinsessen
function display_post_thumbnail_column($column_name, $post_id)
{
    if ($column_name == 'post_thumbnail') {
        $thumbnail = get_the_post_thumbnail($post_id, 'thumbnail');
        if (!empty($thumbnail)) {
            echo $thumbnail;
        } else {
            echo __('No thumbnail');
        }
    }
    if ($column_name == 'years') {
        $years = get_field("years", $post_id);
        if (!empty($years)) {
            echo $years;
        } else {
            echo __('geen jaartallen');
        }
    }

}

add_action('manage_prinsenprinsessen_posts_custom_column', 'display_post_thumbnail_column', 10, 2);

// Modify the query to sort posts by event_date or event_time_of_day
function modify_admin_query_to_sort_by_custom_columns_prinsenprinsessen($query)
{
    if (!is_admin()) {
        return;
    }

    $orderby = $query->get('orderby');

    if ('years' == $orderby) {
        $query->set('meta_key', 'sorting_year');
        $query->set('orderby', 'meta_value');
    }

}

add_action('pre_get_posts', 'modify_admin_query_to_sort_by_custom_columns_prinsenprinsessen');


// Add post custom field columns to admin listing for agenda
function add_post_custom_columns_agenda($columns)
{
    $new_columns = array();
    foreach ($columns as $column_key => $column_value) {
        $new_columns[$column_key] = $column_value;
        if ($column_key == 'title') {
            $new_columns['event_date'] = __('Evenenment datum');
            $new_columns['event_time_of_day'] = __('Evenenment ijdstip');
            $new_columns['event_location'] = __('Evenenment locatie');
        }
    }
    return $new_columns;
}

add_filter('manage_agenda_posts_columns', 'add_post_custom_columns_agenda');

// Make post custom field columns sortable
function make_post_custom_columns_sortable_agenda($columns)
{
    $columns['event_date'] = 'event_date';
    $columns['event_time_of_day'] = 'event_time_of_day';
    $columns['event_location'] = 'event_location';
    return $columns;
}

add_filter('manage_edit-agenda_sortable_columns', 'make_post_custom_columns_sortable_agenda');

// Modify the query to sort posts by event_date or event_time_of_day
function modify_admin_query_to_sort_by_custom_columns_agenda($query)
{
    if (!is_admin()) {
        return;
    }

    $orderby = $query->get('orderby');

    if ('event_date' == $orderby) {
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value');
    }

    if ('event_time_of_day' == $orderby) {
        $query->set('meta_key', 'event_time_of_day');
        $query->set('orderby', 'meta_value');
    }
    if ('event_location' == $orderby) {
        $query->set('meta_key', 'event_location');
        $query->set('orderby', 'meta_value');
    }
}

add_action('pre_get_posts', 'modify_admin_query_to_sort_by_custom_columns_agenda');

// Display post custom fields in the columns for agenda
function display_post_custom_columns_agenda($column_name, $post_id)
{
    if ($column_name == 'event_date') {
        $date_str = get_field("event_date", $post_id);
        $eventDate = date("d/m/Y", strtotime($date_str));
        if (!empty($eventDate)) {
            echo $eventDate;
        } else {
            echo __('Geen datum');
        }
    }

    if ($column_name == 'event_time_of_day') {
        $eventTimeOfDay = get_field("event_time_of_day", $post_id);
        if (!empty($eventTimeOfDay)) {
            echo $eventTimeOfDay;
        } else {
            echo __('Geen tijd');
        }
    }

    if ($column_name == 'event_location') {
        $eventLocation = get_field("event_location", $post_id);
        if (!empty($eventLocation)) {
            echo $eventLocation;
        } else {
            echo __('Geen locatie');
        }
    }
}

add_action('manage_agenda_posts_custom_column', 'display_post_custom_columns_agenda', 10, 2);

