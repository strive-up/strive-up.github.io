function Tab(evt, pageName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("content");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tab-panel_item");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" tab-panel_item-active", "");
    }
    document.getElementById(pageName).style.display = "flex";
    evt.currentTarget.className += " tab-panel_item-active";
}
$('.tab-panel_item').click(function() {
    $('.tab-panel_item').removeClass('tab-panel_item-active');
    $(this).addClass('tab-panel_item-active')
});

document.getElementById("defaultOpen").click(function() {
    $('.tab-panel_item').removeClass('tab-panel_item-active');
    $(this).addClass('tab-panel_item-active')
});

function parents(evt, pageName){
    var i, content, links;
    content = document.getElementsByClassName("person_body-content");
    for (i = 0; i < content.length; i++) {
        content[i].style.display = "none";
    }

    links = document.getElementsByClassName("create-person_btn");
    for (i = 0; i < links.length; i++) {
        links[i].className = links[i].className.replace(" btn-active", "");
    }
    document.getElementById(pageName).style.display = "grid";
    evt.currentTarget.className += " btn-active";

    
}

document.getElementById("defaultParents").click(function() {
    $('.create-person_btn').removeClass('btn-active');
    $(this).addClass('btn-active')
});

$('.person_body-content').on('click','.person_body-content_item',function () {
    $(this).parent().find('.person_body-content_item').css('border', 'none');
    $(this).css('border', '2px solid #6514E9');
});

let reset = `<svg width="18" height="22" viewBox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M1.39905 9.91666C1.95454 9.90729 2.41943 10.3177 2.49108 10.8554L2.5005 10.9816L2.50443 11.224C2.62248 14.718 5.49416 17.4998 9.00065 17.4998C9.2032 17.4998 9.40438 17.4906 9.6038 17.4723L9.31796 17.1825C8.89489 16.7595 8.89489 16.0735 9.31796 15.6505C9.74102 15.2274 10.427 15.2274 10.85 15.6505L13.0167 17.8171C13.4398 18.2402 13.4398 18.9261 13.0167 19.3492L10.85 21.5159C10.427 21.9389 9.74102 21.9389 9.31796 21.5159C8.89489 21.0928 8.89489 20.4069 9.31796 19.9838L9.66273 19.6415C9.44331 19.6581 9.2225 19.6665 9.00065 19.6665C4.41675 19.6665 0.646921 16.1017 0.35204 11.5529L0.338539 11.2788L0.334142 11.0181C0.324051 10.4199 0.800828 9.92675 1.39905 9.91666ZM8.68335 0.483805C9.07388 0.874329 9.10392 1.48883 8.77347 1.91381L8.68335 2.01587L8.33891 2.35811C8.55823 2.34152 8.77892 2.33317 9.00065 2.33317C13.7871 2.33317 17.6673 6.21337 17.6673 10.9998C17.6673 11.5981 17.1823 12.0832 16.584 12.0832C15.9857 12.0832 15.5007 11.5981 15.5007 10.9998C15.5007 7.40999 12.5905 4.49984 9.00065 4.49984C8.798 4.49984 8.5967 4.50908 8.39718 4.52741L8.68335 4.81714C9.10642 5.24021 9.10642 5.92614 8.68335 6.3492C8.29283 6.73973 7.67833 6.76977 7.25335 6.43932L7.15129 6.3492L4.98462 4.18254C4.5941 3.79201 4.56406 3.17751 4.8945 2.75253L4.98462 2.65047L7.15129 0.483805C7.57436 0.0607369 8.26029 0.0607369 8.68335 0.483805Z" fill="white" fill-opacity="0.5"/>
</svg>`;

document.querySelectorAll(".person-data .data-person .field .reset").forEach(function (el) {
  el.innerHTML = reset;

  let inp = el.parentElement.querySelector("input");

  el.onclick = function () {
    inp.value = "";
  };

});

document.querySelectorAll(".parents .reset").forEach(function (el) {
    el.innerHTML = reset;

    el.onclick = function () {
        document.getElementById("range-parents").value = "50";
    };
});

let range_items = document.querySelectorAll('input[type="range"]');
let button = document.querySelector('.reset_button');

range_items.forEach(elem => {
	elem.addEventListener('change', showButton)
})
function showButton() {
  button.classList.add('active')
}
button.addEventListener('click', function() {
	range_items.forEach(elem => {
  	elem.value = 50;
	})
})