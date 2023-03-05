<?php
 include "header.php";
?>   
<div class="main-content">
	<div class="content-wrapper">
		<div class="container-fluid"><!--Statistics cards Starts-->
		<?php
		include "connect.php";
        $notp=0;
        $inp=0;
        $closep=0;
	    $email=$_SESSION['email'];
		$sql="SELECT * FROM users WHERE userEmail='$email'";
		$result=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($result))
		{   $userid=$row['id'];			
		}
	// not in process	
		$sql2="SELECT COUNT(complaintNumber) FROM tblcomplaints WHERE status='not process' AND userId='$userid'";
		if(mysqli_query($conn,$sql2))
		{
		$result2=mysqli_query($conn,$sql2);
		}else{
			echo 'error '.mysqli_error($conn);
		}
	 		 while($row2=mysqli_fetch_assoc($result2))
			 {
				 //print_r($row2);
				$notp=$row2['COUNT(complaintNumber)'];
			 }
	
       // in process	
		$sql2="SELECT COUNT(complaintNumber) FROM tblcomplaints WHERE status='in process' AND userId='$userid'";
		if(mysqli_query($conn,$sql2))
		{
		$result2=mysqli_query($conn,$sql2);
		}else{
			echo 'error '.mysqli_error($conn);
		}
	 		 while($row2=mysqli_fetch_assoc($result2))
			 {
				 //print_r($row2);
				$inp=$row2['COUNT(complaintNumber)'];
			 }
		//close process	
		$sql2="SELECT COUNT(complaintNumber) FROM tblcomplaints WHERE status='closed' AND userId='$userid'";
		if(mysqli_query($conn,$sql2))
		{
		$result2=mysqli_query($conn,$sql2);
		}else{
			echo 'error '.mysqli_error($conn);
		}
	 		 while($row2=mysqli_fetch_assoc($result2))
			 {
				 //print_r($row2);
				$closep=$row2['COUNT(complaintNumber)'];
			 }
		
		?>
		
		<p>  <?php echo $notp;?></p>
		<p>  <?php echo $inp;?></p>
		<p>  <?php echo $closep;?></p>
		


		</div>
	</div>
</div>
<?php
 include "footer.php";
?>
