//booting
$(document).ready(function(){
    //menu mobile
    $(".button-collapse").sideNav();
    //internal link
    $(".scrollspy").scrollSpy({
        scrollOffset: 0
    });
    //carousel
    $(".carousel.carousel-slider").carousel({
        fullWidth: true
    });
    //change slides automatically
    function autoplay() {
        $(".carousel").carousel("next");
        setTimeout(autoplay, 4500);
    }
    autoplay();
    //modal
    $(".modal").modal();
});

//adding nav color
$(window).on("scroll", function(){
    //menu color
    if($(window).scrollTop() > 280) {
        $(".navbar").addClass("nav-color");
    }
    else{
        $(".navbar").removeClass("nav-color");
    }
});