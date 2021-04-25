<Doctype html>
<html>

<head>
    
    <title>Admin Manager  page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/admin_manager_style.css">


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
                    <h3> Admin  Manager </h3>
                    <br>

                    <button onclick="location.href='admin_manager_remove.php'" class="button" ><b> Remove Manager</b></button>

                    <button onclick="location.href='admin_m_signup.php'" class="button" ><b>Add Manager </b></button>
                    <button onclick="location.href='admin_manager_balance.php'" class="button"><b>Approve Salary</b></button>
                    <button onclick="location.href='managercomplaints.php'" class="button"><b>Complaints</b></button>
                    <br>
                    <button onclick="location.href='test_bonus.php'" class="button"><b>Approve Bonus</b></button>
                    <button onclick="location.href='managerAj_list.php'" class="button"><b>List</b></button>
                    <button onclick="location.href='chat1.html'"class="button"><b>Messages</b></button>
                    <br>
                    <button onclick="location.href='admin_home_page.php'" class="button"><b>Back</b></button>
                    




                </div>




           
            </div>

            
            
        </div>
        <?php include('static_footer.php')
        ?>
    </div>



</body>


</html>