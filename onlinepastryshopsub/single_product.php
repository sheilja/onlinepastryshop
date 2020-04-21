<?php

  include_once('header_client.php');
  include_once('connection.php');
  
  
  
   $fetch_product="select * from product_tbl where product_id='".$_REQUEST['product_id']."'";
   $row_product=mysql_query($fetch_product,$con);
   $rows_product=mysql_fetch_array($row_product);
   $te  = $rows_product['theme_id'];
   
   
  
  
   if(isset($_POST["btnadd"]))
   {
	   echo "xd";
   	   $log=$_SESSION['login_client'];
   	   
	   $shipping_cost1=0;
   	   $is_order_completed=0;
   	   $is_order_deliverd=0;

   	 
        if(isset($_POST["flavour_txt"]))
        {
              $f=$_POST["flavour_txt"];
        }
      
   	   $search_cus_q="select * from order_master where customer_id='".$log."' and is_order_completed =0";
       $search_cus=mysql_query($search_cus_q,$con);
       $gst_search_q="select * from product_tbl where product_id='".$_POST["productid"]."'";
       $gst_search=mysql_query($gst_search_q,$con);
       if($gst_search_row=mysql_fetch_array($gst_search))
       {
       	    $gstid=$gst_search_row['gst_slab_id'];
       }
       echo $gstid;
      $gst_value_q="select * from gst_tbl where gst_slab_id='".$gstid."'";
       $gst_value=mysql_query($gst_value_q,$con);
     
       $gstigst=0;
       if($gst_value_row=mysql_fetch_array($gst_value))

       {

       	    $gstigst=$gst_value_row['igst'];       	           	    
       }       

       $gstigst=($_POST["price"]*$_POST["weight_1"]*$_POST["demo_vertical2"]*$gstigst)/100;
       $gsttotal=$gstigst;
       $finaltotal=$gsttotal+$_POST["price"]*$_POST["demo_vertical2"]*$_POST["weight_1"];
       if($search_cus_row=mysql_fetch_array($search_cus))
       {
       	  $gsttotal1=$search_cus_row['GST_total'];
       	  $gsttotal1=$gsttotal1+$gsttotal;
       	  $ss2=$search_cus_row['sub_total'];
       	   $ss2=$ss2+$_POST["price"]*$_POST["weight_1"]*$_POST["demo_vertical2"];
       	   $f2=$search_cus_row['final_total'];
       	   $f2=$f2+$gsttotal+$_POST["price"]*$_POST["weight_1"]*$_POST["demo_vertical2"];
           $update_order_master_q="update order_master set sub_total='".$ss2."',final_total='".$f2."',GST_total='".$gsttotal1."' where customer_id='".$log."' and is_order_completed	='".$os1."'";
           $update_order_master=mysql_query($update_order_master_q,$con);
             if(!$update_order_master)
				{
					echo "OOPS!!!.".mysql_error();
				}
		
       }
       else
       {
		   $m=1;
		   
		   $insert_order_master_q="insert into order_master(customer_id,sub_total,GST_total,shipping_cost,final_total,is_order_completed,
		   is_order_delivered,payment_method_id) values
		   ('".$log."','".$_POST["price"]*$_POST["weight_1"]*$_POST["demo_vertical2"]."','".$gsttotal."','".$shipping_cost1."',
		   '".$finaltotal."','".$is_order_completed."','".$is_order_deliverd."','".$m."')";
		   $insert_order_master=mysql_query($insert_order_master_q,$con);
		   if(!$insert_order_master)
			{
				echo "OOPS!!! add to cart Not Inserted/Updated.".mysql_error();
			}
		   }
		   $search_cus2=mysql_query($search_cus_q,$con);
      if($search_cus2_row=mysql_fetch_array($search_cus2))
       {
       	     $orderid=$search_cus2_row['order_id'];
              $insert_order_details_q="insert into order_details(order_id,product_id,qty,rate,weight,flavour_id,message_on_pastry,gst_slab_id,is_item_delivered) values('".$orderid."','".$_POST["productid"]."','".$_POST["demo_vertical2"]."','".$_POST["price"]*$_POST["weight_1"]*$_POST["demo_vertical2"]."','".$_POST["weight_1"]."','".$f."','".$_POST["messageoncake"]."','".$_POST["gst"]."','".$is_order_deliverd."')";
              
   	   $insert_order_details=mysql_query($insert_order_details_q,$con);
   	   if(!$insert_order_details)
		{
			echo "OOPS!!! add to cart Not Inserted/Updated.".mysql_error();
		}
		
       }
		
   }
   
?>

<section class="banner_area">
	<div class="container">
		<div class="banner_text">
			<h3>Product Details</h3>
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="product-details.html">Product Details</a></li>
			</ul>
		</div>
	</div>
</section>
<!--================End Main Header Area =================-->
        
<!--================Product Details Area =================-->
						
