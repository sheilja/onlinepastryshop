
<?php

include_once('connection.php');
$a1=$_REQUEST['q'];
$fech_date_q="select *from order_not_available_tbl where date1='".$a1."'";
$fech_date=mysql_query($fech_date_q,$con);
$flag=3;
while($fech_date_row=mysql_fetch_array($fech_date))
{
	$max=$fech_date_row['max_weight'];
	$placedorder=$fech_date_row['placed_order'];
	if($placedorder>$max)
	{
		$flag=0;
		
	}
	if($fech_date_row['date_availability']==1)
	{
		$flag=0;		
	}

}
	if($flag==0)
	{
		?><input id="e_r" type="hidden" value="<?php echo "1";?>">
		<span id="time" class="text-danger" style="float:right;"><?php echo "THIS DELIVERY DATE IS NOT AVAILABLE";?></span>
		<?php
	}
	else
	{
		?><input id="e_r" type="hidden" value="<?php echo "0";?>">
	<?php	
	}



?>