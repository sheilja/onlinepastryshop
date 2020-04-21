<?php
//echo $_REQUEST['coupon'];
	include_once('connection.php');
	session_start();           	
	$q1_q="select *from user_register where user_id='".$_SESSION['login_client']."'";
	$q1=mysql_query($q1_q,$con);
	while($q1_row=mysql_fetch_array($q1))
	{
		if($q1_row['coupon_code']==$_REQUEST['coupon'])
		{
        ?><input type="hidden" id="signal" name="signal" value="1">

		<?php
		}
		else
		{
		?>
		 <input type="hidden" id="signal" name="signal" value="0">
		<?php
		}
	}

?>