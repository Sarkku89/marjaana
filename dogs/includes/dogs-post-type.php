<?php
echo // First try loading jQuery from Google's CDN
'<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>';

// List of dog breeds by fci groups & functions for displaying them as select options
echo '<script language="javascript">
const fci1 = ["ardennienkarjakoira", "australiankarjakoira", "australiankelpie", "australianpaimenkoira", "australian töpöhäntäinen karjakoira", "beauceron", 
"belgianpaimenkoira, groenendael", "belgianpaimenkoira, laekenois", "belgianpaimenkoira, malinois", "belgianpaimenkoira, tervueren", "bergamasco", 
"bordercollie", "bouvier", "briardi", "ceskoslovensky vlcak", "etelävenäjänkoira", "hollanninpaimenkoira, karkeakarvainen", "hollanninpaimenkoira, lyhytkarvainen",
"hollanninpaimenkoira, pitkäkarvainen", "itäeuroopanpaimenkoira", "karpaattienkoira", "katalonianpaimenkoira", "komondor", "kroatianpaimenkoira", "kuvasz",
"lancashirenkarjakoira", "lyhytkarvainen pyreneittenpaimenkoira", "mallorcanpaimenkoira", "maremmano-abruzzese", "mudi", "owczarek podhalanski", "partacollie", "picardienpaimenkoira", 
"pitkäkarvainen collie", "pitkäkarvainen pyreneittenpaimenkoira", "polski owczarek nizinny", "puli, muut värit", "puli, valkoinen", "pumi", "romanianpaimenkoira",
"saarloos wolfhond", "saksanpaimenkoira, pitkäkarvainen", "saksanpaimenkoira", "schapendoes", "schipperke", "serra de airesinpaimenkoira",
"shetlanninlammaskoira", "sileäkarvainen collie", "slovakiancuvac", "tsekinpaimenkoira", "valkoinenpaimenkoira", "vanhaenglanninlammaskoira", "welsh corgi cardigan", "welsh corgi pembroke"
];
const fci2 = ["affenpinseri","aidi","alentejonkoira","anatolianpaimenkoira ","appenzellinpaimenkoira","bernhardinkoira, lyhytkarvainen","bernhardinkoira, pitkäkarvainen",
"berninpaimenkoira","bokseri","bordeauxindoggi","broholminkoira","bukovinankoira","bullmastiffi","cane corso","cao de castro laboreiro",
"dobermanni","dogo argentino","englanninbulldoggi","entlebuchinpaimenkoira","espanjanmastiffi","estrelanvuoristokoira, lyhytkarvainen","estrelanvuoristokoira, pitkäkarvainen",
"fila brasileiro","hollanninrottakoira","hovawart","isosveitsinpaimenkoira","itävallanpinseri","kanariandoggi","karstinpaimenkoira",
"kaukasiankoira","keskiaasiankoira","kääpiöpinseri","kääpiösnautseri","landseer","leonberginkoira",
"mallorcandoggi","mastiffi","napolinmastiffi","newfoundlandinkoira","pinseri","pyreneittenkoira","pyreneittenmastiffi","rottweiler","sao miguelinfila","sarplaninac","shar pei",
"snautseri","tanskalais-ruotsalainen pihakoira","tanskandoggi","tiibetinmastiffi","tornjak","tosa","uruguayan cimarron","venäjänmustaterrieri"
];

jQuery(document).ready(function () {

    jQuery("#adogs_fcigroup").change(function () {
        let value = jQuery("#adogs_fcigroup").find("option:selected").val();
        if (value = "fci1") {
            for (let i = 0; i < fci1.length; i++) {
                let breedname = fci1[i];
                let html = `<option value="${breedname}">${breedname}</option>`
                jQuery("#adogs_breed").append(html);
            }
        }
        if (value = "fci2") {
            for (let i = 0; i < fci2.length; i++) {
                let breedname = fci2[i];
                let html = `<option value="${breedname}">${breedname}</option>`
                jQuery("#adogs_breed").append(html);

            }
        }
    })
});

