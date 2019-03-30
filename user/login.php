<?php
	include_once ("../tools/auth.php");
	include_once ("../tools/user.php");
	include_once ("../tools/const.php");

	/*
	Return Value:
		FALSE => internal Error
		1 => Invalid couple login / passwd
		2 => Authentification successfull
	*/
	function logIn($passwd_file)
	{
		if ($_POST[USER_LOGIN] == "" || $_POST[USER_PASSWORD] == "")
			return FALSE;

		if (session_start() == FALSE)
			return FALSE;

		if (($user = auth($_POST[USER_LOGIN], $_POST[USER_PASSWORD], $passwd_file)) === FALSE)
			return (1);
		else
		{
			$_SESSION[USER] = array();
			foreach ($user as $key => $value)
				$_SESSION[USER][$key] = $value;
			foreach ($_SESSION[USER] as $key => $value)
				echo $key.": ".$value."<br>";
			return (2);
		}
	}
?>