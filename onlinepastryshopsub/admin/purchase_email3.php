<?php
include_once('connection.php');

if($_POST)
{	
	if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest')
		{
        
        $output = json_encode(array( //create JSON data
            'type'=>'error', 
            'text' => 'Sorry Request must be Ajax POST'
        ));
        die($output); //exit script outputting json data
    } 
											
	$email = filter_var($_POST["email"]);
	$id = $_POST["id"];	
	
	 $sql_company = "select * from company_tbl";
	 $company_query = mysql_query($sql_company,$con);
	 $row = mysql_fetch_array($company_query);
	 
	 $sqlproductData="select *from user_register where user_id='".$email."'";
	 
	$resultproductData = mysql_query($sqlproductData ,$con);
	$rowproData = mysql_fetch_array($resultproductData);
	
	$sqlproductDetailData="select *from order_master where order_id='".$id."'";
	$resultproductDetailData = mysql_query($sqlproductDetailData ,$con);
	
	
	$sql = "select *from user_register where user_id='".$email."'";
	$result = mysql_query($sql , $con);
	if(!$result)
	{				
		$output = json_encode(array('type'=>'error', 'text' => 'Oops..! Something went wrong.'));
		die($output);						
	}	
	else
	{
	    $ResultRow=mysql_num_rows($result);
		$ResultRowData = mysql_fetch_array($result);
		if($ResultRow > 0)
		{
			
			if($ResultRowData['user_email'] == $email)
			{	
				$custemail = $email; 
				echo $custemail;
				echo $id;
				
				echo $row['company_name'];
				echo $rowproData['user_mobile'];
			    $invoice_no = $resultproductDetailData["invoice_no"];

				
				
				$message ='
				<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <title>invoice</title>
</head>
<body>
    <br /><br /><div style="text-align:center; margin-top: -10px;">
	        <img alt="Tryon InfoSoft" title="Tryon InfoSoft" src="http://admin.zylafashion.com/assets/img/tryoninfosoft_logo_main.png">

        <br /> <?php echo $row["company_add"];?> <br />
        Phone: <?php echo $row["company_mob"]; ?> &nbsp; * &nbsp; Email: <?php echo $row["company_email"]; ?> &nbsp; * &nbsp; Website: http://tryoninfosoft.com
    </div>
    -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    <br /> &nbsp;&nbsp;&nbsp; <b><?php echo $rowproData["party_name"]; ?> </b> <br> &nbsp;&nbsp;&nbsp; <?php echo $rowproData["party_email"]; ?> <br> &nbsp;&nbsp;&nbsp; M: <?php echo $rowproData["party_mobile"]; ?><br />
    <h1>  Invoice No:<?php echo $invoice_no; ?></h1>
    <h2>  <?php echo date("Y-m-d"); ?></h2><br />
    <table align="center">
        <tr>
            <th>SR NO.</th>                    
			<th>Description</th>
			<th>Rate</th>
			<th>Qty</th>
			<th>GTotal</th>
			<th>GST(%)</th> 
			<th>Total GST</th>                    
			<th>Subtotal</th>
        </tr>
        <tr>
            <td style="text-align:center;" colspan="7"> --------------------------------------------------------------------------------------------------------------------------------------------------</td>
        </tr>
		<?php
				  	$counter = 1;
				  	while($rowproductDetailData = mysql_fetch_array($resultproductDetailData))
					{
					?>
						<tr align="center">
						<td><?php echo  $counter++; ?></td>
						<td><?php echo $rowproductDetailData["order_date"]; ?></td>
						<td><?php echo $rowproductDetailData["sub_total"]; ?></td>
					
						<td><?php echo $rowproductDetailData["GST_total"]; ?></td>
						<td><?php echo $rowproductDetailData["shipping_cost"]; ?></td>
						<td><?php echo $rowproductDetailData["delivery_date"];  ?></td>					
						<td style="text-align:right;"><?php echo $rowproductDetailData["final_total"]; ?></td>
						</tr>
					<?php
					
					}
				  ?>
				  <tr> </tr><tr> </tr>
				  	<tr>
						<td colspan="4" style="text-align:left;"></td>
						<td colspan="2" style="text-align:left; text-align:center;"> <b>Sub Total</b></td>	
						<td></td>
						<td><b><?php echo $rowproductData["sub_total"]; ?></b></td>
					</tr>


    </table>
</body>
</html>
				
				
				
				';
				echo  $message;
				$subject = "Password Recovery.";
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= 'From: INVENTORY <sheiljahandhi603@gmail.com>'."\r\n".
				'Reply-To: sheiljagandhi603@gmail.com'."\r\n" .
				'X-Mailer: PHP/' . phpversion();
			
				//email body
				
				$body = "";
				$body .= "SUBMITTED INFORMATION
				***************************";
				
				$body .= "\n";
				$body .= "Email : ";
				$body .= $custemail;
				$body .= "\n";
				$body .= "Subject : ";
				$body .= $subject;
				$body .= "\n";
				$body .= "Message : ";
				$body .= $message;
				$body .= "\n";
				$body .= "\n";
				$body .= "SUBMITTED INFORMATION
				***************************";
				$body .= "\n";
				$body .= "IP : ";
				$body .= $ip = $_SERVER['REMOTE_ADDR'];       
				  
				 $sendmail = mail($custemail, $subject, $message, $headers);
				if(!$sendmail)
				{
					$output = json_encode(array('type'=>'error', 'text' => 'Oops..!!, Something went wrong.. Please try again roshni!'));
					die($output);
				}
				else
				{
					$output = json_encode(array('type'=>'message', 'text' =>'Please Check Your Email For Invoice.'));
					die($output);
				}						
			}											
			else
			{
				$output = json_encode(array('type'=>'error', 'text' => 'Your Email Is Incorrect.'));
        		die($output);
			}	
		}
		else
		{			
			$output = json_encode(array('type'=>'error', 'text' => 'Your Email Is Incorrect.'));
        	die($output);
		}				
	}
}
else
{
	$output = json_encode(array('type'=>'error', 'text' => 'Your Mobile No. or Email Is Incorrect.'));
    die($output);
}
?>