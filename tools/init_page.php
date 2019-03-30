<?php

session_start();

include_once("/tools/db.php");

$db = [];

function initPage()
{
	if (!isset($_SESSION[USER]))
	{
		$_SESSION[USER] = array();
		$_SESSION[USER][USER_ID] = USER_ID_NOT_LOGGED;
		$_SESSION[USER][USER_LOGIN] = "no_login";
		$_SESSION[USER][USER_FNAME] = "";
		$_SESSION[USER][USER_LNAME] = "";
		$_SESSION[USER][USER_MAIL] = "";
		$_SESSION[USER][USER_TYPE] = USER_TYPE_CLIENT;
	}

	// Verif DB
	global $db;

	$db[ARTICLE] = db_get("/Datas/articles.db");
	$db[USER] = db_get("/Datas/users.db");
	
	if ($db[ARTICLE] === FALSE || $db[USER] === FALSE)
		header("Location: /error/500.html");
	
}

?>
