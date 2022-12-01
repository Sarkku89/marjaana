<?php
/*
Plugin Name: Yhdistyslista
Description: Yhdistysten listaus
Author: SEM Group 8
*/

require_once('includes/organizers-post-type.php');


function organizers_setup_menu(){
    add_menu_page('Yhdistyslista', 'Yhdistykset', 'manage_options', 'organizers', 'organizers_display_admin_page');
};

function organizers_display_admin_page(){
    echo '<h1>Yhdistykset</h1>';
    echo '<p>Lisää sivulle lyhytkoodi [organizers] näyttääksesi kaikki yhdistykset</p>';
    
}
add_action('admin_menu', 'organizers_setup_menu');
?>
