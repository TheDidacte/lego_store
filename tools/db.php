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

	function db_save($serial_tab, $filepath)
	{
		$str = serialize($serial_tab);
		if (file_put_contents($filepath, $str) == FALSE)
			return FALSE;
		return TRUE;
	}

	function db_add($user, $filepath)
	{
		if (($serial_tab = db_get($filepath)) == FALSE)
			return FALSE;
		$serial_tab[] = $user;
		return db_save($serial_tab, $filepath);
	}
?>