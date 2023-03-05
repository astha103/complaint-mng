<?php
 include "header.php";
?>   
<div class="main-content">
	<div class="content-wrapper">
		<div class="container-fluid"><!--Statistics cards Starts-->   
		 <section id="basic-form-layouts">
	<div class="row">
		<div class="col-sm-12">
			<h2 class="content-header">Register Complaint</h2>
		</div>
	</div>
	<div class="row">
	<?php
	include "connect.php";
	$email=$_SESSION['email'];
    $sq="SELECT id from users WHERE userEmail='$email'";
	$res=mysqli_query($conn,$sq);
	while($row1=mysqli_fetch_assoc($res))
	{ $userid=$row1['id'];
	}
	 if(isset($_POST['submit']))
	 {
		 $pcatid=$_POST['category'];
		 $subcategory=$_POST['subcategory'];
		 $cmptype=$_POST['cmptype'];
		 $state=$_POST['state'];
		 $naturecmp=$_POST['naturecmp'];
		 $cmpdetail=$_POST['cmpdetail'];
		 
		 $sql="INSERT INTO tblcomplaints (userId,category,subcategory,complaintType,state,noc,complaintDetails) VALUES('$userid','$pcatid','$subcategory','$cmptype','$state','$naturecmp','$cmpdetail')";
		 
		 if(mysqli_query($conn,$sql)){
			 echo "Data Inserted Successfully";
		 }else{
			 echo "Data Not Inserted Successfully";
		 }
	 }
	
	?>
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="card-title-wrap bar-success">
						<h4 class="card-title" id="basic-layout-form"> </h4>
					</div>

				</div>
				<div class="card-body">
					<div class="px-3">
						<form class="form" method="post" enctype="multipart/form-data">
							<div class="form-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput1">Category Name</label>
											<select id="categoryid"name="category" class="form-control">
                                              <option value="none">SELECT Category</option>
				<?php
                   $sql="SELECT id,categoryName FROM category";
				   $result=mysqli_query($conn,$sql);
				                       while($row=mysqli_fetch_assoc($result))
									   {
									  echo '<option value="'
									  .$row['id'].'"> '
									  .$row['categoryName'].'</option>';
									   }

			 	?>
											</select>
										</div> 
									</div>
									<div class="col-md-6">
									<div class="form-group">
											<label for="projectinput1">Sub Category Name</label>
											<div id="subcatlist">
											<select name="subcategory" class="form-control">
                                              <option value="none">SELECT Sub Category</option>

											</select>
											</div>
										</div> 
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput1">Complaint Type</label>
											<select name="cmptype" class="form-control">
                                              <option value="Complaint">Complaint </option>
											  <option value="General">General </option>
											</select>
										</div> 
									</div>
									<div class="col-md-6">	 <div class="form-group">
											<label for="projectinput1">State</label>
											<select name="state" class="form-control">
                                              <option value="none">SELECT state</option>
				<?php
                   $sql="SELECT stateName FROM state";
				   $result=mysqli_query($conn,$sql);
				                       while($row=mysqli_fetch_assoc($result))
									   {
									  echo '<option value="'
									  .$row['stateName'].'"> '
									  .$row['stateName'].'</option>';
									   }

			 	?>
											</select>
										</div> 
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput5">Nature of Complaint</label>
											   <input type="text" class="form-control" name="naturecmp" >
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput6">Complaint Details (max 2000 words)</label>
							               <textarea  name="cmpdetail" class="form-control"> </textarea>
										</div>
									</div>
								</div>
								
								<!--
								<div class="row">            <div class="col-md-6">
										<div class="form-group">
											<label for="projectinput6">Profile image</label>
							               <input type="file" id="" class="form-control  " name="file">
										 
										</div>
									</div>
								</div>
-->
						
	                            <div class="row">
									<div class="col-md-6">
									  <button type="submit" name="submit" class="btn btn-success"><i class="icon-note"></i> Save
								        </button>
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
