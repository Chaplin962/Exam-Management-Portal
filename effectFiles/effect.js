$(document).ready(function() {
    $("#signin_button").hover(function() {
        $(this).css("opacity", "0.8");
    }, function() {
        $(this).css("opacity", "1");
    });

    $(".that_button").hover(function() {
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
        if( $("#side-bar-2").css("display") != "none" ) {
            $("#side-bar-2").css("display", "none");
            x.classList.toggle("change"); 
        }
    });

    $("#navbar-menu").hover(function() {
        $(this).css("opacity", "0.6");
    }, function() {
        $(this).css("opacity", "1");
    });
    $("#navbar-menu").click(function() {
        if($("#side-bar-2").css("display") == "none") $("#side-bar-2").css("display", "inline-block");
        else $("#side-bar-2").css("display", "none");
        $("#side-bar").css("display", "none");	
    });
    
    $("#mobnavbar-button").click(function() {
        if( $("#side-bar-2").css("display") == "none" ) $("#side-bar-2").css({"display" : "block"});
        else $("#side-bar-2").css({"display" : "none"});
        $("#side-bar").css("display", "none");
        x = this;	
        this.classList.toggle("change"); 
    });

    $(".side-bar-texts").hover(function() {
        $(this).css("opacity", "0.6");
    }, function() {
        $(this).css("opacity", "1");
    });    
});