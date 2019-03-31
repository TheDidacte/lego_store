<?php

include_once("tools/const.php");
include_once("tools/db.php");
include_once("tools/init_page.php");
include_once("articles/get_article_element.php");
include_once("tools/index_helper.php");
initPage("");
?>
<html>

<head>
	<title>Lego Piece Store</title>
	<link rel="stylesheet" href="style/style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>

<body>

<div id="basket"><div id="basket_logo"><div id="article_count">
<?php
echo getTotalItems() . "\n";
?>
</div></div></div>

<div id="header">
	<div id="main_title">Welcome to lego pieces store !</div>
<?php

if ($_SESSION[USER][USER_ID] !== USER_ID_NOT_LOGGED)
{
	echo "<div id='welcome'>Welcome " . $_SESSION[USER][USER_LOGIN] . " !</div>\n";
	echo '<div id="see_profile"><a href="user/profile.php">Profile</a></div>' . "\n";
	echo '<div id="logout"><a href="user/logout.php">Logout</a></div>' . "\n";
}
else
{
	echo '<div id="login"><a href="user/login.html">Login</a></div>' . "\n";
	echo '<div id="register"><a href="user/register.html">Register</a></div>' . "\n";
}

?>	
</div>

<div id="invisible"></div>

<div id="hero_zone"><div class="hero_back"></div><div class="catch_phrase">Here you can find any piece you're missing</div></div>

<div class="separator blue">Recent pieces</div>

<div class="showcase">


<?php



for ($k = 0; $k < 10; $k++)
foreach ($db[ARTICLE] as $e)
	echo getArticleElement($e, "");
 
?>

</div>

</html></body>
