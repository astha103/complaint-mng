<?php
 include "header.php";
 include "connect.php";
 $msg='';
 if(isset($_POST['submit']))
 {
	 $cid=$_POST['catid'];
	 $subcat=$_POST['subcat'];
	 if($cid!=0)
	 {
		 if(!empty($subcat))
		 {
		 $sql="INSERT INTO subcategory(categoryid,subcategory)VALUES('$cid','$subcat')";
		 if(mysqli_query($conn,$sql))
		 { 
			$msg="Sub category added.";
		 }else{
			$msg="Sub category Not added.".mysqli_error($conn);
		 }
		 }else{
			$msg="Sub category can't be empty.";
		 }
	 }else{
		 $msg="Please select Parent Category.";
	 }
 }
?>   
<div class="main-content">
	<div class="content-wrapper">
		<div class="container-fluid"><!--Statistics cards Starts-->   
		 		
			  <section class="basic-elements">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<div class="card-title-wrap bar-success">
									<h4 class="card-title mb-0 text-center">Sub Category</h4>
									<h4 class="card-title mb-0 "><?php echo $msg;?></h4>
								</div>
							</div>
							<div class="card-body">
								<div class="px-3">
									<form method="post" class="form">
										<div class="form-body">
											<div class="row">
												<div class="col-xl-6 col-lg-6 col-md-6 mb-1">
						                           <fieldset class="form-group position-relative">
												   <label for="helpInputTop">Category</label>
	<select class="form-control" name="catid">
	<option value="0">Select Category</option>
<?php

$sql="SELECT * FROM category";
 $result=mysqli_query($conn,$sql);
	 while($row=mysqli_fetch_assoc($result))
	 {
		 echo '<option value="'.$row['id'].'">'.$row['categoryName'].'</option>';
     }
	 ?>												     													
													</select>									</fieldset>		
</div>												<div class="col-xl-6 col-lg-6 col-md-6 mb-1">
													<fieldset class="form-group">
														<label for="helpInputTop">SubCategory Name</label>
													 <input type="text" name="subcat" class="form-control" id="basicInput">
													</fieldset>
												</div>
					

											 <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
													<fieldset class="form-group">
													
													  <button type="submit" name="submit" class="submit-btn">
														<i class="icon-note"></i> Create
													</button>
													</fieldset>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

		<div class="container-fluid"><!--Statistics cards Starts-->   
<?php
$sql="SELECT * FROM subcategory";
 $result=mysqli_query($conn,$sql);
 if(mysqli_num_rows($result)>0)
 {

?>		
		
		  <table class="table table-striped table-bordered complex-headers">
			<thead>
				<tr>
					<th>S.no</th>
					 <th>Parent Category </th>
					<th>Sub Category</th>
					<th>Create date</th>
					<th>update</th>
					<th>Action</th>
				</tr>

			</thead>
                            <tbody>
		<?php
		 $i=1;
		 while($row=mysqli_fetch_assoc($result))
		 {
			    $cid=$row['categoryid'];
				$sql2="SELECT categoryName FROM category WHERE id='$cid'";
				$result2=mysqli_query($conn,$sql2);
				while($row2=mysqli_fetch_assoc($result2))
				{ $parentcatname=$row2['categoryName'];			
				}
		 echo '<tr>
			       <td>'.$i.'</td>
			       <td>'.$parentcatname.'</td>
			       <td>'.$row['subcategory'].'</td>
			       <td>'.$row['creationDate'].'</td>
			       <td>'.$row['updationDate'].'</td>
			       <td><A href="edit-subcategory.php?id='.$row['id'].'">edit</a> <A href="delete-subcategory.php?id='.$row['id'].'">delete</a></td>
			   </tr>';
			$i++;
		 }
		?>						
		  


                            </tbody>
             
                        </table>
	<?php
 }else{
	 echo "<h3> No category found table is empty.";
 }
 ?>
 </div>







	

		</div>
	</div>
</div>
<?php
 include "footer.php";
?>
