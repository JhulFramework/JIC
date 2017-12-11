<?php namespace _m\user\context\anon\signup\_view;


class Generator extends \_m\webpage\view\_Generator
{

	public function generate( $page )
	{
		$fields = ( new Name( $page->form()->name() ) )->toString();

		$fields .= ( new Email( $page->form()->name() ) )->toString();

		$fields .= ( new Password( $page->form()->name() ) )->toString();

		$fields .= $this->formTokenField( $page->form()->name() )->toString();

		$fields .= $this->button( 'आगे बढ़े' )->toString();


		$formHTML = ( new Form( $fields ) )->toString() ;


		$layout = new Layout( [ 'form' => $formHTML ] ) ;

		return $this->builder()->generate( $layout );
	}




}
