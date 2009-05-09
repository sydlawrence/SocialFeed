<?php
/**
 * Curl library. A Kohana class wrapper for the php CURL functions
 *
 * @package Curl
 * @author Sam Clark
 * @copyright 2008 Polaris Digital http://polaris-digital.com
 * @license GNU PUBLIC LICENSE version 3 http://www.gnu.org/licenses/gpl-3.0.html
 */
class Curl_Core {

	// Config
	protected $config;

	// Options
	protected $options;

	// Cache
	protected $cache;

	// Connection
	protected $connection;
	
	// Status
	protected $executed;
	protected $cached_result;

	// Header
	protected $header = array();

	// Result
	protected $result;

	// Version information
	protected $version;

	// Information about transfer
	protected $error;
	protected $info = array();

	/**
	 * Factory pattern for chaining
	 *
	 * @param array $config 
	 * @param string $url 
	 * @return void
	 * @author Sam Clark
	 */
	public function factory(array $config = array(), $url = NULL)
	{
		return new Curl($config, $url);
	}

	/**
	 * __contruct()
	 *
	 * @param   array        config  the configuration array
	 * @param   string       url  the url to use for this Curl request
	 * @author  Sam Clark
	 */
	public function __construct(array $config = array(), $url = NULL)
	{
		if ( ! function_exists('curl_exec'))
			throw new Kohana_User_Exception( 'Curl.__construct()', 'Looks like cURL is not available on this server' );

		$config += Kohana::config('curl');
		$this->config = $config;

		$this->_init($config, $url);
		return;
	}

	/**
	 * Quickly pulls data from a URI. This only works with GET requests but
	 * can handle HTTP Basic Auth
	 *
	 * @param   string       uri  the url to pull from
	 * @param   string       username  the username for the service [Optional]
	 * @param   string       password  the password for the user [Optional]
	 * @return  string
	 * @throws  Kohana_User_Exception
	 * @author  Sam Clark
	 * @access  public
	 * @static
	 **/
	static public function pull($uri, $username = FALSE, $password = FALSE)
	{
		if ( ! valid::url($uri))
			throw new Kohana_User_Exception('Curl::pull()', 'The URL : '.$uri.' is not a valid resource');

		// Initiate a curl session based on the URL supplied
		$curl = Curl::factory(array(CURLOPT_POST => FALSE), $url);

		// If a username/password is supplied
		if ($username AND $password)
		{
			// Add the HTTP Basic Auth headers
			$curl->setopt_array(array(CURLOPT_USERPWD => $username.':'.$password));
		}

		// Launch the request and return the result
		return $curl->exec()->result();
	}

	/**
	 * Initialise the curl request
	 *
	 * @return boolean
	 * @author Sam Clark
	 */
	protected function _init(array $config, $url)
	{
		if( ! $this->connection = curl_init())
			throw new Kohana_User_Exception( 'Curl._init()', 'cURL failed to initialise');

		// Options
		$this->options = & $this->config['options'];

		if ($url !== NULL)
			$this->options[CURLOPT_URL] = $url;

		// Version information
		$this->version = curl_version();

		// Set this executed to FALSE;
		$this->executed = FALSE;

		// Load cache if required
		if ($this->config['cache'])
			$this->cache = Cache::instance();

		return;
	}

	/**
	 * __get() method for returning config options, curl exec information or version information
	 *
	 * @param   string $key 
	 * @return  void
	 * @author  Sam Clark
	 */
	public function __get($key)
	{
		if ($this->executed AND array_key_exists($key, $this->info))
			return $this->info[$key];

		if (array_key_exists($key, $this->options))
			return $this->options[$key];

		if (array_key_exists($key, $this->version))
			return $this->version[$key];

		if (in_array($key, array('executed', 'cached_result')))
			return $this->$key;
	}

	/**
	 * Sets an array of options, must use curl_setopt consts
	 *
	 * @param   array        options  the array of key/value pairs
	 * @return  Curl
	 * @author  Sam Clark
	 */
	public function setopt_array(array $options)
	{
		$this->options = $options + $this->options;
		return $this;
	}

	/**
	 * Set a single option, must use curl_setopt consts
	 *
	 * @param   const          option  the option to set
	 * @param   string         value  the value to set to the option
	 * @return  Curl
	 * @author  Sam Clark
	 */
	public function setopt($option, $value)
	{
		$this->options[$option] = $value;
		return $this;
	}

