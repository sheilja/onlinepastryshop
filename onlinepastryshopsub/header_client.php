<?php
	session_start();           	
	include_once('connection.php');
	
?>
<!DOCTYPE html>
<html lang="en">

    
<!-- Mirrored from galaxyanalytics.net/demos/cake/theme/cake-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Jan 2019 07:34:10 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="img/fav-icon.png" type="image/x-icon" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Cake - Bakery</title>

        <!-- Icon css link -->
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="vendors/linearicons/style.css" rel="stylesheet">
        <link href="vendors/flat-icon/flaticon.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Rev slider css -->
        <link href="vendors/revolution/css/settings.css" rel="stylesheet">
        <link href="vendors/revolution/css/layers.css" rel="stylesheet">
        <link href="vendors/revolution/css/navigation.css" rel="stylesheet">
        <link href="vendors/animate-css/animate.css" rel="stylesheet">
        
        <!-- Extra plugin css -->
        <link href="vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
        <link href="vendors/magnifc-popup/magnific-popup.css" rel="stylesheet">
        
        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
		
		
		
       <!-- <link href="datas/bootstrap/css/bootstrap.min.css" rel="stylesheet">
       
        
        <link href="datas/assets/bootstrap-touchspin-master/src/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" media="all">
       
        
       
        <!-- Theme  CSS -->
        <!-- <link rel="stylesheet" type="text/css" href="datas/min/csk.min.css"> -->
		
		

        <!-- Icon css link -->
             
       
     <!--for add to cart -->
        <link href="vendors/stroke-icon/style.css" rel="stylesheet">
        <link href="vendors/jquery-ui/jquery-ui.min.css" rel="stylesheet">
        <link href="vendors/nice-select/css/nice-select.css" rel="stylesheet">
        



    </head>
    <body>
        
        <!--================Main Header Area =================-->
		<header class="main_header_area">
			<div class="top_header_area row m0">
				<div class="container">
					<div class="float-left">
						<a href="tell:+18004567890"><i class="fa fa-phone" aria-hidden="true"></i> 8758177026</a>
						<a href="mainto:info@cakebakery.com"><i class="fa fa-envelope-o" aria-hidden="true"></i>sheiljagandhi603@gmail.com</a>
					</div>
					<div class="float-right">
						<ul class="h_social list_style">
						
						    <?php      
									if(isset($_SESSION['login_client']))
										{
										
											?><li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>  <b>LogOut</b></a></li><?php

											
										}	
										else
										{
											?><li><a href="sign_in_client.php"> <i class="fa fa-lock" aria-hidden="true"></i>  <b>Login</b></a></li><?php
										}
                            ?>
						
							<li><a href="https://www.facebook.com/Pastry-Queen-Page-356147571521116/" target="_blank"><i class="fa fa-facebook"></i></a></li>
							<li><a href="https://www.instagram.com/pastry._queen/?hl=en" target="_blank"><i class="fa fa-instagram"></i></a></li>

						</ul>
						<ul class="h_search list_style">
						<?php
						              

									if(isset($_SESSION['login_client']))
										{		
									  $sql_order_details_q="select count(*) as b from order_details where is_order_completed=0 and customer_id='".$_SESSION['login_client']."'";
									  $sql_order_details=mysql_query($sql_order_details_q,$con);
									  $sql_order_details_row=mysql_fetch_array($sql_order_details);									
						?>
							                  <li class="shop_cart"><a href="cart.php" ><i class="lnr lnr-cart"></i><sup style="color:black"><b><?php echo $sql_order_details_row['b']; ?></b></sup></a></li>
										<?php } ?>
						</ul>

					</div>
				</div>
			</div>
			<div class="main_menu_area">
				<div class="container">
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
						<a class="navbar-brand" href="index.php">
						<img src="img/logo.png" alt="" style="width:121; height:73;">
						<img src="img/logo-2.png" alt="">
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="my_toggle_menu">
                            	<span></span>
                            	<span></span>
                            	<span></span>
                            </span>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav mr-auto">
						        <li><a href="index.php">Home</a></li>
								<li><a href="our_pastries.php">Our Pastries</a></li>
								<li class="dropdown submenu">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Theme Pastries</a>
									<ul class="dropdown-menu" style="width: 400px; overflow: auto; height: 400px;">
                                    <?php
                                                $fetch_theme="select * from theme";
                                                $row_theme=mysql_query($fetch_theme,$con);
                                                while ($rows_theme=mysql_fetch_array($row_theme)) {
                                                	?>						
                                                	<li><a href="our_pastries.php?t_id=<?php echo $rows_theme['theme_id'];?>"><?php echo $rows_theme['theme_name'];?></a></li>
                                              <?php  }?>
        							</ul>
								</li>
								<li><a href="about_us.php">About Us</a></li>								
							</ul>
							<ul class="navbar-nav justify-content-end">
							<li><a href="https://wa.me/917572812248" target="_blank">Custom Order(<img src="img/download.jpg" style="height:30px; width:30px;">)</a></li>
								
								<?php if(isset($_SESSION['login_client'])){?>
								<li class="dropdown submenu">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Shop</a>
									<ul class="dropdown-menu">
								    
										<li><a href="cart.php">Cart Page</a></li>

										<li><a href="myorder.php">My Order</a></li>	

										<li><a href="change_profile.php">Change Profile</a></li>											
									</ul>
								</li>
								<?php } ?>
								<li><a href="contact_us.php">Contact Us</a></li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</header>
        <!--================End Main Header Area =================-->