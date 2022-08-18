    jQuery(document).ready(function($) {

        $('input').on('focus', function() {
        $(this).closest('.module-input').find('label').addClass('moveUp');
        })
        
        $('input').on('focusout', function() {
        if(!$(this).val()) $(this).closest('.module-input').find('label').removeClass('moveUp');
        if(!$(this).val()) $(this).closest('.module-input').find('label').removeClass('moveUpRange');
        });
    
    });
    
    
    jQuery(document).ready(function($) {
    
        $('.minus').on('click', function() {
        $(this).closest('.module-input').find('label').addClass('moveUp');
        })
        
        $('.plus').on('click', function() {
        $(this).closest('.module-input').find('label').addClass('moveUp');
        })
    
    
    });
    
    
    jQuery(document).ready(function($) {
    
        $('textarea').on('focus', function() {
        $(this).closest('.module-input').find('label').addClass('moveUp');
        })
        
        $('textarea').on('focusout', function() {
        if(!$(this).val()) $(this).closest('.module-input').find('label').removeClass('moveUp');
        });
    
    });
    
    
    jQuery(document).ready(function($) {
    
        $('select').on('focus', function() {
        $(this).closest('.module-input').find('label').addClass('moveUp');
        $(this).closest('.select-holder').find('label').addClass('moveUp');
        })
        
        $('select').on('focusout', function() {
        if(!$(this).val()) $(this).closest('.module-input').find('label').removeClass('moveUp');
        if(!$(this).val()) $(this).closest('.select-holder').find('label').removeClass('moveUp');
        });
    
    });


    jQuery(document).ready(function($) {

        $('.burger-btn').on('click', function() {
            $('.burger-end').toggleClass('active');
            $(this).toggleClass('closed');
        });

    });


    jQuery(document).ready(function($) {

        $('.filter').on('click', function() {
            $('.sidebar').toggleClass('open');
            $(this).toggleClass('closed');
        });

    });

    jQuery(document).ready(function($) {

        $('.suc-btn').on('click', function() {
            $('.menu-suc').toggleClass('open');
            $(this).toggleClass('closed');
        });

    });


    jQuery(document).ready(function($) {

        $('.close-news').on('click', function() {
            $('.news').toggleClass('closed');
            $(this).toggleClass('closed');
        });

    });