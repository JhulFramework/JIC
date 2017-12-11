<?php namespace _modules\user\datatypes\name;

class Name extends \Jhul\Core\Application\DataType\Types\String\Attribute
{
	//use \Jhul\Core\Application\Module\_AccessKey;

	protected $_blacklist = [];

	public function validationMethods()
	{
		$validationMethods = parent::validationMethods();

		$validationMethods['ifNotBlackListed'] = 'This IName in not Allowed'  ;


		return $validationMethods ;
	}

	public function definitionString()
	{
		return $this->config('definition');
	}

	public function ifNotBlackListed( $iname )
	{
		return !in_array( $iname, $this->blacklist() );
	}

	public function blackList()
	{
		if( empty($this->_blacklist) )
		{
			$this->_blacklist = $this->module()->loadResource( $this->config('blacklist') );
		}

		return $this->_blacklist;
	}
}
