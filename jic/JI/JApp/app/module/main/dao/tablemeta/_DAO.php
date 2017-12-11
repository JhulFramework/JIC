<?php namespace _m\main\dao\tablemeta;

abstract class _DAO extends \Jhul\Components\Database\DAO\_Class
{
	public function keyName()
	{
		return 'identity_key' ;
	}

	public function tableName()
	{
		return 'table_meta' ;
	}

	public function managerClass()
	{
		return __NAMESPACE__.'\\Manager' ;
	}

	public function rowCount()
	{
		return $this->read('row_count') ;
	}

	public function name()
	{
		return $this->read('table_name') ;
	}

	public static function findByName( $tableName )
	{
		return static::D()->where('table_name', $tableName)->fetch() ;
	}
}
