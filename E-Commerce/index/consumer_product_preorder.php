<?php
session_start();
?>

<!Doctype html>
<html>

<head>

    
    <title>Consumer Product page</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/consumer_product.css">


</head>

<body>


<?php include("static_header.php")
	?>
               <center> 
               <button onclick="location.href='consumer_home.php'"class="button"><b>Consumer Homepage</b></button>        
          <button onclick="location.href='consumer_product.php'"class="button"><b>Product</b></button>
          
          <a href="logout.php">  <button class="button"><b>Logout</b></button> </a>
                    <br>
          </center> 

    <?php
     $email = $_SESSION["email"];
     $password = $_SESSION["password"];
     
    ?>


    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            
            <div class="col-10">
            
                <div class="box">
                    <div class="abc">
                  <!--  <img src="logo.png" alt="logo"> -->
                    </div>
                    
                   
                    
                    <button onclick="location.href='preorder_productlist.php'"class="button"><b> Product List </b></button>
                    <button onclick="location.href='consumer_preorder_orders.php'"class="button"><b> Orders </b></button>
                 
                   
                    







                </div>




           
            </div>

            <div class="col-1"></div>
            
        </div>
        <?php include('static_footer.php')
        ?>
    </div>



</body>


</html>