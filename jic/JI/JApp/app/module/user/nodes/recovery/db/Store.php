<?php namespace _modules\user\nodes\recovery\db;

class Store extends \Jhul\Components\Database\Store\_Class
{
	public function items()
	{
		return
		[
			'write' =>
			[
				'class' 	=> __NAMESPACE__.'\\ResetLink',
				'select'	=> '*',
			],
		];
	}

	public function generateResetLink( $user )
	{
		$resetLink = ResetLink::D()->byKey( $user->key() )->fetch();

		if( !$resetLink->isNULL() )
		{
			if( $resetLink->isValid() )
			{
				return $resetLink ;
			}

			$resetLink->delete();
		}

		return $this->createAndCommit
		(
			'write',
			[
				'user_key'	=> $user->key(),
				'token'	=> $this->J()->cx('security')->randKey(6),
				'created'	=> time(),
			]
		);
	}

	public function useNULLDataModel()
	{
		return TRUE;
	}

}
