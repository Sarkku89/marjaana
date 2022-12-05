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

function yoursite_manage_users_columns( $columns ) {

    // $columns is a key/value array of column slugs and names
    $columns[ 'first_name' ] = 'Etunimi';
    $columns[ 'last_name' ] = 'Sukunimi';
    $columns[ '_organization_user' ] = 'Yhdistyksen jäsenyys';

    return $columns;
}

add_filter( 'manage_users_columns', 'yoursite_manage_users_columns', 10, 1 );

function yoursite_manage_users_custom_column( $output, $column_key, $user_id ) {

    switch ( $column_key ) {

        case '_organization_user':
            $value = get_user_meta( $user_id, '_organization_user', true );

            return $value;
            break;

        case 'first_name':
            $value = get_user_meta( $user_id, '_first_name', true );

            return $value;
            break;
        case 'last_name':
            $value = get_user_meta( $user_id, '_last_name', true );

            return $value;
            break;
        default: break;
    }

    // if no column slug found, return default output value
    return $output;
}

add_action( 'manage_users_custom_column', 'yoursite_manage_users_custom_column', 10, 3 );

function redirect_login_page() {
    $login_url  = home_url( '/login' );
    $url = basename($_SERVER['REQUEST_URI']); // get requested URL
    isset( $_REQUEST['redirect_to'] ) ? ( $url   = "wp-login.php" ): 0; // if users ssend request to wp-admin
    if( $url  == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET')  {
        wp_redirect( $login_url );
        exit;
    }
}
add_action('init','redirect_login_page');

function error_handler() {
    $login_page  = home_url( '/login' );
    global $errors;
    $err_codes = $errors->get_error_codes(); // get WordPress built-in error codes
    $_SESSION["err_codes"] =  $err_codes;
    wp_redirect( $login_page ); // keep users on the same page
    exit;
}
add_filter( 'login_errors', 'error_handler');

add_action( 'wp_head', 'marjaana_get_current_user_roles');
 
function marjaana_get_current_user_roles() {
 
  if( is_user_logged_in() ) {
 
    $user = wp_get_current_user();
 
    $roles = ( array ) $user->roles;
 
    //return $roles; // This will returns an array
    return array_values($roles);
 
  } else {
 
    return array();
 
  }
 
}
add_action( 'init', 'blockusers_init' ); function blockusers_init() { if ( is_admin() && ! current_user_can( 'administrator' ) && ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) { wp_redirect( home_url() ); exit; } } 
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
  if (!current_user_can('administrator') && !is_admin()) {
    show_admin_bar(false);
  }
}


add_filter( 'wp_nav_menu_items', 'wti_loginout_menu_link', 10, 2);
function wti_loginout_menu_link( $items, $args) {
	if ($args->theme_location == 'primary') {
		if (is_user_logged_in()) {
			$items .='<li class="right"><a href="'.wp_logout_url() .'">'. __("Kirjaudu ulos") .'</a></li>';
			
		}
	}
return $items;
}
