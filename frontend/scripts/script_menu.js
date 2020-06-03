$(document).ready(function () {
    var x = true;
    $('.menu-toggler').on('click', function () {
        if  (x){
            $(this).toggleClass('open');
           $("ul").css("transform", "scaleY(1)");
           /* $("ul").toggleClass('chose');*/
            $(".topnav").css("box-shadow", "0px 0px 36px -8px rgba(0, 0, 0, 0.75)");
           x=false;
        } else {
            $(this).removeClass('open');
            $("ul").css("transform", "");
            $(".topnav").css("box-shadow", "");
            x=true;
        }
        
    });
});