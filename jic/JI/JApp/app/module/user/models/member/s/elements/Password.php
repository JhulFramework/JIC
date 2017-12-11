<?php namespace _modules\user\perspectives\s\models\user\elements;

class Password
{
	use \Jhul\Components\Application\Traits\Module_Access;
	use \Jhul\Components\Database\Traits\ValueEntity;

	protected function user()
	{
		return $this->context();
	}

	//input raw password
	public function match( $password )
	{
		return $this->module()->password()->verifyHash( $password,  $this->user()->get( 'password' )  );
	}

	//input raw password
	public function update( $password )
	{
		return $this->user()->set( 'password', $password )->save();
	}

}
