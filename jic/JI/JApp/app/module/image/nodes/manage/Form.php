<?php namespace _modules\image_admin\nodes\manage;

class Form extends \Jhul\Components\Form\_Class
{
	use \Jhul\Components\Database\Store\Data\_WriteAccessKey;

	public function name(){ return 'upload_form'; }

	//protected $_image ;

	public function fields()
	{
		return
		[
			'name' => 'string',

			'caption' => 'string?required=0',
		];
	}

	public function files()
	{
		return
		[
			'image' => 'image'
		];
	}

	public function save()
	{
		if( $this->validate() )
		{
			$this->module()->addImage
			(
				$this->image,

				[
					'name' => str_replace( ' ', '-', $this->name->value()),
				],

				$this->caption->value()
			);

			return TRUE;
		}
	}

	protected $_visibility = 'hidden';

	public function visibility()
	{
		return $this->_visibility;
	}

	public function show()
	{
		$this->_visibility = '' ;
	}

	public function hide()
	{
		$this->_visibility = 'hidden' ;
	}

	public function showError( $field )
	{
		if( $this->hasError( $field ) )
		{
			return '<div class="uk-form-danger">'. $this->error($field) .'</div>';
		}
	}
}
