
<?php
session_start();
?>

<Doctype html>
<html>

<head>
    
    <title>Manager Profile page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/vendor_profilestyle.css">


</head>

<body>

<?php
    error_reporting(E_ERROR | E_PARSE);
    $firstNameErr = $lastNameErr = $emailErr = $passwordErr = $addressErr = $phoneErr = $dobErr = $genderErr = $managerTypeErr = $salaryErr= "";
    $firstName = $lastName = $email = $password = $address = $phone= $dob = $gender = $managerType =$salary= "";
    $count = 0;
    $userType = 2;
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
    
        
        
        $stmt1 = $conn1->prepare("select * from manager where email=?");
        $stmt1->bind_param("s", $email);
        $stmt1->execute();
        $res2 = $stmt1->get_result();
        $user = $res2->fetch_assoc();

        $email_02 = $row['email'];

        

        if ($email == $email_02)
        {  
            // $firstName = $row['fname'];
            // $lastName = $row['lname'];
            $email = $row['email'];
            // $password = $row['password'];
            // $address = $row['address'];
            // $phone = $row['number']; 
            // $gender = $row['gender'];
            // $salary=$row['salary'];
            // $dob = $row['dob'];
            $balance=$row['balance'];
          
            
     
            
        }

          


      
    }

     
   

    if ($_SERVER["REQUEST_METHOD"] =="POST" ) 
    {
        // if(empty($_POST['fname'])) 
        // {
        //     $firstNameErr = "Please Fill Up the First Name";
        // }
        // else
        // {$firstName = $_POST['fname'];
        //     $count++;

        //     if (!preg_match("/^[a-zA-Z-' ]*$/",$firstName))
        //     {
        //         $firstNameErr = "Invalid Name!";
        //         $count--;
        //     } 
        // }

        // if(empty($_POST['lname'])) 
        // {
        //     $lastNameErr = "Please Fill Up the Last Name";
        // }
        // else
        // {   $lastName = $_POST['lname'];
        //     $count++;

        //     if (!preg_match("/^[a-zA-Z-' ]*$/",$lastName)) 
        //     {
        //         $lastNameErr = "Invalid Name!";
        //         $count--;
        //     }
        // }

     

        // if(empty($_POST['password'])) 
        // {
        //     $passwordErr = "Please Fill Up the Password";
        // }
        // else
        // {
        //     $password = $_POST['password'];
        //     $count++;
        // }

        // if(empty($_POST['address'])) 
        // {
        //     $addressErr = "Please Fill Up the Adress";
        // }
        // else
        // {
        //     $address = $_POST['address'];
        //     $count++;
        // }

        

        
        // if(empty($_POST['phone'])) 
        // {
        //     $phoneErr = "Please Fill Up the Phone";
        // }
        // else
        // {
        //     $phone = $_POST['phone'];
        //     $count++;
        // }

        // if(empty($_POST['salary'])) 
        // {
        //     $salaryErr = "Please Fill Up the balance";
        // }
        // else
        // {
        //     $salary = $_POST['salary'];
        //     $count++;
        // }

    if(empty($_POST['balance'])) 
        {
            $balanceErr = "Please Fill Up the balance";
        }
        else
        {
            $balance = $_POST['balance'];
            $count++;
        }


        if ($count >= 1)
        {

            
          

            $stmt1 = $conn1->prepare("update manager set balance=? where email=?");
            $stmt1->bind_param("is", $balance,$email);
            $status = $stmt1->execute();
            
            
            
            $conn1->close();
            

            

            
        

      

        

            header("Location: logout.php");

        }
    }
                
    
                
            
           
    



?>
<?php $email=$_GET['email'];
    ?>







  <?php include("static_header.php")
    ?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
    <div class="container">
       <div class="box">
           <div class="row">
              <div class="col-3">
                  <div class="abc">
                  <a href="vendor_home.php" ></a>
                  </div>
              </div>
              <div class="col-6">
                  <div class="abc"><h2>Consumer Profile</h2></div>
              </div>
              <div class="col-3">
                    <a href="vendor_home.php">
                  <div class="abc"><img class="profilepic" src="images/profile.png" alt="pic"></div>
                  </a>
              </div>
               
           </div>
           <div class="row">
              <div class="col-3"></div>
              <div class="col-6">
                  <div class="abc">

                     <input type="Hidden" name="email" value="<?php echo $email; ?>">
                     
                      Email: <?php echo $email ?>
                      <p style="color:red"><?php echo $emailErr; ?></p>
                      <br><br>


                    <label for="balance">Balance: </label>
                    <input type="text" name="balance" id="" value="" placeholder="Type balance" size="20px" >
                    <p style="color:red"><?php echo $balanceErr; ?></p>

                    <br>
 

                      
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