<?php
session_start();
?>
<Doctype html>
<html>

<head>
    
    <title>Vendor Product Update</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/vendor_addproductstyle.css">


</head>

<body>

<?php
error_reporting(E_ERROR | E_PARSE);

$pnameErr = $ppriceErr = $pquantityERR = $pidErr = "";
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
    $stmt1 = $conn1->prepare("select vtype from vendor where email=?");
    $stmt1->bind_param("s", $email);
    $stmt1->execute();
    $res2 = $stmt1->get_result();
    $user = $res2->fetch_assoc();    
    $ptype = $user['vtype'];
  
    $p1= (int)$_GET['id']; 

    $stmt1 = $conn1->prepare("select id, name, price, quantity from preorder_product where id=?");
    $stmt1->bind_param("i", $p1);
    $stmt1->execute();
    $res2 = $stmt1->get_result();
    $user = $res2->fetch_assoc();   
    $pname = $user['name'];
    $pprice = $user['price'];
    $pquantity = $user['quantity'];
    //$ptype = $user['type'];
    $pid = $user['id'];    


}



if ($_SERVER["REQUEST_METHOD"] =="POST" ) 
{
	if(empty($_POST['pid'])) 
    {
        $pidErr = "Product Id can't be empty";
    }
    else
    {
        $pid = $_POST['pid'];
        $count++;
    }
    
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
        $pquantityERR = "Please Fill Up the Quantity";
    }
    else
    {
        $pquantity = $_POST['pquantity'];
        $count++;
    }

    //echo $count;
    //echo "Hello";
    
    

    if ($count >= 3)
    {
        $stmt1 = $conn1->prepare("update preorder_product set name=?, price=?, quantity=? where id=?");
        $stmt1->bind_param("siii", $pname, $pprice, $pquantity, $pid );
        $status = $stmt1->execute();
        
        if ($status)
        {
           
            echo "Data Update Successful";
        }

        
        


   

        
        //header("Location: vendor_home.php");
    }

    $conn1->close();
            
            



}





?>





<?php include("static_header.php")
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST"> 
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            
            <div class="col-10">
            
                <div class="box">
                    <div class="abc">

                        <a href="vendor_home.php" >
                            
                        </a>

                        <h2>Preorder Product Update</h2>
                        <br>

                    </div>

                    <input type="hidden" name="pid" value="<?php echo $pid ?>">

                    Product Name: <input type="text" name="pname"  placeholder="Type Product Name" size="20px" value="<?php echo $pname ?>">
                      <p style="color:red"><?php echo $pnameErr; ?></p>
                      <br><br>

                       Product Price: <input type="number" name="pprice"  placeholder="Type Product Price" size="20px" value="<?php echo $pprice ?>">
                      <p style="color:red"><?php echo $ppriceErr; ?></p>
                      <br><br>


                       Product Quantity: <input type="number" name="pquantity"  placeholder="Type Product Quantity" size="20px" value="<?php echo $pquantity ?>">
                      <p style="color:red"><?php echo $pquantityERR; ?></p>
                      <br><br>


                      Product Type: <?php echo $ptype ?>
                      
                      <br><br>

                      <input  class="button" type="submit" value="Update Product">
                     
            

                  
                    
                    
                



                </div>
                

    


           
            </div>
            

         

            <div class="col-1"></div>
            
        </div>
        <?php include('static_footer.php')
        ?>
    </div>
    </form>
    
   


</body>


</html>