<?php
/**
*The template name: Rekisteröinti

*/
// Registration form

get_header();
if($_POST){
    $username = $wpdb -> prepare($_POST['user_username']);
    $email = $wpdb -> prepare($_POST['user_email']);
    $password = $wpdb -> prepare($_POST['user_password']);
    $password_c = $wpdb -> prepare($_POST['user_password_c']);
    $gdbr = $wpdb -> prepare($_POST['user_gdbr']);
    $error = array();

    if(strpos($username, ' ') !== false){
        $error['username_space'] = "Käyttäjätunnuksessa ei saa olla väliöyöntejä.";
    }
    if (empty($username)){
        $error['username_empty'] = "Käyttäjätunnus puuttuu.";
    }
    if(username_exists($username)){
        $error['username_exists'] = "Käyttäjätunnus on jo käytössä";
    }
    if(!is_email($email)){
        $error['email_valid'] = "Tarkista sähköpostiosoitteesi.";
    }
    if(email_exists($email)){
        $error['emaisl_existence'] = "E-mail osoite on jo käytössä.";
    }
    if(strcmp($password, $password_c)!== 0){
        $error['password'] = "Antamasi salasanat eivät täsmää.";
    }

    if(count($error) === 0){
        wp_create_user($username,$password, $email);
        echo "Käyttäjä luonti onnistui.";
        exit();
    }
    else{
        echo "Virhe! Tarkista antamasi tiedot!";

    }
}

?>
<div id = "content">
    <main>

        <h2 style="text-align: center; color:rgba(86, 212, 114, 1);">Rekisteröidy</h2><br>

        <form id="register_user" method="post">
            <div style="float: left; width: 50%;">
                <label for ="user_username">Käyttäjätunnus</label><br>
                <input type="text" name="user_username" id="user_username" size="50" value="" required><br><br>
                
                <label for ="user_password">Salasana</label><br>
                <input type="password" name="user_password" id="user_password" size="50" value="" required><br><br>

                <input type="checkbox" name="user_gdpr" value="ON" required/>
                <label for ="user_gdpr">Olen lukenut ja hyväksyn sivuston <a href="#">tietosuojakäytänteet</a></label><br>
            </div>

            <div>
                <label for ="user_email">Sähköposti</label><br>
                <input type="text" name="user_email" id="user_email" size="50" value="" required><br><br>

                <label for ="user_password_c">Vahvista salasana</label><br>
                <input type="password" name="user_password_c" id="user_password_c" size="50" value="" required><br><br>
                
                <input id="submit-button" type="submit" name="user_submit" value="Rekisteröidy"/>
            </div>

            
            
            
        
        </form>
    </main>

</div> <!--content-->
<?php
get_footer();
?>