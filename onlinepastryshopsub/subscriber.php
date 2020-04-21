
<?php
	include_once('header.php');
	include_once('connection.php');

	if(isset($_POST['btnCategory']))
	{
		if($_POST['category_id'] != "")
		{
            $q="CALL updateCategory('".$_POST['category_id']."','".$_POST['company_id']."','".$_POST['category_name']."','".$_POST['category_code']."')";
	     	
		}
		
		
		$rs=mysql_query($q,$con);
		if(!$rs)
		{
			echo "OOPS!!! Category Not Inserted.".mysql_error();
		}
		
	}



?>

<!-- Breadcrumb  -->
<!-- #Breadcrumb -->

<!-- row -->
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
								<th>Company Name</th>						
								<th>Subscriber email id</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							
							<?php

								$counter = 1;
								$q="select * from subscriber_tbl";
								$rs_subscriber = mysql_query($q,$con);
								while($row_subscriber = mysql_fetch_array($rs_subscriber))
								{?>
										
									<tr>	
									<td><?php echo $counter++; ?></td>
							
									<?php $fetch="select *from company_tbl where company_id='".$row_subscriber['company_id']."'";
									$rs_fetch=mysql_query($fetch,$con);
									while($com = mysql_fetch_array($rs_fetch))
										{?>
									<td><?php echo $com['company_name']; ?></td>
									<?php
									}	
									?>								
										
									<td><?php echo $row_subscriber['subscriber_email_id']; ?></td>
									<td><?php echo $row_subscriber['subscriber_date']; ?></td>									

                                                <button type="button" class="btn btn-info" title="Edit"   id='<?php echo $rs_subscriber['subscriber_id'];?>' name="btn_edit" value="&laquo; Back"><i class="fa fa-edit"></i></button>
                                               
                                                <button href='' type="button" data-type="confirm" class="btn btn-danger" title="Delete"  id='<?php echo $rs_subscriber['subscriber_id'];?>' name="btn_delete"><i class="fa fa-trash-o"></i></button>
                                           
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
			var category_id = $(this).attr("id");
			alert(category_id);
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