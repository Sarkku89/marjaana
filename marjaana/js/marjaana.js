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
// Opening and closing the event calender subrows. STILL IN PROGRESS
/*
jQuery(document).ready(function() {
    jQuery('table#kek-kokeet tbody tr#'+jQuery('#baserow_id').val()).click(function() {
        
        jQuery('table#kek-kokeet tbody tr#'+jQuery('#subrow_id').val()).toggle(400);
    });

});*/

function toggling(id){
        jQuery('table#kek-kokeet tbody tr#subrow'+id).toggle(400);
            
    }

    $('.nuoli').click(function(){
        var $this = $(this);
        $this.toggleClass('nuoli');
        if($this.hasClass('nuoli')){
            $this.html('&#9660;');         
        } else {
            $this.html('&#9650;');
        }
});


