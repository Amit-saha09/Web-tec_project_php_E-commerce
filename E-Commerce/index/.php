<?php
require('fpdf.php');
$pdf=new FPDF('P','mm','A4');
//add new page
$pdf->AddPage();
//output the result

$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130 ,5,'ONLINE-KENAKATA.COM',0,0);



	
	
	$conn = new mysqli("localhost", "wt_projectuser", "123", "wt_project");

	if($conn -> connect_error) {
		echo "Failed to connect database!";
	}
	else {
    $stmt1 = $conn->prepare("select * from sell where id=?");
    $stmt1->bind_param("s", $_GET['invoice']);
    $stmt1->execute();
    $res2 = $stmt1->get_result();
    $user = $res2->fetch_assoc();    

		

		


$pdf->Cell(59 ,5,'INVOICE',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130 ,5,'[Street Address]',0,0);
$pdf->Cell(59 ,5,'',0,1);//end of line

$pdf->Cell(130 ,5,'[City, Country, ZIP]',0,0);
$pdf->Cell(25 ,5,'Date',0,0);
$pdf->Cell(34 ,5,$user['date'],0,1);//end of line

$pdf->Cell(130 ,5,'Phone:',0,0);
$pdf->Cell(25 ,5,'Invoice :',0,0);
$pdf->Cell(34 ,5,$user['id'],0,1);//end of line

$pdf->Cell(130 ,5,'Fax:',0,0);
$pdf->Cell(25 ,5,'Customer ID',0,0);
$pdf->Cell(34 ,5,$user['consumer_email'],0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//billing address
$pdf->Cell(100 ,5,'Consumer Email And Invoice no:',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$user['consumer_email'],0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'',0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,'',0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$user['id'],0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(130 ,5,'Description',1,0);
$pdf->Cell(25 ,5,'Quantity',1,0);
$pdf->Cell(34 ,5,'Amount',1,1);//end of line

$pdf->SetFont('Arial','',12);


$sql2 ="SELECT * FROM sell_table WHERE sell_Id='".$_GET['invoice']."'";

	

	
	$result1 = $conn -> query($sql2);

	if($result1 -> num_rows > 0) {
    while($row1=$result1->fetch_assoc()){





//Numbers are right-aligned so we give 'R' after new line parameter

$pdf->Cell(130 ,5,$row1['product_name'],1,0);
$pdf->Cell(25 ,5,$row1['quantity'],1,0);
$pdf->Cell(34 ,5,$row1['price'],1,1,'R');//end of line

    }
  }


//summary
$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Subtotal',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,$user['price'],1,1,'R');//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Taxable',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,'0',1,1,'R');//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Tax Rate',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,'0',1,1,'R');//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Total Due',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,$user['price'],1,1,'R');//end of line
$pdf->Output();


      
    
}
  $conn->close();
?>