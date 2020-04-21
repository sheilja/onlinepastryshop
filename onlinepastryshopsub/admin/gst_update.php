									<?php
           	include_once('connection.php');
$response = array();
if(isset($_POST['edit']))
{
	if(isset($_POST['id']))
	{

		$fetchSql = "select *from gst_tbl where gst_slab_id='".$_POST['id']."'";
		$result = mysql_query($fetchSql,$con);		
		while($row = mysql_fetch_array($result))
		{
			//$response["category_id"] = $row["category_id"];
			
			$response["gst_slab_name"] = $row["gst_slab_name"];
			$response["cgst"] = $row["cgst"];
			$response["sgst"] = $row["sgst"];
			$response["igst"] = $row["igst"];


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