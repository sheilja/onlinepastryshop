<?php
	session_start();
 	
 	include_once('admin_blezo/connection.php');
	include('encrypt_decrypt.php');
	if(!isset($_SESSION['email']) && isset($_GET['lu']))
	{
		$_SESSION['email'] = my_simple_crypt($_GET['lu'], 'd' );
	}
	include('header.php');
	if(!isset($_SESSION['email']))
	{
		echo "<script type='text/javascript'>window.location.href = 'login.php';</script>";
	}
	else
	{

		$productinfo = $_GET["abcd"];	
		$encrypted_orderNo = my_simple_crypt($productinfo, 'd' ); 
		
		$sqlOrder = "SELECT om.total_Payable , om.cod_charge , om.shipping_cost , c.name , c.email , c.mobile  FROM `order_master_tbl` as om LEFT JOIN customer_registration_tbl as c ON om.customer_id  = c.customer_id WHERE order_number = '".$encrypted_orderNo."'";	
		$rsOrder = mysql_query($sqlOrder ,$con);
		$rowOrderDT = mysql_fetch_array($rsOrder);	
		$firstname=$rowOrderDT["name"];
		$amount=$rowOrderDT["total_Payable"];
		$email=$rowOrderDT["email"];
	
 		echo "<center><h3>Thank You. Your order placed successfully.</h3></center>";
        echo "<center><h4>We have received a payment of &#8377; " . number_format($amount,2) . " . Your order will soon be shipped.</h4></center>";
		echo "<center><a href='index.php' class='btn btn-default add-to-cart' style='margin-bottom:50px;'><i class='fa fa-home'></i>Back To Home</a></center>";
		   		   		   		   
		//$email = $_SESSION['name'];
		$sendername = urlencode("The Blezo");
		$senderEmail = urlencode("sales@blezo.in");
		$sqlCustomer = "SELECT * FROM customer_registration_tbl where email = '$email' or mobile = '$email'";
		$resultCustomer = mysql_query($sqlCustomer ,$con);
		$rowCustomer = mysql_fetch_array($resultCustomer);
		$custname       = urlencode(@trim(stripslashes($firstname))); 
		$custemail      = urlencode(@trim(stripslashes($email))); 
		$custphone      = $rowCustomer['mobile'];
		//echo $custemail . "<BR/>";
		$mailsubject    = urlencode("The Blezo: Order # " . $encrypted_orderNo . " has been successfully placed");
		$msg = "Hello $firstname, Your cash-on-delivery order successfully place with order number : ".$encrypted_orderNo." and order amount is RS:  " . number_format($amount,2) . " . May be cod charge extra. Please check your mail for more details.";
		$msg1 = urlencode($msg);
		$urlsms = "http://sms.tryoninfosoft.com/smsapi.aspx?username=theblezo&password=india12345&sender=DBLEZO&to=$custphone&message=$msg1&route=route3";
		file_get_contents($urlsms);
		//$url = "http://www.tryoninfosoft.com/sendmail_custom.php?fromemail=$senderEmail&fromname=$sendername&toemail=$custemail&emailsubject=$mailsubject&cust_name=$custname&order_no=$productinfo&encorder_no=$encrypted_orderNo";
		//$output = file_get_contents($url);
		//echo $output;
		$sqlGetInvoice = "select MAX(invoice_no) as invoice_no FROM order_master_tbl";
		$resultGetInvoice = mysql_query($sqlGetInvoice ,$con);
		$rowGetInvoice = mysql_fetch_array($resultGetInvoice);
		$invoice_no = str_pad(intval($rowGetInvoice['invoice_no'])+1, 4, '0', STR_PAD_LEFT);
		$sqlUpdateProdQty = "UPDATE sub_product_tbl sp JOIN order_detail_tbl od ON sp.sub_product_id = od.sub_product_id SET sp.qty = sp.qty - od.qty WHERE od.order_number = (SELECT order_master_id FROM order_master_tbl WHERE order_number = '".$encrypted_orderNo."')";
		mysql_query($sqlUpdateProdQty ,$con);
		$sqlUpdateODM = "update order_master_tbl set is_order_completed = 1, invoice_no = ".$invoice_no." WHERE order_number = '".$encrypted_orderNo."'";
		mysql_query($sqlUpdateODM ,$con);
		$sqlUpdateOD = "update order_detail_tbl set is_order_completed = 1 WHERE order_number = (SELECT order_master_id FROM order_master_tbl WHERE order_number ='".$encrypted_orderNo."')";
		mysql_query($sqlUpdateOD ,$con);
		$sql = "SELECT  od.sub_product_id ,sp.sub_product_name ,od.price as special_price ,spi.image1 ,od.size_id , sps.size_name ,c.color_name , od.IsCustomShirt ,od.custom_shirts_price , od.IsCustomPant , od.custom_pants_price , gst.igst , od.customer_id, od.color_id ,od.Is_Customize ,  od.length ,od.chest ,od.hip , od.solder , od.hand ,  od.pant_waist , od.pant_hip , od.pant_rise , od.pant_thigh , od.pant_inseam ,od.pant_cuff , od.is_order_completed , od.order_detail_id , od.qty FROM  order_detail_tbl od
LEFT JOIN sub_product_tbl as sp ON od.sub_product_id = sp.sub_product_id
LEFT JOIN sub_product_image_tbl as spi ON od.sub_product_id = spi.sub_product_id
LEFT JOIN size_tbl as sps ON  od.size_id = sps.size_id						
LEFT JOIN color_tbl as c ON  od.color_id = c.color_id
LEFT JOIN gst_slab_tbl as gst ON sp.gst_slab_id = gst.gst_slab_id							
WHERE od.order_number='".$encrypted_orderNo."'";


		$result = mysql_query($sql ,$con);
						
	//Order Detail
	$sqlData = "SELECT * FROM order_master_tbl WHERE order_number = '$encrypted_orderNo'";	
	$rsData = mysql_query($sqlData , $con);
	$rowData = mysql_fetch_array($rsData);	
 ?>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="css/_all-skins.min.css">

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
            <small><?php echo $invoice_no; ?></small>
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
			  
                <img src="images/home/theblezo.png"/>	
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
                <strong>THE BLEZO</strong><br>
                Office No:- 233, 2nd Floor, <br>
				Ishana - The Business Hub, <br>
                Near D-Mart, Althan VIP Road,<br>
                Surat - 394221<br>
				Mobile: +91 9537754537<br>
                Email: sales@blezo.in
              </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
              To
              <address>
                <strong><?php echo $rowCustomer[1] ?></strong><br>
                <?php echo $rowCustomer[5] ?><br>
                <?php echo $rowCustomer[6] ?><br>
                <?php echo $rowCustomer[7] ."  - ".$rowCustomer[8] ?><br>
				Mobile: +91 <?php echo $rowCustomer[3] ?><br>
                Email: <?php echo $rowCustomer[2] ?>
              </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
			  <b>GST No.:</b> 24AZLPP0718L1Z4<br>
              <b>Invoice No:<?php echo $invoice_no; ?></b><br>
              <br>
              <b>Order ID:</b> <?php echo $encrypted_orderNo; ?><br>     
			  <b style="font-size:14px">Total Payable : <?php echo  "&#8377; ".number_format($rowData['total_payable'],2); ?></b></div><!-- /.col -->
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
					<th style="display:none;">GST</th>                  
                    <th style="text-align:right;">Subtotal</th>
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
					$cod_charge = $rowOrderDT['cod_charge'];
					$custom_size = "";	
					
					while($row_review = mysql_fetch_array($result))
					{
						if($row_review['size_id'] == 0 && $row_review['Is_Customize'] == 1)
						{
							$custom_size1 = "";
							$custom_pant1 = "";
							if($row_review['IsCustomShirt'] == 1)
							{
								$custom_size1 = "Customize Shirt :-  LENGHT : " . $row_review['length'] . ", CHEST : " .  $row_review['chest'] . ", HIP : " . $row_review['hip'] . ", SOLDER : " . $row_review['solder'] . ", HAND : " . $row_review['hand']."</br>	" ;
							}
							if($row_review['IsCustomPant'] == 1)
							{
								$custom_pant1 = "Customize Pant :-  PANT WAIST : " . $row_review['pant_waist'] . ", PANT HIP : " .  $row_review['pant_hip'] . ", PANT RISE : " . $row_review['pant_rise'] . ", PANT THIGH : " . $row_review['pant_thigh'] . ", PANT INSEAM : " . $row_review['pant_inseam'] . " , PANT CUFF : " . $row_review['pant_cuff'];
							}								
							$customize_size = $custom_size1.$custom_pant1;								
						}
						else
						{
							$customize_size = $row_review['size_name'];
						}
				?>
                  <tr>
                    <td><?php echo  ++$counter ?></td>
                    <td class="cart_description"><p class="product-name"><a href="#"><?php echo $row_review['sub_product_name'] ?> </a></p>
                        <small><a href="#">Color : <?php echo $row_review['color_name']; ?></a></small><br>
                        <small><a href="#">Size : <?php echo $customize_size; ?></a></small>
						<?php
						if($row_review['IsCustomShirt'] == 1)
						{?>
						<small><a href="#">Extra Charge (Per Shirt) : <?php echo "&#8377; ".$row_review['custom_shirts_price']; ?></a></small>
						<?php
						}
						if($row_review['IsCustomPant'] == 1)
						{
						?>
						<small><a href="#">Extra Charge (Per Pant) : <?php echo "&#8377; ".$row_review['custom_pants_price']; ?></a></small>
                      	<?php
						}
						?></td>
					<td class="price"><span> <?php echo "&#8377; " . number_format($row_review['special_price'],2) ?></span></td>
					<?php					  					 
																		
						if($row_review['size_id'] == 0 && $row_review['Is_Customize'] == 1)
						{	
							if($row_review['IsCustomShirt'] == 1)
							{
								$shirts_price = $row_review['custom_shirts_price'];
							}
							else
							{
								$shirts_price = 0;
							}
							if($row_review['IsCustomPant'] == 1)
							{
								$pants_price = $row_review['custom_pants_price'];
							}
							else
							{
								$pants_price = 0;
							}
													
							$total =  ($row_review['special_price'] + $shirts_price + $pants_price) *  $row_review['qty'];				
						}
						else
						{
						 	$total = $row_review['special_price'] * $row_review['qty'];
					  	}  						
						$GST_amt += ($total * $row_review['igst']) / 100;																																									
					?>			 
                    <td class="qty"><?php echo $row_review['qty']; ?></td>                    
					<td class="price" style="display:none;"><span><?php  echo number_format($row_review['igst'],2) . " %" . " ," . ($total * $row_review['igst']) / 100;  ?></span></td>
                      <td class="price"><span><?php echo "&#8377; " .number_format($total,2);  ?></span></td>                 
                  </tr>
				  
				<?php
				   		if($row_review['size_id'] == 0 && $row_review['Is_Customize'] == 1)
						{
							$sub_total = $sub_total + (($row_review['special_price'] + $shirts_price + $pants_price) *  $row_review['qty'] );	
						}
						else
						{
							$sub_total = $sub_total + ($row_review['special_price'] *  $row_review['qty'] );	
						}			
								
						$no_of_qty = $no_of_qty + $row_review['qty'];					
						$GST_amt = $GST_amt;					
				   } 									
					//Shipping Cost End		
																				
					$grand_total = $sub_total + $GST_amt + $shipping_cost + $cod_charge;
				?>	            
                </tbody>
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="row">
            <div class="col-xs-8">
				<pre style="font-size:11px;">Return & Refund Policy:
- Cloths can be return within 7 day's of delivery date.
- Cloths must be in good condition. 
- GST Amount, Online Transaction Charges(4%) and shipping cost is not refundable.
</pre>
			</div>
            <div class="col-xs-4">             
              <div class="table-responsive">
                <table class="table">
                  <tr>
                      <td colspan="2" rowspan="4"></td>
                      <td colspan="2">Sub Total</td>
                      <td colspan="1"><?php echo "&#8377; " .number_format($sub_total,2); ?> </td>
                    </tr>
					<tr>                      
                      <td colspan="2">GST (Tax incl.)</td>
                      <td colspan="1"><?php echo "&#8377; " .number_format($GST_amt,2); ?> </td>
                    </tr>
					<tr>					                      
                      <td colspan="2">Shipping Charge</td>
                      <td colspan="1"><?php echo "&#8377; " .number_format($shipping_cost,2); ?> </td>
                    </tr> 
					<tr>					                      
                      <td colspan="2" >COD Charge</td>
                      <td colspan="1"><?php echo "&#8377; " .number_format($cod_charge,2);?></td>
                    </tr>
					<tr class="cod_cost_total" id="cod_cost_total" style='visibility:collapse'>					                      
                      <td colspan="2"></td> 
                      <td colspan="2"><strong>Total products (tax incl.)</strong></td>
                      <td colspan="1"><strong id="op_amt_span"><?php 					  	
					   echo "&#8377; " .number_format(ceil($grand_total + $cod_charge),2); ?> </strong></td>
                    </tr>					
					<tr class="online_cost_total" id="online_cost_total">
					  <td colspan="2"></td> 
                      <td colspan="2"><strong>Total products (tax incl.)</strong></td>
                      <td colspan="1"><strong id="op_amt_span"><?php echo "&#8377; " .number_format(ceil($grand_total),2); ?> </strong></td>
                    </tr>
                </table>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
				
              <a href="invoice_print_cod.php?d=<?php echo $productinfo; ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
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
  	include_once('footer.php');
	}
  ?>