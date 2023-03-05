<?php
 include "header.php";
 include "connect.php";
 $msg='';
 if(isset($_POST['submit']))
 {
	  $statename=$_POST['statename'];
	  $statedec=$_POST['statedec'];
	  if(!empty($statename) && !empty($statedec))
	  {
		$sql="INSERT INTO state (stateName,stateDescription)VALUES('$statename','$statedec')";
		if(mysqli_query($conn,$sql))
		{  $msg="state added successfully";
		}else{
			  $msg="state not added successfully";
		}		  
	  }else{
		  echo "statename name and description is required.";
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
									<h4 class="card-title mb-0 text-center">State</h4>
								</div>
							</div>
							<div class="card-body">
								<div class="px-3">
									<form class="form" method="post">
																					<div class="form-body">
																						<div class="row">
																							<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
																								<fieldset class="form-group">
																									<label for="basicInput">State Name
</label>
																									<input type="text" name="statename" class="form-control" id="basicInput">
																								</fieldset>
																							</div>
																							<div class="col-xl-12 col-lg-12 col-md-12 mb-1">
																								<fieldset class="form-group">
																									<label for="helpInputTop">Description</label>
																								  <textarea name="statedec" class="form-control" id="helpInputTop"> </textarea >
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
$sql="SELECT * FROM state";
 $result=mysqli_query($conn,$sql);
 if(mysqli_num_rows($result)>0)
 {

?>		
		
		  <table class="table table-striped table-bordered complex-headers">
			<thead>
				<tr>
					<th>S.no</th>
					 <th>state name</th>
					<th>state Description</th>
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
			       <td>'.$row['stateName'].'</td>
			       <td>'.$row['stateDescription'].'</td>
			       <td>'.$row['postingDate'].'</td>
			       <td>'.$row['updationDate'].'</td>
			       <td><A href="edit-state.php?id='.$row['id'].'">edit</a> <A href="delete-state.php?id='.$row['id'].'">delete</a></td>
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