<?php

/* register the new post type: event */

function ecal_register_post_type(){
    $labels = array(
        'name' => 'Tapahtumat',
        'singular_name' => "Tapahtuma",
        'add_new' => 'Uusi tapahtuma',
        'add_new_item' => 'Lisää uusi tapahtuma',
        'edit_item' => 'Muokkaa tapahtumaa',
        'new_item' => 'Uusi tapahtuma',
        'view_item' => 'Selaa tapahtumia',
        'search_items' => 'Etsi tapahtumia',
        'not_found' => 'Tapahtumia ei löytynyt',
        'not_found_in_trash' => "Tapahtumia ei löytynyt roskakorista"
    );

    $args = array(
        'labels' => $labels,
        'has_archive' => true,
        'public' => true,
        'hierarchical' => false,
        'supports' => array(
            
            'custom-fields'
        ),
        'rewrite' => array('slug' => 'tapahtuma'),
        'show_in_rest' => true,

    );
register_post_type('        -event', $args);
}
add_action('init', 'ecal_register_post_type');

 
/* Add custom fields for event custom post type*/

function ecal_add_custom_box(){
    add_meta_box( 
        'ecal_date_id',
        __('Päivämäärä' ),  
        'ecal_date_box_hmtl', 	 
        'ecal-event', 					 
        'normal' 
    );
    add_meta_box( 
        'ecal_organizer_id',
        __('Järjestäjä' ),  
        'ecal_organizer_box_hmtl', 	 
        'ecal-event', 					 
        'normal' 
    );
    add_meta_box( 
        'ecal_first_judge_id',	  
        __('Ylituomari' ),   
        'ecal_first_judge_box_hmtl', 	  
        'ecal-event', 					  
        'normal' 
    );
    add_meta_box( 
        'ecal_second_judge_id',	  
        __('Palkintotuomari' ),   
        'ecal_second_judge_box_hmtl', 	  
        'ecal-event', 					  
        'normal' 
    );
    add_meta_box( 
        'ecal_limit_id',	  
        __('Rajoitukset' ),   
        'ecal_limit_box_hmtl', 	  
        'ecal-event', 					  
        'normal' 
    );
    add_meta_box( 
        'ecal_maxmin_id',	  
        __('Koiramäärä' ),   
        'ecal_maxmin_box_hmtl', 	  
        'ecal-event', 					  
        'normal' 
    );
    add_meta_box( 
        'ecal_priority_id',	  
        __('Etusija' ),   
        'ecal_priority_box_hmtl', 	  
        'ecal-event', 					  
        'normal' 
    );
    add_meta_box( 
        'ecal_enrollment_id',	  
        __('Ilmoittautumisaika' ),   
        'ecal_enrollment_box_hmtl', 	  
        'ecal-event', 					  
        'normal' 
    );
    add_meta_box( 
        'ecal_price_id',	  
        __('Osallistumismaksu' ),   
        'ecal_price_box_hmtl', 	  
        'ecal-event', 					  
        'normal' 
    );
    add_meta_box( 
        'ecal_info_id',	  
        __('Lisätiedot' ),   
        'ecal_info_box_hmtl', 	  
        'ecal-event', 					  
        'normal' 
    );
    add_meta_box( 
        'ecal_other_id',	  
        __('Muuta' ),   
        'ecal_other_box_hmtl', 	  
        'ecal-event', 					  
        'normal' 
    );
    add_meta_box( 
        'ecal_contact_id',	  
        __('Tiedustelut' ),   
        'ecal_contact_box_hmtl', 	  
        'ecal-event', 					  
        'normal' 
    );
    add_meta_box( 
        'ecal_class_id',	  
        __('Luokka' ),   
        'ecal_class_box_hmtl', 	  
        'ecal-event', 					  
        'normal' 
    );
    add_meta_box( 
        'ecal_place_id',	  
        __('Paikkakunta' ),   
        'ecal_place_box_hmtl', 	  
        'ecal-event', 					  
        'normal' 
    );
    add_meta_box( 
        'ecal_address_id',	  
        __('Osoite' ),   
        'ecal_address_box_hmtl', 	  
        'ecal-event', 					  
        'normal' 
    );
}

