<?php
  	include_once('connection.php');
	$fetch_d_q="select * from order_not_available_tbl order by date_id desc limit 1";
	$fetch_d=mysql_query($fetch_d_q,$con);
	while($row = mysql_fetch_array($fetch_d))
		{
		$d=$row['date1'];
		echo $d;?><br><?php
		$date=date("Y-m-d");
		//$date = date('y-m-d');
		echo $date;

		}
?>
<html>
    <head>
        <title>How to Set minimum and maximum date in jQuery UI Datepicker</title>
        <link href='jquery-ui.min.css' rel='stylesheet' type='text/css'>
        <script src='jquery-3.0.0.js' type='text/javascript'></script>
        <script src='jquery-ui.min.js' type='text/javascript'></script>
        
        <script type='text/javascript'>
        $(document).ready(function(){

            $('#datepicker').datepicker({
                dateFormat: "yy-mm-dd",
				maxDate: new Date('<?php echo $d; ?>'),
				minDate: new Date('<?php echo $date; ?>')
				//minDate: new Date('2019-01-5')
                //maxDate: new Date('<?php echo $row?>')
               

            });

        });


        </script>
    </head>
    <body>
        <div class='container'>
            <input type='text' id="datepicker" />
                        
        </div>
    </body>
</html>