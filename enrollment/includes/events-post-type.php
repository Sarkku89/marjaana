<?php

/* register the new post type: event*/

function events_register_post_type(){
    $labels = array(
        'name' => 'Ilmoittautumiset',
        'singular_name' => 'Ilmoittautuminen',
        'add_new' => 'Uusi ilmoittautuminen',
        'add_new_item' => 'Lisää uusi ilmoittautuminen',
        'edit_item' => 'Muokkaa ilmoittautuminsta',
        'new_item' => 'Uusi ilmoittautuminen',
        'view_item' => 'Selaa ilmoittautumisia',
        'search_items' => 'Etsi ilmoittautumisia',
        'not_found' => 'Ilmoittautumisia ei löytynyt',
        'not_found_in_trash' => "Ilmoittautumisia ei löytynyt roskakorista"
    );

    $args = array(
        'labels' => $labels,
        'has_archive' => true,
        'public' => true,
        'hierarchical' => false,
        'supports' => array(
            'title',
            'editor'
        ),
        'rewrite' => array('slug' => 'ilmoittautuminen'),
        'show_in_rest' => true,

    );

    register_post_type('events-enrollment', $args);
}

add_action('init', 'events_register_post_type');

 
/* register new taxonomy: events category */
function events_register_taxonomy(){
    $labels = array(
        'name' => 'Ilmoittautumiskategoriat',
        'singular_name' => 'Ilmoittautumiskategoria',
        'search_items' => 'Etsi ilmoittautumiskategorioita',
        'all_items' => 'Kaikki  ilmoittautumiskategoriat',
        'edit_item' => 'Muokkaa  ilmoittautumiskategoriaa',
        'update_item' => 'Päivitä  ilmoittautumiskategoriaa',
        'add_new_item' => 'Lisää  ilmoittautumiskategoria',
        'new_item_name' => 'Uuden  ilmoittautumiskategorian nimi',
        'menu_name' => ' Ilmoittautumiskategoriat'
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'sort' => true,
        'args' => array('orderby' => 'term_order'),
        'rewrite' => array ('slug' => 'ilmoittautumiset'),
        'show_admin_column' => true,
        'show_in_rest' => true
    );
    register_taxonomy('events_category', array('events-enrollment'), $args);
}
add_action('init', 'events_register_taxonomy');