add_action('add_meta_boxes', 'ecal_add_custom_box');

// Defining function for each custom field
function ecal_date_box_hmtl($post){
    $date = get_post_meta( $post->ID, '_ecal_meta_date', true );

	?>

    <label for ="ecal_date">Päivämäärä</label><br>
	<input name="ecal_date" type="date" value="<?php echo esc_attr($date); ?>"><br>
    <?php
}


function ecal_organizer_box_hmtl($post){
    $value = get_post_meta($post->ID, '_ecal_meta_organizer', true);
    ?>
    <label for ="ecal_organizer">Järjestäjä</label><br>
    <input type="text" name="ecal_organizer" id="ecal_organizer" size="50" value="<?php echo $value; ?>">
    <?php
}

function ecal_first_judge_box_hmtl($post){
    $value = get_post_meta($post->ID, '_ecal_meta_first_judge', true);
    ?>
    <label for ="ecal_first_judge">Ylituomari</label><br>
    <input type="text" name="ecal_first_judge" id="ecal_first_judge" size="50" value="<?php echo $value; ?>">
    <?php
}

function ecal_second_judge_box_hmtl($post){
    $value = get_post_meta($post->ID, '_ecal_meta_second_judge', true);
    ?>
    <label for ="ecal_second_judge">Palkintotuomari</label><br>
    <input type="text" name="ecal_second_judge" id="ecal_second_judge" size="50" value="<?php echo $value; ?>">
    <?php
}

function ecal_limit_box_hmtl($post){
    $value = get_post_meta($post->ID, '_ecal_meta_limit', true);
    ?>
    <label for ="ecal_limit">Rajoitukset</label><br>
    <textarea rows = "5" cols = "60" name ="ecal_limit" id="ecal_limit"><?php echo $value; ?></textarea>
    <?php
}
function ecal_maxmin_box_hmtl($post){
    $value = get_post_meta($post->ID, '_ecal_meta_max', true);
    $value2 = get_post_meta($post->ID, '_ecal_meta_min', true);
    ?>
    <label for ="ecal_max">Max koiramäärä</label><br>
    <input type="text" name="ecal_max" id="ecal_max" size="3" value="<?php echo $value; ?>"><br>
    <label for ="ecal_min">Min koiramäärä</label><br>
    <input type="text" name="ecal_min" id="ecal_min" size="3" value="<?php echo $value2; ?>">
    <?php
}

function ecal_priority_box_hmtl($post){
    $value = get_post_meta($post->ID, '_ecal_meta_priority', true);
    ?>
    <label for ="ecal_priority">Etusija</label><br>
    <input type="text" name="ecal_priority" id="ecal_priority" size="150" value="<?php echo $value; ?>">
    <?php
}

function ecal_enrollment_box_hmtl( $post ) {

	$custom_date = get_post_meta( $post->ID, '_ecal_meta_enrollment1', true );
    $custom_date2 = get_post_meta( $post->ID, '_ecal_meta_enrollment2', true );

	?>

    <label for ="ecal_enrollment1">Ilmoittautumisaika alkaa</label><br>
	<input name="ecal_enrollment1" type="date" value="<?php echo esc_attr($custom_date); ?>"><br>
    <label for ="ecal_enrollment2">Ilmoittautumisaika päättyy</label><br>
    <input name="ecal_enrollment2" type="date" value="<?php echo esc_attr($custom_date2); ?>"><br>
    <?php

}
function ecal_price_box_hmtl($post){
    $value1 = get_post_meta($post->ID, '_ecal_meta_price1', true);
    $value2 = get_post_meta($post->ID, '_ecal_meta_price2', true);
    ?>
    <label for ="ecal_price1">Yleinen osallistumismaksu</label><br>
    <input type="text" name="ecal_price1" id="ecal_price1" size="3" value="<?php echo $value1; ?>">€<br>
    <label for ="ecal_price2">Jäsenille</label><br>
    <input type="text" name="ecal_price2" id="ecal_price2" size="3" value="<?php echo $value2; ?>">€
    <?php
}

