<?php
	include_once("../tools/const.php");
	include_once("../tools/db.php");
	include_once("../tools/init_page.php");

	initPage("../");

	if ($_SESSION[USER][USER_ID] === USER_ID_NOT_LOGGED)
	{
		header("Location: /user/login.html");
		exit ;
	}
	if ($_SESSION[USER][USER_TYPE] !== USER_TYPE_ADMIN)
	{
		header("Location: /");
		exit ;
	}
?>

<html>
	<head>
		<title>Administration Panel</title>
	</head>
	<body>
		<h1>Welcome <?php echo $_SESSION[USER][USER_FNAME]; ?></h1>

			<form action="./panel-back.php" method="POST">
				<input type="hidden" name="action" value="add">
				<input type="hidden" name="db" value="user">
				<h2>User Database <input type="button" name="submit" value="Add User"/></h2>
			</form>

			<?php
				foreach($db[USER] as $user)
				{
					echo '<form action="./panel-back.php" method="POST">'.PHP_EOL;
					echo '<input type="hidden" name="action" value="del"/>';
					echo '<input type="hidden" name="db" value="user"/>';
					echo '<input type="hidden" name="id" value="'.$user[USER_ID].'"/>';
					echo '<p>'.$user[USER_ID].": ".$user[USER_LOGIN].'  <input type="submit" name="del_user" value="Delete User"></p>'.PHP_EOL;
					echo '</form>'.PHP_EOL;
				}
			?>

			<form action="./panel-back.php" method="POST">
				<input type="hidden" name="action" value="add">
				<input type="hidden" name="db" value="article">
				<h2>User Database <input type="button" name="submit" value="Add Article"/></h2>
			</form>

			<?php
				foreach($db[ARTICLE] as $article)
				{
					echo '<form action="./panel-back.php" method="POST">'.PHP_EOL;
					echo '<input type="hidden" name="action" value="del"/>';
					echo '<input type="hidden" name="db" value="article"/>';
					echo '<input type="hidden" name="id" value="'.$article[ARTICLE_ID].'"/>';
					echo '<p>';
					echo '<img src="'.$article[ARTICLE_PREVIEW][0].'" alt="preview" style="width:20px;height=20px"/>';
					echo $article[ARTICLE_ID].": ".$article[ARTICLE_NAME].'  <input type="submit" name="del_article" value="Delete Article"></p>'.PHP_EOL;
					echo '</form>'.PHP_EOL;
				}
			?>

		</form>
	</body>
</html>