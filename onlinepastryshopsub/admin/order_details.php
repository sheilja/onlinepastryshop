<?php
	include_once('header.php');
	include_once('connection.php');
	if(isset($_POST['btn_status']))
	{
		$fe_q="select *from order_details where order_detail_id='".$_POST['id1']."'";
		$fe=mysql_query($fe_q,$con);
		while($fe_row=mysql_fetch_array($fe))
		{
          if($fe_row['is_item_delivered']==0)
		  {
	    $update_delivery_q="update order_details set is_item_delivered='1' where order_detail_id='".$_POST['id1']."'";
		$update_delivery=mysql_query($update_delivery_q,$con);
		  }
		  else{
			   $update_delivery_q="update order_details set is_item_delivered='0' where order_detail_id='".$_POST['id1']."'";
		$update_delivery=mysql_query($update_delivery_q,$con);
		
		  }
		}
	

	}

    $q2="select om.*,u.user_email,u.street_address,u.user_full_name,u.appartment_details from order_master as om
	LEFT JOIN user_register as u ON om.customer_id = u.user_id
	where om.order_number='".$_REQUEST['order_number']."'";
	$rs_order2 = mysql_query($q2,$con);	
	$row_order1 = mysql_fetch_array($rs_order2)
	
?>
			<!-- Page Content -->
			<div id="page-content-wrapper">
				<!-- Breadcrumb  -->
				<div class="row csk-breadcrumb">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h4 class="page-title">Invoice</h4>
					</div>
					<div class="col-lg-9 col-md-8 col-sm-8 hidden-xs">
						<ol class="breadcrumb">
							<li><a href="#">Dashboard</a></li>
							<li><a href="#">Pages</a></li>
							<li><a href="#">Invoice</a></li>
						</ol>
					</div>
				</div>
				<!--#Breadcrumb -->
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<div class="csk-title">
									<h2>Invoice</h2>
									<h2 class="pull-right"><?php echo $_REQUEST['order_number']?></h2>
								</div>
								<hr>
								<div class="row">
									<div class="col-xs-6">
										<address>
											<strong>Billed To:</strong>
											<br><?php echo $row_order1['user_full_name'];?>

										</address>
									</div>
									<div class="col-xs-6 text-right">
									<?php if($row_order1['payment_method']!=0)
									{?>
										<address>
											<strong>Pick up from shop</strong>
											
										</address>
									<?php } 
									else{
									?>
										<address>
											<strong>Shipped To:</strong>
											<br><?php echo $row_order1['appartment_details'];?>
											<br><?php echo $row_order1['street_address'];?>

										</address>
									
									<?php
									}
									?>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6">
										<address>
											<strong>Payment Method:</strong>
											<br><?php echo $row_order1['payment_method'];?>
											<br><?php echo $row_order1['user_email'];?>
										</address>
									</div>
									<div class="col-xs-6 text-right">
										<address>
											<strong>Order Date:</strong>
											<br><?php echo $row_order1['order_date'];?>
											<br>
											<br>
										</address>
									</div>
								</div>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12">
										<div class="panel panel-default">
											<div class="panel-heading">
												<h3 class="panel-title csk">
												<strong>Order summary</strong>
												</h3>
											</div>
											<div class="panel-body">
												<div class="table-responsive">
													<table class="table table-condensed table-striped">
														<thead>
															<tr>
																<td><strong>Item</strong></td>
																<td class="text-center"><strong>Price Per Kg</strong></td>
																<td class="text-center"><strong>Quantity</strong></td>
																<td class="text-center"><strong>Flavour</strong></td>
																<td class="text-center"><strong>weight</strong></td>
																<td class="text-center"><strong>gst</strong></td>	
																<td class="text-center"><strong>Delivery Date</strong></td>	
																<td class="text-center"><strong>Delivery Time</strong></td>
                                                                <td class="text-center"><strong>Delivery Address</strong></td>																
																<td class="text-center"><strong>Delivery Status</strong></td>																		
																<td class="text-center"><strong>Change Delivery Status</strong></td>																	
															</tr>
														</thead>
														<tbody class="csk1">
														<?php
															$counter = 1;
															$q="select od.*,p.product_image,p.product_name,p.price_per_kg,f.flavour_name,u.street_address,u.appartment_details,u.pincode from order_details as od 
															LEFT JOIN product_tbl as p ON od.product_id = p.product_id
															LEFT JOIN flavour as f ON od.flavour_id = f.flavour_id
															LEFT JOIN user_register as u ON od.customer_id = u.user_id
															where order_number='".$_REQUEST['order_number']."'";
															

															$rs_order = mysql_query($q,$con);
															while($row_order = mysql_fetch_array($rs_order))
															{?>
														
														
															<tr>
															<form action="" method="post">
																<td><img src="image_product/<?php echo $row_order['product_image']; ?>" style="width: 150px; height: 150px;"s></td>
																<td class="text-center"><?php echo $row_order['price_per_kg']; ?></td>
																<td class="text-center"><?php echo $row_order['qty']; ?></td>
																<td class="text-center"><?php echo $row_order['flavour_name']; ?></td>
																<td class="text-right"><?php echo $row_order['weight']; ?></td>
																<td class="text-center"><?php echo $row_order['gst']; ?></td>
																<td class="text-center"><?php echo $row_order['delivery_date']; ?></td>

                                                                <td class="text-center"><?php echo $row_order['pick_up_time']; ?></td>	
																<td class="text-center"><?php echo $row_order['street_address'].' '.$row_order['appartment_details'].' '.$row_order['pincode']; ?></td>	
                                                                <td class="text-center"><?php if($row_order['is_item_delivered']==1){ echo "DELIVERED";} else{ echo "NOT DELIVERED";} ?></td>															     																
																
																<input type="hidden" value="<?php echo $row_order['order_detail_id']; ?>" id="id1" name="id1">
																<td><button href='' type="submit" data-type="confirm" class="btn btn-link" title="Status"  id='<?php echo $row_order['order_detail_id'];?>' name="btn_status"><i class="fa fa-edit"></i></button></td>															    
															    </form>
															</tr>
                                                            <?php } 
    ?>
															<tr>
																<td></td>
																<td></td>
																<td class="text-center"><strong>Subtotal</strong></td>
																<td class="thick-line text-right"><?php echo $row_order1['sub_total']; ?></td>
															</tr>
															<tr>
																<td></td>
																<td></td>
																<td class=" text-center"><strong>GST Total</strong></td>
																<td class=" text-right"><?php echo $row_order1['GST_total']; ?></td>
															</tr>
															<tr>
																<td></td>
																<td></td>
																<td class=" text-center"><strong>Shipping</strong></td>
																<td class=" text-right"><?php echo $row_order1['shipping_cost']; ?></td>
															</tr>															
															<tr class="panel-footer">
																<td></td>
																<td></td>
																<td class=" text-center"><strong>Total</strong></td>
																<td class=" text-right"><?php echo $row_order1['final_total']; ?></td>
															</tr>

														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- #row -->
			</div>
<?php
	include_once('footer.php');
?>