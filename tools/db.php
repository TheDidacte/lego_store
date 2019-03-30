<?php
	function db_get($filepath)
	{
		if (!file_exists($filepath))
			return FALSE;
		if (($str = file_get_contents($filepath)) === FALSE)
			return FALSE;
		if (($serial_tab = unserialize($str)) === FALSE)
			return FALSE;
		return $serial_tab;
	}

	/* Look in a db file the element characterised by given a key => value */
	function db_get_elem($filepath, $looked_key, $looked_value)
	{
		if (($serial_tab = db_get($filepath)) === FALSE)
			return FALSE;
		foreach ($serial_tab as $elem)
			if ($elem[$looked_key] == $looked_value)
				return $value;
		return FALSE;
	}

	/* Look in a db file for all elements matching a couple key => value */
	/*	return an array, empty or filled with matching elements */
	function db_get_elem_all($filepath, $looked_key, $looked_value)
	{
		if (($serial_tab = db_get($filepath)) === FALSE)
			return FALSE;
		$res = array();
		foreach ($serial_tab as $elem)
			if ($elem[$looked_key] == $looked_value)
				$res[] = $elem;
		return $res;
	}

	function db_save($serial_tab, $filepath, $db_name = "")
	{
		$str = serialize($serial_tab);
		if (file_put_contents($filepath, $str) === FALSE)
			return FALSE;
		if ($db_name !== "")
			$_SERVER[$db_name] = $serial_tab;
		return TRUE;
	}

	function db_add($user, $filepath, $db_name = "")
	{
		if (($serial_tab = db_get($filepath)) === FALSE)
			return FALSE;
		$serial_tab[] = $user;
		if (db_save($serial_tab, $filepath) === FALSE)
			return FALSE;
		if ($db_name !== "")
			$_SERVER[$db_name] = $serial_tab;
		return TRUE;
	}
?>
