<?php

/* register the new post type: event */

function kjhgfteyua_register_post_type(){
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
register_post_type('kjhgfteyua-event', $args);
}
add_action('init', 'kjhgfteyua_register_post_type');

 
/* Add custom fields for event custom post type*/

function kjhgfteyua_add_custom_box(){
    add_meta_box( 
        'kjhgfteyua_date_id',
        __('Päivämäärä' ),  
        'kjhgfteyua_date_box_hotoml', 	 
        'kjhgfteyua-event', 					 
        'normal' 
    );
    add_meta_box( 
        'kjhgfteyua_organizer_id',
        __('Järjestäjä' ),  
        'kjhgfteyua_organizer_box_hotoml', 	 
        'kjhgfteyua-event', 					 
        'normal' 
    );
    add_meta_box( 
        'kjhgfteyua_first_judge_id',	  
        __('Ylituomari' ),   
        'kjhgfteyua_first_judge_box_hotoml', 	  
        'kjhgfteyua-event', 					  
        'normal' 
    );
    add_meta_box( 
        'kjhgfteyua_second_judge_id',	  
        __('Palkintotuomari' ),   
        'kjhgfteyua_second_judge_box_hotoml', 	  
        'kjhgfteyua-event', 					  
        'normal' 
    );
    add_meta_box( 
        'kjhgfteyua_limit_id',	  
        __('Rajoitukset' ),   
        'kjhgfteyua_limit_box_hotoml', 	  
        'kjhgfteyua-event', 					  
        'normal' 
    );
    add_meta_box( 
        'kjhgfteyua_maxmin_id',	  
        __('Koiramäärä' ),   
        'kjhgfteyua_maxmin_box_hotoml', 	  
        'kjhgfteyua-event', 					  
        'normal' 
    );
    add_meta_box( 
        'kjhgfteyua_priority_id',	  
        __('Etusija' ),   
        'kjhgfteyua_priority_box_hotoml', 	  
        'kjhgfteyua-event', 					  
        'normal' 
    );
    add_meta_box( 
        'kjhgfteyua_enrollment_id',	  
        __('Ilmoittautumisaika' ),   
        'kjhgfteyua_enrollment_box_hotoml', 	  
        'kjhgfteyua-event', 					  
        'normal' 
    );
    add_meta_box( 
        'kjhgfteyua_price_id',	  
        __('Osallistumismaksu' ),   
        'kjhgfteyua_price_box_hotoml', 	  
        'kjhgfteyua-event', 					  
        'normal' 
    );
    add_meta_box( 
        'kjhgfteyua_info_id',	  
        __('Lisätiedot' ),   
        'kjhgfteyua_info_box_hotoml', 	  
        'kjhgfteyua-event', 					  
        'normal' 
    );
    add_meta_box( 
        'kjhgfteyua_other_id',	  
        __('Muuta' ),   
        'kjhgfteyua_other_box_hotoml', 	  
        'kjhgfteyua-event', 					  
        'normal' 
    );
    add_meta_box( 
        'kjhgfteyua_contact_id',	  
        __('Tiedustelut' ),   
        'kjhgfteyua_contact_box_hotoml', 	  
        'kjhgfteyua-event', 					  
        'normal' 
    );
    add_meta_box( 
        'kjhgfteyua_class_id',	  
        __('Luokka' ),   
        'kjhgfteyua_class_box_hotoml', 	  
        'kjhgfteyua-event', 					  
        'normal' 
    );
    add_meta_box( 
        'kjhgfteyua_place_id',	  
        __('Paikkakunta' ),   
        'kjhgfteyua_place_box_hotoml', 	  
        'kjhgfteyua-event', 					  
        'normal' 
    );
    add_meta_box( 
        'kjhgfteyua_address_id',	  
        __('Osoite' ),   
        'kjhgfteyua_address_box_hotoml', 	  
        'kjhgfteyua-event', 					  
        'normal' 
    );
}

add_action('add_meta_boxes', 'kjhgfteyua_add_custom_box');

