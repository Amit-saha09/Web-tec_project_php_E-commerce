

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="stylesheet/style.css">
<title>Static</title>



</head>
<body>
<?php include 'ls.php';?>
<?php include 'static_header.php';?>
<br><br><br>
	<div class="center">
	<table>
	<?php
    $pname=$pnameErr='';
    
  
if ($_SERVER["REQUEST_METHOD"] =="POST" ) {
    if(empty($_POST['name'])) 
    {
        $pnameErr = "Please Fill Up the First Name";
    }
    else
    {
        $pname = $_POST['name'];
       
    }

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
   

 
 $stmt1 = $conn1->prepare("select * from product where name= ? ");
 $stmt1->bind_param("s", $pname);
 
 $stmt1->execute();
 $res2 = $stmt1->get_result();
 $row = $res2->fetch_assoc();
 ?>
 
   
 
		<tr>
			<td>
				<img class="item-image" src="<?php echo $row['image'];?>" width="170" height="200"></img>
				<input type="number" placeholder="1" style="width:185px;font-family:consolas;margin-top:5px;" class="form-control">
				<div class="add-to-cart"><a class="btn btn-success" style="width:185px;font-family:consolas;margin-top:5px;">Add to Cart</a></span></div>
			</td>
			<td>
				<h1 class="text"><?php echo $row['name'];?></h1>
				<h2 class="text"><?php echo $row['price'];?></h2>
				<p class="text"> Lorem ipsum dolor ut sit ame dolore adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat Nostrud duis molestie at dolore.</p>
				
			</td>
		</tr>
	</table>
	<br>
	<table>
		<tr>

<?php
  }
    
  
		
		$stmt1 = $conn1->prepare("select * from product_review where product_name= ? ");
		$stmt1->bind_param("s", $pname);
		
		$stmt1->execute();
		$res2 = $stmt1->get_result();
		
	
	if($res2->num_rows > 0) {
                  while($row = $res2->fetch_assoc()) {
                 
                  ?>
				<td>
                <h3 class="gmail-label"><b><?php echo $row['consumer_email'];?></b></h3>
                <h6 class="text"><?php echo $row['datetime'];?></h6>
				<p class="text"><b><?php echo $row['review_message'];?></b></p>
				<hr>
				
				</td>
                <tr>
				<hr>

				<?php
    }
  }
		


    $conn1->close();
}
?>
<h1>Reviews:</h1><br>
</table>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
<?php $pname= $_GET['name']; ?>
                    <input type="Hidden" name="name" value="<?php echo $pname ; ?>">
                    
                    <input type="submit" class="button" value="Details" >
                    
</form>
	
</div>
<br><br><br>

<?php include 'static_footer.php'; ?>
</body>
</html>

