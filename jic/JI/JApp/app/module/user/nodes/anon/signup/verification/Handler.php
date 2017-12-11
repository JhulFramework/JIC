<?php namespace _modules\user\nodes\anon\signup\verification;

use _modules\user\models\anon\User as VEmail;

class Handler extends \Jhul\Core\Application\Node\Handler\_Class
{
	public function canHandleNextNode() { return TRUE ; }

	public function handle()
	{


		if( $this->mPath()->hasNext() )
		{

			$email = $this->getApp()->mDataType('signup_email')->make( $this->mPath()->next() ) ;


			if( $email->isValid() )
			{
				$account = VEmail::D()->byEmail( $email->value() )->fetch();


				if( !$account->isNull() )
				{
					if( !$account->ifVerificationMailSent() )
					{
						$this->prepareMail($account)->dispatch();
						$account->incVerificationMailSent();
					}

					$this->getApp()->mData()->add( 'account', $account );
				}
			}
		}

		if(  NULL != $this->getApp()->mData()->get('account') )
		{
			return $this->runActivity();
		}
	}


	public function prepareMail( $user )
	{
		return $this->J()->cx('mailer')->newMessage()

		->setSubject('Email Verification')

		->setTo( [ $user->read('email') => $user->read('name') ] )

		->setBody
		(
			$this->getApp()->response()->mTemplate()->load
			(
				'verification_mail_text',
				[ 'code' =>  $user->read('verification_code') ]
			),
			'text/plain'
		)

		->addPart
		(
			$this->getApp()->response()->mTemplate()->load
			(
				'verification_mail_html',

				[ 'code' =>  $user->read('verification_code') ]
			),
			'text/html'
		);
	}
}
