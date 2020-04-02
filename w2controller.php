<?php
session_start();
include("config.php");
// Author: Anthony Calise
// Purpose: Take data from w2 form and put into database

function trimValues($num){ // Fix invalid values
    $num = strval($num);
    if ($num[strlen($num)-1]==='.')
        $num=substr($num, 0, -1); 
    if (strlen($num) == 1)
        $num = ltrim($num, '.');
    if ($num=="")
        $num=0;
    $num+=0;
    return $num;
}
$socialSecurity = $w2EIN = $w2Wages = $w2FederalIncomeTaxWithheld = 
$w2SocialSecurityWages = $w2MedicareWages = $w2SocialSecurityTips = $w2SSTaxWithheld = $w2MedicareTaxWithheld = 
$w2AllocatedTips = $w2DependentCareBenefits = $w2EmployeeAddress = $w2EmployeeZipCode = "";
if (isset($_POST['w2SS'])){
    $socialSecurity = $_POST['w2SS'];
}
else{
    header("Location: w2.php");
    exit;
}
if (isset($_POST['w2EIN'])){
    $w2EIN = $_POST['w2EIN'];
}

if (isset($_POST['w2Wages'])){
    $w2Wages = $_POST['w2Wages'];
    $w2Wages=trimValues($w2Wages);
}
if (isset($_POST['w2FederalIncomeTaxWithheld'])){ // Make sure its a valid decimal
    $w2FederalIncomeTaxWithheld = $_POST['w2FederalIncomeTaxWithheld'];
    $w2FederalIncomeTaxWithheld=trimValues($w2FederalIncomeTaxWithheld);
}
if (isset($_POST['w2SocialSecurityWages'])){ // Make sure its a valid decimal
    $w2SocialSecurityWages = $_POST['w2SocialSecurityWages'];
    $w2SocialSecurityWages=trimValues($w2SocialSecurityWages);
}
if (isset($_POST['w2MedicareWages'])){
    $w2MedicareWages = $_POST['w2MedicareWages'];
    $w2MedicareWages=trimValues($w2MedicareWages);
}
if (isset($_POST['w2SocialSecurityTips'])){
    $w2SocialSecurityTips = $_POST['w2SocialSecurityTips'];
    $w2SocialSecurityTips=trimValues($w2SocialSecurityTips);
}

$w2SSTaxWithheld = $w2SocialSecurityWages * .062;
$w2MedicareTaxWithheld = $w2MedicareWages * .0145;

if (isset($_POST['w2AllocatedTips'])){
    $w2AllocatedTips = $_POST['w2AllocatedTips'];
    $w2AllocatedTips=trimValues($w2AllocatedTips);
}
if (isset($_POST['w2DependentCareBenefits'])){
    $w2DependentCareBenefits = $_POST['w2DependentCareBenefits'];
    $w2DependentCareBenefits=trimValues($w2DependentCareBenefits);
}

$id = $_SESSION['id'];
$addressIdQuery = $link->query("SELECT AddressID from employee where empid=$id");
$row=$addressIdQuery->fetch_assoc();
$addressId = $row['AddressID'];


$checkForW2 = $link->query("SELECT * FROM w2 WHERE ssn=$socialSecurity");
if (!$checkForW2 || mysqli_num_rows($checkForW2)==0) {
    $sql = "INSERT INTO w2 (SSN, AddressID, EIN, Compensation, SSWages, MDCWages, SSTips, FedWithold, SSTaxWithold, MDCTaxWithold, Tips, DependentCareBen)
    VALUES ($socialSecurity, $addressId, $w2EIN, $w2Wages, $w2SocialSecurityWages,$w2MedicareWages, $w2SocialSecurityTips, $w2FederalIncomeTaxWithheld, $w2SSTaxWithheld,$w2MedicareTaxWithheld,$w2AllocatedTips,$w2DependentCareBenefits)";    
}
else{
    $link->query("DELETE FROM w2 WHERE SSN=$socialSecurity");
    $sql = "INSERT INTO w2 (SSN, AddressID, EIN, Compensation, SSWages, MDCWages, SSTips, FedWithold, SSTaxWithold, MDCTaxWithold, Tips, DependentCareBen)
    VALUES ($socialSecurity, $addressId, $w2EIN, $w2Wages, $w2SocialSecurityWages,$w2MedicareWages, $w2SocialSecurityTips, $w2FederalIncomeTaxWithheld, $w2SSTaxWithheld,$w2MedicareTaxWithheld,$w2AllocatedTips,$w2DependentCareBenefits)"; 
}
if (!$link->query($sql)){
    header("Location: error.php"); 
}
else{
    header("Location: success.php");
}   
?>