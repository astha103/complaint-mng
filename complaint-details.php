 <?php
 include "header.php";
 include "connect.php";
 $cmpid=$_GET['pid'];
 
 $sql="SELECT * FROM   tblcomplaints WHERE complaintNumber='$cmpid'";
 $result=mysqli_query($conn,$sql);
?>   
<div class="main-content">
	<div class="content-wrapper">
		<div class="container-fluid"><!--Statistics cards Starts-->   
		<?php
		if(mysqli_num_rows($result)>0)
		{
					
							while($row=mysqli_fetch_assoc($result))
							{
								$registerdate=$row['regDate'];
							    $catdid=$row['category'];
							    $subcatname=$row['subcategory'];
							    $complaintType=$row['complaintType'];
							    $state=$row['state'];
							    $noc=$row['noc'];
							    $status=$row['status'];
							    $status=$row['status'];
								
								
								$sql3="SELECT * FROM category WHERE id='$catdid'";
								$result3=mysqli_query($conn,$sql3);
								while($row3=mysqli_fetch_assoc($result3))
								{ $catname=$row3['categoryName'];
								}
							
							//  user name
         						$userid=$row['userId'];
								$sql2="SELECT * FROM users WHERE id='$userid'";
								$result2=mysqli_query($conn,$sql2);
								while($row2=mysqli_fetch_assoc($result2))
								{  $username=$row2['fullName'];
								}
							
							}
					?>

		
		  <table class="table table-striped table-bordered">
                           
                                <tr>
                                    <th>Complaint No</th>
                          <th><?php echo $cmpid; ?></th>
								</tr>
								<tr>
                                    <th>	Complainant  Name </th>
                                    <th><?php echo $username; ?> </th>
								</tr>
								<tr>
                                    <th>Register Date</th>
                                    <th><?php echo $registerdate;?></th>
								</tr>
								<tr>
                                    <th>Category</th>
                                    <th><?php echo $catname; ?></th>
								</tr>
								 <tr>
                                    <th>SubCategory</th>
									 <th><?php echo $subcatname; ?></th>
								</tr>
								<tr>
                                    <th>Complaint Type</th>
									 <th><?php echo $complaintType; ?></th>
								</tr>
                               	<tr>
                                    <th>State</th>
									 <th><?php echo $state; ?></th>
								</tr>
									<tr>
                                    <th>Nature of Complaint	</th>
									 <th><?php echo $noc; ?></th>
								</tr>
								<tr>
                                    <th>Final Status</th>
									 <th><?php echo $status; ?></th>
								</tr>
								<tr>
                                    <th>Action</th>
									 <th><a href="" data-toggle="modal" data-target="#myModal">Take Action</a> <a href="user-details.php?uid=<?php echo $userid; ?>">View User Detials</a></th>
								</tr>
                         
                
                        </table>
						<!--  model start -->
					
  <!-- The Modal -->
  <?php
  
  if(isset($_POST['update']))
  {
	   $status=$_POST['status'];
	   $remark=$_POST['remark'];	   
	   if(!empty($status) && !empty($remark))
	   {
		 $sql1="UPDATE tblcomplaints SET status='$status' WHERE complaintNumber='$cmpid'";   
		 if(mysqli_query($conn,$sql1))
		 { echo "<p>Data updated in tblcomplaints</p>";
		 }
		 
		 $sql2="SELECT * FROM complaintremark WHERE id='$cmpid'";
		 $result2=mysqli_query($conn,$sql2);
		 if(mysqli_num_rows($result2)==1)
		 {
			 $sql3="UPDATE complaintremark SET status='$status',remark='$remark' WHERE id='$cmpid'";   
			 if(mysqli_query($conn,$sql3))
			 { echo "<p>Data updated in complaintremark</p>";
			 }
		 }else{
			 $sql4="INSERT INTO complaintremark(status,remark,complaintNumber)VALUES('$status','$remark','$cmpid')";
			 if(mysqli_query($conn,$sql4))
			 { echo "<p>Data inserted in complaintremark</p>";
			 }
		 }	
		 		 
	   }else{
		   echo "<p> status and remark can't be empty. </p>";
	   }
	   
  }
  
  ?>
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Complaint Number	<?php echo $cmpid;?></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
		
        
        <!-- Modal body -->
        <div class="modal-body">
       <form method="post">
		<div class="row">
		  <div class="col">
		   <label> Status</label>
			<select name="status">
			  <option value="">Select Status </option>
			  <option value="in process">in process </option>
			  <option value="closed">closed </option>
			</select>
		  </div>
		  <div class="col">
		  <label> Remark</label>
			<textarea rows="10" cols="50" name="remark"> </textarea>
		  </div>
		</div>
		<button type="submit" name="update" class="btn btn-primary mt-3">Submit</button>
	  </form>
		   
		   
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
						<!--  model end -->
       <?php
		}else{
			echo '<h2> No record found ';
		}
	   
	   
	   ?>
		</div>
	</div>
</div>
<?php
 include "footer.php";
?>
