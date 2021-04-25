<!Doctype html>
<html>

<head>
    
    <title>Vandor List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/product_liststyle.css">


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
                        <h2>Vendor List</h2> </center>
                        <br>

                       
         

          <table>
            <thead>
             
              <th>Firstname</th>
              <th>Lastname</th>
              <th>Email</th>
              
              <th>Number</th>
              <th>Address</th>
              <th>Nid</th>
              <th>Dob</th>
              <th>Gender</th>
              <th>Vendor type</th>
              <th>shop name</th>
              <th colspan="2">Action</th>
            </thead>
            <?php 
            session_start();
            
           

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

                $stmt1 = $conn1->prepare("SELECT * FROM `vendor-reg-req`WHERE manager_Id=?");
                $stmt1->bind_param("i", $p1);
                $p1 = $_SESSION['id'];
                $stmt1->execute();
                $res2 = $stmt1->get_result();
               
                if($res2->num_rows > 0) {
                  while($row = $res2->fetch_assoc()) {
                 
                  ?>
                    <tbody>
                          <tr>
                            
                            <td><?php echo $row['fname']; ?></td>
                            <td><?php echo $row['lname']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            
                            <td><?php echo $row['number']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $row['nid']; ?></td>
                            <td><?php echo $row['dob']; ?></td>
                            <td><?php echo $row['gender']; ?></td>
                            <td><?php echo $row['vtype']; ?></td>
                            <td><?php echo $row['shop_Name']; ?></td>

                            <td><a href="vendor_add.php?email=<?php echo $row['email']; ?>" class="edit">add</a></td>
                            <td><a href="vendor_delete.php?email=<?php echo $row['email']; ?>" class="delete">delete</a></td>
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