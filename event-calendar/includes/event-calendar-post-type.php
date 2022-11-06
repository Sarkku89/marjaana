<?php

/* register the new post type: event */

function fcvguhijk_register_post_type(){
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
register_post_type('fcvguhijk-event', $args);
}
add_action('init', 'fcvguhijk_register_post_type');

 
/* Add custom fields for event custom post type*/

function fcvguhijk_add_custom_box(){
    add_meta_box( 
        'fcvguhijk_date_id',
        __('Päivämäärä' ),  
        'fcvguhijk_date_box_hotoml', 	 
        'fcvguhijk-event', 					 
        'normal' 
    );
    add_meta_box( 
        'fcvguhijk_organizer_id',
        __('Järjestäjä' ),  
        'fcvguhijk_organizer_box_hotoml', 	 
        'fcvguhijk-event', 					 
        'normal' 
    );
    add_meta_box( 
        'fcvguhijk_first_judge_id',	  
        __('Ylituomari' ),   
        'fcvguhijk_first_judge_box_hotoml', 	  
        'fcvguhijk-event', 					  
        'normal' 
    );
    add_meta_box( 
        'fcvguhijk_second_judge_id',	  
        __('Palkintotuomari' ),   
        'fcvguhijk_second_judge_box_hotoml', 	  
        'fcvguhijk-event', 					  
        'normal' 
    );
    add_meta_box( 
        'fcvguhijk_limit_id',	  
        __('Rajoitukset' ),   
        'fcvguhijk_limit_box_hotoml', 	  
        'fcvguhijk-event', 					  
        'normal' 
    );
    add_meta_box( 
        'fcvguhijk_maxmin_id',	  
        __('Koiramäärä' ),   
        'fcvguhijk_maxmin_box_hotoml', 	  
        'fcvguhijk-event', 					  
        'normal' 
    );
    add_meta_box( 
        'fcvguhijk_priority_id',	  
        __('Etusija' ),   
        'fcvguhijk_priority_box_hotoml', 	  
        'fcvguhijk-event', 					  
        'normal' 
    );
    add_meta_box( 
        'fcvguhijk_enrollment_id',	  
        __('Ilmoittautumisaika' ),   
        'fcvguhijk_enrollment_box_hotoml', 	  
        'fcvguhijk-event', 					  
        'normal' 
    );
    add_meta_box( 
        'fcvguhijk_price_id',	  
        __('Osallistumismaksu' ),   
        'fcvguhijk_price_box_hotoml', 	  
        'fcvguhijk-event', 					  
        'normal' 
    );
    add_meta_box( 
        'fcvguhijk_info_id',	  
        __('Lisätiedot' ),   
        'fcvguhijk_info_box_hotoml', 	  
        'fcvguhijk-event', 					  
        'normal' 
    );
    add_meta_box( 
        'fcvguhijk_other_id',	  
        __('Muuta' ),   
        'fcvguhijk_other_box_hotoml', 	  
        'fcvguhijk-event', 					  
        'normal' 
    );
    add_meta_box( 
        'fcvguhijk_contact_id',	  
        __('Tiedustelut' ),   
        'fcvguhijk_contact_box_hotoml', 	  
        'fcvguhijk-event', 					  
        'normal' 
    );
    add_meta_box( 
        'fcvguhijk_class_id',	  
        __('Luokka' ),   
        'fcvguhijk_class_box_hotoml', 	  
        'fcvguhijk-event', 					  
        'normal' 
    );
    add_meta_box( 
        'fcvguhijk_place_id',	  
        __('Paikkakunta' ),   
        'fcvguhijk_place_box_hotoml', 	  
        'fcvguhijk-event', 					  
        'normal' 
    );
    add_meta_box( 
        'fcvguhijk_address_id',	  
        __('Osoite' ),   
        'fcvguhijk_address_box_hotoml', 	  
        'fcvguhijk-event', 					  
        'normal' 
    );
}

add_action('add_meta_boxes', 'fcvguhijk_add_custom_box');

