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
	
				var admin_name=document.getElementById('admin_name').value;
			
	if(admin_name=="")
	{

		document.getElementById('adminname').innerHTML = "Enter Name..!";	
        flag=1;	
	}
	else
	{

		document.getElementById('adminname').innerHTML = "";		
		
	}		
			var admin_email=document.getElementById('admin_email').value;
	
	if(admin_email=="")
	{

		document.getElementById('adminemail').innerHTML = "Enter Email..!";	
        flag=1;		
		
	}
	
	else
	{
		v_pincode=/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		if(v_pincode.test(admin_email)==false)
		{
			document.getElementById('adminemail').innerHTML = "Enter in proper format..!";	
			flag=1;
		}
		else
		{
		document.getElementById('adminemail').innerHTML = "";		
		}
		
	}	
				var admin_password=document.getElementById('admin_password').value;	
	if(admin_password=="")
	{

		document.getElementById('adminpass').innerHTML = "Enter Password..!";	
        flag=1;		
		
	}
	
	else
	{

		document.getElementById('adminpass').innerHTML = "";		
	
		
	}
				var admin_mob=document.getElementById('admin_mob').value;	
	if(admin_mob=="")
	{

		document.getElementById('adminmob').innerHTML = "Enter Mobile Number..!";	
        flag=1;		
		
	}
	
	else
	{
		v_pincode=/^([0-9]{10})+$/;
		if(v_pincode.test(admin_mob)==false)
		{
			document.getElementById('adminmob').innerHTML = "!Enter in proper format";	
			flag=1;
		}
		else
		{
		document.getElementById('adminmob').innerHTML = "";		
		}
	}
			var company_id=document.getElementById('company_id').selectedIndex;
			
	if(company_id==0)
	{

		document.getElementById('admincom').innerHTML = "Select Company";	
        flag=1;	
	}
	else
	{

		
		document.getElementById('admincom').innerHTML = "";		
		
		
		
	}
	if(flag==1)
	{
	
		return false;
	}
	return true;
}
</script>
<?php
	include_once('header.php');
	include_once('connection.php');



   	if(isset($_POST['btnAdmin']))
	{
				    $acceptable=array('image/jpeg','image/jpg','image/png');
		if($_POST['admin_id'] == "")
		{
			if(!empty($_FILES["admin_image"]["name"]) && in_array($_FILES["admin_image"]["type"],$acceptable) && !empty($_FILES["admin_image"]["name"]))
	        {
	         echo "set";
	                echo $_FILES["admin_image"]["name"]; 
                  $i=$_FILES["admin_image"]["name"];
                  $i=pathinfo($i,PATHINFO_FILENAME).mt_rand(600000,999999).".".pathinfo($i,PATHINFO_EXTENSION);
                   $tmp_name3=$_FILES["admin_image"]["tmp_name"];
        
                   if(is_uploaded_file($tmp_name3))
                   {
                   copy($tmp_name3,"image_admin/".$i);

                   }
	        }
        	else
	        {
	        	echo "else1";
		    $i="";
	        }
			                   		            
            echo $i;
			$q="CALL insertAdmin('".$_POST['admin_name']."','".$_POST['company_id']."','".$_POST['admin_mob']."','".$_POST['admin_email']."','".$_POST['admin_password']."','".$i."')";
			echo $q;
	           
		}
		else
		{
			if(!empty($_FILES["admin_image"]["name"]) && in_array($_FILES["admin_image"]["type"],$acceptable) && !empty($_FILES["admin_image"]["name"]))
	        {
	         
	            $i=$_POST['admin_id'];	
             
            $q1="select * from admin_registration_tbl where admin_id=$i";
            $rs_select=mysql_query($q1,$con);

            $row_select = mysql_fetch_array($rs_select);
	        $image1 = $row_select['admin_img'];
	        $path = $_SERVER['DOCUMENT_ROOT'].'/onlinecakeshop/admin/image_admin/';
	
            if(file_exists($path.$image1))
            {
	        unlink($path.$image1);
            }
	                echo $_FILES["admin_image"]["name"]; 
                  $i=$_FILES["admin_image"]["name"];
                  $i=pathinfo($i,PATHINFO_FILENAME).mt_rand(600000,999999).".".pathinfo($i,PATHINFO_EXTENSION);
                   $tmp_name3=$_FILES["admin_image"]["tmp_name"];
        
                   if(is_uploaded_file($tmp_name3))
                   {
                   copy($tmp_name3,"image_admin/".$i);
                   }
	        }
        	else
	        {
	
		    $fetch="select *from admin_registration_tbl where  admin_id='".$_POST['admin_id']."'";
		    $row=mysql_query($fetch,$con);
		    while($rows=mysql_fetch_array($row))
		    {
		    	$i=$rows['admin_img'];
		    	echo $i;
		    }

	        }
			
			$q="CALL updateAdmin('".$_POST['admin_id']."','".$_POST['admin_name']."','".$_POST['company_id']."','".$_POST['admin_mob']."','".$_POST['admin_email']."','".$_POST['admin_password']."','".$i."')";
	      //  $rs_update=mysql_query($q_update,$con);
  		}

		
		$rs=mysql_query($q,$con);
		if(!$rs)
		{
			echo "OOPS!!! sfmksmfsl Not Inserted.".mysql_error();
		}
		
	}

?>

<!-- Breadcrumb  -->
<div class="row csk-breadcrumb">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h4 class="page-title">Admin Master</h4>
	</div>
	<div class="col-lg-9 col-md-8 col-sm-8 hidden-xs">
		<ol class="breadcrumb">
			<li><a href="#">Dashboard</a></li>
			<li><a href="#">Admin Master</a></li>
		</ol>
	</div>
