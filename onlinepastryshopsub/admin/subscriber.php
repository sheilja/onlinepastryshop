
<?php
	include_once('header.php');
	include_once('connection.php');

	if(isset($_POST['btnSubscriber']))
	{
		if($_POST['subscriber_id']== "")
		{

         $q="CALL insertSubscriber('".$_POST['subscriber_email_id']."')"; 
	     	
		}
		else
		{
			
            $q="CALL updateSubscriber('".$_POST['subscriber_email_id']."','".$_POST['subscriber_id']."')";
	     
		}
		
		$rs=mysql_query($q,$con);
		if(!$rs)
		{
			echo "OOPS!!! Category Not Inserted.".mysql_error();
		}
		
	}



?>

<script type="text/javascript">
	
	function validation()
    {
	

	var flag;
	var subscriber_email_id=document.getElementById('subscriber_email_id').value;
	if(subscriber_email_id=="")
	{

		document.getElementById('s_email').innerHTML = "Enter Email";	
        flag=1;		
		
	}
	
	else
	{
		v_name=/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		if(v_name.test(subscriber_email_id)==false)
		{
			document.getElementById('s_email').innerHTML = "Enter in proper format..!";	
			flag=1;
		}
		else
		{
		document.getElementById('s_email').innerHTML = "";	
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
<!-- #Breadcrumb -->

<!-- row -->
<!-- #row -->

<div class="row csk-breadcrumb">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h4 class="page-title">Subscriber Master</h4>
	</div>
	<div class="col-lg-9 col-md-8 col-sm-8 hidden-xs">
		<ol class="breadcrumb">
			<li><a href="#">Dashboard</a></li>
			<li><a href="#">Subscriber Master</a></li>
		</ol>
	</div>
</div>
<!-- #Breadcrumb -->

<!-- row -->
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-defaut">
			<div class="panel-body">
				<form action="" method="post" name="frmSubscriber" id="frmSubscriber" enctype="multipart/form-data" onSubmit="return validation()">
					<div class="form-body">
						<div class="row">

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Subscriber Email Id:</label>
									<span id="s_email" class="text-danger" style="float:right;"></span>
									<input type="text" class="form-control" id="subscriber_email_id" name="subscriber_email_id" placeholder="Subscriber Email Id">

								</div>
							</div>
						</div>
					</div>
					
					<div class="form-actions">
						<div class="col-md-6">
							<input type="hidden" name="subscriber_id" id="subscriber_id">
							<input type="submit" class="btn btn-success" name="btnSubscriber" id="btnSubscriber" value="SAVE">
						</div>
						<div class="col-md-6">
							<input type="reset" class="btn btn-dark" value="RESET" id="btnReset"></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default panel-with-options">
			<div class="panel-heading">
				<h3 class="panel-title">Category Data Table</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered datatable">
						<thead>
							<tr>
								<th>SR </th>						
								<th>Subscriber email id</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							
							<?php

								$counter = 1;
								$q="select * from subscriber_tbl ORDER BY subscriber_id DESC";
								$rs_subscriber = mysql_query($q,$con);
								while($row_subscriber = mysql_fetch_array($rs_subscriber))
								{?>
										
									<tr>	
									<td><?php echo $counter++; ?></td>
							
										
									<td><?php echo $row_subscriber['subscriber_email_id']; ?></td>
									<td><?php echo $row_subscriber['subscriber_date']; ?></td>									
                                    <td>
                                                <button type="button" class="btn btn-info" title="Edit"   id='<?php echo $row_subscriber['subscriber_id'];?>' name="btn_edit" value="&laquo; Back"><i class="fa fa-edit"></i></button>
                                               
                                                <button href='' type="button" data-type="confirm" class="btn btn-danger" title="Delete"  id='<?php echo $row_subscriber['subscriber_id'];?>' name="btn_delete"><i class="fa fa-trash-o"></i></button>
                                           
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
			
			var subscriber_id = $(this).attr("id");
			alert(subscriber_id);
			if(confirm("Are you sure you want to delete this?"))
			{
				$.ajax({ url: 'subscriber_delete.php',
						 data: {'id': subscriber_id, 'delete': 1},
						 type: 'post',
						 success: function(output) {					 			
									  //window.location.reload();
									  window.location.reload();
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
			var subscriber_id = $(this).attr("id");
			
			if(confirm("Are you sure you want to edit this?"))
			{
				$.ajax({ url: 'subscriber_update.php',
						 data: {'id': subscriber_id, 'edit': 1},
						 type: 'post',
						 dataType :'json',
						 success: function(data) {
						 				
                                    //    document.getElementById("category_signal").value = 1;
									document.getElementById("subscriber_id").value = subscriber_id;
										document.getElementById("subscriber_email_id").value = data.subscriber_email_id;
						
										document.getElementById("btnSubscriber").value = "Edit Subscriber";	
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