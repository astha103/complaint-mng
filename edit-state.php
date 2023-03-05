<?php
 include "header.php";
 include "connect.php";
 $msg='';
 $sid=$_GET['id'];
 if(isset($_POST['submit']))
 { 
	  $statename=$_POST['statename'];
	  $statedesc=$_POST['statedesc'];
	  if(!empty($statename) && !empty($statedesc))
	  {  
	    $sql="UPDATE state SET stateName='$statename',stateDescription='$statedesc' WHERE id='$sid'";
		if(mysqli_query($conn,$sql))
		{  $msg="sate Updated successfully";
		}else{
			  $msg="sate not Updated successfully";
		}		  
	  }else{
		  echo "sate name and description is required.";
	  }
	
 }
 
 $sql="SELECT * FROM state WHERE id='$sid'";
  $result=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_assoc($result))
  {   $stateName=$row['stateName'];
      $stateDescription=$row['stateDescription'];
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
																									<label for="basicInput">state Name</label>
																									<input type="text" name="statename" class="form-control" id="basicInput" value="<?php echo $stateName;?>">
																								</fieldset>
																							</div>
																							<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
																								<fieldset class="form-group">
																									<label for="helpInputTop">Description</label>
																								  <textarea name="statedesc" class="form-control" id="helpInputTop"><?php echo $stateDescription;?></textarea >
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