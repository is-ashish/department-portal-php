<?php
session_start();
include('connection.php');
include("fpdf/fpdf.php");
$pdf=new FPDF();
$str="Mandeeep";
$query="SELECT FNAME,MNAME,LNAME,MOBNO,EMAIL,FATHERNAME,ADDRESS,CITY,STATE,DOB,GENDER,PHOTO,STATEID,CITYID FROM studentdetail WHERE rollno='CSJMA13001390002'";
$result=mysqli_query($link,$query);
if(mysqli_affected_rows($link)==1){
    $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $data['FNAME'];
    }
$pdf->AddPage();
$pdf->SetFont("Courier","I","10");
$pdf->Cell(120,10,"Hello $data[MOBNO]",0,0,"C");
$pdf->Ln();
$pdf->Cell(120,20,"Hello PDF",0,0,"C");
$pdf->Ln();
$pdf->Cell(120,30,"Hello PDF",0,0,"C");
$pdf->Ln();
$pdf->SetFont("Courier","U","10");
$pdf->Cell(120,40,"Hello PDF",0,0,"C");
$pdf->Ln();
$pdf->Cell(120,50,"Hello PDF",0,0,"C");
$pdf->Ln();
$pdf->Cell(120,60,"Hello PDF",0,0,"C");
$pdf->AddPage();
$pdf->Output();

?>