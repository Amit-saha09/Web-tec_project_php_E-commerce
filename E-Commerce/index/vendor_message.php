<?php
session_start();
?>

<!Doctype html>
<html>

<head>
    
    <title>Vendor Message</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/vendor_profilestyle.css">


</head>

<body>

<?php
    error_reporting(E_ERROR | E_PARSE);
    $message="";
    $messageErr="";
    $count = 0;
    $email = $_SESSION["email"];
    
    $memail = "123@gmail.com";
    $mtype = "";

    
    

  
 
    

   

          
         

        if ($_SERVER["REQUEST_METHOD"] =="POST" ) 
        {   
            if(empty($_POST['message'])) 
            {
                $messageErr = "Please Write a Message";
            }
            else
            {
                $message = $_POST['message'];
                $count++;
            }


           
        if ($count >= 1)
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

                $stmt1 = $conn1->prepare("select vtype from vendor where email=?");
                $stmt1->bind_param("s", $email);
                $stmt1->execute();
                $res2 = $stmt1->get_result();
                $user = $res2->fetch_assoc();    
                $mtype = $user['vtype'];

                $stmt1 = $conn1->prepare("select email from manager where type=?");
                $stmt1->bind_param("s", $mtype);
                $stmt1->execute();
                $res2 = $stmt1->get_result();
                $user = $res2->fetch_assoc();    
                $memail = $user['email'];
                
                
               
        
                $stmt2 =  "INSERT INTO `manager_complain` (`vemail`,`memail`, `complain`) VALUES ('".$email. "','".$memail. "', '".$message. "')";
               
                $status = $conn1->query($stmt2);

                
                if($status)
                {

                    //echo $vemail;
                    //header("Location: customer_view_vendor_list.php");
                    //echo $email;

                    echo "Successful!!";

                    
                }
                else {
                    echo "Failed to Insert Data.";
                    echo "<br>";
                    $conn1->connect_error;
            }
        
            $conn1->close();
        }
        
      
       
        }

  
                
    }
                
            
           





?>







  <?php include("static_header.php")
    ?>

<form name="jsForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" onsubmit="return validate()" method="POST">

        <div class="container">
        <div class="row">
            <div class="col-1"></div>
            
            <div class="col-10">
            
                <div class="box">
                    <!-- <div class="abc">

                        

                    </div> -->
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                    <textarea id="message" name="message" rows="4" cols="50">
                    </textarea> 
                    
                    
                    

                    <br>


                    
                    <input type="submit" class="button" >
                    <p style="color:red"><?php echo $messageErr; ?></p>
                    </form>

                    
                   </div>

           
            </div>

            <div class="col-1"></div>
            
        </div>
        <?php include 'static_footer.php'; ?>
        </div>




<script>
			    function validate() {
				var isValid = false;
				var message = document.forms["jsForm"]["message"].value;
				
				


				if(message == "" ) {
					document.getElementById("errorMsg").innerHTML = "<b>Please fill up the properly.</b>";
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