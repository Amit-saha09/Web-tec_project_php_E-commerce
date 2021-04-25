<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/vendor_signupstyle.css">
    <title>Vendor SignUp</title>
 

</head>
<?php include 'static_header.php'; ?>
<body >


  
    <?php
        
        $firstNameErr = $lastNameErr = $emailErr = $passwordErr = $addressErr = $phoneErr =$nidErr=$dobErr=$genderErr=$vendorTypeErr= $shopNameErr = "";
        $firstName = $lastName = $email = $password = $address = $phone = $nid = $dob = $gender = $vendorType = $shopName = "";
        $count = 0;
        $userType = 3;
        $flag = 0;
    
        
    
       
              
              
             
    
    if ($_SERVER["REQUEST_METHOD"] =="POST" ) 
    {
        if(empty($_POST['fname'])) 
        {
            $firstNameErr = "Please Fill Up the First Name";
        }
        else
        {
            $firstName = $_POST['fname'];
            $count++;
        }
    
        if(empty($_POST['lname'])) 
        {
            $lastNameErr = "Please Fill Up the Last Name";
        }
        else
        {
            $lastName = $_POST['lname'];
            $count++;
        }
    
        if(empty($_POST['email'])) 
        {
            $emailErr = "Please Fill Up the Email";
        }
        else
        {
            $email = $_POST['email'];
            $count++;
        }
    
        
    
        if(empty($_POST['address'])) 
        {
            $addressErr = "Please Fill Up the Adress";
        }
        else
        {
            $address = $_POST['address'];
            $count++;
        }
    
        if(empty($_POST['shopName'])) 
        {
            $shopNameErr = "Please Fill Up the Shop Name";
        }
        else
        {
            $shopName = $_POST['shopName'];
            $count++;
        }
    
        
        if(empty($_POST['phone'])) 
        {
            $phoneErr = "Please Fill Up the Phone";
        }
        else
        {
            $phone = $_POST['phone'];
            $count++;
        }
    
        if(empty($_POST['nid'])) 
        {
            $nidErr = "Please Fill Up the NID";
        }
        else
        {
            $nid = $_POST['nid'];
            $count++;
        }
    
        if (empty($_POST['dob']))
        {      
            $dobErr = "Please Fill Up the DOB";
    
        }
    
        else
        {
            $dob = $_POST['dob'];
            $count++;
        }
    
     
    
        if(isset($_POST['gender']))
        {
            $gender = $_POST['gender'];
            $count++;
            
            if ($gender == "Male")
            {
                $gender = "Male";
            }
            else
            {
                $gender = "Female";
            }
    
    
            
        }
    
    
        else {
            $genderErr = "Please Check the Gender";
        }
    
        $vendorType = $_POST['type'];
           
    
    
          
    
    
    
         
    
    
            if ($count >= 9)
            {
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
                else {
                    if($vendorType=="Technology"){
                    $mid=1;
                    }
                    else if($vendorType=="Health"){
                        $mid=2;
                    }
                    else{
                        $mid=3;
                    }

                    $sql ="INSERT INTO `vendor-reg-req` (`fname`, `lname`, `email`, `number`, `address`, `nid`, `dob`, `gender`, `vtype`, `shop_Name`, `manager_Id`) VALUES ('".$firstName. "','".$lastName. "','".$email. "','".$phone. "','".$address. "','".$nid. "','".$dob. "','".$gender. "','".$vendorType. "','".$shopName. "','".$mid. "')";
                    if($conn1->query($sql)){
                        echo "Data Insertion Successful.";
                        $conn1->close();
                         header("Location: login.php");
                    }
            
                    /*$sql = "INSERT INTO `vendor-reg-req`(`fname`, `lname`, `email`, `number`, `address`, `nid`, `dob`, `gender`, `vtype`, `shop_Name`, `manager_Id`) VALUES (`$firstName`,`$lastName`,`$email`,`$phone`,`$address`,$nid,`$dob`,`$gender`,`$vendorType`,`$shopName`,$mid)";
                    if($conn1->query($sql)) {
                        echo "Data Insertion Successful.";
                    }
                    else {
                        echo "Failed to Insert Data.";
                        echo "<br>";
                        echo $conn1->error;
                    }
                            
                        
                    }*/
                   /* $stmt1 = $conn1->prepare("insert into vendorreq (fname, lname, email, number, address, nid, dob, gender, vtype, shop_Name, manager_Id) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
                    $stmt1->bind_param("sssssissssi", $p1, $p2, $p3, $p5, $p6, $p7, $p8, $p9, $p10, $p11, $p12);
                    $p1 = $firstName;
		            $p2 = $lastName;
                    $p3 = $email;
                    $p5 = $phone;
                    $p6 = $address;
                    $p7 = $nid;
                    $p8 = $dob;
                    $p9 = $gender;
                    $p10 = $vendorType;
                    $p11 = $shopName;
                    $p12 = 1;
                    $status = $stmt1->execute();

                    if($status) {
                        echo "Data Insertion Successful.";
                    }
                    else {
                        echo "Failed to Insert Data.";
                        echo "<br>";
                        echo $conn1->error;
                    }
                    $conn1->close();*/
                }

           
          


          

    

         


           
            #header("Location: file-handling-login_03.php");

        }

    }


    ?>

