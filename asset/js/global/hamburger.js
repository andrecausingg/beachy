$(document).ready(function(){
    // Hamburger Landing Page
    $("#hamburger").click(function(){
        if($("#hamburger").hasClass("yot-hamburger-open")){
            $("#hamburger").removeClass("yot-hamburger-open");
            $("#bgOverlayTrans").removeClass("yot-animate-slide-right").addClass("yot-animate-slide-left").hide();
            $("#mobileOverlay").removeClass("yot-animate-slide-down").addClass("yot-animate-slide-up")
            $('body').css('overflow', 'auto');
        } else {
            $("#hamburger").addClass("yot-hamburger-open");
            $("#bgOverlayTrans").addClass("yot-animate-slide-right").show();
            $("#mobileOverlay").removeClass("yot-animate-slide-up").addClass("yot-animate-slide-down").show();
            $('body').css('overflow', 'hidden');
        }
    });
});