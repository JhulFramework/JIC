<?php namespace _modules\user\nodes\recovery\layout;



class Generator
{
	use \Jhul\Core\_AccessKey;

	public static function I() { return new static ; }

	public function builder()
	{
		return $this->app()->m('webpage');
	}

	public function generate( $name,  $form_name )
	{
		$fields = ( new Email( $form_name ) )->toString();

		$fields .= ( new \_m\webpage\sys\element\form\field\AntiCSRFToken( $form ) )->toString();

		$fields .= ( new Button( 'आगे बढ़े' ) )->toString();

		$formHTML = ( new Form( $fields ) )->toString() ;

		$layout = new Layout( $name, [ 'form' => $formHTML ] ) ;

		return $this->builder()->generate( $layout );
	}




}
