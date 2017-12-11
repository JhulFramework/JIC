<?php namespace _modules\gui\db\resource;

class M extends \Jhul\Components\Database\Store\Data\_Class
{



	public function context()
	{
		return 'read';
	}

	public function keyName()
	{
		return 'identity_key';
	}

	public function tableName()
	{
		return 'gui';
	}

	public function storeClass()
	{
		return __NAMESPACE__.'\\Store';
	}

	public function name()
	{
		return $this->read('name');
	}

	public function description()
	{
		return $this->read('description');
	}

	protected $_content = 0;

	public function content( $reload = FALSE )
	{
		if( (0 === $this->_content) || $reload )
		{
			$this->_content = content\Store::D( $this->context() )->byKey( $this->key() )->fetch();
		}

		return $this->_content;
	}

	public function style()
	{
		if( NULL != $this->content() )
		{
			return $this->content()->style();
		}
	}

	public function script()
	{
		if( NULL != $this->content() )
		{
			return $this->content()->script();
		}
	}


	public static function byKeys( $keys )
	{
		return static::D()->wherein( 'identity_key', $keys );
	}


}
