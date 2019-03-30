<?php
	include_once("../tools/include.php");

	initPage();

	if ($_SESSION[USER][USER_ID] === USER_ID_NOT_LOGGED)
	{
		header("Location: /user/login.php");
		exit ;
	}
	
?>
