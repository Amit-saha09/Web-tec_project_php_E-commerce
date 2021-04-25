<Doctype html>
<html>

<head>
    
    <title>Vendor Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/vendor_productstyle.css">


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
                            
                        </a>

                    </div>

                    <a href="vendor_addproduct.php">
                    <button class="button"><b>Add</b></button>
                    </a>
                    
                    
                    <a href="vendor_inventory.php">
                    <button class="button"><b>Inventory</b></button>
                    </a>

                    <br>

                    <a href="vendor_issuediscount.php">
                    
                    <button class="button"><b>Issue Discount</b></button>

                    </a>

                    
                    <a href="vendor_allproduct.php">
                    
                    <button class="button"><b>All Products</b></button>

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