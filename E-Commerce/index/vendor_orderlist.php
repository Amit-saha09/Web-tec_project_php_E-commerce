<Doctype html>
<html>

<head>
    
    <title>Vendor Order List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/vendor_orderliststyle.css">


</head>

<body>
   <?php include("static_header.php")
    ?>
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            
            <div class="col-10">
            
                <div class="box">
                    <div class="abc">

                        <a href="vendor_home.php" >
                            <!-- <img src="images/logo.png" alt="logo"> -->
                        </a>

                    </div>

                    <a href="vendor_preorderaddproduct.php">
                    <button class="button"><b>Add Product</b></button>
                    </a>
                    
                    <a href="vendor_preorderinventory.php">
                    <button class="button"><b>Inventory</b></button>
                    </a>

                    <a href="preorder_addtolist.php">

                    <button class="button"><b>Preorder List</b></button>
                    
                    </a>

                    <a href="vendor_allpreorder.php">

                        <button class="button"><b>Orders</b></button>

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