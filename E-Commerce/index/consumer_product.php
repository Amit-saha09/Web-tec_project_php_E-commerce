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
                    
                     
                    <button onclick="location.href='consumer_view_buy_product.php'"class="button"><b>View product/Buy Product</b></button>
                                     
                    
                    <button onclick="location.href='consumer_review_product.php'"class="button"><b> Product Review</b></button>
                    <br>
                    
                    <button onclick="location.href='consumer_product_preorder.php'"class="button"><b> Preorder </b></button>
                    
                    <button onclick="location.href='purchase_history.php'"class="button"class="button"class="button"><b>Purchase history</b></button>

                    <button onclick="location.href='consumer_cart.php'"class="button"class="button"><b>Cart</b></button> 
                   
                    







                </div>




           
            </div>

            <div class="col-1"></div>
            
        </div>
        <?php include('static_footer.php')
        ?>
    </div>



</body>


</html>