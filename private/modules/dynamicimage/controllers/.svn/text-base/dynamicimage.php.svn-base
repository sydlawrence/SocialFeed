<?php defined('SYSPATH') or die('No direct script access.');
/**
 *
 * $Id$
 *
 * @package    DynamicImage
 * @author     Polaris Digital
 * @copyright  (c) 2008 Polaris Digital
 * @license    GNU Public Licence v3
 */
class DynamicImage_Controller extends MukuruController_Core {

	public function index()
	{
		if( $this->input->get('file') )
		{
			$image_settings = array
				(
					'filename' 				=> $this->input->get('file'),
					'width'	  				=> $this->input->get('width') ? $this->input->get('width') : FALSE,
					'height'   				=> $this->input->get('height') ? $this->input->get('height') : FALSE,
					'maintain_ratio' 		=> $this->input->get('mr') ? $this->input->get('mr') : FALSE,
					'format'				=> $this->input->get('format') ? $this->input->get('format') : FALSE,
					'maintain_transparency'	=> $this->input->get('maintain_transparency') ? $this->input->get('maintain_transparency') : FALSE,
					'background'			=> $this->input->get('bk') ? DynamicImage::hexrgb( $this->input->get('bk'), FALSE ) : array( 255,255,255 )
				);
							
			$myimage = new DynamicImage( $image_settings );					
		}
		else
		{
			throw new Kohana_Exception('An image file in GIF, JPG or PNG format is required');
		}
	}
	
}