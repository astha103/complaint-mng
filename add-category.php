<?php
 include "header.php";
 include "connect.php";
 $msg='';
 if(isset($_POST['submit']))
 {
	  $catname=$_POST['catname'];
	  $catdesc=$_POST['catdesc'];
	  if(!empty($catname) && !empty($catdesc))
	  {
		$sql="INSERT INTO category (categoryName,categoryDescription)VALUES('$catname','$catdesc')";
		if(mysqli_query($conn,$sql))
		{  $msg="Category added successfully";
		}else{
			  $msg="Category not added successfully";
		}		  
	  }else{
		  echo "Category name and description is required.";
	  }
	
 }
?>   
<div class="main-content">
	<div class="content-wrapper">
		<div class="container-fluid"><!--Statistics cards Starts-->   
			  <section class="basic-elements">
				<div class="row">
				  <div class="card ">
				     <h4><?php echo $msg;?> </h4>
				  </div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<div class="card-title-wrap bar-success">
									<h4 class="card-title mb-0 text-center">Category</h4>
								</div>
							</div>
							<div class="card-body">
								<div class="px-3">
									<form class="form" method="post">
																					<div class="form-body">
																						<div class="row">
																							<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
																								<fieldset class="form-group">
																									<label for="basicInput">Category Name</label>
																									<input type="text" name="catname" class="form-control" id="basicInput">
																								</fieldset>
																							</div>
																							<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
																								<fieldset class="form-group">
																									<label for="helpInputTop">Description</label>
																								  <textarea name="catdesc" class="form-control" id="helpInputTop"> </textarea >
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
$sql="SELECT * FROM category";
 $result=mysqli_query($conn,$sql);
 if(mysqli_num_rows($result)>0)
 {

?>		
		
		  <table class="table table-striped table-bordered complex-headers">
			<thead>
				<tr>
					<th>S.no</th>
					 <th>Category name</th>
					<th>Category Description</th>
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
		 echo '<tr>
			       <td>'.$i.'</td>
			       <td>'.$row['categoryName'].'</td>
			       <td>'.$row['categoryDescription'].'</td>
			       <td>'.$row['creationDate'].'</td>
			       <td>'.$row['updationDate'].'</td>
			       <td><A href="edit-category.php?id='.$row['id'].'">edit</a> <A href="delete-category.php?id='.$row['id'].'">delete</a></td>
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