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
        
        $firstNameErr = $lastNameErr = $emailErr = $passwordErr = $addressErr = $phoneErr = $dobErr = $genderErr = $managerTypeErr = $salaryErr= "";
        $firstName = $lastName = $email = $password = $address = $phone= $dob = $gender = $managerType =$salary= "";
        $count = 0;
        $userType = 2;
        $flag=0;

        $email=$_SESSION["memail"];
       
       
        
    
        $filepath = "manager_signup.txt";
        $f = fopen($filepath,'r') or die("fail to open file");
    
        while($row = fgets($f))
        {
    
           $json_decoded_text = json_decode($row, true);
    
           if($email == $json_decoded_text['email'])
           {
               $flag++;
               //$userType = $json_decoded_text['userType'];
              $firstName = $json_decoded_text['firstName'];
              $lastName = $json_decoded_text['lastName'];
              $email = $json_decoded_text['email'];
              $password = $json_decoded_text['password'];
              $address = $json_decoded_text['address'];
              $phone = $json_decoded_text['phone'];
              $dob = $json_decoded_text['dob'];
              $gender = $json_decoded_text['gender'];
              $vendorType = $json_decoded_text['managerType'];
              $salary = $json_decoded_text['salary'];
              
              fclose($f);
    
           }
    
           
       
       
        } 





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

            $managerType = $_POST['type'];

            if(empty($_POST['salary'])) 
            {
                $salaryErr = "Please Fill Up the salary";
            }
            else
            {
                $salary = $_POST['salary'];
                $count++;
            }



            $filepath = "manager_signup.txt";
            $f = fopen($filepath,'r') or die("fail to open file");
    
            $rowNumber = -1;
            while($row = fgets($f))
            {
    
                $json_decoded_text = json_decode($row, true);
    
                    $rowNumber++;
    
                    if($email == $json_decoded_text['email'])
                    {
                      fclose($f); 
                      break;
    
                    }
            }
         $row_number = $rowNumber;    // Number of the line we are deleting
        $file_out = file("manager_signup.txt"); // Read the whole file into an array

        //Delete the recorded line
        unset($file_out[$row_number]);

        //Recorded in a file
        file_put_contents("manager_signup.txt", implode("", $file_out));

        

        $filepath = "login.txt";
        $f = fopen($filepath,'r') or die("fail to open file");

        $rowNumber = -1;
        while($row = fgets($f))
        {

            $json_decoded_text = json_decode($row, true);

                $rowNumber++;

                if($email == $json_decoded_text['email'])
                {
                  fclose($f); 
                  break;

                }
        }
        $row_number = $rowNumber;    // Number of the line we are deleting
        $file_out = file("login.txt"); // Read the whole file into an array

        //Delete the recorded line
        unset($file_out[$row_number]);

        //Recorded in a file
        file_put_contents("login.txt", implode("", $file_out));
 


          

    

         


            
            
		    $arr1 = array('firstName' => $firstName, 'lastName' => $lastName, 'email' => $email,'password' => $password, 'address' => $address,'phone' => $phone,'dob' => $dob,'gender' => $gender, 'managerType' => $managerType,'salary'=>$salary, 'userType' => $userType);
		    $json_encoded_text =  json_encode($arr1); 
            $filepath = "manager_signup.txt";
            $f = fopen($filepath,'a');
            fwrite($f,$json_encoded_text);
            fwrite($f,"\n");
            fclose($f);

            $arr1 = array('email' => $email,'password' => $password, 'userType' => $userType);
		    $json_encoded_text =  json_encode($arr1); 
            $filepath = "login.txt";
            $f = fopen($filepath,'a');
            fwrite($f,$json_encoded_text);
            fwrite($f,"\n");
            fclose($f);

            echo "Registration Successful!!";


            

            header("Location: admin_manager_search.php");
            






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
                      <h2>Manager Registration</h2>
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
                            <input type="text" name="fname" value="<?php echo $firstName ?>" size="20px">
                            <p style="color:red"><?php echo $firstNameErr; ?></p>

                            <br>

                            <label for="lname">Last Name: </label>
                            <input type="text" name="lname" value="<?php echo $lastName ?>" size="20px" >
                            <p style="color:red"><?php echo $lastNameErr; ?></p>

                            <br>              

                            <label for="email">Email: </label>
                            <input type="email" name="email" id="" value="<?php echo $email ?>" size="20px" >
                            <p style="color:red"><?php echo $emailErr; ?></p>

                            <br>

                            <label for="password">Password: </label>
                            <input type="password" name="password" value="<?php echo $password ?>" size="20px">
                            <p style="color:red"><?php echo $passwordErr; ?></p>                   

                            <br>

                            <label for="address">Address: </label>
                            <input type="text" name="address" id="" value="<?php echo $address ?>" size="20px" >
                            <p style="color:red"><?php echo $addressErr; ?></p> 

                            <br>  

                            <label for="phone">Phone: </label>                   
                            <input type="tel" name="phone" placeholder="01XXXXXXXXX" pattern="[0]{1}[1]{1}[3-9]{1}[0-9]{8}" required value="<?php echo $phone ?>">
                            <p style="color:red"><?php echo $phoneErr; ?></p>

                            

                            <br>

                    

                            <label for="dob">DOB: </label>
                            <?php echo $dob ?>
                           
                            <br>

                            <label for="gender">Gender: </label>       
                            value="<?php echo $gender ?>


                         
                          
                            <br>

                            <label for="type">Manager Type</label>  

                            <select name="type" id="type" value="<?php echo $managerType ?>">
                            <option value="Technology">Technology</option>
                            <option value="Health">Health</option>
                            <option value="Beauty">Beauty</option>
                            </select>
                            <p style="color:red"><?php echo $managerTypeErr; ?></p>
                            <br>
                            <label for="salary">Salary: </label>       
                            <input type="number" name="salary" id="" value="<?php echo $salary ?>" size="20px" >
                            <p style="color:red"><?php echo $salaryErr; ?></p>
                            <br>
                        

                            
                            <!-- Input submit -->
                            <br>
                            <input  class="button" type="submit" value="Sign Up">
                            
                            <!-- <button class="button" onclick="location.href='login.php'">Login</button> -->



                            
                            




            








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