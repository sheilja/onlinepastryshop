<?php
           	include_once('connection.php');
$response = array();
if(isset($_POST['edit']))
{
	if(isset($_POST['id']))
	{
		    $i=$_POST['id'];	
             
            $q1="select * from company_tbl where company_id=$i";
            $rs_select=mysql_query($q1,$con);

            $row_select = mysql_fetch_array($rs_select);
	        $image1 = $row_select['company_logo_image'];
	        $path = $_SERVER['DOCUMENT_ROOT'].'/onlinecakeshop/admin/image/';
	
            if(file_exists($path.$image1))
            {
	        unlink($path.$image1);
            }


		$fetchSql = "select *from company_tbl where company_id='".$_POST['id']."'";
		$result = mysql_query($fetchSql,$con);		
		while($row = mysql_fetch_array($result))
		{
			//$response["category_id"] = $row["category_id"];
			$response["company_name"] = $row["company_name"];
			$response["company_mob"] = $row["company_mob"];
			$response["company_alt_mob"] = $row["company_alt_mob"];
			$response["company_email"] = $row["company_email"];
			$response["company_add"] = $row["company_add"];
			$response["company_city"] = $row["company_city"];
			$response["company_GST_in_no"] = $row["company_GST_in_no"];
			$response["company_bank_name"] = $row["company_bank_name"];
			$response["company_ac_no"] = $row["company_ac_no"];
			$response["company_IFSC"] = $row["company_IFSC"];
			$response["company_pin_no"] = $row["company_pin_no"];
			$response["company_tin_no"] = $row["company_tin_no"];
			$response["company_CST_no"] = $row["company_CST_no"];
			$response["company_stax_no"] = $row["company_stax_no"];
			$response["company_general_LIC_no"] = $row["company_general_LIC_no"];
			$response["company_logo_image"] = $row["company_logo_image"];


          //	$response["Success"] = 1;
		}		
	}		
}
else
{
	$response["Fail"] = 1;
}
echo json_encode($response);

?>