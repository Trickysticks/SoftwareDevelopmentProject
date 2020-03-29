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
/*
if (isset($_POST['options'])){
    $filingStatus = $_POST['options'];
}
if (isset($_POST['twoJobs'])){
$multiJob = $_POST['twoJobs'];
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
*/
if (isset($_POST['options'])){
    $filingStatus = $_POST['options'];
}
if (isset($_POST['twoJobs'])){
$multiJob = $_POST['twoJobs'];
}

if (isset($_POST['qualifyingChildren'])){
    $qualifyingChildren = $_POST['qualifyingChildren'];
    $qualifyingChildren = strval($qualifyingChildren);
    if ($qualifyingChildren[strlen($qualifyingChildren)-1]==='.')
        $qualifyingChildren=substr($qualifyingChildren, 0, -1); 
    if (strlen($qualifyingChildren) == 1)
        $qualifyingChildren = ltrim($qualifyingChildren, '.');
    if ($qualifyingChildren=="")
        $qualifyingChildren=0;
    $qualifyingChildren+=0;
}

if (isset($_POST['otherDependents'])){
    $otherDependents = $_POST['otherDependents'];
    $otherDependents = strval($otherDependents);
    if ($otherDependents[strlen($otherDependents)-1]==='.')
        $otherDependents=substr($otherDependents, 0, -1); 
    if (strlen($otherDependents) == 1)
        $otherDependents = ltrim($otherDependents, '.');
    if ($otherDependents=="")
        $otherDependents=0;
    $otherDependents+=0;
}

if (isset($_POST['totalDependents'])){
    $totalDependents = $_POST['totalDependents'];
    $totalDependents = strval($totalDependents);
    if ($totalDependents[strlen($totalDependents)-1]==='.')
        $totalDependents=substr($totalDependents, 0, -1); 
    if (strlen($totalDependents) == 1)
        $totalDependents = ltrim($totalDependents, '.');
    if ($totalDependents=="")
        $totalDependents=0;
    $totalDependents+=0;
}

if (isset($_POST['otherIncome'])){
    $otherIncome = $_POST['otherIncome'];
    $otherIncome = strval($otherIncome);
    if ($otherIncome[strlen($otherIncome)-1]==='.')
        $otherIncome=substr($otherIncome, 0, -1); 
    if (strlen($otherIncome) == 1)
        $otherIncome = ltrim($otherIncome, '.');
    if ($otherIncome=="")
        $otherIncome=0;
    $otherIncome+=0;
}

if (isset($_POST['deductions'])){
    $deductions = $_POST['deductions'];
    $deductions = strval($deductions);
    if ($deductions[strlen($deductions)-1]==='.')
        $deductions=substr($deductions, 0, -1); 
    if (strlen($deductions) == 1)
        $deductions = ltrim($deductions, '.');
    if ($deductions=="")
        $deductions=0;
    $deductions+=0;
}

if (isset($_POST['extraWithholding'])){
    $extraWithholding = $_POST['extraWithholding'];
    $extraWithholding = strval($extraWithholding);
    if ($extraWithholding[strlen($extraWithholding)-1]==='.')
        $extraWithholding=substr($extraWithholding, 0, -1); 
    if (strlen($extraWithholding) == 1)
        $extraWithholding = ltrim($extraWithholding, '.');
    if ($extraWithholding=="")
        $extraWithholding=0;
    $extraWithholding+=0;
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
    $sql = "INSERT INTO w4 (SSN, AddressID, FilingStatus, DifferentFileStatus, EIN,OtherIncome,Deductions,ExtraWithholding,MultiEmploy, EffectDateWithold, TermDateWithold)
    VALUES ($socialSecurity,'$addressId','$filingStatus','$filingStatus',$w4EIN,$otherIncome,$deductions,$extraWithholding,'$multiJob','$employmentDate','2020/12/31')";    
}
else{
    $link->query("DELETE FROM w4 WHERE SSN=$socialSecurity");
    $sql = "INSERT INTO w4 (SSN, AddressID, FilingStatus, DifferentFileStatus, EIN,OtherIncome,Deductions,ExtraWithholding,MultiEmploy, EffectDateWithold, TermDateWithold)
    VALUES ($socialSecurity,'$addressId','$filingStatus','$filingStatus',$w4EIN,$otherIncome,$deductions,$extraWithholding,'$multiJob','$employmentDate','2020/12/31')";
}
if (!$link->query($sql)){
   echo("Error description: " .$link -> error); 
}
else{
    header("Location: success.php");
}   
 
?>