
<?php
	include_once('header.php');
	include_once('connection.php');

	if(isset($_POST['btnFlavour']))
	{
		if($_POST['flavour_id'] == "")
		{
			$q="CALL insertFlavour('".$_POST['flavour_name']."','".$_POST['flavour_code']."')";
	         
		}
		else
		{


	      $q="CALL updateFlavour('".$_POST['flavour_id']."','".$_POST['flavour_name']."','".$_POST['flavour_code']."')";
	  //  $rs_update=mysql_query($q_update,$con);
  		
  		}
  		//echo  $q;
  		$rs=mysql_query($q,$con);
		if(!$rs)
		{
			echo "OOPS!!! Flavour Not Inserted / Updated.".mysql_error();
		}
		
	}



?>
<script type="text/javascript">
function validation()
{
	
	$flavour_name=document.getElementById('flavour_name').value;
	var flag;
	if($flavour_name=="")
	{
		flag=1;

		document.getElementById('f_name').innerHTML = "Enter Flavour Name";		
	  
	}
	else
	{
		document.getElementById('f_name').innerHTML = "";		
	}
	
	var flavour_code=document.getElementById('flavour_code').value;
	if(flavour_code=="")
	{

		document.getElementById('f_code').innerHTML = "Enter Flavour Code";	
        flag=1;		
		
	}
	else
	{
		document.getElementById('f_code').innerHTML = "";		
	}
	var flavour_cost=document.getElementById('cost').value;
	if(flavour_cost=="")
	{

		document.getElementById('f_price').innerHTML = "Enter Price";	
        flag=1;		
		
	}
	
	else
	{
		document.getElementById('f_price').innerHTML = "";		
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
		<h4 class="page-title">Flavour Master</h4>
	</div>
	<div class="col-lg-9 col-md-8 col-sm-8 hidden-xs">
		<ol class="breadcrumb">
			<li><a href="#">Dashboard</a></li>
			<li><a href="#">flavour Master</a></li>
		</ol>
	</div>
</div>
<!-- #Breadcrumb -->

<!-- row -->
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-defaut">
			<div class="panel-body">
				<form action="" method="post" name="frmFlavour" id="frmFlavour" onSubmit="return validation()">
					<div class="form-body">
						<div class="row">
									
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Flavour Name</label>
									<span id="f_name" class="text-danger" style="float:right;"></span>
									<input type="text" class="form-control" id="flavour_name" name="flavour_name" placeholder="Flavour Name">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label">Flavour Code</label>
									<span id="f_code" class="text-danger" style="float:right;"></span>
									<input type="text" class="form-control" id="flavour_code" name="flavour_code" placeholder="Flavour Code">
								</div>
							</div>

						</div>
					</div>
					<div class="form-actions">
						<div class="col-md-6">
						<input type="hidden" name="flavour_id" id="flavour_id" name="flavour_id">
						<input type="submit" class="btn btn-success" name="btnFlavour" id="btnFlavour" value="SAVE">
					    </div>
					    <div class="col-md-6">
						<input type="button" class="btn btn-warning" value="RESET" id="btnReset"></button>
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
				<h3 class="panel-title">Flavour Data Table</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered datatable">
						<thead>
							<tr>
								<th>SR </th>
															
								<th>Flavour Code</th>

								<th>Flavour Name</th>
							
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							
							<?php

								$counter = 1;
								$q="select * from flavour ORDER BY flavour_id DESC";
								$rs_theme = mysql_query($q,$con);
								while($row_flavour = mysql_fetch_array($rs_theme))
								{?>
										
									<tr>	
									<td><?php echo $counter++; ?></td>
								    							

								    <td><?php echo $row_flavour['flavour_code']; ?></td>
									<td><?php echo $row_flavour['flavour_name']; ?> </td>
									
									<td>                                            
                                                <button type="button" class="btn btn-info" title="Edit"   id='<?php echo $row_flavour['flavour_id'];?>' name="btn_edit"><i class="fa fa-edit"></i></button>
                                               
                                                <button href='' type="button" data-type="confirm" class="btn btn-danger" title="Delete"  id='<?php echo $row_flavour['flavour_id'];?>' name="btn_delete"><i class="fa fa-trash-o"></i></button>
                                           
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
			
			
			var flavour_id = $(this).attr("id");

			if(confirm("Are you sure you want to delete this?"))
			{
				$.ajax({ url: 'flavour_delete.php',
						 data: {'id': flavour_id, 'delete': 1},
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
			var flavour_id = $(this).attr("id");
			
			if(confirm("Are you sure you want to edit this?"))
			{
				$.ajax({ url: 'flavour_update.php',
						 data: {'id': flavour_id, 'edit': 1},
						 type: 'post',
						 dataType :'json',
						 success: function(data) {
						 				
                                    //    document.getElementById("category_signal").value = 1;
									document.getElementById("flavour_id").value = flavour_id;
										document.getElementById("flavour_name").value = data.flavour_name;
										document.getElementById("flavour_code").value = data.flavour_code;
							
										document.getElementById("btnFlavour").value = "Edit Flavour";	
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