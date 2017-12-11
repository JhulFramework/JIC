<?php namespace _modules\android\nodes\index;

use \_modules\android\db\game\M as Game;

class Page extends \Jhul\Core\Application\Page\_Class
{

	public function getOffSet()
	{
		$offset = 0;
		if( isset($_GET['page']) && ctype_digit( $_GET['page'] ) )
		{
			if( 0 < $_GET['page'] )
			{
				$offset = $_GET['page']*$this->module()->itemsPerPage();
			}
		}
		return $offset;
	}


	public function makeWebPage()
	{

	}

	public function makeJSON()
	{
		$this->loadItem();
		$this->loadMeta();
	}

	protected function loadMeta()
	{
		if( isset($_GET['get']) && $_GET['get'] == 'meta' )
		{
			$last = Game::I()->D()->limit(1)->orderBy( 'identity_key', 'DESC')->fetch();

			$this->cook( 'end_key', $last->key() );
		}
	}

	// public function formatItem( $game )
	// {
	// 	$s = new \stdClass;
	//
	// 	$s->key = $game->key();
	// 	$s->description = $game->description();
	//
	// 	return $s;
	// }
	//

	protected function loadItem()
	{

		if( isset($_GET['key']) && $_GET['key'] > 0 )
		{
			$d = Game::I()->D()->byKey( $_GET['key'] )->fetch();

			if( NULL != $d )
			{
				$this->cook( 'key', $d->key() );
				$this->cook( 'name', $d->name() );
				$this->cook( 'description', $d->description() );
				$this->cook( 'playstore_key', $d->playstoreKey() );
		
				$this->cook( 'youtube_key', $d->youtubeKey() );

				$this->cook( 'icon_url', $d->iconURL() );
				return;
			}

		}

	}
}
