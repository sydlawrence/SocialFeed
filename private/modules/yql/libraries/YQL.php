<?php defined('SYSPATH') or die('No direct script access.');
/**
 * YQL core library including query builder and result objects
 * 
 * More docs to follow
 *
 * @package  YQL
 * @author   Sam Clark
 */
class YQL_Core {

	/**
	 * Configuration for YQL
	 *
	 * @var   array
	 */
	protected $config;

	/**
	 * The cURL library used for comms
	 *
	 * @var   Curl
	 */
	protected $curl;

	/**
	 * Cache library
	 *
	 * @var   Cache
	 */
	protected $cache;

	/**
	 * The diagnostics returned from YQL
	 *
	 * @var   array
	 */
	protected $diagnostics;

	/**
	 * Where clauses
	 *
	 * @var   array
	 */
	protected $where = array();

	/**
	 * Factory method for creating new YQL objects
	 *
	 * @param   array        config 
	 * @return  YQL
	 * @author  Sam Clark
	 */
	public function factory(array $config = array())
	{
		return new YQL($config);
	}

	/**
	 * Constructor to setup this model
	 *
	 * @param   array        config
	 * @return  void
	 * @author  Sam Clark
	 * @access  public
	 */
	public function __construct(array $config = array())
	{
		// Setup the configuration
		$config += Kohana::config('yql');
		$this->config = $config;

		// Load the cache library if required
		if ($this->config['cache'])
			$this->cache = Cache::instance();

		// Load the curl library
		$this->curl = Curl::factory(array(CURLOPT_POST => FALSE));

		return;
	}

	
	public function show($env = FALSE)
	{
		
	}

	public function select($select = '*')
	{
		
	}

	public function in($in_statement)
	{
		
		return $this;
	}

	public function where($where)
	{
		
		return $this;
	}

	public function query($statement)
	{
		
	}

	public function __toString()
	{
		// Return just the YQL of this object
		return $this->render_query(TRUE);
	}

	public function render_query($yql_only = FALSE)
	{
		
	}

	/**
	 * Detects the parse method from the response
	 *
	 * @param   string         data 
	 * @return  array
	 * @return  void
	 * @author  Sam Clark
	 * @access  protected
	 */
	protected function parse($data)
	{
		if (preg_match('/text\/xml/', $this->curl->header('Content-Type'))
			throw new Kohana_User_Exception('YQL_Result::parse()', 'XML is not currently supported!');

		// Decode the result, and get the query array
		$result = json_decode($data, TRUE);
		$result = $result['query'];

		// Put the result array into the results property, detecting whether this is CSS or not
		$results = $this->detect_rss($result['results']) ? $result['results']['item'] : $this->results = $result['results'];

		return new YQL_Result_Iterator
	}

	/**
	 * Detects an RSS feed result, which has a standard structure.
	 * This is a little hacky, but works
	 *
	 * @param   mixed        result 
	 * @return  boolean
	 * @author  Sam Clark
	 * @access  protected
	 * @throws  Kohana_User_Exception
	 */
 	protected function detect_rss($result)
	{
		return array_key_exists('item', $result);
	}

} // End YQL_Core