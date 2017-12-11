<?php namespace _modules\gui\nodes\admin;

class Item_Add_Form extends \Jhul\Components\Form\_Class
{
	protected $_visibilty = 'hidden';

	public function fields()
	{
		return
		[
			'name', 'description'
		];
	}

	public function name()
	{
		return 'item_add_form';
	}

	public function visibility()
	{
		return $this->_visibilty;
	}

	public function show()
	{
		$this->_visibilty = '';
	}

	public function hide()
	{
		$this->_visibilty = 'hidden';
	}

	public function process()
	{
		if( $this->validate() )
		{
			$kahani = Item::I()->store()->createAndCommit
			(
				'write',
				[
					'name' 		=> $this->name->value(),

					'description'	=> $this->description->value(),

				]
			);
			return TRUE;
		}
	}
}
