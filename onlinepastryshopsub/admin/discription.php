
<?php
	include_once('header.php');
	include_once('connection.php');

	if(isset($_POST['btnDiscription']))
	{
		if($_POST['discription_id'] == "")
		{
			$q="CALL insertDiscription('".$_POST['theme_id']."','".$_POST['discription']."')";
			
	
		}
		else
		{

	      	      $q="CALL updateDiscription('".$_POST['discription_id']."','".$_POST['theme_id']."','".$_POST['discription']."')";
	      //  $rs_update=mysql_query($q_update,$con);
  		}

		
		$rs=mysql_query($q,$con);
		if(!$rs)
		{
			echo "OOPS!!! Pincode Not Inserted/Updated.".mysql_error();
		}
		
	}



?>

<script type="text/javascript">
	
		function validation()
    {
	

	var flag;
	
				var theme_id=document.getElementById('theme_id').selectedIndex;
			
	if(theme_id==0)
	{

		document.getElementById('t_theme').innerHTML = "Select Theme";	
        flag=1;	
	}
	else
	{

		document.getElementById('t_theme').innerHTML = "";		
		
	}		
				var discription=document.getElementById('discription').value;
	
	if(discription=="")
	{

		document.getElementById('t_discription').innerHTML = "Enter Discription";	
        flag=1;		
		
	}
	
	else
	{
		document.getElementById('t_discription').innerHTML = "";		
		
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
		<h4 class="page-title">Pincode Master</h4>
	</div>
	<div class="col-lg-9 col-md-8 col-sm-8 hidden-xs">
		<ol class="breadcrumb">
			<li><a href="#">Dashboard</a></li>
			<li><a href="#">Discrption Master</a></li>
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
									<label class="control-label">Select Theme:</label>
									   <span id="t_theme" class="text-danger" style="float:right;"></span>
                                       <select id="theme_id" name="theme_id" class="form-control">
									   <option value="0"></option>
                                       	<?php
                                                $fetch_theme="select *from theme";
                                                $row_theme=mysql_query($fetch_theme,$con);
                                                while ($rows_theme=mysql_fetch_array($row_theme)) {
                                                	?><option value="<?php echo $rows_theme['theme_id'];?>"><?php echo $rows_theme['theme_name'];?></option><?php
                                                	# code...
                                                }
                                       	?>
                                       </select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Theme Discription</label>
									<span id="t_discription" class="text-danger" style="float:right;"></span>
									<input type="text" class="form-control" id="discription" name="discription" placeholder="Discription">
								</div>
							</div>

						</div>
					</div>
					<div class="form-actions">
						<div class="col-md-6">
						<input type="hidden" name="discription_id" id="discription_id">
						<input type="submit" class="btn btn-success" name="btnDiscription" id="btnDiscription" value="SAVE">
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
				<h3 class="panel-title">Pincode Data Table</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered datatable">
						<thead>
							<tr>
								<th>SR </th>
																
								<th>Theme</th>
								<th>Discription</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							
							<?php

								$counter = 1;
								$q="select * from discription ORDER BY discription_id DESC";
								$rs_dis = mysql_query($q,$con);
								while($row_dis = mysql_fetch_array($rs_dis))
								{?>
										
									<tr>	
									<td><?php echo $counter++; ?></td>
							
									<?php $fetch="select *from theme where theme_id='".$row_dis['theme_id']."'";
									$rs_fetch=mysql_query($fetch,$con);
									while($com = mysql_fetch_array($rs_fetch))
										{?>
									<td><?php echo $com['theme_name']; ?></td>
									<?php
									}	
									?>	
								    <td><?php echo $row_dis['discription']; ?></td>
									
									<td>                                            
                                                <button type="button" class="btn btn-info" title="Edit"   id='<?php echo $row_dis['discription_id'];?>' name="btn_edit"><i class="fa fa-edit"></i></button>
                                               
                                                <button href='' type="button" data-type="confirm" class="btn btn-danger" title="Delete"  id='<?php echo $row_dis['discription_id'];?>' name="btn_delete"><i class="fa fa-trash-o"></i></button>
                                           
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
			var discription_id = $(this).attr("id");
			if(confirm("Are you sure you want to delete this?"))
			{
				$.ajax({ url: 'discription_delete.php',
						 data: {'id': discription_id, 'delete': 1},
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
			var discription_id = $(this).attr("id");
			
			if(confirm("Are you sure you want to edit this?"))
			{
				$.ajax({ url: 'discription_update.php',
						 data: {'id': discription_id, 'edit': 1},
						 type: 'post',
						 dataType :'json',
						 success: function(data) {
						 				
                                    //    document.getElementById("category_signal").value = 1;
									document.getElementById("discription_id").value = discription_id;
										document.getElementById("theme_id").value = data.theme_id;									
										document.getElementById("discription").value = data.discription;
										document.getElementById("btnDiscription").value = "Edit Discription";	
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