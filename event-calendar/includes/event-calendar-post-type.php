<?php

/* register the new post type: event */

function ecalendar_register_post_type(){
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
            'custom-fields',
            'title'
        ),
        'rewrite' => array('slug' => 'tapahtuma'),
        'show_in_rest' => true,

    );
register_post_type('ecalendar-event', $args);
}
add_action('init', 'ecalendar_register_post_type');

 
/* Add custom fields for event custom post type*/

function ecalendar_add_custom_box(){
    add_meta_box( 
        'ecalendar_date_id',
        __('Päivämäärä' ),  
        'ecalendar_date_box_html', 	 
        'ecalendar-event', 					 
        'normal' 
    );
    add_meta_box( 
        'ecalendar_organizer_id',
        __('Järjestäjä' ),  
        'ecalendar_organizer_box_html', 	 
        'ecalendar-event', 					 
        'normal' 
    );
    add_meta_box( 
        'ecalendar_first_judge_id',	  
        __('Ylituomari' ),   
        'ecalendar_first_judge_box_html', 	  
        'ecalendar-event', 					  
        'normal' 
    );
    add_meta_box( 
        'ecalendar_second_judge_id',	  
        __('Palkintotuomari' ),   
        'ecalendar_second_judge_box_html', 	  
        'ecalendar-event', 					  
        'normal' 
    );
    add_meta_box( 
        'ecalendar_limit_id',	  
        __('Rajoitukset' ),   
        'ecalendar_limit_box_html', 	  
        'ecalendar-event', 					  
        'normal' 
    );
    add_meta_box( 
        'ecalendar_maxmin_id',	  
        __('Koiramäärä' ),   
        'ecalendar_maxmin_box_html', 	  
        'ecalendar-event', 					  
        'normal' 
    );
    add_meta_box( 
        'ecalendar_priority_id',	  
        __('Etusija' ),   
        'ecalendar_priority_box_html', 	  
        'ecalendar-event', 					  
        'normal' 
    );
    add_meta_box( 
        'ecalendar_enrollment_id',	  
        __('Ilmoittautumisaika' ),   
        'ecalendar_enrollment_box_html', 	  
        'ecalendar-event', 					  
        'normal' 
    );
    add_meta_box( 
        'ecalendar_price_id',	  
        __('Osallistumismaksu' ),   
        'ecalendar_price_box_html', 	  
        'ecalendar-event', 					  
        'normal' 
    );
    add_meta_box( 
        'ecalendar_info_id',	  
        __('Lisätiedot' ),   
        'ecalendar_info_box_html', 	  
        'ecalendar-event', 					  
        'normal' 
    );
    add_meta_box( 
        'ecalendar_other_id',	  
        __('Muuta' ),   
        'ecalendar_other_box_html', 	  
        'ecalendar-event', 					  
        'normal' 
    );
    add_meta_box( 
        'ecalendar_contact_id',	  
        __('Tiedustelut' ),   
        'ecalendar_contact_box_html', 	  
        'ecalendar-event', 					  
        'normal' 
    );
    add_meta_box( 
        'ecalendar_class_id',	  
        __('Luokka' ),   
        'ecalendar_class_box_html', 	  
        'ecalendar-event', 					  
        'normal' 
    );
    add_meta_box( 
        'ecalendar_place_id',	  
        __('Paikkakunta' ),   
        'ecalendar_place_box_html', 	  
        'ecalendar-event', 					  
        'normal' 
    );
    add_meta_box( 
        'ecalendar_address_id',	  
        __('Osoite' ),   
        'ecalendar_address_box_html', 	  
        'ecalendar-event', 					  
        'normal' 
    );
}

add_action('add_meta_boxes', 'ecalendar_add_custom_box');
// Removing post title from the editor

add_action('init', 'my_rem_editor_from_post_type');
function my_rem_editor_from_post_type() {
    remove_post_type_support( 'ecalendar-event', 'title' );
}

