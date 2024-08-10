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

$alumniDetails = $func->select_one('userdetails', array('user_id', '=', $_SESSION['userid']));
$alumniCourseDetails = $func->select_one('alumni_graduated_course', array('user_id', '=', $_SESSION['userid']));
$alumniAwards = $func->select_one('alumni_awards', array('alumni_userID', '=', $_SESSION['userid']));
$alumniWorkExperience = $func->select_one('alumni_work_experience', array('owner_id', '=', $_SESSION['userid']));

$alumniAwardIDs = array();
$alumniAwardIDs = $_POST['awardCheckbox'];

$alumniWorkIDs = array();
$alumniWorkIDs = $_POST['experienceCheckbox'];

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
$name = $alumniDetails[0]['last_name'] . ', ' . $alumniDetails[0]['first_name'] . ' ' . $alumniDetails[0]['middle_name'];
$pdf->SetFont('Courier', 'B', 11);
$pdf->Cell(20, 0, "Name: ", 0, 0, 'L', false);
$pdf->SetFont('Courier', '', 11);
$pdf->Cell($cellWidth, 0, $name, 0, 2, 'L', false);
$pdf->SetFont('Courier', 'B', 16);
$pdf->Ln(5);

// details
$email = $alumniDetails[0]['email_address'];
$pdf->SetFont('Courier', 'B', 11);
$pdf->Cell(20, 0, "Email: ", 0, 0, 'L', false);
$pdf->SetFont('Courier', '', 11);
$pdf->Cell($cellWidth, 0, $email, 0, 2, 'L', false);
$pdf->SetFont('Courier', 'B', 16);
$pdf->Ln(5);

// Course Information
$courseBuffer = $func->select_one('courses', array('courseID', '=', $alumniCourseDetails[0]['course_id']));
$course = $courseBuffer[0]['courseName'];


$pdf->SetFont('Courier', 'B', 11);
$pdf->Cell(20, 0, "Program: ", 0, 0, 'L', false);
$pdf->SetFont('Courier', '', 11);
$pdf->Cell($cellWidth, 0, $course, 0, 2, 'L', false);
$pdf->SetFont('Courier', 'B', 16);
$pdf->Ln(5);

$majorBuffer = $func->select_one('coursesMajor', array('id', '=', $alumniCourseDetails[0]['major_id']));
$major = $majorBuffer[0]['majorName'];

if ($major) {
  $pdf->SetFont('Courier', 'B', 11);
  $pdf->Cell(20, 0, "Major: ", 0, 0, 'L', false);
  $pdf->SetFont('Courier', '', 11);
  $pdf->Cell($cellWidth, 0, $major, 0, 2, 'L', false);
  $pdf->SetFont('Courier', 'B', 16);
  $pdf->Ln(5);
}

$campusBuffer = $func->select_one('campuses', array('campusID', '=', $alumniCourseDetails[0]['campus']));
$campus = $campusBuffer[0]['campusName'];

$pdf->SetFont('Courier', 'B', 11);
$pdf->Cell(20, 0, "Campus: ", 0, 0, 'L', false);
$pdf->SetFont('Courier', '', 11);
$pdf->Cell($cellWidth, 0, $campus, 0, 2, 'L', false);
$pdf->SetFont('Courier', 'B', 16);
$pdf->Ln(5);

$yearStarted = $alumniCourseDetails[0]['year_started'];
$yearGraduated = $alumniCourseDetails[0]['year_graduated'];
$yearDuration = $yearStarted . ' - ' . $yearGraduated;

$pdf->SetFont('Courier', 'B', 11);
$pdf->Cell(20, 0, "Year: ", 0, 0, 'L', false);
$pdf->SetFont('Courier', '', 11);
$pdf->Cell($cellWidth, 0, $yearDuration, 0, 2, 'L', false);
$pdf->SetFont('Courier', 'B', 16);
$pdf->Ln(5);

$pdf->Cell($cellWidth, 0, 'Work Experience', 0, 2, 'C', false);
$lineY = $pdf->GetY() + 5;
$pdf->Line($leftMargin, $lineY, $pageWidth - $rightMargin, $lineY);
$pdf->Ln(10);

if ($alumniWorkExperience) {
  foreach ($alumniWorkExperience as $alumniExperienceInstance) {
    if (in_array($alumniExperienceInstance['id'], $alumniWorkIDs)) {
      $pdf->SetFont('Courier', 'B', 11);
      $pdf->Cell(25, 0, "Position: ", 0, 0, 'L', false);
      $pdf->Cell($cellWidth, 0, $alumniExperienceInstance['work_position'], 0, 2, 'L', false);
      $pdf->Ln(5);

      $pdf->SetFont('Courier', '', 11);
      $pdf->Cell(25, 0, "Company: ", 0, 0, 'L', false);
      $pdf->Cell($cellWidth, 0, $alumniExperienceInstance['work_name'], 0, 2, 'L', false);
      $pdf->Ln(5);

      $pdf->SetFont('Courier', '', 11);
      $pdf->Cell(25, 0, "Duration: ", 0, 0, 'L', false);
      $pdf->Cell($cellWidth, 0, (date("F j, Y", strtotime($alumniExperienceInstance['date_started'])) . ' - ' . (date("F j, Y", strtotime($alumniExperienceInstance['date_end'])))), 0, 2, 'L', false);
      $pdf->Ln(2);

      $pdf->SetFont('Courier', '', 11);
      $pdf->MultiCell(0, 5, "Description: " . $alumniExperienceInstance['work_description'], 0, 'L', false);
      $pdf->Ln(5);
    }
  }
}

$pdf->SetFont('Courier', 'B', 16);
$pdf->Cell($cellWidth, 0, 'Awards', 0, 2, 'C', false);
$lineY = $pdf->GetY() + 5;
$pdf->Line($leftMargin, $lineY, $pageWidth - $rightMargin, $lineY);
$pdf->Ln(10);

if ($alumniAwards) {
  foreach ($alumniAwards as $alumniAwardsInstance) {
    if (in_array($alumniAwardsInstance['id'], $alumniAwardIDs)) {
      $pdf->SetFont('Courier', 'B', 11);
      $pdf->Cell(25, 0, "Award: ", 0, 0, 'L', false);
      $pdf->Cell($cellWidth, 0, $alumniAwardsInstance['award_name'], 0, 2, 'L', false);
      $pdf->Ln(5);

      $pdf->SetFont('Courier', '', 11);
      $pdf->Cell(25, 0, "Given By: ", 0, 0, 'L', false);
      $pdf->Cell($cellWidth, 0, $alumniAwardsInstance['given_by'], 0, 2, 'L', false);
      $pdf->Ln(5);

      $pdf->SetFont('Courier', '', 11);
      $pdf->Cell(25, 0, "Date: ", 0, 0, 'L', false);
      $pdf->Cell($cellWidth, 0, (date("F j, Y", strtotime($alumniAwardsInstance['award_date']))), 0, 2, 'L', false);
      $pdf->Ln(2);

      $pdf->SetFont('Courier', '', 11);
      $pdf->MultiCell(0, 5, "Description: " . $alumniAwardsInstance['award_description'], 0, 'L', false);
      $pdf->Ln(5);
    }
  }
}

// Output the PDF
$pdf->Output();
