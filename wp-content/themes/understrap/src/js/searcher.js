jQuery(document).ready(function($){

    $('.searcher').click(function() {
      $('.searcho').addClass('visib'); 
      $('.nav-desktop').addClass('menuhid');
      $('.extra-menu').addClass('menuhid');
      $('#s-prod').focus();
    });

    $('.closero').click(function() {
      $('.searcho').removeClass('visib'); 
      $('.nav-desktop').removeClass('menuhid');
      $('.extra-menu').removeClass('menuhid');
    });



});