// ----------swiper-slider---------
var swiper = '';
$(window).on('load', function(){
    swiper = new Swiper('#catgory-slider', {
        loop: false,
        slidesPerView: "auto",
        allowTouchMove: false,
        spaceBetween: 5,
        mousewheel: true,
        slideToClickedSlide: true,
        centeredSlides: false,
        navigation: {
            nextEl: '.slider-next',
            prevEl: '.slider-prev',
        }
    });
});


$(".category-button").click(function(){
    $(".category-button").removeClass("active");
    $(this).addClass('active');
    var getid = $(this).data('id');
    $(".data-text").removeClass('active');
    $("#"+getid).addClass("active");
});