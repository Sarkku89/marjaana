<?php
/**
*The template name: Profiili
*/
// Additional information from user

get_header();
if(is_user_logged_in()){
    $current_user = wp_get_current_user();
    $firstname = get_user_meta($current_user->ID ,'_first_name', true);
    $lastname = get_user_meta($current_user->ID , '_last_name', true);
    $email = $current_user-> user_email;
    $phone = get_user_meta($current_user->ID, '_phone', true);
};

?>
    <main>
<h2>Profiili</h2>
<p>Mikäli haluat käyttää Marjaana-tiliäsi kokeisiin ilmoittautumiseen, lisää alla olevat tiedot painamalla muokkaa. 
    Tietoja luovutetaan ainoastaan niille kokeenjärjestäjille, joiden järjestämiin kokeisiin olet ilmoittautunut.</p>

    <p><b>Nimi:</b> <?php echo $firstname.' '.$lastname;?><br>
    <b>Sähköpostiosoite:</b> <?php echo $email; ?><br>
    <b>Puhelinnumero:</b><?php echo $phone; ?><br><br>
    <a href="muokkaa-profiilia">(Muokkkaa profiilia)</a><br>

    </p>

      </main>

  </div> <!--content-->
  <?php
  get_footer();
  ?>