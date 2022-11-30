<?php
/**
*The template name: Muokkaa profiilia
*/
// Additional information from user
echo "<script>function profile_redirection(){
    window.location.replace('http://localhost/marjaana/wordpress/profiili/');
}</script>";
get_header();
if(is_user_logged_in()){
    if($_POST){
        update_user_meta($current_user->ID, '_first_name', sanitize_text_field($_POST['user_firstname']), '');
        update_user_meta($current_user->ID, '_last_name', sanitize_text_field($_POST['user_lastname']), '');
        update_user_meta($current_user->ID, '_phone', sanitize_text_field($_POST['user_phone']), '');
        update_user_meta($current_user->ID, '_user_organization', sanitize_text_field($_POST['user_organization']), '');
        echo '<script>profile_redirection()</script>';
        exit;
    }
}


?>
<h2>Muokkaa profiilin tietoja</h2>
<p>Mikäli haluat käyttää Marjaana-tiliäsi kokeisiin ilmoittautumiseen, täytä alla olevat kentät. 
    Tietoja ei luovuteta muille kuin kokeen järjestäjille osallistuessasi kokeeseen.</p>
<div id = "content">
    <main>
        <form id="register_user" method="post">
        <label for ="user_firstname">Etunimi</label><br>
        <input type="text" name="user_firstname" id="user_firstname" size="20" value="<?php echo get_user_meta($current_user->ID ,'_first_name', true);?>"><br>
        <label for ="user_lastname">Sukunimi</label><br>
        <input type="text" name="user_lastname" id="user_lastname" size="20" value="<?php echo get_user_meta($current_user->ID , '_last_name', true);?>"><br>
        <label for ="user_email">Sähköposti</label><br>
        <input type="text" name="user_email" id="user_email" size="50" value="<?php echo $current_user-> user_email;?>"><br>
        <label for ="user_phone">Puhelinnumero</label><br>
        <input type="text" name="user_phone" id="user_phone" size="50" value="<?php echo get_user_meta($current_user->ID, '_phone', true);?>"><br>
        <label for ="user_oragnization">Yhdistys</label><br>
        <select id="user_organization">
        </select><br>

        <input type="submit" name="additional_submit"/>
        
</form>
      </main>

  </div> <!--content-->
  <?php
  get_footer();
  ?>