<?php

	$db_user="root";
	$db_password= "";
	$db_host= "localhost";
	$db_database= "pcnhrs";
	$link=mysql_connect($db_host, $db_user, $db_password) or die ("Connection Failure");
	
	mysql_select_db($db_database, $link);
	
	?>