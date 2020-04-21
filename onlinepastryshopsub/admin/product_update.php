<?php
	include_once('connection.php');
	$response = array();
	if(isset($_POST['edit']))
	{
		if(isset($_POST['id']))
		{
			  
			$fetchSql = "select * from product_tbl where product_id='".$_POST['id']."'";
			$result = mysql_query($fetchSql,$con);		
			while($row = mysql_fetch_array($result))
			{
				//$response["category_id"] = $row["category_id"];
				$response["product_image"] = $row["product_image"];
				$response["category_id"] = $row["category_id"];
				$response["product_name"] = $row["product_name"];
				$response["theme_id"] = $row["theme_id"];
				$response["gst_slab_id"] = $row["gst_slab_id"];
				$response["price"] = $row["price_per_kg"];
				$response["weight"] = $row["weight"];
				$response["max_weight"] = $row["max_weight"];
				$response["min_weight"] = $row["min_weight"];
				$response["discription1"] = $row["discription1"];		
				$response["discription2"] = $row["discription2"];
				$response["discription3"] = $row["discription3"];	
				$response["is_featured"] = $row["is_featured"];				


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