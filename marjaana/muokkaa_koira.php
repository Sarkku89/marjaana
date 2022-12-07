
<?php
/**
*The template name: Muokkaa koiran tietoja

*/
// Adding a dog
echo "<script>function dog_profile_redirection(){
    window.location.replace('https://localhost/wordpress-6.0.2/semgroup8/koirasi');
}</script>";

get_header();


// Retrieve the dogs owned by this owner
$args = array(
    'post_type' => 'adogs-dog',
    'orderby' => '_adogs_meta_rname',
    'order' => 'ASC'
  );
  
$my_dogs= new WP_Query( $args );
$owner_id = get_current_user_id();
  
if( $my_dogs->have_posts() ) {
while( $my_dogs->have_posts() ) {
    $my_dogs->the_post();
    $dog_owner= get_post_meta($dog_id, '_adogs_meta_owner', true);
    $dog_id = get_the_ID();
    if($dog_owner == $owner_id){
        $modify = get_post_meta($dog_id, '_adogs_meta_modified', true);
        if($modify == "true"){
            $value_nickname= get_post_meta($dog_id, '_adogs_meta_nickname', true );
            $value_rname = get_post_meta($dog_id, '_adogs_meta_rname', true);
            $value_breed = get_post_meta($dog_id, '_adogs_meta_breed', true);
            $valuefci = get_post_meta($dog_id, '_adogs_meta_fcigroup', true);
            $value_renro = get_post_meta($dog_id, '_adogs_meta_renro', true);
            $value_mc = get_post_meta($dog_id, '_adogs_meta_microchip', true);
            $valuek = get_post_meta($dog_id, '_adogs_meta_kekc', true);
            $valuek2 = get_post_meta($dog_id, '_adogs_meta_yeksc', true);
            $valuek3 = get_post_meta($dog_id, '_adogs_meta_yeklc', true);
            $valuek4 = get_post_meta($dog_id, '_adogs_meta_yekac', true);
            $valuek5 = get_post_meta($dog_id, '_adogs_meta_yekuc', true);
            $value_gender = get_post_meta($dog_id, '_adogs_meta_gender', true); 
        
            if($_POST){
            
                update_post_meta($post->ID, '_adogs_meta_nickname', sanitize_text_field($_POST['nickname']));
                update_post_meta($post->ID, '_adogs_meta_rname', sanitize_text_field($_POST['rname']));
                update_post_meta($post->ID, '_adogs_meta_breed', sanitize_text_field($_POST['breed']));
                update_post_meta($post->ID, '_adogs_meta_fcigroup', sanitize_text_field($_POST['fcigroup']));
                update_post_meta($post->ID, '_adogs_meta_renro', sanitize_text_field($_POST['renro']));
                update_post_meta($post->ID, '_adogs_meta_microchip', sanitize_text_field($_POST['microchip']));
                update_post_meta($post->ID, '_adogs_meta_kekc', sanitize_text_field($_POST['cc_kek']));
                update_post_meta($post->ID, '_adogs_meta_yeksc', sanitize_text_field($_POST['cc_yeks']));
                update_post_meta($post->ID, '_adogs_meta_yeklc', sanitize_text_field($_POST['cc_yekl']));
                update_post_meta($post->ID, '_adogs_meta_yekac', sanitize_text_field($_POST['cc_yeka']));
                update_post_meta($post->ID, '_adogs_meta_yekuc', sanitize_text_field($_POST['cc_yeku']));
                update_post_meta($post->ID, '_adogs_meta_gender', sanitize_text_field($_POST['gender']));
                update_post_meta($post->ID, '_adogs_meta_owner', get_current_user_id());
                update_post_meta($post->ID, '_adogs_meta_modified', "false");
                
                echo '<script>dog_profile_redirection()</script>';
                exit;
            
            };};
}}};
?>

