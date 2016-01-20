jQuery(document).ready(function($) {

	var currentTallest = 0,
       currentRowStart = 0,
       rowDivs = new Array(),
       $el,
       topPosition = 0;
	jQuery('.js-equal').children().each(function() {

        $el = jQuery(this);
        jQuery($el).height('auto')
        topPostion = $el.position().top;

        if (currentRowStart != topPostion) {
            for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
                rowDivs[currentDiv].height(currentTallest);
            }
            rowDivs.length = 0; // empty the array
            currentRowStart = topPostion;
            currentTallest = $el.height();
            rowDivs.push($el);
        } else {
            rowDivs.push($el);
            currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
        }
        for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
            rowDivs[currentDiv].height(currentTallest);
        }
    });

    jQuery('.home .nav-block__title, #page-nav__footer .nav-block__title').each(function(){
        var me = jQuery(this)
           , t = me.text().split(' ');
        me.html( '<em>'+t.shift()+'</em><br> '+t.join(' ') );
    });

    jQuery('.js-scroll').on('click',function(event){
        var jQueryanchor = jQuery(this);
        
        
        jQuery('html, body').stop().animate({
            scrollTop: jQuery(jQueryanchor.attr('href')).offset().top-55
        }, 800);
        
        event.preventDefault();
    });
});

function sticky_relocate() {
    var window_top = jQuery(window).scrollTop();
    var div_top = jQuery('#submenu').offset().top + jQuery('#submenu').height();
    if (window_top > div_top) {
        jQuery('body').addClass('stick');
    } else {
        jQuery('body').removeClass('stick');
    }

}

jQuery(function () {
    jQuery(window).scroll(sticky_relocate);
    sticky_relocate();
});


function sticky_relocateagain() {
    var window_top = jQuery(window).scrollTop();
    var div_top = jQuery('#page-nav__footer').offset().top - jQuery('.page-nav--sticky').height();
    if (window_top > div_top) {
        jQuery('body').removeClass('stick');
    }

}

jQuery(function () {
    jQuery(window).scroll(sticky_relocateagain);
    sticky_relocateagain();

});