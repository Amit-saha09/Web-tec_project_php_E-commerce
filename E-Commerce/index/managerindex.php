<?php
$searchKey=$output="";
if($_SERVER["REQUEST_METHOD"] == "GET") {

	 $_GET['searchKey'];
	$sql = "SELECT * FROM manager_complain WHERE memail LIKE '%".$_GET['searchKey']."%'";

	if(empty($_GET['searchKey'])) {
		$sql = "SELECT * FROM manager_complain";
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
                <th>Id</th>
                <th>Vendor Email</th>
                <th>Manager Email</th>
                <th>Complain</th>
                <th>Action</th>
                </thead>';
    while($row=$result->fetch_assoc()){
        $output .= '<tbody>
                          <tr>
                            
                            <td>'. $row['id'].'</td>
                            <td>'. $row['vemail'].'</td>
                            <td>'. $row['memail'].'</td>
                            <td>'. $row['complain'].'</td>
                            
                            <td><a href="managercomplaintsdelete.php?email='.$row['memail'].'" class="delete">Clear</a></td>

                            
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