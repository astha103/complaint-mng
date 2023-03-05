<?php
 include "header.php";
 include "connect.php";
 $msg='';
 $cid=$_GET['id'];
 if(isset($_POST['submit']))
 {
	  $catname=$_POST['catname'];
	  $catdesc=$_POST['catdesc'];
	  if(!empty($catname) && !empty($catdesc))
	  {  
	    $sql="UPDATE category SET categoryName='$catname',categoryDescription='$catdesc' WHERE id='$cid'";
		if(mysqli_query($conn,$sql))
		{  $msg="Category Updated successfully";
		}else{
			  $msg="Category not Updated successfully";
		}		  
	  }else{
		  echo "Category name and description is required.";
	  }
	
 }
 
 $sql="SELECT * FROM category WHERE id='$cid'";
  $result=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_assoc($result))
  {   $catname=$row['categoryName'];
      $catdesc=$row['categoryDescription'];
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
																									<input type="text" name="catname" class="form-control" id="basicInput" value="<?php echo $catname;?>">
																								</fieldset>
																							</div>
																							<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
																								<fieldset class="form-group">
																									<label for="helpInputTop">Description</label>
																								  <textarea name="catdesc" class="form-control" id="helpInputTop"><?php echo $catdesc;?></textarea >
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

		</div>
	</div>
</div>
<?php
 include "footer.php";
?>