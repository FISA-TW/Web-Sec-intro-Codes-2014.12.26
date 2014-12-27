<?php
	if($_SERVER['HTTP_REFERER'] != "127.0.0.1")
		echo "<h1>Access Denied</h1><br />you are not from 127.0.0.1";
	if($_SERVER['HTTP_REFERER'] == "127.0.0.1")
	echo "<h1>Succeed login</h1>HI admin, YOU are GOOD at BAD";
?>
