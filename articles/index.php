<?php

include_once("../tools/const.php");
include_once("../tools/db.php");
include_once("../tools/init_page.php");
include_once("./get_article_element.php");
include_once("../tools/index_helper.php");
initPage("../");
?>
<html>

<head>
	<title>Lego Piece Store</title>
	<link rel="stylesheet" href="../style/style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>

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
	echo '<div id="see_profile"><a href="../user/profile.php">Profile</a></div>' . "\n";
	echo '<div id="logout"><a href="../user/logout.php">Logout</a></div>' . "\n";
}
else
{
	echo '<div id="login"><a href="../user/login.html">Login</a></div>' . "\n";
	echo '<div id="register"><a href="../user/register.html">Register</a></div>' . "\n";
}

?>
</div>

<div id="invisible"></div>

<?php

function getCategoryName($i)
{
	global $db;
	foreach ($db[CATEGORY] as $e)
	{
		if (intval($e[CATEGORY_ID]) === intval($i))
			return ($e[CATEGORY_NAME]);
	}return FALSE;
}

$hasFound = FALSE;
if (isset($_GET['id']))
{
	foreach($db[ARTICLE] as $e)
	{
		if (intval($e[ARTICLE_ID]) === intval($_GET['id']))
		{
			echo getArticleElement($e);
			//echo '<div class="article_show">This is article N'.$_GET['id'].'</div>';
		}
	}
}
else if (isset($_GET['category']))
{
	$name = getCategoryName($_GET['category']);
	foreach($db[ARTICLE] as $e)
	{
		foreach($e[ARTICLE_CATEGORIE] as $cat)
		{
			if ($cat === $name)
			{
				if (!$hasFound)
				{
					echo '<div class="separator">Results for category "';
					echo $name;
					echo '":</div>';
					echo '<div class="showcase">';
					$hasFound = TRUE;
				}	
				echo getArticleElement($e);
			}
		}
	}
}
if ($hasFound)
	echo '</div>';

?>

</html></body>

