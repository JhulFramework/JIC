<?php namespace _modules\gui\nodes\admin\edit;

use \_modules\gui\nodes\admin\Item;

class Page extends \Jhul\Core\Application\Page\_Class
{
	public function makeWebPage()
	{

		$key = $this->getApp()->mDataType('pdn')->make( $_GET['item'] );

		$item = Item::I()->D()->byKey( $key->value() )->fetch() ;

		if( NULL != $item )
		{
			$form = new Form( $item );

			if( $form->ifFieldSelected()  )
			{
				if( $form->collect() )
				{
					$form->save();
				}

				$this->app()->response()->page()
				->addContent
				(
					$this->app()->m('admin')->formBuilder()
					->makeField
					(
						$form->currentField(),
						$form
					)
				);
			}
			else
			{
				$this->cook( 'admin.edit_'.$form->viewName() , [ 'form' =>  $form ] );
			}

		}
	}
}
