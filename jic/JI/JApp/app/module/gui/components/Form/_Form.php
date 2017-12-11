<?php namespace Jhul\Components\HTML\Form;

class _Form
{
	protected $_builder;

	protected $_html = '';

	protected $_form;

	public function __construct( $builder, $form )
	{
		$this->_builder = $builder ;
		$this->_form = $form;
	}

	public function add( $field )
	{
		$this->_html .= $this->_builder->make( $field, $this->_form  );
		return $this;
	}

	public function __toString()
	{
		return $this->_builder->wrap( $this->_html );
	}

	public function make()
	{
		return $this->__toString();
	}
}
