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
	
				var company_id=document.getElementById('company_id').selectedIndex;
			
	if(company_id==0)
	{

		document.getElementById('a_com').innerHTML = "Select Company";	
        flag=1;	
	}
	else
	{

		
		document.getElementById('a_com').innerHTML = "";		
		
		
	}		
				var admin_name=document.getElementById('admin_name').value;
	
	if(admin_name=="")
	{

		document.getElementById('a_name').innerHTML = "Enter Shipping Cost";	
        flag=1;		
		
	}
	
	else
	{
		v_pincode=/^([a-zA-Z])+$/;
		if(v_pincode.test(admin_name)==false)
		{
			document.getElementById('a_name').innerHTML = "! Only charater";	
			flag=1;
		}
		else
		{
		document.getElementById('a_name').innerHTML = "";		
		}
		
	}	
    
				var admin_mob=document.getElementById('admin_mob').value;
	
	if(admin_mob=="")
	{

		document.getElementById('a_mob').innerHTML = "Enter Shipping Cost";	
        flag=1;		
		
	}
	
	else
	{
		v_pincode=/^([0-9]{10})+$/;
		if(v_pincode.test(admin_mob)==false)
		{
			document.getElementById('a_mob').innerHTML = "!Enter in proper format";	
			flag=1;
		}
		else
		{
		document.getElementById('a_mob').innerHTML = "";		
		}
		
	}	
					var admin_email=document.getElementById('admin_email').value;
	
	if(admin_email=="")
	{

		document.getElementById('a_email').innerHTML = "Enter Email";	
        flag=1;		
		
	}
	
	else
	{
		v_pincode=/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		if(v_pincode.test(admin_email)==false)
		{
			document.getElementById('a_email').innerHTML = "Enter Email In Proper Format";	
			flag=1;
		}
		else
		{
		document.getElementById('a_email').innerHTML = "";		
		}
		
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
    
    $q1="select * from admin_registration_tbl where admin_id='".$_SESSION["id"]."'";
   $row_ad1=mysql_query($q1,$con);
	$rows_ad1=mysql_fetch_array($row_ad1);	                                        


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
		   
		    }

	        }
			
			$q="CALL updateAdmin('".$_POST['admin_id']."','".$_POST['admin_name']."','".$_POST['company_id']."','".$_POST['admin_mob']."','".$_POST['admin_email']."','".$_POST['admin_password']."','".$i."')";
	        $rs_update=mysql_query($q_update,$con);
  		}


		$rs=mysql_query($q,$con);
		if(!$rs)
		{
			echo "OOPS!!! sfmksmfsl Not Inserted.".mysql_error();
		}
		echo "<script>window.location = 'profile_update.php';</script>";
		
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
			<li><a href="#">Update Profile</a></li>
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
									<img id="img1" src="image_admin/<?php echo $rows_ad1['admin_img']; ?>" style="width: 250px; height: 250px;border:solid 5px #000000;" alt="Image1">
								 </div>
                            </div>
								<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Select Company</label>
									<span id="a_com" class="text-danger" style="float:right;"></span>
                                       <select id="company_id" name="company_id" class="form-control">
									   <option value="0"></option>
                                       	<?php
                                                $fetch_company="select *from company_tbl";
                                                $row_company=mysql_query($fetch_company,$con);
                                                while ($rows_company=mysql_fetch_array($row_company)) {
                                                	?><option value="<?php echo $rows_company['company_id'];?>" <?php if($rows_ad1['company_id']==$rows_company['company_id']){echo "selected";}?>><?php echo $rows_company['company_name'];?></option><?php
                                                	# code...
                                                }
                                       	?>
                                       </select>
								</div>
							</div>
							<div class="col-md-6">

								<div class="form-group">
									<label class="control-label">Admin name:</label>
									<span id="a_name" class="text-danger" style="float:right;"></span>
									<input type="text" class="form-control" id="admin_name" value="<?php echo $rows_ad1['admin_name']; ?>" name="admin_name" placeholder="Admin name">

								</div>
                              </div>

							<div class="col-md-6">
							
								<div class="form-group">
									<label class="control-label">Admin mob no:</label>
									<span id="a_mob" class="text-danger" style="float:right;"></span>
									<input type="text" class="form-control" id="admin_mob" value="<?php echo $rows_ad1['admin_mob']; ?>" name="admin_mob" placeholder="Admin mobile">

								</div>
							</div>
							<div class="col-md-6">

								<div class="form-group">
									<label class="control-label">Admin Email</label>
									<span id="a_email" class="text-danger" style="float:right;"></span>
									<input type="text" class="form-control" id="admin_email" value="<?php echo $rows_ad1['admin_email']; ?>" name="admin_email" placeholder="Admin Email">

								</div>
							</div>
							<div class="col-md-6">

								<div class="form-group">
									<label class="control-label">Admin Password:</label>
									<input type="text" class="form-control" id="admin_password" value="<?php echo $rows_ad1['admin_password']; ?>" name="admin_password" placeholder="Admin Password">

								</div>
							</div>

                            
						</div>

					</div>
			
					<div class="form-actions">
						<div class="col-md-6">
						<input type="hidden" name="admin_id" id="admin_id" value="<?php echo $rows_ad1['admin_id']; ?>">
						<input type="submit" class="btn btn-success" name="btnAdmin" id="btnAdmin" value="UPDATE">
					    </div>

					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- #row -->










<!-- #row -->

<?php
	include_once('footer.php');
?>