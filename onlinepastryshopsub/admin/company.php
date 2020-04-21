<?php
   	include_once('header.php');
	$fetch_company_q="select *from company_tbl";
	$fetch_company=mysql_query($fetch_company_q,$con);
	if(isset($_POST['btnCompany']))
	{
		   $acceptable=array('image/jpeg','image/jpg','image/png');		    
			if(!empty($_FILES["company_logo_image"]["name"]) && in_array($_FILES["company_logo_image"]["type"],$acceptable) && !empty($_FILES["company_logo_image"]["name"]))
	        {
	         
	        $i=$_POST['company_id'];	
             
            $q1="select * from company_tbl where company_id=$i";
            $rs_select=mysql_query($q1,$con);

            $row_select = mysql_fetch_array($rs_select);
	        $image1 = $row_select['company_logo_image'];
	        $path = $_SERVER['DOCUMENT_ROOT'].'/onlinecakeshop/admin/image_company/';
	
            if(file_exists($path.$image1))
            {
	        unlink($path.$image1);
            }
	                echo $_FILES["company_logo_image"]["name"]; 
                  $i=$_FILES["company_logo_image"]["name"];
                  $i=pathinfo($i,PATHINFO_FILENAME).mt_rand(600000,999999).".".pathinfo($i,PATHINFO_EXTENSION);
                   $tmp_name3=$_FILES["company_logo_image"]["tmp_name"];
        
                   if(is_uploaded_file($tmp_name3))
                   {
                   copy($tmp_name3,"image_company/".$i);
                   }
	        }
        	else
	        {
	
		    $fetch="select *from company_tbl where company_id='".$_POST['company_id']."'";
		    $row=mysql_query($fetch,$con);
		    while($rows=mysql_fetch_array($row))
		    {
		    	$i=$rows['company_logo_image'];
		    	echo $i;
		    }

	        }
			
		

         $q="CALL updateCompany('".$_POST['company_id']."','".$_POST['company_name']."','".$_POST['company_mob']."','".$_POST['company_alt_mob']."','".$_POST['company_email']."','".$_POST['company_add']."','".$_POST['company_city']."','".$_POST['company_GST_in_no']."','".$_POST['company_bank_name']."','".$_POST['company_ac_no']."','".$_POST['company_IFSC']."','".$_POST['company_pin_no']."','".$_POST['company_general_LIC_no']."','".$i."')";
			$rs=mysql_query($q,$con);
		if(!$rs)
		{
			echo "OOPS!!! Category Not Inserted.".mysql_error();
		}
		
	     
    	 
	}
