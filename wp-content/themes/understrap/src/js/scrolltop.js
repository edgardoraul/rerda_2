jQuery(document).ready(function($){

var didScroll;
var lastScrollTop = 0;
var delta = 5;
var navbarHeight = $('#wrapper-navbar').outerHeight()-50;

$(window).scroll(function(event){
    didScroll = true;
});

setInterval(function() {
    if (didScroll) {
        hasScrolled();
        didScroll = false;
    }
}, 250);


$(document).ready(function(){

hasScrolled();
didScroll = false;

});


function hasScrolled() {
    var st = $(this).scrollTop();

    if(Math.abs(lastScrollTop - st) <= delta)
        return;

    if (st > lastScrollTop && st > navbarHeight){
        $('#wrapper-navbar').removeClass('nav-down').removeClass('nav-top').addClass('nav-up');
    }
    
    else if (st <= 0) {
        $('#wrapper-navbar').removeClass('nav-up').removeClass('nav-down').addClass('nav-top');
    }
    
    else {
        if(st + $(window).height() < $(document).height()) {
            $('#wrapper-navbar').removeClass('nav-up').addClass('nav-down');
        }
    }
    
    lastScrollTop = st;
}

});