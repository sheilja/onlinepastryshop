	<?php
	include_once('connection.php');
    $i=0;
    $fetchSql = "select * from order_not_available_tbl order by date_id desc limit 1";
	$result = mysql_query($fetchSql,$con);	
	while($row = mysql_fetch_array($result))
		{
		$d=$row['date1'];
		echo $d;?><br><?php
		$month = date('F', strtotime($d));
		$year=date('Y', strtotime($d));
		//echo $month;?><br><?php
		

		if($month=='January')
		{
			$m=1;
		}
		if($month=='February')
		{
			$m=2;
		}
		if($month=='March')
		{
			$m=3;
		}
		if($month=='April')
		{
			$m=4;
		}
		if($month=='May')
		{
			$m=5;
		}
		if($month=='June')
		{
			$m=6;
		}
		if($month=='July')
		{
			$m=7;
		}
		if($month=='August')
		{
			$m=8;

		}
		if($month=='September')
		{
			$m=9;
		}
		if($month=='October')
		{
			$m=10;
		}
		if($month=='November')
		{
			$m=11;
		}
		if($month=='December')
		{
			$m=12;
			$year++;

		}

		$m++;
		//echo $m;
		echo $year;	
		}
		if($m==1 || $m==3 || $m==5 || $m==7 || $m==8 || $m==10 || $m==12)
		{
					?><br><?php
			echo "1111";
			$day=1;
            while($i!=31)
		     {
		        $i++;
		        $final_date=date_create("$year-$m-$day");
		        //echo $year;
		        ?><br><?php
		        //echo date_format($final_date,"y/m/d");
		        $date1=date_format($final_date,"Y-m-d"); 
		        $day++;
		        $q="CALL insertDate('$date1',1,5)";
		        echo $q;
		      $rs=mysql_query($q,$con);
				if(!$rs)
				{
					echo "OOPS!!! Date Not Inserted / Updated.".mysql_error();
				}
		     }
	     }

		else if($m==4 || $m==6 || $m==9 || $m==11)
		{
			?><br><?php
			echo "1111";
			$day=1;
            while($i!=30)
		     {
		        $i++;
		        $final_date=date_create("$year-$m-$day");
		        //echo $year;
		        ?><br><?php
		        //echo date_format($final_date,"y/m/d");
		        $date1=date_format($final_date,"Y-m-d"); 
		        $day++;
		        $q="CALL insertDate('$date1',1,5)";
		        echo $q;
		      $rs=mysql_query($q,$con);
				if(!$rs)
				{
					echo "OOPS!!! Date Not Inserted / Updated.".mysql_error();
				}
		     }
        }
		else if($m==2)
		{
			?><br><?php
			echo "3333";
			$day=1;
            while($i!=28)
		     {
		        $i++;
		        $final_date=date_create("$year-$m-$day");
		        //echo $year;
		        ?><br><?php
		        //echo date_format($final_date,"y/m/d");
		        $date1=date_format($final_date,"Y-m-d"); 
		        $day++;
		        $q="CALL insertDate('$date1',1,5)";
		        echo $q;
		      $rs=mysql_query($q,$con);
				if(!$rs)
				{
					echo "OOPS!!! Date Not Inserted / Updated.".mysql_error();
				}
		     }
        }

?>