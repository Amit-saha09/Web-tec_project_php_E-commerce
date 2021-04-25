<!Doctype html>
<html>

<head>
    
    <title>Preorder Product List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/product_liststyle.css">


</head>

<body>


          <!-- <center> 
          <button onclick="location.href='consumer_home.php'"class="button"><b>Consumer Homepage</b></button>        
          <button onclick="location.href='consumer_product.php'"class="button"><b>Product</b></button>
          <a href="logout.php">  <button class="button"><b>Logout</b></button> </a>
          <br>
          </center>  -->




<?php include("static_header.php")
    ?> 
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            
            <div class="col-10">
            
                <div >
                    <div >

                        <a href="consumer_home.php" >
                            
                        </a>
                        <br>

                        <center><h2>Preorder Product List</h2></center>
                        <br>

                       
         

          <table>
            <thead>
             
            <th>Id</th>
              <th>Name</th>
              <th>Quantity</th>
              <th>Price</th>
              
              <th>Type</th>
              <th>Vendor Id</th>
            
              <th colspan="2">Action</th>
            </thead>
            <?php 
            session_start();
            $email = $_SESSION["email"];
           

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

                $stmt1 = $conn1->prepare("SELECT * FROM `preorder_product`");
                // $stmt1->bind_param("i", $p1);
                //$p1 = $_SESSION['id'];
                $stmt1->execute();
                $res2 = $stmt1->get_result();
               
                if($res2->num_rows > 0) {
                  while($row = $res2->fetch_assoc()) {
                 
                  ?>
                    <tbody>
                          <tr>
                            
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            
                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo $row['type']; ?></td>
                            <td><?php echo $row['vendor_Id']; ?></td>
                            

                            <td><a href="preorder_addapprove.php?name=<?php echo $row['name']; ?>" class="edit">add</a></td>
                            
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