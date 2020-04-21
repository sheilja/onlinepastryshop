<?php
include_once('connection.php'); 
	session_start();    
$qq_q="select *from order_details where is_order_completed=0 and customer_id='".$_SESSION['login_client']."'";
$qq=mysql_query($qq_q,$con);
		$date=date("Y-m-d");
while($qq_row=mysql_fetch_array($qq))
{
	if($qq_row['delivery_date']<$date)
	{
		?><span id="er" class="text-danger" style="float:right;">1</span><?php
	}
}
?>