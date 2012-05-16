var funkcja, funkcja2;

funkcja = function() {
	var name = $(this).attr("name");
	var value = $(this).attr("value");
	$.get('http://localhost/kohana/prox.php?id=' + value, function(data) {
		//$('[name="' + name + '_sklep"]').html(data);
		$('[name="' + name + '_sklep"]').html($(data).filter('#sklepy').html());
		$('#' + name + '_cena').html($(data).filter('#cena').html());
		$("#suma").html($(".cena").sum());
	});
};
funkcja2 = function() {
	var name = $(this).attr("name"), value = $(this).attr("value"), nejm = name.replace('_sklep', ''), idprod;
	idprod = $('[name="' + nejm + '"]').attr("value");
	$.get('http://localhost/kohana/prox.php?idcena=' + idprod + '&idshop=' + value, function(data) {
		$('#' + nejm + '_cena').html($(data).filter('#cena').html());
		$("#suma").html($(".cena").sum());
	});
};
$(document).ready(function() {
	$('.listen').each( function() {
		this.addEventListener("change", funkcja, false);
	});
	$('.shop').each(function() {
		this.addEventListener("change", funkcja2, false);
	});
	$("#suma").html($(".cena").sum());
	$.Calculation.setDefaults({
	// a regular expression for detecting European-style formatted numbers
	reNumbers: /(-?\$?)(\d+(\.\d{3})*(,\d{1,})?|,\d{1,})/g
	// define a procedure to convert the string number into an actual usable number
	, cleanseNumber: function (v){
		// cleanse the number one more time to remove extra data (like commas and dollar signs)
		// use this for European numbers: v.replace(/[^0-9,\-]/g, "").replace(/,/g, ".")
		return v.replace(/[^0-9,\-]/g, "").replace(/,/g, ".");
		}
	});
});