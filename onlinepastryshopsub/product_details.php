<?php 

  include_once('header_client.php');

		$date=date("Y-m-d");
  	$fetch_d_q="select * from order_not_available_tbl order by date_id desc limit 1";
	$fetch_d=mysql_query($fetch_d_q,$con);
	while($row = mysql_fetch_array($fetch_d))
		{
		$d=$row['date1'];
	
		$date=date("Y-m-d");
		//$date = date('y-m-d');
	

		}
  
   $fetch_product="select p.* , g.igst from product_tbl as p
				   LEFT JOIN gst_tbl as g ON p.gst_slab_id = g.gst_slab_id 
				   where p.product_id='".$_REQUEST['product_id']."'";
				   
   $row_product=mysql_query($fetch_product,$con);
   $rows_product=mysql_fetch_array($row_product);
   $te  = $rows_product['theme_id'];
   
   
  
  
   if(isset($_POST["btnadd"]))
   {
	  
   	    $log = $_SESSION['login_client'];
   	  
   	 
        if(isset($_POST["flavour_txt"]))
        {
              $flavour = $_POST["flavour_txt"];
        }
      
	    $order_number = "";
		$qty = $_POST["demo_vertical2"];
		$gst = $_POST["gst"];
		$rate = floatval($_POST["price"]) * floatval($_POST["weight_1"]) * floatval($qty);
		
		$gst_amt = ($rate * floatval($gst)) / 100;
		
        $insert_order_details_q="insert into order_details(order_number, customer_id , product_id, qty ,rate, weight, flavour_id, message_on_pastry, 
		gst,delivery_date,pick_up_time) values('".$order_number."','".$log."' ,'".$_POST["productid"]."','".$qty."',
		'".$rate."','".$_POST["weight_1"]."','".$flavour."',
		'".$_POST["messageoncake"]."','".$gst_amt."','".$_POST['datepicker']."','".$_POST['delivery_time']."')";
                           
   	    $insert_order_details=mysql_query($insert_order_details_q,$con);
   	    if(!$insert_order_details)
		{
			echo "OOPS!!! add to cart Not Inserted/Updated.".mysql_error();
		}	
        echo "<script>window.location = 'cart.php';</script>";
   }
   
?>

      <section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Product Details</h3>
        			<ul>
        				<li><a href="#">Home</a></li>
        				<li><a href="#">Product Details</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
<head>

        <link href='jquery-ui.min.css' rel='stylesheet' type='text/css'>
        <script src='jquery-3.0.0.js' type='text/javascript'></script>
        <script src='jquery-ui.min.js' type='text/javascript'></script>
        
        <script type='text/javascript'>
		function abc()
		{

				var a=document.getElementById('datepicker').value;   
	
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() 
			{
                 if (this.readyState == 4 && this.status == 200)
					 {
                        document.getElementById("e").innerHTML = this.responseText;
                        document.getElementById("e_r").innerHTML = this.responseText;						
                     }
            };
        xmlhttp.open("GET","date_check.php?q="+a,true);
        xmlhttp.send();
		}
		function flavour()
		{

			document.getElementById("flav").innerHTML = document.getElementById('flavour_txt').selectedIndex;
            alert(document.getElementById('flavour_txt').selectedIndex);			
		}
		
		
    /*    $(document).ready(function(){

            $('#datepicker').datepicker({
                dateFormat: "yy-mm-dd",
				maxDate: new Date('<?php echo $d; ?>'),
				minDate: new Date('<?php echo $date; ?>')
				

            });

        });*/
        
		function validation()
    {


	var flag=0;
	
	var datepicker=document.getElementById('datepicker').value;
	if(datepicker=="")
	{
        alert("d");
		document.getElementById('e').innerHTML = "Please Enter Delivery Date";	
        flag=1;	
	}
	else
	{
		var e1=document.getElementById('e_r').value;
		
		if(document.getElementById('e_r').value=="1")
		{
           
		   			document.getElementById('e').innerHTML = "Please Enter Delivery Date";	
			        flag=1;			
			
		}
		else
		{
			
                document.getElementById('e').innerHTML = "";
				
	
		
		}	
		
	
	}		
	var delivery_time=document.getElementById('delivery_time').value;
	
	if(delivery_time=="")
	{

		document.getElementById('time').innerHTML = "Please Enter Delivery Time";	
        flag=1;	
	}
	else
	{

		document.getElementById('time').innerHTML = "";		
	
	}	
	

		var weight_1=document.getElementById('weight_1').selectedIndex;
   
	if(weight_1==0)
	{

		document.getElementById('weight').innerHTML = "Please Select Weight";	
        flag=1;	
	}
	else
	{

		document.getElementById('weight').innerHTML = "";		
	
	}	

	/*var flav=document.getElementById('flav').value;
  
	if(flav=="")
	{

		document.getElementById('flav_e').innerHTML = "Please Select Flavour";	
        flag=1;	
	}
	else
	{

		document.getElementById('flav_e').innerHTML = "";		
	
	}	*/

	if(flag==1)
	{

		return false;
	}
	return true;
}

        </script>
    </head>		
<!--================End Main Header Area =================-->
        
<!--================Product Details Area =================-->
						
<section class="product_details_area p_100">
	<form id="add" name="add" method="post" action=""  onSubmit="return validation()">
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
					     <h6>Date</h6>
                       <span id="e" class="text-danger" style="float:right;"></span>
                          <input type='date' id="datepicker" name="datepicker" min="<?php echo $date;?>" onchange="abc()" style="width: 369px;" />
						
					</div> 
						
				   <div class="quantity_box">
					     <h6>Pick Up Time</h6>
						 <span id="time" class="text-danger" style="float:right;"></span>
                         <input type="time" class="form-control" id="delivery_time" name="delivery_time"  style="width: 369px;">
						
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
						<span id="weight" class="text-danger" style="float:right;"></span>						
						<?php 
						$max1=$rows_product['max_weight']; 
						$min1=$rows_product['min_weight'];
						?>
						<select id="weight_1" name="weight_1" class="col-lg-12" style="height: 30px;">
						<option value="0"></option>
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
						<h6>Flavour<span id="flav_e" class="text-danger" style="float:right;"></span></h6>
												
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
									
								<input id="<?php echo "question" . $i;?>" type="radio" onchange="flavour()" class="with-font" value="<?php echo $rows_flavour['flavour_id'];?>" name="flavour_txt">

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
						<input type="hidden" name="flav" id="flav" style="width: 373px;">						
					</div>
				 	<input type="hidden" name="gst" id="gst" value="<?php echo $rows_product['igst'];  ?>" /> 		
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