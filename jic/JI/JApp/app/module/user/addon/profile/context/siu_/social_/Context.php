<?php namespace _m\user\addon\profile\context\siu_\social_;

class Context extends \Jhul\Core\Application\Module\Context\_Class
{
	public function isAccessible()
	{
		return !$this->app()->user()->isAnon() ;
	}

	private $_item;

	public function item()
	{
		if(  empty($this->_item) )
		{
			$class = __NAMESPACE__.'\\SocialLink';
			$this->_item = $class::find( $this->app()->user()->key() );
		}

		return $this->_item ;
	}

	public function daoMap()
	{
		return
		[
			__NAMESPACE__.'\\SocialLink'	=> '*',
		];
	}
}
