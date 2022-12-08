<?php
/**
* Template Name: Marjaana Login Pages
*/
get_header();
?>
<div id = "content">
  <main>
    <h2>Kirjaudu sisään</h2>
    <div id="kirjaududiv">
<?php
if ( ! is_user_logged_in() ) {
    $args = array(
        'redirect' => admin_url(), // redirect to admin dashboard.
        'form_id' => 'marjaana_login_form',
        'label_username' => __( 'Käyttäjätunnus:' ),
        'label_password' => __( 'Salasana' ),
        'label_remember' => __( 'Muista kirjautuminen' ),
        'label_log_in' => __( 'Kirjaudu' ),
         'remember' => true
    );
wp_login_form( $args );
}
$err_codes = isset( $_SESSION["err_codes"] )? $_SESSION["err_codes"] : 0;
    if( $err_codes !== 0 ){
        echo display_error_message(  $err_codes );
}
function display_error_message( $err_code ){
    // Invalid username.
    if ( in_array( 'invalid_username', $err_code ) ) {
        $error = '<strong>ERROR</strong>: Invalid username.';
    }
    // Incorrect password.
    if ( in_array( 'incorrect_password', $err_code ) ) {
        $error = '<strong>ERROR</strong>: The password you entered is incorrect.';
    }
    // Empty username.
    if ( in_array( 'empty_username', $err_code ) ) {
        $error = '<strong>ERROR</strong>: The username field is empty.';
    }
    // Empty password.
    if ( in_array( 'empty_password', $err_code ) ) {
        $error = '<strong>ERROR</strong>: The password field is empty.';
    }
    // Empty username and empty password.
    if( in_array( 'empty_username', $err_code )  &&  in_array( 'empty_password', $err_code )){
        $error = '<strong>ERROR</strong>: The username and password are empty.';
    }
return $error;
}
?></div>
</div>
    </main>
</div> <!--content-->
<?php
get_footer();
?>

