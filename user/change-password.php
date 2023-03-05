<?php
 include "header.php";
?>   
<div class="main-content">
	<div class="content-wrapper">
		<div class="container-fluid"><!--Statistics cards Starts-->
		<?php
		include "connect.php";
		 if(isset($_POST['submit']))
		 {
			  $currentpass=$_POST['crtpass'];
			  $newpass=$_POST['newpass'];
			  $crmpass=$_POST['crmpass'];
			  
			  if($newpass==$crmpass)
			  {
				  $currentpass=md5($currentpass);
				  $email=$_SESSION['email'];
				  
				  $sql="SELECT * FROM users WHERE userEmail='$email' AND password='$currentpass'";
				  $result=mysqli_query($conn,$sql);
				  
				  if(mysqli_num_rows($result)==1)
				  {
					  $newpass=md5($newpass);
					  $sql="UPDATE users SET  password='$newpass' WHERE userEmail='$email'";
					  if(mysqli_query($conn,$sql))
					  {   echo "Password updated";
				           $_SESSION['pass']=$newpass;
					  }else{
						  echo "Data Not Updated";
					  }
					  
				  }else{
					  echo "Current Password Not Match.";
				  }				  
				  
			  }else{				  
				echo "New password and Confirm password not match.";
			  }
			 
		 }
		
		
		
		
		?>
		
		  <section class="basic-elements">

			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="card-title-wrap bar-success">
								<h4 class="card-title mb-0 text-center">Admin Change Password</h4>
							</div>
						</div>
						<div class="card-body">
							<div class="px-3">
								<form class="form" method="post">
									<div class="form-body">
										<div class="row">
											<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
												<fieldset class="form-group">
													<label for="basicInput">Current Password</label>
													<input type="text"  name="crtpass" class="form-control" id="basicInput">
												</fieldset>
											</div>
											<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
												<fieldset class="form-group">
													<label for="helpInputTop">New Password</label>
	                                              <input type="text"  name="newpass" class="form-control" id="helpInputTop">
												</fieldset>
											</div>
								           <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
												<fieldset class="form-group">
													<label for="helpInputTop">Confirm Password</label>
	                                              <input type="text" name="crmpass" class="form-control" id="helpInputTop">
												</fieldset>
											</div>

				                         <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
												<fieldset class="form-group">
												
	                                              <button name="submit" type="submit" class="submit-btn">
													<i class="icon-note"></i> Save
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
