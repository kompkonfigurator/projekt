﻿<?php defined('SYSPATH') OR die('No Direct Script Access');

Class Model_Form extends Model
{
	public function return_model()
	{
		return $model = array('id_plyta' => __('Motherboard'),
		'id_procesor' => __('Processor'),
		'id_pamiec' => __('Memory'),
		//'id_pamiec2' => 'Pamięć',
		'id_karta_graf' => __('Video card'),
		'id_dysk' => __('HDD'),
		//'id_dysk2' => 'Dysk twardy',
		'id_obudowa' => __('Cover'),
		'id_zasilacz' => __('Power supply'),
		'id_naped' => __('ODD'),
		'id_karta_muz' => __('Soud card'),
		'id_klawiatura' => __('Keyboard'),
		'id_mysz' => __('Mouse') );
	}
	public function return_modelnoid()
	{
		return $model = array('plyta' => __('Motherboard'),
		'procesor' => __('Processor'),
		'pamiec' => __('Memory'),
		//'pamiec2' => 'Pamięć',
		'karta_graf' => __('Video card'),
		'dysk' => __('HDD'),
		//'dysk2' => 'Dysk twardy',
		'obudowa' => __('Cover'),
		'zasilacz' => __('Power supply'),
		'naped' => __('ODD'),
		'karta_muz' => __('Sound card'),
		'klawiatura' => __('Keybiard'),
		'mysz' => __('Mouse') );
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
