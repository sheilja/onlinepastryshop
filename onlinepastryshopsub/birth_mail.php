<?php
include_once('connection.php');
$date=date("Y-m-d");
$date1=Date('20y-m-d',strtotime("+7 days"));
$q_q="select *from user_register";
$q=mysql_query($q_q,$con);
while($q_row=mysql_fetch_array($q))
{
$m=date('m', strtotime($q_row['birth_date']));
$d=date('d', strtotime($q_row['birth_date']));
$y=date('Y', strtotime($q_row['birth_date']));
$age=date('Y', strtotime($date))-date('Y', strtotime($q_row['birth_date']));
$a=$age+$y;
$last_day = date('Y-m-d', strtotime("$a-$m-$d"));
//echo $last_day;?><br><?php
if($date1>$last_day && $last_day>$date)
{
	
	$to=$q_row['user_email'];
	$b=rand();
	
	$subject="birth";
	//	$txt=$q_row['birth_date']. " " .$b;
	$txt="Dear Customer, We know that your birth date is comming on date.So we would like to offer you some special discount on the order of pastry to make your day very special.";
	$header="From: sheiljagandhi603@gmail.com";
	mail($to,$subject,$txt,$header);

}
}
?>
<?php
 	    include_once('connection.php');
		$date=date("Y-m-d");

		$date1=Date('20y-m-d',strtotime("+7 days"));
		
       $q_q="select od.*,u.* from order_master as od 
	   LEFT JOIN user_register as u on od.customer_id=u.user_id";
	   
$q=mysql_query($q_q,$con);
//echo "hjhj";
while($q_row=mysql_fetch_array($q))
{
$m=date('m', strtotime($q_row['order_date']));
$d=date('d', strtotime($q_row['order_date']));
$y=date('Y', strtotime($q_row['order_date']));

$age=date('Y', strtotime($date))-date('Y', strtotime($q_row['order_date']));
$a=$age+$y;
echo $a;?><br><?php
echo $m;?><br><?php
echo $d;?><br><?php
$last_day = date('Y-m-d', strtotime("$a-$m-$d"));
//echo $last_day;?><br><?php
if($date1>$last_day && $last_day>$date)
{

	$to=$q_row['user_email'];
	$b=rand();
	echo $b;?><br><?php
	$subject="birth";
	//	$txt=$q_row['birth_date']. " " .$b;
	$txt="Dear Customer, We know that your birth date is comming on date.So we would like to offer you some special discount on the order of pastry to make your day very special.".$q_row['order_number']. " " .$b;
	$header="From: sheiljagandhi603@gmail.com";
	mail($to,$subject,$txt,$header);
	$insert_c_q="update user_register set coupon_code='".$b."' where user_id='".$q_row['user_id']."'";
	$insert_c=mysql_query($insert_c_q,$con);
}
}
?>