// Defining function for each custom field
function ecalendar_date_box_html($post){
    $date = get_post_meta( $post->ID, '_ecalendar_meta_date', true );

	?>

    <label for ="ecalendar_date">Päivämäärä</label><br>
	<input name="ecalendar_date" type="date" value="<?php echo esc_attr($date); ?>"><br>
    <?php
}


function ecalendar_organizer_box_html($post){
    $value = get_post_meta($post->ID, '_ecalendar_meta_organizer', true);
    ?>
    <label for ="ecalendar_organizer">Järjestäjä</label><br>
    <input type="text" name="ecalendar_organizer" id="ecalendar_organizer" size="50" value="<?php echo $value; ?>">
    <?php
}

function ecalendar_first_judge_box_html($post){
    $value = get_post_meta($post->ID, '_ecalendar_meta_first_judge', true);
    ?>
    <label for ="ecalendar_first_judge">Ylituomari</label><br>
    <input type="text" name="ecalendar_first_judge" id="ecalendar_first_judge" size="50" value="<?php echo $value; ?>">
    <?php
}

function ecalendar_second_judge_box_html($post){
    $value = get_post_meta($post->ID, '_ecalendar_meta_second_judge', true);
    ?>
    <label for ="ecalendar_second_judge">Palkintotuomari</label><br>
    <input type="text" name="ecalendar_second_judge" id="ecalendar_second_judge" size="50" value="<?php echo $value; ?>">
    <?php
}

function ecalendar_limit_box_html($post){
    $value = get_post_meta($post->ID, '_ecalendar_meta_limit', true);
    ?>
    <label for ="ecalendar_limit">Rajoitukset</label><br>
    <textarea rows = "5" cols = "60" name ="ecalendar_limit" id="ecalendar_limit"><?php echo $value; ?></textarea>
    <?php
}
function ecalendar_maxmin_box_html($post){
    $value = get_post_meta($post->ID, '_ecalendar_meta_max', true);
    $value2 = get_post_meta($post->ID, '_ecalendar_meta_min', true);
    ?>
    <label for ="ecalendar_max">Max koiramäärä</label><br>
    <input type="text" name="ecalendar_max" id="ecalendar_max" size="3" value="<?php echo $value; ?>"><br>
    <label for ="ecalendar_min">Min koiramäärä</label><br>
    <input type="text" name="ecalendar_min" id="ecalendar_min" size="3" value="<?php echo $value2; ?>">
    <?php
}

function ecalendar_priority_box_html($post){
    $value = get_post_meta($post->ID, '_ecalendar_meta_priority', true);
    ?>
    <label for ="ecalendar_priority">Etusija</label><br>
    <input type="text" name="ecalendar_priority" id="ecalendar_priority" size="150" value="<?php echo $value; ?>">
    <?php
}

function ecalendar_enrollment_box_html( $post ) {

	$custom_date = get_post_meta( $post->ID, '_ecalendar_meta_enrollment1', true );
    $custom_date2 = get_post_meta( $post->ID, '_ecalendar_meta_enrollment2', true );

	?>

    <label for ="ecalendar_enrollment1">Ilmoittautumisaika alkaa</label><br>
	<input name="ecalendar_enrollment1" type="date" value="<?php echo esc_attr($custom_date); ?>"><br>
    <label for ="ecalendar_enrollment2">Ilmoittautumisaika päättyy</label><br>
    <input name="ecalendar_enrollment2" type="date" value="<?php echo esc_attr($custom_date2); ?>"><br>
    <?php

}
function ecalendar_price_box_html($post){
    $value1 = get_post_meta($post->ID, '_ecalendar_meta_price1', true);
    $value2 = get_post_meta($post->ID, '_ecalendar_meta_price2', true);
    ?>
    <label for ="ecalendar_price1">Yleinen osallistumismaksu</label><br>
    <input type="text" name="ecalendar_price1" id="ecalendar_price1" size="3" value="<?php echo $value1; ?>">€<br>
    <label for ="ecalendar_price2">Jäsenille</label><br>
    <input type="text" name="ecalendar_price2" id="ecalendar_price2" size="3" value="<?php echo $value2; ?>">€
    <?php
}

