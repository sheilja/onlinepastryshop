
<?php
    include_once('header_client.php');
?>

<section class="banner_area">
  <div class="container">
    <div class="banner_text">
      <h3>My Order</h3>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="single-blog.html">My Order</a></li>
      </ul>
    </div>
  </div>
</section>
<section class="cart_table_area p_100">
						<form action="" method="post">
        	<div class="container">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
							    <th scope="col">Order Number</th>
								<th scope="col">Order Date</th>
								<th scope="col">Sub Total</th>
								<th scope="col">GST total</th>
								<th scope="col">Shipping Cost</th>
							    <th scope="col">Final Total</th>
								<th scope="col">Delivery Status</th>
                               

							</tr>
						</thead>
						<tbody>
						<?php 
						
						

	                      $os=1;
						$fetch_order_master_q="select *from order_master where customer_id='".$_SESSION['login_client']."' and is_order_completed='".$os."'";
						$fetch_order_master=mysql_query($fetch_order_master_q,$con);
						

						
						while($fetch_order_master_row = mysql_fetch_array($fetch_order_master))
						{
						?>
                                    
							<tr>
								<td>
								    <?php echo $fetch_order_master_row['order_number'];?>
							    </td>
							<td>
								    <?php echo $fetch_order_master_row['order_date'];?>
							    </td>

								<td>
								    <?php echo $fetch_order_master_row['sub_total'];?>
								    
								    
								</td>
																<td>
								    <?php echo $fetch_order_master_row['GST_total'];?>
								    
								    
								</td>
																<td>
								    <?php echo $fetch_order_master_row['shipping_cost'];?>
								    
								    
								</td>
																<td>
								    <?php echo $fetch_order_master_row['final_total'];?>
								    
								    
								</td>
																<td>
								    <?php if($fetch_order_master_row['is_order_delivered']==0)
									{
										echo "NOT DELIEVERD";
									}
									else
									{
										echo "DELIEVED";
									}?>
								    
								    

</td>




							
							</tr>
						
			                 			
							<?php
						}
						    
						    
						    ?>
						  			

						
							<tr>

								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>								
								<td></td>


							</tr>
						</tbody>
					</table>
				</div>

        	</div>
						
						</form>
        </section>

		
<?php
include_once('footer_client.php');
?>