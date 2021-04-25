<Doctype html>
<html>

<head>
    
    <title>Product Review</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/product_liststyle.css">

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

                        <a href="admin_home.php" >
                            
                        </a>

                        <br>
                        <center><h2>Product Reviews</h2> </center>
                        <br>
          <table>
            <thead>
              <th>Id</th>
              <th>Product Name</th>
              <th>Consumer Email</th>
              <th>Review Message</th>
              <th>Date</th>
             
            </thead>
            <?php 

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

                $sql = "select * from product_review";
                $res1 = $conn1->query($sql);
                if($res1->num_rows > 0) {
                  while($row = $res1->fetch_assoc()) {
                 
                  ?>
                    <tbody>
                          <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['product_name']; ?></td>
                            <td><?php echo $row['consumer_email']; ?></td>
                            <td><?php echo $row['review_message']; ?></td>
                            <td><?php echo $row['datetime']; ?></td>
                            

                            <td><a href="del_review.php?email=<?php echo $row['id']; ?>" class="delete">Remove</a></td>
                           
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