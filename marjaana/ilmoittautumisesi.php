
<?php
/**
*The template name: Ilmoittautumisesi

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
        <h2>Ilmoittautumisesi:</h2>
    <div id="my_enrollments_div">

<?php


  if( $my_dogs->have_posts() ) {
    while( $my_dogs->have_posts() ) {
      $my_dogs->the_post();
      $backup_1 = $post;
    $dog_id = get_the_ID();
    $nickname = get_post_meta($post->ID, '_adogs_meta_nickname', true);
    $rname = get_post_meta($post->ID, '_adogs_meta_rname', true);
    echo '<script>console_log("'.$dog_id.'")</script>';
?>
    <table id="my_enrollments">
    <tr><td>&#10148; <b>"<?php echo $nickname ?>"</b>, <?php echo $rname ?> </td></tr>
<?php
    $trials_args = array(
        'post_type' => 'ecalendar-event'
      );
      
    $my_dogs_trials= new WP_Query( $trials_args );

    if( $my_dogs_trials->have_posts() ) {
        while( $my_dogs_trials->have_posts() ) {
          $my_dogs_trials->the_post();
          $backup_2 =$post;
          $trial_id = $backup_2->ID;
          
          

        $my_trials_args = array(
            'post_type' => 'events-enrollment',
            'title'=> `${$dog_id}`,
            'category_name' => `${$trial_id}`,
            );        
        $my_trials= new WP_Query( $my_trials_args );
        
        if( $my_trials->have_posts() ) {
            while( $my_trials->have_posts() ) {
            $my_trials->the_post();

            $category = get_the_excerpt();
            $title = get_the_title();
                if((int)$category == (int)$trial_id && (int)$title == (int)$dog_id){
            $trial_title = get_the_title($trial_id);
            
                
    ?>

    <tr><td><?php echo $trial_title ?></td></tr>


<?php
  }}}}}}};
  wp_reset_postdata()
?>
</table>
 </main>

</div> <!--content-->
<?php
get_footer();
?>