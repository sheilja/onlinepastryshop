<?php
	include_once('header.php');
	include_once('connection.php');
?>
<section class="billing_details_area p_100">
            <div class="container">

                <div class="row">
                	<div class="col-lg-7">
               	    	<div class="main_title">
               	    		<h2>Already Registered?</h2>
               	    	</div>
                		<div class="billing_form_area">
                			<form class="billing_form row" action="http://galaxyanalytics.net/demos/cake/theme/cake-html/contact_process.php" method="post" id="contactForm" novalidate="novalidate">
								<div class="form-group col-md-6">
								    <label for="first">Full Name *</label>
									<input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full Name">
								</div>

								<div class="form-group col-md-6">
								    <label for="first">Email Address *</label>
									<input type="text" class="form-control" id="email_address" name="email_address" placeholder="Email Address">
								</div>
								<div class="form-group col-md-6">
								    <label for="first">Mobile Number *</label>
									<input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="Mobile number">
								</div>
								<div class="form-group col-md-6">
								    <label for="first">Password *</label>
									<input type="password" class="form-control" id="password" name="password" placeholder="Password">
								</div>
								<div class="select_check2 col-md-12">
									<div class="creat_account">
										<input type="checkbox" id="f-option2" name="selector">
										<label for="f-option2">Ship to a different address?</label>
										<div class="check"></div>
									</div>
								</div>
								<div class="form-group col-md-12">
									<label for="phone">Order Notes</label>
									<textarea class="form-control" name="message" id="message" rows="1" placeholder="Note about your order. e.g. special note for delivery"></textarea>
								</div>
							</form>
                		</div>
                	</div>
                	<div class="col-lg-5">
                		<div class="order_box_price">
                			<div class="main_title">
                				<h2>Your Order</h2>
                			</div>
							<div class="payment_list">
								<div class="price_single_cost">
									<h5>Prodcut <span>Total</span></h5>
									<h5>Electric Hummer x 1 <span>$65.00</span></h5>
									<h4>Subtotal <span>$65.00</span></h4>
									<h5>Shipping And Handling<span class="text_f">Free Shipping</span></h5>
									<h3>Total <span>$65.00</span></h3>
								</div>
								<div id="accordion" class="accordion_area">
									<div class="card">
										<div class="card-header" id="headingOne">
											<h5 class="mb-0">
												<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
												Direct Bank Transfer
												</button>
											</h5>
										</div>
										<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
											<div class="card-body">
											Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.
											</div>
										</div>
									</div>
									<div class="card">
										<div class="card-header" id="headingTwo">
											<h5 class="mb-0">
												<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
												Check Payment
												</button>
											</h5>
										</div>
										<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
											<div class="card-body">
											Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.
											</div>
										</div>
									</div>
									<div class="card">
										<div class="card-header" id="headingThree">
											<h5 class="mb-0">
												<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
												Paypal
												<img src="img/checkout-card.png" alt="">
												</button>
												<a href="#">What is PayPal?</a>
											</h5>
										</div>
										<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
											<div class="card-body">
											Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.
											</div>
										</div>
									</div>
								</div>
								<button type="submit" value="submit" class="btn pest_btn">place order</button>
							</div>
						</div>
                	</div>
                </div>
            </div>
        </section>

<?php
	include_once('footer_client.php');
?>