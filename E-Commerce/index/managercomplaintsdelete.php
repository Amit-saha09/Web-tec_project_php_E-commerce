<?php
session_start();

    error_reporting(E_ERROR | E_PARSE);
    $firstNameErr = $lastNameErr = $emailErr = $passwordErr = $addressErr = $phoneErr = $shopNameErr = "";
    $firstName = $lastName = $email = $password = $address = $phone = $nid = $dob = $gender = $vendorType = $shopName = "";
    $count = 0;
    $userType = 3;
    $flag = 0;

    $email = $_SESSION["email"];
    $password = $_SESSION["password"];

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
        
           
           $p1= $_GET['email'];
           $stmt1 = $conn1->prepare("DELETE FROM `manager_complain` WHERE memail=?");
                            $stmt1->bind_param("s", $p1);
                            
                            $status = $stmt1->execute();
                            if($status) {
                                $conn1->close();

                                header("Location: managercomplaints.php");
                            }
                            else {
                                echo "Failed to Delete Data.";
                                echo "<br>";
                                echo $conn1->error;
                            }
                        }
    ?>