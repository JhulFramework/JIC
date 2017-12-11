<?php namespace _modules\user\nodes\recovery\verify ;

class Form extends \Jhul\Components\Form\_Class
{

	private $_resetLink;

	public function __construct( $resetLink )
	{
		parent::__construct();

		$this->_resetLink = $resetLink;
	}


	public function name() { return 'password_recovery_complete'; }

	//used to vliadte user submitted data
	public function fields()
	{
		return
		[
			'password_new',

			'password_new_confirm'
		];
	}

	public function postValidate()
	{
		if( $this->password_new_confirm->value() == $this->password_new->value() )
		{
			return TRUE;
		}

		$this->addError( 'password_new_confirm', 'password does not match' );
	}


	public function cookHTMLNotification()
	{
		return $this->app()->response()->page()->mTemplate()->renderView
		(
			__DIR__.'/_password_recovery_successful_hin.php',

			['url' => $this->app()->url().'/login'  ]
		);

	}

	public function save()
	{
		if( $this->validate() )
		{
			$this->_resetLink->user()->write('password', $this->password_new->value() )->commit();

			$this->_resetLink->delete();
			return TRUE;
		}
	}

}