function getTheBreed(){
    let value = jQuery("#adogs_breed").find("option:selected").val();
    return value;
}

</script>
';

/* register the new post type: dog */

function adogs_register_post_type(){
    $labels = array(
        'name' => 'Koirat',
        'singular_name' => "Koira",
        'add_new' => 'Uusi koira',
        'add_new_item' => 'Lisää uusi koira',
        'edit_item' => 'Muokkaa koiraa',
        'new_item' => 'Uusi koira',
        'view_item' => 'Selaa koiria',
        'search_items' => 'Etsi koiria',
        'not_found' => 'Koiria ei löytynyt',
        'not_found_in_trash' => "Koiria ei löytynyt roskakorista"
    );

    $args = array(
        'labels' => $labels,
        'has_archive' => true,
        'public' => true,
        'hierarchical' => false,
        'supports' => array(
            'custom-fields'),
        'rewrite' => array('slug' => 'koira'),
        'show_in_rest' => true,

    );
register_post_type('adogs-dog', $args);
}
add_action('init', 'adogs_register_post_type');

 
/* Add custom fields for dog custom post type*/

function adogs_add_custom_box(){
    add_meta_box( 
        'adogs_nickname_id',
        __('Kutsumanimi' ),  
        'adogs_nickname_box_html', 	 
        'adogs-dog', 					 
        'normal' 
    );
    add_meta_box( 
        'adogs_rname_id',
        __('Rekisterinimi' ),  
        'adogs_rname_box_html', 	 
        'adogs-dog', 					 
        'normal' 
    );
    add_meta_box( 
        'adogs_breed_id',	  
        __('Rotu' ),   
        'adogs_breed_box_html', 	  
        'adogs-dog', 					  
        'normal' 
    );
    add_meta_box( 
        'adogs_renro_id',	  
        __('Rekisterinumero' ),   
        'adogs_renro_box_html', 	  
        'adogs-dog', 					  
        'normal' 
    );
    add_meta_box( 
        'adogs_microchip_id',	  
        __('Mikrosirun numero' ),   
        'adogs_microchip_box_html', 	  
        'adogs-dog', 					  
        'normal' 
    );
    add_meta_box( 
        'adogs_gender_id',	  
        __('Sukupuoli' ),   
        'adogs_gender_box_html', 	  
        'adogs-dog', 					  
        'normal' 
    );
    add_meta_box( 
        'adogs_compclasses_id',	  
        __('Missä luokissa koira kilpailee' ),   
        'adogs_compclasses_box_html', 	  
        'adogs-dog', 					  
        'normal' 
    );

}

add_action('add_meta_boxes', 'adogs_add_custom_box');

// Defining function for each custom field
function adogs_nickname_box_html($post){
    $value = get_post_meta( $post->ID, '_adogs_meta_nickname', true );

	?>

    <label for ="adogs_nickname">Kutsumanimi</label><br>
	<input name="adogs_nickname" type="text" id="adogs_nickname" size="50" value="<?php echo $value; ?>">
    <?php
}


function adogs_rname_box_html($post){
    $value = get_post_meta($post->ID, '_adogs_meta_rname', true);
    ?>
    <label for ="adogs_rname">Rekisterinimi</label><br>
    <input type="text" name="adogs_rname" id="adogs_rname" size="50" value="<?php echo $value; ?>">
    <?php
}

function adogs_breed_box_html($post){
    
    $value = get_post_meta($post->ID, '_adogs_meta_breed', true);
    $valuefci = get_post_meta($post->ID, '_adogs_meta_fcigroup', true);
    ?>
    <label for ="adogs_fcigroup">Roturyhmä</label><br>
    <select id="adogs_fcigroup" name="adogs_fcigroup">
    
        <option value="<?php echo $valuefci ?>"><?php echo strtoupper($valuefci) ?></option>
        <option value="xrotu">Monirotuinen</option>
        <option value="fci1">FCI 1</option>
        <option value="fci2">FCI 2</option>
        <option value="fci3">FCI 3</option>
        <option value="fci4">FCI 4</option>
        
    </select>
    <select id="adogs_breed" name="adogs_breed">
    <option value="<?php echo $value ?>"><?php echo $value ?></option>
    </select>
    <?php
}

