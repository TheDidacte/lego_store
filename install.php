<?php
	$userdb_path = "./Datas/users.db";
	$user_tools_path = "./tools/";

	include_once($user_tools_path."hash.php");
	include_once("./tools/const.php");

	/* Creating User database */
	function init_user_db($userdb_path)
	{
		$new_user = array();
		$new_user[USER_ID] = 0;
		$new_user[USER_LOGIN] = "jmartel";
		$new_user[USER_FNAME] = "Jeremie";
		$new_user[USER_LNAME] = "Martel";
		$new_user[USER_PASSWORD] = my_hash("okalm");
		$new_user[USER_MAIL] = "jmartel@student.42.fr";
		$new_user[USER_TYPE] = 2;
		$serial_tab = array();
		$serial_tab[] = $new_user;
		$str = serialize($serial_tab);
		file_put_contents($userdb_path, $str);
	}
	init_user_db($userdb_path);
?>