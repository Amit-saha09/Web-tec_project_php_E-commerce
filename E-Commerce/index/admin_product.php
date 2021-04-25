<Doctype html>
<html>

<head>
    
    <title>Admin Product page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/admin_product_style.css">


</head>

<body>
    <?php include("static_header.php")
    ?>
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            
            <div class="col-10">
            
                <div class="box">
                    <a href="admin_homepage.php" ></a>
                    <h3>Admin Product</h3>
                    <br>

                    <button onclick="location.href='productAj_list.php'" class="button"><b>View Product List</b></button>
                    <br>
                    
                     <button onclick="location.href='admin_productreview.php'" class="button"><b>Delete Review Of Product</b></button>
                     <br>
                     <button onclick="location.href='admin_home_page.php'" class="button"><b>Back</b></button>
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