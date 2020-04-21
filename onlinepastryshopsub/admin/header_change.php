<?php
	include_once('connection.php');
	session_start();
	if(!isset($_SESSION["id"]))
	{
		echo "<script>window.location = 'index.php';</script>";
	}
	else
	{
		
	}
		  
?>
<html lang="en">
    
<!-- Mirrored from cskadmin.com/v3.2/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 18 Mar 2017 13:36:34 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Dashboard | PQ - Admin | PATRY QUEEN
        </title>
        <!-- Icon -->
        <link rel="icon" href="datas/images/icon.ico">
        <!-- Text Editor CSS -->
        <link rel="stylesheet" type="text/css" href="datas/assets/simple-wysiwyg-editor/css/style.css">
        <!-- Bootstrap Core CSS -->
        <link href="datas/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <!-- lineicons-gh-pages -->
        <link rel="stylesheet" type="text/css" href="datas/assets/lineicons-gh-pages/styles.css">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="datas/assets/animate.css-master/animate.min.css">
        <!-- Sparkline CSS -->
        <link rel="stylesheet" type="text/css" href="datas/assets/chartist-js-develop/dist/chartist.min.css">
        <!-- Chartist Tool Tip CSS -->
        <link rel="stylesheet" type="text/css" href="datas/assets/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css">
        <!-- Full Calendar CSS -->
        <link href="datas/assets/calendar-master/vendors/fullcalendar/fullcalendar.css" rel="stylesheet">
        <!-- Full calendar print CSS -->
        <link href="datas/assets/calendar-master/vendors/fullcalendar/fullcalendar.print.css" rel="stylesheet" media="print">
        <!-- Sweet alert CSS -->
        <link rel="stylesheet" type="text/css" href="datas/min/csk.min.css">
        <link rel="stylesheet" type="text/css" href="datas/css/lite-csk.css">
        <!-- MediaQuery CSS -->
        <link rel="stylesheet" type="text/css" href="datas/css/media-query.css">
        <!-- Dashboard 1 CSS -->
        <link rel="stylesheet" type="text/css" href="datas/css/project.css">
        <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
       <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
	   <!-- For company page -->
	   <link rel="stylesheet" type="text/css" href="datas/css/charts.css">
	   <link rel="stylesheet" type="text/css" href="datas/css/profile.css">
	   
	   
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-fixed-top notification navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="index.html" class="navbar-brand">

                    </a>
                </div>
                <a href="#menu-toggle" class="" id="menu-toggle">
                <i class="fa fa-bars" aria-hidden="true">
                </i>
                </a>
                <ul class="settingsmenu">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog pull-right"></span></a>
                        <ul class="dropdown-menu">         
                            <li><a href="#">Sign Out <span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
                        </ul>
                    </li>
                </ul>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">	                                    
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="datas/images/avatars/captain-avatar.png" class="user-image" alt="User Image">
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <?php
                                        $q1="select * from admin_registration_tbl where admin_id='".$_SESSION["id"]."'";
                                        $row_ad1=mysql_query($q1,$con);
                                        ?>
                                <li class="user-header">
                                    <?php
                                    if($rows_ad1=mysql_fetch_array($row_ad1))
                                            {?>
                                    <img src="image_admin/<?php echo $rows_ad1['admin_img']; ?>" class="user-image" alt="User Image">
                                <?php } 
                                else
                                    {?>
                                        <img src="datas/images/avatars/captain-avatar.png" class="user-image" alt="User Image">
                                    <?php } ?>

                                    <p><?php
                                        $q="select * from admin_registration_tbl where admin_id='".$_SESSION["id"]."'";
    
                                            $row_ad=mysql_query($q,$con);
                                            if($rows_ad=mysql_fetch_array($row_ad))
                                            {
                                                
                                                echo $rows_ad['admin_name'];
                                        
                                            }?>
                                                                       
                                        <small>Admin
                                        </small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="profile_update.php" class="btn btn-info"> Profile
                                        </a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="logout.php" class="btn btn-warning">Sign out
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- # navbar-custom-menu -->
            </div>
            <!-- # container-fluid -->
        </nav>
        <!-- Main Body content starts here -->
        <div id="wrapper">
            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <aside class="sidebar">
                    <nav class="sidebar-nav" id="sidebarscroll">
                        <ul class="metismenu ripple" id="menu">
							        <li>
										<a href="calendar.html" aria-expanded="false">
											<span class="sidebar-nav-item-icon icon-li-calendar fa-lg"></span>
											<span class="sidebar-nav-item aText">Calender</span>
										</a>
									</li>                                       
							        <li>
                                        <a href="dashboard.php" aria-expanded="false">
                                        <span class="sidebar-nav-item-icon fa fa-desktop fa-fw">
                                        </span>
                                        <span class="aText">Dashboard
                                        </span>
                                        <i class="fa fa-star text-warning"></i>
                                        </a>
                                    </li>
									<li>
                                        <a href="category.php" aria-expanded="false">
                                        <span class="sidebar-nav-item-icon fa fa-tag fa-fw">
                                        </span>
                                        <span class="aText">Category Details
                                        </span>                                   
                                        </a>
                                    </li>
                                    <li>
                                        <a href="theme.php" aria-expanded="false">
                                        <span class="sidebar-nav-item-icon fa fa-bars fa-fw">
                                        </span>
                                        <span class="aText">Theme Details
                                        </span>                     
                                        </a>
                                    </li>
                                    <li>
                                        <a href="flavour.php" aria-expanded="false">
                                        <span class="sidebar-nav-item-icon fa fa-search fa-fw">
                                        </span>
                                        <span class="aText">Flavour Details
                                        </span>                                        
                                        </a>
                                    </li>
                                        <li>
                                        <a href="company.php" aria-expanded="false">
                                        <span class="sidebar-nav-item-icon fa fa-building-o fa-fw">
                                        </span>
                                        <span class="aText">Company Details
                                        </span>                                       
                                        </a>
                                    </li>
                                    <li>
                                        <a href="gst.php" aria-expanded="false">
                                        <span class="sidebar-nav-item-icon fa fa-calculator fa-fw">
                                        </span>
                                        <span class="aText">GST Details
                                        </span>                                        
                                        </a>
                                    </li>
									
                                    <li>
                                        <a href="admin_registration.php" aria-expanded="false">
                                        <span class="sidebar-nav-item-icon fa fa-user fa-fw">
                                        </span>
                                        <span class="aText">Admin Registration
                                        </span>                                    
                                        </a>
                                    </li>    
                                    <li>
                                        <a href="product.php" aria-expanded="false">
                                        <span class="sidebar-nav-item-icon fa fa-list-alt fa-fw">
                                        </span>
                                        <span class="aText">Product Detatils
                                        </span>                                        
                                        </a>
                                    </li>                                       
                                    <li>
                                        <a href="date_not available.php" aria-expanded="false">
                                        <span class="sidebar-nav-item-icon fa fa-calendar fa-fw">
                                        </span>
                                        <span class="aText">Date Not Available
                                        </span>                                       
                                        </a>
                                    </li>  
                                    <li>
                                        <a href="pincode.php" aria-expanded="false">
                                        <span class="sidebar-nav-item-icon fa fa-map-pin fa-fw">
                                        </span>
                                        <span class="aText">Pincode Details
                                        </span>                                        
                                        </a>
                                    </li>  
                                    <li>
                                        <a href="order_master.php" aria-expanded="false">
                                        <span class="sidebar-nav-item-icon fa fa-desktop fa-fw">
                                        </span>
                                        <span class="aText">Order Master
                                        </span>                                        
                                        </a>
                                    </li>
                                    <li>
                                        <a href="discription.php" aria-expanded="false">
                                        <span class="sidebar-nav-item-icon fa fa-info-circle fa-fw">
                                        </span>
                                        <span class="aText">Theme Description
                                        </span>                                      
                                        </a>
                                    </li>
									<li>
                                        <a href="subscriber.php" aria-expanded="false">
                                        <span class="sidebar-nav-item-icon fa fa-info-circle fa-fw">
                                        </span>
                                        <span class="aText">Subscriber 
                                        </span>                                      
                                        </a>
                                    </li>
									<li>
                                        <a href="contact_us_admin.php" aria-expanded="false">
                                        <span class="sidebar-nav-item-icon fa fa-info-circle fa-fw">
                                        </span>
                                        <span class="aText">ContactUs Description
                                        </span>                                      
                                        </a>
                                    </li>

												
                    </ul>
                    </nav>
                </aside>
            </div>
            <!-- # Sidebar-wrapper -->
    <!-- Page Content-wrapper -->
            <div id="page-content-wrapper">