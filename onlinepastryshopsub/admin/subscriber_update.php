									<?php
           	include_once('connection.php');
$response = array();
if(isset($_POST['edit']))
{
	if(isset($_POST['id']))
	{

		$fetchSql = "select *from subscriber_tbl where subscriber_id='".$_POST['id']."'";
		$result = mysql_query($fetchSql,$con);		
		while($row = mysql_fetch_array($result))
		{

			$response["subscriber_email_id"] = $row["subscriber_email_id"];


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