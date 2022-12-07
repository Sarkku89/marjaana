<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset ="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
</head>
<body <?php body_class(); 

function has_user_role($role){
    $roles = marjaana_get_current_user_roles();
    $user = wp_get_current_user();
    if(in_array( $role, (array) $roles )){
        return true;
    }
    return false;
}
?>>
<nav id="top-navi">
            <?php 
            if(is_user_logged_in()){
                if(has_user_role('author') || has_user_role('administrator')){
                    wp_nav_menu(['theme_location' => 'logged_in_org' ]);}
                else{wp_nav_menu(['theme_location' => 'logged_in_sub']);
               }}
            else{
                wp_nav_menu(['theme_location' => 'primary']);}
  
                    
                    ?>
</nav>
        
<div id="site-container">

