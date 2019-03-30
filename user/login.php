<?php
	session_start();

	include_once ("../tools/const.php");
	include_once ("../tools/hash.php");
	include_once ("../tools/auth.php");

	/*
	Return Value:
		FALSE => internal Error
		1 => Invalid couple login / passwd
		2 => Authentification successfull
	*/
	function logIn($passwd_file)
	{
		if ($_POST[USER_LOGIN] === "" || $_POST[USER_PASSWORD] === "")
			return FALSE;

		if (($user = auth($_POST[USER_LOGIN], $_POST[USER_PASSWORD], $passwd_file)) === FALSE)
			return (1);
		else
		{
			$_SESSION[USER] = array();
			foreach ($user as $key => $value)
				$_SESSION[USER][$key] = $value;
			return (2);
		}
	}

	$res = logIn("../Datas/users.db");
	if ($res === FALSE)
		echo "Internal error".PHP_EOL;
	else if ($res == 1)
		echo "Invalid password".PHP_EOL;
	else if ($res == 2)
	{
		echo "Logged in".PHP_EOL;
		header("Location: /");
	}
	else
		echo "Unknown error".PHP_EOL;

?>
