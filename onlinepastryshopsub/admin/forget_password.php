
<?php
	include_once('connection.php'); 
if(isset($_POST['forgot']))
{

	        $sql_find_q="select *from admin_registration_tbl where admin_email='".$_POST['email']."'";
			$sql_find=mysql_query($sql_find_q,$con);
			if($sql_find_row=mysql_fetch_array($sql_find))
			{

		    $to=$sql_find_row['admin_email'];
			//$to="sheiljagandhi156@gmail.com";
			$subject="Change Password";
			$txt=$sql_find_row['admin_password'];
			$header="From: sheiljagandhi603@gmail.com";
			mail($to,$subject,$txt,$header);
			}
			


}
?><!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from cskadmin.com/v3.2/forgot.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 18 Mar 2017 13:40:21 GMT -->
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
<title>Sign In | PQ - Admin | PATRY QUEEN</title>
		<!-- Icon -->
		<link rel="icon" href="datas/images/icon.ico">
		<!-- Bootstrap Core CSS -->
		<link href="datas/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!-- Animate CSS -->
		<link rel="stylesheet" href="datas/assets/animate.css-master/animate.min.css">
		<!-- Theme  CSS -->
		<link rel="stylesheet" type="text/css" href="datas/min/csk.min.css">
		<!-- MediaQuery CSS -->
		<link rel="stylesheet" type="text/css" href="datas/css/media-query.css">
		
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="body-bg">
			
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-push-4 col-xs-12 sign-box">
					<div class="panel panel-default pale-border-top">
						<div class="panel-heading text-center">
							<h3 class="nm np">
						Forgot Password?
							</h3>
						</div>
						<div class="panel-body">
							<br>
							<form action="" method="post">
								
								<input id="email" name="email" type="text" required="required" placeholder="email" />
								<br>
								<button type="submit" name="forgot" id="forgot" class="center btn btn-warning btn-lg btn-block" data-dismiss="modal">
								<i class="fa fa-lock"></i> Forgot Password?
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /#wrapper -->
		<!-- GoogleApi jQuery -->
		<script type="text/javascript" src="datas/assets/jquery-1.12.4/jquery-1.12.4.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="datas/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="datas/js/sisur.js"></script>
	</body>

<!-- Mirrored from cskadmin.com/v3.2/forgot.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 18 Mar 2017 13:40:21 GMT -->
</html>