<?php defined('SYSPATH') or die('No direct script access.');
/**
 * @package  DynamicImage
 *
 * Controls settings for the DynamicImage library output
 */
$config['compression'] = array						// Compression quality
(
	'png' 	=> 0,									// 0 highest quality, 9 lowest quality (use 0 for almost all circumstances)
	'jpeg'	=> 90,									// 100 highest quality, 0 lowest quality (70 - 80 is best)
	'gif'	=> FALSE								// No compression for gif
);
$config['filename']					= FALSE;		// Input image file relative to root (must be GIF, JPG or PNG currently)
$config['width']					= FALSE;		// Default output width
$config['height']					= FALSE;		// Default output height
$config['maintain_ratio']			= 'width';		// Ratio maintain, width, height or FALSE
$config['format']					= FALSE;		// Default output format. jpg, png or gif or FALSE for retain input format
$config['maintain_transparency']	= TRUE;			// Keep GIF or PNG transparency
$config['background']				= array( 255, 255, 255 );	// Set a background colour if no transparency or JPG output (RED, BLUE, GREEN)
