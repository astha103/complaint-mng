<?php
 include "header.php";
 include "connect.php";
 $msg='';
 $sid=$_GET['id'];

 $sql="DELETE FROM state WHERE id='$sid'";
 if(mysqli_query($conn,$sql))
 {    $msg="state deleted.";
 }else{
	 $msg="state Not deleted.".mysqli_error($conn);
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
              </section>
		</div>
	</div>
</div>
<?php
 include "footer.php";
?>