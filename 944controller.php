
<?php


session_start();
include("config.php");


//Calculating total columns for compensation, SS wages, SS tips and MDC wages
//$compensationTotal = mysqli_query(link,"SELECT SUM(compensation+SSWages+MDCWages+SSTips) as comp_sum FROM w2");
//$row = mysqli_fetch_array($compensationTotal);
//$sum = $row['comp_sum'];

$Compensation= mysqli_query(link,"Select Sum(Compensation+SSWages+MDCWages+SSTips)from w2");


$FedWithold= mysqli_query(link,"Select Sum(FedWithold) from w2");
if (isset($_POST['FedWithold'])){
    $FedWithold = $_POST['FedWithold'];
}



$SSWages = mysqli_query(link,"Select Sum(SSWages) from w2");
if (isset($_POST['SSWages'])){
    $SSWages = $_POST['SSWages'];
}
$SSWagesTax = number_format($SSWages * .124,2);
if (isset($_POST['SSWagesTax'])){
    $SSWagesTax = $_POST['SSWagesTax'];
}



$SSTips=mysqli_query(link,"Select Sum(SSTips) from w2");
if (isset($_POST['SSTips'])){
    $SSTips = $_POST['SSTips'];
}
$SSTipsTax = number_format($SSTips * .0124,2);
if (isset($_POST['SSTipsTax'])){
    $SSTipsTax = $_POST['SSTipsTax'];
}


$MDCWages=mysqli_query(link,"Select Sum(SSTips) from w2");
if (isset($_POST['MDCWages'])){
    $MDCWages = $_POST['MDCWages'];
}
$MDCWagesTax = number_format($MDCWages * .029,2);
if (isset($_POST['MDCWagesTax'])){
    $MDCWagesTax = $_POST['MDCWagesTax'];
}

// 4e. Add Column 2 from lines 4a, 4b, 4c, and 4d   
$TotalTax= $SSWagesTax+ $SSTipsTax+ $MDCWagesTax;

// 5. Total taxes before adjustments. Add lines 2, 4e  e
$TotalTaxBeforeAdj= $FedWithold +$TotalTax;

// 6. Current years’s adjustment 
$CYAdj = 0; //0 is a place holder for $CYAdj (current year adjustment); nothing on tax table about this..?

 //7. Total taxes after adjustments. Add lines 5 and 6   
$TotTaxAdj= $TotalTaxBeforeAdj + 0; //0 is a place holder for $CYAdj 

// 8. Qualified small business payroll tax credit for increasing research activities. .
$SmlBusCred = 0; //0 is a place holder for $SmlBusCred

// 9. Total taxes after adjustments and credits. Subtract line 8 from line 7   
$ToTaxAdjb = $TotTaxAdj- $SmlBusCred;


 //10. Total deposits for this year, including overpayment applied from a prior year ; not sure what the deposits are?
 $YrlyDep = mysqli_query(link,"Select XXXXXX from w2")
 
 
 // 11. Balance due. If line 9 is more than line 10, enter the difference  
 $BalDue= mysqli_query(link," CASE when YrlyDep > ToTaxAdjb then (select ToTaxAdjb - YrlyDep from 944 ) else  '0' end as BalDue)  ")
 
 // 12. Overpayment. If line 10 is more than line 9 
 $OvrPay= mysqli_query(link," CASE when YrlyDep > ToTaxAdjb then (select YrlyDep - ToTaxAdjb from 944 ) else  '0' end as OvrPay)  ")
 
 
 

//To populate monthly deposit schedule and tax liability secontion 13.a-l
//$DepositSchedule =  mysqli_query("Select sum(MDCTax+SSTax+FEDTax+STATETax) as dep_Sched from payroll group by payrollMonth");
//$row = mysqli_fetch_array($DepositSchedule);
//$sum = $row[dep_Sched]; 
//below is a test to see how it populates.
$jan = mysqli_query($link, "Select sum(MDCTax+SSTax+FEDTax+STATETax) from payroll where month = 'jan'");
$feb = mysqli_query($link, "Select sum(MDCTax+SSTax+FEDTax+STATETax) from payroll where month = 'feb'");
$march = mysqli_query($link, "Select sum(MDCTax+SSTax+FEDTax+STATETax) from payroll where month = 'march'");
$april = mysqli_query($link, "Select sum(MDCTax+SSTax+FEDTax+STATETax) from payroll where month = 'april'");
$may = mysqli_query($link, "Select sum(MDCTax+SSTax+FEDTax+STATETax) from payroll where month = 'may'");
$june = mysqli_query($link, "Select sum(MDCTax+SSTax+FEDTax+STATETax) from payroll where month = 'june'");
$july = mysqli_query($link, "Select sum(MDCTax+SSTax+FEDTax+STATETax) from payroll where month = 'july'");
$aug = mysqli_query($link, "Select sum(MDCTax+SSTax+FEDTax+STATETax) from payroll where month = 'aug'");
$sept = mysqli_query($link, "Select sum(MDCTax+SSTax+FEDTax+STATETax) from payroll where month = 'sept'");
$oct = mysqli_query($link, "Select sum(MDCTax+SSTax+FEDTax+STATETax) from payroll where month = 'oct'");
$nov = mysqli_query($link, "Select sum(MDCTax+SSTax+FEDTax+STATETax) from payroll where month = 'nov'");
$dec = mysqli_query($link, "Select sum(MDCTax+SSTax+FEDTax+STATETax) from payroll where month = 'dec'");

$numEmployees = mysqli_query($link, "Select count(EMPID) as numEmployees from Employee group by empid");


//Total liability for year. Add lines 13a through 13l. Total must equal line 9 
$TotLiabY = mysqli_query("Select sum(MDCTax+SSTax+FEDTax+STATETax)  from payroll ")


//If your business has closed or you stopped paying wages. Enter the final date you paid wages
//push a date onto DB
if (isset($_POST['DateEnd'])){
    $DateEnd = $_POST['DateEnd'];
}
//
//
// if you read this comment.. shoot me lol 
//
//


//Posting Values into DB for 944 form 
$checkFor944 = $link->query("SELECT * FROM Form944 WHERE EIN=$EIN");
if (!$checkFor944 || mysqli_num_rows($checkFor944)==0) {
    $sql = "INSERT INTO Form944 (EIN ,NumEmployees ,Compensation ,FedTax ,SSTax ,MedicareTax ,Wages ,SickPay ,LifeIns ,PrevAppliedOvrPy ,ResearchActivities ,EMPID)
    VALUES ($EIN ,$NumEmployees ,$Compensation ,$FedWithold ,$SSWagesTax ,$MDCWagesTax ,$Wages ,$SickPay ,$LifeIns ,$PrevAppliedOvrPy ,$ResearchActivities ,$EMPID)";    
}
else{
    $link->query("DELETE FROM w2 WHERE EIN=$EIN");
    $sql = "INSERT INTO Form944 (EIN ,NumEmployees ,Compensation ,FedTax ,SSTax ,MedicareTax ,Wages ,SickPay ,LifeIns ,PrevAppliedOvrPy ,ResearchActivities ,EMPID)
    VALUES ($EIN ,$NumEmployees ,$Compensation ,$FedWithold ,$SSWagesTax ,$MDCWagesTax ,$Wages ,$SickPay ,$LifeIns ,$PrevAppliedOvrPy ,$ResearchActivities ,$EMPID)";    
}
if (!$link->query($sql)){
    header("Location: error.php"); 
}
else{
    header("Location: success.php");








?>