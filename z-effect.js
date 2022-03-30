
$(document).ready(function() {
	current_page = "" + $(".current-page").attr('id');

	{ /* Navbar menus animation */
		$("#navbar-"+ current_page).css({"opacity" : "100%"});	

		$(".navbar-menus").hover(function() {		
			$("#"+ this.id +"-border").stop();
			$("#"+ this.id +"-border").animate({width: '75%'},200,'swing');
			if(this.id != "navbar-" + current_page) {
				$(this).stop();
				$(this).animate({"opacity" : "100%"},200,'swing');
			}			
		},function() {		
			$("#"+ this.id +"-border").stop();
			$("#"+ this.id +"-border").animate({"width" : "0%"},200,'swing');
			if(this.id != "navbar-" + current_page) {
				$(this).stop();
				$(this).animate({"opacity" : "60%"},200,'swing');
			}		
		});
		$("#navbar-notify").hover(function() {
			$(this).stop();
			$(this).animate({opacity : "0.5"},200,'swing');
		}, function() {
			$(this).stop();
			$(this).animate({opacity : "1"},200,'swing');
		});
		$("#navbar-profile").hover(function() {
			$(this).stop();
			$(this).animate({opacity : "0.5"},200,'swing');
		}, function() {
			$(this).stop();
			$(this).animate({opacity : "1"},200,'swing');
		});
	}		
		
	{ /* Side bar thing */
		$("#navbar-notify").click(function() {
			$("#side-profile-bar").css("display", "none");			
			if($("#side-menu-bar").css("display") != "none") {
				$("#side-menu-bar").css("display", "none");
				menubut_ani(document.getElementById("navbar-menubut"));
				menubut_ani(document.getElementById("navbar-menubut-2"));
			}
			if($("#side-notify-bar").css("display") == "none") $("#side-notify-bar").css("display", "inline-block");
			else $("#side-notify-bar").css("display", "none");			
		});		
		$("#navbar-profile").click(function() {			
			$("#side-notify-bar").css("display", "none");
			if($("#side-menu-bar").css("display") != "none") {
				$("#side-menu-bar").css("display", "none");
				menubut_ani(document.getElementById("navbar-menubut"));
				menubut_ani(document.getElementById("navbar-menubut-2"));
			}
			if($("#side-profile-bar").css("display") == "none") $("#side-profile-bar").css("display", "inline-block");
			else $("#side-profile-bar").css("display", "none");		
		});
		$("#navbar-menubut").click(function() {
			$("#side-notify-bar").css("display", "none");
			$("#side-profile-bar").css("display", "none");

			menubut_ani(document.getElementById("navbar-menubut"));
			menubut_ani(document.getElementById("navbar-menubut-2"));
			if($("#side-menu-bar").css("display") == "none") $("#side-menu-bar").css("display", "inline-block");
			else $("#side-menu-bar").css("display", "none");		
		});
		$("#navbar-menubut-2").click(function() {
			menubut_ani(document.getElementById("navbar-menubut-2"));
			menubut_ani(document.getElementById("navbar-menubut"));
			if($("#side-menu-bar").css("display") == "none")  {
				$("#side-menu-bar").css("display", "inline-block");
				$("#side-notify-bar").css("display", "inline-block");
				$("#side-profile-bar").css("display", "inline-block");
			}
			else {
				$("#side-menu-bar").css("display", "none");
				$("#side-notify-bar").css("display", "none");
				$("#side-profile-bar").css("display", "none");
			}	
		});		
	}	
	
	/*{
		$("#navbar-profile").hover(function() {
			$(this).stop();
			$(this).animate({backgroundColor : "#555555"},200,'swing');
		}, function() {
			$(this).stop();
			$(this).animate({backgroundColor : "transparent"},200,'swing');
		})
	}*/
	
	{ /* News feed Arrow animation */
		setTimeout(function() {
			setInterval(function() {
				$("#home-news-arrow").animate({top: "0px"},500,"swing");
			},500);
		},400);

		setInterval(function() {
			$("#home-news-arrow").animate({top: "12px"},500,"swing");
		},500);		
	}

	{
		$(".tests-cards").hover(function() {
			$("#"+ this.id +"-text").stop();
			$("#"+ this.id +"-text").animate({fontSize: '1.3em'},200,'swing');
		}, function() {
			$("#"+ this.id +"-text").stop();
			$("#"+ this.id +"-text").animate({fontSize: '1.2em'},200,'swing');
		});
	}

	{
		$(".trailtest1-buts2").click(function(){
			str = (this.id).slice(0,14);
			if(str[13]!= "-") str = str + "-";
			var ele = document.getElementsByName( str + "op");
   			for(var i=0;i<ele.length;i++) ele[i].checked = false;
		});
		
	}

	{
		function createCallback( i ){
  			return function() { 
  				$("#trailtest1-cell-" + i).css("color", "#FFFFFF");
  				$("#trailtest1-cell-" + i).css("backgroundColor", "#2A9827"); 
  			}
		}
		for(i=1; i<=10; i++) {			
			$('[name =' + "trailtest1-q" + i + "-op" + ']').click(createCallback( i ));
		}

		id="trailtest1-q1-buts2"

		function createCallback2( i ){
  			return function() { 
  				$("#trailtest1-cell-" + i).css("color", "#3B3B3B"); 
  				$("#trailtest1-cell-" + i).css("backgroundColor", "transparent"); 
  			}
		}
		for(i=1; i<=10; i++) {
			str2 = "trailtest1-q" + i + "-op";
			$("#trailtest1-q" + i + "-buts2").click(createCallback2( i ));
		}
		
	}

	{
		$(".trailtest1-buts-texts").hover(function() {
			$(this).stop();
			$(this).animate({top: "-5px"},200,'swing');
		}, function() {
			$(this).stop();
			$(this).animate({top: "0"},200,'swing');
		});
		$(".trailtest1-buts2-texts").hover(function() {
			$(this).stop();
			$(this).animate({top: "-5px"},200,'swing');
		}, function() {
			$(this).stop();
			$(this).animate({top: "0"},200,'swing');
		});
	}
	{
		$("#trailtest1-sub-but").hover(function() {
			$(this).stop();
			$(this).animate({fontSize: "1.15em"},200,'swing');
		}, function() {
			$(this).stop();
			$(this).animate({fontSize: "1em"},200,'swing');
		});
		$("#trailtest1-in-but").hover(function() {
			$(this).stop();
			$(this).animate({fontSize: "1.15em"},200,'swing');
		}, function() {
			$(this).stop();
			$(this).animate({fontSize: "1em"},200,'swing');
		});
	}
	{		
		$("#trailtest1-sub-but").click(function() {
			for(i=1; i<=10; i++) {
				str2 = document.getElementsByName("trailtest1-q" + i +"-op");
				n = str2.length;
				for(j=0;j<n;j++) str2[j].disabled = true;
			}
		});		
	}
	{
		$(".side-profile-bar-texts").hover(function() {
			$(this).animate({opacity: "0.5"},200,'swing');
		}, function() {
			$(this).animate({opacity: "1"},200,'swing');
		});
	}

});

$(document).ready(function(){
    $("#search").focus(function() {
      $(".search-box").addClass("border-searching");
      $(".search-icon").addClass("si-rotate");
    });
    $("#search").blur(function() {
      $(".search-box").removeClass("border-searching");
      $(".search-icon").removeClass("si-rotate");
    });
    $("#search").keyup(function() {
        if($(this).val().length > 0) {
          $(".go-icon").addClass("go-in");
        }
        else {
          $(".go-icon").removeClass("go-in");
        }
    });
    $(".go-icon").click(function(){
      $(".search-form").submit();
    });
});