<?php
session_start();
$con = mysqli_connect("localhost","root","","school");
// Check connection
$_SESSION['username']="";
$check="INSERT INTO query values ('$_POST[username]','$_POST[comment]')";
$result4=mysqli_query($con,$check);
echo "<script> window.history.go(-1); </script>";
mysqli_close($con);
?>
