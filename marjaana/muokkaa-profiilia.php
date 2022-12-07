<?php
/**
*The template name: Muokkaa profiilia
*/
// Additional information from user
echo "<script>function profile_redirection(){
    window.location.replace('http://localhost/wordpress-6.0.2/semgroup8/profiili/');
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
<div id = "content">
    <main>
        <h2>Muokkaa profiilin tietoja</h2>
        <div style="justify-content: center; background-color: rgba(218, 248, 224, 1); padding: 10px; border-radius: 10px;">
            <p style="text-align: center; color: rgba(55, 146, 75, 1); font-weight: bold;">Mikäli haluat käyttää Marjaana-tiliäsi kokeisiin ilmoittautumiseen, täytä alla olevat kentät. 
        <br><br>Tietoja luovutetaan ainoastaan niille kokeenjärjestäjille, joiden järjestämiin kokeisiin olet ilmoittautunut.</p>
        </div> 
        <br>
        <form id="register_user" method="post">
            <div style="float: left; width: 50%;">
                <label for ="user_firstname" style="text-align: left;">Etunimi</label><br>
                <input type="text" name="user_firstname" id="user_firstname" size="50" value="<?php echo get_user_meta($current_user->ID ,'_first_name', true);?>"><br>
                <br>
                <label for ="user_email">Sähköposti</label><br>
                <input type="text" name="user_email" id="user_email" size="50" value="<?php echo $current_user-> user_email;?>"><br>
                <br>
                <label for ="user_organization">Yhdistys</label><br>
                <select id="user_organization">
                    <option value="" disabled selected>Valitse yhdistys</option>
                </select><br>
            </div>

        <div style="display: inline; width: 50%;">
            <label for ="user_lastname">Sukunimi</label><br>
            <input type="text" name="user_lastname" id="user_lastname" size="50" value="<?php echo get_user_meta($current_user->ID , '_last_name', true);?>"><br>
            <br>
            <label for ="user_phone">Puhelinnumero</label><br>
            <input type="text" name="user_phone" id="user_phone" size="50" value="<?php echo get_user_meta($current_user->ID, '_phone', true);?>"><br>        
            <br>
            <input id="submit-button" type="submit" name="additional_submit" value="Tallenna"/>
        </div>
</form>
      </main>

  </div> <!--content-->
  <?php
  get_footer();
  ?>