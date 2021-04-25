<Doctype html>
<html>

<head>
    
    <title>Manager Message page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/Manager_Message_style.css">


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
                    <a href="Manager_Homepage.php" ></a>
                    </div>
                    <h3>Manager Message</h3>
                    <br>

                    <button class="button"><b>Message</b></button>
                    <br>
                   <textarea name="comment" rows="5" cols="30"></textarea>
                   <br>
                    <input class="button" type="submit" name="submit" value="Submit">  
                    
                    
                    
                   






                </div>




           
            </div>

            <div class="col-1"></div>
            
        </div>
        <?php include('static_footer.php')
        ?>

    </div>



</body>


</html>