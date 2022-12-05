
<?php
/**
*The template name: Lisää koe

*/
// Adding a dog
echo "<script>function my_events_redirection(){
    window.location.replace('https://localhost/wordpress-6.0.2/semgroup8/koekalenteri');
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
        
        echo ' 
        <div id = "content">
                <main>
                <h2>Lisää koe</h2>        
            <div id="kokeen_lisays_div">
            <form id="register_user" method="post">
            <form id="register_user" method="post">
            <label for ="date">Päivämäärä</label><br>
            <input name="date" type="date"><br><br>
            <label for ="organizer">Järjestäjä</label><br>
            <input type="text" name="organizer" id="organizer"><br>
            <br>
            <label for ="first_judge">Ylituomari</label><br>
            <input type="text" name="first_judge" id="first_judge"><br>
            <br>
            <label for ="second_judge">Palkintotuomari</label><br>
            <input type="text" name="second_judge" id="second_judge"><br>
            <br>
            <label for ="limit">Rajoitukset</label><br>
            <textarea rows = "5" cols = "60" name ="limit" id="limit"></textarea><br>
            <br>
            <label for ="max">Max koiramäärä</label><br>
            <input type="text" name="max" id="max" size="3"><br>
            <br>
            <label for ="min">Min koiramäärä</label><br>
            <input type="text" name="min" id="min" size="3"><br>
            <br>
            <label for ="priority">Etusija</label><br>
            <input type="text" name="priority" id="priority"><br>
            <br>
            <label for ="enrollment1">Ilmoittautumisaika alkaa</label><br>
            <input name="enrollment1" type="date"><br>
            <br>
            <label for ="enrollment2">Ilmoittautumisaika päättyy</label><br>
            <input name="enrollment2" type="date"><br><br>
            <br>
            <label for ="price1">Yleinen osallistumismaksu</label><br>
            <input type="text" name="price1" id="price1" size="3">€<br>
            <br>
            <label for ="price2">Jäsenille</label><br>
            <input type="text" name="price2" id="price2" size="3">€<br>
            <br>
            <label for ="info">Lisätiedot</label><br>
            <textarea rows = "5" cols = "60" name ="info" id="info"></textarea><br>
            <br>
            <label for ="other">Muuta</label><br>
            <input type="text" name="other" id="other" ><br>
            <br>
            <label for ="contact">Tiedustelut</label><br>
            <textarea rows = "5" cols = "60" name ="contact" id="contact"></textarea><br>
            <br>
            <label for="class">Luokka</label><br>
            <input type="checkbox" name="class" value="1"/> 1
            <input type="checkbox" name="class" value="2"/> 2
            <input type="checkbox" name="class" value="3"/> 3<br>
            <br>
            <label for="categ">Etsintämuoto</label><br>
            <input type="checkbox" name="categ" value="5"/> Kaikkien etsintämuotojen koe<br>
            <input type="checkbox" name="categ" value="6"/> Yhden etsintämuodon koe, sisäetsintä<br>
            <input type="checkbox" name="categ" value="7"/> Yhden etsintämuodon koe, laatikkoetsintä<br>
            <input type="checkbox" name="categ" value="8"/> Yhden etsintämuodon koe, ulkoetsintä<br>
            <input type="checkbox" name="categ" value="9"/> Yhden etsintämuodon koe, ajoneuvoetsintä<br>
            <br>
            <label for ="place">Paikkakunta</label><br>
            <input type="text" name="place" id="place"><br>
            <br>
            <label for ="address">Osoite</label><br>
            <input type="text" name="address" id="address"><br>
            <br>
            <input id="submit-button" type="submit" value="Tallenna">
            </form>
        </div>';

        //HUOM! Yllä olevassa html:n checkbox arvot pitää päivittää sen mukaan millä serverillä pyöritetään!
        if($_POST){
            
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
            
            if(is_user_logged_in()){
                
                $new_trial = array(
                'post_type'     => "ecalendar-event",
                'post_title'    => $title,
                'post_status'   => 'publish',
                'author'        => get_current_user_id(),
              );
            $post_id = wp_insert_post( $new_trial , $wp_error );
            wp_set_object_terms($post_id, $category, 'ecalendar_category');
            if ($post_id) {
                update_post_meta($post_id, '_ecalendar_meta_date', sanitize_text_field($_POST['date']));
                update_post_meta($post_id, '_ecalendar_meta_date_formatted', $formatted_date);
                update_post_meta($post_id, '_ecalendar_meta_organizer', sanitize_text_field($_POST['organizer']));
                update_post_meta($post_id, '_ecalendar_meta_first_judge', sanitize_text_field($_POST['first_judge']));
                update_post_meta($post_id, '_ecalendar_meta_second_judge', sanitize_text_field($_POST['second_judge']));
                update_post_meta($post_id, '_ecalendar_meta_limit', sanitize_text_field($_POST['limit']));
                update_post_meta($post_id, '_ecalendar_meta_max', sanitize_text_field($_POST['max']));
                update_post_meta($post_id, '_ecalendar_meta_min', sanitize_text_field($_POST['min']));
                update_post_meta($post_id, '_ecalendar_meta_priority', sanitize_text_field($_POST['priority']));
                update_post_meta($post_id, '_ecalendar_meta_enrollment1', sanitize_text_field($_POST['enrollment1']));
                update_post_meta($post_id, '_ecalendar_meta_enrollment2', sanitize_text_field($_POST['enrollment2']));
                update_post_meta($post_id, '_ecalendar_meta_price1', sanitize_text_field($_POST['price1']));
                update_post_meta($post_id, '_ecalendar_meta_price2', sanitize_text_field($_POST['price2']));
                update_post_meta($post_id, '_ecalendar_meta_info', sanitize_text_field($_POST['info']));
                update_post_meta($post_id, '_ecalendar_meta_other', sanitize_text_field($_POST['other']));
                update_post_meta($post_id, '_ecalendar_meta_contact', sanitize_text_field($_POST['contact']));
                update_post_meta($post_id, '_ecalendar_meta_class', sanitize_text_field($_POST['class']));
                update_post_meta($post_id, '_ecalendar_meta_place', sanitize_text_field($_POST['place']));
                update_post_meta($post_id, '_ecalendar_meta_address', sanitize_text_field($_POST['address']));
                update_post_meta($post_id, '_ecalendar_meta_modified', "false");
                
                echo '<script>my_events_redirection()</script>';
                exit;
                
                }}}}
else{
    echo '<h2>Lisää koe</h2>
    <div id = "content">
            <main>
    
    <div id="trial_error">
    <p>Vain kokeenjärjestäjät voivat lisätä kokeita!<br>
             <a href="#">Lue ohjeet tapahtumanjärjestejälle</a>.</p>
    </div>';
    };}
else{
    echo '
    <div id = "content">
            <main>
        <h2>Lisää koe</h2>
    <div id="trial_error">
    <p>Vain kokeenjärjestäjät voivat lisätä kokeita!<br>
             <a href="#">Lue ohjeet tapahtumanjärjestejälle</a>.</p>
    </div>';
    };

?>


<?php
  wp_reset_postdata()
?>

        </div>
    </main>

</div> <!--content-->
<?php
get_footer();
?>