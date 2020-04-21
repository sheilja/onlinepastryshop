<?php
    session_start();
             if(isset($_SESSION["login_client"]))
              {
            //    echo $_SESSION["name"];
              	session_destroy();
                
              }
              echo "<script>window.location = 'our_pastries.php';</script>";

?>