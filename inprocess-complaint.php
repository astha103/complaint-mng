 <?php
 include "header.php";
 include "connect.php";
 
 $sql="SELECT * FROM  tblcomplaints WHERE status='in process'";
 $result=mysqli_query($conn,$sql);
?>   
<div class="main-content">
	<div class="content-wrapper">
		<div class="container-fluid"><!--Statistics cards Starts-->   
		<?php
		if(mysqli_num_rows($result)>0)
		{
		?>
		  <table class="table table-striped table-bordered complex-headers">
                            <thead>
                                <tr>
                                    <th>Complaint No</th>
                                    <th>Complaint Name </th>
                                    <th>Register Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php
							while($row=mysqli_fetch_assoc($result))
							{   $userid=$row['userId'];
								$sql2="SELECT * FROM users WHERE id='$userid'";
								$result2=mysqli_query($conn,$sql2);
								while($row2=mysqli_fetch_assoc($result2))
								{  $username=$row2['fullName'];
								}
								echo '	
                              <tr>							
                                  <td>'.$row['complaintNumber'].'</td>
                                  <td>'.$username.'</td>
								  <td>'.$row['regDate'].'</td>
								   <td><a class="btn btn-danger" href=""> In Process</td>
								   <td><a class="btn btn-info" href="complaint-details.php?pid='.$row['complaintNumber'].'"> View Details</td>
                                </tr>';
							}?>
                            </tbody>    
                        </table>
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
