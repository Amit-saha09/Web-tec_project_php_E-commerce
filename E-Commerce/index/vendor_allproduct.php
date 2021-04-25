<?php
session_start();
?>
<!Doctype html>
<html>

<head>
    
    <title>Product List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
  
  function showResult(str) {
    var searchKey = str;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if(this.readyState == 4 && this.status == 200) {
        document.getElementById("p2").innerHTML = xhttp.responseText;
      }
    }

    xhttp.open("GET", "vendor_allproductindex.php?searchKey=" + searchKey, true);
    xhttp.send();
  }

</script>
    <style>
    table {
    width: 100%;
    border-collapse: collapse;
    font-size: 1.1rem;
  }
  
  th,
  td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #d3d3d3;
  }
    </style>


</head>

<body>







<?php include("static_header.php")
    ?> 
               

          
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
                        <label for="searchKey">Search Email:</label>
	                      <input type="text" name="searchKey" id="searchKey" onkeyup="showResult(this.value)">
                        </center>
                        <br>
                        <br>
                      <br>
                      <div id="p2"></div>
    
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