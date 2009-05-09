<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Dynamic resizing of an image with option to print to screen.
 *
 * @package    DynamicImage
 * @depends	   gd2
 * @author     Sam Clark (Polaris Digital)
 * @copyright  (c) 2008 Polaris Digital
 */

class DynamicImage_Core {

	// Image physical properties	
	private $filename;
	private $filesize;
	private $mime_type;
	private $width;
	private $height;
	
	// GD Object In
	private $gd_image;
	
	// GD Object Out
	private $gd_image_out;
	private $mime_out;
	private $width_out;
	private $height_out;
	
	// Image inspection data
	private $gd_data;
	
	// Maintain transparency
	private $maintain_transparency;
	
	// Background colour for jpg output
	private $background_colour;
	
	// Configuration
	private $config;
	
	/**
	 * 
	 * @return 
	 * @param $config Object[optional]
	 */
	public static function factory( $config = array() )
	{
		return new DynamicImage( $config );
	}
	
	/**
	 * 
	 * @return 
	 * @param $config Object[optional]
	 */
	public static function instance( $config = array() )
	{
		static $instance;
		
		empty( $instance ) and $instance = new DynamicImage( $config );
		
		return $instance;
	}	
	
	public function __construct( $config = array() )
	{
		// Check for GD library before doing anything
		if( extension_loaded('gd') )
		{
			$config += Kohana::config_load('dynamicimage');
			$this->config = $config;
						
			// Check for a filename and check it is a file
			if( $this->config['filename'] && is_file( $this->config['filename'] ) )
			{
				// Set filename
				$this->filename = $this->config['filename'];

				$this->gd_data = getimagesize( $this->filename );
				$this->gd_image_out = FALSE;
				
				// Get filesize
				$this->filesize = filesize( $this->filename );
				
				// Get the Mimetype
				$this->mime_type = $this->gd_data['mime'];
				
				// Get dimensions				
				$this->width = $this->gd_data[0];
				$this->height = $this->gd_data[1];
				
				$this->background_colour = $this->config['background'];
				$this->maintain_transparency = $this->config['maintain_transparency'];
				
				// Setup GD object
				switch( $this->gd_data['mime'] )
				{
					// If image is PNG, load PNG file
					case "image/png" : $this->gd_image = imagecreatefrompng( $this->filename ); break;
					// If image is JPG, load JPG file
					case "image/jpg" : $this->gd_image = imagecreatefromjpeg( $this->filename ); break;
					// If image is GIF, load GIF file
					case "image/gif" : $this->gd_image = imagecreatefromgif( $this->filename ); break;
					// Otherwise image is not supported in this version (more to follow)
					default : throw new Kohana_Exception("DynamicImage.__construct() Filetype {$this->mime_type} not supported yet."); return;
				}
				
				$this->print_image( $this->config['width'], $this->config['height'], $this->config['maintain_ratio'], $this->config['format'] );
			}
			else
			{
				// Otherwise die horribly
				return FALSE;
			}
		}
		else
		{
			// Die informing user of lack of extentions
			throw new Kohana_Exception('GD Library not installed');
			return;
		}
	}
	
