<?php
//Author: Timothy Dees
include("navbar.php");
if (isset($_SESSION['Role']) && $_SESSION['Role'] != 'Admin')
	header("Location: index.php");


include("config.php"); 
 
$currentId = $_SESSION["id"];

$deptId = $middleInitial = $streetName = $aptNum = $city = $state = $zip = $streetNum =$firstName= $lastName = $SSN = $salary=  "";
//puling all info from employee table
$employeeInfo = $link->query("SELECT * FROM employee WHERE empid=$currentId");
while ($row=$employeeInfo->fetch_assoc()){
  if (isset($row['FirstName']))
    $firstName = $row['FirstName'];
  if (isset($row['LastName']))
    $lastName = filter_var($row['LastName']);
  if (isset($row['Title']))
    $Title = $row['Title'];
if (isset($row['Empid']))
    $Empid = $row['Empid'];
  if (isset($row['PTIN']))
    $PTIN = $row['PTIN'];
}
//combining employee name ; first and last
$employeeName = $firstName . " " . $lastName;

//pulling all info from employer table
$employerInfo = $link->query("SELECT * FROM employer");
$row = $employerInfo->fetch_assoc();
if (isset($row['EIN']))
  $EIN = $row['EIN'];
if (isset($row['EmplrName']))
  $emplrName = $row['EmplrName'];
if (isset($row['EmplrStNum']))
  $emplrStNum = $row['EmplrStNum'];
if (isset($row['EmplrStAdd']))
  $emplrStAdd = $row['EmplrStAdd'];
if (isset($row['EmplrSuiteNum']))
  $emplrSuiteNum = $row['EmplrSuiteNum'];
if (isset($row['EmplrCity']))
  $emplrCity = $row['EmplrCity'];
if (isset($row['EmplrState']))
  $emplrState = strtoupper($row['EmplrState']);
if (isset($row['EmplrZip']))
  $emplrZip = $row['EmplrZip'];
if (isset($row['CloseDate']))
  $CloseDate = $row['CloseDate'];

//combining employer address into 2 rows
$employerAddress1 = $emplrStNum . " " . $emplrStAdd . " " . $emplrSuiteNum;
$employerAddress2 =$emplrCity . ", " . $emplrState . " " . $emplrZip;

//getting total compensation of all W2s
$CompensationQuery = $link->query("Select Sum(Compensation+SSWages+MDCWages+SSTips) as TotalCompensation from w2");
$row=$CompensationQuery->fetch_assoc();
$Compensation = $row['TotalCompensation'];

//getting total federal witholdings of all W2s
$FedWitholdQuery = $link->query("Select Sum(FedWithold) as TotalFedWithhold from w2");
$row=$FedWitholdQuery->fetch_assoc();
$FedWithold = $row['TotalFedWithhold'];

// 3. If no wages, tips, and other compensation are subject to social security or Medicare tax 
$NoComp = 0; //place holder not sure what this is

//getting total Social Security Wages of all W2s
$SSWagesQuery = $link->query("Select Sum(SSWages) as TotalSSWages from w2");
$row=$SSWagesQuery->fetch_assoc();
$SSWages = $row['TotalSSWages'];

//Calculating the total Social Security Tax from the Total Social Security Wages for all W2s
$SSWagesTaxRaw = $SSWages * .124;
$SSWagesTax = number_format($SSWagesTaxRaw, 2);

//getting total Social Security Tips of all W2s
$SSTipsQuery = $link->query("Select Sum(SSTips) as TotalSSTips from w2");
$row=$SSTipsQuery->fetch_assoc();
$SSTips = $row['TotalSSTips'];

//Calculating the total Social Security Tips from the Total Social Security Wages for all W2s
$SSTipsTaxRaw = $SSTips * .124;
$SSTipsTax = number_format($SSTipsTaxRaw,2);

//getting total Medicare Wages of all W2s
$MDCWagesQuery = $link->query("Select Sum(MDCWages) as TotalMDCWages from w2");
$row=$MDCWagesQuery->fetch_assoc();
$MDCWages = $row['TotalMDCWages'];

//Calculating the total Medicare Wages from the Total Social Security Wages for all W2s
$MDCWagesTaxRaw = $MDCWages * .029;
$MDCWagesTax = number_format($MDCWagesTaxRaw,2);

