//Script.js
$('.drink-search-home').height($(document).width() / (1920 / 900));

$('#category-testimonials').owlCarousel({
    loop: true,
    center: true,
    items: 3,
    margin: 5,
    autoplay: true,
    dots: false,
    autoplayTimeout: 4000,
    smartSpeed: 300,
    responsive: {
        0: {
            items: 3
        }
    }
});


