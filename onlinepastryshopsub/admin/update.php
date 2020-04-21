<script type="text/javascript">
	function update_record()
	{
        var xmlhttp=new XMLHttpRequest();
        alert(document.getElementById("category_id1").value);
        xmlhttp.open("get","update2.php?id1="+document.getElementById(category_id1).value+"&name="+document.getElementById(category_name).value+"&code="+document.getElementById(category_code).value,false);
         xmlhttp.send();
        // document.getElementById('').innerHTML=xmlhttp.responseText;
	}
</script>
<?php
           	include_once('connection.php');
             $i=$_REQUEST['id'];
             $q_category="select *from category_tbl where category_id=$i";
             $rs_category=mysql_query($q_category,$con);
             $row_category=mysql_fetch_array($rs_category);
           
?>
<script type="text/javascript">
	function update_record()
	{
         var xmlhttp=new XMLHttpRequest();
         xmlhttp.open("get","update.php?id1="document.getElementById(category_id1).value,true);
         xmlhttp.send();
         document.getElementById('').innerHTML=xmlhttp.responseText;
	}
</script>
<?php
	include_once('header.php');
	include_once('connection.php');

	/*if($_POST['category_id']!="")
	{
           echo "de";
	}
    else
    {

    }*/
	if(isset($_POST['btnCategory']))
	{


		$q="insert into category_tbl (category_name,category_code) values('".$_POST['category_name']."','".$_POST['category_code']."')";

		$rs=mysql_query($q,$con);
		if(!$rs)
		{
			echo "OOPS!!! Category Not Inserted.".mysql_error();
		}
		else
		{
			echo "1 Inserted ";
		}
	}
?>

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
			<div class="panel-heading">
				<h3 class="panel-title">Category Info</h3>
			</div>
			<div class="panel-body">
				<form action="" method="post" name="frmCategory" id="frmCategory">
					<div class="form-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">Category Name</label>
									<input type="text" class="form-control" id="category_name" name="category_name" placeholder="Category Name" value="<?php echo $row_category['category_name'];?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group ">
									<label class="control-label">Category Code</label>
									<input type="text" class="form-control" id="category_code" name="category_code" placeholder="Category Code" value="<?php echo $row_category['category_code'];?>">
								</div>
							</div>
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-success" name="btnCategory" id="btnCategory"> <i class="fa fa-check" onclick="update_record()"></i> Update</button>
						
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
				<h3 class="panel-title">Bootstrap data table</h3>
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
								$q="select * from category_tbl";
								$rs_category = mysql_query($q,$con);
								while($row_category = mysql_fetch_array($rs_category))
								{?>
										
									<tr>	
									<td><?php echo $counter++; ?></td>
									<td><?php echo $row_category['category_code']; ?></td>
									<td><?php echo $row_category['category_name']; ?> </td>
									
									<td>                                            
                                                <button type="button" class="btn btn-info" title="Edit" onclick="update_record()"><i class="fa fa-edit"></i></button>
                                               
                                                <button type="button" data-type="confirm" class="btn btn-danger js-sweetalert" title="Delete" onClick="javascript:location.href='delete.php?id=<?php echo $row_category['category_id'];?>';" value="&laquo; Back"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                    <td>
                                                 <input type="hidden" name="category_id1" id="category_id" name="category_id1" value="<?php echo $row_category['category_id'];?>">
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









<!-- #row -->

<?php
	include_once('footer.php');
?>