<?php
	include_once('header_client.php');
?>
<!--================Slider Area =================-->
<!--================End Slider Area =================-->

<!--================Welcome Area =================-->
<section class="welcome_bakery_area">
	<div class="container">
		<div class="welcome_bakery_inner p_100">
			<div class="row">
				<div class="col-lg-6">
					<div class="main_title">
						        			<h2 style="color: #735e33; text-align: justify;">Our Bakery Approach </h2>
        			<h6>Pastry Queen is a home made pastry shop in Surat.Pastry Queen aims to serve the most creative and mouth-watering pastries,to help make your celebration even more special!!</h6>
        			<p style="text-align: justify;">Pick a design you like,and then choose from flavors such as the Black-Forest,White-Forest,Chocolate,Coffee,Fresh Pinaeple,Strawberry,Butterscotch,Mix Fruit and more.You can then sit back and relax,and expert a wonderful pastry to arrive at your desired location,on your chosen date and time.</p>
                     <p style="text-align: justify;">Either call or email us at the information above.</p>	</div>
					<div class="welcome_left_text">
						
						<a class="pink_btn" href="about_us.php">Know more about us</a>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="welcome_img">
						<img class="img-fluid" src="img/cake-feature/welcome-right.jpg" alt="">
					</div>
				</div>
			</div>
		</div>
		<?php
		        $a=1;
		        $fetch_product="select *from product_tbl where is_featured='".$a."'";
                $row_product=mysql_query($fetch_product,$con);
				?>						


	
		
		<div class="cake_feature_inner">
			<div class="main_title">
				<h2>Our Featured Cakes</h2>
				
			</div>
			<div class="cake_feature_slider owl-carousel">
			<?php
				 while ($rows_product=mysql_fetch_array($row_product)) {
                      ?>
				<div class="item">
				
					<div class="cake_feature_item">
						<div class="cake_img">
							<img src="admin/image_product/<?php echo $rows_product['product_image']?>" alt="" height="270px" width="226px">
						</div>
						<div class="cake_text">
							<h4><?php echo $rows_product['price_per_kg']?></h4>
							<h3><?php echo $rows_product['product_name']?></h3>
							<a class="pest_btn" href="sign_in_client.php?product_id=<?php echo $rows_product['product_id'];?>">Add To Cart</a>
						</div>
					</div>
				</div>
				 <?php } ?>
				
			</div>
		</div>
	</div>
</section>
<!--================End Welcome Area =================-->

<!--================Special Recipe Area =================-->

<!--================End Special Recipe Area =================-->

<!--================Service Area =================-->

<!--================End Service Area =================-->

<!--================Discover Menu Area =================-->
		<?php
		        $a=1;
		        $fetch_flavour="select *from flavour";
                $row_flavour=mysql_query($fetch_flavour,$con);
				?>	
<section class="discover_menu_area">
	<div class="discover_menu_inner">
		<div class="container" style="padding-left: 234px;">
			<div class="main_title">
				<h2>Discover Menu</h2>
				
			</div>
			<div class="row">
			<?php
							 while ($rows_flavour=mysql_fetch_array($row_flavour)) {
                      ?>
				<div class="col-lg-6">
					<div class="discover_item_inner">
						<div class="discover_item">
						    
							<h4><?php echo $rows_flavour['flavour_name']; echo"  Pastry"?></h4>
						
						</div>
						
					</div>
				</div>
							 <?php } ?>
			</div>
		</div>
	</div>
</section>
<!--================End Discover Menu Area =================-->

<!--================Client Says Area =================-->

<!--================End Client Says Area =================-->

<!--================End Client Says Area =================-->

<!--================End Client Says Area =================-->
<?php
	include_once('footer_client.php');
?>