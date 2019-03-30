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
	$res = $res . '<div class="article_preview"><img alt="preview" title="' . $art[ARTICLE_NAME] . '" src="Gallery/' . $art[ARTICLE_PREVIEW][0] . '"></div>' . "\n";
	$res = $res . '<div class="article_price">' . $art[ARTICLE_PRICE] . '$</div>' . "\n";
	$res = $res . '</div></div>' . "\n";
	return ($res);
}

?>
