<?php
echo "<script>function trial_enrollment_redirection(){
    window.location.replace('https://projector.thefirma.fi/~sjunnila/wordpress/ilmoittaudu-kokeeseen');
}</script>";

get_header(); 

if($_POST){
    $trial_id = $_POST['trial_id_input'];
    update_user_meta($current_user->ID, 'trial_to_enroll', $trial_id, '');
    echo '<script>trial_enrollment_redirection()</script>';
    exit;
};
?>
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
    $trial_id = $post->ID;
       ?>
       
       <tr id="baserow">
        <td><?php echo get_post_meta($post->ID, '_ecalendar_meta_date_formatted', true);?></td>
        <td><?php echo get_post_meta($post->ID, '_ecalendar_meta_place', true);?></td>
        <td><?php echo get_post_meta($post->ID, '_ecalendar_meta_class', true);?></td>
        <td><?php echo get_post_meta($post->ID, '_ecalendar_meta_organizer', true);?></td>
        <td><?php echo get_post_meta($post->ID, '_ecalendar_meta_status', true);?></td>
       </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Paikka</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_address', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Ylituomari</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_first_judge', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Palkintotuomari</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_second_judge', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Rajoitukset</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_limit', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Etusija</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_priority', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Ilm.aika</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_enrollment1', true);?> - <?php echo get_post_meta($post->ID, '_ecalendar_meta_enrollment1', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Os.maksu</td>
            <td colspan="4">Yleinen: <?php echo get_post_meta($post->ID, '_ecalendar_meta_price1', true);?>€, Jäsenille: <?php echo get_post_meta($post->ID, '_ecalendar_meta_price2', true);?>€</td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;"> 
            <td colspan="1">Lisätiedot</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_info', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Muuta</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_other', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Tiedustelu</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_contact', true);?></td>
       </tr>
       <tr id = "<?php echo $id ?>" style="display: none;">
       <td colspan="5"><form method="post">
        <input type="hidden" name="trial_id_input" value="<?php echo $trial_id; ?>">
        <input style="color:rgba(55, 146, 75, 1);
                        font-weight: bold;
                        background-color: rgba(218, 248, 224, 1); 
                        padding: 5px; 
                        border: 1px solid rgba(55, 146, 75, 1);
                        border-radius: 5px;" type="submit" name="enroll_trial" value="Ilmoittaudu"/>
    </form></td>
       </tr>
       <?php 

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
            <td colspan="1">Paikka</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_address', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Ylituomari</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_first_judge', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Palkintotuomari</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_second_judge', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Rajoitukset</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_limit', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Etusija</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_priority', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Ilm.aika</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_enrollment1', true);?>-<?php echo get_post_meta($post->ID, '_ecalendar_meta_enrollment1', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Os.maksu</td>
            <td colspan="4">Yleinen: <?php echo get_post_meta($post->ID, '_ecalendar_meta_price1', true);?>€, Jäsenille: <?php echo get_post_meta($post->ID, '_ecalendar_meta_price2', true);?>€</td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;"> 
            <td colspan="1">Lisätiedot</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_info', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Muuta</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_other', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Tiedustelu</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_contact', true);?></td>
       </tr>
       <tr id = "<?php echo $id ?>" style="display: none;">
       <td colspan="5"><form method="post">
        <input type="hidden" name="trial_id_input" value="<?php echo $trial_id; ?>">
        <input style="color:rgba(55, 146, 75, 1);
                        font-weight: bold;
                        background-color: rgba(218, 248, 224, 1); 
                        padding: 5px; 
                        border: 1px solid rgba(55, 146, 75, 1);
                        border-radius: 5px;" type="submit" name="enroll_trial"
                value="Ilmoittaudu"/>
    </form></td>
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
            <td colspan="1">Paikka</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_address', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Ylituomari</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_first_judge', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Palkintotuomari</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_second_judge', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Rajoitukset</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_limit', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Etusija</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_priority', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Ilm.aika</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_enrollment1', true);?>-<?php echo get_post_meta($post->ID, '_ecalendar_meta_enrollment1', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Os.maksu</td>
            <td colspan="4">Yleinen: <?php echo get_post_meta($post->ID, '_ecalendar_meta_price1', true);?>€, Jäsenille: <?php echo get_post_meta($post->ID, '_ecalendar_meta_price2', true);?>€</td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;"> 
            <td colspan="1">Lisätiedot</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_info', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Muuta</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_other', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Tiedustelu</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_contact', true);?></td>
       </tr>
       <tr id = "<?php echo $id ?>" style="display: none;">
       <td colspan="5"><form method="post">
        <input type="hidden" name="trial_id_input" value="<?php echo $trial_id; ?>">
        <input style="color:rgba(55, 146, 75, 1);
                        font-weight: bold;
                        background-color: rgba(218, 248, 224, 1); 
                        padding: 5px; 
                        border: 1px solid rgba(55, 146, 75, 1);
                        border-radius: 5px;" type="submit" name="enroll_trial"
                value="Ilmoittaudu"/>
    </form></td>
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
            <td colspan="1">Paikka</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_address', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Ylituomari</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_first_judge', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Palkintotuomari</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_second_judge', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Rajoitukset</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_limit', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Etusija</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_priority', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Ilm.aika</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_enrollment1', true);?>-<?php echo get_post_meta($post->ID, '_ecalendar_meta_enrollment1', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Os.maksu</td>
            <td colspan="4">Yleinen: <?php echo get_post_meta($post->ID, '_ecalendar_meta_price1', true);?>€, Jäsenille: <?php echo get_post_meta($post->ID, '_ecalendar_meta_price2', true);?>€</td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;"> 
            <td colspan="1">Lisätiedot</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_info', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Muuta</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_other', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Tiedustelu</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_contact', true);?></td>
       </tr>
       <tr id = "<?php echo $id ?>" style="display: none;">
       <td colspan="5"><form method="post">
        <input type="hidden" name="trial_id_input" value="<?php echo $trial_id; ?>">
        <input style="color:rgba(55, 146, 75, 1);
                        font-weight: bold;
                        background-color: rgba(218, 248, 224, 1); 
                        padding: 5px; 
                        border: 1px solid rgba(55, 146, 75, 1);
                        border-radius: 5px;" type="submit" name="enroll_trial"
                value="Ilmoittaudu"/>
    </form></td>
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
            <td colspan="1">Paikka</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_address', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Ylituomari</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_first_judge', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Palkintotuomari</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_second_judge', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Rajoitukset</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_limit', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Etusija</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_priority', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Ilm.aika</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_enrollment1', true);?>-<?php echo get_post_meta($post->ID, '_ecalendar_meta_enrollment1', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Os.maksu</td>
            <td colspan="4">Yleinen: <?php echo get_post_meta($post->ID, '_ecalendar_meta_price1', true);?>€, Jäsenille: <?php echo get_post_meta($post->ID, '_ecalendar_meta_price2', true);?>€</td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;"> 
            <td colspan="1">Lisätiedot</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_info', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Muuta</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_other', true);?></td>
        </tr>
        <tr id = "<?php echo $id ?>" style="display: none;">
            <td colspan="1">Tiedustelu</td>
            <td colspan="4"><?php echo get_post_meta($post->ID, '_ecalendar_meta_contact', true);?></td>
       </tr>
       <tr id = "<?php echo $id ?>" style="display: none;">
       <td colspan="5"><form method="post">
        <input type="hidden" name="trial_id_input" value="<?php echo $trial_id; ?>">
        <input style="color:rgba(55, 146, 75, 1);
                        font-weight: bold;
                        background-color: rgba(218, 248, 224, 1); 
                        padding: 5px; 
                        border: 1px solid rgba(55, 146, 75, 1);
                        border-radius: 5px;" type="submit" name="enroll_trial"
                value="Ilmoittaudu"/>
    </form></td>
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