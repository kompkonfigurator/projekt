<?php defined('SYSPATH') OR die('No Direct Script Access');

Class Model_Form extends Model
{
	public function return_model()
	{
		return $model = array('id_plyta' => 'Płyta Główna',
		'id_procesor' => 'Procesor',
		'id_pamiec' => 'Pamięć',
		//'id_pamiec2' => 'Pamięć',
		'id_karta_graf' => 'Karta graficzna',
		'id_dysk' => 'Dysk twardy',
		//'id_dysk2' => 'Dysk twardy',
		'id_obudowa' => 'Obudowa',
		'id_zasilacz' =>'Zasilacz',
		'id_naped' => 'Napęd',
		'id_karta_muz' => 'Karta muzyczna',
		'id_klawiatura' => 'Klawiatura',
		'id_mysz' => 'Mysz' );
	}
	public function return_modelnoid()
	{
		return $model = array('plyta' => 'Płyta Główna',
		'procesor' => 'Procesor',
		'pamiec' => 'Pamięć',
		//'pamiec2' => 'Pamięć',
		'karta_graf' => 'Karta graficzna',
		'dysk' => 'Dysk twardy',
		//'dysk2' => 'Dysk twardy',
		'obudowa' => 'Obudowa',
		'zasilacz' =>'Zasilacz',
		'naped' => 'Napęd',
		'karta_muz' => 'Karta muzyczna',
		'klawiatura' => 'Klawiatura',
		'mysz' => 'Mysz' );
	}
	public function get_shops($id)
	{
		$query = DB::query(Database::SELECT, 'SELECT * FROM produkty_sklepy ps INNER JOIN sklepy s ON ps.id_sklep  = s.shop_id WHERE ps.id_produkt IN (SELECT id_nokaut FROM produkty WHERE id = :id)');
		$query->parameters(array(':id' => $id));
		return $query->execute()->as_array('id_sklep', 'shop_name');
	}
	public function get_cena($id)
	{
		$query = DB::query(Database::SELECT, 'SELECT price FROM produkty_sklepy ps INNER JOIN sklepy s ON ps.id_sklep  = s.shop_id WHERE ps.id_produkt IN (SELECT id_nokaut FROM produkty WHERE id = :id) LIMIT 1');
		$query->parameters(array(':id' => $id));
		$ret = $query->execute()->as_array();
		return $ret[0]['price'];
	}
	public function get_cena_shop($id, $idshop)
	{
		$query = DB::query(Database::SELECT, 'SELECT price FROM produkty_sklepy ps INNER JOIN sklepy s ON ps.id_sklep  = s.shop_id WHERE ps.id_produkt IN (SELECT id_nokaut FROM produkty WHERE id = :id) AND shop_id = :shop LIMIT 1');
		$query->parameters(array(':id' => $id,
									':shop' => $idshop));
		$ret = $query->execute()->as_array();
		return $ret[0]['price'];
	}
	public function get_produkt($co)
	{
		return DB::select()->from('produkty')->where('co', '=', $co)->execute()->as_array('id', 'name');
	}
	public function get_produktById($id)
	{
		return DB::select()->from('produkty')->where('id', '=', $id)->execute()->as_array('id', 'name');
	}
	public function getName_byProduktId($id)
	{
		return DB::select('name')->from('produkty')->where('id', '=', $id)->execute()->as_array();
	}
	public function get_konf($id)
	{
		$query = DB::select()->from('konfiguracja')->where('id', '=', $id)->execute()->as_array();
		return $query[0];
	}
	public function getAllKonf()
	{
		return $query = DB::select()->from('konfiguracja')->execute()->as_array();
	}
	public function add_produkt($arr)
	{
		foreach($arr as $key => $val)
		{
			if(!preg_match('/id_.*/', $key)) unset($arr[$key]);
		}
		error_reporting(E_ALL & ~E_NOTICE);
		$insert = DB::insert('konfiguracja', array_keys($arr))->values(array_values($arr))->execute();
		return $insert;
	}
	public function update_produkt($arr, $id)
	{
		foreach($arr as $key => $val)
		{
			if(!preg_match('/id_.*/', $key)) unset($arr[$key]);
		}
		error_reporting(E_ALL & ~E_NOTICE);
		return $update = DB::update('konfiguracja')->set($arr)->where('id', '=', $id)->execute();
	}
	public function delete_produkt($id)
	{
		return $delete = DB::delete('konfiguracja')->where('id', '=', $id)->execute();
	}
}
