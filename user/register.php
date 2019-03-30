<?php
	/*
		register:
			FALSE: Internal Error
			1: Login already registered
			TRUE: Successfull registration
	*/
	function register()
	{
		include("./tools/db.php");
		include("./tools/hash.php");
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
		$new_user[user_id] = $serial_tab[count($serial_tab ) - 1][user_id] + 1;
		$new_user[login] = $_POST[login];
		$new_user[fname] = $_POST[fname];
		$new_user[lname] = $_POST[lname];
		$new_user[passwd] = my_hash($_POST[passwd]);
		$new_user[mail] = $_POST[mail];
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
		include("./login.php");
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