<?php
	include_once("./tools/db.php");
	include_once("./tools/hash.php");
	include_once("../const.php");
	/*
		register:
			FALSE: Internal Error
			1: Login already registered
			TRUE: Successfull registration
	*/
	function register()
	{
		$passwd_file = "../Datas/users.db";

		/* Checking arguments */
		if ($_POST[login] == "" || $_POST[passwd] == "")
			return FALSE;

		if (($serial_tab = db_get($passwd_file)) == FALSE)
			return FALSE;

		foreach($serial_tab as $user)
			if ($user[login] === $_POST[login])
				return (1);

		$new_user = array();
		$new_user[USER_ID] = $serial_tab[count($serial_tab ) - 1][user_id] + 1;
		$new_user[USER_LOGIN] = $_POST[USER_LOGIN];
		$new_user[fname] = $_POST[USER_FNAME];
		$new_user[lname] = $_POST[USER_LNAME];
		$new_user[USER_PASSWORD] = my_hash($_POST[USER_PASSWORD]);
		$new_user[USER_MAIL] = $_POST[USER_MAIL];
		$new_user[type] = 0;

		return db_add($new_user, $passwd_file);
	}

	$passwd_file = "../Datas/users.db";

	$res = register();
	if ($res == FALSE)
		echo "Internal error".PHP_EOL;
	else if ($res === TRUE)
	{
		echo "Registration OK".PHP_EOL;
		include_once("./login.php");
		if (logIn($passwd_file) == 2)
			echo "Successfully logged in".PHP_EOL;
		else
			echo "Can't log in";
	}
	else if ($res === 1)
		echo "User name already exist".PHP_EOL;
	else
		echo "Unknown error occured";
?>