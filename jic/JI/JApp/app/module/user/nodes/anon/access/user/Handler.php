<?php namespace _modules\user\nodes\anon\access\user;

class Handler extends \Jhul\Core\Application\Handler\_Class
{
	public function handle()
	{
		return $this->renderPage();
	}
}
