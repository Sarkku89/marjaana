<?php

get_header(); ?>
<div id = "content">
  <main>
    <h2>Koekalenteri</h2>

    <div id="kekdiv">
      <h3>Kaikkien etsintämuotojen kokeet</h3>
      <table id="kek-kokeet">
        <tr>
          <th>Päivämäärä</th>
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
       
       <tr id="baserow">
        <td><?php echo get_post_meta($post->ID, '_ecalendar_meta_date_formatted', true);?></td>
        <td><?php echo get_post_meta($post->ID, '_ecalendar_meta_place', true);?></td>
        <td><?php echo get_post_meta($post->ID, '_ecalendar_meta_class', true);?></td>
        <td><?php echo get_post_meta($post->ID, '_ecalendar_meta_organizer', true);?></td>
        <td><?php echo get_post_meta($post->ID, '_ecalendar_meta_status', true);?></td>
       </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Paikka</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_address', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Ylituomari</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_first_judge', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Palkintotuomari</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_second_judge', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Rajoitukset</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_limit', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Etusija</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_priority', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Ilm.aika</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_enrollment1', true);?>-<?php echo get_post_meta($post->ID, '_ecalendar_meta_enrollment1', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Os.maksu</td>
            <td colspan="3">Yleinen: <?php echo get_post_meta($post->ID, '_ecalendar_meta_price1', true);?>€, Jäsenille: <?php echo get_post_meta($post->ID, '_ecalendar_meta_price2', true);?>€</td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;"> 
            <td colspan="2">Lisätiedot</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_info', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Muuta</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_other', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Tiedustelu</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_contact', true);?></td>
       </tr><?php 

    }
  }
  wp_reset_postdata()
 ?>

        </table>
        </div>
        <br>
        <div id="yeksdiv">
<h3>Yhden etsintämuodon kokeet - Sisäetsintä</h3>
<table id="yeks-kokeet">
    <tr>
        <th>Päivämäärä</th>
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
      'terms' => 'yeks'
    )
    
  )
);

$yeks_events = new WP_Query( $args );

if( $yeks_events->have_posts() ) {
  while( $yeks_events->have_posts() ) {
    $yeks_events->the_post();
    $id =  'subrow'.$post->ID;
    $bid = 'baserow'.$post->ID;
       ?>
       
       <tr id="baserow">
        <td><?php echo get_post_meta($post->ID, '_ecalendar_meta_date_formatted', true);?></td>
        <td><?php echo get_post_meta($post->ID, '_ecalendar_meta_place', true);?></td>
        <td><?php echo get_post_meta($post->ID, '_ecalendar_meta_class', true);?></td>
        <td><?php echo get_post_meta($post->ID, '_ecalendar_meta_organizer', true);?></td>
        <td><?php echo get_post_meta($post->ID, '_ecalendar_meta_status', true);?></td>
       </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Paikka</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_address', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Ylituomari</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_first_judge', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Palkintotuomari</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_second_judge', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Rajoitukset</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_limit', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Etusija</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_priority', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Ilm.aika</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_enrollment1', true);?>-<?php echo get_post_meta($post->ID, '_ecalendar_meta_enrollment1', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Os.maksu</td>
            <td colspan="3">Yleinen: <?php echo get_post_meta($post->ID, '_ecalendar_meta_price1', true);?>€, Jäsenille: <?php echo get_post_meta($post->ID, '_ecalendar_meta_price2', true);?>€</td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;"> 
            <td colspan="2">Lisätiedot</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_info', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Muuta</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_other', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Tiedustelu</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_contact', true);?></td>
       </tr><?php 

    }
  }
  wp_reset_postdata()
 ?>

        </table>
        </div>
        <br>
        <div id="yekldiv">
<h3>Yhden etsintämuodon kokeet - Laatikkoetsintä</h3>
<table id="yekl-kokeet">
    <tr>
        <th>Päivämäärä</th>
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
      'terms' => 'yekl'
    )
    
  )
);

$yekl_events = new WP_Query( $args );

