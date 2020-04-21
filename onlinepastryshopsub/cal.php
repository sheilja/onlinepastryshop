<?php
$ans=$_REQUEST['ans11'];

$odi=$_REQUEST['id11'];
$pp=$_REQUEST['pp1'];
$qq=$_REQUEST['qq1'];
$gst2=$_REQUEST['gst11'];
$totalorder=$_REQUEST['totalorder1'];

$ww=$_REQUEST['ww1'];



$orderdetails=$_REQUEST['orderdetailsid2'];

$subtotal=0;
$fianltotal=0;
$gsttotal=0;
$cgst1=0;
$sgst1=0;
$igst1=0;
$old_f=0;
$new_f=0;
?>
<?php
	include_once('connection.php');
	$fetch_order_details_q="select *from order_detatils where order_detail_id='".$orderdetails."'";
	$fetch_order_details=mysql_query($fetch_order_details_q,$con);
	
	while($fetch_order_details_row=mysql_fetch_array(fetch_order_details))
	{
		$ans=$fetch_order_details_row['
	}
	$update_order_details_q="update order_details set qty='".$qq."',weight='".$ww."',rate='".$ans."' where order_detail_id='".$odi."'";
	$update_order_details=mysql_query($update_order_details_q,$con);
	$fetch_oder_master_q="select *from order_master";
	$fetch_oder_master=mysql_query($fetch_oder_master_q,$con);
	while($fetch_oder_master_row=mysql_fetch_array($fetch_oder_master))
	{
		$subtotal=$fetch_oder_master_row['sub_total'];
		$fianltotal=$fetch_oder_master_row['final_total'];
		$gsttotal=$fetch_oder_master_row['GST_total'];
		
	}
	$fetch_gst_per_q="select *from gst_tbl where gst_slab_id='".$gst2."'";
	$fetch_gst_per=mysql_query($fetch_gst_per_q,$con);
	if($fetch_gst_per_q_row=mysql_fetch_array($fetch_gst_per))
	{
		$cgst1=$fetch_gst_per_q_row['cgst'];
		$sgst1=$fetch_gst_per_q_row['sgst'];
		$igst1=$fetch_gst_per_q_row['igst'];
	}
	

	$old_f=$totalorder*$cgst1/100;
	$old_f=$old_f+$totalorder*$sgst1/100;
	$old_f=$old_f+$totalorder*$igst1/100;
	$gsttotal=$gsttotal-$old_f;

	$old_f=$old_f+$totalorder;
	$fianltotal=$fianltotal-$old_f;
	$new_f=($pp*$qq*$ww)*$cgst1/100;
	$new_f=$new_f+($pp*$qq*$ww)*$sgst1/100;
	$new_f=$new_f+($pp*$qq*$ww)*$igst1/100;
	
	$gsttotal=$gsttotal+$new_f;
	$new_f=$new_f+($pp*$qq*$ww);
	$fianltotal=$fianltotal+$new_f;
	$subtotal=$subtotal-$totalorder;
	$subtotal=$subtotal+($pp*$qq*$ww);
	$update_order_master_q="update order_master set sub_total='".$subtotal."',final_total='".$fianltotal."',GST_total='".$gsttotal."' ";
	$update_order_master=mysql_query($update_order_master_q,$con);
	
	
?>
<div id="t_disp"><?php echo $ans;?></div>
