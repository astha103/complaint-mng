<?php
 include "header.php";
 include "connect.php";
 $msg='';
 $cid=$_GET['id'];

 $sql="DELETE FROM category WHERE id='$cid'";
 if(mysqli_query($conn,$sql))
 {    $msg="Category deleted.";
 }else{
	 $msg="Category Not deleted.".mysqli_error($conn);
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