
<?php
/**
*The template name: Ilmoittaudu kokeeseen

*/

echo "<script>

function enroll_trial_redirection(){
    window.location.replace('http://localhost/marjaana/wordpress/ilmoittautumisesi/');}
function error_redirection(){
        window.location.replace('http://localhost/marjaana/wordpress/koekalenteri');}
function console_log(logging){
            console.log(logging);
        }
</script>";

get_header(); 
if($_POST){
   
    $enrollment_args = array(
        'post_type' => 'events-enrollment',
        'post_category' => $trial_id
      );
    $enrollments = new WP_Query( $enrollment_args );
    
    $max = (int) get_post_meta($trial_id, '_ecalendar_meta_max', true);
    echo "<script>console_log(".$max.")</script>";
    $total_enrolled = $enrollments->found_posts;
    echo "<script>console_log(".$total_enrolled.")</script>";

    if( !($total_enrolled > $max)){
        $the_dog_to_enroll = $_POST['dog_id_input'];

        $new_enrollment = array(
            'post_type'     => "events-enrollment",
            'post_status'   => 'publish',
            'post_category' => $trial_id,
            'post_title'    => $the_dog_to_enroll);

            wp_insert_post( $new_enrollment , $wp_error );

        update_user_meta($current_user->ID, '_trial_to_enroll', null, '');
       
        echo "<h3>Kiitos ilmoittautumisesta!</h3>";
        //echo '<script>enroll_trial_redirection()</script>';
    }
    else{
        echo '<script>console_log("status updated")</script>';
        update_post_meta($trial_id, '_ecalendar_meta_status', "Täynnä");
        echo "<h3 style='color:red'>Koe on täynnä!</h3>";
        update_user_meta($current_user->ID, '_trial_to_enroll', null , '');
        sleep(10);
        //echo "<script>error_redirection()</script>";
    }
    
}
// Get the trial info
$trial_id= get_user_meta($current_user->ID, 'trial_to_enroll', true);

get_post( $trial_id);
echo '<script>console_log('.$trial_id.')</script>';
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