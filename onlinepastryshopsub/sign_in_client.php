<?php
include_once('header_client.php');  

//session_start();

if(isset($_SESSION['login_client']))
{
	$a=$_REQUEST['product_id'];
	echo $a;

     ?><script>window.location = 'product_details.php?product_id=<?php echo $a;?>';</script><?php
}

	
?>
<section class="banner_area">
	<div class="container">
		<div class="banner_text">
			<h3>Sign In</h3>
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="">Sign In</a></li>
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
		               	    		<h2>Already Registered?</h2>
		               	    	</div>                				
									                                
								<div class="form-group col-md-12">
								    <label for="first">Email Address *</label>
									<input type="text" class="form-control" id="email_address" required="true" name="email_address" placeholder="Email Address">
								</div>

								<div class="form-group col-md-12">
								    <label for="first">Password *</label>
									<input type="password" class="form-control" id="password" required="true" name="password" placeholder="Password">
								</div>
								<div>
					           	   <button class="pink_btn" type="submit" name="login" id="login" style="margin-block-end:35px;"><i class="fa fa-send"></i>&nbsp;Login</button>
								</div>
								<a href="forgot_pass.php">Forgot password?</a>

							</form>
                		</div>
                	</div>
                	<div class="col-lg-7">
                		  <div class="billing_form_area2" id="billing_form_area2">
                			<form class="billing_form row" action="" style="border:1px solid #eaeaea;" method="post" id="contactForm" novalidate="novalidate" style="border: #c1c1c1 solid 1px;">
                		<div id="register_results"></div>
               	    	<br><div class="main_title" style="padding-top: 37px;">
               	    		<h2>Create an account</h2>
               	    	</div>    
            				
								<div class="form-group col-md-12">
								    <label for="first">Full Name *</label>
									<input type="text" class="form-control" id="full_name" required="true" name="full_name" placeholder="Full Name">
								</div>
							

								<div class="form-group col-md-12">
								    <label for="first">Email Address *</label>
									<input type="text" class="form-control" id="email_address1" required="true" name="email_address1" placeholder="Email Address">
								</div>
								<div class="form-group col-md-12">
								    <label for="first">Mobile Number *</label>
									<input type="text" class="form-control" id="mobile_no" required="true" name="mobile_no" placeholder="Mobile number">
								</div>
								<div class="form-group col-md-12">
								    <label for="first">Birth Date *</label>
									<input type="date" class="form-control" id="date" required="true" name="date">
								</div>								
								<div class="form-group col-md-12">
								    <label for="first">Password *</label>
									<input type="password" class="form-control" id="password1" required="true" name="password1" placeholder="Password">
								</div>
								<div>
					           	   <button class="pink_btn" type="submit" name="register" id="register" style="margin-block-end:35px;"><i class="fa fa-send"></i>&nbsp; <span>REGISTER</span></button>
								</div>

							</form>
                		</div>
                	</div>
                </div>
            </div>
        </section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("#login").click(function(e) { 
    
    e.preventDefault();
        var proceed = true;
       // alert(proceed);                                   
        //simple validation at client's end
        //loop through each field and we simply change border color to red for invalid fields       
        $("#billing_form_area1 input[required=true]").each(function()
		{
		
           $(this).css('border-color',''); 
            if(!$.trim($(this).val()))
			{ 
			
				//if this field is empty 
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
 
                'email1'    : $('input[name=email_address]').val(), 
                'password1'    : $('input[name=password]').val(), 
                           
//alert(email1);
            };
            //Ajax post data to server
            $.post('sign_in_client_process.php', post_data, function(response)
			{  
                if(response.type == 'error')
				{ //load json data from server and output message    
				
                    output = '<div class="error" style="background: #FFE8E8;padding: 5px 10px 5px 10px;margin: 0px 0px 5px 0px;border: none;font-weight: bold;color: #FF0000;border-left: 3px solid #FF0000;">'+response.text+'</div>';
                }else
				{
                 
                    output = '<div class="success" style="background: #D8FFC0;padding: 5px 10px 5px 10px;margin: 0px 0px 5px 0px;border: none;font-weight: bold;color: #2E6800;border-left: 3px solid #2E6800;">'+response.text+'</div>';
                      
                    //reset values in all input fields
                    $("#billing_form_area1  input[required=true]").val(''); 
                    $("#billing_form_area1").slideUp().delay(2000).slideDown(500); //hide form after success
                     window.location.href="our_pastries.php"; 

                }
                $("#billing_form_area1 #login_results").hide().html(output).slideDown();
            }, 'json');
        }
    });
    
    //reset previously set border colors and hide all message on .keyup()
    $("#billing_form_area2  input[required=true]").keyup(function() { 
        $(this).css('border-color',''); 
        $("#login_results").slideUp();
     
    });
      $("#register").click(function(e) { 
   
    e.preventDefault();
        var proceed = true;
       // alert(proceed);                                   
        //simple validation at client's end
        //loop through each field and we simply change border color to red for invalid fields       
        $("#billing_form_area2 input[required=true]").each(function()
		{
		
           $(this).css('border-color',''); 
            if(!$.trim($(this).val()))
			{ 
			
				//if this field is empty 
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
 
                'email1'    : $('input[name=email_address1]').val(), 
                'password1'    : $('input[name=password1]').val(), 
                'mob1'    : $('input[name=mobile_no]').val(),
                'fullname1'    : $('input[name=full_name]').val(),
                'birthdate'    : $('input[name=date]').val(),				
               
                                                               

            };
            //Ajax post data to server

			$.post('register_client_process.php', post_data, function(response)
			{  
                if(response.type == 'error')
				{ //load json data from server and output message    
					 
                    output = '<div class="error" style="background: #FFE8E8;padding: 5px 10px 5px 10px;margin: 0px 0px 5px 0px;border: none;font-weight: bold;color: #FF0000;border-left: 3px solid #FF0000;">'+response.text+'</div>';
                }else
				{
                  
                    output = '<div class="success" style="background: #D8FFC0;padding: 5px 10px 5px 10px;margin: 0px 0px 5px 0px;border: none;font-weight: bold;color: #2E6800;border-left: 3px solid #2E6800;">'+response.text+'</div>';
                    //reset values in all input fields
                    $("#billing_form_area2  input[required=true]").val(''); 
                    $("#billing_form_area2").slideUp().delay(2000).slideDown(500); //hide form after success
                }
                $("#billing_form_area2 #register_results").hide().html(output).slideDown();
            }, 'json');
        }
    });
    
    //reset previously set border colors and hide all message on .keyup()
    $("#billing_form_area2  input[required=true]").keyup(function() { 
        $(this).css('border-color',''); 
        $("#register_results").slideUp();
    });

  
});
</script>

<?php

include_once('footer_client.php');
?>
