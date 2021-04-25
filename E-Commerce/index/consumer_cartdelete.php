<?php
session_start();
$_SESSION['id']=1;
    error_reporting(E_ERROR | E_PARSE);
    $firstNameErr = $lastNameErr = $emailErr = $passwordErr = $addressErr = $phoneErr = $shopNameErr = "";
    $firstName = $lastName = $email = $password = $address = $phone = $nid = $dob = $gender = $vendorType = $shopName = "";
    $count = 0;
    $userType = 3;
    $flag = 0;

    $email = $_SESSION["email"];
    $password = $_SESSION["password"];

    $product_name = $_GET['id'];

    $host = "localhost";
    $user = "wt_projectuser";
    $passwo = "123";
    $db = "wt_project";

        // Mysqli object-oriented
        $conn1 = new mysqli($host, $user, $passwo, $db);

        if($conn1->connect_error) {
          echo "Database Connection Failed!";
          echo "<br>";
          echo $conn1->connect_error;
        }
        else {
        
           
           $p1= (int)$_GET['id'];
           $stmt1 = $conn1->prepare("DELETE FROM `cart` WHERE consumer_email=? and product_name=?");
                            $stmt1->bind_param("ss", $email, $product_name);
                            
                            $status = $stmt1->execute();
                            if($status) {
                                $conn1->close();

                                header("Location: consumer_cart.php");
                            }
                            else {
                                echo "Failed to Delete Data.";
                                echo "<br>";
                                echo $conn1->error;
                            }
                        }
    ?>