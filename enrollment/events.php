<?php
/*
Plugin Name: Ilmoittautuminen
Description: Koekohtaiset ilmoittautumiset
Author: SEM Group 8
*/

require_once('includes/events-post-type.php');


function event_setup_menu(){
    add_menu_page('Ilmoittautujalista', 'Yhdistykset', 'manage_options', 'events', 'event_display_admin_page');
};

function events_display_admin_page(){
    echo '<h1>Ilmoittautuminen</h1>';
    
}
add_action('admin_menu', 'event_setup_menu');
?>
