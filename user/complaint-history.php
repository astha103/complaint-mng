 <?php
 include "header.php";
 include "connect.php";
 
	$email=$_SESSION['email'];
	$sql="SELECT * FROM users WHERE userEmail='$email'";
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_assoc($result))
	{  echo  $userid=$row['id'];			
	}
 
 $sql="SELECT * FROM  tblcomplaints ";
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
                                   <th>Register Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php
							while($row=mysqli_fetch_assoc($result))
							{  
								echo '	
                              <tr>							
                                  <td>'.$row['complaintNumber'].'</td>
                                <td>'.$row['regDate'].'</td>
								   <td><a class="btn btn-danger" href=""> '.$row['status'].'</td>
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
