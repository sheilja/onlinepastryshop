<?php

 	
 	include_once('connection.php');

	include('header_client.php');
	if(!isset($_SESSION['login_client']))
	{
		echo "<script type='text/javascript'>window.location.href = 'login.php';</script>";
	}
	else
	{

		$productinfo = $_GET["abcd"];	
		$encrypted_orderNo = $productinfo; 
		
		$sqlOrder = "SELECT om.* , c.*
					FROM order_master as om 
					LEFT JOIN user_register as c ON om.customer_id  = c.user_id 
					WHERE om.order_number = '".$encrypted_orderNo."'";	
		$rsOrder = mysql_query($sqlOrder ,$con);
		$rowOrderDT = mysql_fetch_array($rsOrder);	
		$firstname = $rowOrderDT["user_full_name"];
		$amount = $rowOrderDT["final_total"];
		$email = $rowOrderDT["user_email"];
		$mobile = $rowOrderDT["user_mobile"];
	
 		echo "<center><h3>Thank You. Your order placed successfully.</h3></center>";
        echo "<center><h4>We have received a payment of &#8377; " . number_format($amount,2) . " . Your order will soon be shipped.</h4></center>";
		echo "<center><a href='index.php' class='btn btn-default add-to-cart' style='margin-bottom:50px;'><i class='fa fa-home'></i>Back To Home</a></center>";
		   		   		   		   
		//$email = $_SESSION['name'];
		$sendername = urlencode("Patry Queen");
		$senderEmail = urlencode("sheilja603@gmail.in");
		$sqlCustomer = "SELECT * FROM user_register where user_email = '$email' or user_mobile = '$mobile'";
		$resultCustomer = mysql_query($sqlCustomer ,$con);
		$rowCustomer = mysql_fetch_array($resultCustomer);
		$custname       = urlencode(@trim(stripslashes($firstname))); 
		$custemail      = urlencode(@trim(stripslashes($email))); 
		$custphone      = $rowCustomer['user_mobile'];
		//echo $custemail . "<BR/>";
		$mailsubject    = urlencode("Patry Queen: Order # " . $encrypted_orderNo . " has been successfully placed.");
		$msg = "Hello $firstname, Your cash-on-delivery order successfully place with order number : ".$encrypted_orderNo." and order amount is RS:  " . number_format($amount,2) . " . Please check your mail for more details.";
		$msg1 = urlencode($msg);
		
		//$url = "http://www.tryoninfosoft.com/sendmail_custom.php?fromemail=$senderEmail&fromname=$sendername&toemail=$custemail&emailsubject=$mailsubject&cust_name=$custname&order_no=$productinfo&encorder_no=$encrypted_orderNo";
		//$output = file_get_contents($url);
		//echo $output;
		
		
		$sqlUpdateODM = "update order_master set is_order_completed = 1 WHERE order_number = '".$encrypted_orderNo."'";
		mysql_query($sqlUpdateODM ,$con);
		$sqlUpdateOD = "update order_details set is_order_completed = 1 WHERE order_number = '".$encrypted_orderNo."'";
		mysql_query($sqlUpdateOD ,$con);
		
		$sql = "SELECT  od.product_id ,p.product_name ,od.rate as special_price ,p.product_image as image1,od.delivery_date ,od.qty , od.weight , od.gst , 
		f.flavour_name   FROM  order_details od
LEFT JOIN product_tbl as p ON od.product_id = p.product_id
LEFT JOIN flavour as f ON  od.flavour_id = f.flavour_id												
WHERE od.order_number='".$encrypted_orderNo."'";


		$result = mysql_query($sql ,$con);
						
	//Order Detail
	$sqlData = "SELECT * FROM order_master WHERE order_number = '$encrypted_orderNo'";	
	$rsData = mysql_query($sqlData , $con);
	$rowData = mysql_fetch_array($rsData);	
 ?>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Font Awesome -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
    <!-- Ionicons -->
    <!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
    <!-- Theme style -->
    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <!--<link rel="stylesheet" href="css/_all-skins.min.css">-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Invoice No
            <small><?php echo $encrypted_orderNo; ?></small>
          </h1>         
        </section>

        <div class="pad margin no-print">
          <div class="callout callout-info" style="margin-bottom: 0!important;">
            <h4><i class="fa fa-info"></i> Note:</h4>
            This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
          </div>
        </div>

        <!-- Main content -->
        <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
			  
                	
<small class="pull-right" style="font-weight:bold;">&nbsp;&nbsp; |&nbsp;&nbsp;   CASH ON DELIVERY </small>  			
                <small class="pull-right">Date: <?php echo date("d-m-Y"); ?>  </small>
				
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              From
              <address>
               <strong>PASTRY QUEEN</strong><br>
                B-603, <br>
				Siddhi Residency, <br>
                behind suryam residency canal road,pal<br>
                Surat - 395009<br>
				Mobile: +91 8758177026<br>
                Email: alpagandhi1981@gmail.com              </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
              To
              <address>
                <strong><?php echo $rowCustomer['user_full_name'] ?></strong><br>
                <?php echo $rowCustomer['street_address'] ?><br>
                <?php echo $rowCustomer['appartment_details'] ?><br>
                <?php echo $rowCustomer['appartment_details'] ."  - ".$rowCustomer['appartment_details'] ?><br>
				Mobile: +91 <?php echo $rowCustomer['user_mobile'] ?><br>
                Email: <?php echo $rowCustomer['user_email'] ?>
              </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
			  <b>GST No.:</b> 24AZLPP0718L1Z4<br>
              <b>Invoice No:<?php echo $encrypted_orderNo; ?></b><br>
              <br>
              <b>Order ID:</b> <?php echo $encrypted_orderNo; ?><br>     
			  <b style="font-size:14px">Total Payable : <?php echo  "&#8377; ".number_format($rowData['final_total'],2); ?></b></div><!-- /.col -->
          </div><!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
				  	<th>SR NO.</th>                    
                    <th>Description</th>
                    <th>Unit price</th>
					<th>Qty</th>  
					<th>Delivery date</th>  
               

                  </tr>
                </thead>
                <tbody>
				<?php
					$counter = 1;
				  	$total = 0;
					$sub_total = 0;	
					$GST = 0;
					$GST_amt = 0;
					$shipping_cost = $rowOrderDT['shipping_cost'];	
					$grand_total = 0;	
					$no_of_qty = 0;	
					
					
					while($row_review = mysql_fetch_array($result))
					{
						$GST = $row_review['gst'];
						$total = $row_review['special_price'] + $row_review['gst'];
				?>
                  <tr>
                    <td><?php echo  ++$counter ?></td>
                    <td class="cart_description"><p class="product-name"><a href="#"><?php echo $row_review['product_name'] ?> </a></p>
                        <small><a href="#">Weight : <?php echo $row_review['weight']; ?></a></small><br>
                        <small><a href="#">Flavour : <?php echo $row_review['flavour_name']; ?></a></small>
						</td>
					<td class="price"><span> <?php echo "&#8377; " . number_format($row_review['special_price'],2) ?></span></td>
							 
                    <td class="qty"><?php echo $row_review['qty']; ?></td>  
                    <td class="qty"><?php echo $row_review['delivery_date']; ?></td>  					
					<td class="price" style="display:none;"><span><?php echo "&#8377; " . number_format($GST,2);  ?></span></td>
                  </tr>
				  
				<?php
				   		
						$sub_total = $sub_total + $total;	
												
						$GST_amt = $GST_amt + $GST;					
				   } 									
					//Shipping Cost End		
																				
					$grand_total = $sub_total + $GST_amt + $shipping_cost;
				?>	            
                </tbody>
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="row">
		            <div class="col-md-4">
		
			</div>
            <div class="col-md-8" style="float:left">             
              <div class="table-responsive">
                <table class="table">
                  <tr>
                      <td colspan="2" rowspan="4"></td>
                      <td colspan="2">Sub Total</td>
                      <td colspan="1"><?php echo "&#8377; " .number_format($rowOrderDT['sub_total'],2); ?> </td>
                    </tr>
					<tr>                      
                      <td colspan="2">GST (Tax incl.)</td>
                      <td colspan="1"><?php echo "&#8377; " .number_format($rowOrderDT['GST_total'],2); ?> </td>
                    </tr>
					<tr>					                      
                      <td colspan="2">Shipping Charge</td>
                      <td colspan="1"><?php echo "&#8377; " .number_format($rowOrderDT['shipping_cost'],2); ?> </td>
                    </tr> 	
					<tr>					                      
                      <td colspan="2">Discount</td>
                      <td colspan="1"><?php echo "&#8377; " .number_format($rowOrderDT['discount'],2); ?> </td>
                    </tr> 						
					<tr class="online_cost_total" id="online_cost_total">
                      <td colspan="3"><strong>Total products (tax incl.)</strong></td>
                      <td colspan="1"><strong id="op_amt_span"><?php echo "&#8377; " .number_format(ceil($rowOrderDT['final_total']),2); ?> </strong></td>
                    </tr>
                </table>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
				
              <a href="invoice_print_cod1.php?d=<?php echo $productinfo; ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
              <!--<button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
              <button class="btn btn-info pull-right" style="margin-right:5px;"><i class="fa fa-download"></i> Generate PDF</button>-->
            </div>
          </div>
        </section><!-- /.content -->
        <div class="clearfix"></div>
      </div>
  <!-- /.content-wrapper -->     
  </body>
  
  <?php
  	include_once('footer_client.php');
	}
  ?>