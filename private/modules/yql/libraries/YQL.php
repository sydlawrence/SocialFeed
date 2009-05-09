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

	public function query($statment)
	{
		
	}

	protected function query()
	{
		
	}
} // End YQL_Core


/**
 * YQL result object is passed back from all YQL queries
 *
 * @package  YQL
 * @author   Sam Clark
 */
class YQL_Result implements Iterator, ArrayAccess, Countable
{
	/**
	 * Data from the YQL result
	 *
	 * @var   array
	 */
	protected $results;

	/**
	 * The diagnostic information form the request
	 *
	 * @var   array
	 */
	protected $diagnostics;

	/**
	 * The current position of the iterator
	 * Required by Iterator interface
	 *
	 * @var   int
	 */
	protected $current_row;

	/**
	 * The count of the results
	 * Required by Countable interface
	 *
	 * @var   int
	 */
	protected $count;

	/**
	 * YQL Result constructor
	 *
	 * @param   Curl         data  the curl object used to query yql
	 * @return  void
	 * @author  Sam Clark
	 * @access  public
	 * @throws  Kohana_User_Exception
	 **/
	public function __construct(Curl $data)
	{
		if ( ! $data->executed)
			throw new Kohana_User_Exception('YQL_Result::__construct()', 'The cURL object supplied has not executed!');

		// Set the key to the current index
		$this->key = 0;

		// Parse the input data form the YQL query
		$this->parse($data);

		return;
	}

	/**
	 * Detects the parse method from the response
	 *
	 * @param   Curl         data 
	 * @return  array
	 * @return  void
	 * @author  Sam Clark
	 * @access  protected
	 */
	protected function parse(Curl $data)
	{
		if (preg_match('/application\/json/', $data->header('Content-Type')))
			$this->parse_json($data);
		elseif (preg_match('/text\/xml/', $data->header('Content-Type'))
			$this->parse_xml($data);

		return NULL;
	}

	protected function parse_json(Curl $data)
	{
		
	}

	protected function parse_xml(Curl $data)
	{
		// Load the XML data in SimpleXMLElement
		$xml = simplexml_load_string($data->result, 'SimpleXMLElement');

		// Get all the results
		$results = $xml->xpath('//results');
		$diagnostics = $xml->xpath('//diagnostics');

		// Create the result array
		$data = array();

		// Foreach result
		foreach ($results as $result)
		{
			$data[$result->getName()] = $this->parse_xml_children($result);
		}

		// Set the count
		$this->count = count($data);

		return;
	}

	protected function parse_xml_children($result)
	{
		if ($result->children())
		{
			
		}

		return $result
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
		// If we're dealing with XML
		if ($result instanceof SimpleXMLElement)
		{
			// Try accessing the items
			try
			{
				// If no exception was thrown, this is most likely an RSS feed
				$test_for_item = $result->item;
				return TRUE;
			}
			catch (Exception $e)
			{
				// If an exception was thrown, this is not CSS
				return FALSE;
			}
		}
		// We're dealing with JSON
		elseif (is_array($result))
			return array_key_exists('item', $result);

		// If none of the above, throw wobbly
		throw new Kohana_User_Exception('YQL_Result::detect_rss()', 'The result set passed was not recognised');
	}

	/**
	 * Return the count of the results
	 * Required by Countable interface
	 *
	 * @return  int
	 * @author  Sam Clark
	 * @access  public
	 */
	public function count()
	{
		return $this->count;
	}

	/**
	 * Returns the item at the current index
	 * Required by the Iterator interface
	 *
	 * @return  mixed
	 * @author  Sam Clark
	 * @access  public
	 */
	public function current()
	{
		return $this->offsetGet($this->current_row);
	}

	/**
	 * Returns the current key of the results
	 * Required by the Iterator interface
	 *
	 * @return  int
	 * @author  Sam Clark
	 * @access  public
	 */
	public function key()
	{
		return $this->current_row;
	}

	/**
	 * Moves the current row pointer on by one
	 * Required by the Iterator interface
	 *
	 * @return  self
	 * @author  Sam Clark
	 * @access  public
	 */
	public function next()
	{
		++$this->current_row;
		return $this;
	}

	/**
	 * Rewinds the current row pointer to beginning
	 * Required by the Iterator interface
	 *
	 * @return  self
	 * @author  Sam Clark
	 * @access  public
	 */
	public function rewind()
	{
		$this->current_row = 0;
		return $this;
	}

	/**
	 * Checks the current row pointer is valid
	 * Required by the Iterator interface
	 *
	 * @return  bool
	 * @author  Sam Clark
	 * @access  public
	 */
	public function valid()
	{
		return $this->offsetExists($this->current_row);
	}

	/**
	 * Tests that the requested offset exists
	 * Required by the ArrayAccess interface
	 *
	 * @param   mixed       key  the key to test
	 * @return  boolean
	 * @author  Sam Clark
	 * @access  public
	 */
	public function offsetExists($key)
	{
		return array_key_exists($key, $this->results);
	}

	/**
	 * Returns requested offset by key
	 * Required by the ArrayAccess interface
	 *
	 * @param   mixed        key
	 * @return  mixed
	 * @return  void
	 * @author  Sam Clark
	 */
	public function offsetGet($key)
	{
		if ($this->offsetExists($key))
			return $this->results[$key];

		return NULL;
	}

	/**
	 * Not available in this result set
	 * Required by ArrayAccess interface
	 *
	 * @param   string       key 
	 * @param   mixed        value 
	 * @return  void
	 * @author  Sam Clark
	 * @access  public
	 * @throws  Kohana_User_Exception
	 */
	public function offsetSet($key, $value)
	{
		throw new Kohana_User_Exception('YQL_Result::offsetSet()', 'You are trying to set a value to a result set!');
	}

	/**
	 * Not available in this result set
	 * Required by ArrayAccess interface
	 *
	 * @param   string       key 
	 * @return  void
	 * @author  Sam Clark
	 * @access  public
	 * @throws  Kohana_User_Exception
	 */
	public function offsetUnset($key)
	{
		throw new Kohana_User_Exception('YQL_Result::offsetUnset()', 'You are trying to set a value to a result set!');
	}
} // End YQL_Result