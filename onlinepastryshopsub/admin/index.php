<?php
	include_once('connection.php');
	session_start();
	if(isset($_POST['btns']))
	{
        echo "ewhid";
		$q="select * from admin_registration_tbl where admin_name='".$_POST['userName']."' and admin_password='".$_POST['password']."'";
	
		$row_product=mysql_query($q,$con);
		if($rows_product=mysql_fetch_array($row_product))
		{
			
			$_SESSION["id"]=$rows_product['admin_id'];
			header("Location:dashboard.php");
		}
		else
		{
			echo "wrong";
		}
	
	}

?>
<!DOCTYPE html>
<html lang="en">
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
		<!--Container Starts -->
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-push-4 col-xs-12 sign-box">
					<div class="panel panel-default pale-panel-border-top">
						<div class="panel-heading text-center">
							<h3 class="nm np">
							CSK Sign In
							</h3>
						</div>
						<div class="panel-body">
							<br>
							<form class="form" method="post" action="">
								<input id="userName" name="userName" type="text" data-length="5,15" placeholder="Username" required="required" />
								<input id="password" name="password" type="password" required="required" placeholder="Password" />
								<input type="submit" class="btn btn-success" name="btns" id="btns" value="SAVE">
								<i class="fa fa-lock"></i> Secure Login
								</button>
							</form>
							<div class="text-right">
								<small><a href="forget_password.php" class="text-danger">Forgot Password?</a></small>
							</div>
							<hr>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- #Container Ends -->
		<!-- GoogleApi jQuery -->
		<script type="text/javascript" src="datas/assets/jquery-1.12.4/jquery-1.12.4.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="datas/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="datas/js/sisur.js"></script>
	</body>

<!-- Mirrored from cskadmin.com/v3.2/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 18 Mar 2017 13:38:04 GMT -->
</html>