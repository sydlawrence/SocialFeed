<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * @package  Zest
 *
 * This is the main sections that they have access to
 */
$config['admin.main']['Media'] = 'admin/media';
$config['admin.main']['Profiles'] = 'admin/profiles';
$config['admin.main']['Feeds'] = 'admin/feeds';
$config['admin.main']['Pages'] = 'admin/pages';


/**
 * Enable or disable directory creation.
 */
$config['admin.admin'] = array
		(
			'Users'     	=> 'admin/users',
			'Admin' 		=> 'admin/administrator',
		);

$config['zest.modules'] = array(
	"bitly",
);

/**
 * @package  Zest
 *
 * This is the main display options for a feedpost
 */
$config['feedpost.full'] = array
		(
			"date_format" => 'D jS M Y',
			"image" => array(250,250),
			"image_class" => "hey",
			"template" => 'feedpost',
		);

/**
 * This is the display options for a feedpost summary
 */
$config['feedpost.summary'] = array
		(
			"date_format" => 'd/m/y',
			"image" => array(25,25),
			"image_class" => "hey",
			"template" => 'feedpost_summary',
			"word_limit" => 2,
			
		);
		
/**
 * This is the display options for a feedpost summary
 */
$config['feed.summary'] = array
		(
			"per_page" => 5,
			"pagination" => 'digg',
			"template" => 'feed',
		);

$config['comment'] = array(
			"date_format" => 'D jS M Y',
			"image" => array(50,50),
			"html" => '{AVATAR}{DATE} by {AUTHOR}<br/>{TEXT}<div class="spacer">&nbsp;</div>',
			"default_image" => 'identicon',
			"template" => 'comment',
		);

