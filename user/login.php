<?php
	/*
	Return Value:
		FALSE => internal Error
		1 => Invalid couple login / passwd
		2 => Authentification successfull
	*/
	function logIn($passwd_file)
	{
		include ("./tools/auth.php");
		include ("./tools/user.php");

		if ($_POST[login] == "" || $_POST[passwd] == "")
			return FALSE;

		if (session_start() == FALSE)
			return FALSE;

		if (($user = auth($_POST[login], $_POST[passwd], $passwd_file)) === FALSE)
			return (1);
		else
		{
			$_SESSION[user] = array();
			foreach ($user as $key => $value)
				$_SESSION[user][$key] = $value;
			foreach ($_SESSION[user] as $key => $value)
				echo $key.": ".$value."<br>";
			return (2);
		}
	}
?>