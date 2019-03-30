<?php

session_start();

include_once("const.php");

function initPage()
{
	if (!isset($_SESSION[USER]))
	{
		$_SESSION[USER] = array();
	}
}

?>
