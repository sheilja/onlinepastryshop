<?php
if($_POST)
{
/*	if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        
        $output = json_encode(array( //create JSON data
            'type'=>'error', 
            'text' => 'Sorry Request must be Ajax POST'
        ));
        die($output); //exit script outputting json data
    } */
	include_once('connection.php');											
	
	 //Sanitize input data using PHP filter_var().

    $email     = filter_var($_POST["email1"], FILTER_SANITIZE_EMAIL);

	
    //additional php validation
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ //email validation
        $output = json_encode(array('type'=>'error', 'text' => 'Please enter a valid email!'));
        die($output);
    }

	$sql = "INSERT INTO subscriber_tbl(subscriber_email_id) VALUES ('$email')";
	$result = mysql_query($sql , $con);
	if(!$result)
	{	
		if (mysql_errno() == 1062)
		{
			$output = json_encode(array('type'=>'error', 'text' => 'Great! You are already subscriber of newsletter.'));
        	die($output);
		}	
		else
		{		
			$output = json_encode(array('type'=>'error', 'text' => 'Oops..! Something went wrong.'));
        	die($output);				
		}
	}
	else{
        $output = json_encode(array('type'=>'message', 'text' =>'Hi '.$email.' Thank you for your Enquiry.'));
        die($output);
	}
	
	// $subject = "Enquiry Through Website.";
	// $headers  = 'MIME-Version: 1.0' . "\r\n";
	// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	// $headers .= 'From: PASTRY QUEEN <sales@pastryqueen.in>'."\r\n".
 //    'Reply-To: sales@pastryqueen.in'."\r\n" .
 //    'X-Mailer: PHP/' . phpversion();

	//email body
	/*
	$body = "";
	$body .= "SUBMITTED INFORMATION
	***************************";
	$body .= "\n";
	$body .= "Name : ";
	$body .= $name;
	$body .= "\n";
	$body .= "Email : ";
	$body .= $email;
	$body .= "\n";
	$body .= "Mobile No : ";
	$body .= $mobile;
	$body .= "\n";
	$body .= "Subject : ";
	$body .= $subject;
	$body .= "\n";
	$body .= "Message : ";
	$body .= $message;
	$body .= "\n";
	$body .= "\n";
	$body .= "SUBMITTED INFORMATION
	***************************";
	$body .= "\n";
	$body .= "IP : ";
	$body .= $ip = $_SERVER['REMOTE_ADDR'];       
      
	$sendmail = mail($email, $subject, $message, $headers);
	if(!$sendmail)
	{
		$output = json_encode(array('type'=>'error', 'text' => 'Oops..!!, Something went wrong.. Please try again!'));
        die($output);
    }else{
        $output = json_encode(array('type'=>'message', 'text' =>'Hi '.$name .' Thank you for your Enquiry.'));
        die($output);
	}*/
}
?>