<div id = "content">
<main>
    <h2>Muokkaa koiran tietoja</h2>
    <div id="koiran_muokkaus_div">
    <form id="register_user" method="post">
    <label for ="nickname">Kutsumanimi</label><br>
	<input name="nickname" type="text" id="nickname" size="50" value="<?php echo $value_nickname; ?>"><br>
    <br>
    <label for ="rname">Rekisterinimi</label><br>
    <input type="text" name="rname" id="rname" size="50" value="<?php echo $value_rname; ?>"><br>
    <br>
    <label for ="fcigroup">Roturyhmä</label><br>
    <select id="fcigroup" name="fcigroup">
    
        <option value="<?php echo $valuefci ?>"><?php echo strtoupper($valuefci) ?></option>
        <option value="xrotu">Monirotuinen</option>
        <option value="fci1">FCI 1</option>
        <option value="fci2">FCI 2</option>
        
    </select><br>
    <select id="breed" name="breed">
    <option value="<?php echo $value_breed ?>"><?php echo $value_breed ?></option>
    </select><br>
    <br>
    <label for ="renro">Rekisterinumero</label><br>
    <input type="text" name="renro" id="renro" size="50" value="<?php echo $value_renro; ?>"><br>
    <br>
    <label for ="microchip">Mikrosirun numero</label><br>
    <input type="text" name ="microchip" id="microchip" size="50" value="<?php echo $value_mc; ?>"><br>
    <br>
    <label for ="gender">Sukupuoli</label><br>
    <input type="radio" <?php checked($value_gender,'Narttu');?> name="gender" value="Narttu" >
    <label>Narttu</label><br>
    <input type="radio" <?php checked($value_gender,'Uros');?> name="gender" value="Uros">
    <label>Uros</label><br>
    <br>
    <table id="compclasses_table">
    <tr>
        <th style="padding: 5px; text-align: left;"><label for="cc_kek">Kaikki etsintämuodot</label></th>
        
    <td>
    
    <input type="checkbox" name="cc_kek" value="KEK1" <?php echo (($valuek=='KEK1') ? 'checked="checked"': '');?>/> 1
    <input type="checkbox" name="cc_kek" value="KEK2" <?php echo (($valuek=='KEK2') ? 'checked="checked"': '');?>/> 2
    <input type="checkbox" name="cc_kek" value="KEK3" <?php echo (($valuek=='KEK3') ? 'checked="checked"': '');?>/> 3
</td>
    <tr>
    <tr>
        <th style="padding: 5px; text-align: left;"><label for="cc_yeks">Sisäetsintä</label></th>
        <td>
    <input type="checkbox" name="cc_yeks" value="YEKS1" <?php echo (($valuek2=='YEKS1') ? 'checked="checked"': '');?>/> 1
    <input type="checkbox" name="cc_yeks" value="YEKS2" <?php echo (($valuek2=='YEKS2') ? 'checked="checked"': '');?>/> 2
    <input type="checkbox" name="cc_yeks" value="YEKS3" <?php echo (($valuek2=='YEKS3') ? 'checked="checked"': '');?>/> 3
</td>
    </tr>
    <tr>
        <th style="padding: 5px; text-align: left;"><label for="cc_yeks">Laatikkoetsintä</label></th>
        <td>
    <input type="checkbox" name="cc_yekl" value="YEKL1" <?php echo (($valuek3=='YEKL1') ? 'checked="checked"': '');?>/> 1
    <input type="checkbox" name="cc_yekl" value="YEKL2" <?php echo (($valuek3=='YEKL2') ? 'checked="checked"': '');?>/> 2
    <input type="checkbox" name="cc_yekl" value="YEKL3" <?php echo (($valuek3=='YEKL3') ? 'checked="checked"': '');?>/> 3</td>
    </tr>
    <tr>
        <th style="padding: 5px; text-align: left;">
    <label for="cc_yeks">Ajoneuvoetsintä</label></th>
    <td>
    <input type="checkbox" name="cc_yeka" value="YEKA1" <?php echo (($valuek4=='YEKA1') ? 'checked="checked"': '');?>/> 1
    <input type="checkbox" name="cc_yeka" value="YEKA2" <?php echo (($valuek4=='YEKA2') ? 'checked="checked"': '');?>/> 2
    <input type="checkbox" name="cc_yeka" value="YEKA3" <?php echo (($valuek4=='YEKA3') ? 'checked="checked"': '');?>/> 3</td>
    </tr>
    <tr>
    <th style="padding: 5px; text-align: left;">
    <label for="cc_yeks">Ulkoetsintä</label></th>
    <td>
    <input type="checkbox" name="cc_yeku" value="YEKU1" <?php echo (($valuek5=='YEKU1') ? 'checked="checked"': '');?>/> 1
    <input type="checkbox" name="cc_yeku" value="YEKU2" <?php echo (($valuek5=='YEKU2') ? 'checked="checked"': '');?>/> 2
    <input type="checkbox" name="cc_yeku" value="YEKU3" <?php echo (($valuek5=='YEKU3') ? 'checked="checked"': '');?>/> 3
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