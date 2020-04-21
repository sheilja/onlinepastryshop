
<?php
	include_once('header.php');
	include_once('connection.php');

	if(isset($_POST['btnPincode']))
	{
		if($_POST['pincode_id'] == "")
		{
			$q="CALL insertPincode('".$_POST['pincode_number']."','".$_POST['shipping_cost']."')";
			
	
		}
		else
		{

	      	      $q="CALL updatePincode('".$_POST['pincode_number']."','".$_POST['shipping_cost']."')";
				  echo $q;
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
	
				var pincode_number=document.getElementById('pincode_number').value;
			
	if(pincode_number=="")
	{

		document.getElementById('p_pincode_number').innerHTML = "Enter Pincode Number";	
        flag=1;	
	}
	else
	{
		v_pincode=/^([0-9.])+$/;
		if(v_pincode.test(pincode_number)==false)
		{
			document.getElementById('p_pincode_number').innerHTML = "! Only charater";	
			flag=1;
		}
		else
		{
		document.getElementById('p_pincode_number').innerHTML = "";		
		}
		
	
		
		
	}		
				var shipping_cost=document.getElementById('shipping_cost').value;
	
	if(shipping_cost=="")
	{

		document.getElementById('p_pincode_shippingcost').innerHTML = "Enter Shipping Cost";	
        flag=1;		
		
	}
	
	else
	{
		v_pincode=/^([0-9.])+$/;
		if(v_pincode.test(shipping_cost)==false)
		{
			document.getElementById('p_pincode_shippingcost').innerHTML = "! Only charater";	
			flag=1;
		}
		else
		{
		document.getElementById('p_pincode_shippingcost').innerHTML = "";		
		}
		
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
			<li><a href="#">Pincode Master</a></li>
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
							    <input type="hidden" name="pincode_id" id="pincode_id">
								<div class="form-group">
									<label class="control-label">Pincode Number</label>
									<span id="p_pincode_number" class="text-danger" style="float:right;"></span>
									<input type="text" class="form-control" id="pincode_number" name="pincode_number" placeholder="Pincode Number">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Shipping Cost</label>
									<span id="p_pincode_shippingcost" class="text-danger" style="float:right;"></span>
									<input type="text" class="form-control" id="shipping_cost" name="shipping_cost" placeholder="Pincode Number">
								</div>
							</div>
						</div>
					</div>
					<div class="form-actions">
						<div class="col-md-6">
						
						<input type="submit" class="btn btn-success" name="btnPincode" id="btnPincode" value="SAVE">
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
																
								<th>Pincode Number</th>
								<th>Shipping Cost</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							
							<?php

								$counter = 1;
								$q="select * from pincode_tbl ORDER BY pincode_number DESC";
								$rs_pincode = mysql_query($q,$con);
								while($row_pincode = mysql_fetch_array($rs_pincode))
								{?>
										
									<tr>	
									<td><?php echo $counter++; ?></td>
							
									<td><?php echo $row_pincode['pincode_number']; ?></td>
																
								    
								    <td><?php echo $row_pincode['shipping_charge']; ?></td>
									
									<td>                                            
                                                <button type="button" class="btn btn-info" title="Edit"   id='<?php echo $row_pincode['pincode_number'];?>' name="btn_edit"><i class="fa fa-edit"></i></button>
                                               
                                                <button href='' type="button" data-type="confirm" class="btn btn-danger" title="Delete"  id='<?php echo $row_pincode['pincode_number'];?>' name="btn_delete"><i class="fa fa-trash-o"></i></button>
                                           
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
			

			var pincode_id = $(this).attr("id");
			if(confirm("Are you sure you want to delete this?"))
			{
				$.ajax({ url: 'pincode_delete.php',
						 data: {'id': pincode_id, 'delete': 1},
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
			var pincode_id = $(this).attr("id");
			
			if(confirm("Are you sure you want to edit this?"))
			{
				$.ajax({ url: 'pincode_update.php',
						 data: {'id': pincode_id, 'edit': 1},
						 type: 'post',
						 dataType :'json',
						 success: function(data) {
						 				
                                    //    document.getElementById("category_signal").value = 1;
									document.getElementById("pincode_id").value = pincode_id;
										document.getElementById("shipping_cost").value = data.shipping_charge;									
										document.getElementById("pincode_number").value = data.pincode_number;
										document.getElementById("btnPincode").value = "Edit Pincode";	
										document.getElementById("pincode_number").readOnly = true;	
									
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