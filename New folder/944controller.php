
<?php
session_start();
include("config.php");
//Author:Christine Wasserman
//Purpose: populate the 944 form will data provided by the W2 and the payroll information. 

$EIN = $NumEmployees = $Compensation = $FedWithold = $SSWagesTax = $MDCWagesTax = $EMPID = $DateEnd = "";

if (isset($_POST['TotalCompensation'])){
    $Compensation = $_POST['TotalCompensation'];
}

if (isset($_POST['TotalFedWithhold'])){
    $FedWithold = $_POST['TotalFedWithhold'];
}

if (isset($_POST['TotalSSWages'])){
    $SSWages = $_POST['TotalSSWages'];
}

if (isset($_POST['SSWagesTax'])){
    $SSWagesTax = $_POST['SSWagesTax'];
}

if (isset($_POST['TotalSSTips'])){
    $SSTips = $_POST['TotalSSTips'];
}

if (isset($_POST['SSTipsTax'])){
    $SSTipsTax = $_POST['SSTipsTax'];
}

if (isset($_POST['TotalMDCWages'])){
    $MDCWages = $_POST['TotalMDCWages'];
}

if (isset($_POST['MDCWagesTax'])){
    $MDCWagesTax = $_POST['MDCWagesTax'];
}

//Totaling the number of all active employees 
$numEmployeesQuery = $link->query("Select EIN ,Count(*) NumEmployees from W2 group by EIN"); //add where termination date <= todays date 
$row=$numEmployeesQuery->fetch_assoc();
$NumEmployees = $row['NumEmployees'];
if (isset($_POST['NumEmployees'])){
$NumEmployees = $_POST['NumEmployees'];
}


//If your business has closed or you stopped paying wages. Enter the final date you paid wages
if (isset($_POST['DateEnd'])){
  $DateEnd = $_POST['DateEnd'];
}

$EINQuery = $link->query("Select EIN from W2");
$row=$EINQuery->fetch_assoc();
$EIN = $row['EIN'];

$EMPIDQuery = $link->query("Select EMPID from employee");
$row=$EMPIDQuery->fetch_assoc();
$EMPID = $row['EMPID'];
   

$checkFor944 = $link->query("SELECT * FROM form944 WHERE EIN=$EIN");
if (!$checkFor944 || mysqli_num_rows($checkFor944)==0) { //exluded PrevAppliedOvrPy, BalDue; not sure how to calculate these; see above
  $sql = "INSERT INTO form944 (EIN ,NumEmployees ,Compensation ,FedTax ,SSTax ,MedicareTax, EMPID, DateEnd) 
    VALUES ($EIN ,$NumEmployees ,$Compensation ,$FedWithold ,$SSWagesTax ,$MDCWagesTax, $EMPID, $DateEnd)";}
else{
  $link->query("DELETE FROM form944 WHERE EIN=$EIN");
  $sql = "INSERT INTO form944 (EIN ,NumEmployees ,Compensation ,FedTax ,SSTax ,MedicareTax, EMPID, DateEnd) 
    VALUES ($EIN ,$NumEmployees ,$Compensation ,$FedWithold ,$SSWagesTax ,$MDCWagesTax, $EMPID, $DateEnd)";}
	
if (!$link->query($sql)){
    header("Location: error.php");	}
else{
    header("Location: success.php");}     
 

?>
