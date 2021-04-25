<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/vendor_signupstyle.css">
    <title>Manager SignUp</title>

    <script>
			function validate() {
				var isValid = false;
				var fname = document.forms["jsForm"]["fname"].value;
				var lname = document.forms["jsForm"]["lname"].value;
                var email = document.forms["jsForm"]["email"].value;
				var password = document.forms["jsForm"]["password"].value;
                var phone = document.forms["jsForm"]["phone"].value;
				var address = document.forms["jsForm"]["address"].value;
                var dob = document.forms["jsForm"]["dob"].value;
                var gender = document.forms["jsForm"]["gender"].value;
                var type = document.forms["jsForm"]["type"].value;
				var salary = document.forms["jsForm"]["salary"].value;
				var balance = document.forms["jsForm"]["balance"].value;
				
			
				
				


				if(fname == "" || lname == ""|| email == ""|| password == ""|| phone == ""|| address == "" || dob == ""|| gender == ""|| type ==""|| salary == ""|| balance=="") {
					document.getElementById("errorMsg").innerHTML = "<b> Fill up the Form Properly.</b>";
					document.getElementById("errorMsg").style.color = "blue";
				}
				else {
					isValid = true;
				}

				return isValid;
			}
		</script> 


    
 

</head>
<?php include 'static_header.php'; ?>
<body >


  
    <?php
        
        $firstNameErr = $lastNameErr = $emailErr = $passwordErr = $addressErr = $phoneErr = $dobErr = $genderErr = $managerTypeErr = $salaryErr =$balanceErr="";
        $firstName = $lastName = $email = $password = $address = $phone = $dob = $gender = $managerType = $salary =$balance= "";
        $count = 0;
        $userType = 2;
        $insert_flag = 0;

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

                if (!preg_match("/^[a-zA-Z-' ]*$/",$firstName))
            {
                $firstNameErr = "Invalid Name!";
            } 

               
            }

            if(empty($_POST['lname'])) 
            {
                $lastNameErr = "Please Fill Up the Last Name";
            }
            else
            {
                $lastName = $_POST['lname'];
                $count++;
                if (!preg_match("/^[a-zA-Z-' ]*$/",$lastName)) 
            {
                $lastNameErr = "Invalid Name!";
            }

                
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

            if(empty($_POST['salary'])) 
            {
                $salaryErr = "Please Fill Up the salary Name";
            }
            else
            {
                $salary = $_POST['salary'];
                $count++;

                
            }

            if(empty($_POST['balance'])) 
            {
                $salaryErr = "Please Fill Up the Balance";
            }
            else
            {
                $balance = $_POST['balance'];
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
           


          

    

         


            if ($count >=9)
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

		            echo "Database Connection Successful!";
                    
		            $stmt1 = $conn1->prepare("insert into manager (fname, lname, email, password, number, address, dob, gender, type, salary,balance, admin_Id)
                     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?)");
		            $stmt1->bind_param("sssssssssiii", $p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10,$p11,$p12);
		            $p1 = $firstName;
		            $p2 = $lastName;
                    $p3 = $email;
                    $p4 = $password;
                    $p5 = $phone;
                    $p6 = $address;
                    $p7 = $dob;
                    $p8 = $gender;
                    $p9 = $managerType;
                    $p10 = $salary;
                    $p11=$balance;
                    $p12 = 1;
		            $status = $stmt1->execute();

		            if($status) {
			            echo "Data Insertion Successful.";
                        $insert_flag = 1;
		            }
		            else {
			            echo "Failed to Insert Data.";
			            echo "<br>";
			            echo $conn1->error;
		            }
	            }

	            $conn1->close();

                //echo "Registration Successful!!";

                if ($insert_flag == 1)

                {

                    // Mysqli object-oriented
	                $conn2 = new mysqli($host, $user, $pass, $db);

	                if($conn2->connect_error) {
		            echo "Database Connection Failed!";
		            echo "<br>";
		            echo $conn2->connect_error;
	                }

	                else {

		                //echo "Database Connection Successful!";
		                $stmt2 = $conn2->prepare("insert into login (email, password, type) VALUES (?, ?, ?)");
		                $stmt2->bind_param("ssi", $p1, $p2, $p3);
		                $p1 = $email;
		                $p2 = $password;
                        $p3 = 2;
		                $status = $stmt2->execute();

		                if($status) {
			                echo "Data Insertion Successful.";
		                }
		                else {
			                echo "Failed to Insert Data.";
			                echo "<br>";
			                echo $conn2->error;
		                }
	                }

	                $conn2->close();



                }


	            


            }

            header("Location: manager_list.php");

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
                  <form name="jsForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" onsubmit="return validate()" method="POST">

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


                            <label for="salary">Salary: </label>
                            <input type="text" name="salary" id="" value="" placeholder="Type salary" size="20px" >
                            <p style="color:red"><?php echo $salaryErr; ?></p>

                            <br>


                            <label for="balance">Balance: </label>
                            <input type="text" name="balance" id="" value="" placeholder="Type balance" size="20px" >
                            <p style="color:red"><?php echo $balanceErr; ?></p>

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

                            <select name="type" id="type" >
                            <option value="Technology">Technology</option>
                            <option value="Health">Health</option>
                            <option value="Beauty">Beauty</option>
                            </select>
                            <p style="color:red"><?php echo $managerTypeErr; ?></p>
                        

                            
                            <!-- Input submit -->
                            <br>
                            <input  class="button" type="submit" value="ADD">
                            <p id="errorMsg"></p>
                            <!-- <button class="button" onclick="location.href='login.php'">Login</button> -->

                        <!-- </form> -->
                  </div>
              </div>
              <div class="col-3"></div>
               
           </div>
       </div>
       <?php include 'static_footer.php'; ?>
    </div>
    </form>


   
</body>
</html>