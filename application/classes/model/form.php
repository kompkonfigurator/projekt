<?php defined('SYSPATH') OR die('No Direct Script Access');

Class Model_Form extends Model
{
	function get_produkt($co)
	{
		return DB::select()->from('produkty')->where('co', '=', $co)->execute()->as_array(NULL, 'name');
	}
	/*$procesor = DB::select()->from('produkty')->where('co', '=', 'procesor')->execute()->as_array();
	$pamiec = DB::select()->from('produkty')->where('co', '=', 'pamiec')->execute()->as_array();
	$karta_graf = DB::select()->from('produkty')->where('co', '=', 'karta_graf')->execute()->as_array();
	$dysk = DB::select()->from('produkty')->where('co', '=', 'dysk')->execute()->as_array();
	$obudowa = DB::select()->from('produkty')->where('co', '=', 'obudowa')->execute()->as_array();
	$zasilacz = DB::select()->from('produkty')->where('co', '=', 'zasilacz')->execute()->as_array();
	$naped = DB::select()->from('produkty')->where('co', '=', 'naped')->execute()->as_array();
	$karta_muz = DB::select()->from('produkty')->where('co', '=', 'karta_muz')->execute()->as_array();
	$mysz = DB::select()->from('produkty')->where('co', '=', 'mysz')->execute()->as_array();
	$klawiatura = DB::select()->from('produkty')->where('co', '=', 'klawiatura')->execute()->as_array();*/

}