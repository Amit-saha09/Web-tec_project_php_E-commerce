<Doctype html>
<html>

<head>
    
    <title>Admin Message</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/admin_messagestyle.css">


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

                         <a href="admin_home_page.php" > </a> 
                            
                     </div>                     

                    <textarea name="complaint" rows="4" cols="65">
                          This is a demo!
                    </textarea>
                    <br>
                    <input type="submit" class="button">
                </div>
           
            </div>

            <div class="col-1"></div>
            
        </div>
        <?php include('static_footer.php')
        ?>
    </div>
</body>


</html>