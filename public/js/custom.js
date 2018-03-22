
$(document).ready(function(){

    // Jmenu handling
    $("#jMenu").jMenu();
    
    var menu_mapping = {

    };

    var pathname = window.location.pathname;
    if (pathname == "/") {
        pathname = "/service_register";
    }

    $.each(menu_mapping , function(index, value) { 
        if (pathname.indexOf(index) >= 0) {
            $('#' + menu_mapping[index]).addClass("curr-menu");
        }
    });

});
