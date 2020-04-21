<?php
include_once('header_client.php');
include_once('connection.php');
?>
    <section class="our_cakes_area p_100">
        	<div class="container">
        		<div class="main_title">
        			<h2>Our Cakes</h2>
        			<h5>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</h5>
        		</div>
                <div class="cake_feature_row row">
        		<?php
                     $fetch_theme="select *from product_tbl";
                     $row_product=mysql_query($fetch_theme,$con);

                     while ($rows_product=mysql_fetch_array($row_product)) {
                      ?>						


					   <div class="col-lg-3 col-md-4 col-6">
						   <div class="cake_feature_item">
							    <div class="cake_img">
							    	<img src="../admin/image_product/<?php echo $rows_product['product_image']?>" alt="" height="270px" width="226px">
						    	</div>
							    <div class="cake_text">
								    <h4><?php echo $rows_product['price']?></h4>
								    <h3><?php echo $rows_product['product_name']?></h3>
								    <a class="pest_btn" href="#">Add to cart</a>
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