// Defining function for each custom field
function kjhgfteyua_date_box_hotoml($post){
    $date = get_post_meta( $post->ID, '_kjhgfteyua_meta_date', true );

	?>

    <label for ="kjhgfteyua_date">Päivämäärä</label><br>
	<input name="kjhgfteyua_date" type="date" value="<?php echo esc_attr($date); ?>"><br>
    <?php
}


function kjhgfteyua_organizer_box_hotoml($post){
    $value = get_post_meta($post->ID, '_kjhgfteyua_meta_organizer', true);
    ?>
    <label for ="kjhgfteyua_organizer">Järjestäjä</label><br>
    <input type="text" name="kjhgfteyua_organizer" id="kjhgfteyua_organizer" size="50" value="<?php echo $value; ?>">
    <?php
}

function kjhgfteyua_first_judge_box_hotoml($post){
    $value = get_post_meta($post->ID, '_kjhgfteyua_meta_first_judge', true);
    ?>
    <label for ="kjhgfteyua_first_judge">Ylituomari</label><br>
    <input type="text" name="kjhgfteyua_first_judge" id="kjhgfteyua_first_judge" size="50" value="<?php echo $value; ?>">
    <?php
}

function kjhgfteyua_second_judge_box_hotoml($post){
    $value = get_post_meta($post->ID, '_kjhgfteyua_meta_second_judge', true);
    ?>
    <label for ="kjhgfteyua_second_judge">Palkintotuomari</label><br>
    <input type="text" name="kjhgfteyua_second_judge" id="kjhgfteyua_second_judge" size="50" value="<?php echo $value; ?>">
    <?php
}

function kjhgfteyua_limit_box_hotoml($post){
    $value = get_post_meta($post->ID, '_kjhgfteyua_meta_limit', true);
    ?>
    <label for ="kjhgfteyua_limit">Rajoitukset</label><br>
    <textarea rows = "5" cols = "60" name ="kjhgfteyua_limit" id="kjhgfteyua_limit"><?php echo $value; ?></textarea>
    <?php
}
function kjhgfteyua_maxmin_box_hotoml($post){
    $value = get_post_meta($post->ID, '_kjhgfteyua_meta_max', true);
    $value2 = get_post_meta($post->ID, '_kjhgfteyua_meta_min', true);
    ?>
    <label for ="kjhgfteyua_max">Max koiramäärä</label><br>
    <input type="text" name="kjhgfteyua_max" id="kjhgfteyua_max" size="3" value="<?php echo $value; ?>"><br>
    <label for ="kjhgfteyua_min">Min koiramäärä</label><br>
    <input type="text" name="kjhgfteyua_min" id="kjhgfteyua_min" size="3" value="<?php echo $value2; ?>">
    <?php
}

function kjhgfteyua_priority_box_hotoml($post){
    $value = get_post_meta($post->ID, '_kjhgfteyua_meta_priority', true);
    ?>
    <label for ="kjhgfteyua_priority">Etusija</label><br>
    <input type="text" name="kjhgfteyua_priority" id="kjhgfteyua_priority" size="150" value="<?php echo $value; ?>">
    <?php
}

function kjhgfteyua_enrollment_box_hotoml( $post ) {

	$custom_date = get_post_meta( $post->ID, '_kjhgfteyua_meta_enrollment1', true );
    $custom_date2 = get_post_meta( $post->ID, '_kjhgfteyua_meta_enrollment2', true );

	?>

    <label for ="kjhgfteyua_enrollment1">Ilmoittautumisaika alkaa</label><br>
	<input name="kjhgfteyua_enrollment1" type="date" value="<?php echo esc_attr($custom_date); ?>"><br>
    <label for ="kjhgfteyua_enrollment2">Ilmoittautumisaika päättyy</label><br>
    <input name="kjhgfteyua_enrollment2" type="date" value="<?php echo esc_attr($custom_date2); ?>"><br>
    <?php

}
function kjhgfteyua_price_box_hotoml($post){
    $value1 = get_post_meta($post->ID, '_kjhgfteyua_meta_price1', true);
    $value2 = get_post_meta($post->ID, '_kjhgfteyua_meta_price2', true);
    ?>
    <label for ="kjhgfteyua_price1">Yleinen osallistumismaksu</label><br>
    <input type="text" name="kjhgfteyua_price1" id="kjhgfteyua_price1" size="3" value="<?php echo $value1; ?>">€<br>
    <label for ="kjhgfteyua_price2">Jäsenille</label><br>
    <input type="text" name="kjhgfteyua_price2" id="kjhgfteyua_price2" size="3" value="<?php echo $value2; ?>">€
    <?php
}

