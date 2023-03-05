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
					<th>Status</th>
				</tr>

			</thead>
                            <tbody>
		<?php
		 $i=1;
		 while($row=mysqli_fetch_assoc($result))
		 {
			  $status=($row['status']==1)?"active":"block";
		 echo '<tr>
			       <td>'.$i.'</td>
			       <td>'.$row['fullName'].'</td>
			       <td>'.$row['userEmail'].'</td>
			       <td>'.$status.'</td>

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