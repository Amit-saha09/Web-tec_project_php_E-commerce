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
           

           
           $stmt1 = $conn1->prepare("SELECT * FROM `vendor-reg-req`WHERE email=?");
           
                $stmt1->bind_param("s", $p1);

                $stmt1->execute();
                $res2 = $stmt1->get_result();
                $row = $res2->fetch_assoc();
                        

                $firstName =  $row['fname'];
                $lastName =  $row['lname'];
                $email =  $row['email'];
                $password =  "123";
                $address =  $row['address'];
                $phone =  $row['number'];
                $nid =  $row['nid'];
                $dob =  $row['dob'];
                $gender =  $row['gender'];
                $vendorType =  $row['vtype'];
                $shopName =  $row['shop_Name'];
                $mid=$_SESSION['id'];

                
                $sql ="INSERT INTO `vendor` (`fname`, `lname`, `email`,`password`, `number`, `address`, `nid`, `dob`, `gender`, `vtype`, `shop_Name`, `manager_Id`) VALUES ('".$firstName. "','".$lastName. "','".$email. "','".$password. "','".$phone. "','".$address. "','".$nid. "','".$dob. "','".$gender. "','".$vendorType. "','".$shopName. "','".$mid. "')";
                    if($conn1->query($sql)){
                        $to_email = "dummy01625@gmail.com";
                            $subject = "Account Approved";
                            $body = "you are approved. your password is:".$password." . thank you." ;


                            $headers = "Amader Bazar";

                            if (mail($to_email, $subject, $body, $headers)) {
                                echo "check.";
                            } else {
                                echo "Email sending failed...";
                            }
                            $typ=3;
                            $stmt2 = $conn1->prepare("insert into login (email, password, type) VALUES (?, ?, ?)");
                            $stmt2->bind_param("ssi",$email, $password, $typ);
                           # $sql ="INSERT INTO `login` (`email`, `password`, `type`) VALUES ('".$email. "','".$password. "','".$typ. "')";
                           $status = $stmt2->execute();

		                if($status) {
			                echo "Data Insertion Successful.";
                            $stmt1 = $conn1->prepare("DELETE FROM `vendor-reg-req` WHERE email=?");
                            $stmt1->bind_param("s", $p1);
                            
                            $status = $stmt1->execute();
                            if($status) {
                                $conn1->close();

                                header("Location: vendor_approve.php");
                            }
                            else {
                                echo "Failed to Delete Data.";
                                echo "<br>";
                                echo $conn1->error;
                            }



                           


		                }
		                else {
			                echo "Failed to Insert Data.";
			                echo "<br>";
			                echo $conn2->error;
		                }
                        

                            
                        


                        
                    }
                    else{
                        echo "abc";
                    }
              
         }

   

        
?>