function kjhgfteyua_info_box_hotoml($post){
    $value = get_post_meta($post->ID, '_kjhgfteyua_meta_info', true);
    ?>
    <label for ="kjhgfteyua_info">Lisätiedot</label><br>
    <textarea rows = "5" cols = "60" name ="kjhgfteyua_info" id="kjhgfteyua_info"><?php echo $value; ?></textarea>
    <?php
}

function kjhgfteyua_other_box_hotoml($post){
    $value = get_post_meta($post->ID, '_kjhgfteyua_meta_other', true);
    ?>
    <label for ="kjhgfteyua_other">Muuta</label><br>
    <input type="text" name="kjhgfteyua_other" id="kjhgfteyua_other" size="150" value="<?php echo $value; ?>">
    <?php
}

function kjhgfteyua_contact_box_hotoml($post){
    $value = get_post_meta($post->ID, '_kjhgfteyua_meta_contact', true);
    ?>
    <label for ="kjhgfteyua_contact">Tiedustelut</label><br>
    <textarea rows = "5" cols = "60" name ="kjhgfteyua_contact" id="kjhgfteyua_contact"><?php echo $value; ?></textarea>
    <?php
}
function kjhgfteyua_class_box_hotoml($post){
    $value = get_post_meta($post->ID, '_kjhgfteyua_meta_class', true);
    ?>
    <label for ="kjhgfteyua_class">Luokka</label><br>
    <input type="text" name="kjhgfteyua_class" id="kjhgfteyua_class" size="1" placeholder="Anna arvoksi 1,2 tai 3" value="<?php echo $value; ?>">
    <?php
}
function kjhgfteyua_place_box_hotoml($post){
    $value = get_post_meta($post->ID, '_kjhgfteyua_meta_place', true);
    ?>
    <p id ="error"></p><br>
    <label for ="kjhgfteyua_place">Paikkakunta</label><br>
    <input type="text" name="kjhgfteyua_place" id="kjhgfteyua_place" size="50" value="<?php echo $value; ?>">
    <?php
}
function kjhgfteyua_address_box_hotoml($post){
    $value = get_post_meta($post->ID, '_kjhgfteyua_meta_address', true);
    ?>
    <p id ="error"></p><br>
    <label for ="kjhgfteyua_address">Osoite</label><br>
    <input type="text" name="kjhgfteyua_address" id="kjhgfteyua_address" size="150" value="<?php echo $value; ?>">
    <?php
}

/* register new taxonomy: event category */
function kjhgfteyua_register_taxonomy(){
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
    register_taxonomy('kjhgfteyua_category', array('kjhgfteyua-event'), $args);
}
add_action('init', 'kjhgfteyua_register_taxonomy');

