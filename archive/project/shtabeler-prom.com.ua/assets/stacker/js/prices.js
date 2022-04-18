$(document).ready(function() {
	var allPrices = document.getElementsByClassName('js-price');
	for (var i = 0; i < allPrices.length; i++) {
		var oldValue = allPrices[i].innerText;
		var newValue = oldValue.replace(/\B(?=(\d{3})+(?!\d))/g, " ");
		allPrices[i].innerText = newValue;
	}
});