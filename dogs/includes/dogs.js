const fci1 = ['ardennienkarjakoira', 'australiankarjakoira', 'australiankelpie', 'australianpaimenkoira', 'australian töpöhäntäinen karjakoira', 'beauceron', 
'belgianpaimenkoira, groenendael', 'belgianpaimenkoira, laekenois', 'belgianpaimenkoira, malinois', 'belgianpaimenkoira, tervueren', 'bergamasco', 
'bordercollie', 'bouvier', 'briardi', 'ceskoslovensky vlcak', 'etelävenäjänkoira', 'hollanninpaimenkoira, karkeakarvainen', 'hollanninpaimenkoira, lyhytkarvainen',
'hollanninpaimenkoira, pitkäkarvainen', 'itäeuroopanpaimenkoira', 'karpaattienkoira', 'katalonianpaimenkoira', 'komondor', 'kroatianpaimenkoira', 'kuvasz',
'lancashirenkarjakoira', 'lyhytkarvainen pyreneittenpaimenkoira', 'mallorcanpaimenkoira', 'maremmano-abruzzese', 'mudi', 'owczarek podhalanski', 'partacollie', 'picardienpaimenkoira', 
'pitkäkarvainen collie', 'pitkäkarvainen pyreneittenpaimenkoira', 'polski owczarek nizinny', 'puli, muut värit', 'puli, valkoinen', 'pumi', 'romanianpaimenkoira',
'saarloos wolfhond', 'saksanpaimenkoira, pitkäkarvainen', 'saksanpaimenkoira', 'schapendoes', 'schipperke', 'serra de airesinpaimenkoira',
'shetlanninlammaskoira', 'sileäkarvainen collie', 'slovakiancuvac', 'tsekinpaimenkoira', 'valkoinenpaimenkoira', 'vanhaenglanninlammaskoira', 'welsh corgi cardigan', 'welsh corgi pembroke'
]

jQuery(document).ready(function() {
    let value = jQuery('#fcigroup :selected').val();
        if(value = 'fci1'){
            for(let i = 0; i < fci1.length; i++) {
            jQuery('#breed').append(`<option value="${i}">${i}</option>`);
              }
        }
    });

    jQuery(document).ready(function() {
        jQuery('#fcigroup').on('change', function(){
            let value = jQuery('#fcigroup').val();
            if(value = 'fci1'){
              jQuery('#breed').css('display:block;');
              for(let i = 0; i < fci1.length; i++) {
              jQuery('#breed').append(`<option value='${i}'>${i}</option>`);
                }
          }}
      });
