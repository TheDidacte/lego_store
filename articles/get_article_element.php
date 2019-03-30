<?php

/**
**		Converts an article element into a printable html element
*/

function getArticleElement($art)
{
	$res = "";
	$res = $res . '<div class="article_container">' . "\n";
	$res = $res . '<div class="article_title">' . $art['name'] . '</div>' . "\n";
	$res = $res . '<div class="article_preview"><img alt="preview" title="' . $art['name'] . '" src="' . $art['preview'] . '"></div>' . "\n";
	$res = $res . '<div class="article_price">' . $art['price'] . '$</div>' . "\n";
	$res = $res . '</div>' . "\n";
	return ($res);
}

?>
