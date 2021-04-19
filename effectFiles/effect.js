$(document).ready(function() {
    $("#signin_button").hover(function() {
        $(this).css("opacity", "0.8");
    }, function() {
        $(this).css("opacity", "1");
    });

    $("#navbar-profile").hover(function() {
        $(this).css("opacity", "0.6");
    }, function() {
        $(this).css("opacity", "1");
    });    

    $("#navbar-profile").click(function() {       
        if($("#side-bar").css("display") == "none") $("#side-bar").css("display", "inline-block");
        else $("#side-bar").css("display", "none");		
    });

    $(".side-bar-texts").hover(function() {
        $(this).css("opacity", "0.6");
    }, function() {
        $(this).css("opacity", "1");
    });    
});