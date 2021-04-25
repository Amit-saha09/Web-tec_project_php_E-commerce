<?php
session_start();
?>



<!Doctype html>
<html>

<head>
    
    <title>Consumer Home page</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/consumer_membership.css">


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
                   <!-- <img src="logo.png" alt="logo"> -->
                    </div>
                    
                     
                    <button class="button"><b>Gold</b></button>
                                     
                    
                    <button class="button"><b>Silver</b></button>
                    <br>
                    
                    <button class="button"><b>UpGrade</b></button>
                    
                    
                    
                   
                    







                </div>




           
            </div>

            <div class="col-1"></div>
            
        </div>
        <?php include('static_footer.php')
        ?>
    </div>



</body>


</html>