//Getting total additiona Medicare wages of all W2s
//$AddMDCWagesQuery = $link->query("Select Sum(MDCWages) as TotalMDCWages from w2");
//$row=$AddMDCWagesQuery->fetch_assoc();
//$AddMDCWages = $row['AddMDCWages'];
$AddMDCWages = 0; //placeholder not on tax rate sheet.


//Calculating the additional Medicare Wages from the Total additional Medicare Wages for all W2s
$AddMDCTax= $AddMDCWages * 0.009;

// 4e. Add Column 2 from lines 4a, 4b, 4c, and 4d   
$TotalTax= $SSWagesTaxRaw + $SSTipsTaxRaw + $MDCWagesTaxRaw;


// 6. Total taxes before adjustments. Add lines 2, 4e  e
$TotalTaxBeforeAdj= $FedWithold +$TotalTax;

//Section 3121(q) Notice and Demand—Tax due on unreported tips (see instructions)
$UnreportedTipTax = 0;

//7. Current quarter’s adjustment for fractions of cents
$QuarterFractionAdjustment = 0;

//8. Current quarter’s adjustment for sick pay
$QuarterSickPayAdjustment = 0;

//9. Current quarter’s adjustments for tips and group-term life insurance
$QuarterTipLifeInsuranceAdjustment = 0;

//10. Total taxes after adjustments. Combine lines 6 through 9
 
$TotTaxAdj= $TotalTaxBeforeAdj + $QuarterFractionAdjustment + $QuarterSickPayAdjustment + $QuarterTipLifeInsuranceAdjustment; //0 is a place holder for $CYAdj 

// 11. Qualified small business payroll tax credit for increasing research activities. .
$SmlBusCred = 0; //0 is a place holder for $SmlBusCred


// 12. Total taxes after adjustments and credits. Subtract line 11 from line 10
$ToTaxAdjb = $TotTaxAdj- $SmlBusCred;


//13. Total deposits for this year, including overpayment applied from a prior year ; not sure what the deposits are?
 $YrlyDep = 0; //0 is a place holder for $YrlyDep
 
 
// 11. Balance due. If line 9 is more than line 10, enter the difference 
//$BalDueQuery = $link->query("CASE when $YrlyDep > $ToTaxAdjb then (select $ToTaxAdjb - $YrlyDep from 941 ) else  '0' end as BalDue)  ");
//$row=$BalDueQuery->fetch_assoc();
//$BalDue = $row['BalDue'];
$BalDue = $ToTaxAdjb - $YrlyDep ;


 // 12. Overpayment. If line 10 is more than line 9 
//$OvrPayQuery = $link->query" CASE when YrlyDep > ToTaxAdjb then (select YrlyDep - ToTaxAdjb from 941 ) else  '0' end as OvrPay)  ");
//$row=$OvrPayQuery->fetch_assoc();
//$OvrPay = $row['OvrPay'];
$OvrPay = 0;

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


//Total liability for year. Add lines 13a through 13l. Total must equal line 9 
$TotLiabYQuery = $link->query("Select sum(MDCTax+SSTax+FEDTax+STATETax) as sumTotLiabY from payroll group by empid ");
$row=$TotLiabYQuery->fetch_assoc();
$TotLiabY = $row['sumTotLiabY'];

//these are nonsense, replace

$Month1PaymentRaw = $ToTaxAdjb/3;
$Month2PaymentRaw = $ToTaxAdjb/3;
$Month3PaymentRaw = $ToTaxAdjb/3;


$Month1Payment = number_format($Month1PaymentRaw, 2);
$Month2Payment = number_format($Month2PaymentRaw, 2);
$Month3Payment = number_format($Month3PaymentRaw, 2);

$TotalLiability = $Month1PaymentRaw + $Month2PaymentRaw + $Month3PaymentRaw;

 
 ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Highland Capital Tax System</title>
  </head>
  <body>
	
<div><H1><center>941 Form </center></h1></div></br>
  <form method="POST" <?php echo  "action='941controller.php?TotalCompensation=$Compensation&TotalFedWithhold=$FedWithold'" ?>>
