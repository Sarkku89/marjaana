<?php

/* register the new post type: event */

function kalenteri_register_post_type(){
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
register_post_type('kalenteri-event', $args);
}
add_action('init', 'kalenteri_register_post_type');

 
/* Add custom fields for event custom post type*/

function kalenteri_add_custom_box(){
    add_meta_box( 
        'kalenteri_date_id',
        __('Päivämäärä' ),  
        'kalenteri_date_box_hotoml', 	 
        'kalenteri-event', 					 
        'normal' 
    );
    add_meta_box( 
        'kalenteri_organizer_id',
        __('Järjestäjä' ),  
        'kalenteri_organizer_box_hotoml', 	 
        'kalenteri-event', 					 
        'normal' 
    );
    add_meta_box( 
        'kalenteri_first_judge_id',	  
        __('Ylituomari' ),   
        'kalenteri_first_judge_box_hotoml', 	  
        'kalenteri-event', 					  
        'normal' 
    );
    add_meta_box( 
        'kalenteri_second_judge_id',	  
        __('Palkintotuomari' ),   
        'kalenteri_second_judge_box_hotoml', 	  
        'kalenteri-event', 					  
        'normal' 
    );
    add_meta_box( 
        'kalenteri_limit_id',	  
        __('Rajoitukset' ),   
        'kalenteri_limit_box_hotoml', 	  
        'kalenteri-event', 					  
        'normal' 
    );
    add_meta_box( 
        'kalenteri_maxmin_id',	  
        __('Koiramäärä' ),   
        'kalenteri_maxmin_box_hotoml', 	  
        'kalenteri-event', 					  
        'normal' 
    );
    add_meta_box( 
        'kalenteri_priority_id',	  
        __('Etusija' ),   
        'kalenteri_priority_box_hotoml', 	  
        'kalenteri-event', 					  
        'normal' 
    );
    add_meta_box( 
        'kalenteri_enrollment_id',	  
        __('Ilmoittautumisaika' ),   
        'kalenteri_enrollment_box_hotoml', 	  
        'kalenteri-event', 					  
        'normal' 
    );
    add_meta_box( 
        'kalenteri_price_id',	  
        __('Osallistumismaksu' ),   
        'kalenteri_price_box_hotoml', 	  
        'kalenteri-event', 					  
        'normal' 
    );
    add_meta_box( 
        'kalenteri_info_id',	  
        __('Lisätiedot' ),   
        'kalenteri_info_box_hotoml', 	  
        'kalenteri-event', 					  
        'normal' 
    );
    add_meta_box( 
        'kalenteri_other_id',	  
        __('Muuta' ),   
        'kalenteri_other_box_hotoml', 	  
        'kalenteri-event', 					  
        'normal' 
    );
    add_meta_box( 
        'kalenteri_contact_id',	  
        __('Tiedustelut' ),   
        'kalenteri_contact_box_hotoml', 	  
        'kalenteri-event', 					  
        'normal' 
    );
    add_meta_box( 
        'kalenteri_class_id',	  
        __('Luokka' ),   
        'kalenteri_class_box_hotoml', 	  
        'kalenteri-event', 					  
        'normal' 
    );
    add_meta_box( 
        'kalenteri_place_id',	  
        __('Paikkakunta' ),   
        'kalenteri_place_box_hotoml', 	  
        'kalenteri-event', 					  
        'normal' 
    );
    add_meta_box( 
        'kalenteri_address_id',	  
        __('Osoite' ),   
        'kalenteri_address_box_hotoml', 	  
        'kalenteri-event', 					  
        'normal' 
    );
}

add_action('add_meta_boxes', 'kalenteri_add_custom_box');

// Defining function for each custom field
function kalenteri_date_box_hotoml($post){
    $date = get_post_meta( $post->ID, '_kalenteri_meta_date', true );

	?>

    <label for ="kalenteri_date">Päivämäärä</label><br>
	<input name="kalenteri_date" type="date" value="<?php echo esc_attr($date); ?>"><br>
    <?php
}


function kalenteri_organizer_box_hotoml($post){
    $value = get_post_meta($post->ID, '_kalenteri_meta_organizer', true);
    ?>
    <label for ="kalenteri_organizer">Järjestäjä</label><br>
    <input type="text" name="kalenteri_organizer" id="kalenteri_organizer" size="50" value="<?php echo $value; ?>">
    <?php
}

function kalenteri_first_judge_box_hotoml($post){
    $value = get_post_meta($post->ID, '_kalenteri_meta_first_judge', true);
    ?>
    <label for ="kalenteri_first_judge">Ylituomari</label><br>
    <input type="text" name="kalenteri_first_judge" id="kalenteri_first_judge" size="50" value="<?php echo $value; ?>">
    <?php
}

function kalenteri_second_judge_box_hotoml($post){
    $value = get_post_meta($post->ID, '_kalenteri_meta_second_judge', true);
    ?>
    <label for ="kalenteri_second_judge">Palkintotuomari</label><br>
    <input type="text" name="kalenteri_second_judge" id="kalenteri_second_judge" size="50" value="<?php echo $value; ?>">
    <?php
}

