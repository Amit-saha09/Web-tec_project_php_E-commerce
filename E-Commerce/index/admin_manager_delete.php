<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet/vendor_signupstyle.css">
    <title>Manager  Registration</title>
 

</head>
<?php include 'static_header.php'; ?>
<body >


  
    <?php
        
        $firstNameErr = $lastNameErr = $emailErr = $passwordErr = $addressErr = $phoneErr = $dobErr = $genderErr = $managerTypeErr = $salaryErr= "";
        $firstName = $lastName = $email = $password = $address = $phone= $dob = $gender = $managerType =$salary= "";
        $count = 0;
        $userType = 2;
        $flag=0;

        $email=$_SESSION["email"];
       
            $filepath = "manager_signup.txt";
            $f = fopen($filepath,'r') or die("fail to open file");
    
            $rowNumber = -1;
            while($row = fgets($f))
            {
    
                $json_decoded_text = json_decode($row, true);
    
                    $rowNumber++;
    
                    if($email == $json_decoded_text['email'])
                    {
                      fclose($f); 
                      break;
    
                    }
            }
         $row_number = $rowNumber;    // Number of the line we are deleting
        $file_out = file("manager_signup.txt"); // Read the whole file into an array

        //Delete the recorded line
        unset($file_out[$row_number]);

        //Recorded in a file
        file_put_contents("manager_signup.txt", implode("", $file_out));

        

        $filepath = "login.txt";
        $f = fopen($filepath,'r') or die("fail to open file");

        $rowNumber = -1;
        while($row = fgets($f))
        {

            $json_decoded_text = json_decode($row, true);

                $rowNumber++;

                if($email == $json_decoded_text['email'])
                {
                  fclose($f); 
                  break;

                }
        }
        $row_number = $rowNumber;    // Number of the line we are deleting
        $file_out = file("login.txt"); // Read the whole file into an array

        //Delete the recorded line
        unset($file_out[$row_number]);

        //Recorded in a file
        file_put_contents("login.txt", implode("", $file_out));

           


          

    

         


            
            
		    
           


            

            header("Location: admin_manager_search.php");
            






        




    ?>


    
</body>
</html>