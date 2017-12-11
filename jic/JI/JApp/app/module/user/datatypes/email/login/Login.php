<?php namespace _modules\user\datatypes\email\login;

class Login extends \Jhul\Core\Application\DataType\Types\Email\Attribute
{

	//@Override String to email
	public function dataType(){ return 'login_email'; }

	public function __construct()
	{
		parent::__construct();

		$this->mErrorCode()->add( 'validateHost', 'HOST_FAILED' );
	}

	public function allowedHosts() { return $this->config('allowed_hosts') ; }

}