<section class="product_details_area p_100">
	<form if="add" name="add" method="post" action="">
	<div class="container">
		<div class="row product_d_price" class="col-md-12">
			<div class="col-md-6">
		<input type="hidden" name="gst" id="gst" value="<?php echo $rows_product['gst_slab_id'];?>">
				<div class="product_img"><img class="img-fluid" src="admin/image_product/<?php echo $rows_product['product_image']?>" alt="" style="height: 525px;width: 525px;"></div>
			</div>
			<div class="col-md-6">
				<div class="product_details_text">
					
					<h4><?php echo $rows_product['product_name'];?></h4>
				   
				   
					<input type="hidden" name="price" id="price" value="<?php echo $rows_product['price_per_kg'];?>">
					<input type="hidden" name="productid" id="productid" value="<?php echo $rows_product['product_id'];?>">
					<div class="quantity_box" style="margin-top: 15px;width: 285px;">        				
					<h6>Price:<span><?php echo " ";?><i class="fa fa-inr" aria-hidden="true"></i><?php echo " ";?><?php echo $rows_product['price_per_kg'];?></span></h6>
					</div>
					


					<div class="quantity_box">
						<h6>Quantity</h6>
						<select id="demo_vertical2" name="demo_vertical2" class="col-lg-12" style="height: 30px;">
							<option value="1" selected>1</option>
							<option value="2">2</option>
							<option value="2">3</option>
							<option value="4">4</option>
							<option value="5">5</option>									
						</select>
					</div>
				 
														
					<div class="weight_box">
						<h6>Weight</h6>
						<?php 
						$max1=$rows_product['max_weight']; 
						$min1=$rows_product['min_weight'];
						?>
						<select id="weight_1" name="weight_1" class="col-lg-12" style="height: 30px;">
						<?php
						 for ($i=$min1; $i <=$max1 ; $i=$i+1.00) 
						 { 
						 ?>						 
							<option value=<?php echo $i; ?>><?php echo $i."(".$rows_product['price_per_kg']*$i.")"; ?></option>
						<?php
						 }
						?>
						
						
					</select>
			
					</div>
					
   
								
			
					  <div class="flavour_box">
						<h6>Flavour</h6>
					</div>
					<div class="panel panel-default panel-inverse">
					
					<div class="panel-body">
						<div class="font-input">
						<div class="col-md-12" style="margin-bottom: 100px;"> 	
							<?php
						 $fetch_flavour="select * from flavour";
						 $row_flavour=mysql_query($fetch_flavour,$con);
						 $i=0;

					   while ($rows_flavour=mysql_fetch_array($row_flavour)) {
						$i++;
									  ?>	
								
							<div style="float: left;width: 150px;height:30px;">
								<label class="radio-inline">
									
								<input id="<?php echo "question" . $i;?>" type="radio" class="with-font" value="<?php echo $rows_flavour['flavour_id'];?>" name="flavour_txt">

								<label for=<?php echo "question" . $i?>><?php echo $rows_flavour['flavour_name'];?></label></label>

							</div>
					   
							<?php } ?>
							 
						   </div>
						</div>
					</div>
				</div> 
					<div class="quantity_box">
						<h6>Message on Cake</h6>
						<input type="text" name="messageoncake" id="messageoncake" style="width: 373px;">
					</div>
				 
									
					<input type="submit" class="pink_more" value="Add To Cart" id="btnadd" name="btnadd">
				</div>
			</div>
		</div>
		<div class="product_tab_area">
			<nav>
				<div class="nav nav-tabs" id="nav-tab" role="tablist">
					<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Descripton</a>

					<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Review (0)</a>
				</div>
			</nav>
			<div class="tab-content" id="nav-tabContent">
				<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
					<p><?php echo $rows_product['discription1'];?></p>
					
				</div>

				<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
					<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
				</div>
			</div>
		</div>
	</div>
	</form>
</section>
<!--================End Product Details Area =================-->
        
<!--================Similar Product Area =================-->
<?php
	$fetch_product1="select * from product_tbl where theme_id='".$te."'";
	$row_product1=mysql_query($fetch_product1,$con);
?>
<section class="similar_product_area p_100">
	<div class="container">
		<div class="main_title">
			<h2>Similar Products</h2>
		</div>
		<div class="row similar_product_inner">
			<?php
			while($rows_product1=mysql_fetch_array($row_product1))
			 {?>
			<div class="col-lg-3 col-md-4 col-6">
				<div class="cake_feature_item">
					<div class="cake_img">
						<img src="admin/image_product/<?php echo $rows_product1['product_image']?>" alt="" style="height: 270px;width: 226px;">
					</div>
					<div>

						<a class="pest_btn" href="sign_in_client.php?product_id=<?php echo $rows_product1['product_id'];?>">Add To Cart</a>
					</div>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
</section>

<?php
	include_once('footer_client.php');
?>