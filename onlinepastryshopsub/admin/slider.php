
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
</script>
<?php
	include_once('header.php');
	include_once('connection.php');

	if(isset($_POST['btnSlider']))
	{
				    $acceptable=array('image/jpeg','image/jpg','image/png');
		if($_POST['slider_id'] == "")
		{
			if(!empty($_FILES["slider_image"]["name"]) && in_array($_FILES["slider_image"]["type"],$acceptable) && !empty($_FILES["slider_image"]["name"]))
	        {
	         echo "set";
	                echo $_FILES["slider_image"]["name"]; 
                  $i=$_FILES["slider_image"]["name"];
                  $i=pathinfo($i,PATHINFO_FILENAME).mt_rand(600000,999999).".".pathinfo($i,PATHINFO_EXTENSION);
                   $tmp_name3=$_FILES["slider_image"]["tmp_name"];
        
                   if(is_uploaded_file($tmp_name3))
                   {
                   copy($tmp_name3,"image_slider/".$i);

                   }
	        }
        	else
	        {
	        	echo "else1";
		    $i="";
	        }
			
								
		                 		            
             $q="insert into slider(title,discrption,url,img) values('".$_POST['slider_title']."','".$_POST['slider_discription']."','".$_POST['slider_url']."','".$i."')";
         //$q="insert into slider(title,discrption,url,img) values('".$_POST['slider_title']."','".$_POST['slider_discription']."',"'.$_POST['slider_url']."','".."')";
		 
	           echo $q;
		}
		else
		{
			if(!empty($_FILES["product_image"]["name"]) && in_array($_FILES["product_image"]["type"],$acceptable) && !empty($_FILES["product_image"]["name"]))
	        {
	         
	            $i=$_POST['product_id'];	
             
            $q1="select * from product_tbl where product_id=$i";
            $rs_select=mysql_query($q1,$con);

            $row_select = mysql_fetch_array($rs_select);
	        $image1 = $row_select['product_image'];
	        $path = $_SERVER['DOCUMENT_ROOT'].'/onlinecakeshop/admin/image_product/';
	
            if(file_exists($path.$image1))
            {
	        unlink($path.$image1);
            }
	                echo $_FILES["product_image"]["name"]; 
                  $i=$_FILES["product_image"]["name"];
                  $i=pathinfo($i,PATHINFO_FILENAME).mt_rand(600000,999999).".".pathinfo($i,PATHINFO_EXTENSION);
                   $tmp_name3=$_FILES["product_image"]["tmp_name"];
        
                   if(is_uploaded_file($tmp_name3))
                   {
                   copy($tmp_name3,"image_product/".$i);
                   }
	        }
        	else
	        {
	
		    $fetch="select *from product_tbl where  product_id='".$_POST['product_id']."'";
		    $row=mysql_query($fetch,$con);
		    while($rows=mysql_fetch_array($row))
		    {
		    	$i=$rows['product_image'];
		    	echo $i;
		    }

	        }
			
								
		      $fetch_discription="select *from discription where theme_id='".$_POST['theme_id']."'";
              $row_discription=mysql_query($fetch_discription,$con);
              while ($rows_discription=mysql_fetch_array($row_discription)) {
              	$discription1=$rows_discription['discription'];

              }
              
	       $q="CALL updateProduct('".$_POST['product_id']."','".$i."','".$_POST['company_id']."','".$_POST['category_id']."','".$_POST['product_name']."','".$_POST['theme_id']."','".$_POST['gst_slab_id']."','".$_POST['price']."','".$_POST['weight']."','".$_POST['min_weight']."','".$_POST['max_weight']."','".$discription1."','".$_POST['discription2']."','".$_POST['discription3']."')";
	       //echo $q;
	      //  $rs_update=mysql_query($q_update,$con);
  		}

		
		$rs=mysql_query($q,$con);
		if(!$rs)
		{
			echo "OOPS!!! Category Not Inserted.".mysql_error();
		}
		
	}



?>
<div class="row csk-breadcrumb">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h4 class="page-title">Slider Master</h4>
	</div>
	<div class="col-lg-9 col-md-8 col-sm-8 hidden-xs">
		<ol class="breadcrumb">
			<li><a href="#">Dashboard</a></li>
			<li><a href="#">Slider Master</a></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-defaut">

			<div class="panel-body">
				<form action="" method="post" name="frmProduct" id="frmProduct" enctype="multipart/form-data">
					<div class="form-body">
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<label class="control-label">Slider Image:</label>
									<input type="file" class="form-control" onchange="validatesize(this)" id="slider_image" name="slider_image" placeholder="Pastry Image">
								</div>
							</div>
							<div class="col-md-9">
								<div class="form-group">
									<img id="img1" style="width: 250px; height: 250px;border:solid 5px #000000;" alt="Image1">
								 </div>
                            </div>


							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Title</label>
									<input type="text" class="form-control" id="slider_title" name="slider_title" placeholder="Product Name">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Disciption</label>
									<input type="text" class="form-control" id="slider_discription" name="slider_discription" placeholder="Product Name">
								</div>
							</div>

                            <div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Url</label>
									<input type="text" class="form-control" id="slider_url" name="slider_url" placeholder="Product Name">
								</div>
							</div>

						
																				
						</div>
					</div>
					<div class="form-actions">
													<div class="col-md-6">
						<input type="hidden" name="slider_id" id="slider_id">
						<input type="submit" class="btn btn-success" name="btnSlider" id="btnSlider" value="SAVE">
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
<?php
    include_once('footer.php');
?>