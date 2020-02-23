<?php
session_start();
include("config.php");
// Author: Vittorio Russo
$filingStatus= "";
$multiJob="";
$qualifyingChildren="";
$otherDependents="";
$totalDependents="";
$otherIncome="";
$deductions="";
$extraWithholding="";
$socialSecurity="";
$w4EIN="";
$employmentDate="";

if (isset($_POST['options'])){
    $filingStatus = $_POST['options'];
}
if (isset($_POST['twoJobs'])){
$multiJob = $_POST['twoJobs'];
}
else{
	$multiJob="No";
}

if (isset($_POST['qualifyingChildren'])){
    $qualifyingChildren = $_POST['qualifyingChildren'];
}
if (isset($_POST['otherDependents'])){
    $otherDependents = $_POST['otherDependents'];
}
if (isset($_POST['totalDependents'])){
    $totalDependents = $_POST['totalDependents'];
}
if (isset($_POST['otherIncome'])){
    $otherIncome = $_POST['otherIncome'];
}
if (isset($_POST['deductions'])){
    $deductions = $_POST['deductions'];
}

if (isset($_POST['extraWithholding'])){
    $extraWithholding = $_POST['extraWithholding'];
}

if (isset($_POST['w4SS'])){
    $socialSecurity = $_POST['w4SS'];
}
if (isset($_POST['w4EIN'])){
$w4EIN = $_POST['w4EIN'];
}

if (isset($_POST['w4EmploymentDate'])){
$employmentDate = $_POST['w4EmploymentDate'];
}


$id = $_SESSION['id'];
$addressQuery = $link->query("SELECT AddressID from employee where empid=$id");
$row=$addressQuery->fetch_assoc();
$addressId = $row['AddressID'];


$checkW4 = $link->query("SELECT * FROM w4 WHERE ssn=$socialSecurity");

if (!$checkW4 || mysqli_num_rows($checkW4)==0) {
    echo $employmentDate;
    $sql = "INSERT INTO w4 (SSN, AddressID, FilingStatus, DifferentFileStatus, EIN, PersAllowance, DeductAdjAdIncome,OtherIncome,Deductions,ExtraWithholding,MultiEmploy, EffectDateWithold, TermDateWithold)
    VALUES ($socialSecurity,'$addressId','$filingStatus','$filingStatus',$w4EIN,'5','5', $otherIncome,$deductions,$extraWithholding,'$multiJob','$employmentDate','$employmentDate')";    
}
else{
    $link->query("DELETE FROM w4 WHERE SSN=$socialSecurity");
    $sql = "INSERT INTO w4 (SSN, AddressID, FilingStatus, DifferentFileStatus, EIN, PersAllowance, DeductAdjAdIncome,OtherIncome,Deductions, ExtraWithholding, MultiEmploy, EffectDateWithold, TermDateWithold)
    VALUES ($socialSecurity,$addressId,$filingStatus,$filingStatus,$w4EIN,'5','5', $otherIncome,$deductions,$extraWithholding,'$multiJob', $employmentDate,$employmentDate)";  
}
//echo $sql;

if (!$link->query($sql)){
    echo("Error description: " . $link -> error);
}
//header("Location: success.php");
?>