function kalenteri_limit_box_hotoml($post){
    $value = get_post_meta($post->ID, '_kalenteri_meta_limit', true);
    ?>
    <label for ="kalenteri_limit">Rajoitukset</label><br>
    <textarea rows = "5" cols = "60" name ="kalenteri_limit" id="kalenteri_limit"><?php echo $value; ?></textarea>
    <?php
}
function kalenteri_maxmin_box_hotoml($post){
    $value = get_post_meta($post->ID, '_kalenteri_meta_max', true);
    $value2 = get_post_meta($post->ID, '_kalenteri_meta_min', true);
    ?>
    <label for ="kalenteri_max">Max koiramäärä</label><br>
    <input type="text" name="kalenteri_max" id="kalenteri_max" size="3" value="<?php echo $value; ?>"><br>
    <label for ="kalenteri_min">Min koiramäärä</label><br>
    <input type="text" name="kalenteri_min" id="kalenteri_min" size="3" value="<?php echo $value2; ?>">
    <?php
}

function kalenteri_priority_box_hotoml($post){
    $value = get_post_meta($post->ID, '_kalenteri_meta_priority', true);
    ?>
    <label for ="kalenteri_priority">Etusija</label><br>
    <input type="text" name="kalenteri_priority" id="kalenteri_priority" size="150" value="<?php echo $value; ?>">
    <?php
}

function kalenteri_enrollment_box_hotoml( $post ) {

	$custom_date = get_post_meta( $post->ID, '_kalenteri_meta_enrollment1', true );
    $custom_date2 = get_post_meta( $post->ID, '_kalenteri_meta_enrollment2', true );

	?>

    <label for ="kalenteri_enrollment1">Ilmoittautumisaika alkaa</label><br>
	<input name="kalenteri_enrollment1" type="date" value="<?php echo esc_attr($custom_date); ?>"><br>
    <label for ="kalenteri_enrollment2">Ilmoittautumisaika päättyy</label><br>
    <input name="kalenteri_enrollment2" type="date" value="<?php echo esc_attr($custom_date2); ?>"><br>
    <?php

}
function kalenteri_price_box_hotoml($post){
    $value1 = get_post_meta($post->ID, '_kalenteri_meta_price1', true);
    $value2 = get_post_meta($post->ID, '_kalenteri_meta_price2', true);
    ?>
    <label for ="kalenteri_price1">Yleinen osallistumismaksu</label><br>
    <input type="text" name="kalenteri_price1" id="kalenteri_price1" size="3" value="<?php echo $value1; ?>">€<br>
    <label for ="kalenteri_price2">Jäsenille</label><br>
    <input type="text" name="kalenteri_price2" id="kalenteri_price2" size="3" value="<?php echo $value2; ?>">€
    <?php
}

function kalenteri_info_box_hotoml($post){
    $value = get_post_meta($post->ID, '_kalenteri_meta_info', true);
    ?>
    <label for ="kalenteri_info">Lisätiedot</label><br>
    <textarea rows = "5" cols = "60" name ="kalenteri_info" id="kalenteri_info"><?php echo $value; ?></textarea>
    <?php
}

function kalenteri_other_box_hotoml($post){
    $value = get_post_meta($post->ID, '_kalenteri_meta_other', true);
    ?>
    <label for ="kalenteri_other">Muuta</label><br>
    <input type="text" name="kalenteri_other" id="kalenteri_other" size="150" value="<?php echo $value; ?>">
    <?php
}

function kalenteri_contact_box_hotoml($post){
    $value = get_post_meta($post->ID, '_kalenteri_meta_contact', true);
    ?>
    <label for ="kalenteri_contact">Tiedustelut</label><br>
    <textarea rows = "5" cols = "60" name ="kalenteri_contact" id="kalenteri_contact"><?php echo $value; ?></textarea>
    <?php
}
function kalenteri_class_box_hotoml($post){
    $value = get_post_meta($post->ID, '_kalenteri_meta_class', true);
    ?>
    <label for ="kalenteri_class">Luokka</label><br>
    <input type="text" name="kalenteri_class" id="kalenteri_class" size="1" placeholder="Anna arvoksi 1,2 tai 3" value="<?php echo $value; ?>">
    <?php
}
function kalenteri_place_box_hotoml($post){
    $value = get_post_meta($post->ID, '_kalenteri_meta_place', true);
    ?>
    <p id ="error"></p><br>
    <label for ="kalenteri_place">Paikkakunta</label><br>
    <input type="text" name="kalenteri_place" id="kalenteri_place" size="50" value="<?php echo $value; ?>">
    <?php
}
function kalenteri_address_box_hotoml($post){
    $value = get_post_meta($post->ID, '_kalenteri_meta_address', true);
    ?>
    <p id ="error"></p><br>
    <label for ="kalenteri_address">Osoite</label><br>
    <input type="text" name="kalenteri_address" id="kalenteri_address" size="150" value="<?php echo $value; ?>">
    <?php
}

