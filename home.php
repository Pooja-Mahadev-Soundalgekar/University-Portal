<?php
session_start();
$con = mysqli_connect("localhost","root","","school");
// Check connection
$_SESSION['username']="";
$check="SELECT * FROM login WHERE username='$_POST[username]' and password='$_POST[password]'";
$result4=mysqli_query($con,$check);
$row=mysqli_fetch_array($result4,MYSQL_NUM);
		 $rowcount=mysqli_num_rows($result4);
		 if($rowcount >0)
		 {
  		 $_SESSION['username']=$_POST[username];
		 header('Location: /hci1/user.php');
		 }
else{
echo "<script> window.history.go(-1); </script>";
}
mysqli_close($con);
?>