<table>
	<tr>
		<td colspan="4">
		<td><label for="941EIN">Employer Identification Number (EIN)</label>
		<td><td><input type="text" class="form-control" id="941EIN" name="941EIN" readonly required <?php echo "value=".$EIN ?> >
			</div>
		</td>
			
 </br></br></br>
      </div>
		<td colspan="125">
		<td><div>(Check one)</div></td>
	</tr>
	<tr>
		<td colspan="4">
		<td>
			<label for="941Name">Name</label>
			<td><td><input type="text" class="form-control" id="941Name" name="941Name" disabled <?php echo 'value="' . $emplrName . '" '?> >
			</div></td>
		<td colspan="125">
		<td><div><td><input type="radio" id="1.January, Feb, March" name="period_select" value= "1.January,Feb,March">
			<label for="1.January,Feb,March">1. January, Feb, March</label></td>
		</tr>	
		<tr>
		<td colspan="4">
		<td>
			<label for="941Number">Street Number</label>
			<TD><td><input type="text" class="form-control" id="941Number" name="941Number" readonly required <?php echo "value=".$emplrStNum ?>>
			</div></td>
		<td colspan="125">
		<td>
			<td><div><input type="radio" id="2.April, May, June" name="period_select" value= "2.April, May, June">
			<label for="2. April, May, June">2. April, May, June</label></td>
		</tr>	
		<tr>
		<td colspan="4">
		<td>
			<label for="941Street">Street</label>
			<TD><td><input type="text" class="form-control" id="941Street" name="941Street" readonly required <?php echo "value=".$emplrStAdd ?>>
			</div></td>
		<td colspan="125">
			<td><div><td><input type="radio" id="3.July, August, September" name="period_select" value= "3.July,August,September">
			<label for="3. July,August,September">3. July, August, September</label></td>
		</tr>	
		<tr>
		<td colspan="4">
		<td>
			<label for="941Suite">Suite</label>
			<td><td><input type="text" class="form-control" id="941Suite" name="941Suite" readonly required <?php echo "value=".$emplrSuiteNum ?>>
			</div></td>
			<td colspan="125">
			<td><div><td><input type="radio" id="4.October, November, December" name="period_select" value= "4.October, November, December">
			<label for="4.October, November, December">4. October, November, December</label></td>
		</tr>
		</tr>
		<td colspan="4">
		<td>
			<label for="941City">City</label>
			<td><td><input type="text" class="form-control" id="941City" name="941City" readonly required  <?php echo 'value="' . $emplrCity . '" '?>>
			</div></td>
		</tr>
		<tr>
		<td colspan="4">
		<td>
			<label for="941State">State</label>
			<td><td><input type="text" class="form-control" id="941State" name="941State" readonly required <?php echo "value=".$emplrState ?>>
			</div></td>
		</tr>
		<tr>
		<td colspan="4">
		<td>
			<label for="941Zip">Zip Code</label>
			<td><td><input type="text" class="form-control" id="941Zip" name="941Zip" readonly required <?php echo "value=".$emplrZip ?>>
			</div></td>
		</tr>
	</table>
</br>
</br>


<table>
<tr>
		<td colspan="4">
		<td>
			<label for="941NumEmp">1. Number of employees who received wages, tips, or other compensation for the pay period including:
			Mar. 12 (Quarter 1), June 12 (Quarter 2), Sept. 12 (Quarter 3), or Dec. 12 (Quarter 4)</label>
			<td><td> <input type="text" class="form-control" id="941NumEmp" name="941NumEmp" >
			</div></td>
		</tr>
		
		<tr>
		<td colspan="4">
		<td>
			<label for="941Comp">2. Wages, tips, and other compensation </label>
			<td><td><input type="text" class="form-control" id="941Comp" name="941Comp" readonly required <?php echo "value=".$Compensation ?>>
			</div></td>
		</tr>


<tr>
		<td colspan="4">
		<td>
			<label for="941FedTax">3. Federal income tax withheld from wages, tips, and other compensation </label>
			<td><td><input type="text" class="form-control" id="941FedTax" name="941FedTax" readonly required <?php echo "value=".$FedWithold ?>>
			</div></td>
		</tr>
		
		
		
<tr>
		<td colspan="4">
		<td>
			<label for="941NoComp">4. If no wages, tips, and other compensation are subject to social security or Medicare tax, check & go to line 6 </label>
			<td><td><input type="checkbox" class="form-control" id="941NoComp" name="941NoComp" readonly >
			</div></td>
		</tr>
		
</table>

