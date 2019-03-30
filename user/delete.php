<?php

	include_once("../tools/const.php");
	include_once("../tools/db.php");
	include_once("../tools/init_page.php");

	initPage();

	if ($_SESSION[USER][USER_ID] === USER_ID_NOT_LOGGED)
	{
		header("Location: /user/login.php");
		exit ;
	}
	
?>
