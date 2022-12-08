
<?php
/**
*The template name: Omat kokeesi

*/

echo "<script>function trial_modify_redirection(){
    window.location.replace('https://projector.thefirma.fi/~sjunnila/wordpress/muokkaa-koetta');
}</script>";

echo "<script>function console_log(text){
    console.log(text);
}</script>";


get_header(); 

if($_POST){

    $post_id = $_POST['trial_id_input'];
    update_post_meta($post_id, '_ecalendar_meta_modified', "true");
    echo '<script>trial_modify_redirection()</script>';
    exit;
};
?>

<div id = "content">
    <main>
<h2>Järjestämäsi kokeet</h2>
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

// Retrieve the trials authored by current user

if(is_user_logged_in()){

    if(has_user_role('author') || has_user_role('administrator')){
        $args = array(
            'author' => get_current_user_id(),
            'post_type' => 'ecalendar-event',
            'orderby' => 'title',
            'order' => 'ASC',
            'tax_query' => array(
                array(
                  'taxonomy' => 'ecalendar_category',
                  'field' => 'slug',
                  'terms' => 'kek'
                ))
          );
          
        $my_kek_trials= new WP_Query( $args );
        
        if( $my_kek_trials->have_posts() ) {
            while( $my_kek_trials->have_posts() ) {
              $my_kek_trials->the_post();
              $trial_id = get_the_ID();
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
                 </tr>
                 <tr id = "<?php echo $id ?>" style="display: none;">
                 <td colspan="5"><form method="post">
                <input type="hidden" name="trial_id_input" value="<?php echo $trial_id; ?>">
                <input style="color:rgba(55, 146, 75, 1);
                        font-weight: bold;
                        background-color: rgba(218, 248, 224, 1); 
                        padding: 5px; 
                        border: 1px solid rgba(55, 146, 75, 1);
                        border-radius: 5px;" type="submit" name="modify_trial" value="Muokkaa"/> </form></td></tr>
                    <?php 
          
              }
            }}};

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

if(is_user_logged_in()){
    if(has_user_role('author') || has_user_role('administrator')){
        $args = array(
            'author' => get_current_user_id(),
            'post_type' => 'ecalendar-event',
            'orderby' => 'title',
            'order' => 'ASC',
            'tax_query' => array(
                array(
                  'taxonomy' => 'ecalendar_category',
                  'field' => 'slug',
                  'terms' => 'yeks'
                ))
          );
          
        $my_yeks_trials= new WP_Query( $args );
        
        if( $my_yeks_trials->have_posts() ) {
            while( $my_yeks_trials->have_posts() ) {
              $my_yeks_trials->the_post();
              $trial_id = get_the_ID();
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
                 </tr>
                 <tr id = "<?php echo $id ?>" style="display: none;">
                 <td colspan="5"><form method="post">
                <input type="hidden" name="trial_id_input" value="<?php echo $trial_id; ?>">
                <input style="color:rgba(55, 146, 75, 1);
                        font-weight: bold;
                        background-color: rgba(218, 248, 224, 1); 
                        padding: 5px; 
                        border: 1px solid rgba(55, 146, 75, 1);
                        border-radius: 5px;" type="submit" name="modify_trial" value="Muokkaa"/> </form></td></tr>
                    <?php 
          
              }
            }}};

  wp_reset_postdata()
?>
</table>
</div>
<br>
<div id="yekl-div">
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

// Retrieve the trials authored by current user

if(is_user_logged_in()){

    if(has_user_role('author') || has_user_role('administrator')){
        $args = array(
            'author' => get_current_user_id(),
            'post_type' => 'ecalendar-event',
            'orderby' => 'title',
            'order' => 'ASC',
            'tax_query' => array(
                array(
                  'taxonomy' => 'ecalendar_category',
                  'field' => 'slug',
                  'terms' => 'yekl'
                ))
          );
          
        $my_yekl_trials= new WP_Query( $args );
        
        if( $my_yekl_trials->have_posts() ) {
            while( $my_yekl_trials->have_posts() ) {
              $my_yekl_trials->the_post();
              $trial_id = get_the_ID();
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
                 </tr>
                 <tr id = "<?php echo $id ?>" style="display: none;">
                 <td colspan="5"><form method="post">
                <input type="hidden" name="trial_id_input" value="<?php echo $trial_id; ?>">
                <input style="color:rgba(55, 146, 75, 1);
                        font-weight: bold;
                        background-color: rgba(218, 248, 224, 1); 
                        padding: 5px; 
                        border: 1px solid rgba(55, 146, 75, 1);
                        border-radius: 5px;" type="submit" name="modify_trial" value="Muokkaa"/> </form></td></tr>
                    <?php 
          
              }
            }}};

  wp_reset_postdata()
?>
</table>
</div>
<br>
<div id="yeku-div">
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

// Retrieve the trials authored by current user

if(is_user_logged_in()){

    if(has_user_role('author') || has_user_role('administrator')){
        $args = array(
            'author' => get_current_user_id(),
            'post_type' => 'ecalendar-event',
            'orderby' => 'title',
            'order' => 'ASC',
            'tax_query' => array(
                array(
                  'taxonomy' => 'ecalendar_category',
                  'field' => 'slug',
                  'terms' => 'yeku'
                ))
          );
          
        $my_yeku_trials= new WP_Query( $args );
        
        if( $my_yeku_trials->have_posts() ) {
            while( $my_yeku_trials->have_posts() ) {
              $my_yeku_trials->the_post();
              $trial_id = get_the_ID();
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
                 </tr>
                 <tr id = "<?php echo $id ?>" style="display: none;">
                 <td colspan="5"><form method="post">
                <input type="hidden" name="trial_id_input" value="<?php echo $trial_id; ?>">
                <input style="color:rgba(55, 146, 75, 1);
                        font-weight: bold;
                        background-color: rgba(218, 248, 224, 1); 
                        padding: 5px; 
                        border: 1px solid rgba(55, 146, 75, 1);
                        border-radius: 5px;" type="submit" name="modify_trial" value="Muokkaa"/> </form></td></tr>
                    <?php 
          
              }
            }}};

  wp_reset_postdata()
?>
</table>
</div>
<br>
<div id="yeka-div">
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

// Retrieve the trials authored by current user

if(is_user_logged_in()){

    if(has_user_role('author') || has_user_role('administrator')){
        $args = array(
            'author' => get_current_user_id(),
            'post_type' => 'ecalendar-event',
            'orderby' => 'title',
            'order' => 'ASC',
            'tax_query' => array(
                array(
                  'taxonomy' => 'ecalendar_category',
                  'field' => 'slug',
                  'terms' => 'yeka'
                ))
          );
          
        $my_yeka_trials= new WP_Query( $args );
        
        if( $my_yeka_trials->have_posts() ) {
            while( $my_yeka_trials->have_posts() ) {
              $my_yeka_trials->the_post();
              $trial_id = get_the_ID();
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
                 </tr>
                 <tr id = "<?php echo $id ?>" style="display: none;">
                 <td colspan="5"><form method="post">
                <input type="hidden" name="trial_id_input" value="<?php echo $trial_id; ?>">
                <input style="color:rgba(55, 146, 75, 1);
                        font-weight: bold;
                        background-color: rgba(218, 248, 224, 1); 
                        padding: 5px; 
                        border: 1px solid rgba(55, 146, 75, 1);
                        border-radius: 5px;" type="submit" name="modify_trial" value="Muokkaa"/> </form></td></tr>
                    <?php 
          
              }
            }}};

  wp_reset_postdata()
?>
</table>
</div>
</main>
</div> <!--content-->
<?php
get_footer();
?>