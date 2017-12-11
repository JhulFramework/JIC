<?php namespace _m\user\context\anon\login\_view;


class Generator extends \_m\webpage\view\_Generator
{
	public function generate( $page )
	{
		$formView = (new Form( $page->form()->name() ) )

		->addField( new LoginKey() )
		->addField( new Password() )
		->addToken()
		->addButton( 'प्रवेश करें' );

		$layout = new Layout( [ 'form' => $formView->toString() ] ) ;

		return $this->builder()->generate( $layout );
	}




}