// Saving the data of custom post type: event
function kjhgfteyua_save_postdata($post_id){
    if(array_key_exists('kjhgfteyua_date', $_POST)):
        $initial_date= $_POST['kjhgfteyua_date'];
        $dd = substr($initial_date, -2);
        $mm = substr($initial_date, -5, 2);
        $yy = substr($initial_date, -10, 4);
        $formatted_date = $dd.'.'.$mm.'.'.$yy;
        update_post_meta(
            $post_id,
            '_kjhgfteyua_meta_date',
            sanitize_text_field($initial_date)
        );
        update_post_meta(
            $post_id,
            '_kjhgfteyua_meta_date_formatted',
            sanitize_text_field($formatted_date)
        );
    endif;
    if(array_key_exists('kjhgfteyua_organizer', $_POST)):
        update_post_meta(
            $post_id,
            '_kjhgfteyua_meta_organizer',
            sanitize_text_field($_POST['kjhgfteyua_organizer'])
        );
    endif;
    if(array_key_exists('kjhgfteyua_first_judge', $_POST)):
            update_post_meta(
                $post_id,
                '_kjhgfteyua_meta_first_judge',
                sanitize_text_field($_POST['kjhgfteyua_first_judge'])
            );
    endif;
    if(array_key_exists('kjhgfteyua_second_judge', $_POST)):
        update_post_meta(
            $post_id,
            '_kjhgfteyua_meta_second_judge',
            sanitize_text_field($_POST['kjhgfteyua_second_judge'])
        );
    endif;
    if(array_key_exists('kjhgfteyua_limit', $_POST)):
        update_post_meta(
            $post_id,
            '_kjhgfteyua_meta_limit',
            sanitize_text_field($_POST['kjhgfteyua_limit'])
        );
    endif;
    if(array_key_exists('kjhgfteyua_max', $_POST)):
        update_post_meta(
            $post_id,
            '_kjhgfteyua_meta_max',
            sanitize_text_field($_POST['kjhgfteyua_max'])
        );
    endif;
    if(array_key_exists('kjhgfteyua_min', $_POST)):
        update_post_meta(
            $post_id,
            '_kjhgfteyua_meta_min',
            sanitize_text_field($_POST['kjhgfteyua_min'])
        );
    endif;
    if(array_key_exists('kjhgfteyua_priority', $_POST)):
        update_post_meta(
            $post_id,
            '_kjhgfteyua_meta_priority',
            sanitize_text_field($_POST['kjhgfteyua_priority'])
        );
    endif;
    if(array_key_exists('kjhgfteyua_enrollment1', $_POST)):
        update_post_meta(
            $post_id,
            '_kjhgfteyua_meta_enrollment1',
            sanitize_text_field($_POST['kjhgfteyua_enrollment1'])
        );
    endif;
    if(array_key_exists('kjhgfteyua_enrollment2', $_POST)):
        update_post_meta(
            $post_id,
            '_kjhgfteyua_meta_enrollment2',
            sanitize_text_field($_POST['kjhgfteyua_enrollment2'])
        );
    endif;
    if(array_key_exists('kjhgfteyua_price1', $_POST)):
        update_post_meta(
            $post_id,
            '_kjhgfteyua_meta_price1',
            sanitize_text_field($_POST['kjhgfteyua_price1'])
        );
    endif;
    if(array_key_exists('kjhgfteyua_price2', $_POST)):
        update_post_meta(
            $post_id,
            '_kjhgfteyua_meta_price2',
            sanitize_text_field($_POST['kjhgfteyua_price2'])
        );
    endif;
    if(array_key_exists('kjhgfteyua_info', $_POST)):
        update_post_meta(
            $post_id,
            '_kjhgfteyua_meta_info',
            sanitize_textarea_field($_POST['kjhgfteyua_info'])
        );
    endif;
    if(array_key_exists('kjhgfteyua_other', $_POST)):
        update_post_meta(
            $post_id,
            '_kjhgfteyua_meta_other',
            sanitize_text_field($_POST['kjhgfteyua_other'])
        );
    endif;
    if(array_key_exists('kjhgfteyua_contact', $_POST)):
        update_post_meta(
            $post_id,
            '_kjhgfteyua_meta_contact',
            sanitize_textarea_field($_POST['kjhgfteyua_contact'])
        );
    endif;
    if(array_key_exists('kjhgfteyua_place', $_POST)):
        update_post_meta(
            $post_id,
            '_kjhgfteyua_meta_place',
            sanitize_text_field($_POST['kjhgfteyua_place'])
        );
    endif;
    if(array_key_exists('kjhgfteyua_address', $_POST)):
        update_post_meta(
            $post_id,
            '_kjhgfteyua_meta_address',
            sanitize_text_field($_POST['kjhgfteyua_address'])
        );
    endif;
    if(array_key_exists('kjhgfteyua_class', $_POST)){
        if($_POST['kjhgfteyua_class'] == '1' || $_POST['kjhgfteyua_class'] == '2' || $_POST['kjhgfteyua_class'] == '3' ){
        update_post_meta(
            $post_id,
            '_kjhgfteyua_meta_class',
            sanitize_text_field($_POST['kjhgfteyua_class']));
        };
    }
}
        
add_action('save_post', 'kjhgfteyua_save_postdata');

?>