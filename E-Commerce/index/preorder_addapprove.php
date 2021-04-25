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
        
           
           $name= $_GET['name'];
           

           
                $stmt1 = $conn1->prepare("SELECT * FROM `preorder_product`WHERE name=?");
           
                $stmt1->bind_param("s", $name);

                $stmt1->execute();
                $res2 = $stmt1->get_result();
                $row = $res2->fetch_assoc();
                        

                $name =  $row['name'];
                $id =  $row['id'];
                $quantity =  $row['quantity'];
                $price =  $row['price'];
                $type =  $row['type'];
                $vendor_Id =  $row['vendor_Id'];


                $stmt1 = $conn1->prepare("select email from vendor where id=?");
                $stmt1->bind_param("s", $vendor_Id);
                $stmt1->execute();
                $res2 = $stmt1->get_result();
                $user = $res2->fetch_assoc();    
                $vendor_email = $user['email'];

                
                $sql ="INSERT INTO `preorder_approvelist` (`product_name`, `price`, `consumer_email`,`vendor_email`) VALUES ('".$name. "','".$price. "','".$email. "','".$vendor_email. "')";
                    if($conn1->query($sql)){
                        
                            
		                
                        header("Location: consumer_home.php");


                           


		                }

		            else {
			                echo "Failed to Insert Data.";
			                echo "<br>";
			                echo $conn2->error;
		                }
                        

                            
                        


        }

   

        
?>