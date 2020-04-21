
<?php
	include_once('header.php');

	if(isset($_POST['btnCategory']))
	{
		if($_POST['category_id'] == "")
		{
			$q="CALL insertCategory('".$_POST['category_name']."','".$_POST['category_code']."')";
	
		}
		else
		{

	       $q="CALL updateCategory('".$_POST['category_id']."','".$_POST['category_name']."','".$_POST['category_code']."')";
	     
  		}

		$rs=mysql_query($q,$con);
		if(!$rs)
		{

		} 
	   else
	   {
		   echo("ss");
    
       }
		
	}
?>
<script type="text/javascript">
function validation()
{
	
	$category_name=document.getElementById('category_name').value;
	var flag;
	if($category_name=="")
	{
		flag=1;

		document.getElementById('c_name').innerHTML = "Enter Category Name";		
	  
	}
	else
	{
		document.getElementById('c_name').innerHTML = "";		
	}
	
	var category_code=document.getElementById('category_code').value;
	if(category_code=="")
	{

		document.getElementById('c_code').innerHTML = "Enter Category Code";	
        flag=1;		
		
	}
	else
	{
		document.getElementById('c_code').innerHTML = "";		
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
		<h4 class="page-title">Category Master</h4>
	</div>
	<div class="col-lg-9 col-md-8 col-sm-8 hidden-xs">
		<ol class="breadcrumb">
			<li><a href="#">Dashboard</a></li>
			<li><a href="#">Category Master</a></li>
		</ol>
	</div>
</div>
<!-- #Breadcrumb -->

<!-- row -->
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-defaut">

			<div class="panel-body">
				<form action="" method="post" name="frmCategory" id="frmCategory" onSubmit="return validation()">
					<div class="form-body">
						<div class="row">
									
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Category Name</label>
								    <span id="c_name" class="text-danger" style="float:right;"></span>									
									<input type="text" class="form-control" id="category_name" name="category_name" placeholder="Category Name">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label">Category Code</label>
									<span id="c_code" class="text-danger" style="float:right;"></span>
									<input type="text" class="form-control" id="category_code" name="category_code" placeholder="Category Code">
								</div>
							</div>
						</div>
					</div>
					<div class="form-actions">
						<input type="hidden" name="category_id" id="category_id" name="category_id">
						<div class="col-md-6">
						<input type="submit" class="btn btn-success" name="btnCategory" id="btnCategory" value="SAVE">
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
				<h3 class="panel-title">Category Data Table</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered datatable">
						<thead>
							<tr>
								<th>SR </th>								
								<th>Category Code</th>
								<th>Category Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							
							<?php

								$counter = 1;
								$q="select * from category_tbl ORDER BY category_id DESC";
								$rs_category = mysql_query($q,$con);
								while($row_category = mysql_fetch_array($rs_category))
								{?>
										
									<tr>	
									<td><?php echo $counter++; ?></td>																			
									<td><?php echo $row_category['category_code']; ?></td>								  
									<td><?php echo $row_category['category_name']; ?> </td>									
									<td>                                            
										<button type="button" class="btn btn-info" title="Edit"   id='<?php echo $row_category['category_id'];?>' name="btn_edit" value="&laquo; Back"><i class="fa fa-edit"></i></button>
									   
										<button href='' type="button" data-type="confirm" class="btn btn-danger" title="Delete"  id='<?php echo $row_category['category_id'];?>' name="btn_delete"><i class="fa fa-trash-o"></i></button>
                                           
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
			
		
			var category_id = $(this).attr("id");

			if(confirm("Are you sure you want to delete this?"))
			{
				$.ajax({ url: 'delete.php',
						 data: {'id': category_id, 'delete': 1},
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
			var category_id = $(this).attr("id");
			
			if(confirm("Are you sure you want to edit this?"))
			{
				$.ajax({ url: 'update4.php',
						 data: {'id': category_id, 'edit': 1},
						 type: 'post',
						 dataType :'json',
						 success: function(data) {
						 				
                                    //    document.getElementById("category_signal").value = 1;
									document.getElementById("category_id").value = category_id;
										document.getElementById("category_name").value = data.category_name;
										document.getElementById("category_code").value = data.category_code;
										document.getElementById("btnCategory").value = "Edit Category";	
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