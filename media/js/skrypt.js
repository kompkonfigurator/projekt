var funkcja, funkcja2;
funkcja = function() {
	var name = $(this).attr("name");
	var value = $(this).attr("value");
	$.get('http://localhost/kohana/prox.php?id=' + value, function(data) {
		//$('[name="' + name + '_sklep"]').html(data);
		$('[name="' + name + '_sklep"]').html($(data).filter('#sklepy').html());
		$('#' + name + '_cena').html($(data).filter('#cena').html());
	});
};
funkcja2 = function() {
	var name = $(this).attr("name"), value = $(this).attr("value"), nejm = name.replace('_sklep', ''), idprod;
	idprod = $('[name="' + nejm + '"]').attr("value");
	$.get('http://localhost/kohana/prox.php?idcena=' + idprod + '&idshop=' + value, function(data) {
		$('#' + nejm + '_cena').html($(data).filter('#cena').html());
	});
};
$(document).ready(function() {
	$('.listen').each( function() {
		this.addEventListener("change", funkcja, false);
	});
	$('.shop').each(function() {
		this.addEventListener("change", funkcja2, false);
	});
});