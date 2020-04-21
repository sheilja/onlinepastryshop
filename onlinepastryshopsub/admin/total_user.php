<?php
	include_once('header.php');
?>
			<!-- Page Content -->
			<div id="page-content-wrapper">
				<!-- Breadcrumb  -->

				<!--#Breadcrumb -->
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-primary">
							<div class="panel-heading">



							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12">
										<div class="panel panel-default">
											<div class="panel-heading">
												<h3 class="panel-title csk">
												<strong>Total User Details</strong>
												</h3>
											</div>
											<div class="panel-body">
												<div class="table-responsive">
													<table class="table table-condensed table-striped">
														<thead>
															<tr>
																<td><strong>Item</strong></td>
																<td class="text-center"><strong>User Email</strong></td>
																<td class="text-center"><strong>User Mobile</strong></td>
																<td class="text-center"><strong>User Passsword</strong></td>
																<td class="text-center"><strong>Street Address</strong></td>
																<td class="text-center"><strong>Pincode</strong></td>	
																<td class="text-center"><strong>Appartment Details</strong></td>																		
															</tr>
														</thead>
														<tbody class="csk1">
														<?php
															$counter = 1;
															$date=date("Y-m-d");
															
															$q="select od.*,p.product_image,p.product_name,p.price_per_kg,f.flavour_name from order_details as od 
															LEFT JOIN product_tbl as p ON od.product_id = p.product_id
															LEFT JOIN flavour as f ON od.flavour_id = f.flavour_id
															where is_item_delivered='1'";
															
                                                            $q="select *from user_register";
															$rs_order = mysql_query($q,$con);
															while($row_order = mysql_fetch_array($rs_order))
															{?>
														
														
															<tr>
																<td><?php echo $row_order['user_full_name']; ?></td>
																<td class="text-center"><?php echo $row_order['user_email']; ?></td>
																<td class="text-center"><?php echo $row_order['user_mobile']; ?></td>
																<td class="text-center"><?php echo $row_order['user_password']; ?></td>
																<td class="text-center"><?php echo $row_order['street_address']; ?></td>
																<td class="text-center"><?php echo $row_order['pincode']; ?></td>
																<td class="text-center"><?php echo $row_order['appartment_details']; ?></td>
															</tr>
                                                            <?php } 
    ?>


														


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