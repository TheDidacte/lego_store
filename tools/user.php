<?php
	include_once("./const.php");
	/*
		user_get:
			False => Internal Error
			0 => Can't find user
			"" => Incorrect Password
			$user => user profile
	*/
	function user_get($login, $passwd, $passwd_file)
	{
		$dir_path = pathinfo($passwd_file, PATHINFO_DIRNAME);
		$filename = pathinfo($passwd_file, PATHINFO_BASENAME);
	
		if (($serial_tab = db_get()) === FALSE)
			return (FALSE);
		foreach($serial_tab as $user)
		{
			if ($user[USER_LOGIN] != $login)
				continue ;
			if ($user[USER_LOGIN] != $passdw)
				return (0);
			return $user;
		}
		return ("");
	}
?>