<div class="container">
       <div class="box">
           <div class="row">
              <div class="col-3">
                  <div class="abc">
                  
                  </div>
              </div>
              <div class="col-6">
                  <div class="abc">
                  <a href="Manager_Homepage.php" ></a>
                  
                  <!-- <img class="logo" src="images/logo.png" alt="logo"> -->
                  <br>
                      <h2>Vendor Registration</h2>
                      <br>

                    </div>
              </div>
              <div class="col-3"> </div>
               
           </div>
           <div class="row">
              <div class="col-3"></div>
              <div class="col-6">
                  <div class="abc">
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">  

                            <label for="fname">First Name: </label>
                            <input type="text" name="fname" value="" placeholder="Type First Name" size="20px">
                            <p style="color:red"><?php echo $firstNameErr; ?></p>

                            <br>

                            <label for="lname">Last Name: </label>
                            <input type="text" name="lname" value="" placeholder="Type Last Name" size="20px" >
                            <p style="color:red"><?php echo $lastNameErr; ?></p>

                            <br>              

                            <label for="email">Email: </label>
                            <input type="email" name="email" id="" value="" placeholder="Type Your Email" size="20px" >
                            <p style="color:red"><?php echo $emailErr; ?></p>

                                            

                            <br>

                            <label for="address">Address: </label>
                            <input type="text" name="address" id="" value="" placeholder="Type Your Address" size="20px" >
                            <p style="color:red"><?php echo $addressErr; ?></p> 

                            <br>  


                            <label for="shopName">Shop Name: </label>
                            <input type="text" name="shopName" id="" value="" placeholder="Type Your Shop Name" size="20px" >
                            <p style="color:red"><?php echo $shopNameErr; ?></p>

                            <br>

                            <label for="phone">Phone: </label>                   
                            <input type="tel" name="phone" placeholder="01XXXXXXXXX" pattern="[0]{1}[1]{1}[3-9]{1}[0-9]{8}" required>
                            <p style="color:red"><?php echo $phoneErr; ?></p>

                            <br>

                            <label for="nid">NID: </label>
                            <input type="number" name="nid" id="" value="" placeholder="Type Your NID" size="20px" >
                            <p style="color:red"><?php echo $nidErr; ?></p>

                            <br>

                    

                            <label for="dob">DOB: </label>
                            <input type="date" name="dob" id="" value="" placeholder="" size="20px" >
                            <p style="color:red"><?php echo $dobErr; ?></p>

                            <br>

                            <label for="gender">Gender: </label>       
                            <input type="radio" name="gender" value="Male">  Male 
                            <input type="radio" name="gender" value="Female" > Female
                            <p style="color:red"><?php echo $genderErr; ?></p>


                         
                          
                            <br>

                            <label for="type">Vendor Type</label>  

                            <select name="type" id="type">
                            <option value="Technology">Technology</option>
                            <option value="Health">Health</option>
                            <option value="Beauty">Beauty</option>
                            </select>
                            <p style="color:red"><?php echo $vendorTypeErr; ?></p>
                        

                            
                            <!-- Input submit -->
                            <br>
                            <input  class="button" type="submit" value="Sign Up">
                            <button class="button" onclick="location.href='login.php'">Login</button>



                            
                            




            








                        </form>
                  </div>
              </div>
              <div class="col-3"></div>
               
           </div>
       </div>
       <?php include 'static_footer.php'; ?>
    </div>
    
</body>
</html>