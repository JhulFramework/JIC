<?php namespace _m\webpage\view\element\form;

class Form extends \_m\webpage\view\_Class
{

	use \_m\webpage\view\element\_HasAttributes;

	private $_content ;
	private $_title ;

	public function __construct( $content )
	{
		$this->_content = $content;
		$this->setAttribute( 'method', 'post' );
		$this->setAttribute( 'action', '' );
	}

	public function make()
	{
		$content = '<div class="fields">'.$this->_content.'</div>' ;

		if( NULL != $this->description() )
		{
			$content = '<div class="description">'.$this->description().'</div>'.$content ;
		}

		if( NULL != $this->title() )
		{
			$content = '<div class="title">'.$this->title().'</div>'.$content ;
		}

		return '<form '.$this->serializeAttributes().' >'.$content.'</form>';
	}

	public function toString()
	{
		return '<div class="'.$this->wrapperClass().'" >'.$this->make().'</div>' ;
	}

	public function title()
	{
		return $this->_title ;
	}

	public function enableFileUpload()
	{
		return $this->setAttribute( 'enctype', 'multipart/form-data' );
	}

	public function setTitle( $title )
	{
		$this->_title = $title ;
		return $this ;
	}

	public function description()
	{
		return '' ;
	}

	public function wrapperClass()
	{
		return 'formWrapper'  ;
	}
}
