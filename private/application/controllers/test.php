<?php defined('SYSPATH') or die('No direct script access.');

class Test_Controller extends Controller {

	public function index()
	{
//		$yql = YQL::factory();

		$result = Curl::pull('http://query.yahooapis.com/v1/public/yql?q=select%20description%20from%20rss%20where%20url%3D%27http%3A%2F%2Fsam.clark.name%2Frss%2F%27&format=xml');

		$xml = simplexml_load_string($result);

		var_dump($xml);


	}

} // End