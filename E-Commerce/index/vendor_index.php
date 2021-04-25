<?php
$searchKey=$output="";
if($_SERVER["REQUEST_METHOD"] == "GET") {

	 $_GET['searchKey'];
	$sql = "SELECT * FROM vendor WHERE email LIKE '%".$_GET['searchKey']."%'";

	if(empty($_GET['searchKey'])) {
		$sql = "SELECT * FROM vendor";
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
                <th>SN</th>
                <th>Vendor first name</th>
                <th>Vendor last name</th>
                <th>Vendor email</th>
                <th>Vendor number</th>
                <th>Vendor address</th>
                <th>Vendor gender</th>
                <th>Vendor type</th>
                <th>Shop Name</th>
                <th>Action</th>
                </thead>';
    while($row=$result->fetch_assoc()){
        $output .= '<tbody>
                          <tr>
                          <td>'. $row['id'].'</td>
                            <td>'. $row['fname'].'</td>
                            <td>'. $row['lname'].'</td>
                            <td>'. $row['email'].'</td>
                            <td>'. $row['number'].'</td>
                            <td>'. $row['address'].'</td>
                            <td>'. $row['gender'].'</td>
                            <td>'. $row['vtype'].'</td>
                            <td>'. $row['shop_Name'].'</td>
                            
                            <td><a href="consumer_message.php?email='.$row['email'].'" class="compalint"> Complaint </a></td>

                            
                          </tr>
                    </tbody>';
    }
echo $output;
}
else{
echo"Vendor not found. Enter a valid name";
}
  }
}
?>