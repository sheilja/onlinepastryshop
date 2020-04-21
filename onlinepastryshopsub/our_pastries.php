<?php

include_once('header_client.php');
include_once('connection.php');
 	 if(isset($_POST['btnL']))
	 {				  
			    if(isset($_SESSION['login_client']))
				{		
				  $sql_like_q="insert into like_tbl(product_id,user_id) value('".$_POST['pid']."','".$_SESSION['login_client']."')";
				  $sql_like=mysql_query($sql_like_q,$con);	   
				}
				else
				{
					?><script>window.location = 'sign_in_client.php';</script><?php
				}

	 }
	 if(isset($_POST['btnU']))
	 {				  
			    if(isset($_SESSION['login_client']))
				{
		   echo $_POST['pid'];	
          $sql_like_q="delete from like_tbl where user_id='".$_SESSION['login_client']."' and product_id='".$_POST['pid']."'";
         //  $sql_like_q="insert into like_tbl(product_id,user_id) value('".$_POST['pid']."','".$_SESSION['login_client']."')";
           $sql_like=mysql_query($sql_like_q,$con);	   

				}
				else
				{
					?><script>window.location = 'sign_in_client.php';</script><?php
				}


	 }
?>
    <section class="our_cakes_area p_100">
	
        	<div class="container">
        		<div class="main_title">
        			<h2>Our Cakes</h2>
        			<h5>Each Of Our Products Are Made Fresh,On The Day Of Dispatch . Please Book Youy Pastry Before Minimum Two Days From The Delivery Date.</h5>
        		</div>
                <div class="cake_feature_row row">
        		<?php
            if(isset($_REQUEST['t_id']))
            {
                     $fetch_product="select *from product_tbl where theme_id='".$_REQUEST['t_id']."'";
                     $row_product=mysql_query($fetch_product,$con);

            }
            else
            {
                     $fetch_product="select *from product_tbl";
					 
                     $row_product=mysql_query($fetch_product,$con);

            }
                     
                     while ($rows_product=mysql_fetch_array($row_product)) {
                      
					  ?>						

                           
					   <div class="col-lg-3 col-md-4 col-6">
						   <div class="cake_feature_item">

                    <a href="product_details.php?product_id=<?php echo $rows_product['product_id'];?>">
                     <div class="cake_img">
							    	<img src="admin/image_product/<?php echo $rows_product['product_image']?>" alt="" height="270px" width="226px">
                    </div>
                  </a>

							    <div class="cake_text">
								    <h4><?php echo $rows_product['price_per_kg']?></h4>
								    <h3><?php echo $rows_product['product_name']?><br><?php $fetch_likes_q="select *from like_tbl where product_id='".$rows_product['product_id']."'"; 
									$fetch_likes=mysql_query($fetch_likes_q,$con);
									$c=0;
									while($fetch_likes_row=mysql_fetch_array($fetch_likes))
									{
										$c++;
									}
									echo $c;?> Likes</h3>
									                       <form action="" method="post">
								    <input type="hidden" id="pid" name="pid" value="<?php echo $rows_product['product_id'];?>">
                                    <a class="pest_btn" href="sign_in_client.php?product_id=<?php echo $rows_product['product_id'];?>">Add To Cart</a>
									<?php
									       if(isset($_SESSION['login_client']))
										   {
					                       $fetch_like_q="select *from like_tbl where user_id='".$_SESSION['login_client']."' and product_id='".$rows_product['product_id']."'";
					                        $fetch_like=mysql_query($fetch_like_q,$con);
					 				
										  if($fetch_like_row=mysql_fetch_array($fetch_like))
										  {
											  ?>
											  <button type="submit" name="btnU" id="<?php echo $rows_product['product_id'];?>"><img src="img/images (1).jpeg" style="height:30px; width:50px;"></button>
										      <?php
										  }
										  else
										  {
											  ?>
											  <button type="submit" name="btnL" id="<?php echo $rows_product['product_id'];?>"><img src="img/images (2).png" style="height:30px; width:50px;"></button>
										      <?php
										  }
										   }
										   else{
											   ?>
											  <button type="submit" name="btnL" id="<?php echo $rows_product['product_id'];?>"><img src="img/images (2).png" style="height:30px; width:50px;"></button>
										      <?php
										   }
									?>
									
							    </form>
								</div>
						    </div>
					   </div>
				    	
                      <?php  }

                 ?>
                </div>
        	</div>
		
        </section>
        <!--================End Blog Main Area =================-->
        
        <!--================Special Recipe Area =================-->

  <?php
include_once('footer_client.php');
?>