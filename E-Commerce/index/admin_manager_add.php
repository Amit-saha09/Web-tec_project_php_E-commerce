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


            

            #header("Location: file-handling-login_03.php");
            






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

                            <label for="password">Password: </label>
                            <input type="password" name="password" value="" placeholder="Type Password" size="20px">
                            <p style="color:red"><?php echo $passwordErr; ?></p>                   

                            <br>

                            <label for="address">Address: </label>
                            <input type="text" name="address" id="" value="" placeholder="Type Your Address" size="20px" >
                            <p style="color:red"><?php echo $addressErr; ?></p> 

                            <br>  

                            <label for="phone">Phone: </label>                   
                            <input type="tel" name="phone" placeholder="01XXXXXXXXX" pattern="[0]{1}[1]{1}[3-9]{1}[0-9]{8}" required>
                            <p style="color:red"><?php echo $phoneErr; ?></p>

                            

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

                            <label for="type">Manager Type</label>  

                            <select name="type" id="type">
                            <option value="Technology">Technology</option>
                            <option value="Health">Health</option>
                            <option value="Beauty">Beauty</option>
                            </select>
                            <p style="color:red"><?php echo $managerTypeErr; ?></p>
                            <br>
                            <label for="salary">Salary: </label>       
                            <input type="number" name="salary" id="" value="" placeholder="0000" size="20px" >
                            <p style="color:red"><?php echo $salaryErr; ?></p>
                            <br>
                        

                            
                            <!-- Input submit -->
                            <br>
                            <input  class="button" type="submit" value="Update">
                            
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