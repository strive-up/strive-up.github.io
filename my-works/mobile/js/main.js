document.getElementById("defaultOpen").click();
function openSection(evt, pageName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("content");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" item-active", "");
    }
    document.getElementById(pageName).style.display = "block";
    evt.currentTarget.className += " item-active";
}
$('.tablinks').click(function() {
    $('.tablinks').removeClass('item-active');
    $(this).addClass('item-active')
});

const button = document.querySelectorAll('[data-key]')
const shift = document.querySelector('[data-key="shift"]')
const toNumbers = document.querySelector('[data-key="numbers"]')
const inputWrapper = document.querySelector('.input_wrapper')
const messageContentBar = document.querySelector('.message_content-bar')

const messageContent = document.querySelector('.message_content-bar')
messageContent.scrollTo(0, messageContent.scrollHeight);

let isShift = true
let isNUM = true


toNumbers.addEventListener('click', () => {
    if(isShift) {
        document.getElementById('key_RU').style.display = "none";
        document.getElementById("toNumber").innerHTML = "ABC";
        document.getElementById('key_NUM').style.display = "grid";
        isShift = false
    } else {
        document.getElementById('key_NUM').style.display = "none";
        document.getElementById("toNumber").innerHTML = "123";
        document.getElementById('key_RU').style.display = "grid";
        isShift = true
    }
    
})

shift.addEventListener('click', () => {
	if (isShift) {
  	button.forEach(el => el.style.textTransform = 'uppercase')
    isShift = false
  } else {
    	button.forEach(el => el.style.textTransform = 'lowercase')
    	isShift = true
  }

})

function openApp(pageName) {
    document.getElementById(pageName).style.display = "block";
    messageContentBar.style.height =`calc(90% - ${inputWrapper.offsetHeight}px)`
    messageContent.scrollTo(0, messageContent.scrollHeight);
    $(document).keydown(function(e) {
        if (e.keyCode == 27) {
            document.getElementById(pageName).style.display = "none";
        }
    });
}

let p = $('.download-page');
let m = $('.main-page');

function opacityP(){ p.css('opacity', 0); p.css('display', 'none'); }
function openM(){ 
    m.css('display', 'flex'); 
    function opacityM(){
        m.css('opacity', 1);
    }
    setTimeout(opacityM, 750);
}

function preloader(){
    setTimeout(opacityP, 7500);
    setTimeout(openM, 7500);
}

preloader();


function openMenu(){
    if(!isMenuBurger){
        $('.menu_taxi-list').css('display', 'flex');
        $('.menu_burger').prependTo(".menu_taxi-burger_title");
        isMenuBurger = true;
    } else {
        $('.menu_taxi-list').css('display', 'none');
        $('.menu_burger').prependTo(".menu-wrapper");
        isMenuBurger = false;
    }
    $(document).keydown(function(e) {
        if (e.keyCode == 27) {
            $('.menu_taxi-list').css('display', 'none');
            $('.menu_burger').prependTo(".menu-wrapper");
            isMenuBurger = false;
        }
    });
    
}

let isMenuBurger = false;
let isMenuList = false;

function openMenuList(evt, pageName){
    var i, content, links;
    content = document.getElementsByClassName("menu_item-content");
    for (i = 0; i < content.length; i++){
        $('.menu_taxi-list').css('display', 'none');
        $('.menu_burger').prependTo(".menu-wrapper");
        isMenuBurger = false;
        content[i].style.display = "block";
        isMenuList = true;
    }
    links = document.getElementsByClassName("menulinks");
    for (i = 0; i < links.length; i++) {
        links[i].className = links[i].className.replace(" item-active", "");
    }
    document.getElementById(pageName).style.display = "flex";
    evt.currentTarget.className += " item-active";
    $(".back_arrow").on( "click", function() {
        for (i = 0; i < content.length; i++){
            content[i].style.display = "none";
            isMenuList = false;
            $('.menu_taxi-list').css('display', 'flex');
            $('.menu_burger').prependTo(".menu_taxi-burger_title");
            isMenuBurger = true;
            document.getElementById(pageName).style.display = "none";
        }
    });
}



let isTaxi = false;

document.querySelector('.quick-call_ordering .ordering_button .ordering_back').addEventListener('click', () => {
    $('#taxi_app').css('display', 'none');
})

document.querySelector('.ordering_call .ordering_button .ordering_back').addEventListener('click', () => {
    $('.ordering_call').css('display', 'none');
    $('.location').css('display', 'block');
    $('.logo-location').css('margin-bottom', '60px');
    $('.quick-call_ordering').css('display', 'flex');
    isTaxi = false
})

function taxi(){
    if(!isTaxi){
        $('.location').css('display', 'none');
        $('.logo-location').css('margin-bottom', '0');
        $('.quick-call_ordering').css('display', 'none');
        $('.ordering_call').css('display', 'flex');
        isTaxi = true
    } else {
        $('.ordering_call').css('display', 'none');
        $('.location').css('display', 'block');
        $('.logo-location').css('margin-bottom', '60px');
        $('.quick-call_ordering').css('display', 'flex');
        isTaxi = false
    }
}

$('.ordering_plan').on('click','.ordering_plan-item',function () {
    $(this).parent().find('.ordering_plan-item').css('border', 'none');
    $(this).css('border', '1px solid black');
});