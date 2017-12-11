<?php namespace _modules\user\elements\image;

/*----------------------------------------------------------------------------------------------------------------------
 *@author [Manish Dhruw] <eskylite@gmail.com>
 *
 *
 *
 *@created Monday 04 May 2015 08:21:26 AM IST
 *--------------------------------------------------------------------------------------------------------------------*/


//IMage Upload Handler
class Uploader
{
	//use \Jhul\Components\Application\Traits\Module_Access;
	public function image()
	{
		return $this->_image;
	}

	public function setImageName( $name )
	{
		$this->_imageName = $name ;
		return $this;
	}

	//returns name without extension
	public function imageName() { return $this->_imageName ; }

	private $_rescaleModes = [

		'shrink' => 'shrink',

		'crop'	=> 'fill_crop',
	];

	public function setRescaleMode( $mode )
	{
		if( isset( $this->_rescaleModes[$mode] ) )
		{
			$this->_rescaleMode = $this->_rescaleModes[$mode] ;
		}

		return $this;
	}

	public function sanitize()
	{
		$this->_sanitize = TRUE;
		return $this;
	}

	//returns relative file name;
	public function save()
	{

		if( isset( $this->_attributes['maxWidth'] ) )
		{
			$builder = $this->builder()->addBackgroundLayer()->fileName( $this->image()->source() )

					->resize( $this->_attributes['maxWidth'], $this->_attributes['maxHeight'], $this->_rescaleMode )->done();
		}
		else
		{
			$builder = $this->builder()->addBackgroundLayer()->fileName( $this->image()->source() )->done();
		}

		//rewriting image to remove malicious codes
		if( $this->_sanitize )
		{
			$builder =  $builder->addImageLayer()->filename(__DIR__.'/empty16x16.png')->done();
		}

		$image = $builder->save();

		file_put_contents( $this->filePath() , $image->getContents() );

		return $this->relativeFilePath();
	}

	/* PRIVATE
======+===============================================================================================================*/

	private $_imageName;

	private $_image;

	private $_attributes;

	private $_rescaleMode = 'shrink';

	private $_sanitize = FALSE;

	private $_dateDir;

	// Destination Directory Path
	protected $baseUploadPath;

	private function builder(  )
	{
		return new \Imagecraft\ImageBuilder();
	}

	public function __construct( $image, $baseUploadPath, $attributes )
	{
		$this->_attributes = $attributes;
		$this->baseUploadPath = $baseUploadPath ;
		$this->_image = $image;
		$this->_dateDir = date('Y', time()).'/'.date('m', time());
		$this->touchDir();
	}

	public static function I( $src, $DDPath, $attributes )
	{
		return new static( $src, $DDPath, $attributes );
	}

	private function touchDir()
	{

		$uploadPath = '/'.trim( $this->uploadPath(), '/');



		if( is_dir( $uploadPath ) || @mkdir( $uploadPath , 0775, true) )
		{
			return TRUE;
		}

		throw new \Exception('Directory "'.$uploadPath.'" Not Exists / Not Creatable ');
	}

	private function generateImageName()
	{
		if( $this->_imageName == '' ) $this->_imageName = $this->randomKey(12,2);

		$unique = FALSE ;

		while( !$unique )
		{
			$file = $this->filePath() ;

			if( file_exists( $file ) )
			{
				$this->_imageName .= 'm';
			}
			else
			{
				$unique = TRUE;
			}
		}
	}


	public function randomKey( $length = 10, $charStrength = 0 )
	{
		$char = '0123456789';

		if( $charStrength > 0 )
			$char .= 'abcdefghijklmnopqrstuvwxyz';

		if( $charStrength > 1 )
			$char .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

		if( $charStrength > 2 )
			$char .= '!@#$%^&*(){}.|!@#$%^&*(){}.|';

		$char = str_shuffle($char);

		$charactersLength = strlen($char);

		$randomString = '';

		for ($i = 0; $i < $length; $i++)
		{
			$randomString .= $char[ rand( 0, $charactersLength - 1 ) ];
		}

		return $randomString;
	}

	//Absolut Destination File Path
	public function filePath()
	{
		return $this->uploadPath().'/'.$this->filename();
	}

	public function uploadPath()
	{
		return $this->baseUploadPath.'/'.$this->relativeDir();
	}

	public function relativeDir()
	{
		return $this->_dateDir;
	}

	public function relativeFilePath()
	{
		return $this->relativeDir().'/'.$this->fileName() ;
	}

	public function fileName()
	{
		if( $this->_imageName == '' )
		{
			$this->generateImageName();
		}
		return $this->_imageName.'.'.$this->image()->extension();
	}


}
