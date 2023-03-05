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

                         
                
                        </table>
						<!--  model start -->
					

  
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
