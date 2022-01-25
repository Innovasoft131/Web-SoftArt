/*
$('.owl-carousel').owlCarousel({
    stagePadding: 50,
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
});
*/
$(".owl-carousel").owlCarousel({
    autoplay: true,
    autoplayhoverpause: true,
    autoplaytimeout: 40,
    items: 4,
    nav: true,
    loop: true,
    lazyLoad: true,
    margin: 20,
    padding: 4,
    stagePadding: 5,
    responsive: {
        0 : {
            items: 1,
            docts: false
        },
 
        485: {
            items: 2,
            docts: false
        },
        728: {
            items: 3,
            docts: false
        },
        960: {
            items: 4,
            docts: false
        },
    }
 });

 var swiper = new Swiper(".mySwiper", {
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });