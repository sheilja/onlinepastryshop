									<?php
           	include_once('connection.php');
$response = array();
if(isset($_POST['edit']))
{
	if(isset($_POST['id']))
	{

		$fetchSql = "select *from admin_registration_tbl where admin_id='".$_POST['id']."'";
		$result = mysql_query($fetchSql,$con);		
		while($row = mysql_fetch_array($result))
		{
			//$response["category_id"] = $row["category_id"];
			$response["admin_img"] = $row["admin_img"];
			$response["company_id"] = $row["company_id"];
			$response["admin_name"] = $row["admin_name"];
			$response["admin_mob"] = $row["admin_mob"];
			$response["admin_email"] = $row["admin_email"];
			$response["admin_password"] = $row["admin_password"];


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