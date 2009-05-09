<?php defined('SYSPATH') or die('No direct script access.');

// The API URI's for accessing YQL
$config['api'] = array
(
	'public'    => 'http://query.yahooapis.com/v1/yql?q=',
	'private'   => 'http://query.yahooapis.com/v1/public/yql?q=',
);

// Cache lifetime in seconds, if FALSE no caching
$config['cache'] = FALSE;

// The response format you want from YQL (for now leave this as 'json', 'xml' will come soon)
$config['format'] = 'json';