	private function print_image( $width = FALSE, $height = FALSE, $maintain_ratio = 'width', $format = FALSE )
	{
		$result = FALSE;
		
		// If gd_image is valid as an gd object
		if( $this->gd_image )
		{
			$this->width_out = $width;
			$this->height_out = $height;
			
			// Setup the output MIME type
			if( $format == 'jpg' || $format == 'jpeg' )
			{
				$this->mime_out = 'image/jpeg';
			}
			elseif( $format == 'gif' )
			{
				$this->mime_out = 'image/gif';
			}
			elseif( $format == 'png' )
			{
				$this->mime_out = 'image/png';
			}
			else
			{
				$this->mime_out = $this->mime_type;
			}
			
						
			if( $this->width_out != FALSE || $this->height_out != FALSE )
			{
				// resize the image
				if( !$this->resize( $this->width_out, $this->height_out, $maintain_ratio ) )
				{
					throw new Kohana_Exception('DynamicImage.resize() There was a problem resizing the image!');			
					return;
				}
			}
			else
			{
				$this->width_out = $this->width;
				$this->height_out = $this->height;
				
				// Otherwise just copy the current image across
				if( !$this->resize( $this->width, $this->height, $maintain_ratio ) )
				{
					throw new Kohana_Exception('DynamicImage.resize() There was a problem resizing the image!');			
					return;
				}								
			}
					
			// Set the header
			header("Content-type: {$this->mime_out}");
			
			// Output in the desired format
			switch( $this->mime_out )
			{
				case 'image/jpeg' : imagejpeg( $this->gd_image_out, null, $this->config['compression']['jpeg'] ); imagedestroy( $this->gd_image_out ); break;
				case 'image/png' : imagepng( $this->gd_image_out, null, $this->config['compression']['png'] ); imagedestroy( $this->gd_image_out ); break;
				case 'image/gif' : imagegif( $this->gd_image_out, null ); imagedestroy( $this->gd_image_out ); break;
			}	
		}
		return;
	}
	
	private function resize( $width = FALSE, $height = FALSE, $maintain_ratio = 'width' )
	{
		$result = FALSE;
		
		// If gd_image is valid and there is a hieght and width set
		if( $this->gd_image )
		{
			if( $maintain_ratio === 'width' )
			{
				// Figure out the width transform ratio
				$transform_ratio = $this->width_out / $this->width;
				// Apply the transform ration to the height
				$this->height_out = round( ( $this->height * $transform_ratio ), 0 );
			}
			elseif( $maintain_ratio === 'height' )
			{
				// Figure out the width transform ratio
				$transform_ratio = $this->height_out / $this->height;
				// Apply the transform ration to the height
				$this->width_out = round( ( $this->width * $transform_ratio ), 0 );				
			}
			
			// Create the output image
			$this->gd_image_out = imagecreatetruecolor( $this->width_out, $this->height_out );

			if( $this->mime_out == 'image/jpeg' || $this->maintain_transparency == FALSE )
			{
				$this->set_bgcolour();
				imagealphablending( $this->gd_image_out, TRUE );
				imagesavealpha( $this->gd_image_out, FALSE );					
			}
			else
			{
				imagealphablending( $this->gd_image_out, FALSE );
				imagesavealpha( $this->gd_image_out, TRUE );
			}

			// Copy image into
			imagecopyresampled( $this->gd_image_out, $this->gd_image, 0, 0, 0, 0, $this->width_out, $this->height_out, $this->width, $this->height );
			
			$result = TRUE;
		}
		return $result;
	}
	
	private function set_bgcolour()
	{
		if( $this->gd_image_out && is_array( $this->background_colour ) && count( $this->background_colour ) == 3 )
		{
			// Ensure the values do not go past the lower and upper limits for true colour
			foreach( $this->background_colour as $key => $val )
			{
				if( $val > 255 )
					$val = 255;
				if( $val < 0 )
					$val = 0;
				
				$this->background_colour[$key] = $val;
			}
			
			// Create the background colour
			$color = imagecolorallocate( $this->gd_image_out , $this->background_colour[0], $this->background_colour[1] , $this->background_colour[2] );

			// Fill the background
			imagefilledrectangle( $this->gd_image_out, 0, 0, ( $this->width_out - 1 ), ( $this->height_out -1 ), $color );
			return;
		}
	}
	
	public static function hexrgb($hexstr, $rgb)
	{
		 $int = hexdec($hexstr);
		 switch($rgb)
		 {
			 case "r": return 0xFF & $int >> 0x10; break;
			 case "g": return 0xFF & ($int >> 0x8); break;
			 case "b": return 0xFF & $int; break;
			 default: return array(
			            0 => 0xFF & $int >> 0x10,
			            1 => 0xFF & ($int >> 0x8),
			            2 => 0xFF & $int
			            ); break;
		}
	}

}