?>
<script type="text/javascript">
	function validatesize(file)
	{
		
                var filesize;
                var filesize = file.files[0].size / 1024 / 1024; // in MB
                if(filesize>2)
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
	
	$company_name=document.getElementById('company_name').value;
	var flag;
	
	if($company_name=="")
	{
		flag=1;
        
		document.getElementById('c_name').innerHTML = "Enter Company Name";
	  
	}
	else
	{
		document.getElementById('c_name').innerHTML = "";		
	}
	
	var company_mob=document.getElementById('company_mob').value;
	if(company_mob=="")
	{

		document.getElementById('c_mob').innerHTML = "Enter Company Mobile Number";	
        flag=1;		
		
	}
	else
	{
		v_pincode=/^([0-9]{10})+$/;
		if(v_pincode.test(company_mob)==false)
		{
			document.getElementById('c_mob').innerHTML = "!Enter in proper format";	
			flag=1;
		}
		else
		{
		document.getElementById('c_mob').innerHTML = "";		
		}
				
	}
	var company_alt_mob=document.getElementById('company_alt_mob').value;
	if(company_alt_mob=="")
	{

		document.getElementById('c_alt').innerHTML = "Enter Alternate Mobile Number";	
        flag=1;		
		
	}
	
	else
	{
		v_pincode=/^([0-9]{10})+$/;
		if(v_pincode.test(company_alt_mob)==false)
		{
			document.getElementById('c_alt').innerHTML = "!Enter in proper format";	
			flag=1;
		}
		else
		{
		document.getElementById('c_alt').innerHTML = "";		
		}	
	}
	var company_email=document.getElementById('company_email').value;
	if(company_email=="")
	{

		document.getElementById('c_email').innerHTML = "Enter Email";	
        flag=1;		
		
	}
	
	else
	{
		//v_name=/^[a-zA-Z0-9]+[@]{1}$/;
		//v_name=/^[a-zA-Z0-9]+[@]{1}[a-zA-Z]+[.com]{1}$/;
		v_name=/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		if(v_name.test(company_email)==false)
		{
			document.getElementById('c_email').innerHTML = "only charater";	
			flag=1;
		}
		else
		{
		document.getElementById('c_email').innerHTML = "";	
		}		
	}
		var company_add=document.getElementById('company_add').value;
	if(company_add=="")
	{

		document.getElementById('c_add').innerHTML = "Enter Address";	
        flag=1;		
		
	}
	
	else
	{
		document.getElementById('c_add').innerHTML = "";		
	}
		var company_city=document.getElementById('company_city').value;
	if(company_city=="")
	{

		document.getElementById('c_city').innerHTML = "Enter City";	
        flag=1;		
		
	}
	
	else
	{
		document.getElementById('c_city').innerHTML = "";		
	}
			var company_GST_in_no=document.getElementById('company_GST_in_no').value;
	if(company_GST_in_no=="")
	{

		document.getElementById('c_gst').innerHTML = "Enter Gst In NO";	
        flag=1;		
		
	}
	
	else
	{
		document.getElementById('c_gst').innerHTML = "";		
	}
		var company_bank_name=document.getElementById('company_bank_name').value;
	if(company_bank_name=="")
	{

		document.getElementById('c_bank').innerHTML = "Enter Bamk Name";	
        flag=1;		
		
	}
	
	else
	{
		document.getElementById('c_bank').innerHTML = "";		
	}
		var company_ac_no=document.getElementById('company_ac_no').value;
	if(company_ac_no=="")
	{

		document.getElementById('c_ac').innerHTML = "Enter A/c Number";	
        flag=1;		
		
	}
	
	else
	{
		document.getElementById('c_ac').innerHTML = "";		
	}
		var company_IFSC=document.getElementById('company_IFSC').value;
	if(company_IFSC=="")
	{

		document.getElementById('c_IFSC').innerHTML = "Enter IFSC ";	
        flag=1;		
		
	}
	
	else
	{

		document.getElementById('c_IFSC').innerHTML = "";		
	}
		var company_pin_no=document.getElementById('company_pin_no').value;
	if(company_pin_no=="")
	{

		document.getElementById('c_pin').innerHTML = "Enter Pin Number";	
        flag=1;		
		
	}
	
	else
	{
		document.getElementById('c_pin').innerHTML = "";		
	}
			var company_general_LIC_no=document.getElementById('company_general_LIC_no').value;
	if(company_general_LIC_no=="")
	{

		document.getElementById('c_lic').innerHTML = "Enter General Lic Number";	
        flag=1;		
		
	}
	
	else
	{
		document.getElementById('c_lic').innerHTML = "";		
	}
					

	if(flag==1)
	{
	
		return false;
	}
	return true;
}
</script>
				<!-- Page content -->
			<div id="page-content-wrapper">
				<!-- Breacrumb -->
				<div class="row csk-breadcrumb">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						<h4 class="page-title">Company Profile</h4>
					</div>
					<div class="col-lg-9 col-md-8 col-sm-8 hidden-xs">
						<ol class="breadcrumb">
							<li><a href="#">Dashboard</a></li>
							<li><a href="#">Company Profile</a></li>
						</ol>
					</div>
				</div>
				<!-- # Breadcrumb -->
				<!-- Profile -->
				<div class="profile">
					<div class="row">
						<div class="col-md-12 profile">
							<div class="cover-footer">
								<div class="google-panel">
									<div class="panel panel-danger contacts">
										<div class="panel-heading">
											<div class="cover-picture"></div>
											<div class="profile-line">
											      <?php
													$q11="select * from admin_registration_tbl where admin_id='".$_SESSION["id"]."'";
													$row_ad11=mysql_query($q11,$con);
													if($rows_ad11=mysql_fetch_array($row_ad11))
													{
												  ?>
												<div class="profile-picture">
													<img src="image_admin/<?php echo $rows_ad11['admin_img']; ?>" style="width:100px; height:100px;" class="img-responsive" alt="avatar">
												</div>
													<?php } ?>
												<h3>Captain</h3>
											</div>

										</div>
										<div class="panel-tabs">
											<ul class="nav nav-tabs">
												<li class="active"><a href="#tab4default" data-toggle="tab">Settings</a></li>
												
											</ul>
										</div>
										<div class="panel-body">
											<div class="tab-content">
												<div class="tab-pane fade in active" id="tab1default">
												<br>
													<div class="row">
														<div class="col-md-12">
															<form action="" method="post" onSubmit="return validation()">
															       <?php if($fetch_company_row=mysql_fetch_array($fetch_company)) {?>
																			<div class="col-md-3">
																				<div class="form-group">
																					<label class="control-label">Company logo  image:</label>
																					<input type="file" class="form-control" onchange="validatesize(this)" id="company_logo_image" name="company_logo_image" placeholder="Company logo  image">
																				</div>
																			</div>

																			<div class="col-md-9">
																				<div class="form-group">
																					<img id="img1" src="image_company/<?php echo $fetch_company_row['company_logo_image']; ?>" style="width: 150px; height: 150px;border:solid 1px #000000;" alt="Image1">
																				 </div>
																			</div>
																			<div class="col-md-6">
																				<div class="form-group">
																					<label class="control-label">Company Name:</label>
																					<span id="c_name" class="text-danger" style="float:right;"></span>
																					<input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name" value="<?php echo $fetch_company_row['company_name']; ?>">
																				</div>
																			</div>
																			<div class="col-md-6">
																				<div class="form-group">
																					<label class="control-label">Company Mob No:</label>
																					<span id="c_mob" class="text-danger" style="float:right;"></span>
																					<input type="text" class="form-control" id="company_mob" name="company_mob" placeholder="Company Mob No" value="<?php echo $fetch_company_row['company_mob']; ?>">
																				</div>
																			</div>
																			<div class="col-md-6">
																				<div class="form-group">
																					<label class="control-label">Company alt mob no:</label>
																					<span id="c_alt" class="text-danger" style="float:right;"></span>
															                    	<input type="text" class="form-control" id="company_alt_mob" name="company_alt_mob" placeholder="Company alt mob no" value="<?php echo $fetch_company_row['company_alt_mob']; ?>">
																				</div>
																			</div>
																			<div class="col-md-6">
																				<div class="form-group">
																					<label class="control-label">Company Email:</label>
																					<span id="c_email" class="text-danger" style="float:right;"></span>
																					<input type="text" class="form-control" id="company_email" name="company_email" placeholder="Company email" value="<?php echo $fetch_company_row['company_email']; ?>">
																				</div>
																			</div>
																			<div class="col-md-6">
																				<div class="form-group">
																					<label class="control-label">Company Address:</label>
																					<span id="c_add" class="text-danger" style="float:right;"></span>
																					<input type="text" class="form-control" id="company_add" name="company_add" placeholder="Company address" value="<?php echo $fetch_company_row['company_add']; ?>">
																				</div>
																			</div>
																			<div class="col-md-6">
																				<div class="form-group">
																					<label class="control-label">Company City:</label>
																					<span id="c_city" class="text-danger" style="float:right;"></span>
																					<input type="text" class="form-control" id="company_city" name="company_city" placeholder="Company city" value="<?php echo $fetch_company_row['company_city']; ?>">
																				</div>
																			</div>
																			<div class="col-md-6">
																				<div class="form-group">
																					<label class="control-label">Company GSTin no:</label>
																					<span id="c_gst" class="text-danger" style="float:right;"></span>
																					<input type="text" class="form-control" id="company_GST_in_no" name="company_GST_in_no" placeholder="Company GSTin no" value="<?php echo $fetch_company_row['company_GST_in_no']; ?>">
																				</div>
																			</div>
																			<div class="col-md-6">
																				<div class="form-group">
																					<label class="control-label">Company Bank Name:</label>
																					<span id="c_bank" class="text-danger" style="float:right;"></span>
																					<input type="text" class="form-control" id="company_bank_name" name="company_bank_name" placeholder="Company Bank Name" value="<?php echo $fetch_company_row['company_bank_name']; ?>">
																				</div>
																			</div>
																			<div class="col-md-6">
																				<div class="form-group">
																					<label class="control-label">Company a/c no:</label>
																					<span id="c_ac" class="text-danger" style="float:right;"></span>
																					<input type="text" class="form-control" id="company_ac_no" name="company_ac_no" placeholder="Company a/c no" value="<?php echo $fetch_company_row['company_ac_no']; ?>">
																				</div>
																			</div>
																			<div class="col-md-6">
																				<div class="form-group">
																					<label class="control-label">Company_IFSC:</label>
																					<span id="c_IFSC" class="text-danger" style="float:right;"></span>
																					<input type="text" class="form-control" id="company_IFSC" name="company_IFSC" placeholder="Company_IFSC" value="<?php echo $fetch_company_row['company_IFSC']; ?>">
																				</div>
																			</div>
																			<div class="col-md-6">
																				<div class="form-group">
																					<label class="control-label">Company pin no:</label>
																					<span id="c_pin" class="text-danger" style="float:right;"></span>
																					<input type="text" class="form-control" id="company_pin_no" name="company_pin_no" placeholder="Company pin no" value="<?php echo $fetch_company_row['company_pin_no']; ?>">
																				</div>
																			</div>

																			<div class="col-md-6">
																				<div class="form-group">
																					<label class="control-label">Company general LIC no:</label>
																					<span id="c_lic" class="text-danger" style="float:right;"></span>
																					<input type="text" class="form-control" id="company_general_LIC_no" name="company_general_LIC_no" placeholder="Company general LIC no" value="<?php echo $fetch_company_row['company_general_LIC_no']; ?>">
																				</div>
																			</div>
																   <?php } ?>
																            <hr>
																			<input type="hidden" id="company_id" name="company_id" value="<?php echo $fetch_company_row['company_id']; ?>">
																           <button type="submit" class="btn btn-success" id="btnCompany" name="btnCompany">Save Changes</button>
															</form>
														</div>
													</div>
												</div>



											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- #Profile -->
			</div>
<?php
	include_once('footer.php');
?>