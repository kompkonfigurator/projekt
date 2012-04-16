<?php defined('SYSPATH') OR die('No Direct Script Access');

Class Model_Form extends Model
{
	public function get_produkt($co)
	{
		return DB::select()->from('produkty')->where('co', '=', $co)->execute()->as_array('id', 'name');
	}
	public function get_produktById($id)
	{
		return DB::select()->from('produkty')->where('id', '=', $id)->execute()->as_array('id', 'name');
	}
	public function get_konf($id)
	{
		return $query = DB::select()->from('konfiguracja')->where('id', '=', $id)->execute()->as_array();
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