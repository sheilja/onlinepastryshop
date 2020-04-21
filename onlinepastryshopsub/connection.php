<?php
	$con = mysql_connect("localhost","root","");
	
	
	
	
	
	if(!$con)
	{
		die('NOT CONNECTED.'.mysql_error());

	}
	/*else
	{
		echo "CONNECTION SUCCESSFULLY.";
	}*/

	$db = mysql_select_db("pastry_internal",$con);

	if(!$db)
	{
		die('NOT CONNECTED WITH DB.'.mysql_error());

	}
	/*
	else
	{
		echo "CONNECTION SUCCESSFULLY WITH DB.";
	}*/
?>