/* register new taxonomy: event category */
function kalenteri_register_taxonomy(){
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
    register_taxonomy('kalenteri_category', array('kalenteri-event'), $args);
}
add_action('init', 'kalenteri_register_taxonomy');

// Saving the data of custom post type: event
function kalenteri_save_postdata($post_id){
    if(array_key_exists('kalenteri_date', $_POST)):
        $initial_date= $_POST['kalenteri_date'];
        $dd = substr($initial_date, -2);
        $mm = substr($initial_date, -5, 2);
        $yy = substr($initial_date, -10, 4);
        $formatted_date = $dd.'.'.$mm.'.'.$yy;
        update_post_meta(
            $post_id,
            '_kalenteri_meta_date',
            sanitize_text_field($initial_date)
        );
        update_post_meta(
            $post_id,
            '_kalenteri_meta_date_formatted',
            sanitize_text_field($formatted_date)
        );
    endif;
    if(array_key_exists('kalenteri_organizer', $_POST)):
        update_post_meta(
            $post_id,
            '_kalenteri_meta_organizer',
            sanitize_text_field($_POST['kalenteri_organizer'])
        );
    endif;
    if(array_key_exists('kalenteri_first_judge', $_POST)):
            update_post_meta(
                $post_id,
                '_kalenteri_meta_first_judge',
                sanitize_text_field($_POST['kalenteri_first_judge'])
            );
    endif;
    if(array_key_exists('kalenteri_second_judge', $_POST)):
        update_post_meta(
            $post_id,
            '_kalenteri_meta_second_judge',
            sanitize_text_field($_POST['kalenteri_second_judge'])
        );
    endif;
    if(array_key_exists('kalenteri_limit', $_POST)):
        update_post_meta(
            $post_id,
            '_kalenteri_meta_limit',
            sanitize_text_field($_POST['kalenteri_limit'])
        );
    endif;
    if(array_key_exists('kalenteri_max', $_POST)):
        update_post_meta(
            $post_id,
            '_kalenteri_meta_max',
            sanitize_text_field($_POST['kalenteri_max'])
        );
    endif;
    if(array_key_exists('kalenteri_min', $_POST)):
        update_post_meta(
            $post_id,
            '_kalenteri_meta_min',
            sanitize_text_field($_POST['kalenteri_min'])
        );
    endif;
    if(array_key_exists('kalenteri_priority', $_POST)):
        update_post_meta(
            $post_id,
            '_kalenteri_meta_priority',
            sanitize_text_field($_POST['kalenteri_priority'])
        );
    endif;
    if(array_key_exists('kalenteri_enrollment1', $_POST)):
        update_post_meta(
            $post_id,
            '_kalenteri_meta_enrollment1',
            sanitize_text_field($_POST['kalenteri_enrollment1'])
        );
    endif;
    if(array_key_exists('kalenteri_enrollment2', $_POST)):
        update_post_meta(
            $post_id,
            '_kalenteri_meta_enrollment2',
            sanitize_text_field($_POST['kalenteri_enrollment2'])
        );
    endif;
    if(array_key_exists('kalenteri_price1', $_POST)):
        update_post_meta(
            $post_id,
            '_kalenteri_meta_price1',
            sanitize_text_field($_POST['kalenteri_price1'])
        );
    endif;
    if(array_key_exists('kalenteri_price2', $_POST)):
        update_post_meta(
            $post_id,
            '_kalenteri_meta_price2',
            sanitize_text_field($_POST['kalenteri_price2'])
        );
    endif;
    if(array_key_exists('kalenteri_info', $_POST)):
        update_post_meta(
            $post_id,
            '_kalenteri_meta_info',
            sanitize_textarea_field($_POST['kalenteri_info'])
        );
    endif;
    if(array_key_exists('kalenteri_other', $_POST)):
        update_post_meta(
            $post_id,
            '_kalenteri_meta_other',
            sanitize_text_field($_POST['kalenteri_other'])
        );
    endif;
    if(array_key_exists('kalenteri_contact', $_POST)):
        update_post_meta(
            $post_id,
            '_kalenteri_meta_contact',
            sanitize_textarea_field($_POST['kalenteri_contact'])
        );
    endif;
    if(array_key_exists('kalenteri_place', $_POST)):
        update_post_meta(
            $post_id,
            '_kalenteri_meta_place',
            sanitize_text_field($_POST['kalenteri_place'])
        );
    endif;
    if(array_key_exists('kalenteri_address', $_POST)):
        update_post_meta(
            $post_id,
            '_kalenteri_meta_address',
            sanitize_text_field($_POST['kalenteri_address'])
        );
    endif;
    if(array_key_exists('kalenteri_class', $_POST)){
        if($_POST['kalenteri_class'] == '1' || $_POST['kalenteri_class'] == '2' || $_POST['kalenteri_class'] == '3' ){
        update_post_meta(
            $post_id,
            '_kalenteri_meta_class',
            sanitize_text_field($_POST['kalenteri_class']));
        };
    }
}
        
add_action('save_post', 'kalenteri_save_postdata');

?>