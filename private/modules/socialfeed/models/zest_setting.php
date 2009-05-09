<?php defined('SYSPATH') or die('No direct script access.');

class Zest_Setting_Model extends Auth_User_Model {
	
	// This class can be replaced or extended


	public function unique_key($id)
	{
		if ( ! empty($id) AND is_string($id) AND ! ctype_digit($id))
		{
			return 'variable';
		}

		return parent::unique_key($id);
	}


} // End User Model