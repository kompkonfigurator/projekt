var funkcja;
funkcja = function() {
	var name = $(this).attr("name");
	var value = $(this).attr("value");
	console.log(name);
	$.get('http://localhost/kohana/prox.php?id=' + value, function(data) {
		$('[name="' + name + '_sklep"]').html(data);
	});
};
$(document).ready(function() {
	$('.listen').each( function() {
		this.addEventListener("change", funkcja, false);
	});
});