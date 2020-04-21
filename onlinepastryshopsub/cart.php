
<?php
    include_once('header_client.php');
	
		$date=date("Y-m-d");
		

    	$customer_id = $_SESSION['login_client']; 
	

	 if(isset($_POST['btnD']))
	 {
		 

		 $delete_order_details_q="delete from order_details where order_detail_id='".$_POST['oid']."'";
		 $delete_order_details=mysql_query($delete_order_details_q,$con);
  
	 }
	 	 if(isset($_POST['coupon_c']))
	 {
		 
    
		
	 }
?>

<section class="banner_area">
  <div class="container">
    <div class="banner_text">
      <h3>Your Cart</h3>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="cart.php">Your Cart</a></li>
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
								<th scope="col">Preview</th>
								<th scope="col">Product</th>

								<th scope="col">Flavour</th>
							    <th scope="col">weight</th>
								<th scope="col">Quantity</th>
								
								<th scope="col">Total</th>
								<th scope="col">Delivery date</th>
								<th scope="col">Pick Up Time</th>
								<th scope="col">Action</th>
							
							</tr>
						</thead>
						<tbody>
						<?php 
						
						
						$fetch_order_details_q = "select od.* , p.product_image , p.product_name , p.max_weight , p.min_weight , p.price_per_kg , g.igst  from order_details as od  
						LEFT JOIN product_tbl as p ON od.product_id = p.product_id  
						LEFT JOIN gst_tbl as g ON p.gst_slab_id = g.gst_slab_id  
						where od.customer_id = '".$customer_id."' AND od.is_order_completed = 0";
						$fetch_order_details=mysql_query($fetch_order_details_q,$con);
						
						?>
