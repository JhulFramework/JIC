<?php namespace _modules\user\perspectives\s\models\user\eav;

class IName
{
	use \Jhul\Components\Database\Traits\EAV\Values\Value;

	function match( $IName )
	{
		return 0 == strcasecmp( $this->value(), $IName );
	}
}
