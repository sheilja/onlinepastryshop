<?php
include_once('connection.php');
$response = array();
if(isset($_POST['send']))
{
	if(isset($_POST['id']))
	{
		$sqlfetch="select *from order_master where order_id='".$_POST['id']."'";
		$res = mysql_query($sqlfetch,$con);
	    while($row = mysql_fetch_array($res))
		{
           $user_id=$row["customer_id"];
		}
		$sqlfetch2="select *from user_register where user_id='".$user_id."'";
		$res2 = mysql_query($sqlfetch2,$con);
	    while($row2 = mysql_fetch_array($res2))
		{
           $response["user_email"]=$row2["user_email"];
		}

			
			$response["order_master_id"] = $_POST['id'];
			
	}		
}
else
{
	$response["Fail"] = 1;
}
echo json_encode($response);

?>