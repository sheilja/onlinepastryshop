<?php
           	include_once('connection.php');
$response = array();
if(isset($_POST['edit']))
{
	if(isset($_POST['id']))
	{

		$fetchSql = "select * from contact_us where contact_id='".$_POST['id']."'";
		$result = mysql_query($fetchSql,$con);		
		while($row = mysql_fetch_array($result))
		{
			//$response["category_id"] = $row["category_id"];
			
			$response["contact_name"] = $row["contact_name"];
			$response["contact_mob"] = $row["contact_mob"];
			$response["contact_email"] = $row["contact_email"];
			$response["contact_subject"] = $row["contact_subject"];
			$response["contact_message"] = $row["contact_message"];						
          //$response["Success"] = 1;
		}		
	}		
}
else
{
	$response["Fail"] = 1;
}
echo json_encode($response);

?>