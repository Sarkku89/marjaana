<?php

/* register the new post type: association */

function organizers_register_post_type(){
    $labels = array(
        'name' => 'Yhdistykset',
        'singular_name' => 'Yhdistys',
        'add_new' => 'Uusi yhdistys',
        'add_new_item' => 'Lisää uusi yhdistys',
        'edit_item' => 'Muokkaa yhdistystä',
        'new_item' => 'Uusi yhdistys',
        'view_item' => 'Selaa yhdistyksiä',
        'search_items' => 'Etsi yhdistyksiä',
        'not_found' => 'Yhdistyksiä ei löytynyt',
        'not_found_in_trash' => "Yhdistyksiä ei löytynyt roskakorista"
    );

    $args = array(
        'labels' => $labels,
        'has_archive' => true,
        'public' => true,
        'hierarchical' => false,
        'supports' => array(
            'title'
        ),
        'rewrite' => array('slug' => 'yhdistys'),
        'show_in_rest' => true,

    );

    register_post_type('organizers-yhdistys', $args);
}

add_action('init', 'organizers_register_post_type');

 
/* Add custom fields */
/*
function organizers_add_custom_box(){

    add_meta_box( 
        'organizers_organizer_id',
        __('Yhdistys' ),  
        'organizers_organizer_box_html', 	 
        'organizers-association', 					 
        'normal' 
    );

}

add_action('add_meta_boxes', 'organizers_add_custom_box');

function organizers_organizer_box_html($post){
    $value = get_post_meta($post->ID, '_organizers_meta_organizer', true);
    ?>
    <label for ="organizers_organizer">Yhdistyksen nimi</label><br>
    <input type="text" name="organizers_organizer" id="organizers_organizer" size="70" value="<?php echo $value; ?>">
    <?php
}

// Saving the data of custom post type: association
function organizers_save_postdata($post_id){
    if(array_key_exists('organizers_organizer', $_POST)):
        update_post_meta(
            $post_id,
            '_organizers_meta_organizer',
            sanitize_text_field($_POST['organizers_organizer'])
        );
    endif;
}

add_action('save_post', 'organizers_save_postdata');*/

?>