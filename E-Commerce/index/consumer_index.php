<?php
$searchKey=$output="";
if($_SERVER["REQUEST_METHOD"] == "GET") {

	 $_GET['searchKey'];
	$sql = "SELECT * FROM consumer WHERE email LIKE '%".$_GET['searchKey']."%'";

	if(empty($_GET['searchKey'])) {
		$sql = "SELECT * FROM consumer";
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
                <th> First name</th>
                <th> Last name</th>
                <th> Email</th>
                <th> Number</th>
                <th> Address</th>
                <th> Gender</th>
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
                            
                          </tr>
                    </tbody>';
    }
echo $output;
}
else{
echo"data not found";
}
  }
}
?>