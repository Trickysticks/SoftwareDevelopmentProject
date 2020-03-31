
<?php
session_start();
include("config.php");
//Author: Timothy Dees
//Purpose: Populate form 941 with already-extant data if available

$EIN = $NumEmployees = $Compensation = $FedWithold = $SSWagesTax = $MDCWagesTax = $EMPID = $DateEnd = "";

if (isset($_GET['TotalCompensation'])){
    $Compensation = $_GET['TotalCompensation'];
}

if (isset($_GET['TotalFedWithhold'])){
    $FedWithold = $_GET['TotalFedWithhold'];
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
else{
    $DateEnd=false;
}

$EINQuery = $link->query("Select EIN from W2");
$row=$EINQuery->fetch_assoc();
$EIN = $row['EIN'];

$EMPIDQuery = $link->query("Select EMPID from employee");
$row=$EMPIDQuery->fetch_assoc();
$EMPID = $row['EMPID'];
   

echo "EIN:".$EIN."\n";
echo "<br>";
echo "NumEmployees:".$NumEmployees."\n";
echo "<br>";
echo "Compensation:".$Compensation."\n";
echo "<br>";
echo "FedWithold:".$FedWithold."\n";
echo "<br>";
echo "SSWagesTax:".$SSWagesTax."\n";
echo "<br>";
echo "MDCWagesTax:".$MDCWagesTax."\n";
echo "<br>";
echo "EMPID:".$EMPID."\n";
echo "<br>";
echo "DateEnd:".$DateEnd."\n";
echo "<br>";

$checkFor941 = $link->query("SELECT * FROM form941 WHERE EIN=$EIN");

if (!$DateEnd){ // dateEnd is null
    if (!$checkFor941 || mysqli_num_rows($checkFor941)==0) { //exluded PrevAppliedOvrPy, BalDue; not sure how to calculate these; see above
        $sql = "INSERT INTO form941 (EIN ,NumEmployees ,Compensation ,FedTax ,SSTax ,MedicareTax, EMPID) VALUES ($EIN ,$NumEmployees ,$Compensation ,$FedWithold ,$SSWagesTax ,$MDCWagesTax, '$EMPID')";}
    else{
        $link->query("DELETE FROM form941 WHERE EIN=$EIN");
        $sql = "INSERT INTO form941 (EIN ,NumEmployees ,Compensation ,FedTax ,SSTax ,MedicareTax, EMPID) 
        VALUES ($EIN ,$NumEmployees ,$Compensation ,$FedWithold ,$SSWagesTax ,$MDCWagesTax, '$EMPID')";}
}
else{
    if (!$checkFor941 || mysqli_num_rows($checkFor941)==0) { //exluded PrevAppliedOvrPy, BalDue; not sure how to calculate these; see above
        $sql = "INSERT INTO form941 (EIN ,NumEmployees ,Compensation ,FedTax ,SSTax ,MedicareTax, EMPID, CompEndDate) 
            VALUES ($EIN ,$NumEmployees ,$Compensation ,$FedWithold ,$SSWagesTax ,$MDCWagesTax, $EMPID, $DateEnd)";
    }
        else{
        $link->query("DELETE FROM form941 WHERE EIN=$EIN");
        $sql = "INSERT INTO form941 (EIN ,NumEmployees ,Compensation ,FedTax ,SSTax ,MedicareTax, EMPID, CompEndDate) 
            VALUES ($EIN ,$NumEmployees ,$Compensation ,$FedWithold ,$SSWagesTax ,$MDCWagesTax, '$EMPID', $DateEnd)";}
}	
if (!$link->query($sql)){
    header("Location: error.php");	
    // echo("Error description: " . $link -> error);
}
else{
    header("Location: success.php");}     
 

?>
