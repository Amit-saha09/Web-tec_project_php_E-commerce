<?php
session_start();
?>
<Doctype html>
<html>

<head>
    
    <title>Vendor Add Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/vendor_addproductstyle.css">


</head>

<body>

<?php
error_reporting(E_ERROR | E_PARSE);

$pnameErr = $ppriceErr = $pquantityERR = "";
$pname = $ptype = "";
$pprice = $pquantity = 0;
$email = $_SESSION['email'];
$count = 0;
$vendorId = 0;



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

    $stmt1 = $conn1->prepare("select vtype, id from vendor where email=?");
    $stmt1->bind_param("s", $email);
    $stmt1->execute();
    $res2 = $stmt1->get_result();
    $user = $res2->fetch_assoc();    
    $ptype = $user['vtype'];
    $vendorId = $user['id'];


}



if ($_SERVER["REQUEST_METHOD"] =="POST" ) 
{
    
    if(empty($_POST['pname'])) 
    {
        $pnameErr = "Please Fill Up the Product Name";
    }
    else
    {
        $pname = $_POST['pname'];
        $count++;
    }

    if(empty($_POST['pprice'])) 
    {
        $ppriceErr = "Please Fill Up the Price";
    }
    else
    {
        $pprice = $_POST['pprice'];
        $count++;
    }

    if(empty($_POST['pquantity'])) 
    {
        $ppriceErr = "Please Fill Up the Quantity";
    }
    else
    {
        $pquantity = $_POST['pquantity'];
        $count++;
    }
    $file=$_FILES['photo'];
    //print_r($file)
    $filename=$file['name'];
    $filepath=$file['tem_name'];
    $fileerror=$file['error'];


    if($fileerror==0){
        $destfile= 'images/'.$filename;
        move_uploaded_file($filepath,$destfile);

    


    if ($count >= 3)
    {
        
        $stmt1 = $conn1->prepare("insert into product  (name, quantity, price, type, image, vendor_Id) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt1->bind_param("siissi", $pname, $pquantity, $pprice, $ptype, $destfile, $vendorId);
        
        $status = $stmt1->execute();    
        if($status) {
            echo "Data Insertion Successful.";
        }
        else {
            echo "Failed to Insert Data.";
            echo "<br>";
            echo $conn1->error;
        }   

        
        header("Location: vendor_home.php");
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
                    <div class="abc">

                        <a href="vendor_home.php" >
                            
                        </a>

                        <h2>Vendor Add Product</h2>
                        <br>

                    </div>

                    Product Name: <input type="text" name="pname"  placeholder="Type Product Name" size="20px" value="">
                      <p style="color:red"><?php echo $pnameErr; ?></p>
                      <br><br>

                       Product Price: <input type="number" name="pprice"  placeholder="Type Product Price" size="20px" value="">
                      <p style="color:red"><?php echo $ppriceErr; ?></p>
                      <br><br>


                       Product Quantity: <input type="number" name="pquantity"  placeholder="Type Product Quantity" size="20px" value="">
                      <p style="color:red"><?php echo $pquantityERR; ?></p>
                      <br><br>


                      Product Type: <?php echo $ptype ?>
                      
                      <br><br>
                      Picture: <input type="file" name="photo" >
                      <br><br>

                      <input  class="button" type="submit" value="Add Product">
                     
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
				var fname = document.forms["jsForm"]["pname"].value;
				var lname = document.forms["jsForm"]["pprice"].value;
               
				var password = document.forms["jsForm"]["pquantity"].value;
				
                
			
				


				if(fname == "" || lname == ""|| password == "")  {
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