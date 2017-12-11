<?php namespace _modules\user\elements\avatar;

class E extends \Jhul\Components\Validator\Entity
{

	use \Jhul\Components\Application\Traits\Module_Access;

	protected function rules()
      {
            return $this->module()->avatar()->rules();
      }

	//return image object
	public function image()
	{
		return $this->module()->imageFactory()->make( $this->value() );
	}
}
