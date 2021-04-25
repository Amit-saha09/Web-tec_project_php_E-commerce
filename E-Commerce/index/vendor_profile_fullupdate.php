<?php
session_start();
?>

<!Doctype html>
<html>

<head>
    
    <title>Vendor Profile page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/vendor_profilestyle.css">


</head>

<body>

<?php
    error_reporting(E_ERROR | E_PARSE);
    $firstNameErr = $lastNameErr = $emailErr = $passwordErr = $addressErr = $phoneErr = $shopNameErr = "";
    $firstName = $lastName = $email = $password = $address = $phone = $nid = $dob = $gender = $vendorType = $shopName = "";
    $count = 0;
    $userType = 3;
    $flag = 0;

    $email = $_SESSION["email"];
    $password = $_SESSION["password"];

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
        
           
           $p1= $_GET['email'];
$stmt1 = $conn1->prepare("select * from vendor where email= ? ");
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
$nid =  $row['nid'];
$dob =  $row['dob'];
$gender =  $row['gender'];
$vendorType =  $row['vendorType'];
$shopName =  $row['shop_Name'];

   

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
       


      



     


        if ($count >= 10)
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
              
        
                $stmt2 = $conn1->prepare("update vendor SET fname=?,lname=?,email=?,password=?,number=?,address=?,nid=?,dob=?,gender=?,vtype=?,shop_Name=?,manager_Id=? WHERE email=?");
                $stmt2->bind_param("ssssssissssis", $firstName, $lastName,$email,$password,$phone, $address,$nid,$dob,$gender,$vendorType,$shopName,$mid,$p1);
                $mid=2;
                $status = $stmt2->execute();

                if($status) {
                $stmt3 = $conn1->prepare("update login set email=?, password=? where email=?");
                $stmt3->bind_param("sss",$email,$password,$p1);
              
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







  <?php include("static_header.php")
    ?>

<form name="jsForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" onsubmit="return validate()" method="POST">
    <div class="container">
       <div class="box">
           <div class="row">
              <div class="col-3">
                  <div class="abc">
                  <a href="vendor_home.php" ></a>
                  </div>
              </div>
              <div class="col-6">
                  <div class="abc"><h2>Vendor Profile</h2></div>
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
                      First Name: <input type="text" name="fname"  placeholder="Type First Name" size="20px" value="<?php echo $firstName ?>">
                      <p style="color:red"><?php echo $firstNameErr; ?></p>
                      <br><br>
                      Last Name: <input type="text" name="lname"  placeholder="Type Last Name" size="20px" value="<?php echo $lastName ?>">
                      <p style="color:red"><?php echo $lastNameErr; ?></p>
                      <br><br>
                      Email:  <input type="text" name="email"  placeholder="Type Last Name" size="20px" value="<?php echo $email ?>">
                      <p style="color:red"><?php echo $emailErr; ?></p>
                      <br><br>
                      Password: <input type="password" name="password"  placeholder="Type Password" size="20px" value="<?php echo $password ?>">
                      <p style="color:red"><?php echo $passwordErr; ?></p>
                      <br><br>
                      Address: <input type="text" name="address" id=""  placeholder="Type Your Address" size="20px" value="<?php echo $address ?>">
                      <p style="color:red"><?php echo $addressErr; ?></p> 
                      <br><br>
                      Shop Name: <input type="text" name="shopName" id=""  placeholder="Type Your Shop Name" size="20px" value="<?php echo $shopName ?>">
                      <p style="color:red"><?php echo $shopNameErr; ?></p>
                      <br><br>
                      Phone: <input type="tel" name="phone" placeholder="01XXXXXXXXX" pattern="[0]{1}[1]{1}[3-9]{1}[0-9]{8}" required value="<?php echo $phone ?>">
                      <p style="color:red"><?php echo $phoneErr; ?></p>
                      <br><br>
                      NID: <input type="number" name="nid" value="<?php echo $nid ?>">
                      
                      <br><br>
                    
                      Date of Birth:  <label for="dob">DOB: </label>
                            <input type="date" name="dob" id="" value="<?php echo $dob ?>" placeholder="" size="20px" >
                            <p style="color:red"><?php echo $dobErr; ?>
                      
                      <br><br>
                  
                      <label for="gender">Gender: </label>       
                      <input type="radio" name="gender" value="Male">  Male 
                     <input type="radio" name="gender" value="Female" > Female
                            <p style="color:red"><?php echo $genderErr; ?></p>
                      <br><br>

                      Vendor Type:
                      <select name="type" value="<?php echo $vendorType ?>" id="type">
                            <option value="Technology">Technology</option>
                            <option value="Health">Health</option>
                            <option value="Beauty">Beauty</option>
                            </select>
                            <p style="color:red"><?php echo $vendorTypeErr; ?></p> 
                            
                      <br><br>
                  
                     

                      
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
                var email = document.forms["jsForm"]["email"].value;
				var password = document.forms["jsForm"]["password"].value;
				var address = document.forms["jsForm"]["address"].value;
				var shopName = document.forms["jsForm"]["shopName"].value;
				var phone = document.forms["jsForm"]["phone"].value;
				var nid = document.forms["jsForm"]["nid"].value;
				var dob = document.forms["jsForm"]["dob"].value;
				var gender = document.forms["jsForm"]["gender"].value;
				var type = document.forms["jsForm"]["type"].value;
				


				if(fname == "" || lname == ""|| email == ""|| password == ""|| address == ""|| shopName == ""|| phone == ""|| nid == ""|| dob == ""|| gender == ""|| type == "") {
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