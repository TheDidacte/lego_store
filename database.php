<?php
	include_once("tools/const.php");
	include_once("tools/db.php");
	include_once("tools/init_page.php");

	initPage("");
	echo "<h1>Users DataBase</h1>";
	foreach($db[USER] as $user)
		echo "<p>".$user[USER_LOGIN]."</p>";

	echo "<h1>Articles DataBase</h1>";
	foreach($db[ARTICLE] as $user)
		echo "<p>".$user[ARTICLE_NAME]."</p>";
?>