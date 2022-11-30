<?php
/*
Plugin Name: Tapahtumakalenteri
Description: Tapahtumien listaus
Author: SEM Group 8
*/

require_once('includes/event-calendar-post-type.php');
// Setting up "Tapahtumat" for admin view in Wordpress 
function ecalendar_setup_menu(){
    add_menu_page('Tapahtumakalenteri', 'Tapahtumat', 'manage_options', 'event-calendar', 'ecalendar_display_admin_page');
};

function ecalendar_display_admin_page(){
    echo '<h1>Tapahtumakalenteri</h1>';
    echo '<p>Lisää sivulle lyhytkoodi [event-calendar] näyttääksesi kaikki tapahtumat tai [event-calendar categry="sinun kategoriasi"]
    näyttääksesi tietyn kategorian kokeet</p>';
    
}
add_action('admin_menu', 'ecalendar_setup_menu');
?>