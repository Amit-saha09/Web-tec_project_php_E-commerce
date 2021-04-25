<?php
session_start();
$host = "localhost";
$user = "wt_projectuser";
$pass = "123";
$db = "wt_project";
$email=$_SESSION['email'];

// Mysqli object-oriented
$conn1 = new mysqli($host, $user, $pass, $db);
if($conn1->connect_error)
{
    echo "Database Connection Failed!";
    echo "<br>";
    echo $conn1->connect_error;
}

else
{

    $stmt1 = $conn1->prepare("insert into bonus  (email) VALUES (?)");
    $stmt1->bind_param("s", $email);
    
    $status = $stmt1->execute();    
    if($status) {
        echo "requested Successful.";
        header("Location: Manager_Salary.php");

        
    }
    else {
        echo "alreay requested.";
        
    }   
}
?>