<?php
/*
Plugin Name: Koirien lisäys
Description: Käyttäjä voi lisätä koiria
Author: SEM Group 8
*/

require_once('includes/dogs-post-type.php');
// Setting up "Tapahtumat" for admin view in Wordpress 
function adogs_setup_menu(){
    add_menu_page('Koirien lisäys', 'Koirat', 'manage_options', 'dogs', 'adogs_display_admin_page');
};

function adogs_display_admin_page(){
    echo '<h1>Koirien lisäys</h1>';
    echo '<p>Lisää sivulle lyhytkoodi [dogs] näyttääksesi kaikki koirat</p>';
    
}
add_action('admin_menu', 'adogs_setup_menu');
?>

