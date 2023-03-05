<?php
 include "header.php";
 include "connect.php";
?>
<div class="main-content">
	<div class="content-wrapper">
	
		<div class="container-fluid"><!--Statistics cards Starts-->   
<?php
$sql="SELECT * FROM users";
 $result=mysqli_query($conn,$sql);
 if(mysqli_num_rows($result)>0)
 {

?>		
		

		<?php
		 $i=1;
		 while($row=mysqli_fetch_assoc($result))
		 {
			 $fullName=$row['fullName'];
			 $userEmail=$row['userEmail'];
			 $password=$row['password'];
			 $contactNo=$row['contactNo'];
			 $address=$row['address'];
			 $State=$row['State'];
			 $country=$row['country'];
			 $pincode=$row['pincode'];
			 $regDate=$row['regDate'];
			 $updationDate=$row['updationDate'];
			 $status=$row['status'];
			 $status=($status==1)?'active':'deactivate';
		 }
		echo '<p>'.$fullName.' </p>';
		 echo' <table class="table ">';
		 echo '<tr>
			       <th>Reg Date</th>
			       <td>'.$regDate.'</td>
			   </tr>';
		 echo '<tr>
			       <th>User Email:</th>
			       <td>'.$userEmail.'</td>
			   </tr>';
			   		 echo '<tr>
			       <th>User  no:</th>
			       <td>'.$contactNo.'</td>
			   </tr>';
			   		 echo '<tr>
			       <th>Address:</th>
			       <td>'.$address.'</td>
			   </tr>';
			   		 echo '<tr>
			       <th>State::</th>
			       <td>'.$State.'</td>
			   </tr>';
			   		 echo '<tr>
			       <th>Country:</th>
			       <td>'.$country.'</td>
			   </tr>';
			   echo '<tr>
			       <th>Pincode:</th>
			       <td>'.$pincode.'</td>
			   </tr>';
			  echo '<tr>
			       <th>Last Updation::</th>
			       <td>'.$updationDate.'</td>
			   </tr>';
	         echo '<tr>
			       <th>Status:</th>
			       <td>'.$status.'</td>
			   </tr>';
		?>						
		  


             
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