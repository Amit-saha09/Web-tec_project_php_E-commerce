<Doctype html>
<html>

<head>
    
    <title>Admin Home page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/adminhome_style.css">
   




</head>

<body>
	<?php include("static_header.php")
	?>


           

    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            
            <div class="col-10">
            
                <div class="box">
              
                    <h3>Admin Home page</h3>
                    <br>

                    <button onclick="location.href='admin_profile.php'" class="button"><b>Admin Profile</b></button>
                    
                   <button onclick="location.href='admin_manager.php'" class="button"><b>Manager</b></button>

                   <button onclick="location.href='admin_vendor.php'" class="button"><b>Vendor</b></button>
                   <br>
                    
                    <button onclick="location.href='admin_consumer.php'" class="button"><b>Consumer</b></button>

                    
                    <button onclick="location.href='admin_product.php'" class="button"><b>Product</b></button>
                    <a href="logout.php">
                    
                    <button class="button"><b>Logout</b></button>
              
                    </a> 
                    <br>
                    

                    






                </div>




           
           </div>

            <div class="col-1"></div>
            
        </div>
        <?php include('static_footer.php')
        ?>
    </div>



</body>


</html>