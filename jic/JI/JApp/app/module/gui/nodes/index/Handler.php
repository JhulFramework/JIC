<?php namespace _modules\android\nodes\index;

use \_modules\android\db\game\M as Game;


class Handler extends \Jhul\Core\Application\Handler\_Class
{

	public function canHandleNextNode()
	{
		return TRUE;
	}

	public function handle()
	{
		if( NULL == $this->mPath()->next() )
		{
			return $this->makePage();
		}
		else if( $this->mPath()->next() == 'submit' )
		{
			$this->makePage('submit');
		}
		else
		{
			$game = Game::I()->D()->byKey( $this->itemKey() )->fetch();

			if( NULL != $game )
			{
				$this->getApp()->mData()->add( 'game', $game );

				$this->makePage( __NAMESPACE__.'\\item\\Page' );
				//$this->getApp()->response()->page()->loadFile( __DIR__.'/item/_view', ['game' => $game] );
			}
		}
	}

	protected $_item_key;

	public function itemKey()
	{
		if( empty($this->_item_key) )
		{
			$this->_item_key = substr( $this->mPath()->next(), strrpos( $this->mPath()->next(), '-' ) + 1 ) ;
		}

		return $this->_item_key;
	}
}
