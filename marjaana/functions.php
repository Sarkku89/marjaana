<?php

//Registering menus
function register_my_menus() {
    register_nav_menus(
    array(
    'primary'=> 'Päävalikko',
    'logged_in_sub' => __( 'Regular user' ),
    'logged_in_org' => __( 'Admin/author' )
     )
     );
    }
add_action( 'init', 'register_my_menus' );

function marjaana_assets(){
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_script('marjaana-script',get_template_directory_uri(). '/js/marjaana.js',array('jquery'), '1.0.0', true);}
add_action('wp_enqueue_scripts', 'marjaana_assets');

// Adding title-tag to the theme
function marjaana_theme_setup(){
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'marjaana_theme_setup');

// Adding custom fields to admin Users page
function yoursite_manage_users_columns( $columns ) {
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



// Error handler
function error_handler() {
    $login_page  = home_url( '/login' );
    global $errors;
    $err_codes = $errors->get_error_codes(); // get WordPress built-in error codes
    $_SESSION["err_codes"] =  $err_codes;
    wp_redirect( $login_page ); // keep users on the same page
    exit;
}
add_filter( 'login_errors', 'error_handler');

// Checking the registered roles
add_action( 'wp_head', 'marjaana_get_current_user_roles');
 
function marjaana_get_current_user_roles() {
  if( is_user_logged_in() ) {
    $user = wp_get_current_user();
    $roles = ( array ) $user->roles;
    return array_values($roles);
 
  } else {
 
    return array();}
}
add_action( 'init', 'blockusers_init' ); function blockusers_init() { if ( is_admin() && ! current_user_can( 'administrator' ) && ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) { wp_redirect( home_url() ); exit; } } 

// Don't show the WP admin bar other than admins
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
  if (!current_user_can('administrator') && !is_admin()) {
    show_admin_bar(false);
  }
}

add_action('check_admin_referer', 'scratchcode_logout_without_confirm', 10, 2);
function scratchcode_logout_without_confirm($action, $result){
    /**
    * Allow logout without confirmation
    */
    if ($action == "log-out" && !isset($_GET['_wpnonce'])):
        $redirectUrl = 'http://localhost/marjaana/wordpress/'; 
        wp_redirect( str_replace( '&', '&', wp_logout_url( $redirectUrl.'?logout=true' ) ) );
        exit;
    endif;
}

add_filter( 'wp_nav_menu_items', 'themeprefix_login_logout_link', 10, 2 );

	
function themeprefix_login_logout_link( $items, $args  ) {
    
    if( is_user_logged_in()  ) {
            $loginoutlink = wp_loginout( 'index.php', false );
            $items .= '<li class="menu-item login-but">'. $loginoutlink .'</li>';
            return $items;
    }
    else {
            $loginoutlink = wp_loginout( 'members', false );
            $items .= '<li class="menu-item login-but">'. $loginoutlink .'</li>';
            return $items;
    
    }
}