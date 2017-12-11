<?php namespace _modules\gui\nodes\admin;

class Item_Delete_Form extends \Jhul\Components\Form\_Class
{

	public function fields()
	{
		return
		[
			'key', 'name',
		];
	}

	public function name()
	{
		return 'item_delete_form';
	}

	public function process()
	{

		if( $this->validate() )
		{




			$item = Item::D()->byKey( $this->key->value() )->where('name', $this->name->value() )->fetch();

			if( NULL != $item )
			{
				$item->delete();
			}
		}
	}
}
