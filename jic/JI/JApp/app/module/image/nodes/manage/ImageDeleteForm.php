<?php namespace _modules\image_admin\nodes\manage;

class ImageDeleteForm extends \Jhul\Components\Form\_Class
{
	use \Jhul\Components\Database\Store\Data\_WriteAccessKey;

	public function name(){ return 'delete_form'; }

	//protected $_image ;

	public function fields()
	{
		return
		[
			'name' => 'string',

			'key' => 'pdn',
		];
	}



	public function deleteImage()
	{
		if( $this->validate() )
		{
			$image = Image::I()->D()->byKey( $this->key->value() )->where('name', $this->name->value() )->fetch();
			if( NULL != $image )
			{
				$image->delete();
			}
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

	public function hidden()
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
