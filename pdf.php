<?php
include_once("db.php");

 $id = $_GET['id'];
 $sql="SELECT * FROM grievancecell where id=$id";
    $r=mysqli_query($conn,$sql);
    $i=0;
    while($row = mysqli_fetch_array($r)){
    $id= $row['id'];
    $orderno = $row['orderno'];
    $odatetime = $row['odatetime'];
    $unit = $row['unit'];
    $reportby = $row['reportby'];
    $actionby = $row['actionby'];
    $tecallotted = $row['tecallotted'];
    $cdatetime = $row['cdatetime'];
    $locationn = $row['locationn'];
    $ncomplaint = $row['ncomplaint'];
    $remarks = $row['remarks'];
    $incharge = $row['incharge'];





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
$pdf->Cell(30,10,'GRIEVANCE CELL',0,0,'L',false);
$pdf->SetY(80);

$pdf->Cell(189  ,5,'',0,1);//Space

// Set the font for the text
$pdf->SetFont('Arial', 'B',10);

$pdf->Cell(40   ,5,'WORK ORDER NO:',0,0);
$pdf->Cell(70  ,5,"$orderno",0,0);
$pdf->Cell(33   ,5,'DATE & TIME:',0,0);
$pdf->Cell(20   ,5,"$odatetime",0,1);//end of line

$pdf->Cell(189  ,10,'',0,1);//Space

  
// Set the font for the text
$pdf->SetFont('Arial', 'B', 10);
  
// Prints a cell with given text 

$pdf->Cell(35  ,10,'UNIT(SECTION)',1,0,'C');
$pdf->Cell(30   ,10,'REPORT BY',1,0,'C');
$pdf->Cell(30   ,10,'ACTION BY',1,0,'C');
$pdf->Cell(45   ,10,'TECHNICIAN ALLOTTED',1,0,'C');
$pdf->Cell(50   ,10,'COMPLETION DATE & TIME',1,1,'C');//end of line

$pdf->SetFont('Arial','',10);

//Numbers are right-aligned so we give 'R' after new line parameter

$pdf->Cell(35  ,10,"$unit",1,0,'C');
$pdf->Cell(30   ,10,"$reportby",1,0,'C');
$pdf->Cell(30   ,10,"$actionby",1,0,'C');
$pdf->Cell(45   ,10,"$tecallotted",1,0,'C');
$pdf->Cell(50   ,10,"$cdatetime",1,1,'C');//end of line

// Set the font for the text
$pdf->SetFont('Arial', 'B', 10);

// Prints a cell with given text 

$pdf->Cell(65  ,10,'LOCATION',1,0,'C');
$pdf->Cell(75   ,10,'NATURE OF COMPLAINT',1,0,'C');
$pdf->Cell(50   ,10,'REMARKS',1,1,'C');//end of line

$pdf->SetFont('Arial','',10);

//Numbers are right-aligned so we give 'R' after new line parameter

$pdf->Cell(65  ,10,"$locationn",1,0,'C');
$pdf->Cell(75   ,10,"$ncomplaint",1,0,'');
$pdf->Cell(50   ,10,"$remarks",1,1,'C');//end of line


// Set the font for the text
$pdf->SetFont('Arial', 'B', 10);

// Prints a cell with given text 

$pdf->Cell(65  ,10,'IN-CHARGE(GRIEVANCE CELL)',1,0,'C');
$pdf->Cell(125   ,10,'SIGNATURE OF TECHNICIAN',1,1,'C');//end of line

$pdf->SetFont('Arial','',10);

//Numbers are right-aligned so we give 'R' after new line parameter

$pdf->Cell(65  ,10,"$incharge",1,0,'C');
$pdf->Cell(125   ,10,"",1,1,'C');//end of line

$pdf->SetFont('Arial', '',10);


$pdf->Write(30, "   Generated On  " . date('Y-m-d'));
 


// return the generated output
$pdf->Output();

}
?>