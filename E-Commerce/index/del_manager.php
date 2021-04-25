<?php
$email=$_GET['email'];
echo $email;

$host = "localhost";
$user = "wt_projectuser";
$pass = "123";
$db = "wt_project";
$conn1 = new mysqli($host, $user, $pass, $db);
mysqli_query($conn1,"delete from manager where email='$email'");
 header("location:manager_list.php");

?>