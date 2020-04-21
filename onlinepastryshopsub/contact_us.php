
<?php
  include_once('header_client.php');
  include_once('connection.php');
//session_start();

?>
<section class="banner_area">
  <div class="container">
    <div class="banner_text">
      <h3>Contact Us</h3>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="single-blog.html">Contact Us</a></li>
      </ul>
    </div>
  </div>
</section>     
 <section class="contact_form_area p_100">
	  <div class="container">
		<div class="main_title">
		<h2>Get In Touch</h2>
		<h5>Do you have anything in your mind to let us know?  Kindly don't delay to connect to us by means of our contact form.</h5>
		</div>
		<div class="row">
		  <div class="col-lg-7">
			<div class="contact-us-form" id="contact-form">
				  
				  <div id="contact_results"></div>
				  <div class="contact-form-box" id="contactUSFRM">
					<div class="form-selector">
					<label>Name</label>
					<input type="text" class="form-control input-sm" id="name" name="name" required="true" placeholder="Name" maxlength="100"/>
					</div>
					<div class="form-selector">
					<label>Email</label>
					<input type="text" class="form-control input-sm" id="email" name="email" required="true" placeholder="Email" maxlength="100" />
					</div>
					<div class="form-selector">
					<label>Phone</label>
					<input type="text" class="form-control input-sm" id="mobile" name="mobile" required="true" placeholder="Mobile No." maxlength="10" />
					</div>
					<div class="form-selector">
					<label>Subject</label>
					<input type="text" class="form-control input-sm" id="subject" name="subject" required="true" placeholder="Subject" maxlength="250" />
					</div>
					<div class="form-selector" style="margin-bottom:5px;">
					<label>Message</label>
					<textarea class="form-control input-sm" rows="5" id="message" name="message" placeholder="Your Message Here" maxlength="2000" required="true" ></textarea>
					</div>
					<div class="form-selector">
				<button class="btn order_s_btn form-control" type="submit" name="submit" id="submit"><i class="fa fa-send"></i>&nbsp; <span>Send Message</span></button>
				&nbsp; <a href="#" class="button">Clear</a> 
						</div>
				  </div>
			</div>
		  </div>
		  <?php 
		  $a=2;
		  $fetch_company_q="select *from company_tbl where company_id='".$a."'";
		  $fetch_company=mysql_query($fetch_company_q,$con);
		  if($fetch_company_row=mysql_fetch_array($fetch_company))
		  {
		  ?>
		  <div class="col-lg-4 offset-md-1">
			<div class="contact_details">
			  <div class="contact_d_item">
				<h3>Address :</h3>
				<p><?php echo $fetch_company_row['company_add']; ?></p>
			  </div>
			  <div class="contact_d_item">
				<h5>Phone : <a href="tel:01372466790"><?php echo $fetch_company_row['company_mob']; ?></a></h5>
				<h5>Email : <a href="mailto:rockybd1995@gmail.com"><?php echo $fetch_company_row['company_email']; ?></a></h5>
			  </div>
			  <div class="contact_d_item">
				<h3>Opening Hours :</h3>
				<p>8:00 AM – 10:00 PM</p>
				<p>Monday – Sunday</p>
			  </div>
			</div>
		  </div>
		  <?php } ?>
		  
		</div>
		</div>
	  
 </section>
<!--================End Contact Form Area =================-->
        
<!--================End Banner Area =================-->
<section class="map_area">
	<div id="mapBox" class="mapBox row m0" 
		data-lat="40.701083" 
		data-lon="-74.1522848" 
		data-zoom="13" 
		data-marker="img/map-marker.png" 
		data-info="54B, Tailstoi Town 5238 La city, IA 522364"
		data-mlat="40.701083"
		data-mlon="-74.1522848">
	</div>
</section>
<!--================End Banner Area =================-->
        
        <!--================Newsletter Area =================-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("#submit").click(function(e) { 
    e.preventDefault();
        var proceed = true;
       // alert(proceed);                                   
        //simple validation at client's end
        //loop through each field and we simply change border color to red for invalid fields       
        $("#contact-form input[required=true], #contact-form textarea[required=true]").each(function()
	    	{
           $(this).css('border-color',''); 
            if(!$.trim($(this).val()))
			{ 
			
				//if this field is empty 
                $(this).css('border-color','red'); //change border color to red   
                proceed = false; //set do not proceed flag
                
            }
            //check invalid email
           var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
            if($(this).attr("type")=="email" && !email_reg.test($.trim($(this).val())))
			{
                $(this).css('border-color','red'); //change border color to red   
                proceed = false; //set do not proceed flag              
            }
      //check invalid mobile
            var mobile_reg = /^\d*(?:\.\d{1,2})?$/; 
            if($(this).attr("type")=="number" && !mobile_reg.test($.trim($(this).val())))
			{
                $(this).css('border-color','red'); //change border color to red   
                proceed = false; //set do not proceed flag              
            }       
        });
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
                'name'     : $('input[name=name]').val(), 
                'email'    : $('input[name=email]').val(), 
                'mobile'    : $('input[name=mobile]').val(),             
                'subject'  : $('input[name=subject]').val(), 
                'message' : $('textarea[name=message]').val(), 
            };
            //Ajax post data to server
            $.post('sendmail.php', post_data, function(response)
			{  
                if(response.type == 'error')
				{ //load json data from server and output message    
					alert('hello'); 
                    output = '<div class="error" style="background: #FFE8E8;padding: 5px 10px 5px 10px;margin: 0px 0px 5px 0px;border: none;font-weight: bold;color: #FF0000;border-left: 3px solid #FF0000;">'+response.text+'</div>';
                }else
				{
                  alert('helloYES'); 
                    output = '<div class="success" style="background: #D8FFC0;padding: 5px 10px 5px 10px;margin: 0px 0px 5px 0px;border: none;font-weight: bold;color: #2E6800;border-left: 3px solid #2E6800;">'+response.text+'</div>';
                    //reset values in all input fields
                    $("#contact-form  input[required=true], #contact-form textarea[required=true]").val(''); 
                    $("#contact-form #contactUSFRM").slideUp().delay(2000).slideDown(500); //hide form after success
                }
                $("#contact-form #contact_results").hide().html(output).slideDown();
            }, 'json');
        }
    });
    
    //reset previously set border colors and hide all message on .keyup()
    $("#contact-form  input[required=true]").keyup(function() { 
        $(this).css('border-color',''); 
        $("#contact_results").slideUp();
    });
  
  
});
</script>
    
<?php
	include_once('footer_client.php');
?>