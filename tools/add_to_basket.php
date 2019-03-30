<?php
session_start();

include_once("./const.php");

if (!isset($_SESSION[USER][USER_ID]))
	header("Location: /");
if (isset($_POST['origin']) && isset($_POST['id']))
{
	foreach($_SESSION[USER][BASKET] as $e)
	{
		if ($e[ARTICLE_ID] === $_POST['id'])
		{
			$e[BASKET_QUANTITY]++;
			header("Location: /" . $_POST['origin']);
		}
	}
	$_SESSION[USER][BASKET][] = array(ARTICLE_ID => $_POST['id'], BASKET_QUANTITY => 1);
	header("Location:/" . $_POST['origin']);
}

?>
