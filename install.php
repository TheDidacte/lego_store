<?php
$db_path = "./Datas";
$userdb_path = "./Datas/users.db";
$articledb_path = "./Datas/articles.db";

include_once("./tools/const.php");
include_once("./tools/hash.php");
include_once("./tools/db.php");
include_once("./articles/add.php");

/* Creating database Dir */
function init_db($dir_path)
{
	if (!file_exists($dir_path))
		if (mkdir($dir_path, 0777, TRUE) === FALSE)
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
	$new_user[USER_TYPE] = USER_TYPE_ADMIN;
	$serial_tab = array();
	$serial_tab[] = $new_user;
	$new_user = array();
	$new_user[USER_ID] = 1;
	$new_user[USER_LOGIN] = "cpoirier";
	$new_user[USER_FNAME] = "Corentin";
	$new_user[USER_LNAME] = "Poirier";
	$new_user[USER_PASSWORD] = my_hash("tata");
	$new_user[USER_MAIL] = "cpoirier@student.42.fr";
	$new_user[USER_TYPE] = USER_TYPE_ADMIN;
	$serial_tab[] = $new_user;
	$str = serialize($serial_tab);
	if (file_put_contents($userdb_path, $str) === FALSE)
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
	$article[ARTICLE_PRICE] = 42.0;
	$article[ARTICLE_PREVIEW] = array("/Gallery/001-1.png");
	$article[ARTICLE_DESCRIPTION] = "Blue two by four Lego brick";
	$article[ARTICLE_CATEGORIE] = array("Brick", "Blue");
	$article[ARTICLE_SELLERID] = 0;
	$article[ARTICLE_ADDTIME] = time();

	$db[] = $article;
	$str = serialize($db);
	if (file_put_contents($articledb_path, $str) === FALSE)
		return FALSE;
	return (TRUE);
}

function fill_article_database($articledb_path)
{
	$filepath = "Datas/articles.db";
	article_add_manual($filepath, "Red 4x2 Brick", 39.90, array("/Gallery/002-1.png"), "Red two by four Lego brick",    array("Brick", "Red"), 0);
	article_add_manual($filepath, "Green 4x2 Brick", 42.0, array("/Gallery/003-1.png"), "Green two by four Lego brick", array("Brick", "Green") , 0);
	article_add_manual($filepath, "Black 4x2 Brick", 42.0, array("/Gallery/005-1.png"), "Black two by four Lego brick", array("Brick", "Black") , 0);
	article_add_manual($filepath, "White 4x2 Brick", 42.0, array("/Gallery/004-1.png"), "White two by four Lego brick", array("Brick", "White") , 0);
	article_add_manual($filepath, "Blue ninjago character", 1.50, array("/Gallery/006-1.png"), "Original Lego Ninjago Character",  array("Character", "Blue"), 1);
	article_add_manual($filepath, "Red ninjago character", 1.39, array("/Gallery/007-1.jpg"),  "Original Lego Ninjago Character",  array("Character", "Red"), 1);
	article_add_manual($filepath, "Green ninjago character", 1.50, array("/Gallery/008-1.jpg"),"Original Lego Ninjago Character",  array("Character", "Green"), 1);
	article_add_manual($filepath, "Dark Vador character", 1.50, array("/Gallery/009-1.jpg"),   "Original Dark Vador Lego figurine",array("Character", "Black"), 1);
	article_add_manual($filepath, "Clone Trooper character", 1.50, array("/Gallery/010-1.png"),"Original Clone Trooper figurine",  array("Character", "White"), 1);
	//	article_add_manual($filepath, "", 1.2, array("/Gallery/011-1.png"), "", ARTICLE_CATEGORIE_, ARTICLE_COLOR_, 0);
	//	article_add_manual($filepath, "", 1.2, array("/Gallery/012-1.png"), "", ARTICLE_CATEGORIE_, ARTICLE_COLOR_, 0);
}

function add_category_database($categorydb_path)
{
	$serial_tab = array();
	$new_user = array();
	$new_user[CATEGORY_ID] = 0;
	$new_user[CATEGORY_NAME] = "Brick";
	$serial_tab[] = $new_user;
	$new_user = array();
	$new_user[CATEGORY_ID] = 1;
	$new_user[CATEGORY_NAME] = "Character";
	$serial_tab[] = $new_user;
	$new_user = array();
	$new_user[CATEGORY_ID] = 2;
	$new_user[CATEGORY_NAME] = "Red";
	$serial_tab[] = $new_user;
	$new_user = array();
	$new_user[CATEGORY_ID] = 3;
	$new_user[CATEGORY_NAME] = "Blue";
	$serial_tab[] = $new_user;
	$new_user = array();
	$new_user[CATEGORY_ID] = 4;
	$new_user[CATEGORY_NAME] = "Green";
	$serial_tab[] = $new_user;
	$new_user = array();
	$new_user[CATEGORY_ID] = 5;
	$new_user[CATEGORY_NAME] = "Black";
	$serial_tab[] = $new_user;
	$new_user = array();
	$new_user[CATEGORY_ID] = 6;
	$new_user[CATEGORY_NAME] = "White";
	$serial_tab[] = $new_user;
	$str = serialize($serial_tab);
	if (file_put_contents($categorydb_path, $str) === FALSE)
		return FALSE;
	return (TRUE);
}

if (init_db($db_path) === FALSE)
	echo "Can't create database directory".PHP_EOL;		
if (init_user_db($userdb_path) === FALSE)
	echo "Can't create users database".PHP_EOL;
if (init_article_databe($articledb_path) === FALSE)
	echo "Can't create articles database".PHP_EOL;
fill_article_database("./Datas/articles.db");
if (add_category_database("./Datas/category.db") === FALSE)
	echo "Can't create category DB" . PHP_EOL;
?>
