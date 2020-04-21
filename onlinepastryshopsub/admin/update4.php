<?php
	include_once('connection.php');
	$response = array();
	if(isset($_POST['edit']))
	{
		if(isset($_POST['id']))
		{

			$fetchSql = "select *from category_tbl where category_id='".$_POST['id']."'";
			$result = mysql_query($fetchSql,$con);		
			while($row = mysql_fetch_array($result))
			{
				//$response["category_id"] = $row["category_id"];
				$response["category_code"] = $row["category_code"];
				$response["category_name"] = $row["category_name"];
			  //	$response["Success"] = 1;
			}		
		}		
	}
	else
	{
		$response["Fail"] = 1;
	}
	echo json_encode($response);

?>