<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * @package  Core
 *
 * Sets the default route to "welcome"
 */
$config['_default'] = 'site';

$config['image/(.+)'] = 'zest/image/$1';

$config['assets/(.+)'] = 'assets/$1';

$config['admin'] = 'zest_admin';

$config['url_shortner_demo'] = 'url_shortner_demo';
$config['url_shortner_demo/(.+)'] = 'url_shortner_demo/$1';

$config['admin/(.+)'] = 'zest_admin/$1';

$config['rss/(.+)'] = 'zest/rss/$1';

$config['sessions/(.+)'] = 'sessions/$1';

$config['sitemap.xml'] = 'zest/sitemap/xml';

$config['favicon.ico'] = 'favicon.ico';

$config['search'] = 'search';

$config['(.*)'] = 'site/$1';