</div>
<!-- #Breadcrumb -->

<!-- row -->
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-defaut">
			<div class="panel-body">
				<form action="" method="post" name="frmCategory" id="frmCategory" enctype="multipart/form-data" onSubmit="return validation()">
					<div class="form-body">
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label class="control-label">Admin Image:</label>
									<input type="file" class="form-control" onchange="validatesize(this)" id="admin_image" name="admin_image" placeholder="Admin Image">
								</div>
							</div>
							<div class="col-md-9">
								<div class="form-group">
									<img id="img1" style="width: 250px; height: 250px;border:solid 5px #000000;" alt="Image1">
								 </div>
                            </div>
								<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Select Company</label>
									<span id="admincom" class="text-danger" style="float:right;"></span>
                                       <select id="company_id" name="company_id" class="form-control">
									   <option value="0"></option>
                                       	<?php
                                                $fetch_company="select *from company_tbl";
                                                $row_company=mysql_query($fetch_company,$con);
                                                while ($rows_company=mysql_fetch_array($row_company)) {
                                                	?><option value="<?php echo $rows_company['company_id'];?>"><?php echo $rows_company['company_name'];?></option><?php
                                                	# code...
                                                }
                                       	?>
                                       </select>
								</div>
							</div>
							<div class="col-md-6">

								<div class="form-group">
									<label class="control-label">Admin name:</label>
									<span id="adminname" class="text-danger" style="float:right;"></span>
									<input type="text" class="form-control" id="admin_name" name="admin_name" placeholder="Admin name">

								</div>
                              </div>

							<div class="col-md-6">
							
								<div class="form-group">
									<label class="control-label">Admin mob no:</label>
									<span id="adminmob" class="text-danger" style="float:right;"></span>
									<input type="text" class="form-control" id="admin_mob" name="admin_mob" placeholder="Admin mobile">

								</div>
							</div>
							<div class="col-md-6">

								<div class="form-group">
									<label class="control-label">Admin Email</label>
									<span id="adminemail" class="text-danger" style="float:right;"></span>
									<input type="text" class="form-control" id="admin_email" name="admin_email" placeholder="Admin Email">

								</div>
							</div>
							<div class="col-md-6">

								<div class="form-group">
									<label class="control-label">Admin Password:</label>
									<span id="adminpass" class="text-danger" style="float:right;"></span>
									<input type="text" class="form-control" id="admin_password" name="admin_password" placeholder="Admin Password">

								</div>
							</div>

                            
						</div>

					</div>
			
					<div class="form-actions">
						<div class="col-md-6">
						<input type="hidden" name="admin_id" id="admin_id">
						<input type="submit" class="btn btn-success" name="btnAdmin" id="btnAdmin" value="SAVE">
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
				<h3 class="panel-title">Admin Data Table</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered datatable">
						<thead>
							<tr>
								<th>SR </th>
								<th>Admin Image</th>
								<th>Admin Name</th>
								<th>Company Name</th>				
								<th>Admin Mobile</th>
								<th>Admin Email</th>
								<th>Admin Password</th>
							    <th>Action</th>
							</tr>
						</thead>
						<tbody>
							
							<?php

								$counter = 1;
								$q="select * from admin_registration_tbl";
								$rs_admin = mysql_query($q,$con);
								while($row_admin = mysql_fetch_array($rs_admin))
								{?>
										
									<tr>	
									<td><?php echo $counter++; ?></td>
									<td>
                                      <img id="img1" src="image_admin/<?php echo $row_admin['admin_img']; ?>" style="width: 300px; height: 200px;border:solid 5px #000000;" alt="Image1">
										 </td>
									<td><?php echo $row_admin['admin_name']; ?></td>
									<?php $fetch="select *from company_tbl where company_id='".$row_admin['company_id']."'";
									$rs_fetch=mysql_query($fetch,$con);
									while($com = mysql_fetch_array($rs_fetch))
										{?>
									<td><?php echo $com['company_name']; ?></td>
									<?php
									}	
									?>								

								    <td><?php echo $row_admin['admin_mob']; ?></td>
									<td><?php echo $row_admin['admin_email']; ?> </td>
									<td><?php echo $row_admin['admin_password']; ?> </td>
	
									
                                    <td>    
                                                <button type="button" class="btn btn-info" title="Edit"   id='<?php echo $row_admin['admin_id'];?>' name="btn_edit" value="&laquo; Back"><i class="fa fa-edit"></i></button>
                                               
                                                <button href='' type="button" data-type="confirm" class="btn btn-danger" title="Delete"  id='<?php echo $row_admin['admin_id'];?>' name="btn_delete"><i class="fa fa-trash-o"></i></button>
                                           
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
			var admin_id = $(this).attr("id");
		//	alert(company_id);
			if(confirm("Are you sure you want to delete this?"))
			{
				$.ajax({ url: 'admin_delete.php',
						 data: {'id': admin_id, 'delete': 1},
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
			var admin_id = $(this).attr("id");
			
			if(confirm("Are you sure you want to edit this?"))
			{
				$.ajax({ url: 'admin_update.php',
						 data: {'id': admin_id, 'edit': 1},
						 type: 'post',
						 dataType :'json',
						 success: function(data) {
						 			
									
									document.getElementById("admin_id").value = admin_id;
									document.getElementById("company_id").value = data.company_id;
									document.getElementById("admin_name").value = data.admin_name;
									document.getElementById("admin_mob").value = data.admin_mob;
									document.getElementById("admin_email").value = data.admin_email;
									document.getElementById("admin_password").value = data.admin_password;
                                 document.getElementById("img1").src="image_admin/"+data.admin_img;	                                    
									document.getElementById("btnAdmin").value = "Edit Admin";
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