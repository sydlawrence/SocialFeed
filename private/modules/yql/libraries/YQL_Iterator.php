<?php defined('SYSPATH') or die('No direct script access.');

/**
 * YQL result object is passed back from all YQL queries
 *
 * @package  YQL
 * @author   Sam Clark
 */
class YQL_Iterator_Core implements Iterator, ArrayAccess, Countable
{
	/**
	 * Data from the YQL result
	 *
	 * @var   array
	 */
	protected $result;

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
	public function __construct(array $data)
	{
		// Set the key to the current index
		$this->key = 0;

		// Parse the input data form the YQL query
		$this->result = $data;

		// Get the total number of records
		$this->count = count($this->records);

		return;
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
		return ($key <= $this->count);
	}

	/**
	 * Returns requested offset by key
	 * Required by the ArrayAccess interface
	 *
	 * @param   mixed        key
	 * @return  YQL_Result
	 * @return  void
	 * @author  Sam Clark
	 * @access  public
	 */
	public function offsetGet($key)
	{
		if ($this->offsetExists($key))
			return new YQL_Result($this->result[$key]);

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

	/**
	 * Returns the YQL_Iterator as an array, optionally
	 * flattening the YQL_Result objects as well
	 *
	 * @param string $flatten_all 
	 * @return void
	 * @author Sam Clark
	 */
	public function as_array($flatten_all = FALSE)
	{
		// Create the output array
		$array = array();

		foreach ($this->result as $key => $value)
			$array[$key] = new YQL_Result($value);

		// If flatten all is true, flattern the YQL_Result objects too
		if ($flatten_all)
		{
			foreach ($array as $key => & $value)
				$value = $value->as_array();
		}

		// Return the array
		return $array;
	}
} // End YQL_Result