
<?php
	include_once('header.php');
	include_once('connection.php');

	if(isset($_POST['btnContact']))
	{
		if($_POST['contact_id']== "")
		{
	
         $q="CALL insertContact('".$_POST['contact_name']."','".$_POST['contact_email']."','".$_POST['contact_mob']."','".$_POST['contact_subject']."','".$_POST['contact_message']."')"; 
	     	
		}
		else
		{
						$c=2;
         $q="CALL updateContact('".$_POST['contact_id']."','".$_POST['contact_name']."','".$_POST['contact_email']."','".$_POST['contact_mob']."','".$_POST['contact_subject']."','".$_POST['contact_message']."')";
	     
		}
		
		$rs=mysql_query($q,$con);
		if(!$rs)
		{
			echo "OOPS!!! Contact Not Inserted/Updated.".mysql_error();
		}
		
	}



?>
<script type="text/javascript">
	
	function validation()
    {
	

	var flag;
	var contact_name=document.getElementById('contact_name').value;
	if(contact_name=="")
	{

		document.getElementById('c_name').innerHTML = "Enter Name";	
        flag=1;		
		
	}
	
	else
	{
		v_name=/^([A-Za-z])+$/;
		if(v_name.test(contact_name)==false)
		{
			document.getElementById('c_name').innerHTML = "only charater";	
			flag=1;
		}
		else
		{
		document.getElementById('c_name').innerHTML = "";	
		}		
	}
	var contact_mob=document.getElementById('contact_mob').value;
	if(contact_mob=="")
	{

		document.getElementById('c_mob').innerHTML = "Enter Mobile Number";	
        flag=1;		
		
	}
	
	else
	{
		v_mob=/^([0-9]){10}$/;
		if(v_mob.test(contact_mob)==false)
		{
			document.getElementById('c_mob').innerHTML = "!..Enter valid Number";	
			flag=1;
		}
		else
		{
		document.getElementById('c_mob').innerHTML = "";	
		}		
	}		
	var contact_email=document.getElementById('contact_email').value;
	if(contact_email=="")
	{

		document.getElementById('c_email').innerHTML = "Enter Email";	
        flag=1;		
		
	}
	
	else
	{
		v_email=/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		if(v_email.test(contact_email)==false)
		{
			document.getElementById('c_email').innerHTML = "Enter valid email";	
			flag=1;
		}
		else
		{
		document.getElementById('c_email').innerHTML = "";	
		}		
	}		
	var contact_subject=document.getElementById('contact_subject').value;
	if(contact_subject=="")
	{

		document.getElementById('c_subject').innerHTML = "Enter Subject";	
        flag=1;		
		
	}
	
	else
	{

		document.getElementById('c_subject').innerHTML = "";	
		
	}		
	var contact_message=document.getElementById('contact_message').value;
	if(contact_message=="")
	{

		document.getElementById('c_message').innerHTML = "Enter Message";	
        flag=1;		
		
	}
	
	else
	{

		document.getElementById('c_message').innerHTML = "";	
		
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
		<h4 class="page-title">Contact Master</h4>
	</div>
	<div class="col-lg-9 col-md-8 col-sm-8 hidden-xs">
		<ol class="breadcrumb">
			<li><a href="#">Dashboard</a></li>
			<li><a href="#">Contact Master</a></li>
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
									<label class="control-label">Contact Name:</label>
									<span id="c_name" class="text-danger" style="float:right;"></span>
									<input type="text" class="form-control" id="contact_name" name="contact_name" placeholder="Contact Name">

								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Mobile Number:</label>
									<span id="c_mob" class="text-danger" style="float:right;"></span>
									<input type="text" class="form-control" id="contact_mob" name="contact_mob" placeholder="Mobile Number">

								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Contact Email Id:</label>
									<span id="c_email" class="text-danger" style="float:right;"></span>
									<input type="text" class="form-control" id="contact_email" name="contact_email" placeholder="Contact Email Id">

								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Contact Subject:</label>
									<span id="c_subject" class="text-danger" style="float:right;"></span>
									<input type="text" class="form-control" id="contact_subject" name="contact_subject" placeholder="Contact Subject">

								</div>
							</div>													
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Contact Message:</label>
									<span id="c_message" class="text-danger" style="float:right;"></span>
									<input type="text" class="form-control" id="contact_message" name="contact_message" placeholder="Contact Message">

								</div>
							</div>															
						</div>
					</div>
					
					<div class="form-actions">
						<div class="col-md-6">
							<input type="hidden" name="contact_id" id="contact_id">
							<input type="submit" class="btn btn-success" name="btnContact" id="btnContact" value="SAVE">
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
													<th>Contact Name</th>
								<th>Contact Mobile No</th>
								<th>Contact Email Id</th>
								<th>Contact Subject</th>
								<th>Contact Message</th>

								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							
							<?php

								$counter = 1;
								$q="select * from contact_us ORDER BY contact_id DESC";
								$rs_contact = mysql_query($q,$con);
								while($row_contact = mysql_fetch_array($rs_contact))
								{?>
										
									<tr>	
									<td><?php echo $counter++; ?></td>                                    
									<td><?php echo $row_contact['contact_name']; ?></td>
									<td><?php echo $row_contact['contact_mob']; ?></td>
									<td><?php echo $row_contact['contact_email']; ?></td>	
									<td><?php echo $row_contact['contact_subject']; ?></td>
									<td><?php echo $row_contact['contact_message']; ?></td>																																						
                                    <td>
                                                <button type="button" class="btn btn-info" title="Edit"   id='<?php echo $row_contact['contact_id'];?>' name="btn_edit" value="&laquo; Back"><i class="fa fa-edit"></i></button>
                                               
                                                <button href='' type="button" data-type="confirm" class="btn btn-danger" title="Delete"  id='<?php echo $row_contact['contact_id'];?>' name="btn_delete"><i class="fa fa-trash-o"></i></button>
                                           
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
			
			var contact_id = $(this).attr("id");
			alert(contact_id);
			if(confirm("Are you sure you want to delete this?"))
			{
				$.ajax({ url: 'contact_us_admin_delete.php',
						 data: {'id': contact_id, 'delete': 1},
						 type: 'post',
						 success: function(output) {					 			
									  //window.location.reload();
									  alert("success");
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
			var contact_id = $(this).attr("id");
			
			if(confirm("Are you sure you want to edit this?"))
			{
				$.ajax({ url: 'contact_us_admin_update.php',
						 data: {'id': contact_id, 'edit': 1},
						 type: 'post',
						 dataType :'json',
						 success: function(data) {
						 				
                                    //    document.getElementById("category_signal").value = 1;
                                    alert("suuce");
									document.getElementById("contact_id").value = contact_id;

										document.getElementById("contact_name").value = data.contact_name;
										document.getElementById("contact_mob").value = data.contact_mob;
										document.getElementById("contact_email").value = data.contact_email;
										document.getElementById("contact_subject").value = data.contact_subject;
										document.getElementById("contact_message").value = data.contact_message;																																								
										document.getElementById("btnContact").value = "Edit Contact";	
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