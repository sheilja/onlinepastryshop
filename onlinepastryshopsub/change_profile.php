<?php
include_once('header_client.php');  
include_once('connection.php');
//session_start();

if($_SESSION['login_client'])
{


    $sql_user_q="select *from user_register where user_id='".$_SESSION['login_client']."'";
	$sql_user=mysql_query($sql_user_q,$con);
	$sql_user_row=mysql_fetch_array($sql_user);
}

	
?>
<section class="banner_area">
	<div class="container">
		<div class="banner_text">
			<h3>Change Profile</h3>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="change_profile.php">Change Profile</a></li>
			</ul>
		</div>
	</div>
</section>
<section class="billing_details_area p_100">
            <div class="container">

                <div class="row">
                    
                	<div class="col-lg-7">
                		  <div class="billing_form_area2" id="billing_form_area2">
                			<form class="billing_form row" action="" method="post" id="contactForm" novalidate="novalidate">
                		<div id="register_results"></div>
               	    	<br><div class="main_title">
               	    		<h2>Change Profile</h2>
               	    	</div>    
            				
								<div class="form-group col-md-12">
								    <label for="first">Full Name *</label>
									<input type="text" class="form-control" id="full_name" required="true" name="full_name" placeholder="Full Name" value="<?php echo $sql_user_row['user_full_name'];?>">
								</div>
								
									<input type="hidden" class="form-control" id="user_id" required="true" name="user_id" placeholder="Full Name" value="<?php echo $sql_user_row['user_id'];?>">
								
								<div class="form-group col-md-12">
								    <label for="first">Street Address *</label>                                 
									<input type="text" class="form-control" id="street_address" required="true" name="street_address" placeholder="Street Address" value="<?php echo $sql_user_row['street_address'];?>">
								</div>
								<div class="form-group col-md-12">
								    <label for="first">Appartment Details *</label>                                 
									<input type="iext" class="form-control" id="appartment_details" required="true" name="appartment_details" placeholder="Appartment Details " value="<?php echo $sql_user_row['appartment_details'];?>">
								</div>								
							

								<div class="form-group col-md-12">
								    <label for="first">Email Address *</label>
									<input type="text" class="form-control" id="email_address1"  value="<?php echo $sql_user_row['user_email'];?>" required="true" name="email_address1" placeholder="Email Address">
								</div>
								<div class="form-group col-md-12">
								    <label for="first">Mobile Number *</label>
									<input type="text" class="form-control" id="mobile_no" value="<?php echo $sql_user_row['user_mobile'];?>" required="true" name="mobile_no" placeholder="Mobile number">
								</div>

								<div>
					           	   <button class="btn order_s_btn form-control" type="submit" name="update_register" id="update_register"><i class="fa fa-send"></i>&nbsp; <span>UPDATE PROFILE</span></button>
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
    
      $("#update_register").click(function(e) { 
   
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

                'mob1'    : $('input[name=mobile_no]').val(),
                'fullname1'    : $('input[name=full_name]').val(),
				'id'    : $('input[name=user_id]').val(),
				'street'    : $('input[name=street_address]').val(),			
				'appartment'    : $('input[name=appartment_details]').val(),               
                                                               

            };
            //Ajax post data to server
	
			$.post('change_profile_process.php', post_data, function(response)
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
					    window.location.href="change_profile.php"; 
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
