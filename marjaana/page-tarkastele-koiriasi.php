<?php
// Looping competition class results for individual dogs

get_header(); ?>
<div id = "content">
    <main>
        
<?php
    if (have_posts()): ?>
    
        <?php while(have_posts()): the_post(); ?>
        <article>
        <h2><?php the_title();?></h2>
        <?php the_content();?>
    </article>
    <?php
    endwhile;
    endif;?>
<?php
// Creating dynamic table for trials. Each post will create new row and subrow.
$args = array(
    'post_type' => 'adogs-dog',
    'orderby' => '_adogs_meta_rname',
    'order' => 'ASC'
  );
  
$my_dogs= new WP_Query( $args );
  
  if( $my_dogs->have_posts() ) {
    while( $my_dogs->have_posts() ) {
      $my_dogs->the_post();
    ?>
<div id="mydogsdiv">
    <br>
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
<?php
$cc_kek = get_post_meta($post->ID, '_adogs_meta_kekc', true);
$cc_yeks = get_post_meta($post->ID, '_adogs_meta_yeksc', true);
$cc_yekl = get_post_meta($post->ID, '_adogs_meta_yeklc', true);
$cc_yeku = get_post_meta($post->ID, '_adogs_meta_yekuc', true);
$cc_yeka = get_post_meta($post->ID, '_adogs_meta_yekac', true);

 ?>
 
<h4>Koeluokat</h4>
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
    <br>
    <hr></hr>
<?php
}}
  wp_reset_postdata()
?>
        </div>
    </main>
  <?php 
get_sidebar(); ?>
</div> <!--content-->
<?php
get_footer();
?>