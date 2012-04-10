<?php defined('SYSPATH') OR die('No Direct Script Access');

Class Model_Form extends Model
{
	public function get_produkt($co)
	{
		return DB::select()->from('produkty')->where('co', '=', $co)->execute()->as_array('id', 'name');
	}
	public function add_produkt($arr)
	{
		//Kohana::init(array('errors' => FALSE));
		error_reporting(E_ALL & ~E_NOTICE);
		$insert = DB::insert('konfiguracja', array('id_plyta', 'id_procesor', 'id_pamiec', 'id_pamiec2', 'id_karta_graf', 'id_dysk', 'id_dysk2', 'id_obudowa', 'id_zasilacz', 'id_naped', 'id_karta_muz', 'id_klawiatura', 'id_mysz'))->values(array($arr['komp_plyta'], $arr['komp_procesor'], $arr['komp_pamiec'], $arr['komp_pamiec2'], $arr['komp_karta_graf'], $arr['komp_dysk'], $arr['komp_dysk2'], $arr['komp_obudowa'], $arr['komp_zasilacz'], $arr['komp_naped'], $arr['komp_karta_muz'], $arr['komp_klawiatura'], $arr['komp_mysz']))->execute();
		//Kohana::init(array('errors' => TRUE));
		return $insert;
	}
}