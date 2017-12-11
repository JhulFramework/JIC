<?php namespace _modules\auth\activities\login;

class Login_X_Form extends \Jhul\Components\Application\Html\Form\Base
{

	//use \Jhul\Core\Traits\DependencyProvider;
	use \Jhul\Components\Application\Traits\AccessModule;

	private $_error;

	private $_x_user_data;

	private $_clients =
	[
		'google'	=> 'google',
		'facebook'	=> 'facebook',
	];

	//It will not validate if client is valid or not
	public function __construct( $client )
	{
		parent::__construct();



		$this->_x_user_data = $this->com('XAuth', $client )->data();

	}


	public function fieldDefinitions()
	{
		return
		[
			'password' => $this->module()->userModule()->P('P')->g('fieldDefinitions'),

			//FIXME Shouldnt be using error holder this
			'form' => ['type' => 'string'],
		];
	}

	public function isValid()
	{
		return NULL != $this->xGet('email');
	}

	//get X user data
	public function xGet( $key )
	{
		if( isset( $this->_x_user_data[ $key ] ) )
		{
			return $this->_x_user_data[ $key ];
		}
	}

	private $_user ;

	public function user()
	{
		if( NULL == $this->_user )
		{
			$this->_user = $this->module()->userModule()->table()->byEmail( $this->xGet('email') )->fetch();
		}

		return $this->_user;
	}

	public function validate()
	{
		if( NULL == $this->User() )
		{
			return parent::validate() ;
		}

		$this->addError( 'form', 'EMAIL_ALREADY_EXISTS_ERROR' );
		return FALSE;
	}

	public function save()
	{
		if( $this->validate() )
		{
			$this->_user =   $this->module()->userModule()->table()->newRecord( [

				'name'	=> $this->xGet('name'),

				'email'	=> $this->xGet('email'),

				'avatar'	=> $this->xGet('avatar'),

				'gender'	=> $this->xGet('gender'),

				'password'	=> $this->password,
			]);

			unset($_SESSION['user_X']);

			return $this->_user->save();
		}
	}


}
