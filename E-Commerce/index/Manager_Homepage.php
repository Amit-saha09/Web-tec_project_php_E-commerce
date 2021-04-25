<Doctype html>
<html>

<head>
    
    <title>Manager Home page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/Manager_home_styel.css">


</head>

<body>
<?php include("static_header.php")
    ?>

    <?php


    session_start();
    $host = "localhost";
    $user = "wt_projectuser";
    $pass = "123";
    $db = "wt_project";

    $conn1 = new mysqli($host, $user, $pass, $db);
    $email=$_SESSION['email'];
    $stmt1 = $conn1->prepare("select id from manager where email=?");
                $stmt1->bind_param("s", $email);
                $stmt1->execute();
                $res2 = $stmt1->get_result();
                $user = $res2->fetch_assoc();    
                $vis = $user['id'];
               $_SESSION['id']=$vis;
                $conn1->close();
               

    ?>
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            
            <div class="col-10">
            
                <div class="box">
                    <h3>Manager Home page</h3>
                    <br>

                    <button onclick="location.href='Manager_Profile.php'" class="button"><b>Profile</b></button>
                    
                   <button onclick="location.href='Manager_Vendor.php'" class="button"><b>Vendor</b></button>
                    
                    <button onclick="location.href='Manager_Product.php'" class="button"><b>Product</b></button>
                    <br>
                    
                    <button onclick="location.href='Manager_Complaint.php'" class="button"><b>Complaints</b></button>
                    
                    <button onclick="location.href='Chat1.html'" class="button"><b>Message to Admin</b></button>
                    
                    <button onclick="location.href='Manager_Salary.php'" class="button"><b>Salary</b></button>

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