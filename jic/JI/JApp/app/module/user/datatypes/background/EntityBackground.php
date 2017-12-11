<?php namespace _modules\user\elements\background;

class EntityBackground extends \Jhul\Components\Validator\Entity
{
	use \Jhul\Components\Application\Traits\Module_Access;

	public function rules()
	{
		return $this->module()->background()->rules();
	}

	//return image object
	public function image()
	{
		return $this->module()->imageFactory()->make( $this->value() );
	}
}
