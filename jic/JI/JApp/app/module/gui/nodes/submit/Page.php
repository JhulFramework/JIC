<?php namespace _modules\kahani\nodes\submit;


class Page extends \Jhul\Core\Application\Page\_Class
{

	public function makeWebPage()
	{
		echo '<pre>';
		echo '<br/> File : <br/>'.__FILE__.':'.__LINE__.'</br></br>';
		var_dump('break');
		echo '</pre>';
		exit();
	}

}
