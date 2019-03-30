<?php
	$db_path = "./Datas";
	$userdb_path = "./Datas/users.db";
	$articledb_path = "./Datas/articles.db";

	include_once("./tools/const.php");
	include_once("./tools/hash.php");
	include_once("./tools/db.php");

	/* Creating database Dir */
	function init_db($dir_path)
	{
		if (!file_exists($dir_path))
			if (mkdir($dir_path, 0777, TRUE) == FALSE)
				return FALSE;
		return TRUE;
	}

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
		if (file_put_contents($userdb_path, $str) == FALSE)
			return FALSE;
		return (TRUE);
	}

	/* Creating Article database*/
	function init_article_databe($articledb_path)
	{
		$db = array();
		$article = array();
		$article[ARTICLE_ID] = 0;
		$article[ARTICLE_NAME] = "Blue 4x2 Brick";
		$article[ARTICLE_PRICE] = 12.30;
		$article[ARTICLE_PREVIEW] = array("001.png");
		$article[ARTICLE_DESCRIPTION] = "Blue two by four Lego brick";
		$article[ARTICLE_CATEGORIE] = ARTICLE_CATEGORIE_BRICK;
		$article[ARTICLE_COLOR] = ARTICLE_COLOR_BLUE;
		$article[ARTICLE_SELLERID] = 0;
		$article[ARTICLE_ADDTIME] = 0;

		$db[] = $article;
		$str = serialize($db);
		if (file_put_contents($articledb_path, $str) == FALSE)
			return FALSE;
		return (TRUE);
	}

	function init_server_db($userdb_path, $articledb_path)
	{
		if (($userdb = db_get($userdb_path)) === FALSE)
			echo "Can't load users database".PHP_EOL;
		else
			$_SERVER[USER] = $userdb;

		if (($articledb = db_get($articledb_path)) === FALSE)
			echo "Can't load articles database".PHP_EOL;
		else
			$_SERVER[ARTICLE] = $articledb;
	}

	init_db($db_path);
	init_user_db($userdb_path);
	init_article_databe($articledb_path);
	init_server_db($userdb_path, $articledb_path);
?>