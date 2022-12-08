
<?php
/**
*The template name: Lisää koira

*/
// Adding a dog
echo "<script>function dog_profile_redirection(){
    window.location.replace('https://projector.thefirma.fi/~sjunnila/wordpress/koirasi/');
}</script>";

echo "<script>function console_log(){
    console.log('True');
}</script>";

get_header();


// Retrieve the dogs owned by this owner

if(is_user_logged_in()){
      
    if($_POST){
        if(is_user_logged_in()){
            $new_dog = array(
            'post_type'     => "adogs-dog",
            'post_title'    => wp_strip_all_tags( $_POST['rname'] ),
            'post_status'   => 'publish'
          );
        $post_id = wp_insert_post( $new_dog , $wp_error );
        if ($post_id) {
            update_post_meta($post_id, '_adogs_meta_nickname', sanitize_text_field($_POST['nickname']));
            update_post_meta($post_id, '_adogs_meta_rname', sanitize_text_field($_POST['rname']));
            update_post_meta($post_id, '_adogs_meta_breed', sanitize_text_field($_POST['breed']));
            update_post_meta($post_id, '_adogs_meta_fcigroup', sanitize_text_field($_POST['fcigroup']));
            update_post_meta($post_id, '_adogs_meta_renro', sanitize_text_field($_POST['renro']));
            update_post_meta($post_id, '_adogs_meta_microchip', sanitize_text_field($_POST['microchip']));
            update_post_meta($post_id, '_adogs_meta_kekc', sanitize_text_field($_POST['cc_kek']));
            update_post_meta($post_id, '_adogs_meta_yeksc', sanitize_text_field($_POST['cc_yeks']));
            update_post_meta($post_id, '_adogs_meta_yeklc', sanitize_text_field($_POST['cc_yekl']));
            update_post_meta($post_id, '_adogs_meta_yekac', sanitize_text_field($_POST['cc_yeka']));
            update_post_meta($post_id, '_adogs_meta_yekuc', sanitize_text_field($_POST['cc_yeku']));
            update_post_meta($post_id, '_adogs_meta_gender', sanitize_text_field($_POST['gender']));
            update_post_meta($post_id, '_adogs_meta_owner', get_current_user_id());
            update_post_meta($post_id, '_adogs_meta_modified', "false");
            
            echo '<script>dog_profile_redirection()</script>';
            exit;
        }
        };};};
?>

<div id = "content">
<main>
    <h2>Lisää koira</h2>
    <div id="koiran_muokkaus_div">
    <form id="register_user" method="post">
    <label for ="nickname">Kutsumanimi</label><br>
	<input name="nickname" type="text" id="nickname" size="50"><br>
    <br>
    <label for ="rname">Rekisterinimi</label><br>
    <input type="text" name="rname" id="rname" size="50"><br>
    <br>
    <label for ="fcigroup">Roturyhmä</label><br>
    <select id="fcigroup" name="fcigroup">
    
        <option value="<?php echo $valuefci ?>"></option>
        <option value="xrotu">Monirotuinen</option>
        <option value="fci1">FCI 1</option>
        <option value="fci2">FCI 2</option>
        
    </select><br>
    <select id="breed" name="breed">
    <option></option>
    </select><br>
    <br>
    <label for ="renro">Rekisterinumero</label><br>
    <input type="text" name="renro" id="renro" size="50"><br>
    <br>
    <label for ="microchip">Mikrosirun numero</label><br>
    <input type="text" name ="microchip" id="microchip" size="50"><br>
    <br>
    <label for ="gender">Sukupuoli</label><br>
    <input type="radio" name="gender" value="Narttu" >
    <label>Narttu</label><br>
    <input type="radio" name="gender" value="Uros">
    <label>Uros</label><br>
    <br>
    <table id="compclasses_table">
    <tr>
        <th style="padding: 5px; text-align: left;"><label for="cc_kek">Kaikki etsintämuodot</label></th>
        
    <td>
    
    <input type="checkbox" name="cc_kek" value="KEK1" /> 1
    <input type="checkbox" name="cc_kek" value="KEK2"/> 2
    <input type="checkbox" name="cc_kek" value="KEK3"/> 3
</td>
    <tr>
    <tr>
        <th style="padding: 5px; text-align: left;"><label for="cc_yeks">Sisäetsintä</label></th>
        <td>
    <input type="checkbox" name="cc_yeks" value="YEKS1"/> 1
    <input type="checkbox" name="cc_yeks" value="YEKS2"/> 2
    <input type="checkbox" name="cc_yeks" value="YEKS3"/> 3
</td>
    </tr>
    <tr>
        <th style="padding: 5px; text-align: left;"><label for="cc_yeks">Laatikkoetsintä</label></th>
        <td>
    <input type="checkbox" name="cc_yekl" value="YEKL1"/> 1
    <input type="checkbox" name="cc_yekl" value="YEKL2"/> 2
    <input type="checkbox" name="cc_yekl" value="YEKL3"/> 3</td>
    </tr>
    <tr>
        <th style="padding: 5px; text-align: left;">
    <label for="cc_yeks">Ajoneuvoetsintä</label></th>
    <td>
    <input type="checkbox" name="cc_yeka" value="YEKA1"/> 1
    <input type="checkbox" name="cc_yeka" value="YEKA2"/> 2
    <input type="checkbox" name="cc_yeka" value="YEKA3"/> 3</td>
    </tr>
    <tr>
    <th style="padding: 5px; text-align: left;">
    <label for="cc_yeks">Ulkoetsintä</label></th>
    <td>
    <input type="checkbox" name="cc_yeku" value="YEKU1"/> 1
    <input type="checkbox" name="cc_yeku" value="YEKU2"/> 2
    <input type="checkbox" name="cc_yeku" value="YEKU3"/> 3
    </td>
    </tr>
</table>
<br>
    <input id="submit-button" type="submit" value="Tallenna">
    </form>
</div>

<?php
        


  wp_reset_postdata()
?>
        </div>
    </main>

</div> <!--content-->
<?php
get_footer();
?>