<?php
						$sub_total = 0;
						$gst_total = 0;
						
						while($fetch_order_details_row = mysql_fetch_array($fetch_order_details))
						{
							$sub_total +=  $fetch_order_details_row['rate'];
							$gst_total +=  $fetch_order_details_row['gst'];
						?>
                                    
							<tr>
							
								<td>

									<img src="admin/image_product/<?php echo $fetch_order_details_row['product_image'];?>" alt="" height="120px" width="132px">
								</td>
								<td style="padding:35px 7px;">
								    <?php echo $fetch_order_details_row['product_name'];?>
							    </td>
								<form action="" method="post">
								
								    <?php $price_disp = $fetch_order_details_row['price_per_kg'];
								   // echo $price_disp;
								    ?>
								    <input type="hidden" value="<?php echo $price_disp;?>" id="hidden_price" name="hidden_price">
								
								
								<td style="padding:35px 7px;">
								    
								   	<?php
						            $fetch_flavour="select * from flavour";
						            $row_flavour=mysql_query($fetch_flavour,$con);
                                    $fa = $fetch_order_details_row['flavour_id'];
						            ?>
									<select class="product_select" id="flavour_select" name="flavour_select" style="width: 168px;"><?php
						            while ($rows_flavour=mysql_fetch_array($row_flavour)) 
							        {
						                      ?>	
										      <option value="<?php echo $rows_flavour['flavour_id']; ?>" <?php if($fa==$rows_flavour['flavour_id']){ echo "selected"; } ?>><?php echo $rows_flavour['flavour_name'];?></option>
                                              <?php } ?>
									</select>
                             
								</td>
								    <?php  $weight_order = $fetch_order_details_row['weight'];?>
								
							    <td style="padding:35px 7px;">
								    
								    <?php 
					                $max1=$fetch_order_details_row['max_weight']; 
        						    $min1=$fetch_order_details_row['min_weight'];
        						    ?>
										<select class="product_select" id="weight_select" name="weight_select" style="width: 168px;" onchange="change_e(<?php echo $fetch_order_details_row['order_detail_id']?>)">
        						    <?php
								    for ($i=$min1; $i <=$max1 ; $i=$i+1.00) 
								    { 
							        ?>
							    	 <option value="<?php echo $i; ?>" <?php if($weight_order==$i){ echo "selected"; } ?>><?php echo $i."(".$fetch_order_details_row['price_per_kg']*$i.")"; ?></option>
									<?php
                                    }
        						    ?>
                            	    </select>
								  
								  
								</td>
								<input type="hidden" id="oid" name="oid" value="<?php echo $fetch_order_details_row['order_detail_id'];?>">
								<input type="hidden" id="gst_per" name="gst_per" value="<?php echo $fetch_order_details_row['igst'];?>">
								<?php $qty_order=$fetch_order_details_row['qty'];?>
								<td style="padding:35px 7px;">
									<select class="product_select" id="qty_select" style="width: 168px;" name="qty_select">
										
										<option value="1" <?php if($qty_order=="1"){ echo "selected"; } ?>>1</option>
										<option value="2" <?php if($qty_order=="2"){ echo "selected"; } ?>>2</option>
										<option value="3" <?php if($qty_order=="3"){ echo "selected"; } ?>>3</option> 
										<option value="4" <?php if($qty_order=="4"){ echo "selected"; } ?>>4</option>
										<option value="5" <?php if($qty_order=="5"){ echo "selected"; } ?>>5</option>
									</select>
							
									
								</td>
								

								 
								<td style="padding:35px 7px;">
								     
                                     <div id="t_disp">
								        <?php echo $fetch_order_details_row['rate'];?>
								     </div>
								</td>
                                <td style="padding:35px 7px;">
								<?php
                                  
								  $date1=Date('20y-m-d',strtotime("+2 days"));
								  
								 
								 ?>
								<input  type='date' id="datepicker" class="datepicker" name="datepicker"  min='<?php echo $date1; ?>' style="width: 140px;" value="<?php $flag=0; if($fetch_order_details_row['delivery_date']<$date){ $flag=1;}else{echo $fetch_order_details_row['delivery_date'];} ?>">
								
									<div class="form-group col-md-12" id="e" name="e" style="color:red; margin-bottom:2px;">
									
							      <?php
								  if($flag==1)
								  {
									  echo "PLEASE RESET THE DELIVERY DATE";
								  }
							if(isset($_POST['btnQ']))
							 {				

							    $a1=$_POST['datepicker'];
								$fech_date_q="select * from order_not_available_tbl where date1='".$a1."'";
								$fech_date=mysql_query($fech_date_q,$con);
                               						
								if($fech_date_row=mysql_fetch_array($fech_date))
								{
									$max=$fech_date_row['max_weight'];
									$placedorder=$fech_date_row['placed_order'];
								
									if($placedorder>$max || ($fech_date_row['date_availability'])==1)
									{

										echo "THIS DILIVERY DATE IS NOT AVAILABLE";
									}
									else{
									    $ra = floatval($_POST['qty_select']) * floatval($_POST['weight_select']) * floatval($_POST['hidden_price']);
										   
										   $gst_amt = ($ra * floatval($_POST['gst_per'])) / 100;
										   
										   
										   $update_order_details_q="update order_details set qty='".$_POST['qty_select']."',rate='".$ra."',
										   weight='".$_POST['weight_select']."',flavour_id='".$_POST['flavour_select']."',delivery_date='".$_POST['datepicker']."',pick_up_time='".$_POST['pick_up_time']."',gst = '".$gst_amt."'
										   where order_detail_id='".$_POST['oid']."'";
										   echo $update_order_details_q;
										   $update_order_details=mysql_query($update_order_details_q,$con);
											echo "<script>window.location = 'cart.php';</script>";
									}

									
									
								}
								else
									{
																		  
										   $ra = floatval($_POST['qty_select']) * floatval($_POST['weight_select']) * floatval($_POST['hidden_price']);
										   
										   $gst_amt = ($ra * floatval($_POST['gst_per'])) / 100;
										   
										   
										   $update_order_details_q="update order_details set qty='".$_POST['qty_select']."',rate='".$ra."',
										   weight='".$_POST['weight_select']."',flavour_id='".$_POST['flavour_select']."',delivery_date='".$_POST['datepicker']."',pick_up_time='".$_POST['pick_up_time']."',gst = '".$gst_amt."'
										   where order_detail_id='".$_POST['oid']."'";
										   echo $update_order_details_q;
										   $update_order_details=mysql_query($update_order_details_q,$con);
											echo "<script>window.location = 'cart.php';</script>";	   

									}

								//echo "<script>window.location = 'cart.php';</script>";
								//redirect jav

							 }
								  ?>
				                    </div>
								</td>
                                <td style="padding:35px 7px;">
								<input type='time' id="pick_up_time" style="width: 140px;" name="pick_up_time" style="width: 240px;;" value="<?php echo $fetch_order_details_row['pick_up_time']; ?>" style="width: 200px;">
		                        </td>										
                          
						
					

								
								<td style="padding:35px 7px;">
								     <button type="submit" name="btnQ" class="btn" id="<?php echo $fetch_order_details_row['order_detail_id'];?>">Update</button>
								     <button type="submit" name="btnD" class="btn" id="<?php echo $fetch_order_details_row['order_detail_id'];?>" style="margin-block-start:20px;">Cancel</button>
								</td>
								</form>
							</tr>
						
			                 			
							<?php
						}
						    $final_total = $sub_total + $gst_total;
						    $dis=0;
						    ?>
						  			
						<?php
                        
						?>
						
							<tr>

								<td>
								<?php $fetch=mysql_query($fetch_order_details_q,$con);
							if($s=mysql_fetch_array($fetch))
							{ ?>
									<form class="form-inline"> 
										<div class="form-group"> 
											<input type="text" name="coupon_t" id="coupon_t" class="form-control" placeholder="Coupon code">
										</div>
										<input class="btn" type="button"  id="coupon_c" name="coupon_c" onclick="abc1()" value="Apply Coupon">
									<span id="c_e" class="text-danger" style="float:right;"></span>
									<input id="signal" name="signal" type="hidden">
									</form>
							<?php } ?>
								</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>								
								<td></td>
								<td></td>
								<td></td>

							
								<td>
									
								</td>
							</tr>
						</tbody>
					</table>
				</div>
       			<div class="row cart_total_inner">
        			<div class="col-lg-7"></div>
        			<div class="col-lg-5">
        				<div class="cart_total_text">
        					<div class="cart_head">
        						Cart Total
        					</div>
        					<div class="sub_total">
        						<h5>Sub Total 
							 
                                    <input type="text" style="float: right;height: 48px;border: none;width:70px;" id="ss" name="ss" value="<?php echo $sub_total;?>"></h5>
        					</div>
							
							<div class="sub_total">
        						<h5>GST Total
								<input type="text" style="float: right;height: 48px;border: none;width:70px;" id="gst_1" name="gst_1" value="<?php echo $gst_total;?>"></h5>
										</h5>
        					</div>
							<div class="sub_total">
        						<h5>Discount 
								<?php 
                                    ?><input type="text" style="float: right;height: 48px;border: none;width:70px;" id="discount" name="discount" value="0"></h5>
        					</div>
        					<div class="total">
        						<h4>Total 		
								<?php 
                                   ?><input type="text" style="float: right;height: 48px;border: none;width:70px;" id="final" name="final" value="<?php echo $final_total;?>">
								   
								  </h4>
        					</div>
			            
        					<div class="cart_footer">
							<?php
							$fetch=mysql_query($fetch_order_details_q,$con);
							if($s=mysql_fetch_array($fetch))
							{
							?>
							<button type="button" class="pest_btn" name="proceed_to_chekout" id="proceed_to_chekout" onclick="validation()">Proceed to Checkout</button>
        				    <?php } ?>
        					</div>

							<center><span id="er" class="text-danger" style="float:right;"></span><center>
        				</div>
        			</div>
        		</div>
        	</div>
						
						</form>
        </section>

	<script type="text/javascript">
	function abc1()
    {

		var co=document.getElementById('coupon_t').value;
			var o_n="1";
		 var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("c_e").innerHTML =
            this.responseText;
					//		window.location.href = 'cart.php';
					if(document.getElementById('signal').value==1)
					{
						var b=(document.getElementById('final').value*5)/100;
						document.getElementById('final').value=document.getElementById('final').value-b;
						document.getElementById('discount').value=b;
						document.getElementById('coupon_c').setAttribute("type","hidden");
				
					}
					else{
					document.getElementById('c_e').innerHTML="YOUR CODE IS NOT MATCH";
					}
					

				   }
				};
				xhttp.open("GET", "coupon_check.php?coupon="+co, true);
				xhttp.send();
	
	}
		function validation()
    {
		 var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("signal").innerHTML =
            this.responseText;
		
				if(document.getElementById("er").textContent=="1")
				{
				
					 document.getElementById('er').innerHTML = "Please Update Deleivery Date";	
					 	return false;
				}
				else{
					var d=document.getElementById('discount').value;
					window.location.href = "check_out.php?dis="+d;
				}
				   }
				};
				xhttp.open("GET", "date_fill.php", true);
				xhttp.send();
	
/*		alert("bb");


	var flag;
	           var datepicker1=document.querySelectorAll('.datepicker');

				var i;
                var flag=0;
				for(i=0;i<datepicker1.length;i++)
				{
					if(datepicker1[i].value==0)
					{
					flag=1;
					}

				}

	
	if(flag==1)
	{
		document.getElementById('er').innerHTML = "PLEASE FILL THE DELIVERY DATE FOR ALL PRODUCT";	
	
		return false;
	}
	else{
		window.location.href = 'check_out.php';
	}*/
	return true;
}

</script>
<head>

        <link href='jquery-ui.min.css' rel='stylesheet' type='text/css'>
        <script src='jquery-3.0.0.js' type='text/javascript'></script>
        <script src='jquery-ui.min.js' type='text/javascript'></script>
        
        <script type='text/javascript'>
		function abc()
		{

			
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() 
			{
                 if (this.readyState == 4 && this.status == 200)
					 {
                        document.getElementById("date_go").innerHTML = this.responseText;
                     }
            };
        xmlhttp.open("GET","date_check.php",true);
        xmlhttp.send();
		if()
		}
		
		

        });
        

        </script>
    </head>
	
<?php
include_once('footer_client.php');
?>