// Defining function for each custom field
function fcvguhijk_date_box_hotoml($post){
    $date = get_post_meta( $post->ID, '_fcvguhijk_meta_date', true );

	?>

    <label for ="fcvguhijk_date">Päivämäärä</label><br>
	<input name="fcvguhijk_date" type="date" value="<?php echo esc_attr($date); ?>"><br>
    <?php
}


function fcvguhijk_organizer_box_hotoml($post){
    $value = get_post_meta($post->ID, '_fcvguhijk_meta_organizer', true);
    ?>
    <label for ="fcvguhijk_organizer">Järjestäjä</label><br>
    <input type="text" name="fcvguhijk_organizer" id="fcvguhijk_organizer" size="50" value="<?php echo $value; ?>">
    <?php
}

function fcvguhijk_first_judge_box_hotoml($post){
    $value = get_post_meta($post->ID, '_fcvguhijk_meta_first_judge', true);
    ?>
    <label for ="fcvguhijk_first_judge">Ylituomari</label><br>
    <input type="text" name="fcvguhijk_first_judge" id="fcvguhijk_first_judge" size="50" value="<?php echo $value; ?>">
    <?php
}

function fcvguhijk_second_judge_box_hotoml($post){
    $value = get_post_meta($post->ID, '_fcvguhijk_meta_second_judge', true);
    ?>
    <label for ="fcvguhijk_second_judge">Palkintotuomari</label><br>
    <input type="text" name="fcvguhijk_second_judge" id="fcvguhijk_second_judge" size="50" value="<?php echo $value; ?>">
    <?php
}

function fcvguhijk_limit_box_hotoml($post){
    $value = get_post_meta($post->ID, '_fcvguhijk_meta_limit', true);
    ?>
    <label for ="fcvguhijk_limit">Rajoitukset</label><br>
    <textarea rows = "5" cols = "60" name ="fcvguhijk_limit" id="fcvguhijk_limit"><?php echo $value; ?></textarea>
    <?php
}
function fcvguhijk_maxmin_box_hotoml($post){
    $value = get_post_meta($post->ID, '_fcvguhijk_meta_max', true);
    $value2 = get_post_meta($post->ID, '_fcvguhijk_meta_min', true);
    ?>
    <label for ="fcvguhijk_max">Max koiramäärä</label><br>
    <input type="text" name="fcvguhijk_max" id="fcvguhijk_max" size="3" value="<?php echo $value; ?>"><br>
    <label for ="fcvguhijk_min">Min koiramäärä</label><br>
    <input type="text" name="fcvguhijk_min" id="fcvguhijk_min" size="3" value="<?php echo $value2; ?>">
    <?php
}

function fcvguhijk_priority_box_hotoml($post){
    $value = get_post_meta($post->ID, '_fcvguhijk_meta_priority', true);
    ?>
    <label for ="fcvguhijk_priority">Etusija</label><br>
    <input type="text" name="fcvguhijk_priority" id="fcvguhijk_priority" size="150" value="<?php echo $value; ?>">
    <?php
}

function fcvguhijk_enrollment_box_hotoml( $post ) {

	$custom_date = get_post_meta( $post->ID, '_fcvguhijk_meta_enrollment1', true );
    $custom_date2 = get_post_meta( $post->ID, '_fcvguhijk_meta_enrollment2', true );

	?>

    <label for ="fcvguhijk_enrollment1">Ilmoittautumisaika alkaa</label><br>
	<input name="fcvguhijk_enrollment1" type="date" value="<?php echo esc_attr($custom_date); ?>"><br>
    <label for ="fcvguhijk_enrollment2">Ilmoittautumisaika päättyy</label><br>
    <input name="fcvguhijk_enrollment2" type="date" value="<?php echo esc_attr($custom_date2); ?>"><br>
    <?php

}
function fcvguhijk_price_box_hotoml($post){
    $value1 = get_post_meta($post->ID, '_fcvguhijk_meta_price1', true);
    $value2 = get_post_meta($post->ID, '_fcvguhijk_meta_price2', true);
    ?>
    <label for ="fcvguhijk_price1">Yleinen osallistumismaksu</label><br>
    <input type="text" name="fcvguhijk_price1" id="fcvguhijk_price1" size="3" value="<?php echo $value1; ?>">€<br>
    <label for ="fcvguhijk_price2">Jäsenille</label><br>
    <input type="text" name="fcvguhijk_price2" id="fcvguhijk_price2" size="3" value="<?php echo $value2; ?>">€
    <?php
}

