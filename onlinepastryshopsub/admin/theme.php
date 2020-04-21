
<?php
	include_once('header.php');
	include_once('connection.php');

	if(isset($_POST['btnTheme']))
	{
		if($_POST['theme_id'] == "")
		{
			$q="CALL insertTheme('".$_POST['theme_name']."','".$_POST['theme_code']."')";
	
		}
		else
		{
	      	      $q="CALL updateTheme('".$_POST['theme_id']."','".$_POST['theme_name']."','".$_POST['theme_code']."')";
	      //  $rs_update=mysql_query($q_update,$con);
  		}

		$rs=mysql_query($q,$con);
		if(!$rs)
		{
			echo "OOPS!!! Category Not Inserted/Updated.".mysql_error();
		}	
	}
?>
<script type="text/javascript">
function validation()
{
	
	$theme_name=document.getElementById('theme_name').value;
	var flag;
	if($theme_name=="")
	{
		flag=1;
		alert(flag);
		document.getElementById('t_name').innerHTML = "Enter Theme Name";		
	  
	}
	else
	{
		document.getElementById('t_name').innerHTML = "";		
	}
	
	var category_code=document.getElementById('theme_code').value;
	if(category_code=="")
	{

		document.getElementById('t_code').innerHTML = "Enter Theme Code";	
        flag=1;		
		
	}
	else
	{
		document.getElementById('t_code').innerHTML = "";		
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
		<h4 class="page-title">Theme Master</h4>
	</div>
	<div class="col-lg-9 col-md-8 col-sm-8 hidden-xs">
		<ol class="breadcrumb">
			<li><a href="#">Dashboard</a></li>
			<li><a href="#">Theme Master</a></li>
		</ol>
	</div>
</div>
<!-- #Breadcrumb -->

<!-- row -->
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-defaut">
			<div class="panel-body">
				<form action="" method="post" name="frmTheme" id="frmTheme" onSubmit="return validation()">
					<div class="form-body">
						<div class="row">

							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Theme Name</label>
									<span id="t_name" class="text-danger" style="float:right;"></span>									
									<input type="text" class="form-control" id="theme_name" name="theme_name" placeholder="Theme Name">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label">Theme Code</label>
									<span id="t_code" class="text-danger" style="float:right;"></span>									
									<input type="text" class="form-control" id="theme_code" name="theme_code" placeholder="Theme Code">
								</div>
							</div>
						</div>
					</div>
					<div class="form-actions">
						<div class="col-md-6">
						<input type="hidden" name="theme_id" id="theme_id" name="theme_id">
						<input type="submit" class="btn btn-success" name="btnTheme" id="btnTheme" value="SAVE">
					    </div>
					    <div class="col-md-6">
						<input type="button" class="btn btn-dark" value="RESET" id="btnReset">
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
				<h3 class="panel-title">Theme Data Table</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered datatable">
						<thead>
							<tr>
								<th>SR </th>
								<th>Theme id</th>

								<th>Theme Code</th>
								<th>Theme Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							
							<?php

								$counter = 1;
								$q="select * from theme  ORDER BY theme_id DESC";
								$rs_theme = mysql_query($q,$con);
								while($row_theme = mysql_fetch_array($rs_theme))
								{?>
										
									<tr>	
									<td><?php echo $counter++; ?></td>
								    <td><?php echo $row_theme['theme_id']; ?></td>
																
								    
								    <td><?php echo $row_theme['theme_code']; ?></td>
									<td><?php echo $row_theme['theme_name']; ?> </td>
									
									<td>                                            
                                                <button type="button" class="btn btn-info" title="Edit"   id='<?php echo $row_theme['theme_id'];?>' name="btn_edit"><i class="fa fa-edit"></i></button>
                                               
                                                <button href='' type="button" data-type="confirm" class="btn btn-danger" title="Delete"  id='<?php echo $row_theme['theme_id'];?>' name="btn_delete"><i class="fa fa-trash-o"></i></button>
                                           
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
			
	
			var theme_id = $(this).attr("id");
	
			if(confirm("Are you sure you want to delete this?"))
			{
				$.ajax({ url: 'theme_delete.php',
						 data: {'id': theme_id, 'delete': 1},
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
			var theme_id = $(this).attr("id");
			
			if(confirm("Are you sure you want to edit this?"))
			{
				$.ajax({ url: 'theme_update.php',
						 data: {'id': theme_id, 'edit': 1},
						 type: 'post',
						 dataType :'json',
						 success: function(data) {
						 				
                                    //    document.getElementById("category_signal").value = 1;
									document.getElementById("theme_id").value = theme_id;
										document.getElementById("theme_name").value = data.theme_name;
										document.getElementById("theme_code").value = data.theme_code;
										document.getElementById("btnTheme").value = "Edit Category";	
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