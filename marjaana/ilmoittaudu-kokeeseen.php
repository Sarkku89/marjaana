
<?php
/**
*The template name: Ilmoittaudu kokeeseen

*/

echo "<script>

function enroll_trial_redirection(){
    window.location.replace('https://projector.thefirma.fi/~sjunnila/wordpress/ilmoittautumisesi/');}
function error_redirection(){
        window.location.replace('https://projector.thefirma.fi/~sjunnila/wordpress/koekalenteri');}
function console_log(logging){
            console.log(logging);
        }
</script>";

get_header(); 
if($_POST){
    $user_id = get_current_user_id();
    $trial_id= get_user_meta($user_id, 'trial_to_enroll', true);
    $enrollment_args = array(
        'post_type' => 'events-enrollment',
        'category_id' => get_cat_ID($trial_id)
      );
    $enrollments = new WP_Query( $enrollment_args );
    
    $max = get_post_meta($trial_id, '_ecalendar_meta_max', true);
    $total_enrolled = $enrollments->found_posts;

    if( ($total_enrolled < $max)){
        $the_dog_to_enroll = $_POST['dog_id_input'];

        $new_enrollment = array(
            'post_type'     => 'events-enrollment',
            'post_status'   => 'publish',
            'post_title'    => $the_dog_to_enroll,
            'post_excerpt'  => $trial_id);

        $succes = wp_insert_post($new_enrollment, $wp_error );
        if($succes){
            wp_set_object_terms($succes, $trial_id, 'events_category');
        }
        update_user_meta($current_user->ID, 'trial_to_enroll', null, '');
        $enrollment_args2 = array(
            'post_type' => 'events-enrollment',
            'category_id' => get_cat_ID($trial_id)
          );
        $enrollments2 = new WP_Query( $enrollment_args2 );
        
        $total_enrolled2 = $enrollments2->found_posts;
        if( ($total_enrolled >= $max)){
            update_post_meta($trial_id, '_ecalendar_meta_status', "Täynnä"); 
        }
        echo "<h3>Kiitos ilmoittautumisesta!</h3>";
        sleep(2);
        echo '<script>enroll_trial_redirection()</script>';
    }
    else{

        update_post_meta($trial_id, '_ecalendar_meta_status', "Täynnä");
        echo "<h3 style='color:red'>Koe on täynnä!</h3>";
        update_user_meta($user_id, '_trial_to_enroll', null , '');
        sleep(8);
        echo "<script>error_redirection()</script>";
    }
    
}
$user_id = get_current_user_id();
// Get the trial info
$trial_id= intval(get_user_meta($user_id, 'trial_to_enroll', true));

get_post( $trial_id);
$terms = wp_get_object_terms($trial_id, 'ecalendar_category', array('orderby' => 'term_id', 'order' => 'ASC') );
if ( !empty( $terms ) ) {
    $project = array();
    foreach ( $terms as $term ) {
    $project[] = $term->term_id;};
$categ = (int)$project[0];
if($categ == 10){
    $search_form = "KEK";
}
else if($categ == 8){
    $search_form = "YEK-A";
}
else if($categ == 7){
    $search_form = "YEK-U";
}
else if($categ ==6){
    $search_form = "YEK-L";
}
else if($categ == 4){
    $search_form = "YEK-S";
};}

// Retrieve the dogs owned by this owner
$owner_id = get_current_user_id();

$dog_args = array(
    'post_type' => 'adogs-dog',
    'orderby' => '_adogs_meta_rname',
    'order' => 'ASC',
    'author' => $owner_id
  );
  
$my_dogs= new WP_Query( $dog_args );

?>
<div id = "content">
    <main>    
        <h2>Ilmoittaudu kokeeseen:</h2>
        <h3><?php echo get_the_title($trial_id) ?>, <?php echo $search_form ?></h3>  
    <div id="mydogsuldiv">
<table id="enrollment">
<?php


  if( $my_dogs->have_posts() ) {
    while( $my_dogs->have_posts() ) {
      $my_dogs->the_post();
    $dog_id = get_the_ID();
    $cc_kek = get_post_meta($post->ID, '_adogs_meta_kekc', true);
    $cc_yeks = get_post_meta($post->ID, '_adogs_meta_yeksc', true);
    $cc_yekl = get_post_meta($post->ID, '_adogs_meta_yeklc', true);
    $cc_yeku = get_post_meta($post->ID, '_adogs_meta_yekuc', true);
    $cc_yeka = get_post_meta($post->ID, '_adogs_meta_yekac', true);
    $nickname = get_post_meta($post->ID, '_adogs_meta_nickname', true);
    $rname = get_post_meta($post->ID, '_adogs_meta_rname', true);

    ?>

   
    <tr><td>&#10148; "<?php echo $nickname ?>", <?php echo $rname ?> (<?php echo $cc_kek ?>, <?php echo $cc_yeks ?>, 
    <?php echo $cc_yekl ?>, <?php echo $cc_yeku ?>, <?php echo $cc_yekl ?>)</td><td> <form method="post"><input type="hidden" name="dog_id_input" value="<?php echo $dog_id; ?>"/><input type="submit" value="Ilmoita"/></form></td>
    <br>

<?php

}}


  wp_reset_postdata()
?>
</table>
 </main>

</div> <!--content-->
<?php
get_footer();
?>