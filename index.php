<?php

session_start();

include_once("tools/const.php");

?>

<html><body>

<div id="header">
	<div id="main_title">Welcome to lego pieces store</div>
<?php

if (isset($_SESSION[USER][USER_ID]))
	echo "Welcome " . $SESSION[USER][USER_LOGIN] . " !";
else
{
	echo '<div id="login"><a href="user/login.html">Login</a></div>' . "\n";
	echo '<div id="register"><a href="user/regist.php">Register</a></div>' . "\n";
}

?>	
</div>

<div id="hero_zone">Here you can find any piece you're missing</div>

<div id="showcase">

<!-- Here, display some random items-->
<!-- For this, iterate over $articles and call getArticleElement($article) to print -->

<?php

include_once('tools/get_article_element.php');


echo getArticleElement($a);
?>

</div>

</html></body>
