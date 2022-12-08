<?php
/**
*The template name: Muokkaa profiilia
*/
// Additional information from user
echo "<script>function profile_redirection(){
    window.location.replace('https://projector.thefirma.fi/~sjunnila/wordpress/profiili/');
}</script>";

echo "<script>function console_log(text){
    console.log(text);
}</script>";

get_header();
if(is_user_logged_in()){
    if($_POST){
        update_user_meta($current_user->ID, '_first_name', sanitize_text_field($_POST['user_firstname']), '');
        update_user_meta($current_user->ID, '_last_name', sanitize_text_field($_POST['user_lastname']), '');
        update_user_meta($current_user->ID, '_phone', sanitize_text_field($_POST['user_phone']), '');

        if(!empty($_POST['lisaa_uusi_org'])){
            echo "<script>console_log('not empty')</script>";
            $new_org = array(
                'post_type'     => "organizers-yhdistys",
                'post_title'    => sanitize_text_field($_POST['lisaa_uusi_org']),
                'post_status'   => 'publish',
              );
            $post_id = wp_insert_post( $new_org , $wp_error );
            if($post_id){
                update_user_meta($current_user->ID, '_user_organization', sanitize_text_field($_POST['lisaa_uusi_org']), '');
                echo "<script>console_log('New org')</script>";
            }}
        else{
            update_user_meta($current_user->ID, '_user_organization', sanitize_text_field($_POST['user_organization']), '');
        }
        
        //echo '<script>profile_redirection()</script>';
        exit;
    };
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
                <select id="user_organization" name="user_organization">
                    <option value="<?php echo get_user_meta($current_user->ID ,'_user_organization', true); ?>" selected><?php echo get_user_meta($current_user->ID ,'_user_organization', true);?></option>
                    
                    <?php 
                    $args = array(
                        'post_type' => 'organizers-yhdistys',
                        'orderby' => 'title',
                        'order' => 'ASC'
                      );
                      
                    $associations= new WP_Query( $args );
                    if( $associations->have_posts() ) {
                        while( $associations->have_posts() ) {
                          $associations->the_post();
                          $assoc_id = get_the_ID();
                          $assoc_title =get_the_title();
                            ?>
                            <option value="<?php echo $assoc_title ?>" name="user_organization"><?php echo $assoc_title ?></option>
                            <?php
                        }}
                    ?>
                    <option id="lisaa_yhdistys" value="0" >Lisää uusi</option>
                </select><br><br>
                <label id="lisaa_uusi_org_label" for ="lisaa_uusi_org" style="display:none; text-align: left;">Lisää uusi yhdistys</label><br>
                <input style="display:none;" type="text" name="lisaa_uusi_org" id="lisaa_uusi_org" size="80"><br>
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