
<?php
	include_once('header.php');

	if(isset($_POST['btnProduct']))
	{
				    $acceptable=array('image/jpeg','image/jpg','image/png');
		if($_POST['product_id'] == "")
		{
			if(!empty($_FILES["product_image"]["name"]) && in_array($_FILES["product_image"]["type"],$acceptable) && !empty($_FILES["product_image"]["name"]))
	        {
	       //  echo "set";
	         //       echo $_FILES["product_image"]["name"]; 
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
	        	echo "else1";
		    $i="";
	        }
			
						$discription1="";		
		      $fetch_discription="select *from discription where theme_id='".$_POST['theme_id']."'";
              $row_discription=mysql_query($fetch_discription,$con);
              while ($rows_discription=mysql_fetch_array($row_discription)) {
              	$discription1=$rows_discription['discription'];
              }

            if(isset($_POST['is_featured']))  
			{
				 $a=1;
            }				
            else{
				$a=0;
			}
			$q="CALL insertProduct('".$i."','".$_POST['category_id']."','".$_POST['product_name']."','".$_POST['theme_id']."','".$_POST['gst_slab_id']."','".$_POST['price']."','".$_POST['weight']."','".$_POST['min_weight']."','".$_POST['max_weight']."','".$discription1."','".$_POST['discription3']."','".$_POST['discription3']."','".$a."')";
	          // echo $q;
			 // echo $_POST['is_featured'];
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
			 if(isset($_POST['is_featured']))  
			{
				 $a=1;
            }				
            else{
				$a=0;
			}
	      $q="CALL updateProduct('".$_POST['product_id']."','".$i."','".$_POST['category_id']."','".$_POST['product_name']."','".$_POST['theme_id']."','".$_POST['gst_slab_id']."','".$_POST['price']."','".$_POST['weight']."','".$_POST['min_weight']."','".$_POST['max_weight']."','".$discription1."','".$_POST['discription2']."','".$_POST['discription3']."','".$a."')";
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
	
	$product_name=document.getElementById('product_name').value;
	var flag;
	
					var category_id=document.getElementById('category_id').selectedIndex;
	if(category_id==0)
	{

		document.getElementById('p_category').innerHTML = "Select Category";
        flag=1;		
		
	}
	
	else
	{
		document.getElementById('p_category').innerHTML = "";		
	}

	if($product_name=="")
	{
		flag=1;
        
		document.getElementById('p_name').innerHTML = "Enter Product Name";
	  
	}
	else
	{
		document.getElementById('p_name').innerHTML = "";		
	}
				var theme_id=document.getElementById('theme_id').selectedIndex;
	if(theme_id==0)
	{

		document.getElementById('p_theme').innerHTML = "Select Theme";	
        flag=1;		
		
	}
	
	else
	{
		document.getElementById('p_theme').innerHTML = "";		
	}
				var gst_slab_id=document.getElementById('gst_slab_id').selectedIndex;
	if(gst_slab_id==0)
	{

		document.getElementById('p_gst').innerHTML = "Select Gst";	
        flag=1;		
		
	}
	
	else
	{
		document.getElementById('p_gst').innerHTML = "";		
	}					
				var price=document.getElementById('price').value;
	if(price=="")
	{

		document.getElementById('p_price').innerHTML = "Enter Price";	
        flag=1;		
		
	}
	
	else
	{
		v_name=/^([0-9.])+$/;
		if(v_name.test(price)==false)
		{
			document.getElementById('p_price').innerHTML = "!Only charater";	
			flag=1;
		}
		else
		{
		document.getElementById('p_price').innerHTML = "";		
		}
		
	}					
			var weight=document.getElementById('weight').value;
	if(weight=="")
	{

		document.getElementById('p_weight').innerHTML = "Enter Weight";	
        flag=1;		
		
	}
	
	else
	{
		v_weight=/^([0-9.])+$/;
		if(v_weight.test(weight)==false)
		{
			document.getElementById('p_weight').innerHTML = "!Only charater";	
			flag=1;
		}
		else
		{
		document.getElementById('p_weight').innerHTML = "";		
		}
		
	}					
			var max_weight=document.getElementById('max_weight').value;
	if(max_weight=="")
	{

		document.getElementById('p_max_weight').innerHTML = "Enter maximum weight";	
        flag=1;		
		
	}
	
	else
	{
		v_max_weight=/^([0-9.])+$/;
		if(v_max_weight.test(max_weight)==false)
		{
			document.getElementById('p_max_weight').innerHTML = "!Only charater";	
			flag=1;
		}
		else
		{
		document.getElementById('p_max_weight').innerHTML = "";		
		}

	}					
			var min_weight=document.getElementById('min_weight').selectedIndex;
	/*if(min_weight==0)
	{

		document.getElementById('p_min_weight').innerHTML = "Enter Maximum Weight";	
        flag=1;		
		
	}
	
	else
	{
				v_min_weight=/^([0-9.])+$/;
		if(v_min_weight.test(min_weight)==false)
		{
			document.getElementById('p_min_weight').innerHTML = "!Only charater";	
			flag=1;
		}
		else
		{
		document.getElementById('p_min_weight').innerHTML = "";		
		}

	}					
*/

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
		<h4 class="page-title">Product Master</h4>
	</div>
	<div class="col-lg-9 col-md-8 col-sm-8 hidden-xs">
		<ol class="breadcrumb">
			<li><a href="#">Dashboard</a></li>
			<li><a href="#">Product Master</a></li>
		</ol>
	</div>
</div>
<!-- #Breadcrumb -->

<!-- row -->
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-defaut">

			<div class="panel-body">
				<form action="" method="post" name="frmProduct" id="frmProduct" enctype="multipart/form-data" onSubmit="return validation()">
					<div class="form-body">
						<div class="row">
							

							<div class="col-md-6">
								<div class="form-group">
								
									<label class="control-label">Select Category</label>
									   <span id="p_category" class="text-danger" style="float:right;"></span>
                                       <select id="category_id" name="category_id" class="form-control">
									   <option value="0"></option>
                                       	<?php
                                                $fetch_category="select *from category_tbl";
                                                $row_category=mysql_query($fetch_category,$con);
                                                while ($rows_category=mysql_fetch_array($row_category)) {
                                                	?><option value="<?php echo $rows_category['category_id'];?>"><?php echo $rows_category['category_name'];?></option><?php
                                                	# code...
                                                }
                                       	?>
                                       </select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Product Name</label>
									<span id="p_name" class="text-danger" style="float:right;"></span>
									<input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Select Theme</label>
									  
									   <span id="p_theme" class="text-danger" style="float:right;"></span>
                                       <select id="theme_id" name="theme_id" class="form-control">
									    <option value="0"></option>
                                       	<?php
                                                $fetch_theme="select *from theme";
                                                $row_theme=mysql_query($fetch_theme,$con);
                                                while ($rows_theme=mysql_fetch_array($row_theme)) {
                                                	?><option value="<?php echo $rows_theme['theme_id'];?>"><?php echo $rows_theme['theme_name'];?></option><?php
                                                	
                                                }
                                       	?>
                                       </select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Select Gst Slab Name:</label>
									   <span id="p_gst" class="text-danger" style="float:right;"></span>
                                       <select id="gst_slab_id" name="gst_slab_id" class="form-control">
									   <option value="0"></option>
                                       	<?php
                                                $fetch_theme="select *from gst_tbl";
                                                $row_theme=mysql_query($fetch_theme,$con);
                                                while ($rows_theme=mysql_fetch_array($row_theme)) {
                                                	?><option value="<?php echo $rows_theme['gst_slab_id'];?>"><?php echo $rows_theme['gst_slab_name'];?></option><?php
                                                	
                                                }
                                       	?>
                                       </select>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label">Price</label>
									<span id="p_price" class="text-danger" style="float:right;"></span>
									<input type="text" class="form-control" id="price" name="price" placeholder="Product Price">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group ">
								
									<label class="control-label">Weight</label>
									<span id="p_weight" class="text-danger" style="float:right;"></span>
									<input type="text" class="form-control" id="weight" name="weight" placeholder="Product Weight">
								</div>
							</div>							
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label">Maximum Weight</label>
									<span id="p_max_weight" class="text-danger" style="float:right;"></span>
									<input type="text" class="form-control" id="max_weight" name="max_weight" placeholder="Product Maximum Weight">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label">Minimum Weight</label>
									<span id="p_min_weight" class="text-danger" style="float:right;"></span>
									<input type="text" class="form-control" id="min_weight" name="min_weight" placeholder="Product Minimum Weight">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label">Product Discription1:</label>
									<textarea  class="form-control" id="discription1" name="discription1" placeholder="Discription1"></textarea>
								</div>
							</div>																	
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label">Product Discription2:</label>
									<textarea  class="form-control" id="discription2" name="discription2" placeholder="Discription2"></textarea>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label">Product Discription3:</label>
									<textarea  class="form-control" id="discription3" name="discription3" placeholder="Discription3"></textarea>
								</div>
							</div>	
                            <div class="col-md-6">
								<div class="checkbox">
									<label>
									<input type="checkbox" class="info" id="is_featured" name="is_featured" > Is Featured Product
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
									</label>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label class="control-label">Pastry Image:</label>
									<input type="file" class="form-control" onchange="validatesize(this)" id="product_image" name="product_image" placeholder="Pastry Image">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<img id="img1" style="width: 100px; height: 100px;" alt="Image1">
								 </div>
                            </div>
						</div>
					</div>
					<div class="form-actions">
													<div class="col-md-6">
						<input type="hidden" name="product_id" id="product_id">
						<input type="submit" class="btn btn-success" name="btnProduct" id="btnProduct" value="SAVE">
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
				<h3 class="panel-title">Product Data Table</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered datatable">
						<thead>
							<tr>
								<th>SR </th>
								<th>Product Image</th>								
								<th>Category Name</th>
								<th>Product Name</th>
								<th>Theme Name</th>
								<th>GST (%)</th>
						        <th>Cost Per Kg</th>
						        <th>Weight</th>
						        <th>Max Weight</th>						    
						        <th>Min Weight</th>						            						        
						        <th>Action</th>
							</tr>
						</thead>
						<tbody>
							
							<?php

								$counter = 1;
								$q="select p.* , c.category_name , t.theme_name , g.gst_slab_name , g.igst from product_tbl as p
									LEFT JOIN category_tbl as c ON p.category_id = c.category_id 
									LEFT JOIN theme as t ON p.theme_id = t.theme_id
									LEFT JOIN gst_tbl as g ON p.gst_slab_id = g.gst_slab_id
									ORDER BY p.product_id DESC";
								$rs_product = mysql_query($q,$con);
								while($row_product = mysql_fetch_array($rs_product))
								{?>
										
									<tr>	
									<td><?php echo $counter++; ?></td>
									<td>
                                      <img id="img1" src="image_product/<?php echo $row_product['product_image']; ?>" style="width: 100px; height: 100px;s" alt="Image1">
										 </td>									
									
									<td><?php echo $row_product['category_name']; ?></td>	
							
								    <td><?php echo $row_product['product_name']; ?></td>
									
									<td><?php echo $row_product['theme_name']; ?></td>
									<td><?php echo $row_product['igst']." % "; ?> </td>									
									<td><?php echo $row_product['price_per_kg']; ?> </td>	
									<td><?php echo $row_product['weight']; ?> </td>
									<td><?php echo $row_product['max_weight']; ?> </td>
									<td><?php echo $row_product['min_weight']; ?> </td>																																																												
									<td>                                            
										<button type="button" class="btn btn-info" title="Edit"   id='<?php echo $row_product['product_id'];?>' name="btn_edit" value="&laquo; Back"><i class="fa fa-edit"></i></button>
									   
										<button href='' type="button" data-type="confirm" class="btn btn-danger" title="Delete"  id='<?php echo $row_product['product_id'];?>' name="btn_delete"><i class="fa fa-trash-o"></i></button>
                                           
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
			
			var product_id = $(this).attr("id");
			
			if(confirm("Are you sure you want to delete this?"))
			{
				$.ajax({ url: 'product_delete.php',
						 data: {'id': product_id, 'delete': 1},
						 type: 'post',
						 success: function(output) {																			  
                       window.location.href = window.location.href;
								  }
				});
			}
			else
			{
				return false;
			}
		});
		
		
		$('.btn-info').click(function(e)
		{
			e.preventDefault();	
			var product_id = $(this).attr("id");
			alert("Update");
			if(confirm("Are you sure you want to edit this?"))
			{
				$.ajax({ url: 'product_update.php',
						 data: {'id': product_id, 'edit': 1},
						 type: 'post',
						 dataType :'json',
						 success: function(data) {
						 				
                                    //    document.getElementById("category_signal").value = 1;
	                                    
									document.getElementById("product_id").value = product_id;
							//	document.getElementById("company_id").value = data.company_id;
				
										document.getElementById("product_name").value = data.product_name;
										document.getElementById("theme_id").value = data.theme_id;
										document.getElementById("gst_slab_id").value = data.gst_slab_id;
									document.getElementById("price").value = data.price;
								document.getElementById("weight").value = data.weight;
									document.getElementById("min_weight").value = data.min_weight;
									document.getElementById("max_weight").value = data.max_weight;

									document.getElementById("discription1").value = data.discription1;
										document.getElementById("discription2").value = data.discription2;
										document.getElementById("discription3").value = data.discription3;
                                                                          if(data.is_featured==1)
                                        {
                                        	$('#is_featured').prop('checked',true);
                                        }
                                 document.getElementById("img1").src="image_product/"+data.product_image;																																																								
										document.getElementById("btnProduct").value = "Edit Product";	
												
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