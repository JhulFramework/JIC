<?php namespace _m\user\context\siu\settings\avatar\_view;

class Generator extends \_m\webpage\view\_Generator
{
	public function generate( $page )
	{

		$form =  $this->form( $page->form()->name() )
		->setTitle('तस्वीर बदलें')
		->enableFileUpload()
		->addField( new ImageField( $page->form()->name() ) )
		->addToken()
		->addButton('तस्वीर भेजें')->toString();

		$this->builder()->generate( new Layout( [ 'form' => $form ] ) );
	}

	// public function generate( $page )
	// {
	//
	// 	$field =  (new ImageField( $page->form()->name() ) )->toString();
	//
	// 	$field .= $this->token( $page->form()->name() )->toString();
	//
	// 	$field .= $this->button('तस्वीर भेजें')->toString();
	//
	// 	$form = $this->form( $field )->setTitle('तस्वीर बदलें')->enableFileUpload()->toString();
	//
	// 	$this->builder()->generate( new Layout( [ 'form' => $form ] ) );
	// }
}
