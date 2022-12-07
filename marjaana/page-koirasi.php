<?php

echo "<script>function dog_modify_redirection(){
    window.location.replace('http://localhost/marjaana/wordpress/muokkaa-koiran-tietoja/');
}</script>";

echo "<script>function access_denied(pass) {
        if (pass = 'yes') {
            jQuery('#kokeen_lisays_div').show();
        }
        else {
            jQuery('#trial_error').show();
        };
    };</script>";

get_header(); ?>
<div id = "content">
    <main>        
<?php
    if (have_posts()): ?>  
        <?php while(have_posts()): the_post(); ?>
        <article>
        <h2><?php the_title();?></h2>
    
        <?php the_content();?>
        <a id="lisaa_koira_a" style="text-align: center" href="lisaa-koira">Lisää koira</a><br>
    </article>
    <?php
    endwhile;
    endif;?>
    
<?php
// Retrieve the dogs owned by this owner
$args = array(
    'post_type' => 'adogs-dog',
    'orderby' => '_adogs_meta_rname',
    'order' => 'ASC'
  );
  
$my_dogs= new WP_Query( $args );
$owner_id = get_current_user_id();

if($_POST){
    $post_id = $_POST['dog_id_input'];
    update_post_meta($post_id, '_adogs_meta_modified', "true");
    echo '<script>dog_modify_redirection()</script>';
    exit;
};
  
  if( $my_dogs->have_posts() ) {
    while( $my_dogs->have_posts() ) {
      $my_dogs->the_post();
      $dog_owner= get_post_meta($post->ID, '_adogs_meta_owner', true);
      $dog_id = get_the_ID();
      if($dog_owner == $owner_id){
    ?>
<div id="mydogsdiv">
<div id="gridarea1">
<table id="mydogs">
    <tr>
        <th>Koiran rekisterinimi:</th>
        <td><?php echo get_post_meta($post->ID, '_adogs_meta_rname', true);?></td>
</tr>
<tr>
        <th>Koiran kutsumanimi:</th>
        <td><?php echo get_post_meta($post->ID, '_adogs_meta_nickname', true);?></td>
</tr>
<tr>
        <th>Rotu:</th>
        <td><?php echo get_post_meta($post->ID, '_adogs_meta_breed', true);?></td>
</tr>
<tr>
        <th>Sukupuoli:</th>
        <td><?php echo get_post_meta($post->ID, '_adogs_meta_gender', true);?></td>
</tr>
<tr>
        <th>Rekisterinumero:</th>
        <td><?php echo get_post_meta($post->ID, '_adogs_meta_renro', true);?></td>
</tr>
<tr>
        <th>Mikrosirun numero:</th>
        <td><?php echo get_post_meta($post->ID, '_adogs_meta_microchip', true);?></td>
</tr>
</table>
<form method="post">
        <input type="hidden" name="dog_id_input" value="<?php echo $dog_id; ?>">
        <input type="submit" name="modify_dog"
                value="Muokkaa tietoja"/>
    </form>
      </div>
<?php
$cc_kek = get_post_meta($post->ID, '_adogs_meta_kekc', true);
$cc_yeks = get_post_meta($post->ID, '_adogs_meta_yeksc', true);
$cc_yekl = get_post_meta($post->ID, '_adogs_meta_yeklc', true);
$cc_yeku = get_post_meta($post->ID, '_adogs_meta_yekuc', true);
$cc_yeka = get_post_meta($post->ID, '_adogs_meta_yekac', true);

 ?>
 <div id="gridarea2">
<h4 style="color: rgba(55, 146, 75, 1); display: inline;">Koeluokat</h4>
<table id="competitionclasses">
    <tr>
        <th>Luokka</th>
        <th>KEK</th>
        <th>YEK-S</th>
        <th>YEK-L</th>
        <th>YEK-U</th>
        <th>YEK-A</th>
        </tr>
        <tr>
        <td>1.</td>
        <td><?php echo ($cc_kek == "KEK1" ? 'X' : ''); ?></td>
        <td><?php echo ($cc_yeks == "YEKS1" ? 'X' : ''); ?></td>
        <td><?php echo ($cc_yekl == "YEKL1" ? 'X' : ''); ?></td>
        <td><?php echo ($cc_yeku == "YEKU1" ? 'X' : ''); ?></td>
        <td><?php echo ($cc_yeka == "YEKA1" ? 'X' : ''); ?></td>
        </tr>
        <tr>
        <td>2.</td>
        <td><?php echo ($cc_kek == "KEK2" ? 'X' : ''); ?></td>
        <td><?php echo ($cc_yeks == "YEKS2" ? 'X' : ''); ?></td>
        <td><?php echo ($cc_yekl == "YEKL2" ? 'X' : ''); ?></td>
        <td><?php echo ($cc_yeku == "YEKU2" ? 'X' : ''); ?></td>
        <td><?php echo ($cc_yeka == "YEKA2" ? 'X' : ''); ?></td>
        </tr>
        <tr>
        <td>3.</td>
        <td><?php echo ($cc_kek == "KEK3" ? 'X' : ''); ?></td>
        <td><?php echo ($cc_yeks == "YEKS3" ? 'X' : ''); ?></td>
        <td><?php echo ($cc_yekl == "YEKL3" ? 'X' : ''); ?></td>
        <td><?php echo ($cc_yeku == "YEKU3" ? 'X' : ''); ?></td>
        <td><?php echo ($cc_yeka == "YEKA3" ? 'X' : ''); ?></td>
        </tr>

    
    </table>


      </div>
      </div>
    <hr style="color: rgba(86, 212, 114, 1)"></hr>
<?php

}}}

  wp_reset_postdata()
?>
 </main>

</div> <!--content-->
<?php
get_footer();
?>