function fcvguhijk_info_box_hotoml($post){
    $value = get_post_meta($post->ID, '_fcvguhijk_meta_info', true);
    ?>
    <label for ="fcvguhijk_info">Lisätiedot</label><br>
    <textarea rows = "5" cols = "60" name ="fcvguhijk_info" id="fcvguhijk_info"><?php echo $value; ?></textarea>
    <?php
}

function fcvguhijk_other_box_hotoml($post){
    $value = get_post_meta($post->ID, '_fcvguhijk_meta_other', true);
    ?>
    <label for ="fcvguhijk_other">Muuta</label><br>
    <input type="text" name="fcvguhijk_other" id="fcvguhijk_other" size="150" value="<?php echo $value; ?>">
    <?php
}

function fcvguhijk_contact_box_hotoml($post){
    $value = get_post_meta($post->ID, '_fcvguhijk_meta_contact', true);
    ?>
    <label for ="fcvguhijk_contact">Tiedustelut</label><br>
    <textarea rows = "5" cols = "60" name ="fcvguhijk_contact" id="fcvguhijk_contact"><?php echo $value; ?></textarea>
    <?php
}
function fcvguhijk_class_box_hotoml($post){
    $value = get_post_meta($post->ID, '_fcvguhijk_meta_class', true);
    ?>
    <label for ="fcvguhijk_class">Luokka</label><br>
    <input type="text" name="fcvguhijk_class" id="fcvguhijk_class" size="1" placeholder="Anna arvoksi 1,2 tai 3" value="<?php echo $value; ?>">
    <?php
}
function fcvguhijk_place_box_hotoml($post){
    $value = get_post_meta($post->ID, '_fcvguhijk_meta_place', true);
    ?>
    <p id ="error"></p><br>
    <label for ="fcvguhijk_place">Paikkakunta</label><br>
    <input type="text" name="fcvguhijk_place" id="fcvguhijk_place" size="50" value="<?php echo $value; ?>">
    <?php
}
function fcvguhijk_address_box_hotoml($post){
    $value = get_post_meta($post->ID, '_fcvguhijk_meta_address', true);
    ?>
    <p id ="error"></p><br>
    <label for ="fcvguhijk_address">Osoite</label><br>
    <input type="text" name="fcvguhijk_address" id="fcvguhijk_address" size="150" value="<?php echo $value; ?>">
    <?php
}

/* register new taxonomy: event category */
function fcvguhijk_register_taxonomy(){
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
    register_taxonomy('fcvguhijk_category', array('fcvguhijk-event'), $args);
}
add_action('init', 'fcvguhijk_register_taxonomy');

