
<?php
	include_once('header.php');
	include_once('connection.php');

	if(isset($_POST['btnDate']))
	{
	     if(isset($_POST['date_availability']))  
		 {
			 $a=1;
         }				
		 else
		 {
				$a=0;
		 }
		if($_POST['date_id'] == "")
		{
			$q="CALL insertDate('".$_POST['date']."','".$a."','".$_POST['max_weight']."')";
	         
		}
		else
		{


			$q="CALL UpdateDate('".$_POST['date_id']."','".$_POST['date']."','".$a."','".$_POST['max_weight']."')";
	  //  $rs_update=mysql_query($q_update,$con);
  		
  		}
  		//echo  $q;
  		$rs=mysql_query($q,$con);
		if(!$rs)
		{
			echo "OOPS!!! Date Not Inserted / Updated.".mysql_error();
		}
		
	}



?>
<script type="text/javascript">
	function validatesize(file)
	{
		
                var filesize;
                var filesize = file.files[0].size / 1024 / 1024; // in MB
                if(filesize>3)
                {
                	alert("SELECT PROPERLY");
                	file.value=false;
                } 
                else
                {
                	document.getElementById('img1').src = window.URL.createObjectURL(file.files[0]);
                }
	}
		function validation()
    {
	

	var flag;
	
				var date=document.getElementById('date').value;
			
	if(date=="")
	{

		document.getElementById('d_date').innerHTML = "Select Date";	
        flag=1;		
		
	}
	
	else
	{

		document.getElementById('d_date').innerHTML = "";		
		
		
	}		
				var max_weight=document.getElementById('max_weight').value;
	
	if(max_weight=="")
	{

		document.getElementById('d_max_weight').innerHTML = "Enter Maximum Weight";	
        flag=1;		
		
	}
	
	else
	{
		v_weight=/^([0-9.])+$/;
		if(v_weight.test(max_weight)==false)
		{
			document.getElementById('d_max_weight').innerHTML = "! Only charater";	
			flag=1;
		}
		else
		{
		document.getElementById('d_max_weight').innerHTML = "";		
		}
		
	}					

	if(flag==1)
	{
	
		return false;
	}
	return true;
}

</script>

<!-- Breadcrumb  -->
<div class="row csk-breadcrumb">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h4 class="page-title">Not Available Date Master</h4>
	</div>
	<div class="col-lg-9 col-md-8 col-sm-8 hidden-xs">
		<ol class="breadcrumb">
			<li><a href="#">Dashboard</a></li>
			<li><a href="#">Not Available Date Master</a></li>
		</ol>
	</div>
</div>
<!-- #Breadcrumb -->

<!-- row -->
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-defaut">
			<div class="panel-body">
				<form action="" method="post" name="frmDate" id="frmDate" onSubmit="return validation()">
					<div class="form-body">
						<div class="row">


     							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Date</label>
									<span id="d_date" class="text-danger" style="float:right;"></span>
									<input type="date" class="form-control" id="date" name="date" placeholder="Date">
								</div>
					    		</div>
							 <div class="col-md-6">
								<div class="checkbox">
									<label>
									<input type="checkbox" class="info" id="date_availability" name="date_availability" > Not Available
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
									</label>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label">Maximum weight:</label>
									<span id="d_max_weight" class="text-danger" style="float:right;"></span>
									<input type="text" class="form-control" value="5" id="max_weight" name="max_weight" placeholder="Maximum weight">
								</div>
							</div>						
						</div>
					</div>
					<div class="form-actions">
						<div class="col-md-6">
						<input type="hidden" name="date_id" id="date_id" name="date_id">
						<input type="submit" class="btn btn-success" name="btnDate" id="btnDate" value="SAVE">
					    </div>
					    <div class="col-md-6">
						<input type="button" class="btn btn-dark" value="RESET" id="btnReset"></button>
					   </div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- #row -->


<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default panel-with-options">
			<div class="panel-heading">
				<h3 class="panel-title">Order Not Available Data Table</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered datatable">
						<thead>
							<tr>
								<th>SR </th>
					
								<th>Date</th>

								<th>Not Available</th>
								<th>Max Weight</th>
								<th>Action</th>								
							</tr>
						</thead>
						<tbody>
							
							<?php

								$counter = 1;
								$q="select * from order_not_available_tbl ORDER BY date_id DESC";
								$rs_date = mysql_query($q,$con);
								while($row_date = mysql_fetch_array($rs_date))
								{?>
										
									<tr>	
									<td><?php echo $counter++; ?></td>
																	

								    <td><?php echo $row_date['date1']; ?></td>								

								    <td><?php if($row_date['date_availability']==0)
									{
										echo "AVAILABLE";
									}		
                                     else{
									 echo "NOT AVAILABLE";
									 }										 ?></td>
									<td><?php echo $row_date['max_weight']; ?> </td>
									
									<td>                                            
                                                <button type="button" class="btn btn-info" title="Edit"   id='<?php echo $row_date['date_id'];?>' name="btn_edit"><i class="fa fa-edit"></i></button>
                                               
                                                <button href='' type="button" data-type="confirm" class="btn btn-danger" title="Delete"  id='<?php echo $row_date['date_id'];?>' name="btn_delete"><i class="fa fa-trash-o"></i></button>
                                           
                                    </td>
                                  
									</tr>		
								<?php
								}
							?>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script>
	$(document).ready(function()
	{		
		$('.btn-danger').click(function(e)
		{
			e.preventDefault();
			
			alert("delete");	
			var date_id = $(this).attr("id");
			alert(date_id);
			if(confirm("Are you sure you want to delete this?"))
			{
				$.ajax({ url: 'date_not_available_delete.php',
						 data: {'id': date_id, 'delete': 1},
						 type: 'post',
						 success: function(output) {					 			
									  //window.location.reload();
                       window.location.href = window.location.href;
								  }
				});
				//window.location.reload();
				//window.location = "category.php";
			}
			else
			{
				return false;
			}
		});
		
		
		$('.btn-info').click(function(e)
		{
			e.preventDefault();	
			var date_id = $(this).attr("id");
			
			if(confirm("Are you sure you want to edit this?"))
			{
				$.ajax({ url: 'date_not_available_update.php',
						 data: {'id': date_id, 'edit': 1},
						 type: 'post',
						 dataType :'json',
						 success: function(data) {
						 				
                                    //    document.getElementById("category_signal").value = 1;
									document.getElementById("date_id").value = date_id;
										document.getElementById("date").value = data.date;
                                        if(data.date_availability==1)
                                        {
                                        	$('#date_availability').prop('checked',true);
                                        }
										document.getElementById("max_weight").value = data.max_weight;										
										document.getElementById("btnDate").value = "Edit Date";	
					                   // document.getElementById("btnReset").value = "Edit Category";
								  $("#btnReset").css("display","none");
								  }
				});				
			}
			else
			{
				return false;
			}
		});

	}); 
</script>	







<!-- #row -->

<?php
	include_once('footer.php');
?>