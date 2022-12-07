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
      )});
