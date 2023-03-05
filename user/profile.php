<?php
 include "header.php";
?>   
<div class="main-content">
	<div class="content-wrapper">
		<div class="container-fluid"><!--Statistics cards Starts-->   
		 <section id="basic-form-layouts">
	<div class="row">
		<div class="col-sm-12">
			<h2 class="content-header">Profile info</h2>
		</div>
	</div>
	<div class="row">
	<?php
	include "connect.php";
	//print_r($_SESSION);
	$email=$_SESSION['email'];
    
	 if(isset($_POST['submit']))
	 {
		  $fname=$_POST['fname'];
		  $newemail=$_POST['email'];
		  $contact=$_POST['contact'];
		  $add=$_POST['add'];
		  $state=$_POST['state'];
		  $country=$_POST['country'];
		  $pincode=$_POST['pincode'];
		  $target='';
		  if(isset($_FILES['file']['name']) && !empty(  $filename=$_FILES['file']['name']))
		  {
			 //  print_r($_FILES);
			  $filename=$_FILES['file']['name'];
			  $tmp_name=$_FILES['file']['tmp_name'];
			   $target='upload/'.$filename;			   
			   if(move_uploaded_file($tmp_name,$target))
			   { echo 'uploaded';
			   }
		  } 		  
		  if(empty($target))
		  {
			      $sql="UPDATE users SET fullName='$fname',userEmail='$newemail',contactNo='$contact',address='$add',State='$state',country='$country',pincode='$pincode' WHERE userEmail='$email'";
		  }else{
			     $sql="UPDATE users SET fullName='$fname',userEmail='$newemail',contactNo='$contact',address='$add',State='$state',country='$country',pincode='$pincode',userImage='$target' WHERE userEmail='$email'";
		  }

		  if(mysqli_query($conn,$sql))
		  {  echo '<script> alert("data updated");</script>';
            $_SESSION['email']=$newemail;
		  }else{
			  echo "Data Not updatesd".mysqli_error($conn);
		  }
		 
	 }
	
	
	
	
	
	
	
	
	$email=$_SESSION['email'];
	$sql="SELECT * FROM users WHERE userEmail ='$email' ";
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_assoc($result))
	{  /*  echo '<pre>';
        print_r($row);
		echo '</pre>';  */
		$fname=$row['fullName'];
		$userEmail=$row['userEmail'];
		$contactNo=$row['contactNo'];
		$address=$row['address'];
		$state=$row['State'];
		$country=$row['country'];
		$pincode=$row['pincode'];
		$userImage=$row['userImage'];
		$regDate=$row['regDate'];
		$updationDate=$row['updationDate'];
		$status=$row['status'];
		
		if(empty($userImage))
		{ $userImage='https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png';
		}
	}
	
	
	
	?>
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="card-title-wrap bar-success">
						<h4 class="card-title" id="basic-layout-form"></h4>
					</div>

				</div>
				<div class="card-body">
					<div class="px-3">
						<form class="form" method="post" enctype="multipart/form-data">
							<div class="form-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput1">Full Name</label>
											<input type="text" id="projectinput1" class="form-control" name="fname" value="<?php echo $fname;?>">
										</div> 
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput2">User Email</label>
											<input type="text" id="projectinput2" class="form-control" name="email" value="<?php echo $userEmail;?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">Contact</label>
											<input type="text" id="projectinput3" class="form-control" name="contact" value="<?php echo $contactNo;?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput4">Address</label>
												<textarea id="projectinput8" rows="2" cols="5" class="form-control" name="add"></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput5">State</label>
											<select name="state" class="form-control">
                                              <option value="none">SELECT State</option>
												<option value="up" <?php echo ( $state=='up')?'selected':'';?>>up</option>
												<option value="mp" <?php echo ( $state=='mp')?'selected':'';?>>mp</option>
												<option value="panjab" <?php echo ($state=='panjab')?'selected':'';?>>panjab</option>

											</select>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput6">Country</label>
							               <input type="text" id="projectinput3" class="form-control" name="country" value="<?php echo $country;?>">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput5">Pincode</label>
				                              <input type="text" id="projectinput3" class="form-control" name="pincode" value="<?php echo $pincode;?>">
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput6">Reg Date</label>
							               <input disabled type="text" id="projectinput3" class="form-control" name="rgdate" value="<?php echo $regDate;?>">
										</div>
									</div>
																		                        <div class="col-md-6">
										<div class="form-group">
											<label for="projectinput6">Profile image</label>
							               <input type="file" id="projectinput3" class="form-control  profileupload" name="file">
										   <div class="profile-image">
										   <i class="fas fa-times-circle closeicon"></i>
										   <img width="80"src="<?php echo $userImage;?>">
										   </div>
										</div>
									</div>
								</div>

						
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