function adogs_renro_box_html($post){
    $value = get_post_meta($post->ID, '_adogs_meta_renro', true);
    ?>
    <label for ="adogs_renro">Rekisterinumero</label><br>
    <input type="text" name="adogs_renro" id="adogs_renro" size="50" value="<?php echo $value; ?>">
    <?php
}

function adogs_microchip_box_html($post){
    $value = get_post_meta($post->ID, '_adogs_meta_microchip', true);
    ?>
    <label for ="adogs_microchip">Mikrosirun numero</label><br>
    <input type="text" name ="adogs_microchip" id="adogs_microchip" size="50" value="<?php echo $value; ?>">
    <?php
}

function adogs_gender_box_html($post){
    $value = get_post_meta($post->ID, '_adogs_meta_gender', true);
    ?>
    <input type="radio" <?php checked($value,'Narttu');?> name="adogs_gender" value="Narttu" >
    <label>Narttu</label><br>
    <input type="radio" <?php checked($value,'Uros');?> name="adogs_gender" value="Uros">
    <label>Uros</label><br>
    <?php
}

function adogs_compclasses_box_html($post){
    $value = get_post_meta($post->ID, '_adogs_meta_kekc', true);
    $value2 = get_post_meta($post->ID, '_adogs_meta_yeksc', true);
    $value3 = get_post_meta($post->ID, '_adogs_meta_yeklc', true);
    $value4 = get_post_meta($post->ID, '_adogs_meta_yekac', true);
    $value5 = get_post_meta($post->ID, '_adogs_meta_yekuc', true);

    
    ?>
    <table id="compclasses_table">
    <tr>
        <th style="padding: 5px; text-align: left;"><label for="cc_kek">Kaikki etsintämuodot</label></th>
        
    <td>
    
    <input type="checkbox" name="cc_kek" value="KEK1" <?php echo (($value=='KEK1') ? 'checked="checked"': '');?>/> 1
    <input type="checkbox" name="cc_kek" value="KEK2" <?php echo (($value=='KEK2') ? 'checked="checked"': '');?>/> 2
    <input type="checkbox" name="cc_kek" value="KEK3" <?php echo (($value=='KEK3') ? 'checked="checked"': '');?>/> 3
</td>
    <tr>
    <tr>
        <th style="padding: 5px; text-align: left;"><label for="cc_yeks">Sisäetsintä</label></th>
        <td>
    <input type="checkbox" name="cc_yeks" value="YEKS1" <?php echo (($value2=='YEKS1') ? 'checked="checked"': '');?>/> 1
    <input type="checkbox" name="cc_yeks" value="YEKS2" <?php echo (($value2=='YEKS2') ? 'checked="checked"': '');?>/> 2
    <input type="checkbox" name="cc_yeks" value="YEKS3" <?php echo (($value2=='YEKS3') ? 'checked="checked"': '');?>/> 3
</td>
    </tr>
    <tr>
        <th style="padding: 5px; text-align: left;"><label for="cc_yeks">Laatikkoetsintä</label></th>
        <td>
    <input type="checkbox" name="cc_yekl" value="YEKL1" <?php echo (($value3=='YEKL1') ? 'checked="checked"': '');?>/> 1
    <input type="checkbox" name="cc_yekl" value="YEKL2" <?php echo (($value3=='YEKL2') ? 'checked="checked"': '');?>/> 2
    <input type="checkbox" name="cc_yekl" value="YEKL3" <?php echo (($value3=='YEKL3') ? 'checked="checked"': '');?>/> 3</td>
    </tr>
    <tr>
        <th style="padding: 5px; text-align: left;">
    <label for="cc_yeks">Ajoneuvoetsintä</label></th>
    <td>
    <input type="checkbox" name="cc_yeka" value="YEKA1" <?php echo (($value4=='YEKA1') ? 'checked="checked"': '');?>/> 1
    <input type="checkbox" name="cc_yeka" value="YEKA2" <?php echo (($value4=='YEKA2') ? 'checked="checked"': '');?>/> 2
    <input type="checkbox" name="cc_yeka" value="YEKA3" <?php echo (($value4=='YEKA3') ? 'checked="checked"': '');?>/> 3</td>
    </tr>
    <tr>
        <th style="padding: 5px; text-align: left;">
    <label for="cc_yeks">Ulkoetsintä</label></th>
    <td>
    <input type="checkbox" name="cc_yeku" value="YEKU1" <?php echo (($value5=='YEKU1') ? 'checked="checked"': '');?>/> 1
    <input type="checkbox" name="cc_yeku" value="YEKU2" <?php echo (($value5=='YEKU2') ? 'checked="checked"': '');?>/> 2
    <input type="checkbox" name="cc_yeku" value="YEKU3" <?php echo (($value5=='YEKU3') ? 'checked="checked"': '');?>/> 3
    </td>
    </tr>
</table>
    <?php
}



