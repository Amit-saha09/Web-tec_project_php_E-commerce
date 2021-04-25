<?php
$searchKey=$output="";
if($_SERVER["REQUEST_METHOD"] == "GET") {

	 $_GET['searchKey'];
	$sql = "SELECT * FROM vendor_complain WHERE vemail LIKE '%".$_GET['searchKey']."%'";

	if(empty($_GET['searchKey'])) {
		$sql = "SELECT * FROM vendor_complain";
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
                <th>Vendor Email</th>
                <th>Consumer Email</th>
                <th>Date and time</th>
                <th>Complain</th>
                <th>Action</th>
                </thead>';
    while($row=$result->fetch_assoc()){
        $output .= '<tbody>
                          <tr>
                            
                            <td>'. $row['vemail'].'</td>
                            <td>'. $row['cemail'].'</td>
                            <td>'. $row['datetime'].'</td>
                            <td>'. $row['complain'].'</td>
                            
                            <td><a href="vcomplain_delete.php?email='.$row['vemail'].'" class="delete">Clear</a></td>

                            
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