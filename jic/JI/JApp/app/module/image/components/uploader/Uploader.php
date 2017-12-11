<?php namespace _m\image\components\uploader;

/* @Author : Manish Dhruw [ 1D3N717y12@gmail.com ]
+=====================================================================================================================
| @Created : Monday 04 May 2015 08:21:26 AM IST
|
|
| @Updated : [ 20170411 ]
+--------------------------------------------------------------------------------------------------------------------*/



class Uploader
{

	use \Jhul\Core\_AccessKey ;

	//destination image file name
	protected $_name;

	protected $_params =
	[
		'max_width'		=> 1200,
		'max_height' 	=> 1200,
	];

	//@param: $image : source image object
	//@param : $upload_directory // upload directory, relative to base application path
	//@param : $params =  [ 'max-width' => 240, . . . ]
	public function __construct( $source_image, $upload_directory, $params )
	{
		$this->_source_image = $source_image;
		$this->_upload_directory = $upload_directory ;
		$this->_date_directory = date('Y', time()).'/'.date('m', time());


		if( isset($params['name']) )
		{
			$this->setName( $params['name'] );
			unset($params['name']);
		}
		else
		{
			$this->setName( $this->generateImageName() );
		}

		$this->_params = array_merge( $this->_params, $params );

		$this->touchUploadDirectory();
	}

	public function source()
	{
		return $this->_source_image;
	}

	public function setName( $name, $overwrite = FALSE )
	{
		$file = $this->uploadPath().'/'.$name.'.'.$this->source()->extension();

		if( is_file($file) && !$overwrite )
		{
			$name = $this->generateImageName( $name );
		}

		$this->_name = $name;

		return $this;
	}

	//returns name without extension
	public function name()
	{
		return $this->_name;
	}

	private $_rescale_modes =
	[

		'shrink' => 'shrink',

		'crop'	=> 'fill_crop',
	];

	public function setrescale_mode( $mode )
	{
		if( isset( $this->_rescale_modes[$mode] ) )
		{
			$this->_rescale_mode = $this->_rescale_modes[$mode] ;
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

		if( isset( $this->_params['max_width'] ) )
		{
			$builder = $this->builder()->addBackgroundLayer()->fileName( $this->source()->value() )

					->resize( $this->_params['max_width'], $this->_params['max_height'], $this->_rescale_mode )->done();
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

		return $this->pathRelativeToUploadDirectory();
	}

	/* PRIVATE
======+===============================================================================================================*/


	//image object
	private $_source_image;


	private $_rescale_mode = 'fill_crop';

	private $_sanitize = FALSE;

	private $_date_directory;

	protected $_upload_directory;

	private function builder( )
	{
		require __DIR__.'/imagecraft/project/imagecraft/vendor/autoload.php';

		return new \Imagecraft\ImageBuilder();
	}



	public static function I( $source_image, $upload_directory, $params )
	{
		return new static( $source_image, $upload_directory, $params );
	}

	//creates, if upload directory not exists
	private function touchuploadDirectory()
	{
		$upload_path =  $this->uploadPath();

		if( is_dir( $upload_path ) || @mkdir( $upload_path , 0775, true) )
		{
			return TRUE;
		}

		throw new \Exception('Directory "'.$upload_path.'" Not Exists/Not Creatable ');
	}

	private function generateImagename( $name = '' )
	{
		$name = empty($name) ? $this->randomKey() : $name.'_'.$this->randomKey(1) ;

		$unique = FALSE ;

		while( !$unique )
		{
			$file = $this->uploadPath().'/'.$name.'.'.$this->source()->extension() ;

			if( file_exists( $file ) )
			{
				$name .=  $this->randomKey(1);
			}
			else
			{
				$unique = TRUE;
			}
		}

		return $name;
	}


	public function randomKey( $length = 12, $charStrength = 2 )
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

	public function uploadDirectory()
	{
		return $this->_upload_directory;
	}

	public function uploadPath()
	{
		return $this->getApp()->publicRoot().'/'.$this->uploadDirectory().'/'.$this->dateDirectory();
	}

	public function dateDirectory()
	{
		return $this->_date_directory;
	}

	public function pathRelativeToUploadDirectory()
	{
		return $this->dateDirectory().'/'.$this->fileName() ;
	}

	public function pathRelativeToPublicRoot()
	{
		return $this->uploadDirectory().'/'.$this->dateDirectory().'/'.$this->fileName() ;
	}


	public function fileName()
	{
		return $this->name().'.'.$this->source()->extension();
	}


}
