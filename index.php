<?php

include_once("/tools/const.php");
include_once("/tools/init_page.php");
initPage();
print_r($db);
?>
<html><body>

<div id="header">
	<div id="main_title">Welcome to lego pieces store</div>
<?php

if ($_SESSION[USER][USER_ID] !== USER_ID_NOT_LOGGED)
	echo "Welcome " . $_SESSION[USER][USER_LOGIN] . " !";
else
{
	echo '<div id="login"><a href="user/login.html">Login</a></div>' . "\n";
	echo '<div id="register"><a href="user/regist.php">Register</a></div>' . "\n";
}

?>	
</div>

<div id="hero_zone">Here you can find any piece you're missing</div>

<div id="showcase">


<?php


//include_once('articles/get_article_element.php');


foreach ($db[USER] as $k => $e)
	echo "$k => $e\n";
foreach ($db[ARTICLE] as $k => $e)
	echo "$k => $e\n";
 
//echo getArticleElement($a);

?>

</div>

</html></body>
