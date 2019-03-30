<?php
	include_once("../tools/include.php");

	initPage();

	if ($_SESSION[USER][USER_ID] === USER_ID_NOT_LOGGED)
	{
		header("Location: login.php");
		exit ;
	}
	if (($serial = db_get("../Datas/users.db")) === FALSE)
	{
		header("Location: ../errors/500.html");
		exit ;
	}
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>My Profile</title>
	</head>

	<body>
		<?php 
			echo "<h1>Welcome, ".$_SESSION[USER][USER_FNAME]."</h1>".PHP_EOL;
			echo '<h3>Here are your personnal datas</h3>'.PHP_EOL;
			echo '<p>First Name : <input type="text" value="'.$_SESSION[USER][USER_FNAME].'" disabled/></p>'.PHP_EOL;
			echo '<p>Last Name : <input type="text" value="'.$_SESSION[USER][USER_LNAME].'" disabled/></p>'.PHP_EOL;
			echo '<p>Email address : <input type="mail" value="'.$_SESSION[USER][USER_MAIL].'" disabled/></p>'.PHP_EOL;
			?>
			<a href="delete.php">Delete my account</a>
	</body>
</html>