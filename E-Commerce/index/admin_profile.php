<?php
session_start();
?>

<Doctype html>
<html>

<head>
    
    <title>Admin Profile page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/vendor_profilestyle.css">


</head>

<body>

<?php
    error_reporting(E_ERROR | E_PARSE);
    $firstNameErr = $lastNameErr = $emailErr = $passwordErr = $addressErr = $phoneErr = $shopNameErr = "";
    $firstName = $lastName = $email = $password = $address = $phone = $nid = $dob = $gender = "";
    $count = 0;
    $userType = 1;
    $flag = 0;

    $email = $_SESSION["email"];
    $password = $_SESSION["password"];
    

    $host = "localhost";
    $user = "wt_projectuser";
    $pass = "123";
    $db = "wt_project";

    
    $conn1 = new mysqli($host, $user, $pass, $db);
    if($conn1->connect_error)
    {
        echo "Database Connection Failed!";
        echo "<br>";
        echo $conn1->connect_error;
    }

    else
    {
    
        
        
        $stmt1 = $conn1->prepare("select * from admin where email=?");
        $stmt1->bind_param("s", $email);
        $stmt1->execute();
        $res2 = $stmt1->get_result();
        $user = $res2->fetch_assoc();

        $email_02 = $user['email'];

        

        if ($email == $email_02)
        {  
            $firstName = $user['fname'];
            $lastName = $user['lname'];
            $email = $user['email'];
            $phone = $user['number'];
            $address = $user['address'];
            $dob = $user['dob']; 
            $gender = $user['gender'];
            $password = $user['password'];
           
            
     
            
        }

          


      
    }

     
   

    if ($_SERVER["REQUEST_METHOD"] =="POST" ) 
    {
        if(empty($_POST['fname'])) 
        {
            $firstNameErr = "Please Fill Up the First Name";
        }
        else
        {$firstName = $_POST['fname'];
            $count++;

            if (!preg_match("/^[a-zA-Z-' ]*$/",$firstName))
            {
                $firstNameErr = "Invalid Name!";
                $count--;
            } 
        }

        if(empty($_POST['lname'])) 
        {
            $lastNameErr = "Please Fill Up the Last Name";
        }
        else
        {   $lastName = $_POST['lname'];
            $count++;

            if (!preg_match("/^[a-zA-Z-' ]*$/",$lastName)) 
            {
                $lastNameErr = "Invalid Name!";
                $count--;
            }
        }

     

        if(empty($_POST['password'])) 
        {
            $passwordErr = "Please Fill Up the Password";
        }
        else
        {
            $password = $_POST['password'];
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

        

        
        if(empty($_POST['phone'])) 
        {
            $phoneErr = "Please Fill Up the Phone";
        }
        else
        {
            $phone = $_POST['phone'];
            $count++;
        }

       


        if ($count >= 5)
        {

            
          

            $stmt1 = $conn1->prepare("update admin set fname=?, lname=?, number=?, address=?, password=? where email=?");
            $stmt1->bind_param("ssssss", $firstName, $lastName, $phone, $address,$password, $email);
            $status = $stmt1->execute();
            
            if ($status)
            {
                $stmt1 = $conn1->prepare("update login set password=? where email=?");
                $stmt1->bind_param("ss", $password, $email);
                $status = $stmt1->execute();



                echo "Information Updated Successfully";
            }
    
            
            $conn1->close();
            

            

            
        

      

        

            header("Location: logout.php");

        }
                
    }
                
            
           





?>







  <?php include("static_header.php")
    ?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
    <div class="container">
       <div class="box">
           <div class="row">
              <div class="col-3">
                  <div class="abc">
                  <a href="admin_home.php" ></a>
                  </div>
              </div>
              <div class="col-6">
                  <div class="abc"><h2>Admin Profile</h2></div>
              </div>
              <div class="col-3">
                    <a href="admin_home.php">
                  <div class="abc"><img class="profilepic" src="images/profile.png" alt="pic"></div>
                  </a>
              </div>
               
           </div>
           <div class="row">
              <div class="col-3"></div>
              <div class="col-6">
                  <div class="abc">
                      First Name: <input type="text" name="fname"  placeholder="Type First Name" size="20px" value="<?php echo $firstName ?>">
                      <p style="color:red"><?php echo $firstNameErr; ?></p>
                      <br><br>
                      Last Name: <input type="text" name="lname"  placeholder="Type Last Name" size="20px" value="<?php echo $lastName ?>">
                      <p style="color:red"><?php echo $lastNameErr; ?></p>
                      <br><br>
                      Email: <?php echo $email ?>
                      <p style="color:red"><?php echo $emailErr; ?></p>
                      <br><br>
                      Password: <input type="password" name="password"  placeholder="Type Password" size="20px" value="<?php echo $password ?>">
                      <p style="color:red"><?php echo $passwordErr; ?></p>
                      <br><br>
                      Address: <input type="text" name="address" id=""  placeholder="Type Your Address" size="20px" value="<?php echo $address ?>">
                      <p style="color:red"><?php echo $addressErr; ?></p> 
                      <br><br>
                    
                      Phone: <input type="tel" name="phone" placeholder="01XXXXXXXXX" pattern="[0]{1}[1]{1}[3-9]{1}[0-9]{8}" required value="<?php echo $phone ?>">
                      <p style="color:red"><?php echo $phoneErr; ?></p>
                      
                      
                      
                      <br><br>
                      Date of Birth: <?php echo $dob ?>
                      
                      <br><br>
                  
                      <label for="gender"> Gender:  </label>       
                      <?php echo $gender ?>
                      <br><br>

                     
                  
                     

                      
                      <br>
                      <button class="button" type="submit">Update</button>
                     
                  </div>
                  
              </div>
              <div class="col-3"></div>
             
               
           </div>
       </div>
       <?php include('static_footer.php')
        ?>
    </div>
</form>


</body>


</html>