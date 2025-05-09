<?php
// create custom post type for prinsen and prinsessen
function create_posttype_prinsen_prinsessen() {

    register_post_type( 'prinsen/prinsessen',
        // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Prinsen/Prinsessen' ),
                'singular_name' => __( 'Prins/Prinses' )
            ),
            'public' => true,
            'has_archive' => true,
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-businessman',
            'supports' => array( 'title', 'editor', 'author', 'thumbnail' ),
//            'rewrite' => array( 'slug' => 'prinsenenprinsessen' ),

        )
    );
}
// Hooking up the function to theme setup
add_action( 'init', 'create_posttype_prinsen_prinsessen' );


//// create custom post type for events
//function create_posttype_events() {
//
//    register_post_type( 'evenementen',
//        // CPT Options
//        array(
//            'labels' => array(
//                'name' => __( 'Jaar agenda'),
//                'singular_name' => __( 'Agenda' )
//            ),
//            'public' => true,
//            'has_archive' => true,
//            'show_in_rest' => true,
//            'menu_icon' => 'dashicons-tickets-alt',
//            'supports' => array( 'title', 'editor', 'excerpt' )
//
//        )
//    );
//
//}
//// Hooking up the function to theme setup
//add_action( 'init', 'create_posttype_events' );

// create custom post type for agenda
function create_posttype_agenda() {

    register_post_type( 'agenda',
        // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Jaar agenda'),
                'singular_name' => __( 'Agenda' )
            ),
            'public' => true,
            'has_archive' => true,
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-tickets-alt',
            'supports' => array( 'title', 'editor', 'excerpt' )

        )
    );

}
// Hooking up the function to theme setup
add_action( 'init', 'create_posttype_agenda' );

// create custom post type for news
function create_posttype_news() {

    register_post_type( 'nieuws',
        // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Nieuws'),
                'singular_name' => __( 'Nieuws' )
            ),
            'public' => true,
            'has_archive' => true,
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-paperclip',
            'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' )

        )
    );

}
// Hooking up the function to theme setup
add_action( 'init', 'create_posttype_news' );


