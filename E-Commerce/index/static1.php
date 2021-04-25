<!DOCTYPE html>
<html lang="en">
<head>

<title>Static</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="stylesheet/style.css">


</head>
<body>
<?php include 'ls.php';?>
<?php include 'static_header.php';?>
<div class=".container">
<div class="col-md-12">
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
  

   $sql = "select * from product";
   $res1 = $conn1->query($sql);
   if($res1->num_rows > 0) {
     while($row = $res1->fetch_assoc()) {
    
?>

  <div class="card-product col-md-4">
		<a href="item.php">
			<img class="card-image" src="<?php echo $row['image']; ?>"></img><br>
			<b class="text" > <?php echo $row['name']; ?></b>
		</a>
		<div class="price-label"><b><?php echo $row['price']; ?></b></div>
		<div class="add-to-cart"><a class="btn btn-success" style="width:185px;font-family:consolas;margin-top:5px;">Add to Cart</a></span></div>
		
	</div>

<?php
    }
  }
		}
    $conn1->close();
?>










</div>
</div>



<?php include 'static_footer.php'; ?>

</body>
</html>