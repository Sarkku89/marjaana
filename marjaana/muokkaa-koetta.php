
<?php
/**
*The template name: Muokkaa koetta

*/
// Adding a dog
echo "<script>function my_events_redirection(){
    window.location.replace('http://localhost/marjaana/wordpress/kokeesi');
}</script>";

echo "<script>function console_log(text){
    console.log(text);
}</script>";

function has_user_role($role){
    $roles = marjaana_get_current_user_roles();
    $user = wp_get_current_user();
    if(in_array( $role, (array) $roles )){
        return true;
    }
    return false;
}

get_header();


// Retrieve the dogs owned by this owner

if(is_user_logged_in()){
    echo '<script>console_log("Logged in")</script>';
    if(has_user_role('author') || has_user_role('administrator')){
        echo '<script>console_log("Yes, author")</script>';
        $args = array(
            'author' => get_current_user_id(),
            'post_type' => 'ecalendar-event',
            'orderby' => 'title',
            'order' => 'ASC'
          );
          
        $my_trials= new WP_Query( $args );
          
          if( $my_trials->have_posts() ) {
            while( $my_trials->have_posts() ) {
              $my_trials->the_post();
              $trial_id = get_the_ID();
              $modify = get_post_meta($trial_id, '_ecalendar_meta_modified', true);
              if($modify == "true"){
                $date= get_post_meta($trial_id, '_ecalendar_meta_date', true );
                $organizer = get_post_meta($trial_id, '_ecalendar_meta_organizer', true);
                $first_judge = get_post_meta($trial_id, '_ecalendar_meta_first_judge', true);
                $second_judge = get_post_meta($trial_id, '_ecalendar_meta_second_judge', true);
                $limit = get_post_meta($trial_id, '_ecalendar_meta_limit', true);
                $max = get_post_meta($trial_id, '_ecalendar_meta_max', true);
                $min = get_post_meta($trial_id, '_ecalendar_meta_min', true);
                $priority = get_post_meta($trial_id, '_ecalendar_meta_priority', true);
                $enrollment1 = get_post_meta($trial_id, '_ecalendar_meta_enrollment1', true);
                $enrollment2 = get_post_meta($trial_id, '_ecalendar_meta_enrollment2', true);
                $price1 = get_post_meta($trial_id, '_ecalendar_meta_price1', true);
                $price2 = get_post_meta($trial_id, '_ecalendar_meta_price2', true); 
                $info = get_post_meta($trial_id, '_ecalendar_meta_info', true);
                $other = get_post_meta($trial_id, '_ecalendar_meta_other', true);
                $contact = get_post_meta($trial_id, '_ecalendar_meta_contact', true);
                $class = get_post_meta($trial_id, '_ecalendar_meta_class', true);
                $place = get_post_meta($trial_id, '_ecalendar_meta_place', true);
                $address = get_post_meta($trial_id, '_ecalendar_meta_address', true); 

                echo '<script>console_log('.$trial_id.')</script>';
                $terms = wp_get_object_terms($post->ID, 'ecalendar_category', array('orderby' => 'term_id', 'order' => 'ASC') );
                if ( !empty( $terms ) ) {
                $project = array();
                foreach ( $terms as $term ) {
                    $project[] = $term->term_id;};
                $categ = (int)$project[0];}};
                }}
                if($_POST){
                    echo '<script>console_log("we have a posting")</script>';
            
                    $initial_date= wp_strip_all_tags( $_POST['date'] );
                    $dd = substr($initial_date, -2);
                    $mm = substr($initial_date, -5, 2);
                    $yy = substr($initial_date, -10, 4);
                    $formatted_date = $dd.'.'.$mm.'.'.$yy;
        
                    $place = wp_strip_all_tags( $_POST['place'] );
                    $time = $formatted_date;
                    $class = wp_strip_all_tags( $_POST['class'] );
                    $title = $time.' '.$place.' '.$class.'.LK';
                    $category = get_the_category_by_ID( (int) $_POST['categ'] );
                    
                       // Update post
                    $my_trial = [
                        'ID'       => $trial_id,
                        'title'    => $title 
                    ];
                
                    // Update the post into the database
                    wp_update_post( $my_trial );
                    wp_remove_object_terms( $trial_id, $categ, 'ecalendar_category' );
                    wp_set_object_terms($trial_id, $category, 'ecalendar_category');
                  
                    update_post_meta($trial_id, '_ecalendar_meta_date', sanitize_text_field($_POST['date']));
                    update_post_meta($trial_id, '_ecalendar_meta_date_formatted', $formatted_date);
                    update_post_meta($trial_id, '_ecalendar_meta_organizer', sanitize_text_field($_POST['organizer']));
                    update_post_meta($trial_id, '_ecalendar_meta_first_judge', sanitize_text_field($_POST['first_judge']));
                    update_post_meta($trial_id, '_ecalendar_meta_second_judge', sanitize_text_field($_POST['second_judge']));
                    update_post_meta($trial_id, '_ecalendar_meta_limit', sanitize_text_field($_POST['limit']));
                    update_post_meta($trial_id, '_ecalendar_meta_max', sanitize_text_field($_POST['max']));
                    update_post_meta($trial_id, '_ecalendar_meta_min', sanitize_text_field($_POST['min']));
                    update_post_meta($trial_id, '_ecalendar_meta_priority', sanitize_text_field($_POST['priority']));
                    update_post_meta($trial_id, '_ecalendar_meta_enrollment1', sanitize_text_field($_POST['enrollment1']));
                    update_post_meta($trial_id, '_ecalendar_meta_enrollment2', sanitize_text_field($_POST['enrollment2']));
                    update_post_meta($trial_id, '_ecalendar_meta_price1', sanitize_text_field($_POST['price1']));
                    update_post_meta($trial_id, '_ecalendar_meta_price2', sanitize_text_field($_POST['price2']));
                    update_post_meta($trial_id, '_ecalendar_meta_info', sanitize_text_field($_POST['info']));
                    update_post_meta($trial_id, '_ecalendar_meta_other', sanitize_text_field($_POST['other']));
                    update_post_meta($trial_id, '_ecalendar_meta_contact', sanitize_text_field($_POST['contact']));
                    update_post_meta($trial_id, '_ecalendar_meta_class', sanitize_text_field($_POST['class']));
                    update_post_meta($trial_id, '_ecalendar_meta_place', sanitize_text_field($_POST['place']));
                    update_post_meta($trial_id, '_ecalendar_meta_address', sanitize_text_field($_POST['address']));
                    update_post_meta($trial_id, '_ecalendar_meta_modified', "false");
                        
                        echo '<script>console_log("success")</script>';
                        //echo '<script>my_events_redirection()</script>';
                        exit;
             
                }
            }
                ;}

