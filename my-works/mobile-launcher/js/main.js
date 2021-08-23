document.getElementById("defaultOpen").click();
    function openCity(evt, pageName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("menu_content");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("menu_item");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(pageName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    $('.menu_item').click(function() {
        $('.menu_item').removeClass('active');
        $(this).addClass('active')
});

function openServer(){
    $(".server_item_active").hide();

    $('.server_item').on('click', function() {
    	$(".server_item_active").hide();
        $(this).find('.server_item_active').show();
    });
    
}

openServer();

let isServer;

function selectServer(){
    $(".select_server").hide();
    isServer = false;
    $('.btn-select').on('click', function() {
        $(".select_server").toggle();
    });
}

selectServer();