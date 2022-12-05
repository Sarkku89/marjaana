// For mobile view navigation bar
jQuery(document).ready(function () {
    jQuery(' #top-navi > div > ul > li:first-child').on('click', function () {
        jQuery(' #top-navi >div  > ul >li:not(:li.sub-menu)').slideToggle(400);
    });
    jQuery(window).resize(function () {
        if (jQuery(window).width() > 650) {
            jQuery(' #top-navi >div > ul > li.menu-item:not(:first-child)').show();
        }
        else {
            jQuery(' #top-navi >div > ul > li.menu-item:not(:first-child)').hide();
        }
    })
});

// Trial table toggle functions
jQuery('#kek-kokeet').on('click','#baserow', function () {
        
        let trialID = jQuery(this).next('tr').attr('id');
        jQuery(`[id=${trialID}]`).toggle(400);
    })
     
jQuery('#yeks-kokeet').on('click','#baserow', function () {
        
        let trialID = jQuery(this).next('tr').attr('id');
        jQuery(`[id=${trialID}]`).toggle(400);
    })

jQuery('#yekl-kokeet').on('click','#baserow', function () {
    
    let trialID = jQuery(this).next('tr').attr('id');
    jQuery(`[id=${trialID}]`).toggle(400);
})

jQuery('#yeku-kokeet').on('click','#baserow', function () {
    
    let trialID = jQuery(this).next('tr').attr('id');
    jQuery(`[id=${trialID}]`).toggle(400);
})

jQuery('#yeka-kokeet').on('click','#baserow', function () {
    
    let trialID = jQuery(this).next('tr').attr('id');
    jQuery(`[id=${trialID}]`).toggle(400);
    })


// Dog breed selection variables and functions
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

    jQuery("#fcigroup").change(function () {
        let value = jQuery("#fcigroup").find("option:selected").val();
        if (value = "fci1") {
            for (let i = 0; i < fci1.length; i++) {
                let breedname = fci1[i];
                let html = `<option value="${breedname}">${breedname}</option>`
                jQuery("#breed").append(html);
            }
        }
        if (value = "fci2") {
            for (let i = 0; i < fci2.length; i++) {
                let breedname = fci2[i];
                let html = `<option value="${breedname}">${breedname}</option>`
                jQuery("#breed").append(html);

            }
        }
    })
});

function getTheBreed(){
    let value = jQuery("#breed").find("option:selected").val();
    return value;
}

/*
$('.nuoli').click(function () {
    var $this = $(this);
    $this.toggleClass('nuoli');
    if ($this.hasClass('nuoli')) {
        $this.html('&#9660;');
    } else {
        $this.html('&#9650;');
    }
});
*/