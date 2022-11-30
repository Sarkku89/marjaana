<?php

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
<div id="kekdiv">
<h2>Kaikkien etsintämuotojen kokeet</h2>
<table id="kek-kokeet">
    <tr>
        <th colspan="2">Päivämäärä</th>
        <th>Paikkakunta</th>
        <th>Luokka</th>
        <th>Järjestäjä</th>
        <th>Status</th>

</tr>
<?php 

// Creating dynamic table for trials. Each post will create new row and subrow.
$args = array(
  'post_type' => 'ecalendar-event',
  'orderby' => '_ecalendar_meta_date',
'order' => 'ASC',
  'tax_query' => array(
    array(
      'taxonomy' => 'ecalendar_category',
      'field' => 'slug',
      'terms' => 'kek'
    )
    
  )
);

$kek_events = new WP_Query( $args );

if( $kek_events->have_posts() ) {
  while( $kek_events->have_posts() ) {
    $kek_events->the_post();
    $id =  'subrow'.$post->ID;
    $bid = 'baserow'.$post->ID;
       ?>
       
       <tr id="<?php echo $bid;?>">
        <td style="display:none;"><input type="hidden" id="baserow_id" value="<?php echo $bid ?>"></td>
        <td style="display:none;"><input type="hidden" id="subrow_id" value="<?php echo $id ?>"></td>
        <td><button class="nuoli" onclick="toggling(<?php echo $post->ID ?>)">&#9660;</button></td>
        <td><?php echo get_post_meta($post->ID, '_ecalendar_meta_date_formatted', true);?></td>
        <td><?php echo get_post_meta($post->ID, '_ecalendar_meta_place', true);?></td>
        <td><?php echo get_post_meta($post->ID, '_ecalendar_meta_class', true);?></td>
        <td><?php echo get_post_meta($post->ID, '_ecalendar_meta_organizer', true);?></td>
        <td><?php echo get_post_meta($post->ID, '_ecalendar_meta_status', true);?></td>
       </tr>
        <tr id = "<?php echo $id;?>" style="display: none;">
            <td colspan="2">Paikka</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_address', true);?></td>
        </tr>
        <tr id = "<?php echo $id;?>" style="display: none;">
            <td colspan="2">Ylituomari</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_first_judge', true);?></td>
        </tr>
        <tr id = "<?php echo $id;?>" style="display: none;">
            <td colspan="2">Palkintotuomari</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_second_judge', true);?></td>
        </tr>
        <tr id = "<?php echo $id;?>" style="display: none;">
            <td colspan="2">Rajoitukset</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_limit', true);?></td>
        </tr>
        <tr id = "<?php echo $id;?>" style="display: none;">
            <td colspan="2">Etusija</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_priority', true);?></td>
        </tr>
        <tr id = "<?php echo $id;?>" style="display: none;">
            <td colspan="2">Ilm.aika</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_enrollment1', true);?>-<?php echo get_post_meta($post->ID, '_ecalendar_meta_enrollment1', true);?></td>
        </tr>
        <tr id = "<?php echo $id;?>" style="display: none;">
            <td colspan="2">Os.maksu</td>
            <td colspan="3">Yleinen: <?php echo get_post_meta($post->ID, '_ecalendar_meta_price1', true);?>€, Jäsenille: <?php echo get_post_meta($post->ID, '_ecalendar_meta_price2', true);?>€</td>
        </tr>
        <tr id ="<?php echo $id;?>" style="display: none;"> 
            <td colspan="2">Lisätiedot</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_info', true);?></td>
        </tr>
        <tr id = "<?php echo $id;?>" style="display: none;">
            <td colspan="2">Muuta</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_other', true);?></td>
        </tr>
        <tr id = "<?php echo $id;?>" style="display: none;">
            <td colspan="2">Tiedustelu</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_contact', true);?></td>
       </tr><?php 

    }
  }
  wp_reset_postdata()
 ?>

        </table>
        </div>
    </main>
  <?php 
get_sidebar(); ?>
</div> <!--content-->
<?php
get_footer();
?>