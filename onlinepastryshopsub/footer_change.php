 <?php

  include_once('header_client.php');
  ?>
 <!--================Newsletter Area =================-->
       
		<section class="newsletter_area">
        	<div class="container">
        		<div class="row newsletter_inner">
        			<div class="col-lg-6">
        				<div class="news_left_text">
        					<h4>Join our Newsletter list to get all the latest offers, discounts and other benefits</h4>
        				</div>
        			</div>
        			<div class="col-lg-6">
        				<div class="newsletter_form" id="newsletter_form">
						    <div id="subscribe_results"></div>
							<div class="input-group">
								<input type="text" class="form-control" id="subscriber_email_id" required="true" name="subscriber_email_id" placeholder="Email Address">
								<div class="input-group-append">
									<button class="button" type="submit" name="subscribe" id="subscribe"><i class="fa fa-send"></i>&nbsp; <span>LOGIN</span></button>
								</div>
							</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
<!--================End Newsletter Area =================-->
        
        <!--================Footer Area =================-->
        <footer class="footer_area">
        	<div class="footer_widgets">
        		<div class="container">
        			<div class="row footer_wd_inner">
        				<div class="col-lg-3 col-6">
        					<aside class="f_widget f_about_widget">
        						<img src="img/footer-logo.png" alt="">
        						<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui bland itiis praesentium voluptatum deleniti atque corrupti.</p>
        						<ul class="nav">
        							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
        							<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
        							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
        							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
        						</ul>
        					</aside>
        				</div>
        				<div class="col-lg-3 col-6">
        					<aside class="f_widget f_link_widget">
        						<div class="f_title">
        							<h3>Quick links</h3>
        						</div>
        						<ul class="list_style">
        							<li><a href="#">Your Account</a></li>
        							<li><a href="#">View Order</a></li>
        							<li><a href="#">Privacy Policy</a></li>
        							<li><a href="#">Terms & Conditionis</a></li>
        						</ul>
        					</aside>
        				</div>
        				<div class="col-lg-3 col-6">
        					<aside class="f_widget f_link_widget">
        						<div class="f_title">
        							<h3>Work Times</h3>
        						</div>
        						<ul class="list_style">
        							<li><a href="#">Mon. :  Fri.: 8 am - 8 pm</a></li>
        							<li><a href="#">Sat. : 9am - 4pm</a></li>
        							<li><a href="#">Sun. : Closed</a></li>
        						</ul>
        					</aside>
        				</div>
        				<div class="col-lg-3 col-6">
        					<aside class="f_widget f_contact_widget">
        						<div class="f_title">
        							<h3>Contact Info</h3>
        						</div>
        						<h4>(1800) 574 9687</h4>
        						<p>Justshiop Store <br />256, baker Street,, New Youk, 5245</p>
        						<h5>cakebakery@contact.co.in</h5>
        					</aside>
        				</div>
        			</div>
        		</div>
        	</div>
        	<div class="footer_copyright">
        		<div class="container">
        			<div class="copyright_inner">
        				<div class="float-left">
        					<h5>© Copyright  cakebakery WordPress WooCommerce Theme. All right reserved.</h5>
        				</div>
        				<div class="float-right">
        					<a href="#">Purchase Now</a>
        				</div>
        			</div>
        		</div>
        	</div>
        </footer>
        <!--================End Footer Area =================-->
        
        
        <!--================Search Box Area =================-->
        <div class="search_area zoom-anim-dialog mfp-hide" id="test-search">
            <div class="search_box_inner">
                <h3>Search</h3>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><i class="icon icon-Search"></i></button>
                    </span>
                </div>
            </div>
        </div>
        <!--================End Search Box Area =================-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("#subscribe").click(function(e) { 
    
    e.preventDefault();
        var proceed = true;
       // alert(proceed);                                   
        //simple validation at client's end
        //loop through each field and we simply change border color to red for invalid fields       
        $("#newsletter_form input[required=true]").each(function()
		{
	     	
           $(this).css('border-color',''); 
            if(!$.trim($(this).val()))
			{ 
			
				//if this field is empty 
                $(this).css('border-color','red'); //change border color to red   
                proceed = false; //set do not proceed flag
				alert(proceed);
               
            }


        });
		alert(proceed);
              // alert(proceed);  
        if(proceed) //everything looks good! proceed...
        {
      //get input field values data to be sent to server
            // post_data = {
            //     'email'    : $('input[name=contact_email]').val(),
            //     'mobile'    : $('input[name=contact_mob]').val()
            // };
            //get input field values data to be sent to server
            post_data = {
 
                'email1'    : $('input[name=subscriber_email_id]').val(), 
                
                           

            };
			//alert(email1);
            //Ajax post data to server
            $.post('subsrciber_process.php', post_data, function(response)
			{  
			alert("helo");
                if(response.type == 'error')
				{ //load json data from server and output message    
				
                    output = '<div class="error" style="background: #FFE8E8;padding: 5px 10px 5px 10px;margin: 0px 0px 5px 0px;border: none;font-weight: bold;color: #FF0000;border-left: 3px solid #FF0000;">'+response.text+'</div>';
                }else
				{
                 
                    output = '<div class="success" style="background: #D8FFC0;padding: 5px 10px 5px 10px;margin: 0px 0px 5px 0px;border: none;font-weight: bold;color: #2E6800;border-left: 3px solid #2E6800;">'+response.text+'</div>';
                      
                    //reset values in all input fields
                    $("#newsletter_form  input[required=true]").val(''); 
                    $("#newsletter_form").slideUp().delay(2000).slideDown(500); //hide form after success

                }
                $("#newsletter_form #subscribe_results").hide().html(output).slideDown();
            }, 'json');
        }
    });
    
    //reset previously set border colors and hide all message on .keyup()
    $("#billing_form_area2  input[required=true]").keyup(function() { 
        $(this).css('border-color',''); 
        $("#subscribe_results").slideUp();
     
    });

  
});
</script>

        
        
        
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
		
	
		
        <!-- Rev slider js -->
        <script src="vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <!-- Extra plugin js -->
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="vendors/magnifc-popup/jquery.magnific-popup.min.js"></script>
        <script src="vendors/datetime-picker/js/moment.min.js"></script>
        <script src="vendors/datetime-picker/js/bootstrap-datetimepicker.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendors/jquery-ui/jquery-ui.min.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        
        <script src="js/theme.js"></script>
      
        <!-- Touch Spin JS -->
       
        <!--<script src="datas/assets/bootstrap-touchspin-master/src/jquery.bootstrap-touchspin.js"></script>
       
        <script type="text/javascript" src="datas/js/formelements.js"></script>--> 
    
		<!--for add to cart
		<script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope.pkgd.min.js"></script>-->
    </body>

<!-- Mirrored from galaxyanalytics.net/demos/cake/theme/cake-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Jan 2019 07:35:24 GMT -->
</html>