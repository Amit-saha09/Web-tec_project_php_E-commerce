<Doctype html>
<html>

<head>
    
    <title>Admin Vendor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/admin_vendor_style.css">


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
                   
                    <h3>Admin Vendor</h3>
                    <br>
                    <button onclick="location.href='vendor_list.php'" class="button"><b>Vendor List View</b></button>
                    <button onclick="location.href='chat1.html'" class="button"><b>Send Message</b></button>
                    <br>
                    <button onclick="location.href='manager_vendor_sellinghistory.php'" class="button"><b>Sales History</b></button>
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