function ecal_info_box_hmtl($post){
    $value = get_post_meta($post->ID, '_ecal_meta_info', true);
    ?>
    <label for ="ecal_info">Lisätiedot</label><br>
    <textarea rows = "5" cols = "60" name ="ecal_info" id="ecal_info"><?php echo $value; ?></textarea>
    <?php
}

function ecal_other_box_hmtl($post){
    $value = get_post_meta($post->ID, '_ecal_meta_other', true);
    ?>
    <label for ="ecal_other">Muuta</label><br>
    <input type="text" name="ecal_other" id="ecal_other" size="150" value="<?php echo $value; ?>">
    <?php
}

function ecal_contact_box_hmtl($post){
    $value = get_post_meta($post->ID, '_ecal_meta_contact', true);
    ?>
    <label for ="ecal_contact">Tiedustelut</label><br>
    <textarea rows = "5" cols = "60" name ="ecal_contact" id="ecal_contact"><?php echo $value; ?></textarea>
    <?php
}
function ecal_class_box_hmtl($post){
    $value = get_post_meta($post->ID, '_ecal_meta_class', true);
    ?>
    <label for ="ecal_class">Luokka</label><br>
    <input type="text" name="ecal_class" id="ecal_class" size="1" placeholder="Anna arvoksi 1,2 tai 3" value="<?php echo $value; ?>">
    <?php
}
function ecal_place_box_hmtl($post){
    $value = get_post_meta($post->ID, '_ecal_meta_place', true);
    ?>
    <p id ="error"></p><br>
    <label for ="ecal_place">Paikkakunta</label><br>
    <input type="text" name="ecal_place" id="ecal_place" size="50" value="<?php echo $value; ?>">
    <?php
}
function ecal_address_box_hmtl($post){
    $value = get_post_meta($post->ID, '_ecal_meta_address', true);
    ?>
    <p id ="error"></p><br>
    <label for ="ecal_address">Osoite</label><br>
    <input type="text" name="ecal_address" id="ecal_address" size="150" value="<?php echo $value; ?>">
    <?php
}

/* register new taxonomy: event category */
function ecal_register_taxonomy(){
    $labels = array(
        'name' => 'Tapahtumakategoriat',
        'singular_name' => 'Tapahtumakategoria',
        'search_items' => 'Etsi tapahtumakategorioita',
        'all_items' => 'Kaikki tapahtumakategoriat',
        'edit_item' => 'Muokkaa tapahtumakategoriaa',
        'update_item' => 'Päivitä tapahtumakategoriaa',
        'add_new_item' => 'Lisää tapahtumakategoria',
        'new_item_name' => 'Uuden tapahtumakategorian nimi',
        'menu_name' => 'Tapahtumakategoriat'
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'sort' => true,
        'args' => array('orderby' => 'term_order'),
        'rewrite' => array ('slug' => 'tapahtumat'),
        'show_admin_column' => true,
        'show_in_rest' => true
    );
    register_taxonomy('ecal_category', array('ecal-event'), $args);
}
add_action('init', 'ecal_register_taxonomy');

