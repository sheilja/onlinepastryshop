<?php
include_once('header_client.php'); 

if(isset($_POST['s_pincode']))
{
	
}
?>
<body>
<br><br><br><br><br><br><br><br><br>
 <div class="container" style="height: 196px;width: 317px;text-align: center;border: solid;">
      <br><br>
      <form method="post" action="check_out.php">
	     <select id="select_pincode" name="select_pincode">
		 <option value="local">PICK UP FROM THE SHOP</option>
		    <?php 
			   $fetch_pincode_q="select *from pincode_tbl";
			   $fetch_pincode=mysql_query($fetch_pincode_q,$con);
		       while ($fetch_pincode_row=mysql_fetch_array($fetch_pincode))
	           {
			     ?>
				 <option value="<?php echo $fetch_pincode_row['pincode_number']; ?>"><?php echo $fetch_pincode_row['pincode_number']; ?></option>
				<?php 
			   } 
				?>
		 </select>
		 <br><br><br>
		  <input type="submit" class="pink_more" value="PROCEED" id="s_pincode" name="s_pincode">
		  
	  </form>
	  </div>
	  
</body>
<?php
include_once('footer_client.php');
?>