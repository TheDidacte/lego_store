<?php

/**
**		Converts an article element into a printable html element
*/

function getArticleElement($art)
{
	$res = "";
	$res = $res . '<div class="article_hold">' . "\n";
	$res = $res . '<div class="article_container">' . "\n";
	$res = $res . '<div class="article_title">' . $art[ARTICLE_NAME] . '</div>' . "\n";
	$res = $res . '<div class="article_preview"><img alt="preview" title="' . $art[ARTICLE_NAME] . '" src="' . $art[ARTICLE_PREVIEW][0] . '"></div>' . "\n";
	$res = $res . '<div class="article_price">' . $art[ARTICLE_PRICE] . '$</div>' . "\n";

	$res = $res . '<form action="../tools/add_to_basket.php" method="post">';
	$res = $res . '<input type="text" name="id" style="display: none" value='.$art[ARTICLE_ID].'>';
	$res = $res . '<input type="text" name="origin" style="display: none" value="">';
	$res = $res . '<button type="submit" name="submit" value="ok" class="add_to_basket">+</button>' . "\n";
	$res = $res . '</form>';
	$res = $res . '</div></div>' . "\n";
	return ($res);
}

?>