<table>
		<tr>
		<td colspan="4">
		<td>
			<label for="SSWages">5a. Taxable social security wages</label>
			<td><td><input type="text" class="form-control" id="SSWages" name="SSWages" readonly required <?php echo "value=".$SSWages ?>>
			</div></td>
			<td colspan="5">
			<td>
			<label for="SSWagesTax">x 0.124 = </label>
			<td><td><input type="text" class="form-control" id="SSWagesTax" name="SSWagesTax" readonly required <?php echo "value=".$SSWagesTax ?>>
			</div></td>
</tr>	

<tr>
		<td colspan="4">
		<td>
			<label for="SSTip">5b. Taxable social security tips</label>
			<td><td><input type="text" class="form-control" id="SSTip" name="SSTip" readonly required <?php echo "value=".$SSTips ?>>
			</div></td>
			<td colspan="5">
			<td>
			<label for="SSTipsTax">x 0.124 = </label>
			<td><td><input type="text" class="form-control" id="SSTipsTax" name="SSTipsTax" readonly required <?php echo "value=".$SSTipsTax ?>>
			</div></td>
</tr>

<tr>
		<td colspan="4">
		<td>
			<label for="MDCWages">5c. Taxable Medicare wages & tips</label>
			<td><td><input type="text" class="form-control" id="MDCWages" name="MDCWages" readonly required <?php echo "value=".$MDCWages ?>>
			</div></td>
			<td colspan="5">
			<td>
			<label for="MDCWagesTax">x 0.029 = </label>
			<td><td><input type="text" class="form-control" id="MDCWagesTax" name="MDCWagesTax" readonly required <?php echo "value=".$MDCWagesTax ?>>
			</div></td>
</tr>
<tr>
		<td colspan="4">
		<td>
			<label for="MDCTip">5d. Taxable wages & tips subject to Additional Medicare Tax withholding</label>
			<td><td><input type="text" class="form-control" id="MDCTip" name="MDCTip" readonly required <?php echo "value=".$AddMDCWages ?>>
			</div></td>
			<td colspan="5">
			<td>
			<label for="MDCTipTax">x 0.009 = </label>
			<td><td><input type="text" class="form-control" id="MDCTipTax" name="MDCTipTax" readonly required <?php echo "value=".$AddMDCTax ?>>
			</div></td>
</tr>
</table>
<table>
<tr>
		<td colspan="4">
		<td>
			<label for="TotalTax">5e. Add Column 2 from lines 5a, 5b, 5c, and 5d  </label>
			<td><td><input type="text" class="form-control" id="TotalTax" name="TotalTax" readonly required <?php echo "value=".number_format($TotalTax, 2) ?>>
			</div></td>
</tr>

		
<tr>
		<td colspan="4">
		<td>
			<label for="941DemTax">5f. Section 3121(q) Notice and Demand—Tax due on unreported tips (see instructions)  </label>
			<td><td><input type="text" class="form-control" id="941DemTax" name="941DemTax" readonly required <?php echo "value=".$UnreportedTipTax ?>>
			</div></td>
</tr>

<tr>
		<td colspan="4">
		<td>
			<label for="941TotTax">6. Total taxes before adjustments. Add lines 3, 5e, and 5f </label>
			<td><td><input type="text" class="form-control" id="TotalTaxBeforeAdj" name="TotalTaxBeforeAdj" readonly required <?php echo "value=".number_format($TotalTaxBeforeAdj, 2) ?>>
			</div></td>
</tr>

<tr>
		<td colspan="4">
		<td>
			<label for="941QAdj">7. Current quarter’s adjustment for fractions of cents </label>
			<td><td><input type="text" class="form-control" id="941QAdj" name="941QAdj" readonly required <?php echo "value=".$QuarterFractionAdjustment ?>>
			</div></td>
</tr>


<tr>
		<td colspan="4">
		<td>
			<label for="941QSick">8. Current quarter’s adjustment for sick pay  </label>
			<td><td><input type="text" class="form-control" id="941QSick" name="941QSick" readonly required <?php echo "value=".$QuarterSickPayAdjustment ?> >
			</div></td>
</tr>


<tr>
		<td colspan="4">
		<td>
			<label for="941QIns">9. Current quarter’s adjustments for tips and group-term life insurance   </label>
			<td><td><input type="text" class="form-control" id="941QIns" name="941QIns" readonly required <?php echo "value=".$QuarterTipLifeInsuranceAdjustment ?>  >
			</div></td>
</tr>


