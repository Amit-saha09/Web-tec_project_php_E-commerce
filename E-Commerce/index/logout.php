<?php
	session_start();
	session_destroy();
	setcookie('status', "OK", time()-60, '/');
	header('location: login.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>
<body>

    <?php header("Location: static.php"); ?>


    
</body>
</html>