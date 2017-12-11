<?php namespace _modules\user\elements\image;

class Image
{
	protected $_ifValid = FALSE;

	private $_P =
	[
		'source'	=> '',

		//mime
		'M'	=> '',

		//Type
		'T'	=> '',

		//Width
		'W'	=> '',

		//Height
		'H'	=> '',

		//size
		'S'	=> '',
	];

	private $typeToExtension =
	[

		IMAGETYPE_PNG	=> 'png',
		IMAGETYPE_GIF	=> 'gif',
		IMAGETYPE_JPEG	=> 'jpg',

	];


	public function __construct( $source )
	{
		$this->_P['source'] = $source;
		$this->loadImageInfo();
	}

	protected function set( $key, $value )
	{
		$this->_P[$key] = $value;
		return $this;
	}

	protected function P( $key )
	{
		return $this->_P[$key];
	}

	private function loadImageInfo()
	{
		if( FALSE != ( $info = getimagesize( $this->P('source') ) ) )
		{
			$this
			->set( 'W',  $info[0] )

			->set( 'H', $info[1]  )

			->set( 'T', $info[2]  )

			->set( 'M', $info['mime']  )

			->set( 'S', filesize( $this->p('source') )  );

			if( isset( $this->typeToExtension[ $this->type() ] ) )
			{
				$this->_ifValid = TRUE;
			}
		}
	}

	public function extension()
	{
		return $this->typeToExtension[ $this->type() ] ;
	}

	public function __toString()
	{
		return $this->isValid() ? $this->p('source') : '' ;
	}

	public function isValid()
	{
		return $this->_ifValid ;
	}

	public function width()
	{
		return $this->P('W');
	}

	public function height()
	{
		return $this->P('H');
	}

	public function size()
	{
		return $this->p('S');
	}

	public function type()
	{
		return $this->P('T');
	}

	public function mime()
	{
		return $this->P('M');
	}

	public function source()
	{
		return $this->p('source');
	}
}
