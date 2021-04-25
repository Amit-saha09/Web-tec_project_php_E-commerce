<?php
session_start();
$consumer_email= $_SESSION['email'];
$price=0;
              
              $host = "localhost";
              $user = "wt_projectuser";
              $pass = "123";
              $db = "wt_project";

              // Mysqli object-oriented
              $conn1 = new mysqli($host, $user, $pass, $db);

              if($conn1->connect_error) {
                echo "Database Connection Failed!";
                echo "<br>";
                echo $conn1->connect_error;
              }
              else
              {   
                  $sql = "SELECT * FROM cart WHERE consumer_email='".$consumer_email."'";
                  $res1 = $conn1 -> query($sql);

                  if($res1->num_rows > 0) {
                  while($row = $res1->fetch_assoc())
                  {
                      $price=$price + ($row['price'] * $row['quantity']);
                  }
                 
              }
                    $randomNumber=rand(100000,5000000);
                    $invoice=$consumer_email."$randomNumber";
                    echo $invoice;
                    $stmt2 = $conn1->prepare("insert into sell (id, price, consumer_email) VALUES ( ?, ?, ?)");
                    $stmt2->bind_param("sis",$invoice, $price, $consumer_email);
                    $stmt2->execute();

                    $sql = "SELECT * FROM cart WHERE consumer_email='".$consumer_email."'";
                  $res1 = $conn1 -> query($sql);

                  if($res1->num_rows > 0) {
                  while($row = $res1->fetch_assoc())
                  {
                    $stmt2 = $conn1->prepare("insert into sell_table (sell_Id, product_name, price, quantity, consumer_email, vendor_email) VALUES ( ?, ?, ?,?,?,?)");
                    $stmt2->bind_param("ssisss",$invoice, $row['product_name'],$row['price'], $row['quantity'],$consumer_email, $row['vendor_email'] );
                    $stmt2->execute();

                    $stmt1 = $conn1->prepare("select balance from vendor where email=? ");
                    $stmt1->bind_param("s", $row['vendor_email']);

                    $stmt1->execute();
                    $res2 = $stmt1->get_result();
                    $row1 = $res2->fetch_assoc();

                    $balance=$row1['balance']+ ($row['price']*$row['quantity']);

                    $stmt2 = $conn1->prepare("update vendor SET balance=? where email=?");
                    $stmt2->bind_param("is", $balance, $row['vendor_email']);
                    $status = $stmt2->execute();

                    //quantity
                    $stmt1 = $conn1->prepare("select quantity from product where name=?");
                    $stmt1->bind_param("s", $row['product_name']);

                    $stmt1->execute();
                    $res2 = $stmt1->get_result();
                    $row1 = $res2->fetch_assoc();

                    $quantity=(int)($row1['quantity']-$row['quantity']);
                    echo $quantity;

                    $stmt2 = $conn1->prepare("update product SET quantity=? where name=?");
                    $stmt2->bind_param("is", $quantity, $row['product_name']);
                    $status = $stmt2->execute();


                    $stmt1 = $conn1->prepare("DELETE FROM `cart` WHERE consumer_email=?");
                            $stmt1->bind_param("s", $consumer_email);
                            
                            $status = $stmt1->execute();

                  }
                }

                header("Location:.php?invoice=$invoice");
            }




?>