// Saving the data of custom post type: event
function ecal_save_postdata($post_id){
    if(array_key_exists('ecal_date', $_POST)):
        $initial_date= $_POST['ecal_date'];
        $dd = substr($initial_date, -2);
        $mm = substr($initial_date, -5, 2);
        $yy = substr($initial_date, -10, 4);
        $formatted_date = $dd.'.'.$mm.'.'.$yy;
        update_post_meta(
            $post_id,
            '_ecal_meta_date',
            sanitize_text_field($initial_date)
        );
        update_post_meta(
            $post_id,
            '_ecal_meta_date_formatted',
            sanitize_text_field($formatted_date)
        );
    endif;
    if(array_key_exists('ecal_organizer', $_POST)):
        update_post_meta(
            $post_id,
            '_ecal_meta_organizer',
            sanitize_text_field($_POST['ecal_organizer'])
        );
    endif;
    if(array_key_exists('ecal_first_judge', $_POST)):
            update_post_meta(
                $post_id,
                '_ecal_meta_first_judge',
                sanitize_text_field($_POST['ecal_first_judge'])
            );
    endif;
    if(array_key_exists('ecal_second_judge', $_POST)):
        update_post_meta(
            $post_id,
            '_ecal_meta_second_judge',
            sanitize_text_field($_POST['ecal_second_judge'])
        );
    endif;
    if(array_key_exists('ecal_limit', $_POST)):
        update_post_meta(
            $post_id,
            '_ecal_meta_limit',
            sanitize_text_field($_POST['ecal_limit'])
        );
    endif;
    if(array_key_exists('ecal_max', $_POST)):
        update_post_meta(
            $post_id,
            '_ecal_meta_max',
            sanitize_text_field($_POST['ecal_max'])
        );
    endif;
    if(array_key_exists('ecal_min', $_POST)):
        update_post_meta(
            $post_id,
            '_ecal_meta_min',
            sanitize_text_field($_POST['ecal_min'])
        );
    endif;
    if(array_key_exists('ecal_priority', $_POST)):
        update_post_meta(
            $post_id,
            '_ecal_meta_priority',
            sanitize_text_field($_POST['ecal_priority'])
        );
    endif;
    if(array_key_exists('ecal_enrollment1', $_POST)):
        update_post_meta(
            $post_id,
            '_ecal_meta_enrollment1',
            sanitize_text_field($_POST['ecal_enrollment1'])
        );
    endif;
    if(array_key_exists('ecal_enrollment2', $_POST)):
        update_post_meta(
            $post_id,
            '_ecal_meta_enrollment2',
            sanitize_text_field($_POST['ecal_enrollment2'])
        );
    endif;
    if(array_key_exists('ecal_price1', $_POST)):
        update_post_meta(
            $post_id,
            '_ecal_meta_price1',
            sanitize_text_field($_POST['ecal_price1'])
        );
    endif;
    if(array_key_exists('ecal_price2', $_POST)):
        update_post_meta(
            $post_id,
            '_ecal_meta_price2',
            sanitize_text_field($_POST['ecal_price2'])
        );
    endif;
    if(array_key_exists('ecal_info', $_POST)):
        update_post_meta(
            $post_id,
            '_ecal_meta_info',
            sanitize_textarea_field($_POST['ecal_info'])
        );
    endif;
    if(array_key_exists('ecal_other', $_POST)):
        update_post_meta(
            $post_id,
            '_ecal_meta_other',
            sanitize_text_field($_POST['ecal_other'])
        );
    endif;
    if(array_key_exists('ecal_contact', $_POST)):
        update_post_meta(
            $post_id,
            '_ecal_meta_contact',
            sanitize_textarea_field($_POST['ecal_contact'])
        );
    endif;
    if(array_key_exists('ecal_place', $_POST)):
        update_post_meta(
            $post_id,
            '_ecal_meta_place',
            sanitize_text_field($_POST['ecal_place'])
        );
    endif;
    if(array_key_exists('ecal_address', $_POST)):
        update_post_meta(
            $post_id,
            '_ecal_meta_address',
            sanitize_text_field($_POST['ecal_address'])
        );
    endif;
    if(array_key_exists('ecal_class', $_POST)){
        if($_POST['ecal_class'] == '1' || $_POST['ecal_class'] == '2' || $_POST['ecal_class'] == '3' ){
        update_post_meta(
            $post_id,
            '_ecal_meta_class',
            sanitize_text_field($_POST['ecal_class']));
        };
    }
}
        
add_action('save_post', 'ecal_save_postdata');

?>