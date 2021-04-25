<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/Consumer_Sign_up_style.css">

	<title>Consumer Registration</title>
    
</head>
<body>

<?php include 'static_header.php'; ?>	

	<?php
		$firstNameErr = $lastNameErr = $genderErr= $emailErr = $phoneErr=$birthdayErr= $passwordErr=$addressErr="";
		$consumer_ID = "";
        $firstName = ""; 
		$lastName = ""; 
        $email="";
        $password="";
		$gender="";
        $birthday="";
        $phone="";
        $address="";
        $userType = 4;
        $insert_flag = 0;
        $count=0;



		   if($_SERVER["REQUEST_METHOD"] == "POST") {
			if(empty($_POST['fname'])) 
            {
                $firstNameErr = "Please Fill Up the First Name";
            }
            else
            {
                $firstName = $_POST['fname'];
                $count++;

                if (!preg_match("/^[a-zA-Z-' ]*$/", $firstName))
                {
                    $firstNameErr = "Invalid Name. Only letters and white space allowed!";
                    $count--;
                } 
            }




			if(empty($_POST['lname'])) {
				$lastNameErr = "Please fill up the last name properly";
			}
			else
             {
				$lastName = $_POST['lname'];
                $count++;

                if (!preg_match("/^[a-zA-Z-' ]*$/", $lastName))
                {
                    $lastNameErr = "Invalid Name. Only letters and white space allowed!";
                    $count--;
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

                if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    $emailErr = "Invalid Email!";
                    $count--;
                }
            }
            




            if(empty($_POST['pass'])) {
				$passwordErr = "Please fill up the Password properly";
			}
			else {
				$password = $_POST['pass'];
                $count++;
			}
           
            
            if(isset($_POST['gender']))
            {
                $gender = $_POST['gender'];
                $count++;
              
                
                if ($gender == "male")
                {
                    $gender = "male";

                }
                else if($gender == "female")
                {
                    $gender = "female";
                }
                else
                {
                    $gender="other";
                }
            }


            if(empty($_POST['birthdaytime'])) {
				$birthdayErr = "Please fill up the last birthdaydate properly";
			}
			else {
				$birthday = $_POST['birthdaytime'];
                $count++;
			}

            
            if(empty($_POST['phone'])) {
				$phoneErr = "Please fill up the last phone number properly";
			}
			else {
				$phone = $_POST['phone'];
                $count++;
			}

            if(empty($_POST['address'])) {
				$addressErr = "Please fill up the address properly";
			}
			else {
				$address = $_POST['address'];
                $count++;
			}



            

           

            if($count==8){

          
                
                $host = "localhost";
                $user = "wt_projectuser";
                $pass = "123";
                $db = "wt_project";
            
            
                $conn = mysqli_connect($host, $user, $pass, $db);
                if(mysqli_connect_error()) {
                    echo "Database Connection Failed!";
                    echo "<br>";
                    echo $conn ->connect_error;
                }
                else {
            
                    echo "Database Connection Successful!";
                    $stmt1 = $conn->prepare("insert into consumer (fname, lname, email,  password, gender, dob, number, address ) VALUES ( ?, ?, ?, ?, ?, ?, ? , ?)");
                    $stmt1->bind_param("ssssssss",$p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8);
                    $p1 = $firstName;
		            $p2 = $lastName;
                    $p3 = $email;
                    $p4 = $password;
                    $p5 = $gender; $password;
                    $p6 = $birthday;
                    $p7 = $phone;
                    $p8 = $address;
                    
                   
                    $status = $stmt1->execute();
            
                    if($status) {
                        echo "Data Insert Successful!";
                        $insert_flag = 1;


                        header("Location: login.php");  
                    }
                    else {
                        echo "Failed to Insert Data";
                        echo "<br>";
                        echo $conn->error;
                    }
                }
            
            
                $conn->close();

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

		                echo "Database Connection Successful!";
		                $stmt2 = $conn2->prepare("insert into login (email, password, type) VALUES (?, ?, ?)");
		                $stmt2->bind_param("ssi", $p1, $p2, $p3);
		                $p1 = $email;
		                $p2 = $password;
                        $p3 = 4;
		                $status = $stmt2->execute();

		                if($status) {
			                echo "Data Insertion Successful.";
		                }
		                else {
			                echo "Failed to Insert.";
			                echo "<br>";
			                echo $conn2->error;
		                }
	                }

	                $conn2->close();
                






                    
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
                      <h1>Consumer Registration</h1>
                    </div>
              </div>
              <div class="col-3"> </div>
               
            </div>
            <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
            <div class="abc">
                  <form name="jsForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" onsubmit="return validate()" method="POST">
                            
                            <!-- Input Text Field -->
                            <label for="fname">First Name: </label>
                            <input type="text" name="fname" id="fname" value="<?php echo $firstName; ?>"> 
                            <p style="color:red"><?php echo $firstNameErr; ?></p>

                            <br>

                            <label for="lname">Last Name: </label>
                            <input type="text" name="lname" id="lname" value="<?php echo $lastName ?>">
                            <p style="color:red"><?php echo $lastNameErr; ?></p>
                            
                            <br>
                            <label for="gender">Gender: </label>
                            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
                            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
                            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
                            <span class="error">* <?php echo $genderErr;?></span>
                            <br>
                            <br>

                            
                            
                            <br>

                            <label for="email">Email: </label>
                            <input type="email" name="email" id="email" value="<?php echo $email ?>">
                            <p style="color:red"><?php echo $emailErr; ?></p>
                            
                            <br>
                            <label for="phone">Phone: </label>
                            <input type="tel" id="phone" name="phone" placeholder="01XXXXXXXXX" pattern="[0]{1}[1]{1}[3-9]{1}[0-9]{8}" required value="<?php echo $birthday ?>">
                            
                            <p style="color:red"><?php echo $phoneErr; ?></p>
                            <br>

                            <label for="birthdaytime">Birthday: </label>
                            <input type="date" id="birthdaytime" name="birthdaytime" value="<?php echo $birthday ?>"> 
                            <p style="color:red"><?php echo $birthdayErr; ?></p>
                            <br>

                            <label for="password">Password: </label>
                            <input type="password" name="pass" id="pass" value="<?php echo $password ?>">
                            <p style="color:red"><?php echo $passwordErr; ?></p>
                            
                            <br>

                            <label for="address">Address: </label>
                            <input type="text" name="address" id="address" value="<?php echo $address; ?>"> 
                            <p style="color:red"><?php echo $addressErr; ?></p>

                            <br>

                            

                            <!-- Input submit -->
                            <input  class="button" type="submit" value="Sign Up">
                            <p id="errorMsg"></p>
                            <button class="button" onclick="location.href='login.php'">Login</button>
                            <p id="errorMsg"></p>
                        </form>
                        <script>

			function validate() {
				var isValid = false;
				var fname =    document.forms["jsForm"]["fname"].value;
				var lname =    document.forms["jsForm"]["lname"].value;
                var email =    document.forms["jsForm"]["email"].value;
				var password = document.forms["jsForm"]["pass"].value;
                var gender =   document.forms["jsForm"]["gender"].value;
                var dob =      document.forms["jsForm"]["birthdaytime"].value;
                var phone =    document.forms["jsForm"]["phone"].value;	
				var address =  document.forms["jsForm"]["address"].value;
				
				
				
				
				


				if(fname == "" || lname == ""|| email == ""|| password == ""|| gender == ""|| dob == ""||  phone == ""|| address == "")
                {
					document.getElementById("errorMsg").innerHTML = "<b>Please provide all the necessary information.</b>";
					document.getElementById("errorMsg").style.color = "red";
				}
				else 
                {
					isValid = true;
				}

				return isValid;
			}

		</script>



                  </div>
              </div>
              <div class="col-3"></div>
               
           </div>
       </div>
       <?php include 'static_footer.php'; ?>
    </div>



</body>
</html>