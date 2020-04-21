<?php
 	include_once('connection.php');
//	include('encrypt_decrypt.php');
	if(isset($_GET['d']))
	{
		$orderNo = $_GET['d'];
		$decryptedorderNo = $orderNo;
		$sqlCustomer = "SELECT * FROM user_register where user_id = (SELECT customer_id FROM order_master WHERE order_number = '".$decryptedorderNo."' limit 1)";
		$resultCustomer = mysql_query($sqlCustomer ,$con);
		$rowCustomer = mysql_fetch_array($resultCustomer);
		$sqlOBM = "SELECT * FROM order_master WHERE order_number = '".$decryptedorderNo."'";
		$resultOBM = mysql_query($sqlOBM ,$con);
		$rowOBM = mysql_fetch_array($resultOBM);
		$invoice_no = str_pad(intval($rowOBM['order_number']), 4, '0', STR_PAD_LEFT);
		$sqlData = "SELECT * FROM order_master WHERE order_number = '$decryptedorderNo'";
		$rsData = mysql_query($sqlData , $con);
		$rowData = mysql_fetch_array($rsData);
		
		$sql_review = "SELECT  od.product_id ,p.product_name ,od.rate as special_price ,p.product_image as image1 ,od.qty,od.delivery_date , od.weight , od.gst , 
		f.flavour_name  FROM  order_details as od
LEFT JOIN product_tbl as p ON od.product_id = p.product_id
LEFT JOIN flavour as f ON  od.flavour_id = f.flavour_id
WHERE od.customer_id = '".$rowCustomer['user_id']."' AND od.order_number = '$decryptedorderNo'";
	
		$rs_review = mysql_query($sql_review ,$con);	
 ?>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pastry Queen | Invoice Print</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="datas/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="datas/css/AdminLTE.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body onLoad="window.print();">
    <div class="wrapper">
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
                Email: alpagandhi1981@gmail.com
            </address>
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col">
            To
            <address>
               <address>
                <strong><?php echo $rowCustomer['user_full_name'] ?></strong><br>
                <?php echo $rowCustomer['street_address'] ?><br>
                <?php echo $rowCustomer['appartment_details'] ?><br>
                <?php echo $rowCustomer['appartment_details'] ."  - ".$rowCustomer['appartment_details'] ?><br>
				Mobile: +91 <?php echo $rowCustomer['user_mobile'] ?><br>
                Email: <?php echo $rowCustomer['user_email'] ?>
              </address>
            </address>
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col">
		  	<b>GST No.:</b> 123ASDFLPP0128L1Z4<br>
            <b>Invoice No: <?php echo $invoice_no; ?></b>
            <br>
            <b>Order ID:</b> <?php echo $decryptedorderNo; ?>
			
          </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Table row -->
        <div class="row">
        	<div class="col-main col-sm-12">          
          <div class="page-content checkout-page">                        
            <div class="box-border">
              <div class="table-responsive">
                <table class="table table-bordered cart_summary">
                  <thead>
                    <tr>
                      <th >SR NO.</th>
                      <th>Description</th>                     
                      <th>Unit price</th>
                      <th>Qty</th>
					  <th>Delivery Date</th>
					  <th style="display:none;">GST</th>
                      <th>Total</th>                     
                    </tr>
                  </thead>
                  <tbody>
				  <?php
					$counter = 1;
				  	$total = 0;
					$sub_total = 0;	
					$GST = 0;
					$GST_amt = 0;
					$shipping_cost = $rowOBM['shipping_cost'];	
					$grand_total = 0;	
					$no_of_qty = 0;	
					
					
					while($row_review = mysql_fetch_array($rs_review))
					{
						$GST = $row_review['gst'];
						$total = $row_review['special_price'] + $row_review['gst'];
				?>
                  <tr>
                    <td><?php echo  $counter++ ?></td>
                    <td class="cart_description"><p class="product-name"><a href="#"><?php echo $row_review['product_name'] ?> </a></p>
                        <small><a href="#">Weight : <?php echo $row_review['weight']; ?></a></small><br>
                        <small><a href="#">Flavour : <?php echo $row_review['flavour_name']; ?></a></small>
						</td>
					<td class="price"><span> <?php echo "&#8377; " . number_format($row_review['special_price'],2) ?></span></td>
							 
                    <td class="qty"><?php echo $row_review['qty']; ?></td>    
                    <td class="qty"><?php echo $row_review['delivery_date']; ?></td>    					
					<td class="price" style="display:none;"><span><?php  echo "&#8377; " . number_format($GST,2);  ?></span></td>
                      <td class="price"><span><?php echo "&#8377; " .number_format($total,2);  ?></span></td>                 
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
              </div>              
            </div>			            
          </div>
        </div>  
		  <!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
          <!-- accepted payments column -->
          <div class="col-xs-7">
            <pre style="font-size:11px;">Return & Refund Policy:
- Clothes will be delivered between 5 to 15 working days.			
- Clothes can be return within 7 day's of delivery date.
- Clothes must be in good condition. 
- GST Amount, Online Transaction Charges(4%) and 
  shipping cost is not refundable.
- Delivered days may be increase in large order.  
  
</pre>
          </div><!-- /.col -->
          <div class="col-xs-5">            
            <div class="table-responsive">
               <table class="table">
                  <tfoot style="font-size: 14px;">
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
					  <td colspan="2"></td> 
                      <td colspan="2"><strong>Total products (tax incl.)</strong></td>
                      <td colspan="1"><strong><?php echo "&#8377; " .number_format(ceil($grand_total),2); ?> </strong></td>
                    </tr>
                                       
                  </tfoot>
                </table>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </section><!-- /.content -->
    </div><!-- ./wrapper -->

    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
  </body>
  
  <?php
  }
  ?>