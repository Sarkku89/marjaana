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
<div id = "content">
    <main>
        <h2 style="text-align: center; color: rgba(86, 212, 114, 1);">Profiili</h2>
        <div style="justify-content: center; background-color: rgba(218, 248, 224, 1); padding: 10px; border-radius: 10px;">
            <p style="text-align: center; color: rgba(55, 146, 75, 1); font-weight: bold;">Mikäli haluat käyttää Marjaana-tiliäsi kokeisiin ilmoittautumiseen, lisää alla olevat tiedot painamalla "Muokkaa profiilia". 
        <br><br>Tietoja luovutetaan ainoastaan niille kokeenjärjestäjille, joiden järjestämiin kokeisiin olet ilmoittautunut.</p>
        </div> 
        <br>
        <div style="float:left; width: 50%;">
            <p>
                <b>Nimi</b><hr style="color: rgba(86, 212, 114, 1)"> <?php echo $firstname.' '.$lastname; ?><br>
                <br><b>Puhelinnumero</b><br><hr style="color: rgba(86, 212, 114, 1)"> <?php echo $phone; ?><br>
            </p>
        </div>
        <div style="width: 50%; display: inline;";>
            <p>
                <b>Sähköpostiosoite</b><hr style="color: rgba(86, 212, 114, 1)"> <?php echo $email; ?><br>
                <br><b>Yhdistys</b><br><hr style="color: rgba(86, 212, 114, 1)"><br>     
            <p>
        </div>
        <br>
        <a style="background-color: rgba(218, 248, 224, 1); padding: 5px; border-radius: 5px;" href="muokkaa-profiilia">Muokkaa profiilia</a><br>
        

    </main>

  </div> <!--content-->
  <?php
  get_footer();
  ?>