<?php
include_once('header_client.php'); 
	$fetch_d_q="select * from order_not_available_tbl order by date_id desc limit 1";
	$fetch_d=mysql_query($fetch_d_q,$con);
	while($row = mysql_fetch_array($fetch_d))
		{
		$d=$row['date1'];
	
		$date=date("Y-m-d");
		//$date = date('y-m-d');
	

		}?>

<?php
if(!isset($_SESSION['login_client']))
{

     ?><script>window.location = 'sign_in_client.php';</script><?php
}
$fetch_user_q="select *from user_register where user_id='".$_SESSION['login_client']."'";
$fetch_user=mysql_query($fetch_user_q,$con);
if($fetch_user_row=mysql_fetch_array($fetch_user))
{
	$street_address1=$fetch_user_row['street_address'];
	$app_address1=$fetch_user_row['appartment_details'];
	$fullname=$fetch_user_row['user_full_name'];
	$emailadd=$fetch_user_row['user_email'];
	$phone=$fetch_user_row['user_mobile'];
	$pincode1=$fetch_user_row['pincode'];
}

if(isset($_POST['proceed_payment']))
{


									
   if(isset($_POST['address']))
	{
		$update_user_q="update user_register set pincode='".$_POST['pincode']."',user_full_name='".$_POST['full_name']."',user_email='".$_POST['email']."',user_mobile='".$_POST['phone']."',street_address='".$_POST['address']."',appartment_details='".$_POST['address2']."' where user_id='".$_SESSION['login_client']."'";
		//$update_user=mysql_query($update_user_q,$con);
        if(mysql_query($update_user_q ,$con))
			{
                
			}

		$s_q="select *from pincode_tbl where pincode_number='".$_POST['pincode']."'";
		$s=mysql_query($s_q,$con);
		if($s_row=mysql_fetch_array($s))
		{
			$shipping_cost1=$s_row['shipping_charge'];
		}
		 

		
	}

        $sql1_q="select * from order_master where customer_id='".$_SESSION['login_client']."' and is_order_completed='0'";
		$sql1 = mysql_query($sql1_q ,$con);
		if($sql1_row=mysql_fetch_array($sql1))
		{
			$orderno=$sql1_row['order_number'];
			$update_order_master_q="update order_master set discount='".$_REQUEST['dis']."',shipping_cost='".$shipping_cost1."' where order_number='".$orderno."'";
	        $update_order_master=mysql_query($update_order_master_q,$con);
			
    	}
		else{
        $GetOrderNoSql = "SELECT MAX(order_id) as id FROM order_master";
		$resultOrderNo = mysql_query($GetOrderNoSql ,$con);
		$record = mysql_fetch_array($resultOrderNo);
		$nextOrderNo = intval($record['id']) + 1;
		$time=strtotime(date("Y/m/d"));
		$month=date("m",$time);
		$year=date("Y",$time);
		$orderNo = "OB" . $month . $year . rand(101,999) . $nextOrderNo;
		
		$addOrderSql = "INSERT INTO order_master(order_id, order_number, customer_id,shipping_cost,discount) values 
		(".$nextOrderNo.", '".$orderNo."', '".$_SESSION['login_client']."','".$shipping_cost1."','".$_REQUEST['dis']."')";
		$addOrderResult = mysql_query($addOrderSql ,$con);
		
		if($addOrderResult)
		{
			$updateODSql = "update order_details set order_number = '".$orderNo."' where customer_id = '".$_SESSION['login_client']."' AND is_order_completed=0";
			$row=mysql_query($updateODSql ,$con);
			
				
			
			
			
		}


		}
			?><script>window.location = 'order_summary.php?ordernumber=<?php echo $orderno;?>';</script><?php
				
} 
?>
    <section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Checkout</h3>
        			<ul>
        				<li><a href="index.html">Home</a></li>
        				<li><a href="product-details.html">Product Details</a></li>
        			</ul>
        		</div>
        	</div>
    </section>
    <section class="billing_details_area p_100">
            
            <div class="container">
                
                <div class="row">
                	<div class="col-lg-12">
               	    	<div class="main_title" style="padding-bottom:7px;">
               	    		<h2>Billing Details			<?php  ?></h2>
               	    	</div>
						
                		<div class="billing_form_area">
                			<form class="billing_form row" action="" method="post" id="contactForm" novalidate="novalidate">
							    <form method="post" action="">

								
								<div class="form-group col-md-4" style="margin-bottom:2px;">
								    <label for="first">Full Name *</label>
									<input type="text" class="form-control" id="full_name" name="full_name" placeholder="First Name" value="<?php echo $fullname;?>">
								</div>

						<div class="form-group col-md-4" style="margin-bottom:2px;">
													<label for="first">Pincode *</label>
													<select id="pincode" name="pincode"  class="col-lg-12" style="height: 30px;">
													 <option value="0"></option>

														<?php 
														   $fetch_pincode_q="select *from pincode_tbl";
														   $fetch_pincode=mysql_query($fetch_pincode_q,$con);
														   while ($fetch_pincode_row=mysql_fetch_array($fetch_pincode))
														   {
															 ?>
															 <option value="<?php echo $fetch_pincode_row['pincode_number']; ?>" <?php if($fetch_pincode_row['pincode_number']==$pincode1){ echo "selected";}?>><?php echo $fetch_pincode_row['pincode_number']; ?></option>
															<?php 
														   } 
															?>
													</select>
                     
												</div>    
																	
												  
												<div class="form-group col-md-4" style="margin-bottom:2px;">
													<label for="address">Address *</label>
													<input type="text" class="form-control" id="address" name="address" placeholder="Street Address" value="<?php echo $street_address1;?>">
													
												</div>
												<div class="form-group col-md-4" style="margin-bottom:2px;">
												<label for="address" type="hidden">*</label>
												<input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment, Suit unit etc (optional)" value="<?php echo $app_address1;?>">
												</div>
										<?php
										
								
								?>


        				        <div class="form-group col-md-12" id="e" onchange="abc2()" style="color:red; margin-bottom:2px;">
							      
						        </div> 	
								
								<div class="form-group col-md-6" style="margin-bottom:2px;">
								    <label for="email">Email Address *</label>
									<input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="<?php echo $emailadd;?>">
								</div>
								<div class="form-group col-md-6"style="margin-bottom:2px;">
								    <label for="phone">Phone *</label>
									<input type="text" class="form-control" id="phone" name="phone" placeholder="Select an option" value="<?php echo $phone;?>">
								</div>
								<div class="form-group col-md-6"style="margin-bottom:2px;">								
                                <button type="submit" value="submit" class="btn pest_btn" name="proceed_payment" id="proceed_payment">Proceed to payment</button>
                                </div>                                
								</form>
							</form>
                		</div>
                	</div>

                </div>
            </div>
		
    </section>
			<head>
        <title>How to Set minimum and maximum date in jQuery UI Datepicker</title>
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
                     }
            };
        xmlhttp.open("GET","date_check.php?q="+a,true);
        xmlhttp.send();
		}
		
		
        $(document).ready(function(){

            $('#datepicker').datepicker({
                dateFormat: "yy-mm-dd",
				maxDate: new Date('<?php echo $d; ?>'),
				minDate: new Date('<?php echo $date; ?>')
				

            });

        });
        

        </script>
    </head>
		<?php
include_once('footer_client.php');
?>