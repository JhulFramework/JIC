<?php namespace _m\user\context\siu_\create_;

class Handler extends \Jhul\Core\Application\Handler\_Class
{

	public function canHandleNextNode()
	{
		return TRUE;
	}

	public function isAccessible()
	{
		return !$this->app()->user()->isAnon();
	}

	public function handle()
	{
		if( !$this->mPath()->hasNext() )
		{
			return $this->makePage();
		}

		if( $this->mPath()->next() == 'shayari' )
		{
			$this->makePage( 'shayari@siu_create' );
		}

		if( $this->mPath()->next() == 'article' )
		{
			$this->makePage( 'article@siu_create' );
		}
	}

}
