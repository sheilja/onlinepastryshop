<?php
include_once('header_client.php');  

//session_start();

if(isset($_SESSION['login_client']))
{
	$a=$_REQUEST['product_id'];
	echo $a;

     ?><script>window.location = 'product_details.php?product_id=<?php echo $a;?>';</script><?php
}

	

if(isset($_POST['login']))
{

	        $sql_find_q="select *from user_register where user_email='".$_POST['email_address']."'";
			$sql_find=mysql_query($sql_find_q,$con);
			if($sql_find_row=mysql_fetch_array($sql_find))
			{

		    $to=$sql_find_row['user_email'];
			//$to="sheiljagandhi156@gmail.com";
			$subject="Change Password";
			$txt=$sql_find_row['user_password'];
			$header="From: sheiljagandhi603@gmail.com";
			mail($to,$subject,$txt,$header);
			}
			


}
?>
<section class="banner_area">
	<div class="container">
		<div class="banner_text">
			<h3>Sign In</h3>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="forgot_pass.php">Forgot Password</a></li>
			</ul>
		</div>
	</div>
</section>
<section class="billing_details_area p_100">
            <div class="container">

                <div class="row">
                	<div class="col-lg-5" style="padding-right:40px;">
               	    	
                		<div class="billing_form_area1" id="billing_form_area1">
                			
                			<form class="billing_form row" action="" style="border:1px solid #eaeaea;" method="post" id="contactForm" novalidate="novalidate" style="border: #c1c1c1 solid 1px; width: 400px;">
                				<div id="login_results"></div>
		               	    	<div class="main_title" style="padding-top: 37px;">
		               	    		<h2>Forgot Password?</h2>
		               	    	</div>                				
									                                
								<div class="form-group col-md-12">
								    <label for="first">Email Address *</label>
									<input type="text" class="form-control" id="email_address" required="true" name="email_address" placeholder="Email Address">
								</div>


								<div>
					           	   <button class="pink_btn" type="submit" name="login" id="login" style="margin-block-end:35px;"><i class="fa fa-send"></i>&nbsp;Send Email</button>
								</div>

							</form>
                		</div>
                	</div>

                </div>
            </div>
        </section>
<?php

include_once('footer_client.php');
?>
