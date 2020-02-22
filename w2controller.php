<?php
session_start();
include("config.php");
// Author: Anthony Calise
// Purpose: Take data from w2 form and put into database
$socialSecurity = $w2EIN = $w2Wages = $w2FederalIncomeTaxWithheld = 
$w2SocialSecurityWages = $w2MedicareWages = $w2SocialSecurityTips = $w2SSTaxWithheld = $w2MedicareTaxWithheld = 
$w2AllocatedTips = $w2DependentCareBenefits = $w2EmployeeAddress = $w2EmployeeZipCode = "";
if (isset($_POST['w2SS'])){
    $socialSecurity = $_POST['w2SS'];
    echo $socialSecurity;
}
if (isset($_POST['w2EIN'])){
    $w2EIN = $_POST['w2EIN'];
}
if (isset($_POST['w2Wages'])){
    $w2Wages = $_POST['w2Wages'];
}
if (isset($_POST['w2FederalIncomeTaxWithheld'])){
    $w2FederalIncomeTaxWithheld = $_POST['w2FederalIncomeTaxWithheld'];
}
if (isset($_POST['w2SocialSecurityWages'])){
    $w2SocialSecurityWages = $_POST['w2SocialSecurityWages'];
}
if (isset($_POST['w2MedicareWages'])){
    $w2MedicareWages = $_POST['w2MedicareWages'];
}
if (isset($_POST['w2SocialSecurityTips'])){
    $w2SocialSecurityTips = $_POST['w2SocialSecurityTips'];
}
if (isset($_POST['w2SSTaxWithheld'])){
    $w2SSTaxWithheld = $_POST['w2SSTaxWithheld'];
}
if (isset($_POST['w2MedicareTaxWithheld'])){
    $w2MedicareTaxWithheld = $_POST['w2MedicareTaxWithheld'];
}
if (isset($_POST['w2AllocatedTips'])){
    $w2AllocatedTips = $_POST['w2AllocatedTips'];
}
if (isset($_POST['w2DependentCareBenefits'])){
    $w2DependentCareBenefits = $_POST['w2DependentCareBenefits'];
}

$id = $_SESSION['id'];
echo $id;
$addressIdQuery = $link->query("SELECT AddressID from employee where empid=$id");
$row=$addressIdQuery->fetch_assoc();
$addressId = $row['AddressID'];


$sql = "INSERT INTO w2 (SSN, AddressID, EIN, Compensation, SSWages, MDCWages, SSTips, FedWithold, SSTaxWithold, MDCTaxWithold, Tips, DependentCareBen)
VALUES ($socialSecurity, $addressId, $w2EIN, $w2Wages, $w2SocialSecurityWages,$w2MedicareWages, $w2SocialSecurityTips, $w2FederalIncomeTaxWithheld, $w2SSTaxWithheld,$w2MedicareTaxWithheld,$w2AllocatedTips,$w2DependentCareBenefits)";

if ($link->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}

// todo: just get the addressid from employee table 
?>