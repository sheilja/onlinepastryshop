<?php
            $i=$_REQUEST['id'];
            $name=$_REQUEST['name'];
            $code=$_REQUEST['code'];            
           	include_once('connection.php');
           	$q_delete="update category_tbl set category_name=$name,category_code=$code where category_id=$i";
	        $rs_delete=mysql_query($q_delete,$con);
  
?>