$(document).ready(function() {
    $('.slider').slick({
        slidesToShow: 3,
        dots: true,
        autoplay: true,
        autoplaySpeed: 5000,
        nextArrow: '<button type="button" class="slick-next">\></button>',
        prevArrow: '<button type="button" class="slick-prev">\<</button>',
        appendArrows: $('.slider-nav'),
        appendDots: $('.slider-nav'),
        responsive: [{
            breakpoint: 1000,
            settings: {
                slidesToShow: 1
            }
        }]
    })
})