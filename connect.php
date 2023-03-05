<?php
$servername="localhost";
$username="root";
$pass="";
$dbname="complaint";

$conn=mysqli_connect($servername,$username,$pass,$dbname);

if($conn)
{//  echo "Connected";
}else{
echo "Not Connected".mysqli_connect_error($conn);
}
?>