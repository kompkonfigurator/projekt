<?php defined('SYSPATH') OR die('No Direct Script Access');

Class Model_Form extends Model
{
	function get_produkt($co)
	{
		return DB::select()->from('produkty')->where('co', '=', $co)->execute()->as_array(NULL, 'name');
	}
}