<Doctype html>
<html>

<head>
    
    <title>Admin Consumer </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/admin_consumer_style.css">


</head>

<body>
    <?php include("static_header.php")
    ?>
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            
            <div class="col-10">
            
                <div class="box">
                       
                        <a href="admin_home_page.php" ></a>
            
                    <h3> Admin  consumer </h3>
                    <br>

                    <button onclick="location.href='consumerAj_list.php'" class="button" ><b> Consumer List</b></button>
          
                    
                    <button onclick="location.href='admin_purchasehistory.php'" class="button"><b>Purchase History</b></button>

                    <br>
                    <button onclick="location.href='admin_home_page.php'" class="button"><b>Back</b></button>




                </div>




           
            </div>

            <div class="col-1"></div>

            
        </div>
        <?php include('static_footer.php')
        ?>
    </div>



</body>


</html>