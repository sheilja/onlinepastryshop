<?php
           	include_once('connection.php');
$response = array();
if(isset($_POST['edit']))
{
	if(isset($_POST['id']))
	{

		$fetchSql = "select *from theme where theme_id='".$_POST['id']."'";
		$result = mysql_query($fetchSql,$con);		
		while($row = mysql_fetch_array($result))
		{
			//$response["category_id"] = $row["category_id"];
			$response["theme_code"] = $row["theme_code"];
			$response["theme_name"] = $row["theme_name"];
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