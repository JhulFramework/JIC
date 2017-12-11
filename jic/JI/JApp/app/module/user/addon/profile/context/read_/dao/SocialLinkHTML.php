<?php namespace _m\user\addon\profile\context\read_\dao;

class SocialLinkHTML
{

	private $_item ;

	public function __construct( $item )
	{
		$this->_item = $item;
	}

	public $_URLMap =
	[

		'github' 	=> 'https://github.com/',
		'instagram' => 'https://instagram.com/',
		'facebook'	=> 'https://facebook.com/',
		'pinterest'	=> 'https://pinterest.com/',
		'gplus'	=> 'https://google.com/+',
	];



	public function makeURL( $field )
	{
		if( !$this->_item->ifEmpty( $field ) )
		{
			$url = isset($this->_URLMap[$field]) ? $this->_URLMap[$field].$this->_item->read($field) : $this->_item->read($field) ;

			return '<a href="'.$url.'"><i class="icon-'.$field.'"></i></a>' ;
		}
	}
}
