<?php
 	include_once('connection.php');
//	include('encrypt_decrypt.php');
	if(isset($_GET['from']))
	{
		//$orderNo = $_GET['d'];
		//$decryptedorderNo = $orderNo;
		
		$sqlCustomer = "select od.* , ur.* from order_master as od LEFT JOIN user_register as ur ON od.customer_id = ur.user_id where is_order_completed='1' and is_order_delivered='1' and od.order_date>'".$_REQUEST['from']."' and od.order_date<'".$_REQUEST['to']."' ORDER BY od.order_id DESC";
		
		$resultCustomer = mysql_query($sqlCustomer ,$con);
		//$rowCustomer = mysql_fetch_array($resultCustomer);
	//	$sqlOBM = "SELECT * FROM order_master WHERE order_number = '".$decryptedorderNo."'";
		//$resultOBM = mysql_query($sqlOBM ,$con);
		//$rowOBM = mysql_fetch_array($resultOBM);
		//$invoice_no = str_pad(intval($rowOBM['order_number']), 4, '0', STR_PAD_LEFT);
		//$sqlData = "SELECT * FROM order_master WHERE order_number = '$decryptedorderNo'";
		//$rsData = mysql_query($sqlData , $con);
		//$rowData = mysql_fetch_array($rsData);
		
		/*$sql_review = "SELECT  od.product_id ,p.product_name ,od.rate as special_price ,p.product_image as image1 ,od.qty,od.delivery_date , od.weight , od.gst , 
		f.flavour_name  FROM  order_details as od
LEFT JOIN product_tbl as p ON od.product_id = p.product_id
LEFT JOIN flavour as f ON  od.flavour_id = f.flavour_id
WHERE od.customer_id = '".$rowCustomer['user_id']."' AND od.order_number = '$decryptedorderNo'";*/
	
		//$rs_review = mysql_query($sql_review ,$con);	
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

        <!-- info row -->


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
                      <th>Order Number</th>                     
                      <th>Order Date</th>
                      <th>Customer Name</th>
					  <th>Sub Total</th>
					  <th>GST Total</th>	
					  <th>Shipping Cost</th>
					  <th>Discount</th>					  
					  <th>Final Total</th>	
					  <th>Delivery Status</th>					  
               
                    </tr>
                  </thead>
                  <tbody>
				  <?php
					$counter = 1;
				  	$total = 0;
					$sub_total = 0;	
					$GST = 0;
					$GST_amt = 0;
					$shipping_cost =0;	
					$grand_total = 0;	
					$no_of_qty = 0;	
					
					
					while($rowCustomer = mysql_fetch_array($resultCustomer))
					{
					
				   ?>
                  <tr>
                    <td><?php echo  $counter++ ?></td>

							 
                    <td class="qty"><?php echo $rowCustomer['order_number']; ?></td>    
                    <td class="qty"><?php echo $rowCustomer['order_date']; ?></td>    					
					<td class="qty"><?php echo $rowCustomer['user_full_name']; ?></td>   
					<td class="qty"><?php echo $rowCustomer['sub_total']; ?></td>
					<td class="qty"><?php echo $rowCustomer['GST_total']; ?></td>
					<td class="qty"><?php echo $rowCustomer['shipping_cost']; ?></td>
					<td class="qty"><?php echo $rowCustomer['discount']; ?></td>					
					<td class="qty"><?php echo $rowCustomer['final_total']; ?></td>
					<td class="qty"><?php echo $rowCustomer['is_order_delivered']; ?></td>
                
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


      </section><!-- /.content -->
    </div><!-- ./wrapper -->

    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
  </body>
  
  <?php
  }
  ?>