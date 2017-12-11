<?php namespace _m\admin\classes;

abstract class _Edit_Page extends \Jhul\Core\Application\Page\_Class
{
	public function makeWebPage()
	{
		$key = $this->app()->mDataType('pdn')->make( $_GET['item'] );

		$item = $this->itemDispenser()->byKey( $key->value() )->fetch() ;

		if( NULL != $item )
		{
			$form = $this->form( $item );

			if( $form->ifFieldSelected()  )
			{
				if( $form->collect() )
				{
					$form->save();

					$this->app()->redirect( $form->entity()->adminUrl() );
				}

				$this->app()->response()->page()
				->addContent
				(
					$this->app()->m('admin')->formBuilder()->form( $form )->add( $form->currentField() )->make()
				);
			}
			else
			{
				$this->cook( 'admin.edit_index', [ 'form' =>  $form ] );
			}

		}
	}

	public abstract function itemDispenser();

	public abstract function form( $item );
}
