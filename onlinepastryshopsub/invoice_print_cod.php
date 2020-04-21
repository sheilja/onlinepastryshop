<?php
 	include_once('admin_blezo/connection.php');
	include('encrypt_decrypt.php');
	if(isset($_GET['d']))
	{
		$orderNo = $_GET['d'];
		$decryptedorderNo = my_simple_crypt($orderNo, 'd' );
		$sqlCustomer = "SELECT * FROM customer_registration_tbl where customer_id = (SELECT customer_id FROM order_master_tbl WHERE order_number = '".$decryptedorderNo."' limit 1)";
		$resultCustomer = mysql_query($sqlCustomer ,$con);
		$rowCustomer = mysql_fetch_array($resultCustomer);
		$sqlOBM = "SELECT * FROM order_master_tbl WHERE order_number = '".$decryptedorderNo."'";
		$resultOBM = mysql_query($sqlOBM ,$con);
		$rowOBM = mysql_fetch_array($resultOBM);
		$invoice_no = str_pad(intval($rowOBM['invoice_no']), 4, '0', STR_PAD_LEFT);
		$sqlData = "SELECT * FROM order_master_tbl WHERE order_number = '$decryptedorderNo'";
		$rsData = mysql_query($sqlData , $con);
		$rowData = mysql_fetch_array($rsData);
		
		$sql_review = "SELECT  od.sub_product_id ,sp.sub_product_name ,od.price as special_price ,spi.image1 ,od.size_id ,sps.size_name ,c.color_name , od.IsCustomShirt , od.custom_shirts_price ,od.IsCustomPant , od.custom_pants_price , gst.igst , od.customer_id, od.color_id ,od.Is_Customize ,  od.length ,od.chest ,od.hip , od.solder , od.hand ,  od.pant_waist , od.pant_hip , od.pant_rise , od.pant_thigh , od.pant_inseam ,od.pant_cuff , od.is_order_completed , od.order_detail_id , od.qty FROM  order_detail_tbl od
LEFT JOIN sub_product_tbl as sp ON od.sub_product_id = sp.sub_product_id
LEFT JOIN sub_product_image_tbl as spi ON od.sub_product_id = spi.sub_product_id
LEFT JOIN size_tbl as sps ON  od.size_id = sps.size_id						
LEFT JOIN color_tbl as c ON  od.color_id = c.color_id
LEFT JOIN gst_slab_tbl as gst ON sp.gst_slab_id = gst.gst_slab_id
WHERE od.customer_id = '$rowCustomer[0]' AND od.order_number='".$decryptedorderNo."'";
	
		/*$sql = "SELECT pi.image1 , p.product_name , p.unit_price , od.qty , od.size_id , s.size_name ,od.length ,od.chest ,od.hip , od.solder , od.hand 				FROM  order_detail_tbl od
				LEFT JOIN sub_product_tbl as sp ON od.sub_product_id  = sp.sub_product_id
				LEFT JOIN size_tbl as s ON od.size_id  = s.size_id
				LEFT JOIN product_tbl as p ON sp.product_id = p.product_id
				LEFT JOIN product_image_tbl as pi ON sp.sub_product_id = pi.sub_product_id							
				WHERE od.customer_id = '$rowCustomer[0]' AND od.order_number=(SELECT order_master_id FROM order_master_tbl WHERE order_number = '".$decryptedorderNo."')";*/
				//echo $sql;
		$rs_review = mysql_query($sql_review ,$con);	
 ?>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>The Blezo | Invoice Print</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/AdminLTE.min.css">

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
              <img src="images/home/logo.png"/>
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
                Office No.:- 230, 2nd Floor, <br>
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
              <strong><?php echo $rowCustomer[1]; ?></strong><br>
                <?php echo $rowCustomer[5]; ?><br>
                <?php echo $rowCustomer[6]; ?><br>
                <?php echo $rowCustomer[7] ."  - ".$rowCustomer[8] ?><br>
				Mobile: +91 <?php echo $rowCustomer[3]; ?><br>
                Email: <?php echo $rowCustomer[2]; ?>
            </address>
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col">
		  	<b>GST No.:</b> 24AZLPP0718L1Z4<br>
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
					$cod_charge = $rowOBM['cod_charge'];	
					$custom_size = "";		
						while($row_review = mysql_fetch_array($rs_review))
						{	
							//print_r($row);
							//echo $row['custom_size_for_shirts'];	
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
                      <td class="cart_product"><?php echo $counter++; ?></td>
                      <td class="cart_description"><p class="product-name"><a href="#"><?php echo $row_review['sub_product_name'] ?> </a></p>
                        <small><a href="#">Color : <?php echo $row_review['color_name']; ?></a></small><br>
                        <small><a href="#">Size : <?php echo $customize_size; ?></a></small></td>                      
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
										
					$grand_total= $sub_total + $GST_amt + $shipping_cost + $cod_charge;
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
                      <td colspan="2">COD Charge</td>
                      <td colspan="1"><?php echo "&#8377; " .number_format($cod_charge,2); ?> </td>
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