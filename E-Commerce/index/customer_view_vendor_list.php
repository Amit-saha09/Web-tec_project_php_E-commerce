<?php
session_start();
?>

<!Doctype html>
<html>

<head>
    
    <title>View Vendor List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/product_liststyle.css">


    <script>
  
  function showResult(str) {
    var searchKey = str;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if(this.readyState == 4 && this.status == 200) {
        document.getElementById("p2").innerHTML = xhttp.responseText;
      }
    }

    xhttp.open("GET", "vendor_index.php?searchKey=" + searchKey, true);
    xhttp.send();
  }

</script>




</head>

<body>







<?php include("static_header.php")
    ?> 

           <!-- <center> 
          <button onclick="location.href='consumer_home.php'"class="button"><b>Consumer Homepage</b></button>        
          <button onclick="location.href='consumer_product.php'"class="button"><b>Product</b></button>
          <a href="logout.php">  <button class="button"><b>Logout</b></button> </a>
          <br>
          </center>  -->

    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            
            <div class="col-10">
            
                <div >
                    <div >

                        <a href="vendor_home.php" >
                            
                        </a>
                        <br>
                        <center>
                        <h2> Vendor List </h2> 
                        <br>
                        
                        <label for="searchKey">Search Email:</label>
	                      <input type="text" name="searchKey" id="searchKey" onkeyup="showResult(this.value)"> </center>
                        <br>
                        <br>
<br>
<div id="p2"></div>

                       
         

         
      



                </div>
                

    


           
            </div>
            

         

            <div class="col-1"></div>
            
        </div>
        <?php include('static_footer.php')
        ?>
    </div>
    
    
   


</body>


</html>