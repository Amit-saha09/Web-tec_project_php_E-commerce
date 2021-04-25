<?php
session_start();
$_SESSION['id']=1;
    error_reporting(E_ERROR | E_PARSE);
   

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
        
           
           $id= (int)$_GET['id'];
           $stmt1 = $conn1->prepare("DELETE FROM `preorder_approvelist` WHERE id=?");
                            $stmt1->bind_param("i", $id);
                            
                            $status = $stmt1->execute();
                            if($status) {
                                $conn1->close();

                                header("Location: vendor_home.php");
                            }
                            else {
                                echo "Failed to Delete Data.";
                                echo "<br>";
                                echo $conn1->error;
                            }
                        }
    ?>