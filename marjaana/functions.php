<?php
register_nav_menus(['primary'=> 'Päävalikko']);

function marjaana_assets(){
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_script('marjaana-script',get_template_directory_uri(). '/js/marjaana.js',array('jquery'), '1.0.0', true);}
add_action('wp_enqueue_scripts', 'marjaana_assets');

function marjaana_widgets_init(){
    register_sidebar(array(
        'name' => 'Sivupalkki',
        'id' => 'sidebar',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    ));
}

add_action('widgets_init', 'marjaana_widgets_init');

function excerpt_read_more() {
    global $post;
    return '<a href="' . get_permalink($post->ID) . '"> Lue lisää &raquo;</a>';
}
add_filter('excerpt_more', 'excerpt_read_more');

function marjaana_theme_setup(){
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'marjaana_theme_setup');
?>