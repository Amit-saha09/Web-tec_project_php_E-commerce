<Doctype html>
<html>

<head>
    
    <title>Vendor Home page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/vendor_homestyle.css">


</head>

<body>
<?php include("static_header.php")
    ?>
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            
            <div class="col-10">
            
                <div class="box">
                    <!-- <div class="abc">
                    <img src="images/logo.png" alt="logo">
                    </div> -->
                    
                    <h2>Vendor Home</h2>
                    <br>
                    
                    <a href="vendor_profile.php">
                    
                        <button class="button"><b>Profile</b></button>
                    
                    </a>

                    <a href="vendor_product.php">
                    
                        <button class="button"><b>Product</b></button>
                    
                    </a>

                    
                    <a href="vendor_sellinghistory.php">
                    
                        <button class="button"><b>Selling History</b></button>
                    
                    </a>

                    <br>

                    <a href="vendor_payment.php">
                    
                      <button class="button"><b>Payment</b></button>
                    
                    </a>
                    
                    <a href="vendor_orderlist.php">
                    
                        <button class="button"><b>Preorder</b></button>
                    
                    </a>
                    
                    <a href="vendor_message.php">
                    
                        <button class="button"><b>Complaint Against Manager</b></button>
                  
                    </a> 

                    <br>

                    <a href="chat1.html">
                    
                    <button class="button"><b>Message</b></button>
              
                </a> 

                    <a href="logout.php">
                    
                    <button class="button"><b>Logout</b></button>
              
                    </a> 
                    


                </div>




           
            </div>

            <div class="col-1"></div>
            
        </div>
        <?php include('static_footer.php')
        ?>
    </div>



</body>


</html>