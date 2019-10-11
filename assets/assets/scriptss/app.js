var distance = $('#navigation-sections').offset().top; 
$(window).scroll(function () {
     if ($(window).scrollTop() >0) {
         $('#navigation-sections').addClass("affix");
     } else {
         $('#navigation-sections').removeClass("affix");
     }
 });

