
<?php
    include_once('header.php');
?>
<div id="page-content-wrapper">
                <div class="row cards">
                    <div class="col-sm-6 col-md-4 col-lg-3 col-xs-12 animated fadeInLeft">
                        <div class="card danger-bg">
                            <div class="display-block">
                                <div>
                                    <h4 class="text-center">Total projects</h4>
                                </div>
                                <div class="value" >
                                    <h4 class="odometer text-center" data-precision="0">
									<?php
									  $sql_order_details_q="select count(*) as b from order_details";
									  $sql_order_details=mysql_query($sql_order_details_q,$con);
									  $sql_order_details_row=mysql_fetch_array($sql_order_details);
									  echo $sql_order_details_row['b'];
									?>
									</h4>
                                </div>
                                <div>
                                    <h5 class="text-center detailsview"><a href="total_order.php">View Details <i class="fa fa-angle-double-right"></i></a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 col-xs-12">
                        <div class="card primary-bg">
                            <div class="display-block">
                                <div>
                                    <h4 class="text-center">Completed projects</h4>
                                </div>
                                <div class="value" >
                                    <h4 class="odometer text-center" data-precision="0">
																		<?php
									  $sql_order_details_q="select count(*) as b from order_details where is_item_delivered=1";
									  $sql_order_details=mysql_query($sql_order_details_q,$con);
									  $sql_order_details_row=mysql_fetch_array($sql_order_details);
									  echo $sql_order_details_row['b'];
									?>
									</h4>
                                </div>
                                <div>
                                    <h5 class="text-center detailsview"><a href="completed_order.php">View Details <i class="fa fa-angle-double-right"></i></a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 col-xs-12">
                        <div class="card warning-bg">
                            <div class="display-block">
                                <div>
                                    <h4 class="text-center">Total Users</h4>
                                </div>
                                <div class="value" >
                                    <h4 class="odometer text-center" data-precision="0">
									<?php
									  $sql_user_q="select count(*) as b from user_register";
									  $sql_user=mysql_query($sql_user_q,$con);
									  $sql_user_row=mysql_fetch_array($sql_user);
									  echo $sql_user_row['b'];
									?>									
									</h4>
                                </div>
                                <div>
                                    <h5 class="text-center detailsview"><a href="total_user.php">View Details <i class="fa fa-angle-double-right"></i></a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 col-xs-12">
                        <div class="card success-bg">
                            <div class="display-block">
                                <div>
                                    <h4 class="text-center">Today's Order</h4>
                                </div>
                                <div class="value" >
                                    <h4 class="odometer text-center" data-precision="0" text-center">
									<?php
											$date=date("Y-m-d");
									  $sql_user_q="select count(*) as b from order_details where delivery_date='".$date."' and is_order_completed='1'";
									  $sql_user=mysql_query($sql_user_q,$con);
									  $sql_user_row=mysql_fetch_array($sql_user);
									  echo $sql_user_row['b'];
									?>										
									</h4>
                                </div>
                                <div>
                                    <h5 class="text-center detailsview"><a href="todays_order.php">View Details <i class="fa fa-angle-double-right"></i></a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3 col-xs-12">
                        <div class="card success-bg">
                            <div class="display-block">
                                <div>
                                    <h4 class="text-center">Tomorrow's Order</h4>
                                </div>
                                <div class="value" >
                                    <h4 class="odometer text-center" data-precision="0" text-center">
									<?php
								  $date1=Date('20y-m-d',strtotime("+1 days"));
									  $sql_user_q="select count(*) as b from order_details where delivery_date='".$date1."' and is_order_completed='1'";
									  $sql_user=mysql_query($sql_user_q,$con);
									  $sql_user_row=mysql_fetch_array($sql_user);
									  echo $sql_user_row['b'];
									?>										
									</h4>
                                </div>
                                <div>
                                    <h5 class="text-center detailsview"><a href="tomorrows_order.php">View Details <i class="fa fa-angle-double-right"></i></a></h5>
                                </div>
                            </div>
                        </div>
                    </div>					
                </div>

            </div>


<?php
    include_once('footer.php');
?>        