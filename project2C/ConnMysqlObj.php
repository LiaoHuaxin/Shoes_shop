<?php
	$db_host = "localhost";
	$db_username = "root";
	$db_password = "Aa0986135179"; //記得改密碼
	$db_name = "nike";
	$db_link = @new mysqli($db_host, $db_username, $db_password, $db_name);
	if($db_link -> connect_error != "")
	{
		$sql_connect = false;
	}
	else
	{
		$sql_connect = true;
		$db_link -> query("SET NAMES 'utf8'");
	}
?>