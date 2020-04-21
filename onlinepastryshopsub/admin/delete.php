<?php
           	include_once('connection.php');

$response = array();
if(isset($_POST['delete']))
{
	if(isset($_POST['id']))
	{		
            $i=$_POST['id'];	
           	$q_delete="CALL deleteCategory('".$_POST['id']."')";
		if(mysql_query($q_delete,$con))
		{
			$response["Success"] = 1;
		}
		else
		{
			$response["Fail"] = 1;
		}
	}		
}
else
{
	$response["Fail"] = 1;
}
echo json_encode($response);
?>