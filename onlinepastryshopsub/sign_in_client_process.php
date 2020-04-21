<?php

if($_POST)
{
	if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        
        $output = json_encode(array( //create JSON data
            'type'=>'error', 
            'text' => 'Sorry Request must be Ajax POST'
        ));
        die($output); //exit script outputting json data
    } 
	include_once('connection.php');											
	/*$name      = $_POST["name"];
    $email     = $_POST["email"];
    $mobile   = $_POST["mobile"];
    $subject   = $_POST["subject"];
    $message   = $_POST["message"];*/
	 //Sanitize input data using PHP filter_var().

    $email     = filter_var($_POST["email1"], FILTER_SANITIZE_EMAIL);

    $pass   = $_POST["password1"];
   
	
    //additional php validation
    /*if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ //email validation
        $output = json_encode(array('type'=>'error', 'text' => 'Please enter a valid email!'));
        die($output);
    }
	if(!filter_var($mobile , FILTER_SANITIZE_NUMBER_INT)){ //email validation
        $output = json_encode(array('type'=>'error', 'text' => 'Please enter a valid Mobile!'));
        die($output);
    }*/

	$sql = "select * from user_register where user_email='$email' and user_password='$pass'";
	$result = mysql_query($sql , $con);
	if($r=mysql_fetch_array($result))
	{
		session_start();

        $_SESSION['login_client'] = $r['user_id'];
		$output = json_encode(array('type'=>'message', 'text' =>'Hi '.$email .' You are login.'));
        die($output);
	}
	else{
     $output = json_encode(array('type'=>'error', 'text' => 'Wrong id or password'));
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