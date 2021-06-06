jQuery(document).ready(function($) {

/*------------------------------------------------
                MAIN NAVIGATION
------------------------------------------------*/

$('.main-navigation .menu-toggle').click(function () {
    // $(this).toggleClass('active');
    $(this).siblings('.primary-menu-list').children('.mobile-menu').slideDown();
});

$('.main-navigation .close').click(function () {
    $(this).siblings('.mobile-menu').slideUp();
});

$(window).keydown(function (e) {
    if(e.key == 'Escape') {
        $('.main-navigation .mobile-menu').slideUp();
    }
});

$(".site-header li.menu-item-has-children > a").after('<button class="dropdown-toggle"><i class="fa fa-angle-down"></i></button>')
$(".site-header button.dropdown-toggle").click(function() {
    $(this).toggleClass('active');
    $(this).parent().find('ul.sub-menu').first().slideToggle();
});

$('.main-navigation ul li a.search').click(function() {
    $(this).toggleClass('search-open');
    $('.main-navigation #search').fadeToggle();
    $('.main-navigation .search-field').focus();
});

$('.main-navigation ul li a').focus(function() {
    $(this).parents('li').addClass('hover');
}).blur(function() {
    $(this).parents('li').removeClass('hover');
});

/*------------------------------------------------
               SLICK SLIDER
------------------------------------------------*/
var $ease = $('#main-slider').data('effect');
$('#main-slider').slick({ cssEase: $ease });

/*------------------------------------------------
                MATCH HEIGHT
------------------------------------------------*/

$('.archive-blog-wrapper .post-wrapper').matchHeight();

/*------------------------------------------------
                BACK TO TOP
------------------------------------------------*/

$(window).scroll(function(){
    if ($(this).scrollTop() > 1) {
    $('.backtotop').css({bottom:"25px"});
    } else {
    $('.backtotop').css({bottom:"-100px"});
    }
});
$('.backtotop').click(function(){
    $('html, body').animate({scrollTop: '0px'}, 800);
    return false;
});

/*------------------------------------------------
                END JQUERY
------------------------------------------------*/

});