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
        
           
           $id= $_GET['id'];
           

           
           $stmt1 = $conn1->prepare("SELECT * FROM `preorder_approvelist`WHERE id=?");
           
                $stmt1->bind_param("i", $id);

                $stmt1->execute();
                $res2 = $stmt1->get_result();
                $row = $res2->fetch_assoc();
                        

                $product_name =  $row['product_name'];
                $price =  $row['price'];
                $consumer_email =  $row['consumer_email'];
              

                
                $sql ="INSERT INTO `preorder_list` (`product_name`, `price`, `consumer_email`,`vendor_email`) VALUES ('".$product_name. "','".$price. "','".$consumer_email. "','".$email. "')";
                    if($conn1->query($sql)){
                      
                        $stmt1 = $conn1->prepare("DELETE FROM `preorder_approvelist` WHERE id=?");
                        $stmt1->bind_param("i", $id);
                        
                        $status = $stmt1->execute();


                           


		                }
		                else {
			                echo "Failed to Insert Data.";
			                echo "<br>";
			                echo $conn2->error;
		                }
                        

                            
                        


                        
                    }
                   
              
         

   

        
?>