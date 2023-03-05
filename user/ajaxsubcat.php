<?php
include "connect.php";
  $catid=$_POST['catid'];
  //print_r($_POST);
 // echo $catid;
  
  $sql="SELECT * FROM  subcategory WHERE categoryid='$catid'";
  $result=mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0)
  {
	   echo '<select name="subcategory" class="form-control">';
	    while($row=mysqli_fetch_assoc($result))
		{
			echo '<option value="'.$row['subcategory'].'">'.$row['subcategory'].'</option>';
		}
		echo '</select>';
  }else{
	  echo '0';
  }

?>