<?php
	include_once('header.php');
	include_once('connection.php');
	if(isset($_POST['btn_view']))
	{
		echo "abc";
		echo $_POST['ordernumber'];
	

	}

	if(isset($_POST['btn_delete']))
	{
		echo "1";
		$dd=1;
		$update_delivery_q="update order_master set is_order_delivered='0' where order_id='".$_POST['orderid']."'";
		$update_delivery=mysql_query($update_delivery_q,$con);

	}
	
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default panel-with-options">
			<div class="panel-heading">
				<h3 class="panel-title">Order Master Data Table</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
				    <form action="" method="post" name="f1">
					<table class="table table-striped table-bordered datatable">
						<thead>
							<tr>
								<th>SR </th>
                                <th>Order Number</th>
								<th>Order Date</th>
								<th>Customer</th>
								<th>Sub Total</th>
								<th>GST Total</th>
								<th>Shipping Cost</th>
						        <th>Final Total</th>

					            						        
						        <th>Order Status</th>
						        <th>Action</th>
							</tr>
						</thead>
						<tbody>
							
							<?php

								$counter = 1;
								$q="select od.* , ur.* from order_master as od LEFT JOIN user_register as ur ON od.customer_id = ur.user_id where is_order_completed='1' ORDER BY od.order_id DESC";
								$rs_order = mysql_query($q,$con);
								while($row_order = mysql_fetch_array($rs_order))
								{?>
										
									<tr>	
									<td><?php echo $counter++; ?></td>
																		

							
									<td><?php echo $row_order['order_number']; ?> <input type="hidden" value="<?php echo $row_order['order_number'];?>" id="ordernumber" name="ordernumber">	</td>
									<td><?php echo $row_order['order_date']; ?> </td>
									<td><?php echo $row_order['user_full_name']; ?> </td>
                                    									 
									
	                                
									<td><?php echo $row_order['sub_total']; ?> </td>
									<td><?php echo $row_order['GST_total']; ?> </td>
									<td><?php echo $row_order['shipping_cost']; ?> </td>																											
									<td><?php echo $row_order['final_total']; ?> </td>

									<td><?php if($row_order['is_order_completed']==1){echo "ORDER PLACED";} else{"NOT PLACED";} ?> </td>		

                                    									
									<td>            
                                             
                                                <button type="button" class="btn btn-info" title="View"  id='<?php echo $row_order['order_number'];?>' name="btn_edit"><i class="fa fa-eye"></i></button>
                                               

					                            <a href="invoice_print_cod1.php?d=<?php echo $row_order['order_number']; ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                                    </td>
                                  
									</tr>		
								<?php
								}
							?>
							
						</tbody>
					</table>
					</form>
				</div>
			</div>
		</div>
	</div>
</div><script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script>
	$(document).ready(function()
	{		
		$('.btn-info').click(function(e)
		{
			e.preventDefault();
			
	
			var order_number1 = $(this).attr("id");
			window.location.href="order_details.php?order_number="+order_number1;
		});
		

       		$('.btn-danger').click(function(e)
		{
			e.preventDefault();
			

			var order_number1 = $(this).attr("id");
			if(confirm("Are you sure you want to delete this?"))
			{
				$.ajax({ url: 'delivery_status.php',
						 data: {'id': order_number1, 'delete': 1},
						 type: 'post',
						 success: function(output) {					 			
									  //window.location.reload();
									  window.location.reload();
								  }
				});
				//window.location.reload();
				//window.location = "category.php";
			}
			else
			{
				return false;
			}
		});
		
	}); 
</script>	

<?php
	include_once('footer.php');
?>