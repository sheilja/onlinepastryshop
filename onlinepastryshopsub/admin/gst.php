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
	

	var flag;
	
				var gst_slab_name=document.getElementById('gst_slab_name').value;
			
	if(gst_slab_name=="")
	{

		document.getElementById('gstname').innerHTML = "Enter GST Name..!";	
        flag=1;	
	}
	else
	{

		document.getElementById('gst_slab_name').innerHTML = "";		
		
	}		
			var cgst=document.getElementById('cgst').value;
	
	if(cgst=="")
	{

		document.getElementById('gstcgst').innerHTML = "Enter CGST..!";	
        flag=1;		
		
	}
	
	else
	{
		v_pincode=/^([0-9.])+$/;
		if(v_pincode.test(cgst)==false)
		{
			document.getElementById('gstcgst').innerHTML = "Only Number..!";	
			flag=1;
		}
		else
		{
		document.getElementById('gstcgst').innerHTML = "";		
		}
		
	}	
				var sgst=document.getElementById('sgst').value;	
	if(sgst=="")
	{

		document.getElementById('gstsgst').innerHTML = "Enter SGST..!";	
        flag=1;		
		
	}
	
	else
	{
		v_pincode=/^([0-9.])+$/;
		if(v_pincode.test(sgst)==false)
		{
			document.getElementById('gstsgst').innerHTML = "Only Number..!";	
			flag=1;
		}
		else
		{
		document.getElementById('gstsgst').innerHTML = "";		
		}
		
	}
				var igst=document.getElementById('igst').value;		
		if(igst=="")
	{

		document.getElementById('gstigst').innerHTML = "Enter IGST";	
        flag=1;		
		
	}
	
	else
	{
		v_pincode=/^([0-9.])+$/;
		if(v_pincode.test(igst)==false)
		{
			document.getElementById('gstigst').innerHTML = "Only Number..!";	
			flag=1;
		}
		else
		{
		document.getElementById('gstigst').innerHTML = "";		
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

	if(isset($_POST['btnGst']))
	{
		if($_POST['gst_slab_id'] == "")
		{
			$q="CALL insertGst('".$_POST['gst_slab_name']."','".$_POST['cgst']."','".$_POST['sgst']."','".$_POST['igst']."')";
	
		}
		else
		{


			$q="CALL updateGst('".$_POST['gst_slab_id']."','".$_POST['gst_slab_name']."','".$_POST['cgst']."','".$_POST['sgst']."','".$_POST['igst']."')";
	      	      
	    }

		
		$rs=mysql_query($q,$con);
		if(!$rs)
		{
			echo "OOPS!!! Category Not Inserted/Updated.".mysql_error();
		}
		
	}
?>

<!-- Breadcrumb  -->
<div class="row csk-breadcrumb">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h4 class="page-title">GST Master</h4>
	</div>
	<div class="col-lg-9 col-md-8 col-sm-8 hidden-xs">
		<ol class="breadcrumb">
			<li><a href="#">Dashboard</a></li>
			<li><a href="#">GST Master</a></li>
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
	
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">GST_slab_name:</label>
									<span id="gstname" class="text-danger" style="float:right;"></span>
									<input type="text" class="form-control" id="gst_slab_name" name="gst_slab_name" placeholder="GST_slab_name">
                                       
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">CGST:</label>
									<span id="gstcgst" class="text-danger" style="float:right;"></span>
									<input type="text" class="form-control" id="cgst" name="cgst" placeholder="CGST">

								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">SGST:</label>
									<span id="gstsgst" class="text-danger" style="float:right;"></span>
									<input type="text" class="form-control" id="sgst" name="sgst" placeholder="SGST">

								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">IGST:</label>
									<span id="gstigst" class="text-danger" style="float:right;"></span>
									<input type="text" class="form-control" id="igst" name="igst" placeholder="IGST">

								</div>
							</div>                         
						</div>
					</div>
					
					<div class="form-actions">
						<div class="col-md-6">
							<input type="hidden" name="gst_slab_id" id="gst_slab_id">
							<input type="submit" class="btn btn-success" name="btnGst" id="btnGst" value="SAVE">
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
<!-- #row -->


<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default panel-with-options">
			<div class="panel-heading">
				<h3 class="panel-title">GST Data Table</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered datatable">
						<thead>
							<tr>
								<th>SR </th>								
								<th>GST_slab_name</th>
								<th>CGST</th>
								<th>SGST</th>
								<th>IGST</th>
								<th>Date</th>


							    <th>Action</th>
							</tr>
						</thead>
						<tbody>
							
							<?php

								$counter = 1;
								$q="select * from gst_tbl  ORDER BY gst_slab_id DESC";
								$rs_gst = mysql_query($q,$con);
								while($row_gst = mysql_fetch_array($rs_gst))
								{?>
										
									<tr>	
									<td><?php echo $counter++; ?></td>
							
									<td><?php echo $row_gst['gst_slab_name']; ?></td>
								    <td><?php echo $row_gst['cgst']; ?></td>
									<td><?php echo $row_gst['sgst']; ?> </td>
									<td><?php echo $row_gst['igst']; ?> </td>
									<td><?php echo $row_gst['gst_date']; ?> </td>
									
                                    <td>    
                                                <button type="button" class="btn btn-info" title="Edit"   id='<?php echo $row_gst['gst_slab_id'];?>' name="btn_edit" value="&laquo; Back"><i class="fa fa-edit"></i></button>
                                               
                                                <button href='' type="button" data-type="confirm" class="btn btn-danger" title="Delete"  id='<?php echo $row_gst['gst_slab_id'];?>' name="btn_delete"><i class="fa fa-trash-o"></i></button>
                                           
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
			var gst_slab_id = $(this).attr("id");
		//	alert(company_id);
			if(confirm("Are you sure you want to delete this?"))
			{
				$.ajax({ url: 'gst_delete.php',
						 data: {'id': gst_slab_id, 'delete': 1},
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
			var gst_slab_id = $(this).attr("id");
			
			if(confirm("Are you sure you want to edit this?"))
			{
				$.ajax({ url: 'gst_update.php',
						 data: {'id': gst_slab_id, 'edit': 1},
						 type: 'post',
						 dataType :'json',
						 success: function(data) {
						 			
									
									document.getElementById("gst_slab_id").value = gst_slab_id;
									document.getElementById("gst_slab_name").value = data.gst_slab_name;
									document.getElementById("cgst").value = data.cgst;
									document.getElementById("sgst").value = data.sgst;
									document.getElementById("igst").value = data.igst;

									document.getElementById("btnGst").value = "Edit GST";
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