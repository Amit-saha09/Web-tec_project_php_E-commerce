<?php
$email=$_GET['email'];
$salary=$_GET['salary'];
$balance=$_GET['balance'];
echo $email;
echo $salary;

$total=$balance+$salary*50/100;

$host = "localhost";
$user = "wt_projectuser";
$pass = "123";
$db = "wt_project";

$conn1 = new mysqli($host, $user, $pass, $db);
mysqli_query($conn1,"update  manager SET balance='$total' WHERE email='$email';");


header("location:bonus_manager_list.php");

?>