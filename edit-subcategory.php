<?php
 include "header.php";
 include "connect.php";

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
<?php
date_default_timezone_set('Asia/Kolkata');
 $subcatid=$_GET['id'];
 if(isset($_POST['submit']))
 {
	 $subcat=$_POST['subcat'];
	 $date=date("d-m-y,h:m:s");
	 $sql1="UPDATE subcategory SET subcategory='$subcat' ,updationDate='$date' WHERE id='$subcatid'";
	 if(mysqli_query($conn,$sql1))
	 { echo "<p> Catregory name updated. </p>";
	 }else{
        echo "<p> Catregory name not updated.".mysqli_error($conn)."</p>";
	 }
 }
?>
									<h4 class="card-title mb-0 text-center">Sub Category</h4>
					
								</div>
							</div>
							<div class="card-body">
								<div class="px-3">
									<form method="post" class="form">
										<div class="form-body">
											<div class="row">
												<div class="col-xl-6 col-lg-6 col-md-6 mb-1">

						                           <fieldset class="form-group position-relative">
												   <label for="helpInputTop">Parent Category</label>
	<select class="form-control" name="catid">
	
<?php


 
 
 $sql="SELECT * FROM subcategory";
 $result=mysqli_query($conn,$sql);
 while($row=mysqli_fetch_assoc($result))
 { 
   $parentcatid=$row['categoryid'];
   $subcatname=$row['subcategory'];
 }
 
				$sql2="SELECT id,categoryName FROM category WHERE id='$parentcatid'";
				$result2=mysqli_query($conn,$sql2);
				while($row2=mysqli_fetch_assoc($result2))
				{ 
			       $parentcatid=$row2['id'];
				   $parentcatname=$row2['categoryName'];			
				}
		 echo '<option value="'.$parentcatid.'" selected>'.$parentcatname.'</option>';
 
	 ?>												     													
													</select>									</fieldset>		
</div>												<div class="col-xl-6 col-lg-6 col-md-6 mb-1">
													<fieldset class="form-group">
														<label for="helpInputTop">SubCategory Name</label>
													 <input type="text" name="subcat" class="form-control" id="basicInput" value="<?php echo $subcatname;?>">
													</fieldset>
												</div>
					

											 <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
													<fieldset class="form-group">
													
													  <button type="submit" name="submit" class="submit-btn">
														<i class="icon-note"></i> Update
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
