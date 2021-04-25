<?php
session_start();
?>
                 
<!Doctype html>
<html>

<head>
    
    <title>Consumer Home page</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/consumer_home.css">


</head>

<body>

<?php include 'static_header.php'; ?>  
    <div class="menu">

</div> 
 <div class="container">
        <div class="row">
            <div class="col-1"></div>
            
            <div class="col-10">
            
                <div class="box">
                    <div class="abc">
                   <!--  <img src="logo.png" alt="logo"> -->
                    </div>
                    
                     <h2>Consumer Home page</h2>
                     <br>
                    <button onclick="location.href='consumer_profile.php'"class="button"><b>View Profile</b></button>
                                     
                    
                    <button onclick="location.href='consumer_product.php'"class="button"><b>Product</b></button>
                    
                    <button onclick="location.href='customer_view_vendor_list.php'"class="button"><b>Vendor List</b></button>
                    <br>
                    
                    <!-- <button onclick="location.href='consumer_message.php'"class="button"><b> Message/Complaints </b></button> -->
                    
                    

                    <a href="logout.php">
                    
                    <button class="button"><b>Logout</b></button>
              
                    </a> 
                    
                   




                </div>




           
            </div>


            
            <div class="col-1"></div>
            
        </div>
        <?php include 'static_footer.php'; ?>
    </div>



   


</body>


</html>