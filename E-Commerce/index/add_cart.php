<?php
session_start();
$consumer_Email=$_SESSION['email'];
$vendor_Id=$_GET['vendorid'];
$product_Price=$_GET['price'];
$product_name=$_GET['name'];
$quantity=$_GET['quantity'];

            if($quantity>0)
            {

                $quantity--;
                $quantity_cart=1;



                $host = "localhost";
                $user = "wt_projectuser";
                $pass = "123";
                $db = "wt_project";

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

                    //echo "Database Connection Successful!";
                    
                    $stmt1 = $conn1->prepare("select email from vendor where id=?");
                    $stmt1->bind_param("i", $vendor_Id);
                    $stmt1->execute();
                    $res2 = $stmt1->get_result();
                    $user = $res2->fetch_assoc();

                    $vendorEmail = $user['email'];

                    // $stmt1 = $conn1->prepare("select product_name from cart where product_name=? and consumer_email=?");
                    // $stmt1->bind_param("ss",$product_name, $consumer_Email);

                   
                    $sql = "SELECT product_name FROM cart WHERE product_name='".$product_name."' and vendor_email='".$vendorEmail."'"; 
                    $result = $conn1 -> query($sql);
                    if($result -> num_rows > 0) {



                    // $status = $stmt1->execute();
                    // if($status-> num_rows > 0)

                    echo"This product already added";}

                    else
                    {

 
                    $stmt2 = $conn1->prepare("insert into cart (product_name, price, quantity, consumer_email, vendor_email) VALUES ( ?, ?, ?, ?, ?)");
                    $stmt2->bind_param("siiss",$product_name, $product_Price, $quantity_cart, $consumer_Email, $vendorEmail);
                    $stmt2->execute();
                    header("Location: static.php");

                    
                    }


                    

                    //echo $vendorEmail; 

                }

              
              

              }
              else
              {
                echo "quantity is less than 1";
              }



?> 