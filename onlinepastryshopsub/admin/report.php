<?php
    include_once('header.php');
	
?>
<div class="row csk-breadcrumb">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h4 class="page-title">Report Master</h4>
	</div>
	<div class="col-lg-9 col-md-8 col-sm-8 hidden-xs">
		<ol class="breadcrumb">
			<li><a href="#">Dashboard</a></li>
			<li><a href="#">Report Master</a></li>
		</ol>
	</div>
</div>
<!-- #Breadcrumb -->

<!-- row -->
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-defaut">

			<div class="panel-body">
				<form action="" method="post" name="frmCategory" id="frmCategory" onSubmit="return validation()">
					<div class="form-body">
						<div class="row">
									
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">From</label>
								   
									<input type="date" class="form-control" id="from" name="from">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label">To</label>
									
									<input type="date" class="form-control" id="to" name="to">
								</div>
							</div>
						</div>
					</div>
					<div class="form-actions">

						<div class="col-md-6">
						<input type="submit" class="btn btn-success" name="btnReport" id="btnReport" value="SEARCH">
					    </div>

					</div>
				</form>
			</div>
			<?php
					if(isset($_POST['btnReport']))
					{
						?>
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

						       	<th>Ordder Status</th>						            						        
						        <th>delivery Status</th>
						        
							</tr>
						</thead>
						<tbody>
							
							<?php

								$counter = 1;
					
								$q="select od.* , ur.* from order_master as od LEFT JOIN user_register as ur ON od.customer_id = ur.user_id where is_order_completed='1' and is_order_delivered='1' and od.order_date>'".$_POST['from']."' and od.order_date<'".$_POST['to']."' ORDER BY od.order_id DESC";
	

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

									<td><?php echo $row_order['is_order_completed']; ?> </td>		
									<td><?php echo $row_order['is_order_delivered']; ?> </td>	
                                    									

                                  
									</tr>		
								<?php
								}
							?>
							
						</tbody>
					</table>
					<a href="report_print.php?from=<?php echo $_POST['from']; ?>&to=<?php echo $_POST['to'];?>" target="_blank" class="btn btn-default">Print</a>
					
					</form>
				</div>
			</div>
					<?php } ?>
		</div>
	</div>
</div>
<?php
if(isset($_POST['btnReport']))
	{
	   
	}
?>


















<?php
    include_once('footer.php');
?>        