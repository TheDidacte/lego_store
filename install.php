<?php
	$userdb_path = "./Datas/users.db";
	$user_tools_path = "./user/tools/";

	include($user_tools_path."hash.php");

	/* Creating User database */
	function init_user_db($userdb_path)
	{
		$new_user = array();
		$new_user[user_id] = 0;
		$new_user[login] = "jmartel";
		$new_user[fname] = "Jeremie";
		$new_user[lname] = "Martel";
		$new_user[passwd] = my_hash("okalm");
		$new_user[mail] = "jmartel@student.42.fr";
		$new_user[type] = 2;
		$serial_tab = array();
		$serial_tab[] = $new_user;
		$str = serialize($serial_tab);
		file_put_contents($userdb_path, $str);
	}
	init_user_db($userdb_path);
?>