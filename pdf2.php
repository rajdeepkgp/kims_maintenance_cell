<?php
include_once("db.php");

 $id = $_GET['id'];
 $sql="SELECT * FROM itemdetails where id=$id";
    $r=mysqli_query($conn,$sql);
    $i=0;
    while($row = mysqli_fetch_array($r)){
    $id= $row['id'];
    $orderno= $row['orderno'];
    $cdate = $row['cdate'];
    $item = $row['item'];
    $quantity = $row['quantity'];
    $fitted = $row['fitted'];
    $usitem = $row['usitem'];
    $newunuseitem = $row['newunuseitem'];
    $pusername = $row['pusername'];
    $designation = $row['designation'];


require('fpdf/fpdf.php');

class PDF extends FPDF
{

function Footer()
{
    // Go to 1.5 cm from bottom
    $this->SetY(-15);
    // Select Arial italic 8
    $this->SetFont('Arial','',8);
    // Print centered page number
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}
}
  
// Instantiate and use the FPDF class 
$pdf = new PDF('P','mm','A4');
  
//Add a new page
$pdf->AddPage();

$pdf->Image('logo.png',10,10,189);
$pdf->SetFont('Arial','BU',20);
$pdf->SetXY(80,50);
// First header column 
$pdf->Cell(30,10,'DETAILS OF ITEMS',0,0,'L',false);
$pdf->SetY(80);

$pdf->Cell(189  ,5,'',0,1);//Space

// Set the font for the text
$pdf->SetFont('Arial', 'B',10);

$pdf->Cell(25   ,5,'ORDER NO: ',0,0);
$pdf->Cell(125  ,5,"$orderno",0,0);
$pdf->Cell(15   ,5,'DATE:',0,0);
$pdf->Cell(20   ,5,"$cdate",0,1);//end of line


$pdf->Cell(189  ,10,'',0,1);//Space

  
// Set the font for the text
$pdf->SetFont('Arial', 'B', 10);
  
// Prints a cell with given text 

$pdf->Cell(30  ,10,'DATE',1,0,'C');
$pdf->Cell(30   ,10,'ISSUED ITEM',1,0,'C');
$pdf->Cell(25   ,10,'QUANTITY',1,0,'C');
$pdf->Cell(30   ,10,'ITEM FITTED',1,0,'C');
$pdf->Cell(30   ,10,'U/S ITEMS',1,0,'C');
$pdf->Cell(40   ,10,'NEW UNUSED ITEMS',1,1,'C');//end of line

$pdf->SetFont('Arial','',10);

//Numbers are right-aligned so we give 'R' after new line parameter

$pdf->Cell(30  ,10,"$cdate",1,0,'C');
$pdf->Cell(30   ,10,"$item",1,0,'C');
$pdf->Cell(25   ,10,"$quantity",1,0,'C');
$pdf->Cell(30   ,10,"$fitted",1,0,'C');
$pdf->Cell(30   ,10,"$usitem",1,0,'C');
$pdf->Cell(40   ,10,"$newunuseitem",1,1,'C');//end of line

// Set the font for the text
$pdf->SetFont('Arial', 'B', 10);

// Prints a cell with given text 

$pdf->Cell(60  ,10,'PARTICULARS OF USER NAME',1,0,'C');
$pdf->Cell(55   ,10,'DESIGNATION',1,0,'C');
$pdf->Cell(70   ,10,'SIGNATURE',1,1,'C');//end of line

$pdf->SetFont('Arial','',10);

//Numbers are right-aligned so we give 'R' after new line parameter

$pdf->Cell(60  ,10,"$pusername",1,0,'C');
$pdf->Cell(55   ,10,"$designation",1,0,'C');
$pdf->Cell(70   ,10,"",1,1,'C');//end of line

$pdf->Write(30, "   Generated On  " . date('Y-m-d'));

  
// return the generated output
$pdf->Output();

}
?>