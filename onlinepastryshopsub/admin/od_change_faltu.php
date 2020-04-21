<?php
	include_once('header.php');
	include_once('connection.php');
	if(isset($_POST['btn_view']))
	{
		?><script>window.location = 'order_details.php?order_=<?php echo $_POST['orderid'];?>';</script><?php

	}
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default panel-with-options">
			<div class="panel-heading">
				<h3 class="panel-title">Product Data Table</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
				    <form action="" method="post">
					<table class="table table-striped table-bordered datatable">
						<thead>
							<tr>
								<th>SR </th>
								<th>Product Image</th>
								<th>Quantity</th>
								<th>Rate</th>
								<th>Weight</th>
								<th>Flavour</th>
								<th>Message On pastry</th>
						        <th>Gst</th>


							</tr>
						</thead>
						<tbody>
							
							<?php

								$counter = 1;
								$q="select od.*,p.product_image,f.flavour_name from order_details as od 
                                LEFT JOIN product_tbl as p ON od.product_id = p.product_id
								LEFT JOIN flavour as f ON od.flavour_id = f.flavour_id
								where order_number='".$_REQUEST['order_number']."'";
								

								$rs_order = mysql_query($q,$con);
								while($row_order = mysql_fetch_array($rs_order))
								{?>
										
									<tr>	
									<td><?php echo $counter++; ?></td>
							        <td>
                                      <img id="img1" src="image_product/<?php echo $row_order['product_image']; ?>" style="width: 100px; height: 100px;" alt="Image1">
									</td>
								    <td><?php echo $row_order['qty']; ?></td>
									<td><?php echo $row_order['rate']; ?> </td>

									<td><?php echo $row_order['weight']; ?> </td>
									 
									<td><?php echo $row_order['flavour_name']; ?> </td>
									
									<td><?php echo $row_order['message_on_pastry']; ?> </td>																											
									<td><?php echo $row_order['gst']; ?> </td>
									

                                    									
									                                  
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
</div>
<?php
	include_once('footer.php');
?>