// Saving the data of custom post type: dog
function adogs_save_postdata($post_id){
    if(array_key_exists('adogs_nickname', $_POST)):
        update_post_meta(
            $post_id,
            '_adogs_meta_nickname',
            sanitize_text_field($_POST['adogs_nickname'])
        );
    endif;
    if(array_key_exists('adogs_rname', $_POST)):
        update_post_meta(
            $post_id,
            '_adogs_meta_rname',
            sanitize_text_field($_POST['adogs_rname'])
        );
    endif;
    if ( isset( $_POST['adogs_breed'] ) ) {
            update_post_meta( $post_id, 
            '_adogs_meta_breed', 
            sanitize_text_field($_POST['adogs_breed'] ));
        }
    if ( isset( $_POST['adogs_fcigroup'] ) ) {
            update_post_meta( $post_id, 
            '_adogs_meta_fcigroup', 
            sanitize_text_field($_POST['adogs_fcigroup'] ));
        }
            
    if(array_key_exists('adogs_renro', $_POST)):
        update_post_meta(
            $post_id,
            '_adogs_meta_renro',
            sanitize_text_field($_POST['adogs_renro'])
        );
    endif;
    if(array_key_exists('adogs_microchip', $_POST)):
        update_post_meta(
            $post_id,
            '_adogs_meta_microchip',
            sanitize_text_field($_POST['adogs_microchip'])
        );
    endif;
    if(array_key_exists('adogs_gender', $_POST)):
        update_post_meta(
            $post_id,
            '_adogs_meta_gender',
            sanitize_text_field($_POST['adogs_gender'])
        );
    endif;

    if(array_key_exists('cc_kek', $_POST)):
        update_post_meta(
            $post_id,
            '_adogs_meta_kekc',
            sanitize_text_field($_POST['cc_kek'])
        );
    endif;
    if(array_key_exists('cc_yeks', $_POST)):
        update_post_meta(
            $post_id,
            '_adogs_meta_yeksc',
            sanitize_text_field($_POST['cc_yeks'])
        );
    endif;
    if(array_key_exists('cc_yekl', $_POST)):
        update_post_meta(
            $post_id,
            '_adogs_meta_yeklc',
            sanitize_text_field($_POST['cc_yekl'])
        );
    endif;
    if(array_key_exists('cc_yeka', $_POST)):
        update_post_meta(
            $post_id,
            '_adogs_meta_yekac',
            sanitize_text_field($_POST['cc_yeka'])
        );
    endif;
    if(array_key_exists('cc_yeku', $_POST)):
        update_post_meta(
            $post_id,
            '_adogs_meta_yekuc',
            sanitize_text_field($_POST['cc_yeku'])
        );
    endif;
  }


 

add_action('save_post', 'adogs_save_postdata');
?>