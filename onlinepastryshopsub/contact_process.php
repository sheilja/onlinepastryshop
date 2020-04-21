									<?php
           	include_once('connection.php');
$response = array();
if(isset($_POST['add']))
{
$c=2;
         /*$fetchSql="CALL insertContact('".$c."','".$_POST['contact_name']."','".$_POST['contact_email']."','".$_POST['contact_mob']."','".$_POST['contact_subject']."','".$_POST['contact_message']."')"; */
	$fetchSql="INSERT INTO contact_us (company_id,contact_name,contact_mob,contact_email,contact_subject,contact_message) values ('".$c."','".$_POST['contact_name']."','".$_POST['contact_mob']."','".$_POST['contact_email']."','".$_POST['contact_subject']."','".$_POST['contact_message']."')";

		$result = mysql_query($fetchSql,$con)or die(mysql_error());		
	
}
else
{
	$response["Fail"] = 1;
}
echo json_encode($response);

?>