	/**
	 * Execute the CURL request based using class setup
	 *
	 * @return  Curl
	 * @author  Sam Clark
	 */
	public function exec()
	{
		// Set the header to be processed by the parser and turn off header
		curl_setopt($this->connection, CURLOPT_HEADERFUNCTION, array($this, 'parse_header'));
		curl_setopt($this->connection, CURLOPT_HEADER, FALSE);

		//Some servers (like Lighttpd) will not process the curl request without this header and will return error code 417 instead.
		//Apache does not need it, but it is safe to use it there as well.
		curl_setopt($this->connection, CURLOPT_HTTPHEADER, array("Expect:"));

		if ($this->config['cache'] AND ($this->cache instanceof Cache))
		{
			$cached = $this->load_cache();
		}

		if ( ! $this->executed)
		{
			if ( ! curl_setopt_array($this->connection, $this->options))
				throw new Kohana_User_Exception('Curl.exec()', 'There was a problem setting the curl_setopt_array');

			$this->result = curl_exec($this->connection);

//			if (curl_errno($this->connection) !== 0)
//				throw new Kohana_User_Exception('Curl.exec()', curl_error($this->connection));

			$this->info = curl_getinfo($this->connection);

			$this->executed = TRUE;
			$this->cached_result = FALSE;
		}

		if ($this->config['cache'] AND ($this->cache instanceof Cache))
			$this->cache();

		return $this;
	}

	/**
	 * Returns the stored result of the cURL operation
	 *
	 * @return  void
	 * @author  Sam Clark
	 */
	public function result()
	{
		if ($this->executed)
			return $this->result;
		else
			return NULL;
	}

	/**
	 * Provides access to the processed header array
	 *
	 * @param   string       key 
	 * @return  string
	 * @return  void
	 * @author Sam Clark
	 */
	public function header($key = NULL)
	{
		if ($this->executed)
		{
			if ($key === NULL)
				return $this->header;
			elseif (array_key_exists($key, $this->header))
				return $this->header[$key];
		}

		return NULL;
	}

	/**
	 * Clears the cache for Curl library
	 *
	 * @param   bool         all  if TRUE will delete all Curl library caches
	 * @return  Curl
	 * @author  Sam Clark
	 */
	public function clear_cache($all = FALSE)
	{
		if ($this->config['cache'] === FALSE OR ! ($this->cache instanceof Cache))
			throw new Kohana_User_Exception('Curl.clear_cache()', 'Cache not enabled for this instance. Please check your settings.');

		if ($all)
			$this->cache->delete_tag($this->config['cache_tags']);
		else
			$this->cache->delete($this->create_cache_key());

		return $this;
	}

	/**
	 * Load the cache
	 *
	 * @return  bool
	 * @author  Sam Clark
	 */
	protected function load_cache()
	{
		$result = $this->cache->get($this->create_cache_key());

		if ($result === NULL)
			return FALSE;

		$this->info = $result['info'];
		$this->result = $result['result'];

		$this->executed = TRUE;
		$this->cached_result = TRUE;

		return TRUE;
	}

	/**
	 * Caches the current result set, or loads a saved cache if key is supplied
	 *
	 * @return  void
	 * @author  Sam Clark
	 */
	protected function cache()
	{
		if ( ! $this->executed OR $this->result === NULL)
			return;

		if ($this->config['cache'] === FALSE OR ! ($this->cache instanceof Cache))
			throw new Kohana_User_Exception('Curl.cache()', 'Cache not enabled for this instance. Please check your settings.');

		// Store the correct data
		$cache_data = array
		(
			'result'      => $this->result,
			'info'        => $this->info,
		);

		return $this->cache->set($this->create_cache_key(), $cache_data, $this->config['cache_tags'], $this->config['cache']);
	}

	/**
	 * Creates a hash key for caching indentification
	 *
	 * @return  string
	 * @author  Sam Clark
	 */
	protected function create_cache_key()
	{
		return hash($this->config['hash'], serialize($this->options));
	}

	/**
	 * Puts the header response into a stored variable
	 *
	 * @param   Curl         ch 
	 * @param   string       header 
	 * @return  void
	 * @author  Sam Clark
	 */
	protected function parse_header($ch, $header)
	{
		$result = array();

		if (preg_match_all('/(\w[^\s:]*):[ ]*([^\r\n]*(?:\r\n[ \t][^\r\n]*)*)/', $header, $matches))
		{
			foreach ($matches[0] as $key => $value)
				$result[$matches[1][$key]] = $matches[2][$key];
		}

		if ($result)
			$this->header += $result;

		return strlen($header);
	}

	/**
	 * Destroy the curl connection gracefully
	 *
	 * @return  void
	 * @author  Sam Clark
	 */
	public function __destruct()
	{
		curl_close($this->connection);
	}
} // End Curl Library