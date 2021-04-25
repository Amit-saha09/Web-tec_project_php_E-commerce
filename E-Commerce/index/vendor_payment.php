<?php
session_start();
?>
<Doctype html>
<html>

<head>
    
    <title>Vendor Payment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/vendor_addproductstyle.css">


</head>

<body>

<?php
error_reporting(E_ERROR | E_PARSE);

$email = $_SESSION['email'];
$count = 0;

$balance = 0;

$withdraw = 0;
$withdrawERR = "";



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
    $stmt1 = $conn1->prepare("select balance from vendor where email=?");
    $stmt1->bind_param("s", $email);
    $stmt1->execute();
    $res2 = $stmt1->get_result();
    $user = $res2->fetch_assoc();    
    $balance = $user['balance'];    


}



if ($_SERVER["REQUEST_METHOD"] =="POST" ) 
{
    if(empty($_POST['withdraw'])) 
    {
        $withdrawERR = "Fill Up the Withdraw Amount";
    }
    else
    {
        $withdraw = $_POST['withdraw'];
        $count++;
    }
    

 
    
    

    if ($count >= 1 && $balance > $withdraw)
    {
        $balance = $balance - $withdraw;

        $stmt1 = $conn1->prepare("update vendor set balance=? where email=?");
        $stmt1->bind_param("is", $balance, $email );
        $status = $stmt1->execute();
        
        if ($status)
        {
           
            echo "Data Update Successful";
        }

        
        


   

        
        //header("Location: vendor_home.php");
    }

    else
    {
        echo "Failed!!!";
    }

    $conn1->close();
            
            



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
                    <div class="abc">

                        <a href="vendor_home.php" >
                            
                        </a>

                        <h2>Vendor Payment</h2>
                        <br>

                    </div>

                    

                  

                       Balance: <?php echo $balance ?>
                      
                      <br><br>


                      Withdraw Amount: <input type="number" name="withdraw"  placeholder="Type Withdraw Amount" size="20px" value="">
                      <p style="color:red"><?php echo $withdrawERR; ?></p>
                      <br><br>


                      <input  class="button" type="submit" value="Withdraw">
                      <p id="errorMsg"></p>
                    
                



                </div>
                

    


           
            </div>
            

         

            <div class="col-1"></div>
            
        </div>
        <?php include('static_footer.php')
        ?>
    </div>
    </form>

    <script>
			function validate() {
				var isValid = false;
				var fname = document.forms["jsForm"]["withdraw"].value;
		
				
                
			
				


				if(fname == "")  {
					document.getElementById("errorMsg").innerHTML = "<b>Error from JS.</b>";
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