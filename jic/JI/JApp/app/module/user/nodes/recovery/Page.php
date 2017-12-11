<?php namespace _modules\user\nodes\recovery;

class Page extends \Jhul\Core\Application\Page\_Class
{

	public function name()
	{
		return 'recovery_create' ;
	}

	public function makeWebPage()
	{
		$this->title = 'Account Recovery';

		$form = new Form() ;

		if( $form->isSubmitted()  )
		{
			if( $form->generateResetLink()  )
			{
				return $this->cookText( $form->cookHTMLNotification() );
			}
		}

		if( empty($this->layout) )
		{
			$this->layout =  layout\Generator::I()->generate( $this->name() , $form->name() );
		}

		$this->cookFile( $this->layout , [ 'form' => $form ] );

	}

}
