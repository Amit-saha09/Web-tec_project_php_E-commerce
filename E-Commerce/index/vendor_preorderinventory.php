<?php
session_start();
?>
<!Doctype html>
<html>

<head>
    
    <title>Preorder Inventory</title>
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
              <th>Id</th>
              <th>Name</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Vendor Id</th>
             
              <th colspan="2">Action</th>
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

                $stmt1 = $conn1->prepare("select id from vendor where email=?");
                $stmt1->bind_param("s", $email);
                $stmt1->execute();
                $res2 = $stmt1->get_result();
                $user = $res2->fetch_assoc();    
                $vendorId = $user['id'];

                //echo $vendorId;

                $sql = "select * from preorder_product where vendor_Id=$vendorId";
                $res1 = $conn1->query($sql);
                if($res1->num_rows > 0) {
                  while($row = $res1->fetch_assoc()) {
                 
                  ?>
                    <tbody>
                          <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td><?php echo $row['vendor_Id']; ?></td>

                            <td><a href="vendor_preorderupdate.php?id=<?php echo $row['id']; ?>" class="edit">Edit</a></td>
                            <td><a href="vendor_preorderdelete.php?id=<?php echo $row['id']; ?>" class="delete">Delete</a></td>
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