function ecalendar_info_box_html($post){
    $value = get_post_meta($post->ID, '_ecalendar_meta_info', true);
    ?>
    <label for ="ecalendar_info">Lisätiedot</label><br>
    <textarea rows = "5" cols = "60" name ="ecalendar_info" id="ecalendar_info"><?php echo $value; ?></textarea>
    <?php
}

function ecalendar_other_box_html($post){
    $value = get_post_meta($post->ID, '_ecalendar_meta_other', true);
    ?>
    <label for ="ecalendar_other">Muuta</label><br>
    <input type="text" name="ecalendar_other" id="ecalendar_other" size="150" value="<?php echo $value; ?>">
    <?php
}

function ecalendar_contact_box_html($post){
    $value = get_post_meta($post->ID, '_ecalendar_meta_contact', true);
    ?>
    <label for ="ecalendar_contact">Tiedustelut</label><br>
    <textarea rows = "5" cols = "60" name ="ecalendar_contact" id="ecalendar_contact"><?php echo $value; ?></textarea>
    <?php
}
function ecalendar_class_box_html($post){
        $value = get_post_meta($post->ID, '_ecalendar_meta_class', true);

        ?>
        <label for="cc_yeks">Luokka</label>
        <input type="checkbox" name="ecalendar_class" value="1" <?php echo (($value=='1') ? 'checked="checked"': '');?>/> 1
        <input type="checkbox" name="ecalendar_class" value="2" <?php echo (($value=='2') ? 'checked="checked"': '');?>/> 2
        <input type="checkbox" name="ecalendar_class" value="3" <?php echo (($value=='3') ? 'checked="checked"': '');?>/> 3
           
        <?php
    
}
function ecalendar_place_box_html($post){
    $value = get_post_meta($post->ID, '_ecalendar_meta_place', true);
    ?>
    <p id ="error"></p><br>
    <label for ="ecalendar_place">Paikkakunta</label><br>
    <input type="text" name="ecalendar_place" id="ecalendar_place" size="50" value="<?php echo $value; ?>">
    <?php
}
function ecalendar_address_box_html($post){
    $value = get_post_meta($post->ID, '_ecalendar_meta_address', true);
    ?>
    <p id ="error"></p><br>
    <label for ="ecalendar_address">Osoite</label><br>
    <input type="text" name="ecalendar_address" id="ecalendar_address" size="150" value="<?php echo $value; ?>">
    <?php
}

/* register new taxonomy: event category */
function ecalendar_register_taxonomy(){
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
    register_taxonomy('ecalendar_category', array('ecalendar-event'), $args);
}
add_action('init', 'ecalendar_register_taxonomy');

