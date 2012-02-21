jQuery.fn.encHTML = function() {
  return this.each(function(){
    var me   = jQuery(this);
    var html = me.html();
    me.html(html.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;'));
  });
};
 
jQuery.fn.decHTML = function() {
  return this.each(function(){
    var me   = jQuery(this);
    var html = me.html();
    me.html(html.replace(/&amp;/g,'&').replace(/&lt;/g,'<').replace(/&gt;/g,'>'));
  });
};
 
jQuery.fn.isEncHTML = function(str) {
  if(str.search(/&amp;/g) != -1 || str.search(/&lt;/g) != -1 || str.search(/&gt;/g) != -1)
    return true;
  else
    return false;
};
 
jQuery.fn.decHTMLifEnc = function(){
  return this.each(function(){
    var me   = jQuery(this);
    var html = me.html();
    if(jQuery.fn.isEncHTML(html))
      me.html(html.replace(/&amp;/g,'&').replace(/&lt;/g,'<').replace(/&gt;/g,'>'));
  });
}
var plyta_pamiec = new Array();
var sprzet_id = new Array();
var sprzet_cena = new Array();
var shop_link = new Array();
var test = new Array();
var SprzetDoId = { "plyta" : 0,
				   "procesor" : 1,
				   "pamiec" : 2,
				   "pamiec2" : 3,
				   "karta_graf" : 4,
				   "dysk" : 5,
				   "dysk2" : 6,
				   "dysk3" : 7,
				   "obudowa" : 8,
				   "zasilacz" : 9,
				   "naped" : 10,
				   "karta_muz" : 11,
				   "mysz" : 12,
				   "klawiatura" : 13 };
var dysk_patt=new RegExp("^dysk[0-9]*$");
// 0 - P³yta  g³ówna
// 1 - Procesor
// 2,3 - Pamiec
// 4 - Karta Graficzna
// 5,6,7 - Dysk
// 8 - Obudowa
// 9 - Zasilacz
// 10 - Napêd optyczny
// 11 - Karta muzyczna
// 12 - Mysz
// 13 - Klawiatura
for(i=0;i<=13;i++)
{
	sprzet_id[i] = new Array();
}
// shop_link[id][x][y]
// x - licznik shopa, wg cen rosn¹co 
// y :
// 0 - id
// 1 - shop_name
// 2 - shop_logo
// 3 - shop_id
// 4 - shop_url
// 5 - price
// 6 - product_id
// 7 - availability
// 8 - price_delivery
// 9 - direct_click_url
// 10 - image
function getLinkToShop(id, co, index, where, selectedshop)
{
	var shop;
	var x=0;
	var link = 'http://' + location.host + '/proxy/get?http://api.nokaut.pl/?format=xml&key=aa34033cb376ddfaeece2fdb5a18fd5f&method=nokaut.Price.getByProductId&product_id=' + id + '&sort_direction=price_asc';
	/*if(shop_link[id] instanceof Array)
	{
			$('#' + co + '_link').html(shop_link[id][0][9]);
			$('#' + co + '_link').decHTML();
			zmiana_sklep(index, where, co);
	}
	else
	{*/
		shop_link[id] = new Array();
		for(i=0; i<100; i++)
		{
			shop_link[id][i] = new Array();
		}
		$.ajax({
		type: "GET",
		url: link,
		async: true,
		dataType: "xml",
		success: function(xml){
			$(xml).find('item').each(function(){
				shop_link[id][x][0] = $(this).find('id').text();
				shop_link[id][x][1] = $(this).find('shop_name').text();	
				shop_link[id][x][2] = $(this).find('shop_logo').text();	
				shop_link[id][x][3] = $(this).find('shop_id').text();	
				shop_link[id][x][4] = $(this).find('shop_url').text();	
				shop_link[id][x][5] = $(this).find('price').text();	
				shop_link[id][x][6] = $(this).find('product_id').text();	
				shop_link[id][x][7] = $(this).find('availability').text();	
				shop_link[id][x][8] = $(this).find('price_delivery').text();	
				shop_link[id][x][9] = $(this).find('direct_click_url').text();	
				shop_link[id][x][10] = $(this).find('image').text();	

				x++;
		});
		},
		complete: function() {
			shop_link[id].length = x;
			$('#' + co + '_link').html( shop_link[id][0][9] );
			$('#' + co + '_link').decHTML();
			$('#komp_' + co + '_sklep_link').val($('#' + co + '_link').html());
			$('#' + co + '_cena').html( shop_link[id][0][5] );
			$('#komp_' + co + '_cena').val( shop_link[id][0][5] );
			$('#suma').html($("[class$='cena']").sum());
			$('#komp_cena_suma').val($("[class$='cena']").sum());
			zmiana_sklep(index, where, co, selectedshop);
			}
		});
	//}
}
function zmiana_pamiec(index, where, co, selectedshop, pamiec, pamiecshop)
{
var txt="";	
var i=0;
var selected_id=0;
	$.ajax({
		type: "GET",
		url: 'http://' + location.host + '/pamiec.xml',
		dataType: "xml",
		success: function(xml)
		{
			$(xml).find('item').each(function()
			{
					if(plyta_pamiec[index]==$(this).find('typ_pamieci').text())
					{
						if(pamiec==$(this).find('name').text())
						{
							txt+='<option selected="selected">' + $(this).find('name').text() + '</option>';
							selected_id=i;
						}
						else			
							txt+='<option>' + $(this).find('name').text() + '</option>';
						sprzet_id[SprzetDoId['pamiec']][i]=$(this).find('id').text();
						sprzet_id[SprzetDoId['pamiec2']][i]=$(this).find('id').text();
						var id = $(this).find('id').text();
						sprzet_cena[id]=$(this).find('price_min').text();
						i++;
					}
			});
			$("#komp_pamiec").html(txt);
			$("#komp_pamiec2").html(txt);
		},
		complete: function(){
				zmiana(index, where, co, selectedshop);
				zmiana(selected_id, 'pamiec_cena', 'pamiec', pamiecshop);
				//zmiana(0, 'pamiec2_cena', 'pamiec2');
			}
	});
}
function sprzet(socket, co, selected, selectedshop, pamiec, pamiecshop)
{
var z;

var pamiec_patt = /^DDR[1-3]?$/;
if(co=='pamiec2') z='pamiec';
else if(co=='dysk2' || co=='dysk3') z='dysk';
else z = co;
//link = 'http://' + location.host + '/proxy/get?http://api.nokaut.pl/?format=xml&key=aa34033cb376ddfaeece2fdb5a18fd5f&method=nokaut.Product.getByCategory&category=150';
var link = 'http://' + location.host + '/' + z +'.xml';
//var link = 'http://' + location.host + '/plyta.xml';
var selected_id=0;
$.ajax({
type: "GET",
url: link,
dataType: "xml",
beforeSend: function(){
},
success: function(xml){
	var txt="";
	var i=0;
      $(xml).find('item').each(function(){
		if((z=='plyta' && $(this).find('socket').text()==socket && $(this).find('typ_pamieci').text().match(pamiec_patt)) || (z=='pamiec' && $(this).find('typ_pamieci').text().match(pamiec_patt)) || (z=='procesor' && $(this).find('socket').text()==socket)	|| (z!='procesor' && z!='pamiec' && z!='plyta') )
		{
			if(selected==$(this).find('name').text())
			{
				txt+= '<option selected="selected">' + $(this).find('name').text() + '</option>';
				selected_id=i;
			}
			else
			{
				txt+= '<option>' + $(this).find('name').text() + '</option>';
			}
			sprzet_id[SprzetDoId[co]][i]=$(this).find('id').text();
			if(z=='plyta') plyta_pamiec[i] = $(this).find('typ_pamieci').text();
			var id = $(this).find('id').text();
			sprzet_cena[id]=$(this).find('price_min').text();
			i++;
		}
		});
		$("#komp_" + co).html(txt);
      },
complete: function(){
	if(co=='plyta') zmiana_pamiec(selected_id, co + '_cena', co, selectedshop, pamiec, pamiecshop);
	else zmiana(selected_id, co + '_cena', co, selectedshop);
},
error: function(oXMLHttpRequest, sTextStatus, oErrorThrown){alert(oErrorThrown.text());}
	  
});
}
function zmiana(index, where, co, selectedshop)
{
	//$('#' + where).html(sprzet_cena[sprzet_id[SprzetDoId[co]][index]]);
	//$('#suma').html($("[id$='cena']").sum());
	//$('#komp_cena_suma').val($("[id$='cena']").sum());
	//if(co=='procesor') alert(sprzet_id[SprzetDoId[co]][index] + ' ' + SprzetDoId[co] + ' ' + index);
	getLinkToShop(sprzet_id[SprzetDoId[co]][index], co, index, where, selectedshop);
	//$('#test').html(shop_link[sprzet_id[SprzetDoId[co]][index]]);
}
function zmiana_shop(index, where, co, indexplyta)
{
	$('#' + where).html(shop_link[sprzet_id[SprzetDoId[co]][indexplyta]][index][5]);
	$('#komp_' + co + '_cena').val(shop_link[sprzet_id[SprzetDoId[co]][indexplyta]][index][5]);
	$('#suma').html($("[class$='cena']").sum());
	$('#komp_cena_suma').val($("[class$='cena']").sum());
	$('#' + co + '_link').html(shop_link[sprzet_id[SprzetDoId[co]][indexplyta]][index][9]);
	$('#' + co + '_link').decHTML();
	$('#komp_' + co + '_sklep_link').val($('#' + co + '_link').html());
	
}
function select_sock(socket)
{
	if(socket!='nie')
	{
		sprzet(socket, 'plyta');
		sprzet(socket, 'procesor');
		//sprzet('', 'pamiec');
		//sprzet('', 'pamiec2');
		$('.sock_depend').removeAttr("disabled"); 
		$('#komp_socket').val(socket);
	}
	else
	{
		$('.sock_depend').attr("disabled", true); 
		$(".sock_depend").html('<option> --- WYBIERZ SOCKET ! ---</option>');
		$(".sock_dep_price").html('');
	}
}
function zmiana_sklep(index, where, co, selectedshop)
{
	var txt="";
	for(i=0; i<shop_link[sprzet_id[SprzetDoId[co]][index]].length; i++)
	{
			if(selectedshop==shop_link[sprzet_id[SprzetDoId[co]][index]][i][0])
			{
				txt+= "<option value=\"" + shop_link[sprzet_id[SprzetDoId[co]][index]][i][0] + "\" selected=\"selected\">" + shop_link[sprzet_id[SprzetDoId[co]][index]][i][1] + " - " + shop_link[sprzet_id[SprzetDoId[co]][index]][i][5] + "</option>";
				$('#' + co + '_link').html(shop_link[sprzet_id[SprzetDoId[co]][index]][i][9]);
				$('#' + co + '_link').decHTML();
				$('#komp_' + co + '_cena').val(shop_link[sprzet_id[SprzetDoId[co]][index]][i][5]);
				$('#suma').html($("[class$='cena']").sum());
				$('#komp_cena_suma').val($("[class$='cena']").sum());
				$('#komp_' + co + '_sklep_link').val($('#' + co + '_link').html());
				$('#' + where).html(shop_link[sprzet_id[SprzetDoId[co]][index]][i][5]);
			}			
			else
				txt+= "<option value=\"" + shop_link[sprzet_id[SprzetDoId[co]][index]][i][0] + "\">" + shop_link[sprzet_id[SprzetDoId[co]][index]][i][1] + " - " + shop_link[sprzet_id[SprzetDoId[co]][index]][i][5] + "</option>";	
	}
	$('#komp_' + co + '_sklep').html(txt);
}
function select_per(per)
{
	if(per!='nie')
	{
		sprzet('', per, 'per');
		$('#per').removeAttr("disabled");
	}
	else
	{
		$('#per').attr("disabled", true);
		$('#per_cena').html('');
	}
}
function edit()
{
	$('.sock_depend').attr("disabled", false);
}
function select_socket(socket)
{
	$("select[name='sel_sock'] option[value=\"" + socket + "\"]").attr("selected", true);	
}
function start(state)
{
$(document).ready(function() {
$.blockUI.defaults.message = '<img src="http://' + location.host + '/assets/busy.gif">';
$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
if(state==0)
{
	$('.sock_depend').attr("disabled", true); 	
	sprzet('', 'karta_graf');
	sprzet('', 'dysk');
	sprzet('', 'dysk2');
	sprzet('', 'dysk3');
	sprzet('', 'obudowa');
	sprzet('', 'zasilacz');
	sprzet('', 'naped');
	sprzet('', 'karta_muz');
	sprzet('', 'klawiatura');
	sprzet('', 'mysz');
}
$.Calculation.setDefaults({
	// a regular expression for detecting European-style formatted numbers
	reNumbers: /(-?\$?)(\d+(\.\d{3})*(,\d{1,})?|,\d{1,})/g
	// define a procedure to convert the string number into an actual usable number
	, cleanseNumber: function (v){
		// cleanse the number one more time to remove extra data (like commas and dollar signs)
		// use this for European numbers: v.replace(/[^0-9,\-]/g, "").replace(/,/g, ".")
		return v.replace(/[^0-9,\-]/g, "").replace(/,/g, ".");
	}
})

});
}
$(document).ready(function() {
	$('.link').decHTML();
});