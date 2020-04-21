<?php
include_once('connection.php');

$response = array();
if(isset($_POST['delete']))
{
	if(isset($_POST['id']))
	{		
            $i=$_POST['id'];	
		$update_delivery_q="update order_master set is_order_delivered='1' where order_number='".$_POST['id']."'";
		$update_delivery=mysql_query($update_delivery_q,$con);
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