// Saving the data of custom post type: event
function ecalendar_save_postdata($post_id){
    if(array_key_exists('ecalendar_date', $_POST)):
        $initial_date= $_POST['ecalendar_date'];
        $dd = substr($initial_date, -2);
        $mm = substr($initial_date, -5, 2);
        $yy = substr($initial_date, -10, 4);
        $formatted_date = $dd.'.'.$mm.'.'.$yy;
        update_post_meta(
            $post_id,
            '_ecalendar_meta_date',
            sanitize_text_field($initial_date)
        );
        update_post_meta(
            $post_id,
            '_ecalendar_meta_date_formatted',
            sanitize_text_field($formatted_date)
        );
    endif;
    if(array_key_exists('ecalendar_organizer', $_POST)):
        update_post_meta(
            $post_id,
            '_ecalendar_meta_organizer',
            sanitize_text_field($_POST['ecalendar_organizer'])
        );
    endif;
    if(array_key_exists('ecalendar_first_judge', $_POST)):
            update_post_meta(
                $post_id,
                '_ecalendar_meta_first_judge',
                sanitize_text_field($_POST['ecalendar_first_judge'])
            );
    endif;
    if(array_key_exists('ecalendar_second_judge', $_POST)):
        update_post_meta(
            $post_id,
            '_ecalendar_meta_second_judge',
            sanitize_text_field($_POST['ecalendar_second_judge'])
        );
    endif;
    if(array_key_exists('ecalendar_limit', $_POST)):
        update_post_meta(
            $post_id,
            '_ecalendar_meta_limit',
            sanitize_text_field($_POST['ecalendar_limit'])
        );
    endif;
    if(array_key_exists('ecalendar_max', $_POST)):
        update_post_meta(
            $post_id,
            '_ecalendar_meta_max',
            sanitize_text_field($_POST['ecalendar_max'])
        );
    endif;
    if(array_key_exists('ecalendar_min', $_POST)):
        update_post_meta(
            $post_id,
            '_ecalendar_meta_min',
            sanitize_text_field($_POST['ecalendar_min'])
        );
    endif;
    if(array_key_exists('ecalendar_priority', $_POST)):
        update_post_meta(
            $post_id,
            '_ecalendar_meta_priority',
            sanitize_text_field($_POST['ecalendar_priority'])
        );
    endif;
    if(array_key_exists('ecalendar_enrollment1', $_POST)):
        update_post_meta(
            $post_id,
            '_ecalendar_meta_enrollment1',
            sanitize_text_field($_POST['ecalendar_enrollment1'])
        );
    endif;
    if(array_key_exists('ecalendar_enrollment2', $_POST)):
        update_post_meta(
            $post_id,
            '_ecalendar_meta_enrollment2',
            sanitize_text_field($_POST['ecalendar_enrollment2'])
        );
    endif;
    if(array_key_exists('ecalendar_price1', $_POST)):
        update_post_meta(
            $post_id,
            '_ecalendar_meta_price1',
            sanitize_text_field($_POST['ecalendar_price1'])
        );
    endif;
    if(array_key_exists('ecalendar_price2', $_POST)):
        update_post_meta(
            $post_id,
            '_ecalendar_meta_price2',
            sanitize_text_field($_POST['ecalendar_price2'])
        );
    endif;
    if(array_key_exists('ecalendar_info', $_POST)):
        update_post_meta(
            $post_id,
            '_ecalendar_meta_info',
            sanitize_textarea_field($_POST['ecalendar_info'])
        );
    endif;
    if(array_key_exists('ecalendar_other', $_POST)):
        update_post_meta(
            $post_id,
            '_ecalendar_meta_other',
            sanitize_text_field($_POST['ecalendar_other'])
        );
    endif;
    if(array_key_exists('ecalendar_contact', $_POST)):
        update_post_meta(
            $post_id,
            '_ecalendar_meta_contact',
            sanitize_textarea_field($_POST['ecalendar_contact'])
        );
    endif;
    if(array_key_exists('ecalendar_place', $_POST)):
        update_post_meta(
            $post_id,
            '_ecalendar_meta_place',
            sanitize_text_field($_POST['ecalendar_place'])
        );
    endif;
    if(array_key_exists('ecalendar_address', $_POST)):
        update_post_meta(
            $post_id,
            '_ecalendar_meta_address',
            sanitize_text_field($_POST['ecalendar_address'])
        );
    endif;
    if(array_key_exists('ecalendar_class', $_POST)):
        update_post_meta(
            $post_id,
            '_ecalendar_meta_class',
            sanitize_text_field($_POST['ecalendar_class'])
        );
    endif;
    update_post_meta($post_id, '_ecalendar_meta_modified', "false");
   
 }
 
add_action('save_post', 'ecalendar_save_postdata');

?>