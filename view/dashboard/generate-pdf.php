<?php
session_start();
require('../../fpdf/fpdf.php');
include '../src/init.php';

/**
 * 
 * @var strip $strip
 */
/**
 * 
 * @var res $func
 */

$alumniData = $func->selectleftjoin4('userdetails', 'alumni_awards', 'alumni_graduated_course', 'alumni_work_experience', 'user_id', 'alumni_userID', 'alumni_userID', 'user_id', 'user_id', 'owner_id', 'userdetails', array('user_id', '=', $_SESSION['userid']));

var_dump($alumniData);

// Create instance of FPDF class
$pdf = new FPDF();

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('Courier', 'B', 16);

$pageWidth = $pdf->GetPageWidth();
$leftMargin = $pdf->GetX(); // Default left margin
$rightMargin = $leftMargin; // Default right margin
$cellWidth = $pageWidth - $leftMargin - $rightMargin;

// Add a cell
$pdf->Cell($cellWidth, 0, 'Resume', 0, 2, 'C', false);

$lineY = $pdf->GetY() + 5;

$pdf->Line($leftMargin, $lineY, $pageWidth - $rightMargin, $lineY);

$pdf->Ln(10);

// name
$name = $alumniData[0]['last_name'] . ', ' . $alumniData[0]['first_name'] . ' ' . $alumniData[0]['middle_name'];
$pdf->SetFont('Courier', 'B', 11);
$pdf->Cell(15, 0, "Name: ", 0, 0, 'L', false);
$pdf->SetFont('Courier', '', 11);
$pdf->Cell($cellWidth, 0, $name, 0, 2, 'L', false);
$pdf->SetFont('Courier', 'B', 16);
$pdf->Ln(5);

// details
$email = $alumniData[0]['email_address'];
$pdf->SetFont('Courier', 'B', 11);
$pdf->Cell(15, 0, "Email: ", 0, 0, 'L', false);
$pdf->SetFont('Courier', '', 11);
$pdf->Cell($cellWidth, 0, $email, 0, 2, 'L', false);
$pdf->SetFont('Courier', 'B', 16);
$pdf->Ln(10);

// Course Information
$courseBuffer = $func->select_one('courses', array('courseID', '=', $alumniData[0]['course_id']));
//$course = $courseBuffer[0]['courseAcronym'];


$pdf->SetFont('Courier', 'B', 11);
$pdf->Cell(15, 0, "Program: ", 0, 0, 'L', false);
$pdf->SetFont('Courier', '', 11);
$pdf->Cell($cellWidth, 0, $courseBuffer, 0, 2, 'L', false);
$pdf->SetFont('Courier', 'B', 16);
$pdf->Ln(5);

$majorBuffer = $func->select_one('coursesMajor', array('id', '=', $alumniData[0]['major_id']));
$major = $majorBuffer[0]['majorName'];

$pdf->SetFont('Courier', 'B', 11);
$pdf->Cell(15, 0, "Major: ", 0, 0, 'L', false);
$pdf->SetFont('Courier', '', 11);
$pdf->Cell($cellWidth, 0, $major, 0, 2, 'L', false);
$pdf->SetFont('Courier', 'B', 16);
$pdf->Ln(5);

$campusBuffer = $func->select_one('campuses', array('campusID', '=', $alumniData[0]['campus']));
$campus = $campusBuffer[0]['campusName'];

$pdf->SetFont('Courier', 'B', 11);
$pdf->Cell(15, 0, "Campus: ", 0, 0, 'L', false);
$pdf->SetFont('Courier', '', 11);
$pdf->Cell($cellWidth, 0, $campus, 0, 2, 'L', false);
$pdf->SetFont('Courier', 'B', 16);
$pdf->Ln(5);

$yearStarted = $alumniData[0]['year_started'];
$yearGraduated = $alumniData[0]['year_graduated'];
$yearDuration = $yearStarted . ' - ' . $yearGraduated;

$pdf->SetFont('Courier', 'B', 11);
$pdf->Cell(15, 0, "Year: ", 0, 0, 'L', false);
$pdf->SetFont('Courier', '', 11);
$pdf->Cell($cellWidth, 0, $yearDuration, 0, 2, 'L', false);
$pdf->SetFont('Courier', 'B', 16);
$pdf->Ln(5);

$pdf->Cell($cellWidth, 0, 'Work Experience', 0, 2, 'C', false);
$lineY = $pdf->GetY() + 5;
$pdf->Line($leftMargin, $lineY, $pageWidth - $rightMargin, $lineY);
$pdf->Ln(10);

$pdf->Cell($cellWidth, 0, 'Awards', 0, 2, 'C', false);
$lineY = $pdf->GetY() + 5;
$pdf->Line($leftMargin, $lineY, $pageWidth - $rightMargin, $lineY);
$pdf->Ln(10);

// Output the PDF
//$pdf->Output();
