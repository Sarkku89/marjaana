
<?php
/**
*The template name: Test

*/
// Looping competition class results for individual dogs

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


// Defining function for each custom field
    $value_nickname= get_post_meta( $post->ID, '_adogs_meta_nickname', true );

	?>

    <label for ="adogs_nickname">Kutsumanimi</label><br>
	<input name="adogs_nickname" type="text" id="adogs_nickname" size="50" value="<?php echo $value_nickname; ?>"><br>
    <?php


    $value_rname = get_post_meta($post->ID, '_adogs_meta_rname', true);
    ?>
    <label for ="adogs_rname">Rekisterinimi</label><br>
    <input type="text" name="adogs_rname" id="adogs_rname" size="50" value="<?php echo $value_rname; ?>"><br>
    <?php

    $value_breed = get_post_meta($post->ID, '_adogs_meta_breed', true);
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
        
    </select><br>
    <select id="adogs_breed" name="adogs_breed">
    <option value="<?php echo $value_breed ?>"><?php echo $value ?></option>
    </select><br>
    <?php

    $value_renro = get_post_meta($post->ID, '_adogs_meta_renro', true);
    ?>
    <label for ="adogs_renro">Rekisterinumero</label><br>
    <input type="text" name="adogs_renro" id="adogs_renro" size="50" value="<?php echo $value_renro; ?>"><br>
    <?php

    $value_mc = get_post_meta($post->ID, '_adogs_meta_microchip', true);
    ?>
    <label for ="adogs_microchip">Mikrosirun numero</label><br>
    <input type="text" name ="adogs_microchip" id="adogs_microchip" size="50" value="<?php echo $value_mc; ?>"><br>
    <?php

    $value_gender = get_post_meta($post->ID, '_adogs_meta_gender', true);
    ?>
    <label for ="adogs_gender">Sukupuoli</label><br>
    <input type="radio" <?php checked($value_gender,'Narttu');?> name="adogs_gender" value="Narttu" >
    <label>Narttu</label><br>
    <input type="radio" <?php checked($value_gender,'Uros');?> name="adogs_gender" value="Uros">
    <label>Uros</label><br>
    <?php

    $valuek = get_post_meta($post->ID, '_adogs_meta_kekc', true);
    $valuek2 = get_post_meta($post->ID, '_adogs_meta_yeksc', true);
    $valuek3 = get_post_meta($post->ID, '_adogs_meta_yeklc', true);
    $valuek4 = get_post_meta($post->ID, '_adogs_meta_yekac', true);
    $valuek5 = get_post_meta($post->ID, '_adogs_meta_yekuc', true);

    
    ?>
    <table id="compclasses_table">
    <tr>
        <th style="padding: 5px; text-align: left;"><label for="cc_kek">Kaikki etsintämuodot</label></th>
        
    <td>
    
    <input type="checkbox" name="cc_kek" value="KEK1" <?php echo (($valuek=='KEK1') ? 'checked="checked"': '');?>/> 1
    <input type="checkbox" name="cc_kek" value="KEK2" <?php echo (($valuek=='KEK2') ? 'checked="checked"': '');?>/> 2
    <input type="checkbox" name="cc_kek" value="KEK3" <?php echo (($valuek=='KEK3') ? 'checked="checked"': '');?>/> 3
</td>
    <tr>
    <tr>
        <th style="padding: 5px; text-align: left;"><label for="cc_yeks">Sisäetsintä</label></th>
        <td>
    <input type="checkbox" name="cc_yeks" value="YEKS1" <?php echo (($valuek2=='YEKS1') ? 'checked="checked"': '');?>/> 1
    <input type="checkbox" name="cc_yeks" value="YEKS2" <?php echo (($valuek2=='YEKS2') ? 'checked="checked"': '');?>/> 2
    <input type="checkbox" name="cc_yeks" value="YEKS3" <?php echo (($valuek2=='YEKS3') ? 'checked="checked"': '');?>/> 3
</td>
    </tr>
    <tr>
        <th style="padding: 5px; text-align: left;"><label for="cc_yeks">Laatikkoetsintä</label></th>
        <td>
    <input type="checkbox" name="cc_yekl" value="YEKL1" <?php echo (($valuek3=='YEKL1') ? 'checked="checked"': '');?>/> 1
    <input type="checkbox" name="cc_yekl" value="YEKL2" <?php echo (($valuek3=='YEKL2') ? 'checked="checked"': '');?>/> 2
    <input type="checkbox" name="cc_yekl" value="YEKL3" <?php echo (($valuek3=='YEKL3') ? 'checked="checked"': '');?>/> 3</td>
    </tr>
    <tr>
        <th style="padding: 5px; text-align: left;">
    <label for="cc_yeks">Ajoneuvoetsintä</label></th>
    <td>
    <input type="checkbox" name="cc_yeka" value="YEKA1" <?php echo (($valuek4=='YEKA1') ? 'checked="checked"': '');?>/> 1
    <input type="checkbox" name="cc_yeka" value="YEKA2" <?php echo (($valuek4=='YEKA2') ? 'checked="checked"': '');?>/> 2
    <input type="checkbox" name="cc_yeka" value="YEKA3" <?php echo (($valuek4=='YEKA3') ? 'checked="checked"': '');?>/> 3</td>
    </tr>
    <tr>
        <th style="padding: 5px; text-align: left;">
    <label for="cc_yeks">Ulkoetsintä</label></th>
    <td>
    <input type="checkbox" name="cc_yeku" value="YEKU1" <?php echo (($valuek5=='YEKU1') ? 'checked="checked"': '');?>/> 1
    <input type="checkbox" name="cc_yeku" value="YEKU2" <?php echo (($valuek5=='YEKU2') ? 'checked="checked"': '');?>/> 2
    <input type="checkbox" name="cc_yeku" value="YEKU3" <?php echo (($valuek5=='YEKU3') ? 'checked="checked"': '');?>/> 3
    </td>
    </tr>

    <button id="lisaa" type="submit" onclick="">Lisää koira</button>
<?php
  wp_reset_postdata()
?>
        </div>
    </main>
  <?php 
get_sidebar(); ?>
</div> <!--content-->
<?php
get_footer();
?>