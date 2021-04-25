<?php
$searchKey=$output="";
if($_SERVER["REQUEST_METHOD"] == "GET") {

	 $_GET['searchKey'];
	$sql = "SELECT * FROM product WHERE name LIKE '%".$_GET['searchKey']."%'";

	if(empty($_GET['searchKey'])) {
		$sql = "SELECT * FROM product";
	}
	
	$conn = new mysqli("localhost", "wt_projectuser", "123", "wt_project");

	if($conn -> connect_error) {
		echo "Failed to connect database!";
	}
	else {
		$result = $conn -> query($sql);

		if($result -> num_rows > 0) {


$output .='<h4 align="center" >Search result</h4>';
$output .='
                <table>
                <thead>
                <th>ID</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Quantity</th>
                <th>Vendor Id</th>
                <th>Action</th>
                </thead>';
    while($row=$result->fetch_assoc()){
        $output .= '<tbody>
                          <tr>
                          
                            <td>'. $row['id'].'</td>
                            <td>'. $row['name'].'</td>
                            <td>'. $row['price'].'</td>
                            <td>'. $row['quantity'].'</td>
                            
                            <td>'. $row['vendor_Id'].'</td>
                        
                            <td><a href="consumer_review.php?name='.$row['name'].'" class="review"> review </a></td>

                            
                          </tr>
                    </tbody>';
    }
echo $output;
}
else{
echo"Product not found. Enter a valid name";
}
  }
}
?>