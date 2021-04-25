<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/vendor_signupstyle.css">
    <title>Manager  Registration</title>
 

</head>
<?php include 'static_header.php'; ?>
<body >


  
    <?php
        
        $nameErr="";
        $name="";
       
       
       
        
    
       




        if ($_SERVER["REQUEST_METHOD"] =="POST" ) 
        {
            

            if(empty($_POST['email'])) 
            {
                $emailErr = "Please Fill Up the Email";
            }
            else
            {
                $email = $_POST['email'];
               
            }

            $filepath = "manager_signup.txt";
            $f = fopen($filepath,'r') or die("fail to open file");
        
            while($row = fgets($f))
            {
        
               $json_decoded_text = json_decode($row, true);
        
               if($email == $json_decoded_text['email'])
               {
                $_SESSION["memail"]=$email;

                  
                  fclose($f);

                 echo"found";
                 break;
        
               }
        
               
           
           
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
                      <h2>Manager Search</h2>
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

                           
                            <label for="Manager">Manager User Name: </label>
                            <input type="email" name="email" id="" value="" placeholder="Type Your Email" size="20px" >
                            <p style="color:red"><?php echo $nameErr; ?></p>
                            
                            <input  class="button" type="submit" value="Search">
                            
                            <!-- <button class="button" onclick="location.href='login.php'">Login</button> -->



                            
                            




            








                        </form>

                        <button class="button" onclick="location.href='admin_manager_update_remove.php'">Update</button>
                        <button class="button" onclick="location.href='admin_manager_delete.php'">Delete</button>
                  </div>
              </div>
              <div class="col-3"></div>
               
           </div>
       </div>
       <?php include 'static_footer.php'; ?>
    </div>
    
</body>
</html>