<tr>
		<td colspan="4">
		<td>
			<label for="941ToTaxAdja">10. Total taxes after adjustments. Combine lines 6 through 9   </label>
			<td><td><input type="text" class="form-control" id="941ToTaxAdja" name="941ToTaxAdja" readonly required <?php echo "value=".number_format($TotTaxAdj, 2) ?> >
			</div></td>
</tr>

<tr>
		<td colspan="4">
		<td>
			<label for="941SmlBus">11. Qualified small business payroll tax credit for increasing research activities. Attach Form 8974   </label>
			<td><td><input type="text" class="form-control" id="941SmlBus" name="941SmlBus" readonly required <?php echo "value=".$SmlBusCred ?> >
			</div></td>
</tr>

<tr>
		<td colspan="4">
		<td>
			<label for="941ToTaxAdjb">12. Total taxes after adjustments and credits. Subtract line 11 from line 10   </label>
			<td><td><input type="text" class="form-control" id="941ToTaxAdjb" name="941ToTaxAdjb" readonly required <?php echo "value=".number_format($ToTaxAdjb, 2) ?> >
			</div></td>
</tr>

<tr>
		<td colspan="4">
		<td>
			<label for="941DepQ">13 Total deposits for this quarter, including overpayment applied from a prior quarter and overpayments applied from Form 941-X, 941-X (PR), 944-X, or 944-X (SP) filed in the current qtr   </label>
			<td><td><input type="text" class="form-control" id="941DepQ" name="941DepQ" readonly required <?php echo "value=".$YrlyDep ?> >
			</div></td>
</tr>

<tr>
		<td colspan="4">
		<td>
			<label for="941Bal">14. Balance due. If line 12 is more than line 13, enter the difference and see instructions   </label>
			<td><td><input type="text" class="form-control" id="941Bal" name="941Bal" readonly required <?php echo "value=".number_format($BalDue, 2) ?> >
			</div></td>
</tr>
</table>
<table>
<tr>
		<td colspan="4">
		<td>
			<label for="941OvrPay">15. Overpayment. If line 13 is more than line 12</label>
			<td><td><input type="text" class="form-control" id="941OvrPay" name="941OvrPay" readonly required <?php echo "value=".$OvrPay ?> >
			</div></td>
		</br></br>
		</div>
		<td colspan="10">
		<td><div>(Check one)</div></td>
		</tr>
			<td colspan="25">
		<td><div><td><input type="radio" id="Apply to next return" name="Overpayment_Prompt" value= "Apply to next return">
			<label for="Apply to next return">Apply to next return</label></td>
			
			<td colspan="25">
		<td><div><td><input type="radio" id="Send to refund" name="Overpayment_Prompt" value= "Send to refund">
			<label for="Send to refund">Send to refund</label></td>
		</tr>	
</tr>
</table>


<tr>
		<td colspan="4">
		Check one:
		<td>
		<table>
	    <div class="form-group col-md-3">
		<td colspan="150"><div><input type="radio" id="941opt1" name="941_Option" value= "941opt1">
			<label for="941opt1">Line 12 on this return is less than $2,500 or line 12 on the return for the prior quarter was less than $2,500, and you didn’t
			incur a $100,000 next-day deposit obligation during the current quarter. If line 12 for the prior quarter was less than $2,500 but
			line 12 on this return is $100,000 or more, you must provide a record of your federal tax liability. If you are a monthly schedule
			depositor, complete the deposit schedule below; if you are a semiweekly schedule depositor, attach Schedule B (Form 941). Go to
			Part 3</label></td>
</table>
<table>
		<td colspan="4">
		<td colspan="150">
		<td>
			<td><div><input type="radio" id="941opt2" name="941_Option" value= "941opt2">
			<label for="941opt2">You were a monthly schedule depositor for the entire quarter. Enter your tax liability for each month and total
			liability for the quarter, then go to Part 3.</label></td>
