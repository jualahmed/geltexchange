$(document).ready(function(){
  $(".owl-carousel").owlCarousel({
    items:3,
    nav:true,
    autoplay:true,
    dots:true,
    autoplayHoverPause:true,
    nav:true,
    navText: [
      "<i class='fa fa-angle-left '></i>",
      "<i class='fa fa-angle-right'></i>"
    ],
    responsive: {
        0: {
            items: 1,
            slideBy:1
        },
        500: {
            items: 2,
            slideBy:1
        },
        991: {
            items: 2,
            slideBy:1
        },
        1200: {
            items: 3,
            slideBy:1
        },
    }  
  });
});
jQuery(document).ready(function(){
    jQuery('.scrollbar-outer').scrollbar();
});

