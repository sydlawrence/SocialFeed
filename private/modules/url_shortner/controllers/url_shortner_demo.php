<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Contains examples of various Kohana library examples. You can access these
 * samples in your own installation of Kohana by going to ROOT_URL/examples.
 * This controller should NOT be used in production. It is for demonstration
 * purposes only!
 *
 * $Id: examples.php 3318 2008-08-09 00:53:59Z Shadowhand $
 *
 * @package    Core
 * @author     Kohana Team
 * @copyright  (c) 2007-2008 Kohana Team
 * @license    http://kohanaphp.com/license.html
 */
class url_shortner_demo_Controller extends Controller {

	const ALLOW_PRODUCTION = FALSE;

	public $shortner;

	// Set the name of the template to use
	public function __construct() {
		parent::__construct();
		$this->shortner = Url_Shortner::factory();
	} 

	/**
	 * Displays a list of available examples
	 */
	public function index()
	{
		$this->shorten();	
	}
	
	public function shorten() {
		echo $text = "Hello this is a test http://www.google.com and This is a test http://zest.marmdevelopment.co.uk/news/39/this+is+a+test, has it worked?";
		echo '<br/>';
		echo $text = $this->shortner->string_shorten($text);	
	}
	
	public function expand() {
		echo $text = "Hello this is a test http://bit.ly/mwTOV and http://bit.ly/YV49, has it worked?";
		echo '<br/>';
		echo $text = $this->shortner->string_expand($text);	
	}
	
	public function stats() {
		echo $url = 'http://bit.ly/YV49';
		echo '<br/>';
		$data = $this->shortner->get_stats($url);
		print_r($data->results);
	}
	
	public function info() {
		echo $url = 'http://bit.ly/YV49';
		echo '<br/>';
		$data = $this->shortner->get_info($url);
		print_r($data->results);
	}
	
	
	
	
	
} // End Examples
