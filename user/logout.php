<?php
	function logOut()
	{
		if (session_start() == FALSE)
			return ;
		session_unset();
	}
?>