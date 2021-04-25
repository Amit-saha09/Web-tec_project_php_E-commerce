<?php
$email=$_GET['email'];
$salary=$_GET['salary'];
echo $email;
echo $salary;

$host = "localhost";
$user = "wt_projectuser";
$pass = "123";
$db = "wt_project";

$conn1 = new mysqli($host, $user, $pass, $db);
mysqli_query($conn1,"update  manager SET balance='$salary' WHERE email='$email';");


header("location:manager_list.php");

?>