if( $yekl_events->have_posts() ) {
  while( $yekl_events->have_posts() ) {
    $yekl_events->the_post();
    $id =  'subrow'.$post->ID;
    $bid = 'baserow'.$post->ID;
       ?>
       
       <tr id="baserow">
        <td><?php echo get_post_meta($post->ID, '_ecalendar_meta_date_formatted', true);?></td>
        <td><?php echo get_post_meta($post->ID, '_ecalendar_meta_place', true);?></td>
        <td><?php echo get_post_meta($post->ID, '_ecalendar_meta_class', true);?></td>
        <td><?php echo get_post_meta($post->ID, '_ecalendar_meta_organizer', true);?></td>
        <td><?php echo get_post_meta($post->ID, '_ecalendar_meta_status', true);?></td>
       </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Paikka</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_address', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Ylituomari</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_first_judge', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Palkintotuomari</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_second_judge', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Rajoitukset</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_limit', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Etusija</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_priority', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Ilm.aika</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_enrollment1', true);?>-<?php echo get_post_meta($post->ID, '_ecalendar_meta_enrollment1', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Os.maksu</td>
            <td colspan="3">Yleinen: <?php echo get_post_meta($post->ID, '_ecalendar_meta_price1', true);?>€, Jäsenille: <?php echo get_post_meta($post->ID, '_ecalendar_meta_price2', true);?>€</td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;"> 
            <td colspan="2">Lisätiedot</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_info', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Muuta</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_other', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Tiedustelu</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_contact', true);?></td>
       </tr><?php 

    }
  }
  wp_reset_postdata()
 ?>

        </table>
        </div>

        <br>
        <div id="yekudiv">
<h3>Yhden etsintämuodon kokeet - Ulkoetsintä</h3>
<table id="yeku-kokeet">
    <tr>
        <th>Päivämäärä</th>
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
      'terms' => 'yeku'
    )
    
  )
);

$yeku_events = new WP_Query( $args );

if( $yeku_events->have_posts() ) {
  while( $yeku_events->have_posts() ) {
    $yeku_events->the_post();
    $id =  'subrow'.$post->ID;
    $bid = 'baserow'.$post->ID;
       ?>
       
       <tr id="baserow">
        <td><?php echo get_post_meta($post->ID, '_ecalendar_meta_date_formatted', true);?></td>
        <td><?php echo get_post_meta($post->ID, '_ecalendar_meta_place', true);?></td>
        <td><?php echo get_post_meta($post->ID, '_ecalendar_meta_class', true);?></td>
        <td><?php echo get_post_meta($post->ID, '_ecalendar_meta_organizer', true);?></td>
        <td><?php echo get_post_meta($post->ID, '_ecalendar_meta_status', true);?></td>
       </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Paikka</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_address', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Ylituomari</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_first_judge', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Palkintotuomari</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_second_judge', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Rajoitukset</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_limit', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Etusija</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_priority', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Ilm.aika</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_enrollment1', true);?>-<?php echo get_post_meta($post->ID, '_ecalendar_meta_enrollment1', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Os.maksu</td>
            <td colspan="3">Yleinen: <?php echo get_post_meta($post->ID, '_ecalendar_meta_price1', true);?>€, Jäsenille: <?php echo get_post_meta($post->ID, '_ecalendar_meta_price2', true);?>€</td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;"> 
            <td colspan="2">Lisätiedot</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_info', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Muuta</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_other', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Tiedustelu</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_contact', true);?></td>
       </tr><?php 

    }
  }
  wp_reset_postdata()
 ?>

        </table>
        </div>
        <br>
        <div id="yekadiv">
<h3>Yhden etsintämuodon kokeet - Ajoneuvoetsintä</h3>
<table id="yeka-kokeet">
    <tr>
        <th>Päivämäärä</th>
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
      'terms' => 'yeka'
    )
    
  )
);

$yeka_events = new WP_Query( $args );

if( $yeka_events->have_posts() ) {
  while( $yeka_events->have_posts() ) {
    $yeka_events->the_post();
    $id =  'subrow'.$post->ID;
    $bid = 'baserow'.$post->ID;
       ?>
       
       <tr id="baserow">
        <td><?php echo get_post_meta($post->ID, '_ecalendar_meta_date_formatted', true);?></td>
        <td><?php echo get_post_meta($post->ID, '_ecalendar_meta_place', true);?></td>
        <td><?php echo get_post_meta($post->ID, '_ecalendar_meta_class', true);?></td>
        <td><?php echo get_post_meta($post->ID, '_ecalendar_meta_organizer', true);?></td>
        <td><?php echo get_post_meta($post->ID, '_ecalendar_meta_status', true);?></td>
       </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Paikka</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_address', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Ylituomari</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_first_judge', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Palkintotuomari</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_second_judge', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Rajoitukset</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_limit', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Etusija</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_priority', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Ilm.aika</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_enrollment1', true);?>-<?php echo get_post_meta($post->ID, '_ecalendar_meta_enrollment1', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Os.maksu</td>
            <td colspan="3">Yleinen: <?php echo get_post_meta($post->ID, '_ecalendar_meta_price1', true);?>€, Jäsenille: <?php echo get_post_meta($post->ID, '_ecalendar_meta_price2', true);?>€</td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;"> 
            <td colspan="2">Lisätiedot</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_info', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="2">Muuta</td>
            <td colspan="3"><?php echo get_post_meta($post->ID, '_ecalendar_meta_other', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
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
</div> <!--content-->
<?php
get_footer();
?>