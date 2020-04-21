<?php
           	include_once('connection.php');

$response = array();
if(isset($_POST['delete']))
{
	if(isset($_POST['id']))
	{		
            $i=$_POST['id'];	
             
            $q1="select * from company_tbl where company_id=$i";
            $rs_select=mysql_query($q1,$con);

            $row_select = mysql_fetch_array($rs_select);
	        $image1 = $row_select['company_logo_image'];
	        $path = $_SERVER['DOCUMENT_ROOT'].'/onlinecakeshop/admin/image_company/';
	
            if(file_exists($path.$image1))
            {
	        unlink($path.$image1);
            }

           	$q_delete="CALL deleteCompany('".$_POST['id']."')";
	   	if(mysql_query($q_delete,$con))
		{
			$response["Success"] = 1;
		}
		else
		{
			$response["Fail"] = 1;
		}
	}		
}
else
{
	$response["Fail"] = 1;
}
echo json_encode($response);
?>