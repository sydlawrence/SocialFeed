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
	 * API points of access
	 */
	const YQL_PUBLIC_API = 'http://query.yahooapis.com/v1/yql?q=';
	const YQL_PRIVATE_API = 'http://query.yahooapis.com/v1/public/yql?q=';

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
	 * Select clauses
	 *
	 * @var   array
	 */
	protected $select = array();

	/**
	 * From clauses (this should be singular)
	 *
	 * @var   string
	 */
	protected $from;

	/**
	 * Where clauses
	 *
	 * @var   array
	 */
	protected $where = array();

	/**
	 * Limit clauses
	 *
	 * @var   array
	 */
	protected $limit = array();

	/**
	 * The rendered query to be sent to YQL
	 *
	 * @var   string
	 */
	protected $query;

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
	 * Constructor to setup this model, apply the configuration,
	 * setup Curl and add Events
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

		// Setup the reload event to ensure this library is
		// ready to be used again
		Event::add('yql.post_execute', array($this, 'clear_queries'));
		Event::add('yql.post_execute', array($this, 'reload_curl'));

		return;
	}

	/**
	 * Retrieves a list of Yahoo! supported tables
	 *
	 * @return  YQL_Iterator
	 * @author  Sam Clark
	 * @access  public
	 */
	public function show()
	{
		// Clear existing queries
		$this->clear_queries();
		
		// Set the select statement
		$this->select = array('SHOW' => 'tables');

		// Execute the query

	}

	/**
	 * Retrieves information about predefinied Yahoo! tables. This
	 * will not work for non-Yahoo! or non-Community tables, such
	 * as personal blogs or other unaffiliated sites.
	 *
	 * @param   string       table
	 * @return  YQL_Iterator
	 * @author  Sam Clark
	 * @access  public
	 */
	public function desc($table)
	{
		// Clear existing queries
		$this->clear_queries();

		// If the url is valid
		if (valid::url($table))
			throw new Kohana_User_Exception('YQL::desc()', 'DESC only allows use of Yahoo! pre-registered tables. See http://developer.yahoo.com/yql/ for more information.');

		// Set the desc statement
		$this->select = array('DESC' => $table);

		// Execute the query

	}

	public function select($select = '*')
	{
		
		return $this;
	}


	public function from($from)
	{
		
		return $this;
	}

	public function where($key, $value = NULL)
	{
		
		return $this;
	}

	public function orwhere($key, $value = NULL)
	{
		
		return $this;
	}

	public function in($field, $values)
	{
		
		return $this;
	}

	public function like($field, $match = '')
	{
		
		return $this;
	}

	public function limit($limit, $offset = FALSE)
	{
		
		return $this;
	}

	public function query($statement = FALSE)
	{
		if ( ! $statement AND is_string($statement))
			$this->query = $this->render_query($statement);

		// Setup the URL and execute
		$this->curl->setopt(CURLOPT_URL, $this->query)->exec();

		// Return the YQL_Iterator object
		return $this->parse($this->curl->result());
	}

	
	public function __toString()
	{
		// Return just the YQL of this object
		return $this->render_query(TRUE);
	}

	/**
	 * Renders the query into clean YQL format
	 *
	 * @param   boolean      yql_exclusive  only return the Yahoo! Query Language statement
	 * @param   string       query  a single YQL statement to pass straight to the API
	 * @return  string
	 * @author  Sam Clark
	 * @access  protected
	 */
	protected function render_query($yql_exclusive = FALSE, $query = FALSE)
	{
		// Grab the configured the Yahoo! Query Languary API
		$api = $this->config['api'];
		$ext = '&format=json';

		// If there has been a query supplied
		if ($query)
		{
			// Assign the query to the library
			$this->query = $query;

			// Return the correctly formatted query based on yql_exclusive
			return $yql_exclusive ? $this->query : $api.rawurlencode($this->query).$ext;
		}

		// Setup the empty statement
		$statement = '';

		/* SELECT */

		// If this is a SHOW or DESC query
		if (array_key_exists('SHOW', $this->select) OR array_key_exists('DESC', $this->select))
		{
			// Take the first key and value
			$statement = key($this->select).' '.current($this->select);

			// Apply the statement to the query property
			$this->query = $statement;

			// Return the correctly formatted version, depending on $yql_exclusive
			return $yql_exclusive ? $this->query : $api.rawurlencode($this->query).$ext;
		}
		else
			// Otherwise create the select statements
			$statement = 'SELECT '.implode(',', $this->select).' ';

		/* FROM */

		if ($this->from === NULL)
			throw new Kohana_User_Exception('YQL::render_query()', 'There must be a FROM statement in the YQL query');

		// Set the FROM status
		$statement .= 'FROM '.$this->from.' ';

		/* WHERE */
	}

	/**
	 * Executes the query and returns 
	 *
	 * @return YQL_Iterator
	 * @author Sam Clark
	 */
	protected function exec()
	{
		// If the query hasn't been rendered, render it
		if ($this->query === NULL)
			$this->render_query();

		// Execute the query
		$data = $this->curl
			->setopt(CURLOPT_URL, $this->query)
			->exec()
			->result();

		return $this->parse($data);
	}

	/**
	 * Clears the queries and resets the library
	 *
	 * @return  void
	 * @author  Sam Clark
	 * @access  protected
	 */
	protected function clear_queries()
	{
		// Setup the properties to clear
		$properties = array('select', 'where', 'from', 'limit');

		// Reset the properties
		foreach ($properties as $property)
			$this->$property = array();

		// Clear the query string
		$this->query = NULL;

		return;
	}

	/**
	 * Reloads the cURL library after execution
	 *
	 * @return  void
	 * @author  Sam Clark
	 * @access  protected
	 */
	protected function reload_curl()
	{
		// If there is no cURL library or cURL has executed
		if ($this->curl === NULL OR $this->curl->executed)
			$this->curl = Curl::factory(array(CURLOPT_POST => FALSE));

		return;
	}

	/**
	 * Detects the parse method from the response
	 *
	 * @param   string         data 
	 * @return  YQL_Iterator
	 * @return  YQL_Iterator
	 * @author  Sam Clark
	 * @access  protected
	 * @throws  Kohana_User_Error
	 */
	protected function parse($data)
	{
		if (preg_match('/text\/xml/', $this->curl->header('Content-Type'))
			throw new Kohana_User_Exception('YQL::parse()', 'XML is not currently supported!');

		// Decode the result, and get the query array
		$result = json_decode($data, TRUE);

		// Detect errors and throw exception if present
		if (array_key_exists('error', $data))
			throw new Kohana_User_Exception('YQL::parse()', $data['error']['description'])

		// Set the result to the query response
		$result = $result['query'];

		if (array_key_exists('table', $result['results']))
			return new YQL_Result($result['results']['table'])
	}

} // End YQL_Core