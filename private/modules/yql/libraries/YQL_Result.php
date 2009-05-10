<?php defined('SYSPATH') or die('No direct script access.');

/**
 * YQL_Result contains a single result record from a YQL query, usually
 * created by the YQL_Iterator
 *
 * @package  YQL
 * @author   Sam Clark
 */
class YQL_Result_Core {

	/**
	 * The result object
	 *
	 * @var   array
	 */
	protected $object;

	/**
	 * Constructor, just assigns the data array to the object
	 *
	 * @param   array        data 
	 * @author  Sam Clark
	 * @access  public
	 */
	public function __construct(array $data)
	{
		$this->object = $data;
	}

	/**
	 * Magic method to access properties of this object
	 *
	 * @param   string       key
	 * @return  mixed
	 * @author  Sam Clark
	 * @access  public
	 */
	public function __get($key)
	{
		// Return the index of the object
		return $this->object[$key];
	}

	/**
	 * Return this YQL_Result as an array.
	 * Using the __get() method to ensure any
	 * transformations (from extensions) are
	 * processed before output
	 *
	 * @return  array
	 * @author  Sam Clark
	 */
	public function as_array()
	{
		// Array
		$array = array();

		// Foreach key/value pair in the array
		foreach ($this->object as $key => $value)
			$array[$key] => $this->$value;

		return $array;
	}
}
