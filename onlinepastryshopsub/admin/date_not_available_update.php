<?php
           	include_once('connection.php');
$response = array();
if(isset($_POST['edit']))
{
	if(isset($_POST['id']))
	{

		$fetchSql = "select *from order_not_available_tbl where date_id='".$_POST['id']."'";
		$result = mysql_query($fetchSql,$con);		
		while($row = mysql_fetch_array($result))
		{
			//$response["category_id"] = $row["category_id"];
			$response["date"] = $row["date1"];
			$response["date_availability"] = $row["date_availability"];
			$response["max_weight"] = $row["max_weight"];			
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