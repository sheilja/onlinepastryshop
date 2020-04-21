<?php
   
    session_start();
	if(isset($_SESSION["id"]))
    {
	// echo $_SESSION["name"];
		session_destroy();
		echo "<script>window.location = 'index.php';</script>";  
    }
	
?>