// Saving the data of custom post type: event
function fcvguhijk_save_postdata($post_id){
    if(array_key_exists('fcvguhijk_date', $_POST)):
        $initial_date= $_POST['fcvguhijk_date'];
        $dd = substr($initial_date, -2);
        $mm = substr($initial_date, -5, 2);
        $yy = substr($initial_date, -10, 4);
        $formatted_date = $dd.'.'.$mm.'.'.$yy;
        update_post_meta(
            $post_id,
            '_fcvguhijk_meta_date',
            sanitize_text_field($initial_date)
        );
        update_post_meta(
            $post_id,
            '_fcvguhijk_meta_date_formatted',
            sanitize_text_field($formatted_date)
        );
    endif;
    if(array_key_exists('fcvguhijk_organizer', $_POST)):
        update_post_meta(
            $post_id,
            '_fcvguhijk_meta_organizer',
            sanitize_text_field($_POST['fcvguhijk_organizer'])
        );
    endif;
    if(array_key_exists('fcvguhijk_first_judge', $_POST)):
            update_post_meta(
                $post_id,
                '_fcvguhijk_meta_first_judge',
                sanitize_text_field($_POST['fcvguhijk_first_judge'])
            );
    endif;
    if(array_key_exists('fcvguhijk_second_judge', $_POST)):
        update_post_meta(
            $post_id,
            '_fcvguhijk_meta_second_judge',
            sanitize_text_field($_POST['fcvguhijk_second_judge'])
        );
    endif;
    if(array_key_exists('fcvguhijk_limit', $_POST)):
        update_post_meta(
            $post_id,
            '_fcvguhijk_meta_limit',
            sanitize_text_field($_POST['fcvguhijk_limit'])
        );
    endif;
    if(array_key_exists('fcvguhijk_max', $_POST)):
        update_post_meta(
            $post_id,
            '_fcvguhijk_meta_max',
            sanitize_text_field($_POST['fcvguhijk_max'])
        );
    endif;
    if(array_key_exists('fcvguhijk_min', $_POST)):
        update_post_meta(
            $post_id,
            '_fcvguhijk_meta_min',
            sanitize_text_field($_POST['fcvguhijk_min'])
        );
    endif;
    if(array_key_exists('fcvguhijk_priority', $_POST)):
        update_post_meta(
            $post_id,
            '_fcvguhijk_meta_priority',
            sanitize_text_field($_POST['fcvguhijk_priority'])
        );
    endif;
    if(array_key_exists('fcvguhijk_enrollment1', $_POST)):
        update_post_meta(
            $post_id,
            '_fcvguhijk_meta_enrollment1',
            sanitize_text_field($_POST['fcvguhijk_enrollment1'])
        );
    endif;
    if(array_key_exists('fcvguhijk_enrollment2', $_POST)):
        update_post_meta(
            $post_id,
            '_fcvguhijk_meta_enrollment2',
            sanitize_text_field($_POST['fcvguhijk_enrollment2'])
        );
    endif;
    if(array_key_exists('fcvguhijk_price1', $_POST)):
        update_post_meta(
            $post_id,
            '_fcvguhijk_meta_price1',
            sanitize_text_field($_POST['fcvguhijk_price1'])
        );
    endif;
    if(array_key_exists('fcvguhijk_price2', $_POST)):
        update_post_meta(
            $post_id,
            '_fcvguhijk_meta_price2',
            sanitize_text_field($_POST['fcvguhijk_price2'])
        );
    endif;
    if(array_key_exists('fcvguhijk_info', $_POST)):
        update_post_meta(
            $post_id,
            '_fcvguhijk_meta_info',
            sanitize_textarea_field($_POST['fcvguhijk_info'])
        );
    endif;
    if(array_key_exists('fcvguhijk_other', $_POST)):
        update_post_meta(
            $post_id,
            '_fcvguhijk_meta_other',
            sanitize_text_field($_POST['fcvguhijk_other'])
        );
    endif;
    if(array_key_exists('fcvguhijk_contact', $_POST)):
        update_post_meta(
            $post_id,
            '_fcvguhijk_meta_contact',
            sanitize_textarea_field($_POST['fcvguhijk_contact'])
        );
    endif;
    if(array_key_exists('fcvguhijk_place', $_POST)):
        update_post_meta(
            $post_id,
            '_fcvguhijk_meta_place',
            sanitize_text_field($_POST['fcvguhijk_place'])
        );
    endif;
    if(array_key_exists('fcvguhijk_address', $_POST)):
        update_post_meta(
            $post_id,
            '_fcvguhijk_meta_address',
            sanitize_text_field($_POST['fcvguhijk_address'])
        );
    endif;
    if(array_key_exists('fcvguhijk_class', $_POST)){
        if($_POST['fcvguhijk_class'] == '1' || $_POST['fcvguhijk_class'] == '2' || $_POST['fcvguhijk_class'] == '3' ){
        update_post_meta(
            $post_id,
            '_fcvguhijk_meta_class',
            sanitize_text_field($_POST['fcvguhijk_class']));
        };
    }
}
        
add_action('save_post', 'fcvguhijk_save_postdata');

?>