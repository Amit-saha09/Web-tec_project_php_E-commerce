<?php
session_start();
?>
<!Doctype html>
<html>

<head>
    
    <title>Manager Profile page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/Manager_Profile_style.css">


</head>

<body>
<?php include("static_header.php")
    ?>
<?php
        
        $firstNameErr = $lastNameErr = $emailErr = $passwordErr = $addressErr = $phoneErr = $dobErr = $genderErr = $managerTypeErr = $salaryErr= "";
        $firstName = $lastName = $email = $password = $address = $phone= $dob = $gender = $managerType =$salary= "";
        $count = 0;
        
      

       
                 $host = "localhost";
                $user = "wt_projectuser";
                $passwo = "123";
                $db = "wt_project";
            
                    // Mysqli object-oriented
                    $conn1 = new mysqli($host, $user, $passwo, $db);
            
                    if($conn1->connect_error) {
                      echo "Database Connection Failed!";
                      echo "<br>";
                      echo $conn1->connect_error;
                    }
                    else {
                    
                       
                       $p1= $_SESSION['email'];
            $stmt1 = $conn1->prepare("select * from manager where email= ? ");
		    $stmt1->bind_param("s", $p1);
           
            $stmt1->execute();
            $res2 = $stmt1->get_result();
            $row = $res2->fetch_assoc();
		            
		 
              $firstName =  $row['fname'];
              $lastName =  $row['lname'];
              $email =  $row['email'];
              $password =  $row['password'];
              $address =  $row['address'];
              $phone =  $row['number'];
              $dob =  $row['dob'];
              $gender =  $row['gender'];
              $vendorType =  $row['type'];
              $salary =  $row['salary'];
			
			
               
            
                    $conn1->close();
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
                      
                
                        $stmt1 = $conn1->prepare("update manager set fname=?, lname=?, password=?, address=?, number=? where email=?");
                        $stmt1->bind_param("ssssss", $firstName, $lastName,$password, $address, $phone,$p1);
                        
                        $status = $stmt1->execute();

                        if($status) {
                        $stmt3 = $conn1->prepare("update login set password=? where email=?");
                        $stmt3->bind_param("ss",$password,$p1);
                      
                        $status = $stmt3->execute();
                        if($status){

                            header("Location: logout.php");}
                            else{
                                echo "wrong";
                            }
                        }
                        else {
                            echo "Failed to Update Data.";
                            echo "<br>";
                            echo $conn1->error;
                        }
                    }
                
                    $conn1->close();
                
        
               
        
        
        
        
        
        
                }
            }
       
       
        
    
        
    ?>
<form name="jsForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" onsubmit="return validate()" method="POST">


  
    <div class="container">
       <div class="box">
           <div class="row">
              <div class="col-3">
                 
                  <a href="Manager_Homepage.php" ></a> 
              </div>
              <div class="col-6">
                  <div class="abc"><h2>Manager Profile</h2></div>
              </div>
              <div class="col-3">
                  <div class="abc"><img class="profilepic" src="images/profile.png" alt="pic"></div>
              </div>
               
           </div>
           <div class="row">
              <div class="col-3"></div>
              <div class="col-6">
                  <div class="abc">

          
                  <label for="fname">First Name: </label>
                  <input type="text" name="fname"  placeholder="Type First Name" size="30px" value="<?php echo $firstName ?>">
                      <p style="color:red"><?php echo $firstNameErr; ?></p>
                            

                            <br>

                            <label for="lname">Last Name: </label>
                            <input type="text" name="lname"  placeholder="Type Last Name" size="30px" value="<?php echo $lastName ?>">
                      <p style="color:red"><?php echo $lastNameErr; ?></p>
                            

                            <br>              

                            <label for="email">Email: </label>
                            <?php echo $email ?>
                            

                            <br>

                            <label for="password">Password: </label>
                            <input type="password" name="password"  placeholder="Type Password" size="30px" value="<?php echo $password ?>">
                      <p style="color:red"><?php echo $passwordErr; ?></p>
                                             

                            <br>

                            <label for="address">Address: </label>
                            <input type="text" name="address" id=""  placeholder="Type Your Address" size="30px" value="<?php echo $address ?>">
                      <p style="color:red"><?php echo $addressErr; ?></p> 
                            

                            <br>  

                            <label for="phone">Phone: </label>                   
                            <input type="tel" name="phone" size="30px" placeholder="01XXXXXXXXX" pattern="[0]{1}[1]{1}[3-9]{1}[0-9]{8}" required value="<?php echo $phone ?>">
                      <p style="color:red"><?php echo $phoneErr; ?></p>
                            

                            

                            <br>

                    

                            <label for="dob">DOB: </label>
                            <?php echo $dob ?>
                           
                            <br>

                            <label for="gender">Gender: </label>       
                            <?php echo $gender ?>


                         
                          
                            <br>

                            <label for="type">Manager Type</label>  

                            <?php echo $managerType ?>
                            
                            <br>
                            <label for="salary">Salary: </label>       
                           <?php echo $salary ?>
                        
                            <br>
                         <button class="button" type="submit">Update</button>
                         <p id="errorMsg"></p>

                  </div>
              </div>
              <div class="col-3"></div>
               
           </div>
           
       </div>
       <?php include('static_footer.php')
        ?>
       
    </div>
    </form>
    <script>
			function validate() {
				var isValid = false;
				var fname = document.forms["jsForm"]["fname"].value;
				var lname = document.forms["jsForm"]["lname"].value;
               
				var password = document.forms["jsForm"]["password"].value;
				var address = document.forms["jsForm"]["address"].value;
				
				var phone = document.forms["jsForm"]["phone"].value;
			
				


				if(fname == "" || lname == ""|| password == ""|| address == ""|| phone == "") {
					document.getElementById("errorMsg").innerHTML = "<b>Please fill up the form properly.</b>";
					document.getElementById("errorMsg").style.color = "red";
				}
				else {
					isValid = true;
				}

				return isValid;
			}
		</script>



</body>


</html>