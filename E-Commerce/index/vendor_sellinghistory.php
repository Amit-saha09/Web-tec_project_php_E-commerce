<?php
session_start();
$email=$_SESSION['email'];
//echo $email;
?>
<!Doctype html>
<html>

<head>
    
    <title>Selling History</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

                       
         

          <table>
            <thead>
             
            <th>Sell Id</th>
              <th>Product Name</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Consumer Email</th>
              <th>Vendor Email</th>
            
            </thead>
            <?php 

              $email = $_SESSION['email'];
              //echo $email;



              $host = "localhost";
              $user = "wt_projectuser";
              $pass = "123";
              $db = "wt_project";

              // Mysqli object-oriented
              $conn1 = new mysqli($host, $user, $pass, $db);

              if($conn1->connect_error) {
                echo "Database Connection Failed!";
                echo "<br>";
                echo $conn1->connect_error;
              }
              else {
                //echo "Database Connection Successful!";

                $sql = "SELECT * FROM sell_table WHERE vendor_email='".$email."'"; 
                $res1 = $conn1 -> query($sql);


                if($res1->num_rows > 0) {
                  while($row = $res1->fetch_assoc()) {
                 
                  ?>
                    <tbody>
                          <tr>
                          <td><?php echo $row['sell_Id']; ?></td>
                            <td><?php echo $row['product_name']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td><?php echo $row['consumer_email']; ?></td>
                            <td><?php echo $row['vendor_email']; ?></td>
      
                            
                            
                            

                           
                            
                          </tr>
                    </tbody>

                    
    <?php
    }
  }
		}
    $conn1->close();

    
    ?>
          </table>
                    
       










                </div>
                

           
            </div>
            

         

            <div class="col-1"></div>

 
            
        </div>
        <?php include('static_footer.php')
        ?>
    </div>
    
    
   


</body>


</html>