?>

        <div id = "content">
                <main>        
                <h2>Muokkaa koetta</h2>
            <div id="kokeen_muokkaus_div">
            <form id="koemuokkaus" method="post">
            <label for ="date">Päivämäärä</label><br>
            <input name="date" type="date" value="<?php echo $date; ?>"><br><br>
            <label for ="organizer">Järjestäjä</label><br>
            <input type="text" name="organizer" id="organizer" value="<?php echo $organizer; ?>"><br>
            <label for ="first_judge">Ylituomari</label><br>
            <input type="text" name="first_judge" id="first_judge" value="<?php echo $first_judge; ?>"><br>
            <label for ="second_judge">Palkintotuomari</label><br>
            <input type="text" name="second_judge" id="second_judge" value="<?php echo $second_judge; ?>"><br>
            <label for ="limit">Rajoitukset</label><br>
            <textarea rows = "5" cols = "60" name ="limit" id="limit"><?php echo $limit; ?></textarea><br>
            <label for ="max">Max koiramäärä</label><br>
            <input type="text" name="max" id="max" size="3" value="<?php echo $max; ?>"><br>
            <label for ="min">Min koiramäärä</label><br>
            <input type="text" name="min" id="min" size="3" value="<?php echo $min; ?>"><br>
            <label for ="priority">Etusija</label><br>
            <input type="text" name="priority" id="priority" value="<?php echo $priority; ?>"><br><br>
            <label for ="enrollment1">Ilmoittautumisaika alkaa</label><br>
            <input name="enrollment1" type="date" value="<?php echo $enrollment1; ?>"><br>
            <label for ="enrollment2">Ilmoittautumisaika päättyy</label><br>
            <input name="enrollment2" type="date" value="<?php echo $enrollment2; ?>"><br><br>
            <label for ="price1">Yleinen osallistumismaksu</label><br>
            <input type="text" name="price1" id="price1" size="3" value="<?php echo $price1; ?>">€<br>
            <label for ="price2">Jäsenille</label><br>
            <input type="text" name="price2" id="price2" size="3" value="<?php echo $price2; ?>">€<br><br>
            <label for ="info">Lisätiedot</label><br>
            <textarea rows = "5" cols = "60" name ="info" id="info" ><?php echo $info; ?></textarea><br><br>
            <label for ="other">Muuta</label><br>
            <input type="text" name="other" id="other" value="<?php echo $other; ?>"><br><br>
            <label for ="contact">Tiedustelut</label><br>
            <textarea rows = "5" cols = "60" name ="contact" id="contact"><?php echo $contact; ?></textarea><br>
            <label for="class">Luokka</label><br>
            <input type="checkbox" name="class" value="1" <?php checked($class,'1');?>/> 1
            <input type="checkbox" name="class" value="2" <?php checked($class,'2');?>/> 2
            <input type="checkbox" name="class" value="3" <?php checked($class,'3');?>/> 3<br>
            <label for="categ">Etsintämuoto</label><br>
            <input type="checkbox" name="categ" value="10" <?php echo (($categ=="10") ? "checked='checked'": '');?>/> Kaikkien etsintämuotojen koe<br>
            <input type="checkbox" name="categ" value="4" <?php echo (($categ=="4") ? "checked='checked'": '');?>/> Yhden etsintämuodon koe, sisäetsintä<br>
            <input type="checkbox" name="categ" value="6" <?php echo (($categ=="6") ? "checked='checked'": '');?>/> Yhden etsintämuodon koe, laatikkoetsintä<br>
            <input type="checkbox" name="categ" value="7" <?php echo (($categ=="7") ? "checked='checked'": '');?>/> Yhden etsintämuodon koe, ulkoetsintä<br>
            <input type="checkbox" name="categ" value="8" <?php echo (($categ=="8") ? "checked='checked'": '');?>/> Yhden etsintämuodon koe, ajoneuvoetsintä<br>
            <label for ="place">Paikkakunta</label><br>
            <input type="text" name="place" id="place" value="<?php echo $place; ?>"><br>
            <label for ="address">Osoite</label><br>
            <input type="text" name="address" id="address" value="<?php echo $address; ?>"><br>
            <input type="submit" value="Tallenna">
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