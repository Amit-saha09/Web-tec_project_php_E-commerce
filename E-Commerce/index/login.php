<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

</head>
<body>

<?php include 'static_header.php'; ?>  
    <div class="menu">

<?php

    $email = $password = $emailErr = $passwordErr = "";
    $email1 = $password1 = "";
    $flag = 0;
    $userType = 0;
    $count = 0;
    

    if ($_SERVER["REQUEST_METHOD"] =="POST" )
    {
        if(empty($_POST['email'])) 

            {
                $emailErr = "Please Fill Up the Email";
            }
            else
            {
                $email = $_POST['email'];
                $count++;
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

            if ($count == 2)
            {
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
                    
                    $stmt1 = $conn1->prepare("select email, password, type from login where email=?");
                    $stmt1->bind_param("s", $email);
                    $stmt1->execute();
                    $res2 = $stmt1->get_result();
                    $user = $res2->fetch_assoc();


                    $email_02 = $user['email'];
                    $password_02 = $user['password'];
                    $userType = $user['type'];

                    if ($email == $email_02 && $password == $password_02)
                    {

                        echo "<br>";
                        echo "Login Successful!!!";

                        $flag = 1;

                    }

                    else
                    {
                        echo "<br>";
                        echo "Login Unsuccessful!!";
                    }


                    if ($flag>0)
                    {
                
                        $_SESSION['email'] = $email;
                        $_SESSION['password'] = $password;
                    
                        //echo "User Id is: " . $_SESSION['userId'];
                        //echo "<br>";
                        //echo "Password is: " . $_SESSION['password'];
                    }

                    $conn1->close();

                    if ($flag == 1)
                    {
                        if ($userType == 1)
                        {
                            header("Location: admin_home_page.php");
                        }
                        
                        if ($userType == 2)
                        {
                            header("Location: Manager_Homepage.php");
                        }
            
                        if ($userType == 3)
                        {
                            header("Location: vendor_home.php");
                        }
                        
                        if ($userType == 4)
                        {
                            header("Location: consumer_home.php");
                        }
                  
                       
            
                    }

              

                  

                }





            }

      

            
             
            
              
        
             
            
                
                
    }

            


    

        

  
?>

<form name="jsForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" onsubmit="return validate()" method="POST">

  
        <center>

        <img src="logo.png" alt="" height="200px" style="margin-top: 50px;">
        <i>
        <h2>User Login</h2>
            <br>
        <b> <p style="font-size: 16px;">Email</p>
        <br> <input type="text" name="email" value="" placeholder="Type Your Email" size="30px"><br>
        <p style="color:red"><?php echo $emailErr; ?></p>
            

        <br><b> <p style="font-size: 16px;">Password</p> <br> <input type="password" name="password" value="" placeholder="Type Password" size="30px">
        <p style="color:red"><?php echo $passwordErr; ?></p>
            
        <!-- <br> <br> <input type="submit" name="submit" value="Login" style="width: 80px; font-size:16px; height:45px">
        <button  onclick="location.href='consumer_vendor_signup.php'" style="width: 80px; font-size:16px; height:45px">Sign Up</button> -->
        <br>
        <input  class="button" type="submit" value="Login"></center></form>
        <center> <button class="button" onclick="location.href='consumer_vendor_signup.php'">Sign Up</button>
        <p id="errorMsg"></p>

    
        </center>

         </form>

  
     <script>

        function validate() {
                var isValid = false;
                var email    = document.forms["jsForm"]["email"].value;
				var password = document.forms["jsForm"]["password"].value;	
    
    
    
    
    


    if(email == ""||  password == "")
    {
        document.getElementById("errorMsg").innerHTML = "<b>Please fill up properly.</b>";
        document.getElementById("errorMsg").style.color = "red";
    }
    else 
    {
        isValid = true;
    }

    return isValid;
}

</script>

    
    
                     




<?php include 'static_footer.php'; ?>
    
</body>
</html>