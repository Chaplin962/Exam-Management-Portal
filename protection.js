$(document).ready(function () {
    // Disable full page (copy pasting)
    $('body').bind('cut copy paste', function (e) {
		e.preventDefault();
		alert("Copying and Pasting functions are disabled");
    });
	 
	/*

    // Disable part of page (user requirement)
	
	$('#id').bind('cut copy paste', function (e) {
        e.preventDefault();
	});
	*/
});

// this function restricts right click on the page to avoid source code viewing
$(document).ready(function () {
    //Disable full page
    $("body").on("contextmenu",function(e){
		alert("Right Click is not allowed");
		return false;
    });
     
    //Disable part of page
    $("#id").on("contextmenu",function(e){
        return false;
    });
});


document.addEventListener('keyup', (e) => {
    if (e.key == 'PrintScreen') {
        navigator.clipboard.writeText('');
        alert('Screenshots are disabled');
    }
});

// disable print CTRL+P  and also disables screenshot
document.addEventListener('keydown', (e) => {
    if (e.ctrlKey && e.key == 'p') {
        alert('This section is not allowed to print or export to PDF');
        e.cancelBubble = true;
        e.preventDefault();
        e.stopImmediatePropagation();
    }
});
