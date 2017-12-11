<?php namespace _modules\user\datatypes\iname;

class IName extends \Jhul\Core\Application\DataType\Types\String\Attribute
{

	use \Jhul\Core\_AccessKey;

	protected $_blacklist = [];

	public function __construct()
	{
		parent::__construct();
		$this->mErrorCode()->add( 'validateNotBlackListed', 'ERROR_INAME_NOT_ALLOWED' );
	}

	public function definitionString()
	{
		return $this->g('definition');
	}

	//Generates unique username
	//ianme must contain one atleast one alphabet character, to distinguish it from identity key
	public function generateNew( $iname = NULL )
	{
		if( empty($iname)  )
		{
			$iname = rand(999, 9999);
		}

		$iname .= rand(1, 3);

		$user = $this->module()->mUser()->findByIName( $iname, 'exists' ) ;

		return $user->isNull() ? 'u'.$iname : $this->generateNew( $iname );
	}

	public function validateNotBlackListed( $iname )
	{
		return !in_array( $iname, $this->blacklist() );
	}

	//@override
	public function validateType( $value )
	{
		return ctype_alnum( $value ) && !ctype_digit($value) ;
	}

	public function blackList()
	{
		if( empty($this->_blacklist) )
		{
			$this->_blacklist = $this->J()->fx()->loadConfigFile( $this->config('blacklist') );
		}

		return $this->_blacklist;
	}

	public function type() { return 'iname'; }

}
