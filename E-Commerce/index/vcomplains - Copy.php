<!Doctype html>
<html>

<head>
    
    <title>Vandor Complain List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/product_liststyle.css">
   
  <script>
    /*$(document).ready(function(){
        $('#search_text').keyup(function(){
            var txt= $(this).val();
            if(txt!=''){

            }
            else{
                $('#result').html('');
                $.ajax({
                    url:"vindex.php",
                    method:"post",
                    data:{search:txt},
                    dataType:"text",
                    success:funcation(data){
                        $('#result').html(data);
                    }



                })

            }
        });

    })*/

    
    function showResult(str) {
			var searchKey = str;

			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if(this.readyState == 4 && this.status == 200) {
					document.getElementById("p2").innerHTML = xhttp.responseText;
				}
			}

			xhttp.open("GET", "vindex.php?searchKey=" + searchKey, true);
			xhttp.send();
		}

</script>
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

                        <h2>Vendor Complain List</h2>
                        <br>
                        <label for="searchKey">Search Name:</label>
	<input type="text" name="searchKey" id="searchKey" onkeyup="showResult(this.value)">

	

<br>
<br>
<div id="p2"></div>





            <div class="col-1"></div>
            
        </div>
        <?php include('static_footer.php')
        ?>
    </div>
    
    
   


</body>


</html>