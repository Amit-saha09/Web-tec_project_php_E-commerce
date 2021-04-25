<?php 
session_start();
#$_SESSION['email']="admin";
 $db = new mysqli("localhost","wt_projectuser","123","wt_project");
 if($db->connect_error){
     die("connection failed" .$db->connect_error );
 }
 
 $result=array();
 $message=isset ($_POST['message']) ? $_POST['message'] : null;
 $from=$_SESSION['email'];
 
 if(!empty($message) && !empty($from)){
     $sql ="INSERT INTO `chat` (`message`, `from`) VALUES ('".$message. "', '".$from. "')";
     $result['send_status']= $db->query($sql);
 }
 
 $start=isset($_GET['start']) ? intval($_GET['start']) : 0;
 $items= $db->query("SELECT * from `chat` WHERE `id` > ".$start);
 $i=0;
 while($row=$items->fetch_assoc()){
     
     $result['items'][$i]=$row;
     $i++;
 }
 
 $db->close();
 
 header('Access-Control-Allow-Origin: *');
 header('Content-Type: application/json');
 echo json_encode($result);
/*$stmt1 = $conn1->prepare("select id from vendor where email=?");
                $stmt1->bind_param("s", $email);
                $stmt1->execute();
                $res2 = $stmt1->get_result();
                $user = $res2->fetch_assoc();    
                $vendorId = $user['id'];
                */

    
?>