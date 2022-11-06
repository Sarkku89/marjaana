<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset ="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
</head>
<body <?php body_class(); ?>>
<nav id="top-navi">
<h1>Marjaana</h1>
            <?php wp_nav_menu(['theme_location' => 'primary']); ?>
</nav>
        
<div id="site-container">

