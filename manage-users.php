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
		
		  <table class="table table-striped table-bordered complex-headers">
			<thead>
				<tr>
					<th>S.no</th>
					 <th>Name</th>
					<th>Email</th>
					<th>Contact</th>
					<th>Register Date</th>
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
			       <td>'.$row['fullName'].'</td>
			       <td>'.$row['userEmail'].'</td>
			       <td>'.$row['contactNo'].'</td>
			       <td>'.$row['regDate'].'</td>
			       <td><a class="btn bg-info text-light" href="view-user.php?id='.$row['id'].'">View Details </A> <a href="delete-user.php?id='.$row['id'].'"  class="btn bg-danger text-light deleteuser">Delete </A></td>

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