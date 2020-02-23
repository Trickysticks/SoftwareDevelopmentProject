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
    $w2Wages = strval($w2Wages);
    if ($w2Wages[strlen($w2Wages)-1]==='.')
        $w2Wages=substr($w2Wages, 0, -1); 
    if (strlen($w2Wages) == 1)
        $w2Wages = ltrim($w2Wages, '.');
    if ($w2Wages=="")
        $w2Wages=0;
    $w2Wages+=0;
    echo $w2Wages;
}
if (isset($_POST['w2FederalIncomeTaxWithheld'])){ // Make sure its a valid decimal
    $w2FederalIncomeTaxWithheld = $_POST['w2FederalIncomeTaxWithheld'];
    $w2FederalIncomeTaxWithheld = strval($w2FederalIncomeTaxWithheld);
    if ($w2FederalIncomeTaxWithheld[strlen($w2FederalIncomeTaxWithheld)-1]==='.')
        $w2FederalIncomeTaxWithheld=substr($w2FederalIncomeTaxWithheld, 0, -1); 
    if (strlen($w2FederalIncomeTaxWithheld) == 1)
        $w2FederalIncomeTaxWithheld = ltrim($w2Wages, '.');
    if ($w2FederalIncomeTaxWithheld=="")
        $w2FederalIncomeTaxWithheld=0;
    $w2FederalIncomeTaxWithheld+=0;
}
if (isset($_POST['w2SocialSecurityWages'])){ // Make sure its a valid decimal
    $w2SocialSecurityWages = $_POST['w2SocialSecurityWages'];
    $w2SocialSecurityWages = strval($w2SocialSecurityWages);
    if ($w2SocialSecurityWages[strlen($w2SocialSecurityWages)-1]==='.')
        $w2SocialSecurityWages=substr($w2SocialSecurityWages, 0, -1); 
    if (strlen($w2SocialSecurityWages) == 1)
        $w2SocialSecurityWages = ltrim($w2SocialSecurityWages, '.');
    if ($w2SocialSecurityWages=="")
        $w2SocialSecurityWages=0;
    $w2SocialSecurityWages+=0;
}
if (isset($_POST['w2MedicareWages'])){
    $w2MedicareWages = $_POST['w2MedicareWages'];
    $w2MedicareWages = strval($w2MedicareWages);
    if ($w2MedicareWages[strlen($w2MedicareWages)-1]==='.')
        $w2MedicareWages=substr($w2MedicareWages, 0, -1); 
    if (strlen($w2MedicareWages) == 1)
        $w2MedicareWages = ltrim($w2MedicareWages, '.');
    if ($w2MedicareWages=="")
        $w2MedicareWages=0;
    $w2MedicareWages+=0;
}
if (isset($_POST['w2SocialSecurityTips'])){
    $w2SocialSecurityTips = $_POST['w2SocialSecurityTips'];
    $w2SocialSecurityTips = strval($w2SocialSecurityTips);
    if ($w2SocialSecurityTips[strlen($w2SocialSecurityTips)-1]==='.')
        $w2SocialSecurityTips=substr($w2SocialSecurityTips, 0, -1); 
    if (strlen($w2MedicareWages) == 1)
        $w2SocialSecurityTips = ltrim($w2SocialSecurityTips, '.');
    if ($w2SocialSecurityTips=="")
        $w2SocialSecurityTips=0;
    $w2SocialSecurityTips+=0;
}
$w2SSTaxWithheld = $w2SocialSecurityWages * .062;
$w2MedicareTaxWithheld = $w2MedicareWages * .0145;

if (isset($_POST['w2AllocatedTips'])){
    $w2AllocatedTips = $_POST['w2AllocatedTips'];
    $w2AllocatedTips = strval($w2AllocatedTips);
    if ($w2AllocatedTips[strlen($w2AllocatedTips)-1]==='.')
        $w2AllocatedTips=substr($w2AllocatedTips, 0, -1); 
    if (strlen($w2AllocatedTips) == 1)
        $w2AllocatedTips = ltrim($w2AllocatedTips, '.');
    if ($w2AllocatedTips=="")
        $w2AllocatedTips=0;
    $w2AllocatedTips+=0;
}
if (isset($_POST['w2DependentCareBenefits'])){
    $w2DependentCareBenefits = $_POST['w2DependentCareBenefits'];
    $w2DependentCareBenefits = strval($w2DependentCareBenefits);
    if ($w2DependentCareBenefits[strlen($w2DependentCareBenefits)-1]==='.')
        $w2DependentCareBenefits=substr($w2DependentCareBenefits, 0, -1); 
    if (strlen($w2DependentCareBenefits) == 1)
        $w2DependentCareBenefits = ltrim($w2DependentCareBenefits, '.');
    if ($w2DependentCareBenefits=="")
        $w2DependentCareBenefits=0;
    $w2DependentCareBenefits+=0;
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