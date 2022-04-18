
$(document).ready(function() {
    if(window.innerWidth >= 991){
        //When page loads...
        $(".tab_content, .tab_content_child").hide(); //Hide all content
        $("ul.tabs li:first").addClass("active").show(); //Activate first tab
        $("ul.tabs_child li:first").addClass("active").show(); //Activate first tab
        $(".tab_content:first").show(); //Show first tab content
        $(".tab_content_child:first").show(); //Show first tab content

        
    
        //On Click Event
        $("ul.tabs li").click(function() {
        
            $("ul.tabs li").removeClass("active"); //Remove any "active" class
            $(this).addClass("active"); //Add "active" class to selected tab
            $(".tab_content").hide(); //Hide all tab content
        
            var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
            $(activeTab).fadeIn(); //Fade in the active ID content
            return false;
        });    
        //On Click child tabs Event
        $("ul.tabs_child li").click(function() { 
        $("ul.tabs_child li").removeClass("active"); //Remove any "active" class
        $(this).addClass("active"); //Add "active" class to selected tab
        $(".tab_content_child").hide(); //Hide all tab content 
        var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
        $(activeTab).fadeIn(); //Fade in the active ID content 
        return false;
        });
    }
});
