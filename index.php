<?php

session_start();

?>

<html><body>

<div id="header">
	<div id="main_title">Welcome to lego pieces store</div>
	<div id="register">Register</div>
	<div id="login">Login</div>
</div>

<div id="hero_zone">Here you can find any piece you're missing</div>

<div id="showcase">

<!-- Here, display some random items-->
<!-- For this, iterate over $articles and call getArticleElement($article) to print -->

<?php

include('./user/tools/get_article_element.php');

$a = array("name" => "lego_brick", "price" => 2.35, "preview" => "http://icon-park.com/imagefiles/lego_brick_blue.png");
getArticleElement($a);
?>

</div>

</html></body>
