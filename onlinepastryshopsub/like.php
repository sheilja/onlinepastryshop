<?php
if($_SESSION['login_client'])
{
	$a=$_REQUEST['product_id'];
	echo $a;
      $like_insert_q="insert into like_tbl(product_id,user_id,) values('".$a."','".$_SESSION['login_client']."')";
	  $like_insert=mysql_query(
     ?><script>window.location = 'product_details.php?product_id=<?php echo $a;?>';</script><?php
}
$p=$_REQUEST['product_id'];


?>