</tr>
</table>
<br><br><br>
<table>
<tr>
		<td colspan="4">
		Tax Liability
			</div></td>
			<td colspan="5">
			<td>
			<label for="Mth1">Month 1 </label>
			<td><td><input type="text" class="form-control" id="Mth1" name="Mth1" readonly required <?php echo "value=".$Month1Payment ?>>
			</div></td>
			<td colspan="5">
			<td>
			<label for="Mth2">Month 2 </label>
			<td><td><input type="text" class="form-control" id="Mth2" name="Mth2" readonly required <?php echo "value=".$Month2Payment ?> >
			</div></td>
			<td colspan="5">
			<td>
			<label for="Mth3">Month 3 </label>
			<td><td><input type="text" class="form-control" id="Mth3" name="Mth3" readonly required <?php echo "value=".$Month3Payment ?> >
			</div></td>
			<td colspan="5">
			<td>
			<label for="TotalLiab">Total Liability for quater </label>
			<td><td><input type="text" class="form-control" id="TotalLiab" name="TotalLiab" readonly required <?php echo "value=".number_format($TotalLiability, 2) ?> >
			</div></td>
</tr>

</table>

<br>
<table>
		<td colspan="4">
		<td colspan="124">
		<td>
			<td><div><input type="radio" id="opt3" name="2.opt3" value= "2.opt3">
			<label for="opt3">You were a semiweekly schedule depositor for any part of this quarter. Complete Schedule B (Form 941),
			Report of Tax Liability for Semiweekly Schedule Depositors, and attach it to Form 941.</label></td>
</tr>
</table>

<table>
		<td colspan="4">
		<td>
			<td><div><input type="radio" id="opt17" name="2.opt17" value= "2.opt17">
			<label for="opt17">17. If your business has closed or you stopped paying wages </label></td>
			<td colspan="14">
		<td>
			<label for="DateWage">Enter the final date you paid wages </label>
			<td><td><input type="date" class="form-control" id="DateWage" name="DateWage" >
			</div></td>
</table>
<table>
		<td colspan="4">
		<td>
			<td><div><input type="radio" id="opt18" name="2.opt18" value= "2.opt18">
			<label for="opt18">18. If you are a seasonal employer and you don’t have to file a return for every quarter of the year  </label></td>
</tr>
</table>

<table>
		<td colspan="4">
		<td>
			<td><div><input type="radio" id="941Designee" name="941Designee" value= "941Designee">
			<label for="941Designee">Yes. Designee’s name and phone number </label></td>
			<td colspan="75">
		<td>
			<label for="941PIN">5 digit PIN</label>
			<td><td><input type="text" class="form-control" id="941PIN" name="941PIN" minlength=5>
			</div></td>
</table>
<table>
		<td colspan="4">
		<td>
			<td><div><input type="radio" id="941No" name="941No" value= "941No">
			<label for="941No">No. </label></td>
		
</table>

<table>

<tr>
		<td colspan="4">
		<td>
			<label for="941name">Name</label>
			<td><td><input type="text" class="form-control" id="941name" name="941name" disabled <?php echo 'value="'.$employeeName. '" '?> >
			</div></td>
</tr>
<tr>
		<td colspan="4">
		<td>
			<label for="941title">Title</label>
			<td><td><input type="text" class="form-control" id="941title" name="941title" readonly required <?php echo "value=".$Title ?>> 
			</div></td>
</tr>
<tr>
		<td colspan="4">
		<td>
			<label for="941date">Date</label>
			<td><td><input type="text" class="form-control" id="941date" name="941date" readonly required <?php echo "value=".date("Y/m/d"); ?> >
			</div></td>
</tr>
<tr>
		<td colspan="4">
		<td>
			<label for="941PTIN">PTIN</label>
			<td><td><input type="text" class="form-control" id="941PTIN" name="941PTIN" readonly required <?php echo "value=".$PTIN ?> >
			</div></td>
</tr>

<tr>
		<td colspan="4">
		<td>
			<label for="941EIN">EIN</label>
			<td><td><input type="text" class="form-control" id="941EIN" name="941EIN" readonly required <?php echo "value=".$EIN ?>>
			</div></td>
</tr>

<tr>
		<td colspan="4">
		<td>
			<label for="941Address">Address Line 1</label>
			<td><td><input type="text" class="form-control" id="941Address" name="941Address" disabled <?php echo 'value="' . $employerAddress1 . '" '?> >
</tr>	
			
<tr>
		<td colspan="4">
		<td>
			<label for="941Address">Address Line 2</label>
			<TD><td><input type="text" class="form-control" id="941Address" name="941Address" disabled <?php echo 'value="' . $employerAddress2 . '" '?> >


</table>


<br><br> 
<button style = "margin: 0 auto; display: block;" type="submit" class="btn btn-dark">Submit</button>
  </form>
  <br> 
  </body>
</html>