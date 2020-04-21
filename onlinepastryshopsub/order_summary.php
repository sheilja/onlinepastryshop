<?php
	include_once('header_client.php'); 
	
	
	if(!isset($_SESSION['login_client']))
	{

		echo "<script>window.location = 'sign_in_client.php';</script>";
		
	}
	else
	{	
		include('encrypt_decrypt.php');
		
		$fetch_ordermaster_q="select o_m.*,u.user_email from order_master as o_m
		LEFT JOIN user_register as u on o_m.customer_id=u.user_id
		where o_m.order_number = '".$_REQUEST['ordernumber']."'";
		
		$fetch_ordermaster=mysql_query($fetch_ordermaster_q,$con);
		$fetch_ordermaster_row = mysql_fetch_array($fetch_ordermaster);
		$cus=$fetch_ordermaster_row['customer_id'];

		$shippingcost = $fetch_ordermaster_row['shipping_cost'];
		$dis_c = $fetch_ordermaster_row['discount'];
		
		
		
		//Place Order Code Here Start
		if(isset($_POST['place_order']))
		{
            $fetch_order_d_q="select *from order_details where is_order_completed=0 and customer_id='".$_SESSION['login_client']."'";
			$fetch_order_d=mysql_query($fetch_order_d_q,$con);
			
			while($fetch_order_d_row=mysql_fetch_array($fetch_order_d))
			{
			
			$fetch_date_q = "select * from order_not_available_tbl where date1='".$fetch_order_d_row['delivery_date']."'";
			echo $fetch_date_q;
			$fetch_date=mysql_query($fetch_date_q,$con);
			if($fetch_date_row=mysql_fetch_array($fetch_date))
			{
				$p_o=$fetch_date_row['placed_order'];
			$p_o=$p_o+(($fetch_order_d_row['weight'])*($fetch_order_d_row['qty']));
			$update_limit_q="update order_not_available_tbl set placed_order='".$p_o."' where date1='".$fetch_order_d_row['delivery_date']."'";
			
			$update_limit=mysql_query($update_limit_q,$con);
			}
			else{
				$gh=($fetch_order_d_row['weight'])*($fetch_order_d_row['qty']);
				$insert_limit_q="insert into order_not_available_tbl(date1,max_weight,placed_order) values('".$fetch_order_d_row['delivery_date']."','5','".$gh."')";
			    $insert_limit_q=mysql_query($insert_limit_q,$con);			    
			}
			}
			
			
			$payment="cash";
			$update_master_q="update order_master set sub_total='".$_POST['subtotal']."',GST_total='".$_POST['gsttotal']."',final_total='".$_POST['finaltotal']."',is_order_completed = '1',payment_method = '".$payment."' where order_number='".$_POST['ordernumber']."'";								  
		    $update_master=mysql_query($update_master_q);
		    if(!$update_master)	
		    {
			    die('Not Updated'.mysql_error());
		    }
            
			
			$payment="cash";
			$update_details_q="update order_details set is_order_completed='1' where order_number='".$_POST['ordernumber']."'";								  
		    $update_details=mysql_query($update_details_q);
		    if(!$update_details)	
		    {
			    die('Not Updated'.mysql_error());
		    }
			

			$order_nu = $_POST['ordernumber'];
			
			$to=$fetch_ordermaster_row['user_email'];
			//$to="sheiljagandhi156@gmail.com";
			$subject="Pastry Queen";
			$txt="Your Order Is Received.Thank Uou For Order";
			$header="From: sheiljagandhi603@gmail.com";
			mail($to,$subject,$txt,$header);

			$too="sheiljagandhi603@gmail.com";
			//$to="sheiljagandhi156@gmail.com";
			$subjecto="Pastry Queen";
			$txto="One New Order Received";
			$headero="From: sheiljagandhi603@gmail.com";
			mail($too,$subjecto,$txto,$headero);
            
            
$update_u="update user_register set coupon_code='0'  where user_id='".$_SESSION['login_client']."'";
mysql_query($update_u,$con);

			echo "<script>window.location = 'cash_on_delivery1.php?abcd=$order_nu';</script>";
			
		   
		}

?>
<section class="banner_area">
	<div class="container">
		<div class="banner_text">
			<h3>Checkout</h3>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="product-details.html">Order Summary</a></li>
			</ul>
		</div>
	</div>
</section>
<section class="billing_details_area p_100">
            
	<div class="container">
		
		<div class="row">

			<div class="col-lg-5">
				<div class="order_box_price">
					<div class="main_title">
						<h2>Your Order
					
						</h2>
					</div>
					<div class="payment_list">
						<div class="price_single_cost">
							
							<?php 

						    $fetch_add_to_cart_q="select od.* , p.* from order_details as od
							LEFT JOIN  product_tbl	as p ON od.product_id = p.product_id
							where od.order_number='".$_REQUEST['ordernumber']."' ORDER BY od.order_detail_id DESC";
                            							
							$fetch_add_to_cart=mysql_query($fetch_add_to_cart_q,$con);
							$stotal=0;
							$gsttotal=0;
                            $weight_total=0;
					        
						
							while($fetch_add_to_cart_row = mysql_fetch_array($fetch_add_to_cart))
							{
								$stotal+=$fetch_add_to_cart_row['rate'];
								$gsttotal+=$fetch_add_to_cart_row['gst'];
								$weight_total+=$fetch_add_to_cart_row['weight']*$fetch_add_to_cart_row['qty'];
								?>
								
								<h5><?php echo $fetch_add_to_cart_row['product_name'];?><span><?php echo $fetch_add_to_cart_row['rate']; ?></span></h5>
									
							<?php
							}
							?>
							<h3></h3>
                            
							<h4>Subtotal <span><?php echo $stotal; ?></span></h4>
							<h4>GST total <span><?php echo $gsttotal; ?></span></h4>
							<h4>Shipping Cost <span><?php echo $shippingcost?></span></h4>	
							<h4>Discount <span><?php echo $dis_c?></span></h4>	
							
                            <?php $ftotal=$stotal+$gsttotal+$shippingcost-$dis_c; ?>

							<h3>Final Total <span><?php echo $ftotal?></span></h3>
							<form method="post" action="">
							<input type="hidden" id="weighttotal" name="weighttotal" value="<?php echo $weight_total;?>">
							<input type="hidden" id="ordernumber" name="ordernumber" value="<?php echo $_REQUEST['ordernumber'];?>">
							<input type="hidden" id="subtotal" name="subtotal" value="<?php echo $stotal;?>">
							<input type="hidden" id="gsttotal" name="gsttotal" value="<?php echo $gsttotal;?>">
							<input type="hidden" id="shippingcost" name="shippingcost" value="<?php echo $shippingcost;?>">
							<input type="hidden" id="dicount1" name="dicount1" value="<?php echo $dis_c;?>">
							<input type="hidden" id="finaltotal" name="finaltotal" value="<?php echo $ftotal;?>">
							<input type="radio" name="payment_m" id="payment_m" checked> Cash On delivery<br>
							<button type="submit" value="submit" name="place_order" id="place_order" class="btn pest_btn">place order</button>
							</form>
						</div>

					</div>


							</div>
					
				</div>
			</div>
		</div>
	</div>

</section>
		

<?php
	}
	include_once('footer_client.php'); 
?>