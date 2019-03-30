<?php

include_once("tools/const.php");
include_once("tools/db.php");
include_once("tools/init_page.php");
include_once("articles/get_article_element.php");
initPage("");
?>
<html><body>

<div id="header">
	<div id="main_title">Welcome to lego pieces store</div>
<?php

if ($_SESSION[USER][USER_ID] !== USER_ID_NOT_LOGGED)
{
	echo "Welcome " . $_SESSION[USER][USER_LOGIN] . " !\n";
	echo '<div id="logout"><a href="user/logout.php">Logout</a></div>' . "\n";
}
else
{
	echo '<div id="login"><a href="user/login.html">Login</a></div>' . "\n";
	echo '<div id="register"><a href="user/register.html">Register</a></div>' . "\n";
}

?>	
</div>

<div id="hero_zone">Here you can find any piece you're missing</div>

<div id="showcase">


<?php




foreach ($db[ARTICLE] as $e)
	echo getArticleElement($e);
 
//echo getArticleElement($a);
?>

</div>

</html></body>
